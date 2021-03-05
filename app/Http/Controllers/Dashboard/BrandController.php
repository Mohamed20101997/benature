<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read_brands'])->only('index');
        $this->middleware(['permission:create_brands'])->only('create');
        $this->middleware(['permission:update_brands'])->only('edit');
        $this->middleware(['permission:delete_brands'])->only('destroy');
    }

    public function index()
    {
        $brands = Brand::orderBy('id','DESC')->paginate(PAGINATION_COUNT);
        return view('dashboard.brands.index',compact('brands'));
    }


    public function create()
    {
        return view('dashboard.brands.create');
    }

    public function store(BrandRequest $request)
    {

        try{

            DB::beginTransaction();

            if (!$request->has('is_active'))
            $request->request->add(['is_active' => 0]);
                else
            $request->request->add(['is_active' => 1]);

            $data = $request->except('_token');

            Brand::create($data);
            DB::commit();
            return redirect()->route('brands.index')->with(['success' => 'تم ألاضافة بنجاح']);

        }catch(\Exception $ex)
        {
            DB::rollback();
            return redirect()->route('brands.index')->with(['error'=>' هناك خطاء ما برجاء المحاولة فيما بعد']);
        }

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $brand = Brand::find($id);
        if (!$brand)
            return redirect()->route('brands.index')->with(['error' => 'هذا الماركة غير موجود ']);

        return view('dashboard.brands.edit', compact('brand'));
    }


    public function update(BrandRequest $request, $id)
    {

        try{

            $brand = Brand::find($id);
            if (!$brand)
                return redirect()->route('brands.index')->with(['error' => 'هذا الماركة غير موجود']);

            DB::beginTransaction();

            if (!$request->has('is_active'))
            $request->request->add(['is_active' => 0]);
                else
            $request->request->add(['is_active' => 1]);

            $data = $request->except('_token');


            $brand->update($data);

            DB::commit();
            return redirect()->route('brands.index')->with(['success' => 'تم ألاضافة بنجاح']);

        }catch(\Exception $ex)
        {
            DB::rollback();
            return redirect()->route('brands.index')->with(['error'=>' هناك خطاء ما برجاء المحاولة فيما بعد']);
        }
    }


    public function destroy($id)
    {

        try {

            $brand = Brand::find($id);

            if (!$brand)
                return redirect()->route('brands.index')->with(['error' => 'هذا الماركة غير موجود ']);

            $brand->delete();
            return redirect()->route('brands.index')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('brands.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
