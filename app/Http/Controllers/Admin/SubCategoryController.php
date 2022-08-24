<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Category;
use App\Models\SubArea;
use App\Models\SubCategory;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SubCategoryController extends Controller
{
    use PhotoTrait;

    public function index(Request $request,$id)
    {
        $category=Category::findOrFail($id);

        if($request->ajax()) {
            $data = SubCategory::where('category_id',$id)->orderBy('id','DESC')->get();
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
                ->editColumn('image', function ($data) {
                    return '
                    <img alt="logo" onclick="window.open(this.src)" style="cursor:pointer" class="avatar-lg bradius" src="'.$data->image.'">
                    ';
                })
//                ->addColumn('subArea', function ($data) {
//                    $link = route('subArea',$data->id);
//                    return '<a class="btn btn-pill btn-success" href="'.$link.'">معاينة <i class="fa fa-map text-white"></i> </a>';
//                })

                ->escapeColumns([])
                ->make(true);
        }else{
            return view('Admin/subCategory/index',compact('category'));
        }




    }

    public function create($id)
    {
        $category=Category::findOrFail($id);
        return view('Admin/subCategory.parts.create',compact('category'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name_ar'   => 'required|max:255|unique:sub_categories,name_ar',
            'name_en'   => 'required|max:255|unique:sub_categories,name_en',
            'category_id'   => 'required|exists:categories,id',
            'image'      => 'required|max:255|image',

        ],[
            'name_ar.unique'     => 'اسم القسم الفرعي العربي تم ادخاله مسبقا',
            'name_en.unique'     => 'اسم القسم الفرعي الانجليزية تم ادخاله مسبقا',
            'category_id.exists'     =>'هذا القسم غير مدرجة لدينا',
            'image.required'     => 'يرجي رفع صورة للقسم الفرعي',

        ]);
        $data = $request->except('_token','image');
        $data['image'] = $this->saveImage($request->image,'assets/uploads/subCategories','no');
        if(SubCategory::create($data))
            return response()->json(['status'=>200]);
        else
            return response()->json(['status'=>405]);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $subCategory=SubCategory::findOrFail($id);
        return view('Admin/subCategory.parts.edit',compact('subCategory'));
    }



    public function update(request $request,$id)
    {
        $inputs = $request->validate([
            'image'         => 'nullable|mimes:jpeg,jpg,png,gif,svg',
            'name_ar'   => 'required|max:255|unique:sub_categories,name_ar,'.$id,
            'name_en'   => 'required|max:255|unique:sub_categories,name_en,'.$id,
        ]);
        $subCategory = SubCategory::findOrFail($id);
        if($request->has('image')){
            if (file_exists($subCategory->image)) {
                unlink($subCategory->image);
            }
            $inputs['image'] = $this->saveImage($request->image,'assets/uploads/subCategories','no');
        }
        if ($subCategory->update($inputs))
            return response()->json(['status' => 200]);
        else
            return response()->json(['status' => 405]);
    }

    public function delete(Request $request)
    {
        $row = SubCategory::findOrFail($request->id);
        if (file_exists($row->getAttributes()['image'])) {
            unlink($row->getAttributes()['image']);
        }
        $row->delete();
        return response(['message'=>'تم الحذف بنجاح','status'=>200],200);
    }

    public function destroy($id)
    {
        //
    }
}
