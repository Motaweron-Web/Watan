<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class CompanyController extends Controller
{
    public function index(request $request)
    {
        if($request->ajax()) {
            $data = Company::latest()->get();
            return Datatables::of($data)
                ->addColumn('action', function ($data) {
                    return '
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $data->id . '" data-title="' . $data->name_ar . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('image', function ($data) {
                    $name = $data->name_ar;
                    return '
                    <img onclick="window.open(this.src)" src="'.$data->image.'" alt="profile-user" class="brround  avatar-sm w-32 ml-2"> '.$name
                        ;
                })
                ->addColumn('agent', function ($data) {
                    $link = route('agents',$data->id);
                    return '<a class="btn btn-pill btn-success" href="'.$link.'">عرض <i class="fa fa-user text-white"></i> </a>';
                })
                ->editColumn('about_ar', function ($data) {
                    return Str::limit($data->name_ar,100);
                })
                ->addColumn('number', function ($data) {
                    return '<a href = "tel:'.$data->number.'"> '.$data->number.'</a>';
                })
                ->editColumn('user_id', function ($data) {
                    return ($data->user->name) ?? '';
                })
                ->editColumn('location', function ($data) {
                    $link = "https://www.google.com/maps/search/?api=1&query=".$data->latitude.",".$data->longitude;
                    return '<a class="btn btn-pill btn-info" href="'.$link.'"> عرض <i class="fa fa-map-marker-alt text-white"></i>  </a>';
                })
                ->addColumn('contact', function ($data) {
                    return '
                    <div class="wideget-user-icons mb-4">
						<a href="'.$data->facebook.'" class="bg-facebook text-white btn btn-circle"><i class="fab fa-facebook"></i></a>
						<a href="https://wa.me/'.$data->whatsapp.'" class="bg-green-dark text-white btn btn-circle"><i class="fab fa-whatsapp"></i></a>
						<a href="'.$data->twitter.'" class="bg-info text-white btn btn-circle"><i class="fab fa-twitter"></i></a>
						<a href="'.$data->instagram.'" class="bg-google text-white btn btn-circle"><i class="fab fa-instagram"></i></a>
					</div>
                    ';
                })
                ->escapeColumns([])
                ->make(true);
        }else{
            return view('Admin/company/index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
        $row = Company::findOrFail($request->id);
        if (file_exists($row->getAttributes()['image'])) {
            unlink($row->getAttributes()['image']);
        }
        $row->delete();
        return response(['message'=>'تم الحذف بنجاح','status'=>200],200);
    }
}
