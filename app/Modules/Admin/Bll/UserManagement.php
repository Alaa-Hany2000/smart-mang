<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Modules\Admin\Bll;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Description of Category
 *
 * @author fz
 */
class UserManagement {
    public static function validate($request)
    {
        $validate = $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|min:5',
            'confirm' => 'required|min:5',
            'roleID' => 'required'
        ]);
        return $validate;
    }
    public static function addUser($request)
    {
        $password = bcrypt($request->password);
        $newUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>$password,
            'created_at' => Carbon::now(),
            'updated_at' =>NULL,
        ]);
        return $newUser;
    }
    public static function addUser_Role($request)
    {
        $user = User::where('email',$request->email)->first();
        $role = Role::where('id',$request->roleID)->first();
        $permissions = DB::table('permissions')
        ->join('role_has_permissions','role_has_permissions.permission_id','=','permissions.id')
        ->where('role_has_permissions.role_id',$request->roleID)
        ->select('permissions.name')
        ->get();
        foreach($permissions as $permision)
        {
            $user->givePermissionTo($permision->name);
        }
        $user->assignRole($role->name);
    }

    public static function getSingleUser($id)
    {
        $user = DB::table('users')
        ->join('model_has_roles','model_has_roles.model_id','=','users.id')
        ->join('roles','roles.id','=','model_has_roles.role_id')
        ->where('model_has_roles.model_id',$id)
        ->select('users.*','roles.name as roleName')
        ->first();
        return $user;
    }
    public static function updateUser($request){

        $user = User::where('id',$request->id)->first();
        $role = Role::where('id',$request->roleID)->first();
        $permissions = DB::table('permissions')
        ->join('role_has_permissions','role_has_permissions.permission_id','=','permissions.id')
        ->where('role_has_permissions.role_id',$request->roleID)
        ->select('permissions.name')
        ->get();

        if($user)
        {
            $user->name = $request->name;
            $user->email = $request->email;
            if($request->password != null)
            {
                $password = bcrypt($request->password);
                $user->password = $password;
            }
            foreach($permissions as $permision)
            {
                $user->givePermissionTo($permision->name);
            }
            $user->assignRole($role->name);
            $user->save();
        }
    }


}
