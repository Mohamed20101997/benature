<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read_admins'])->only('index');
        $this->middleware(['permission:create_admins'])->only('create');
        $this->middleware(['permission:update_admins'])->only('edit');
        $this->middleware(['permission:delete_admins'])->only('destroy');
    }

    public function index(Request $request)
    {
        $admins = Admin::whereRoleIs('admin')->where('id', '!=' ,auth()->guard('admin')->user()->id)->latest()->paginate(PAGINATION_COUNT);
        return view('dashboard.admins.index',compact('admins'));

    } //end of index


    public function create()
    {
        return view('dashboard.admins.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'     =>'required|email|unique:admins',
            'password'  =>'required|min:5|confirmed',
            'permissions'  => 'required|min:1',
        ]);

        $data = $request->except(['password','password_confirmation','permissions']);
        $data['password'] =bcrypt($request->password);


        $admin = Admin::create($data);
        $admin->attachRole('admin');

        if($request->has('permissions')){

            $admin->syncPermissions($request->permissions);
        }

        return redirect()->route('admins.index')->with(['success'=>'تم الانشاء بنجاح']);

    }


    public function edit(Admin $admin)
    {
        return view('dashboard.admins.edit',compact('admin'));
    }


    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'name' =>'required',
            'email'     =>'required|email|unique:admins,id',
            'permissions'  => 'required|min:1',
        ]);

        $data = $request->except(['password','password_confirmation','permissions']);

        $admin->update($data);
        $admin->syncPermissions($request->permissions);
        return redirect()->route('admins.index')->with(['success'=>'تم التحديث بنجاح']);;
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();
        return back()->with(['success'=>'تم الحذف بنجاح']);;

    }
}
