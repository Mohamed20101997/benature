<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShippingRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShippingsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:read_shippings'])->only('index');
        $this->middleware(['permission:create_shippings'])->only('create');
        $this->middleware(['permission:update_shippings'])->only('edit');
        $this->middleware(['permission:delete_shippings'])->only('destroy');
    }

    public function index()
    {
        $shippings = Shipping::orderBy('id','DESC')->with('country','city')->paginate(PAGINATION_COUNT);
        return view('dashboard.shippings.index',compact('shippings'));
    }


    public function create()
    {

        $countries = Country::with('cities')->get();
        return view('dashboard.shippings.create',compact('countries'));
    }

    public function store(ShippingRequest $request)
    {
        try{

            DB::beginTransaction();

            $data = $request->except('_token');

            Shipping::create($data);
            DB::commit();
            return redirect()->route('shippings.index')->with(['success' => 'تم ألاضافة بنجاح']);

        }catch(\Exception $ex)
        {
            DB::rollback();
            return redirect()->route('shippings.index')->with(['error'=>' هناك خطاء ما برجاء المحاولة فيما بعد']);
        }

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $shipping = Shipping::find($id);
        $countries = Country::get();
        if (!$shipping)
            return redirect()->route('shippings.index')->with(['error' => 'هذا الشحن  غير موجود ']);

        return view('dashboard.shippings.edit', compact('shipping','countries'));
    }


    public function update(ShippingRequest $request, $id)
    {

        try{

            $shipping = Shipping::find($id);
            if (!$shipping)
                return redirect()->route('shippings.index')->with(['error' => 'هذا الشحن غير موجود']);

            DB::beginTransaction();

            $data = $request->except('_token','_method','id');
            $shipping->update($data);

            DB::commit();
            return redirect()->route('shippings.index')->with(['success' => 'تم التحديث بنجاح']);

        }catch(\Exception $ex)
        {
            DB::rollback();
            return redirect()->route('shippings.index')->with(['error'=>' هناك خطاء ما برجاء المحاولة فيما بعد']);
        }
    }


    public function destroy($id)
    {

        try {

            $shipping = Shipping::find($id);

            if (!$shipping)
                return redirect()->route('shippings.index')->with(['error' => 'هذا المدينه غير موجود ']);

            $shipping->delete();

            return redirect()->route('shippings.index')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('shippings.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function getCities(Request $request){

        $cities = City::where('country_id', $request->id)->get();
        return response()->json($cities);

    }
}
