<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountriesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read_countries'])->only('index');
        $this->middleware(['permission:create_countries'])->only('create');
        $this->middleware(['permission:update_countries'])->only('edit');
        $this->middleware(['permission:delete_countries'])->only('destroy');
    }

    public function index()
    {
        $countries = Country::orderBy('id','DESC')->paginate(PAGINATION_COUNT);
        return view('dashboard.countries.index',compact('countries'));
    }


    public function create()
    {
        return view('dashboard.countries.create');
    }

    public function store(CountryRequest $request)
    {

        try{

            DB::beginTransaction();

            $data = $request->except('_token');

            Country::create($data);
            DB::commit();
            return redirect()->route('countries.index')->with(['success' => 'تم ألاضافة بنجاح']);

        }catch(\Exception $ex)
        {
            DB::rollback();
            return redirect()->route('countries.index')->with(['error'=>' هناك خطاء ما برجاء المحاولة فيما بعد']);
        }

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $country = Country::find($id);
        if (!$country)
            return redirect()->route('countries.index')->with(['error' => 'هذا الماركة غير موجود ']);

        return view('dashboard.countries.edit', compact('country'));
    }


    public function update(CountryRequest $request, $id)
    {

        try{

            $country = Country::find($id);
            if (!$country)
                return redirect()->route('countries.index')->with(['error' => 'هذا البد غير موجود']);

            DB::beginTransaction();

            $data = $request->except('_token','_method','id');
            $country->update($data);

            DB::commit();
            return redirect()->route('countries.index')->with(['success' => 'تم التحديث بنجاح']);

        }catch(\Exception $ex)
        {
            DB::rollback();
            return redirect()->route('countries.index')->with(['error'=>' هناك خطاء ما برجاء المحاولة فيما بعد']);
        }
    }


    public function destroy($id)
    {

        try {

            $country = Country::find($id);

            if (!$country)
                return redirect()->route('countries.index')->with(['error' => 'هذا الماركة غير موجود ']);

            $country->delete();

            return redirect()->route('countries.index')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('countries.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
