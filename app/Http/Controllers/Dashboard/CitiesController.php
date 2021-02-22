<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitiesController extends Controller
{
    public function index()
    {
        $cities = City::orderBy('id','DESC')->with('country')->paginate(PAGINATION_COUNT);
        return view('dashboard.cities.index',compact('cities'));
    }


    public function create()
    {
        $countries = Country::get();
        return view('dashboard.cities.create',compact('countries'));
    }

    public function store(CityRequest $request)
    {
        try{

            DB::beginTransaction();

            $data = $request->except('_token');

            City::create($data);
            DB::commit();
            return redirect()->route('cities.index')->with(['success' => 'تم ألاضافة بنجاح']);

        }catch(\Exception $ex)
        {
            DB::rollback();
            return redirect()->route('cities.index')->with(['error'=>' هناك خطاء ما برجاء المحاولة فيما بعد']);
        }

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $city = City::find($id);
        $countries = Country::get();
        if (!$city)
            return redirect()->route('cities.index')->with(['error' => 'هذا المدينه غير موجود ']);

        return view('dashboard.cities.edit', compact('city','countries'));
    }


    public function update(CityRequest $request, $id)
    {

        try{

            $city = City::find($id);
            if (!$city)
                return redirect()->route('cities.index')->with(['error' => 'هذا المدينه غير موجود']);

            DB::beginTransaction();

            $data = $request->except('_token','_method','id');
            $city->update($data);

            DB::commit();
            return redirect()->route('cities.index')->with(['success' => 'تم التحديث بنجاح']);

        }catch(\Exception $ex)
        {
            DB::rollback();
            return redirect()->route('cities.index')->with(['error'=>' هناك خطاء ما برجاء المحاولة فيما بعد']);
        }
    }


    public function destroy($id)
    {

        try {

            $city = City::find($id);

            if (!$city)
                return redirect()->route('cities.index')->with(['error' => 'هذا المدينه غير موجود ']);

            $city->delete();

            return redirect()->route('cities.index')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('cities.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
