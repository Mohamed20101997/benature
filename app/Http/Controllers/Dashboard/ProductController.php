<?php

namespace App\Http\Controllers\Dashboard;

use App\Basket\Basket;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Country;
use App\Models\Material;
use App\Models\Product;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{


    protected $basket;
    public function __construct(Basket $basket)
    {
        $this->middleware(['permission:read_products'])->only('index');
        $this->middleware(['permission:create_products'])->only('create');
        $this->middleware(['permission:update_products'])->only('edit');
        $this->middleware(['permission:delete_products'])->only('destroy');

        $this->basket = $basket;

    }

    public function index()
    {
        $data = [];
        $data['products'] = Product::with('brand','category','country')->orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        $data['brands'] = Brand::active()->select('id')->get();

        return view('dashboard.products.index', $data);
    }


    public function create()
    {
        $data = [];
        $data['brands']     = Brand::active()->select('id')->get();
        $data['materials']   = Material::active()->select('id')->get();
        $data['countries']   = Country::get();
        $data['categories'] = Category::parent()->orderBy('id','DESC')->active()->with('childrens')->select('id')->get();

        return view('dashboard.products.create', $data);
    }


    public function store(ProductRequest $request)
    {

        try{

            DB::beginTransaction();

            if (!$request->has('is_active'))
            $request->request->add(['is_active' => 0]);
                else
            $request->request->add(['is_active' => 1]);

            $data = $request->except('_token', 'photo');
            if ($request->has('photo')) {

                \Image::make($request->photo)->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('assets/images/products/'. $request->photo->hashName()));

                $data['photo'] = $request->photo->hashName();
            }

            $product = Product::create($data);

            $slug = \Str::slug($request->en['name']);

            $product->update(['slug'=>$slug]);

            DB::commit();
            return redirect()->route('products.index')->with(['success'=>'تم الانشاء بنجاح']);

        }catch(\Exception $ex)
        {
            DB::rollback();
            return redirect()->route('products.index')->with(['error'=>' هناك خطاء ما برجاء المحاولة فيما بعد']);
        }

    }


    public function show($id)
    {

    }

    public function edit($id)
    {

       $data = [];
       $data['product'] = Product::with('category')->orderBy('id', 'DESC')->find($id);
       $data['brands'] = Brand::active()->select('id')->get();
        $data['categories'] = Category::parent()->orderBy('id','DESC')->active()->with('childrens')->select('id')->get();
        $data['countries']   = Country::get();
       $data['materials'] = Material::active()->select('id')->get();


       if (!$data['product'])
           return redirect()->route('products.index')->with(['error' => 'هذا القسم غير موجود ']);



       return view('dashboard.products.edit',$data);
    }


    public function update(ProductUpdateRequest $request, $id)
    {
        try{
        $product = Product::find($id);
        if (!$product)
            return redirect()->route('products.index')->with(['error' => 'هذا المنتج غير موجود']);

        DB::beginTransaction();
        if (!$request->has('is_active'))
        $request->request->add(['is_active' => 0]);
            else
        $request->request->add(['is_active' => 1]);

        $data = $request->except('_token', 'photo');
        if ($request->has('photo')) {

            remove_previous('products',$product);

            \Image::make($request->photo)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('assets/images/products/'. $request->photo->hashName()));

            $data['photo'] = $request->photo->hashName();
        }



        $product->update($data);

        $slug = \Str::slug($request->en['name']);
        $product->update(['slug'=>$slug]);
        $product->save();
        DB::commit();
        return redirect()->route('products.index')->with(['success'=>'تم الانشاء بنجاح']);

        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('products.index')->with(['error'=>' هناك خطاء ما برجاء المحاولة فيما بعد']);
        }


    }


    public function destroy($id)
    {
        try {

            $product = Product::find($id);

            if (!$product)
                return redirect()->route('products.index')->with(['error' => 'هذا المنتج غير موجود ']);

            $product->delete();
            $this->basket->remove($product);
            remove_previous('products',$product);
            return redirect()->route('products.index')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('products.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function getSupCayegory(Request $request){

        $childrens = Category::where('parent_id', $request->id)->get();

        return response()->json($childrens);

    }

    public function popular(Request $request){
        try{

            $prosuct = Product::find($request->id);
            if($prosuct->is_popular == 0)
            {
                $prosuct->update([
                    'is_popular' => 1
                ]);

            }else{
                $prosuct->update([
                    'is_popular' => 0
                ]);
            }


            return response()->json($prosuct->is_popular);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('products.index')->with(['error'=>' هناك خطاء ما برجاء المحاولة فيما بعد']);
        }


    }
}
