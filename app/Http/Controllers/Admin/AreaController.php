<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AreaController extends Controller
{
    use PhotoTrait;
    public function index(request $request)
    {
        if($request->ajax()) {
            $data = Area::orderBy('id','DESC')->get();
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
                ->addColumn('subArea', function ($data) {
                    $link = route('subArea',$data->id);
                    return '<a class="btn btn-pill btn-success" href="'.$link.'">معاينة <i class="fa fa-map text-white"></i> </a>';
                })
                ->editColumn('image', function ($data) {
                    return '
                    <img alt="Slider" onclick="window.open(this.src)" style="cursor:pointer" class="avatar-lg bradius" src="'.$data->image.'">
                    ';
                })
                ->escapeColumns([])
                ->make(true);
        }else{
            return view('Admin/area/index');
        }
    }

    public function create()
    {
        return view('Admin/area.parts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_ar'   => 'required|max:255|unique:areas,name_ar',
            'name_en'   => 'required|max:255|unique:areas,name_en',
            'image'      => 'required|max:255|image',
        ],[
            'name_ar.unique'     => 'اسم الدولة العربي تم ادخاله مسبقا',
            'name_en.unique'     => 'اسم الدولة الانجليزية تم ادخاله مسبقا',
            'image.required'     => 'يرجي رفع صورة لعلم الدولة',
        ]);
        $data = $request->except('_token','image');
        $data['image'] = $this->saveImage($request->image,'assets/uploads/area');
        if(Area::create($data))
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


    public function edit(Area $area)
    {
        return view('Admin/area.parts.edit',compact('area'));
    }


    public function update(request $request,$id)
    {
        $inputs = $request->validate([
            'image'         => 'nullable|mimes:jpeg,jpg,png,gif,svg',
            'name_ar'       => 'required',
            'name_en'       => 'required',
        ]);
        $area = Area::findOrFail($id);
        if($request->has('image')){
            if (file_exists($area->image)) {
                unlink($area->image);
            }
            $inputs['image'] = $this->saveImage($request->image,'assets/uploads/area');
        }
        if ($area->update($inputs))
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
        $row = Area::findOrFail($request->id);
        if (file_exists($row->getAttributes()['image'])) {
            unlink($row->getAttributes()['image']);
        }
        $row->delete();
        return response(['message'=>'تم الحذف بنجاح','status'=>200],200);
    }
}
