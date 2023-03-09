<?php

if (!function_exists('setting')) {

    function setting($key) {
        $setting = \App\Modules\Admin\Models\Setting::where('key', $key)->first();
        return $setting->value;
    }
}
if (!function_exists('lang')) {
    function lang() {
        if (session()->has('lang')) {
            return session('lang');
        } else {
            return 'ar';
        }
    }
}
