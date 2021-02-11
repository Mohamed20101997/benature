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

        return view('welcome',$data);
    }
    public function getProducts(){

        $products = Product::Active()->whereTranslation('locale','en')->get();

        return view('site.products',compact('products'));
    }
}
