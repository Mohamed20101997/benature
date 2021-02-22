<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use App\Http\Requests\ReviewRequest;
use App\Models\Category;
use App\Models\Message;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;


class SiteController extends Controller
{
    public function home(){
        $data = [];
        $data['categories'] = Category::Active()->whereTranslation('locale','en')->parent()->select('id')
                ->with(['childrens'=> function($q){
                    return $q->select('id','parent_id', 'slug')->with(['products'=>  function($n) {
                        return $n->select('product_id');
                    }]);
                }])->get();
        $data['products'] = Product::Active()->whereTranslation('locale','en')->latest()->take(10)->get();
        $data['sales'] = Product::Active()->whereTranslation('locale','en')->where('special_price_type' , 1)->latest()->take(3)->get();

        return view('welcome',$data);
    }


    public function getProducts(Request $request) {
        if(request()->ajax()){
            $products = Product::whenSearch(request()->search)->whereTranslation('locale','en')->get();
            return $products;
            }

        if ($request->cat_id){
            $cat_name =  ucwords(str_replace(array('-'),array(' '), $request->slug));
            $cat_id = $request->cat_id;


            $products = Product::Active()->whereTranslation('locale','en')->where('category_id',$cat_id)->with('categories')->get();
            return view('site.products',compact('products','cat_name'));

        } //end if

        $products = Product::Active()->whereTranslation('locale','en')->get();


        return view('site.products',compact('products'));
    }


    public function getProduct($id){
        try{

            $product = Product::Active()->whereTranslation('locale','en')->find($id);
            $reviews = Review::where('product_id', $id)->latest()->take(5)->get();
            $category =  Category::Active()->whereTranslation('locale','en')->where('id', $product->id )->get();
            $similarProduct =  Product::Active()->whereTranslation('locale','en')
                                ->where('category_id' ,  $product->category_id)->latest()->take(4)->get();

            if (!$product)
                return redirect()->back()->with(['error' => 'this product is not found']);

            $rating = Review::where('product_id', $id)->get();
            $count =  $rating->count();
            $sum = 0 ;
            foreach ($rating as $rat){
                $sum += $rat->rating;
            }
            $average = floor($sum/$count);
            return view('site.product',compact('product','category','similarProduct','reviews','average','count'));

        }catch(\Exception $ex)
        {
            return redirect()->back()->with(['error'=>'There are problem please try again ']);
        }
    }

    public function postReviews(ReviewRequest $request){

        try{
            $review =  Review::create($request->all());

            return response()->json(['success'=>'Data is successfully added']);

        }catch(\Exception $ex)
        {
            return redirect()->back()->with(['error'=>'There are problem please try again ']);
        }

    }
    public function message(MessageRequest $request){
        try{
            Message::create($request->except('_token','_method'));
            return response()->json(['success'=>'Data is successfully added']);

        }catch(\Exception $ex)
        {
            return redirect()->back()->with(['error'=>'There are problem please try again ']);
        }

    }

    public function toggle_favorite(Product $product)
    {
        $product->is_favored ? $product->users()->detach(auth()->user()->id) :  $product->users()->attach(auth()->user()->id) ;

    } //end if toggle favorite


    public function getFavorite()
    {
        $products = Product::Active()->whereTranslation('locale','en')
        ->whenFavorite(1)->latest()->get();
        return view('site.wishlist',compact('products'));

    } //end if getFavorite





}
