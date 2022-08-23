<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FilesOfProjectsAndPosts;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProjectController extends Controller
{

    public function index(request $request)
    {
        if($request->ajax()) {
            $data = Project::latest()->get();
            return Datatables::of($data)
                ->addColumn('action', function ($data) {
                    return '
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $data->id . '" data-title="' . $data->name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('project_status', function ($data) {
                    if($data->project_status == 'new')
                        $span = '<span class="badge badge-info">جديد</span';
                    elseif($data->project_status == 'ongoing')
                        $span = '<span class="badge badge-warning">جاري التنفيذ</span';
                    elseif($data->project_status == 'finished')
                        $span = '<span class="badge badge-primary">منتهية</span';
                    else
                        $span = '<span class="badge badge-default">غير معرف</span';
                    return $span;
                })
                ->editColumn('added_by', function ($data) {
                    try {

                        if($data->user)
                            return $data->user->name;

                        elseif ($data->agent)
                            return $data->agent->name_ar;

                        elseif ($data->company)
                            return $data->company->name_ar;

                        else
                            return "غير معرف";

                    }
                    catch (\Exception $e){
                        return "خطأ بيانات";
                    }
                })
                ->addColumn('image', function ($data) {
                    try {
                    $image = (FilesOfProjectsAndPosts::where([['project_id',$data->id],['type','image']])->first()->image) ?? '';
                    return '
                    <img onclick="window.open(this.src)" src="'.getFile($image).'" alt="user" class="brround  avatar-sm w-32 ml-2"> '.$data->name
                        ;
                    }
                    catch (\Exception $e){
                        return $e->getMessage();
                    }
                })
                ->editColumn('price', function ($data) {
                    return '<span class="font-weight-bold fs-15">'.$data->min_price.'</span> : <span class="font-weight-bold fs-15">'.$data->max_price.' د ع</span>';
                })
                ->escapeColumns([])
                ->make(true);
        }else{
            return view('Admin/project/index');
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
}
