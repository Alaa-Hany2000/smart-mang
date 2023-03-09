<?php

namespace App\Modules\Invoices\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UserStore;
use App\Modules\Category\models\Category;
use App\Modules\Category\models\MstoreCategory;
use App\Modules\Customeres\models\Customer;
use App\Modules\Product\models\Product;
use App\Modules\Stores\models\Mstore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Facades\Invoice;
use Yajra\DataTables\DataTables;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $c = Customer::find(1);
        $customer = new Buyer([
            'name'          => $c->name,
            'custom_fields' => [
                'email' => $c->email,
                'phone' => $c->phone,
                'address' => $c->address,
            ],
        ]);

        $item = (new InvoiceItem())->title('Service 1')->pricePerUnit(2);

        $invoice = Invoice::make()
            ->buyer($customer)
            ->discountByPercent(10)
            ->taxRate(15)
            ->shipping(1.99)
            ->addItem($item);

        return $invoice->stream();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ds=UserStore::where('user_id',auth()->user()->id)->orderBy('id','desc')->first();
        if($ds){
            $sc=MstoreCategory::where('store_id',$ds->store_id)->pluck('category_id')->toArray();
            $data['categories']=Category::whereIn('id',$sc)->get();
            $data['products']=Product::whereIn('category_id',$sc)->where('total','>',0)->get();

        }else{
            $data['categories']=Category::get();
            $data['products']=Product::get();
        }
        $data['customers']=Customer::where('type',1)->get();
         return view('bills.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
