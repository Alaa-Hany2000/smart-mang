<?php

namespace App\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Schema;

class SettingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index()
    {
        $settings = Setting::all();
        return view('setting', compact('settings'));

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $arabic_name = $request->display_name_in_arabic;

        $file = 'settings';
        $array = \Illuminate\Support\Facades\Lang::get($file);

//        dd($array);
//        array_push($array, $request->display_name => $arabic_name);
        $array[$request->display_name]= $arabic_name;
//        $this->addToLang('settings', $request->display_name, $arabic_name);
        dd($array);
//        Setting::create([
//            'key' => str_replace(' ', '_', $request->key),
//            'display_name' => $request->display_name,
//            'type' => $request->type,
//        ]);

        return redirect()->back()->with('success', trans('Settings Updated Successfully'));
    }

    /**
     * A function to Add a specific word translation in a specified file
     * @param $file
     * @param $word
     * @param $translation
     * @return void
     */
    private function addToLang($file, $word, $translation)
    {
        $array = \Illuminate\Support\Facades\Lang::get($file);
        array_push($array, [$word => $translation]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        foreach ($request->all() as $key => $value) {

            if ($key == '_token' || $value == null)
                continue;

            $setting = Setting::where('key', $key)->first();

            if ($setting->type == 'image' && $value == null) {
                continue;
            }

            if ($setting->type == 'file' && $value == null) {
                continue;
            }

            if ($setting->type == 'text') {
                $setting->update(['value' => $value]);
            }
            if ($setting->type == 'image') {
                $img = $request->file($key)->storeAs('settings', time() . '.' . $request->file($key)->getClientOriginalExtension());

                $setting->update(['value' => $img]);
            }
        }
        return redirect()->back()->with('success', trans('Settings Updated Successfully'));
    }


    /**
     * @param $id
     * @return Response
     */
    public function delete($id)
    {
        $setting = Setting::where('id', $id)->delete();

        if ($setting)
            return response(['success' => 'تم الحذف بنجاح']);
        else
            return response(['error' => 'حدث خطأ ما']);
    }


}
