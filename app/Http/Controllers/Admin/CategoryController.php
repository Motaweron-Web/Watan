<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Category;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{

    use PhotoTrait;
    public function index(request $request)
    {
        if($request->ajax()) {
            $data = Category::orderBy('id','DESC')->get();
            return Datatables::of($data)
                ->addColumn('action', function ($data) {
                    return '
                            <button style="" type="button" data-id="' . $data->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button style="" class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $data->id . '" data-title="' . $data->name_ar . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->addColumn('subCategory', function ($data) {
                    $link = route('subCategory',$data->id);
                    return '<a class="btn btn-pill btn-success" href="'.$link.'">معاينة <i class="fa fa-map text-white"></i> </a>';
                })
                ->escapeColumns([])
                ->make(true);
        }else{
            return view('Admin/category/index');
        }
    }

    public function create()
    {
        return view('Admin/category.parts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_ar'   => 'required|max:255|unique:categories,name_ar',
            'name_en'   => 'required|max:255|unique:categories,name_en',
        ],[
            'name_ar.unique'     => 'اسم القسم الرئيسي العربي تم ادخاله مسبقا',
            'name_en.unique'     => 'اسم القسم الرئيسي  الانجليزية تم ادخاله مسبقا',
        ]);
        $data = $request->except('_token');
        if(Category::create($data))
            return response()->json(['status'=>200]);
        else
            return response()->json(['status'=>405]);
    }



    public function edit(Category $category)
    {
        return view('Admin/category.parts.edit',compact('category'));
    }


    public function update(request $request,$id)
    {
        $inputs = $request->validate([
            'name_ar'   => 'required|max:255|unique:categories,name_ar,'.$id,
            'name_en'   => 'required|max:255|unique:categories,name_en,'.$id,
        ]);
        $category = Category::findOrFail($id);

        if ($category->update($inputs))
            return response()->json(['status' => 200]);
        else
            return response()->json(['status' => 405]);
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

    public function delete(Request $request)
    {
        $row = Category::findOrFail($request->id);

        $row->delete();
        return response(['message'=>'تم الحذف بنجاح','status'=>200],200);
    }
}
