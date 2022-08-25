<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FilesOfProjectsAndPosts;
use App\Models\Post;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class PostController extends Controller
{
    //


    public function postProfile($id){
        $post = Post::with(['services','projects'])->findOrFail($id);
        $attachments['images'] = FilesOfProjectsAndPosts::where('post_id',$id)->where('type','image')->get();
        $attachments['videos'] = FilesOfProjectsAndPosts::where('post_id',$id)->where('type','video')->get();
        $attachments['files']  = FilesOfProjectsAndPosts::where('post_id',$id)->where('type','file')->get();
        return view('Admin/posts/profile',compact('post','attachments'));

    }




    public function index(request $request)
    {
        if($request->ajax()) {
            $data = Post::latest()->get();
            return Datatables::of($data)
                ->addColumn('action', function ($data) {
                    return '
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $data->id . '" data-title="' . $data->name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->addColumn('image', function ($data) {
                    try {
                        $url = route('postProfile',$data->id);
                        $image = (FilesOfProjectsAndPosts::where([['post_id',$data->id],['type','image']])->first()->image) ?? '';
                        return '
                        <a href="'.$url.'">
                    <img onclick="window.open(this.src)" src="'.getFile($image).'" alt="user" class="brround  avatar-sm w-32 ml-2">
                    '.Str::substr($data->description,0,6).'</a>';

                    }
                    catch (\Exception $e){
                        return "خطأ بيانات";
                    }
                })

                ->editColumn('status', function ($data) {
                    if($data->status == 'sale')
                        $span = '<span class="badge badge-info">بيع</span';
                    elseif($data->status == 'buy')
                        $span = '<span class="badge badge-warning">شراء</span';
                    else
                        $span = '<span class="badge badge-default">غير معرف</span';
                    return $span;
                })
                ->editColumn('advertizer_name', function ($data) {
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
                ->editColumn('category_id', function ($data) {
                    return ($data->category->name_ar.' - '.$data->sub_category->name_ar) ?? '--';
                })
                ->editColumn('created_at', function ($data) {
                    return ($data->created_at->diffForHumans()) ?? '';
                })
                ->editColumn('price', function ($data) {
                    return '<span class="font-weight-bold fs-15">'.$data->price.'</span> : <span class="font-weight-bold fs-15">'.$data->max_price.' د ع</span>';
                })
                ->escapeColumns([])
                ->make(true);
        }else{
            return view('Admin/posts/index');
        }






    }





}
