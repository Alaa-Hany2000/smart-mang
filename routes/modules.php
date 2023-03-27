<?php

Route::group(array('prefix' => 'admin'), function () {
    //    Login and Logout AdminAttendanceFiltter
    Route::get('/login', \App\Http\Controllers\AdminController::class . "@getLogin")->name('login');
    Route::post('/login', \App\Http\Controllers\AdminController::class . "@postLogin");

    Route::get('/dashboard', App\Http\Controllers\HomeController::class . '@index')->name('home');
    Route::get('/chart-line-ajax', App\Http\Cosntrollers\HomeController::class . '@chartLineAjax')->name('chartLineAjax')->middleware('role:admin');
    Route::get('/', App\Http\Controllers\HomeController::class . '@index');

    Route::group(['middleware' => 'auth'], function () {

        Route::get('/logout', \App\Modules\Admin\Controllers\AdminController::class . "@logout");
        Route::get('/editAccount', \App\Modules\Admin\Controllers\AdminController::class . "@getAdminAccount");
        Route::post('/updateProfile', \App\Modules\Admin\Controllers\AdminController::class . "@updateProfile");
        Route::post('/deleteImage', \App\Modules\Admin\Controllers\AdminController::class . "@deleteImage");
        Route::post('/changepassword', \App\Modules\Admin\Controllers\AdminController::class . "@changepassword");
        Route::get('/listUsers', \App\Modules\Admin\Controllers\UserManagementController::class . "@listUsers");
        Route::get('/editUser/{id}', \App\Modules\Admin\Controllers\UserManagementController::class . "@editUser")->middleware('role:admin');
        Route::get('/addUser', \App\Modules\Admin\Controllers\UserManagementController::class . "@addUser")->middleware('role:admin');
        Route::post('/updateUser', \App\Modules\Admin\Controllers\UserManagementController::class . "@updateUser")->middleware('role:admin');
        Route::post('/storeUser', \App\Modules\Admin\Controllers\UserManagementController::class . "@storeUser")->middleware('role:admin');
        Route::get('/deleteUser/{id}', \App\Modules\Admin\Controllers\UserManagementController::class . "@deleteUser")->middleware('role:admin');





        //  Settings
        /*================Admin Setting control =========================*/
        // Route::resource('settings', App\Http\Controllers\Admin\AdminSettingController::class)->middleware('role:admin');
        /*  Route::post('/settings/store', \App\Modules\Admin\Controllers\SettingsController::class . "@store")->name('settings.store')->middleware('role:admin');
        Route::post('/settings/update', \App\Modules\Admin\Controllers\SettingsController::class . "@update")->name('settings.update')->middleware('role:admin');
        Route::delete('/settings/delete/{id}', \App\Modules\Admin\Controllers\SettingsController::class . "@delete")->name('settings.delete')->middleware('role:admin');
*/

        ////////////////////////////categories//////////////////////////////////////////////////////
        Route::resource('adminCategories', App\Modules\Category\Controllers\Categorycontroller::class);
        Route::post('adminCategories/updatee', App\Modules\Category\Controllers\Categorycontroller::class . '@updatee');
        ////////////////////////////Attendance//////////////////////////////////////////////////////
        Route::resource('adminAttendance', App\Modules\Salaries\Controllers\AdminAttendanceController::class);
        Route::resource('adminFiltter', App\Modules\Salaries\Controllers\AdminAttendanceFiltter::class);
        Route::any('adminFilttert/{date?}/{mstore?}/{user?}', App\Modules\Salaries\Controllers\AdminAttendanceFiltter::class . '@getfillter')->name('adminFiltter.getfillter');

        /////////////////////////////////////units route////////////////////////////////////////

        Route::resource('adminUnits', App\Modules\Units\Controllers\adminUintController::class);
        Route::post('adminUnits/updatee', App\Modules\Units\Controllers\adminUintController::class . '@updatee');

        ///////////////////////////stores routes ////////////////////////////////////////////////////////
        Route::resource('adminStores', App\Modules\stores\Controllers\AdminstoreController::class);
        Route::post('adminStores/employees', App\Modules\stores\Controllers\AdminstoreController::class . '@employees');
        Route::post('adminStores/categories', App\Modules\stores\Controllers\AdminstoreController::class . '@categories');
        Route::post('adminStores/des', App\Modules\Product\Controllers\AdminProductDest::class . '@store');

        Route::any('adminStores/delete', App\Modules\stores\Controllers\AdminstoreController::class . '@delete');
        /*        Route::any('adminStores/updatee',App\Modules\stores\Controllers\AdminstoreController::class.'@updatee');*/
        ///////////////////////////Customers routes ////////////////////////////////////////////////////////
        Route::resource('adminCustomers', App\Modules\Customeres\Controllers\adminCustomeresController::class);

        Route::any('adminCustomers/delete', App\Modules\Customeres\Controllers\adminCustomeresController::class . '@delete');
        ///////////////////////////suppliers routes ////////////////////////////////////////////////////////
        Route::resource('adminSuppliers', App\Modules\Customeres\Controllers\adminSupplieresController::class);

        Route::any('adminSuppliers/delete', App\Modules\Customeres\Controllers\adminSupplieresController::class . '@delete');
        ///////////////////////////salaries routes ////////////////////////////////////////////////////////
        Route::resource('adminSalaries', App\Modules\Salaries\Controllers\AdminSaleraysController::class);
        ///////////////////////////products routes //////////////////////////////////////////////////////// productsoptions
        Route::resource('adminProducts', App\Modules\Product\Controllers\AdminProductsController::class);
        Route::any('adminProducts/delete', App\Modules\Product\Controllers\AdminProductsController::class . '@delete');
        Route::get('adminProducts/updtestactiveatee', App\Modules\Product\Controllers\AdminProductsController::class . '@updatePublished')->name('updtestactiveatee');

        Route::get('getprodects', App\Modules\Product\Controllers\AdminProductsController::class . '@getprodects');
        Route::get('productsoptions', App\Modules\Bills\Controllers\AdminBillController::class . '@productsoptions');

        //////////////////////////bills \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ blances
        Route::resource('adminBills', App\Modules\Bills\Controllers\AdminBillController::class);
        Route::post('adminBills/paid', App\Modules\Bills\Controllers\AdminBillController::class . '@pad')->name('pad');

        Route::post('adminBills/sales', App\Modules\Bills\Controllers\AdminBillController::class . '@sales')->name('adminBill.sales');
        Route::get('adminBills/printPage/{id}', App\Modules\Bills\Controllers\AdminBillController::class . '@printPage')->name('printPage');
        Route::get('adminBills/pdfpage/{id}', App\Modules\Bills\Controllers\AdminBillController::class . '@pdfpage')->name('pdfpage');
        Route::resource('spluersBill', App\Modules\Bills\Controllers\AdminSuplersBillController::class);
        Route::resource('billsreback', App\Modules\Bills\Controllers\AdminRebackbills::class);
        Route::get('billsreback/printPage/{id}', App\Modules\Bills\Controllers\AdminRebackbills::class . '@printPage')->name('printPageback');
        Route::resource('blances', App\Modules\Balances\Controllers\BalanceController::class);
        Route::resource('barrens', App\Modules\Barren\Controllers\AdminBarrenController::class);

        Route::post('spluersBill/paid', App\Modules\Bills\Controllers\AdminSuplersBillController::class . '@pad')->name('padto');
        Route::get('spluersBill/printPage/{id}', App\Modules\Bills\Controllers\AdminSuplersBillController::class . '@printPage')->name('printPagesu');
        Route::post('billsreback/paid', App\Modules\Bills\Controllers\AdminRebackbills::class . '@pad')->name('padtocu');

        Route::post('billsreback/paid', App\Modules\Bills\Controllers\AdminRebackbills::class . '@pad')->name('padtocu');
        Route::resource('spluersBack', App\Modules\Bills\Controllers\AdminRebacktoSuplier::class);
        Route::post('spluersBack/paid', App\Modules\Bills\Controllers\AdminRebacktoSuplier::class . '@pad')->name('padtosub');
        Route::get('spluersBack/printPage/{id}', App\Modules\Bills\Controllers\AdminRebacktoSuplier::class . '@printPage')->name('printPagesub');

        Route::resource('damagebill', App\Modules\Bills\Controllers\Admindamage::class);
        Route::get('damagebill/printPage/{id}', App\Modules\Bills\Controllers\Admindamage::class . '@printPage')->name('printPagedamage');

        Route::post('notifcation-read/{id}', function ($id) {
            $notification = auth()->user()->notifications()->where('id', $id)->first();

            if ($notification) {
                $notification->markAsRead();
                return response()->json(true);
            }
        })->name('notifcation.read');
    });

    Route::get('/stores/pdf', App\Modules\stores\Controllers\AdminstoreController::class . '@createPDF')->name('stores.pdf');

    Route::get('stores/export', App\Modules\stores\Controllers\AdminstoreController::class . '@export')->name('stores.excel');;
});
Route::get('/private', App\Http\Controllers\HomeController::class . '@private')->name('private');
Route::get('/users', App\Http\Controllers\HomeController::class . '@users')->name('users');
//
//Route::get('messages', 'MessageController@fetchMessages');spluersBill
//Route::post('messages', 'MessageController@sendMessage');
//Route::get('/private-messages/{user}', 'MessageController@privateMessages')->name('privateMessages');
//Route::post('/private-messages/{user}', 'MessageController@sendPrivateMessage')->name('privateMessages.store');


Route::get('/invoice', App\Modules\Invoices\Controllers\InvoiceController::class . '@index')->name('invoice');

Route::get('lang/{lang}', function ($lang) {
    session()->has('lang') ? session()->forget('lang') : '';
    $lang == 'ar' ? session()->put('lang', 'ar') : session()->put('lang', 'en');
    return back();
});
