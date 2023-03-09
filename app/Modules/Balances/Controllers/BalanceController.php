<?php

namespace App\Modules\Balances\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Category\models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Modules\Product\models\Product;
use App\Modules\Balances\Models\Balance;
use App\Modules\Balances\Models\BalanceDetalies;
use App\Modules\Customeres\models\Customer;

class BalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        if (request()->ajax()) {
            //            $studies = Study::pluck("blog_id");
                        $blogsManagement =
                            DB::table('balances')
                           
                                ->join('customers', 'customers.id', '=', 'balances.customer_id')
                              
            
            
            //                ->orderByRaw('created_at')
                                ->select(
                                    'balances.*',
                                  
                                    'customers.name as customer',
            
            
                                )
                                ->get();
               //       dd($blogsManagement);
                        return DataTables::of($blogsManagement)
            
                            ->addIndexColumn()
            
                            ->addColumn('action', function ($row)  {
            
            
                    // $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>';
                
                 //    $btn = $btn. '
                //     <a href="' . route('pdfpage',$row->id) . '"class="edit btn btn-danger btn-sm"' .  '"target="_blank"'.'" ><i class="fa fa-print"></i></a>'
                  //  ;
                   
                      //     $btn = $btn . '
                      //    <div class="btn-group">
                      //   <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown">shredder
                      //     <i class="fas fa-cog"></i>
                      //     <span class="caret"></span>
                      //     <span class="sr-only">Toggle Dropdown</span>
                      //   </button>
                      //   <ul class="dropdown-menu" role="menu">
                      //             ' . $options . '
                      //   </ul>
                      // </div>
                      //  ';
                      $btn='<a href="' . route('blances.show', $row->id) . '" title="' . trans('Show'). '" data-id="' . $row->id . '" id="edit"  class="edit btn btn-success btn-sm ">'."تفاصيل حركة الحساب".'</a>';
                      return $btn;
                  })
                  ->escapeColumns(['id', 'title', 'customer', 'user', 'created_at', 'Action'])
                  ->toJson()
                  ;
  
            
                    }
                   return  view ('blances.index');
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
        $balanc=Balance::where('id',$request->balance)->first();

        if($balanc){
            if($request->pay==2){
             $balanc->total-=$request->amount;
             $balanc->save();
             $bd= new BalanceDetalies();
             $bd->user_id=$balanc->customer_id;
             $bd->balance_id =$balanc->id;
             $bd->amount-=$request->amount;
             $bd->by_id=auth()->user()->id;
 
             $bd->save();
             $balanc->last_transaction=$bd->created_at;
 
         }else{
             $balanc->total+=$request->amount;
             $balanc->save();
             $bd= new BalanceDetalies();
             $bd->user_id=$balanc->customer_id;
             $bd->balance_id =$balanc->id;
             $bd->amount+=$request->amount;
             $bd->by_id=auth()->user()->id;
 
             $bd->save();
             $balanc->last_transaction=$bd->created_at; 
         }
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $data['balance']=balance::where('id',$id)->first();
       $data['customer']=Customer::where('id',$data['balance']->customer_id)->first();
       $data['detaile']=BalanceDetalies::where('balance_id',$id)->get();
       return  view ('blances.show',$data);

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
