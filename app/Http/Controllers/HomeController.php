<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Modules\Bills\Models\Bill;
use App\Modules\Bills\Models\Sale;
use App\Modules\Category\models\Category;
use App\Modules\Customeres\models\Customer;
use App\Modules\Product\models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
/*      Role::create(["name"=>"admin"]);*/
           auth()->user()->assignRole('admin');
//dd($data);
        $data['categories']=Category::all();
        $data['products']=Product::all();
        $data['prod']=Product::orderBy('id','desc')->first();
        $data['suppl']=Customer::where('type',2)->orderBy('id','desc')->first();
        $data['customr']=Customer::where('type',1)->orderBy('id','desc')->first();
        $bill=Bill::where('type_id',1)->pluck('id')->toArray();
        $sale=Sale::whereIn('bill_id',$bill)->groupBy('product_id')->take(5)->pluck('product_id')->toArray();
        $data['hproducts']=Product::whereIn('id',$sale)->get();
        $data['lproducts']=Product::orderBy('total','asc')->take(5)->get();
        $data['zp']=Product::where('total',0)->first();

        $data['suppliers']=Customer::where('type',2)->get();
        $data['customers']=Customer::where('type',1)->get();
        $data['d1']=Bill::where('type_id',1)->sum('total');
       $data['d2']=Bill::where('type_id',2)->sum('total');
       $data['d3']=Bill::where('type_id',3)->sum('total');
        $data['d4']=Bill::where('type_id',4)->sum('total');
       $data['d5']=Bill::where('type_id',5)->sum('total');


        return view('admin.content',$data);
    }
    public function private()
    {
        return view('private');
    }

    public function users()
    {
        return User::all();
    }
}
