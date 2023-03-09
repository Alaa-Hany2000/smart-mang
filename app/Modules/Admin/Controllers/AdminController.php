<?php

namespace App\Modules\Admin\Controllers;
use App\Http\Controllers\Controller;
use App\Modules\Admin\Bll\UpdateProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function getLogin() {
        return view('login');
    }
    public function postLogin(Request $request) {
      //  dd($request);
        $user = User::where('email' , $request->email)->first();
        if($user && Hash::check($request->password, $user->password))
        {
            Auth::attempt(['email' => $user->email, 'password' => $request->password]);
            return redirect('/admin/dashboard');
        }

        return redirect('/admin/login')->with("error","تاكد  من البينات  من فضلك");
    }

    public function logout() {
        Auth::logout();
        return redirect('/admin/login');
    }

    public function getAdminAccount(){
        $user = UpdateProfile::getUserAccount();
        return view("adminAccount.editProfile",['user'=>$user]);
    }

    public function updateProfile(Request $request)
    {
        UpdateProfile::validate($request);
        $user = UpdateProfile::emailUpdate($request);
        if($user){
            return redirect()->back()->with('error',trans('The email has already been taken.'));
        } else{
            UpdateProfile::updateProfile($request);
            return redirect()->back()->with('success',trans('The profile had been updated successfully'));
        }

    }

    public function changepassword(Request $request) {

        $newpassword = bcrypt($request->new);
        $oldpassword = bcrypt($request->old);

        if ($request->new !== $request->confirm) {
            return response()->json(['confirm' => trans("please confirm new password")]);
        } else {
            $user = User::where('id',Auth::id())->first();
            $password = DB::table('users')
                    ->where('id', '=', $user->id)
                    ->select('password as password')
                    ->first();


            if (Hash::check($request->old, $password->password)) {

                $user->password = $newpassword;

                $user->update();
                return response()->json(['message' => trans("your Password Changed")]);
            } else {
                return response()->json(['fail' => trans("your old password not correct")]);
            }
        }
    }

    public function deleteImage(){
        $user = User::where('id',Auth::id())->first();
        if($user){
            $user->photo = null;
            $user->save();
        }
        return response()->json(['message' => trans("your profile image has been deleted")]);
    }


}
