<?php

namespace App\Modules\Admin\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\Admin\Bll\UserManagement;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Auth;
class UserManagementController extends Controller
{
    public function listUsers(){

        if (request()->ajax()) {
            $users =
                DB::table('users')
                    ->join('model_has_roles','model_has_roles.model_id','=','users.id')
                    ->join('roles','roles.id','=','model_has_roles.role_id')
                    ->where('roles.name','!=','admin')
                    ->select('users.*','roles.ar_name as roleName')
                    ->get();

            return DataTables::of($users)
            ->addColumn('action', function($data){
                $btn = '<a href="'.url('/admin/editUser',$data->id).'" id="'.$data->id.'"" id="edit"  class="edit btn btn-primary btn-sm editCategory"><i class="fa fa-edit"></i></a>';
                // $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>';
                $btn = $btn.'
                 <form action="'.url('/admin/deleteUser/',$data->id).'" id="delform2" method="get" style="display: inline-block">
                    <input type="hidden" name="_method" value="delete">
                <a href="'.url('/admin/deleteUser',$data->id).'" data-id="'.$data->id.'" class="btn btn-danger btn-sm delete-event-management"><i class="fa fa-trash"></i></a>
                </form>
             ';
                return $btn;

            })
                ->escapeColumns(['id', 'name', 'email','roleName','Action'])
                ->make(true);
        }

        return view('usersManagmenet.listUsers');
    }
    public function addUser()
    {
        $roles = Role::where('name','!=','admin')->get();
        return view('usersManagmenet.addUser',['roles'=>$roles]);

    }

    public function storeUser(Request $request){

        UserManagement::validate($request);

        if($request->password != $request->confirm)
        {
            return redirect()->back()->with('error',trans('main.Password must match with confirmPassword'));
        }
        UserManagement::addUser($request);
        UserManagement::addUser_Role($request);
          if(!auth()){
            $user=User::orderBy('id','desc')->first();
              $user = Auth::user();
          }
        return redirect('admin/listUsers');
    }

    public function editUser($id)
    {
        $roles = Role::where('name','!=','admin')->get();
        $user = UserManagement::getSingleUser($id);
        return view('usersManagmenet.editUser',['user'=>$user,'roles'=>$roles]);
    }
    public function updateUser(Request $request)
    {
        if($request->password != $request->confirm)
        {
            return redirect()->back()->with('error',trans('main.Password must match with confirmPassword'));
        }
        UserManagement::updateUser($request);
        return redirect('admin/listUsers');
    }
    public function deleteUser($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->back();
    }
}
