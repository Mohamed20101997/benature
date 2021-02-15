<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
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
            $category =  Category::Active()->whereTranslation('locale','en')->where('id', $product->id )->get();
            $similarProduct =  Product::Active()->whereTranslation('locale','en')
                                ->where('category_id' ,  $product->category_id)->latest()->take(4)->get();


            if (!$product)
                return redirect()->back()->with(['error' => 'this product is not found']);


            return view('site.product',compact('product','category','similarProduct'));

        }catch(\Exception $ex)
        {
            return redirect()->back()->with(['error'=>'There are problem please try again ']);
        }
    }
}
