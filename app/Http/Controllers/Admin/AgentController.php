<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Category;
use App\Models\Company;
use App\Models\SubCategory;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AgentController extends Controller
{

    use PhotoTrait;

    public function index(Request $request,$id)
    {
        $company=Company::findOrFail($id);

        if($request->ajax()) {
            $data = Agent::where('company_id',$id)->where('user_id',$company->user_id)->orderBy('id','DESC')->get();
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


                ->editColumn('phone', function ($data) {
                 $phone=$data->phone_code.$data->phone;
                 return '<a href="tel:">'.$phone.'</a>';
                })


                ->editColumn('image', function ($data) {
                    return '
                    <img alt="logo" onclick="window.open(this.src)" style="cursor:pointer" class="avatar-lg bradius" src="'.$data->image.'">
                    ';
                })

                ->editColumn('whatsapp', function ($data) {
                    return '
                    <div class="wideget-user-icons mb-4">
						<a href="https://wa.me/'.$data->whatsapp.'" class="bg-green-dark text-white btn btn-circle"><i class="fab fa-whatsapp"></i></a>
					</div>
                    ';
                })



                ->escapeColumns([])
                ->make(true);
        }else{
            return view('Admin/agent/index',compact('company'));
        }




    }

    public function create($id)
    {
        $company=Company::findOrFail($id);
        return view('Admin/agent.parts.create',compact('company'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name_ar'      => 'required|max:255|unique:agents,name_ar',
            'name_en'      => 'required|max:255|unique:agents,name_en',
            'company_id'   => 'required|exists:companies,id',
            'about'        =>'required',
            'whatsapp'        =>'required',
            'image'        => 'required|max:255|image',

        ],[
            'name_ar.unique'     => 'اسم القسم الفرعي العربي تم ادخاله مسبقا',
            'name_en.unique'     => 'اسم القسم الفرعي الانجليزية تم ادخاله مسبقا',
            'category_id.exists'     =>'هذا القسم غير مدرجة لدينا',
            'image.required'     => 'يرجي رفع صورة للقسم الفرعي',

        ]);
        $company=Company::findOrFail($request->company_id);
        $data = $request->except('_token','image');
        $data['image'] = $this->saveImage($request->image,'assets/uploads/agents','no');
        $data['user_id']=$company->user_id;
        if(Agent::create($data))
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
        $agent=Agent::findOrFail($id);
        return view('Admin/agent.parts.edit',compact('agent'));
    }



    public function update(request $request,$id)
    {
        $inputs = $request->validate([
            'name_ar'      => 'required|max:255|unique:agents,name_ar,'.$id,
            'name_en'      => 'required|max:255|unique:agents,name_en,'.$id,
            'about'        =>'required',
            'whatsapp'        =>'required',
            'image'        => 'nullable|max:255|image',
        ]);
        $agent = Agent::findOrFail($id);
        if($request->has('image')){
            if (file_exists($agent->image)) {
                unlink($agent->image);
            }
            $inputs['image'] = $this->saveImage($request->image,'assets/uploads/agents','no');
        }
        if ($agent->update($inputs))
            return response()->json(['status' => 200]);
        else
            return response()->json(['status' => 405]);
    }

    public function delete(Request $request)
    {
        $row = Agent::findOrFail($request->id);
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
