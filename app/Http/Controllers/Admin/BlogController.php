<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Service;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class BlogController extends Controller
{

    use PhotoTrait;
    public function index(request $request)
    {
        if($request->ajax()) {
            $data = Blog::orderBy('id','DESC')->get();
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
                    <img alt="Slider" onclick="window.open(this.src)" style="cursor:pointer" class="avatar-lg bradius" src="'.$data->image.'">
                    ';
                })

                ->editColumn('description', function ($data) {
                    return $string=Str::limit($data->description,30);
                })

                ->editColumn('description', function ($data) {
                    return $string=Str::limit($data->description,30);
                })


                ->escapeColumns([])
                ->make(true);
        }else{
            return view('Admin/blogs/index');
        }
    }

    public function create()
    {
        return view('Admin/blogs.parts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_ar'   => 'required|max:255|unique:blogs,name_ar',
            'name_en'   => 'required|max:255|unique:blogs,name_en',
            'description_ar'   => 'required|max:255|unique:blogs,description_ar',
            'description_en'   => 'required|max:255|unique:blogs,description_en',
            'image'      => 'required|max:255|image',

        ],[
            'name_ar.unique'     => 'اسم المقال العربي تم ادخاله مسبقا',
            'name_en.unique'     => 'اسم المقال الانجليزية تم ادخاله مسبقا',
            'description_ar.unique'     => 'وصف المقال العربي تم ادخاله مسبقا',
            'description_en.unique'     => 'وصف المقال الانجليزية تم ادخاله مسبقا',
            'image.required'     => 'يرجي رفع صورة المقال',
            'icon.required'     => 'يرجي رفع صورة ايقون المقال',

        ]);
        $data = $request->except('_token','image');
        $data['image'] = $this->saveImage($request->image,'assets/uploads/blogs','no');

        if(Blog::create($data))
            return response()->json(['status'=>200]);
        else
            return response()->json(['status'=>405]);
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


    public function edit(Blog $blog)
    {
        return view('Admin/blogs.parts.edit',compact('blog'));
    }


    public function update(request $request,$id)
    {
        $inputs = $request->validate([
            'name_ar'   => 'required|max:255|unique:blogs,name_ar,'.$id,
            'name_en'   => 'required|max:255|unique:blogs,name_en,'.$id,
            'description_ar'   => 'required|max:255|unique:blogs,description_ar,'.$id,
            'description_en'   => 'required|max:255|unique:blogs,description_en,'.$id,
            'image'      => 'nullable|max:255|image',
        ]);
        $blog = Blog::findOrFail($id);
        if($request->has('image')){
            if (file_exists($blog->image)) {
                unlink($blog->image);
            }
            $inputs['image'] = $this->saveImage($request->image,'assets/uploads/blogs','no');
        }



        if ($blog->update($inputs))
            return response()->json(['status' => 200]);
        else
            return response()->json(['status' => 405]);
    }


    public function destroy($id)
    {
        //
    }

    public function delete(Request $request)
    {
        $row = Blog::findOrFail($request->id);
        if (file_exists($row->getAttributes()['image'])) {
            unlink($row->getAttributes()['image']);
        }

        $row->delete();
        return response(['message'=>'تم الحذف بنجاح','status'=>200],200);
    }
}
