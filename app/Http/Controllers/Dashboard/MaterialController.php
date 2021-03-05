<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\MaterialRequest;
use App\Models\Material;
use Illuminate\Support\Facades\DB;

class MaterialController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read_material'])->only('index');
        $this->middleware(['permission:create_material'])->only('create');
        $this->middleware(['permission:update_material'])->only('edit');
        $this->middleware(['permission:delete_material'])->only('destroy');
    }


    public function index()
    {
        $materials = Material::orderBy('id','DESC')->paginate(PAGINATION_COUNT);
        return view('dashboard.materials.index',compact('materials'));
    }


    public function create()
    {
        return view('dashboard.materials.create');
    }

    public function store(MaterialRequest $request)
    {

        try{

            DB::beginTransaction();

            if (!$request->has('is_active'))
            $request->request->add(['is_active' => 0]);
                else
            $request->request->add(['is_active' => 1]);

            $data = $request->except('_token', 'photo');

            Material::create($data);
            DB::commit();
            return redirect()->route('materials.index')->with(['success' => 'تم ألاضافة بنجاح']);

        }catch(\Exception $ex)
        {
            DB::rollback();
            return redirect()->route('materials.index')->with(['error'=>' هناك خطاء ما برجاء المحاولة فيما بعد']);
        }

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $material = Material::find($id);
        if (!$material)
            return redirect()->route('materials.index')->with(['error' => 'هذا الماركة غير موجود ']);

        return view('dashboard.materials.edit', compact('material'));
    }


    public function update(MaterialRequest $request, $id)
    {

        try{

            $material = Material::find($id);
            if (!$material)
                return redirect()->route('materials.index')->with(['error' => 'هذا الماركة غير موجود']);

            DB::beginTransaction();

            if (!$request->has('is_active'))
            $request->request->add(['is_active' => 0]);
                else
            $request->request->add(['is_active' => 1]);

            $data = $request->except('_token', 'photo');
            $material->update($data);

            DB::commit();
            return redirect()->route('materials.index')->with(['success' => 'تم ألاضافة بنجاح']);

        }catch(\Exception $ex)
        {
            DB::rollback();
            return redirect()->route('materials.index')->with(['error'=>' هناك خطاء ما برجاء المحاولة فيما بعد']);
        }
    }


    public function destroy($id)
    {

        try {

            $material = Material::find($id);

            if (!$material)
                return redirect()->route('materials.index')->with(['error' => 'هذا الماركة غير موجود ']);

            $material->delete();

            return redirect()->route('materials.index')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('materials.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
