<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:read_settings'])->only('index');
        $this->middleware(['permission:create_settings'])->only('create');
        $this->middleware(['permission:update_settings'])->only('edit');
    }


    public function index()
    {
        $settings = Setting::get();
        return view('dashboard.settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $data = $request->except('_token', 'image1','image2','image3','image4');

            for($i=1 ; $i<5 ; $i++){
                $image = "image".$i;

                if ($request->has($image)) {
                    \Image::make($request->$image)->resize(300, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save(public_path('assets/images/products/'. $request->$image->hashName()));

                    $data[$image] = $request->$image->hashName();

                }
            }


            Setting::create($data);
            return redirect()->route('settings.index')->with(['success'=>'تم الانشاء بنجاح']);
        }
        catch(\Exception $ex)
        {
            return redirect()->route('products.index')->with(['error'=>' هناك خطاء ما برجاء المحاولة فيما بعد']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Setting::find($id);
        return view('dashboard.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{

            $setting = Setting::find($id);
            $data = $request->except('_token', 'image1','image2','image3','image4');
            for($i=1 ; $i<5 ; $i++){

                $image = "image".$i;
                if ($request->has($image)) {

                    remove_image('products',$setting->$image);

                    \Image::make($request->$image)->resize(300, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save(public_path('assets/images/products/'. $request->$image->hashName()));

                    $data[$image] = $request->$image->hashName();

                } //end if
            } //end for

            $setting->update($data);

            return redirect()->route('settings.index')->with(['success'=>'تم الانشاء بنجاح']);
        }
        catch(\Exception $ex)
        {
            return redirect()->route('products.index')->with(['error'=>' هناك خطاء ما برجاء المحاولة فيما بعد']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
