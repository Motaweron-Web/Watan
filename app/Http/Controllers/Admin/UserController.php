<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\User;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(request $request)
    {
        if($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                ->addColumn('action', function ($data) {
                    return '
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $data->id . '" data-title="' . $data->name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('status', function ($data) {
                    if($data->status == 0)
                        $span = '<span style="cursor: pointer" data-id="'.$data->id.'" class="badge badge-danger statusSpan">محظور</span';
                    else
                        $span = '<span style="cursor: pointer" data-id="'.$data->id.'"  class="badge badge-success statusSpan">مفعل</span';

                    return $span;
                })
                ->editColumn('image', function ($data) {
                    $name = $data->name;
                    return '
                    <img onclick="window.open(this.src)" src="'.$data->image.'" alt="profile-user" class="brround  avatar-sm w-32 ml-2"> '.$name
                        ;
                })
                ->addColumn('contact', function ($data) {
                    return '
                    <div class="wideget-user-icons mb-4">
                    	<a href="tel:'.$data->phone.'" class="bg-info text-white btn btn-circle"><i class="fe fe-phone"></i></a>
						<a href="https://wa.me/'.$data->whatsapp.'" class="bg-green-dark text-white btn btn-circle"><i class="fab fa-whatsapp"></i></a>
						<a href="mailto:'.$data->email.'" class="bg-facebook text-white btn btn-circle"><i class="fe fe-mail"></i></a>
					</div>
                    ';
                })
                ->escapeColumns([])
                ->make(true);
        }else{
            return view('Admin/user/index');
        }
    }

    public function userActivation(Request $request)
    {
        $user = User::find($request->id);
        ($user->status == '0') ? $user->status = '1' : $user->status = '0';
        $user->save();
        return response()->json(
            [
                'success' => true,
                'message' => 'تم تغيير حالة المستخدم بنجاح'
            ]);
    }


    public function delete(request $request)
    {
        $user = User::findOrFail($request->id);
        if (file_exists($user->getAttributes()['image'])) {
            unlink($user->getAttributes()['image']);
        }
        $user->delete();
        return response(['message'=>'تم الحذف بنجاح','status'=>200],200);
    }
}
