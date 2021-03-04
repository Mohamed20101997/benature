<?php

namespace App\Http\Controllers\Site;

use App\Basket\Basket;
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

    protected $basket;
    public function __construct(Basket $basket)
    {
        $this->basket = $basket;

    }
    public function home(){
        $data = [];
        $data['basket'] = $this -> basket ;
        $data['categories'] = Category::Active()->whereTranslation('locale','en')->parent()->select('id')->with('childrens')->get();
        $data['products'] = Product::Active()->whereTranslation('locale','en')->latest()->take(10)->get();
        $data['populars'] = Product::Active()->whereTranslation('locale','en')->where('is_popular', 1)->latest()->take(4)->get();
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


            $products = Product::Active()->whereTranslation('locale','en')->where('category_id',$cat_id)->with('category')->get();
            return view('site.products',compact('products','cat_name','$basket'));

        } //end if

        $products = Product::Active()->whereTranslation('locale','en')->get();
        $basket = $this -> basket ;

        return view('site.products',compact('products','basket'));
    }

    public function productCountry(Request $request) {

        $country_id = $request->id;
        $country_name = $request->name;

        $products = Product::Active()->whereTranslation('locale','en')->where('country_id',$country_id)->with('country')->get();

        $basket = $this -> basket ;
        return view('site.productCountry',compact('products','basket','country_name'));
    }



    public function getProduct($id){
        try{

            $product = Product::Active()->whereTranslation('locale','en')->find($id);
            $category =  Category::Active()->whereTranslation('locale','en')->where('id', $product->id )->with('_parent')->get();
            $reviews =  Review::where('product_id' , $id)->latest()->take(5)->get();
            $similarProduct =  Product::Active()->whereTranslation('locale','en')
                ->where('category_id' ,  $product->category_id)->latest()->take(4)->get();

            if (!$product)
                return redirect()->back()->with(['error' => 'this product is not found']);

            $count =  $rating->count();
            $basket = $this -> basket ;
            return view('site.product',compact('product','category','similarProduct','reviews','count','basket'));

        }catch(\Exception $ex)
       {
           return redirect()->back()->with(['error'=>'There are problem please try again ']);
        }
    }

    public function postReviews(ReviewRequest $request){

        try{
            $review =  Review::create($request->all());
            return response()->json('success');

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

        $basket = $this -> basket ;
        return view('site.wishlist',compact('products','basket'));

    } //end if getFavorite


public function inBasket(){

    $basket = $this -> basket ;
    return response()->json($basket->all());
}


}
