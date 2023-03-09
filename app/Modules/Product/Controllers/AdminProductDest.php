<?php

namespace App\Modules\Product\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Product\models\Product;
use App\Modules\Product\models\ProductMstore;
use App\Modules\Stores\models\Mstore;
use Illuminate\Http\Request;

class AdminProductDest extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
      
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $product=Product::where('id',$request->product_id)->first();
       $store=Mstore::where('id',$request->store_id)->first();
       if($request->amount>$product->total){
           return response()->json(['error' => trans('هذه الكميه غير موجوده')], 422);

       }
       $msp=ProductMstore::where('store_id',$request->store_id)->where('product_id',$request->product_id)->first();
       if($msp){
           $msp->amount=$request->amount;
           $msp->save();

       }else{
           $msp=new ProductMstore();
           $msp->product_id=$request->product_id;
           $msp->store_id=$request->store_id;
           $msp->amount=$request->amount;
           $msp->save();

       }
        return response()->json(['error' => trans('تم العملية بنجاح')], 200);

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
