<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Modules\Admin\Bll;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Description of Category
 *
 * @author fz
 */
class UpdateProfile
{
    public static function validate($request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);
        return $validate;
    }

    public static function getUserAccount()
    {
        $user = User::where('id', Auth::id())->first();
        return $user;
    }
    public static function emailUpdate($request)
    {
        $user = User::where([
            ['email', $request->email],
            ['id', '!=', Auth::id()]
        ])->first();
        return $user;
    }
    public static function updateProfile(Request $request)
    {

        if ($request->img_url) {
            $imageName['img_url'] = time() . '.' . request()->img_url->getClientOriginalExtension();
            request()->img_url->move(public_path('upload/adminProfile'), $imageName['img_url']);

            User::where('id', $request->id)->update([
                'photo' => $imageName['img_url'],
                'name' => $request->name,
                'email' => $request->email,
            ]);
        } else {
            User::where('id', $request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }
    }
}
