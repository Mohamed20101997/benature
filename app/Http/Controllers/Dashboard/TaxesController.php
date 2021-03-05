<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaxRequest;
use App\Models\Country;
use App\Models\Tax;
use Illuminate\Support\Facades\DB;

class TaxesController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:read_taxes'])->only('index');
        $this->middleware(['permission:create_taxes'])->only('create');
        $this->middleware(['permission:update_taxes'])->only('edit');
        $this->middleware(['permission:delete_taxes'])->only('destroy');
    }


    public function index()
    {
        $taxes = Tax::orderBy('id','DESC')->with('country')->paginate(PAGINATION_COUNT);
        return view('dashboard.taxes.index',compact('taxes'));
    }


    public function create()
    {

        $countries = Country::get();
        return view('dashboard.taxes.create',compact('countries'));
    }

    public function store(TaxRequest $request)
    {
        try{

            DB::beginTransaction();

            $data = $request->except('_token');

            Tax::create($data);
            DB::commit();
            return redirect()->route('taxes.index')->with(['success' => 'تم ألاضافة بنجاح']);

        }catch(\Exception $ex)
        {
            DB::rollback();
            return redirect()->route('taxes.index')->with(['error'=>' هناك خطاء ما برجاء المحاولة فيما بعد']);
        }

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $tax = Tax::find($id);
        $countries = Country::get();
        if (!$tax)
            return redirect()->route('taxes.index')->with(['error' => 'هذا الضريبه  غير موجود ']);

        return view('dashboard.taxes.edit', compact('tax','countries'));
    }


    public function update(TaxRequest $request, $id)
    {

        try{

            $tax = Tax::find($id);
            if (!$tax)
                return redirect()->route('taxes.index')->with(['error' => 'هذا الضريبه غير موجود']);

            DB::beginTransaction();

            $data = $request->except('_token','_method','id');
            $tax->update($data);

            DB::commit();
            return redirect()->route('taxes.index')->with(['success' => 'تم التحديث بنجاح']);

        }catch(\Exception $ex)
        {
            DB::rollback();
            return redirect()->route('taxes.index')->with(['error'=>' هناك خطاء ما برجاء المحاولة فيما بعد']);
        }
    }


    public function destroy($id)
    {
        try {
            $tax = Tax::find($id);

            if (!$tax)
                return redirect()->route('taxes.index')->with(['error' => 'هذا الضريبه غير موجود ']);

            $tax->delete();

            return redirect()->route('taxes.index')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('taxes.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

}
