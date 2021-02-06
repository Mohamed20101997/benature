<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function index()
    {
        $data = [];
        $data['products'] = Product::with('brand','categories')->orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        $data['brands'] = Brand::active()->select('id')->get();
        $data['categories'] = Category::active()->select('id')->get();

        return view('dashboard.products.index', $data);
    }


    public function create()
    {
        $data = [];
        $data['brands']     = Brand::active()->select('id')->get();
        $data['categories'] = Category::active()->select('id')->get();

        return view('dashboard.products.create', $data);
    }


    public function store(ProductRequest $request)
    {
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
            $product->categories()->attach($request->category_id);

            $product->name = $request->name;
            $product->save();

            DB::commit();
            return redirect()->route('products.index')->with(['success'=>'تم الانشاء بنجاح']);

    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
