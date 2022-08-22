<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Service;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ServiceController extends Controller
{

    use PhotoTrait;
    public function index(request $request)
    {
        if($request->ajax()) {
            $data = Service::orderBy('id','DESC')->get();
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
                ->editColumn('icon', function ($data) {
                    return '
                    <img alt="Slider" onclick="window.open(this.src)" style="cursor:pointer" class="avatar-lg bradius" src="'.$data->icon.'">
                    ';
                })
                ->escapeColumns([])
                ->make(true);
        }else{
            return view('Admin/service/index');
        }
    }

    public function create()
    {
        return view('Admin/service.parts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_ar'   => 'required|max:255|unique:services,name_ar',
            'name_en'   => 'required|max:255|unique:services,name_en',
            'image'      => 'required|max:255|image',
            'icon'      => 'required|max:255|image',

        ],[
            'name_ar.unique'     => 'اسم الخدمة العربي تم ادخاله مسبقا',
            'name_en.unique'     => 'اسم الخدمة الانجليزية تم ادخاله مسبقا',
            'image.required'     => 'يرجي رفع صورة الخدمة',
            'icon.required'     => 'يرجي رفع صورة ايقون الخدمة',

        ]);
        $data = $request->except('_token','image','icon');
        $data['image'] = $this->saveImage($request->image,'assets/uploads/service/images','no');
        $data['icon'] = $this->saveImage($request->icon,'assets/uploads/service/icons','no');

        if(Service::create($data))
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


    public function edit(Service $service)
    {
        return view('Admin/service.parts.edit',compact('service'));
    }


    public function update(request $request,$id)
    {
        $inputs = $request->validate([
            'name_ar'   => 'required|max:255|unique:services,name_ar,'.$id,
            'name_en'   => 'required|max:255|unique:services,name_en,'.$id,
            'image'      => 'nullable|max:255|image',
            'icon'      => 'nullable|max:255|image',
        ]);
        $service = Service::findOrFail($id);
        if($request->has('image')){
            if (file_exists($service->image)) {
                unlink($service->image);
            }
            $inputs['image'] = $this->saveImage($request->image,'assets/uploads/service/images','no');
        }

        if($request->has('icon')){
            if (file_exists($service->icon)) {
                unlink($service->icon);
            }
            $inputs['icon'] = $this->saveImage($request->icon,'assets/uploads/service/icons','no');
        }


        if ($service->update($inputs))
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
        $row = Service::findOrFail($request->id);
        if (file_exists($row->getAttributes()['image'])) {
            unlink($row->getAttributes()['image']);
        }
        if (file_exists($row->getAttributes()['icon'])) {
            unlink($row->getAttributes()['icon']);
        }
        $row->delete();
        return response(['message'=>'تم الحذف بنجاح','status'=>200],200);
    }
}
