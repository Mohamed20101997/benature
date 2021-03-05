<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read_categories'])->only('index');
        $this->middleware(['permission:create_categories'])->only('create');
        $this->middleware(['permission:update_categories'])->only('edit');
        $this->middleware(['permission:delete_categories'])->only('destroy');
    }

    public function index()
    {
        $categories = Category::orderBy('id','DESC')->paginate(PAGINATION_COUNT);
        return view('dashboard.categories.index',compact('categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('id','DESC')->Active()->parent()->get();
        return view('dashboard.categories.create',compact('categories'));
    }

    public function store(CategoryRequest $request)
    {


        try{
            DB::beginTransaction();


            if (!$request->has('is_active'))
            $request->request->add(['is_active' => 0]);
                else
            $request->request->add(['is_active' => 1]);


            $cat = Category::create($request->except(['_token','type']));

            $slug = \Str::slug($request->en['name']);
            $cat->update(['slug'=>$slug]);
            DB::commit();
            return redirect()->route('category.index')->with(['success'=>'تم الانشاء بنجاح']);

        }catch(\Exception $ex)
        {
            DB::rollback();
            return redirect()->route('category.index')->with(['error'=>' هناك خطاء ما برجاء المحاولة فيما بعد']);


        }

    }


    public function edit($id)
    {
        $category = Category::orderBy('id','DESC')->find($id);
        $categories = Category::parent()->orderBy('id','DESC')->get();

        if(!$category)
        {
            return redirect()->route('category.index')->with(['error' => 'هذا القسم غير موجود']) ;

        }

        return view('dashboard.categories.edit',compact('category','categories'));
    }


    public function update(CategoryRequest $request, $id)
    {
        try{

            $category = Category::find($id);
            DB::beginTransaction();
            if(!$category){
                return redirect()->route('category.index')->with(['error' => 'هذا القسم غير موجود']) ;
            }

            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            $category->update($request->all());

            $slug = \Str::slug($request->en['name']);
            $category->update(['slug'=>$slug]);

            DB::commit();
            return redirect()->route('category.index')->with(['success'=>'تم التدحديث بنجاح']);

        }catch(\Exception $ex)
        {
            DB::rollback();
            return redirect()->route('category.index')->with(['error'=>' هناك خطاء ما برجاء المحاولة فيما بعد']);

        }

    }


    public function destroy($id)
    {
        try
        {
            $category = Category::orderBy('id','DESC')->find($id);

            if(!$category){
                return redirect()->route('category.index')->with(['error' => 'هذا القسم غير موجود']) ;
            }

            $category->delete();

            return redirect()->route('category.index')->with(['success'=>'تم الحذف بنجاح']);

        }catch(\Exception $ex)
        {
            return redirect()->route('category.index')->with(['error'=>' هناك خطاء ما برجاء المحاولة فيما بعد']);


        }


    }
}
