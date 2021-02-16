<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use App\Http\Requests\ReviewRequest;
use App\Models\Category;
use App\Models\Message;
use App\Models\Product;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home(){
        $data = [];
        $data['categories'] = Category::Active()->whereTranslation('locale','en')->parent()->select('id')
                ->with(['childrens'=> function($q){
                    return $q->select('id','parent_id');
                }])->get();

        $data['products'] = Product::Active()->whereTranslation('locale','en')->latest()->take(10)->get();
        $data['sales'] = Product::Active()->whereTranslation('locale','en')->where('special_price_type' , 1)->latest()->take(3)->get();

        return view('welcome',$data);
    }
    public function getProducts(){

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


            return view('site.product',compact('product','category','similarProduct','reviews'));

        }catch(\Exception $ex)
        {
            return redirect()->back()->with(['error'=>'There are problem please try again ']);
        }
    }

    public function postReviews(ReviewRequest $request){

        try{

            Review::create($request->all());
            return redirect()->back();

        }catch(\Exception $ex)
        {
            return redirect()->back()->with(['error'=>'There are problem please try again ']);
        }
        
    }
    public function message(MessageRequest $request){
        try{
            Message::create($request->except('_token','_method'));
            return redirect()->back()->with(['success'=>'message sent successfully']);
   
        }catch(\Exception $ex)
        {
            return redirect()->back()->with(['error'=>'There are problem please try again ']);
        }
        
    }
    public function search(){
        if(request()->ajax()){
            $products = Product::whenSearch(request()->search)->get();
            return $products;
        }        
    }

    

}
