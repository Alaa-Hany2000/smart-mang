<?php

namespace App\Modules\Barren\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Balances\Models\Balance;
use App\Modules\Balances\Models\BalanceDetalies;
use App\Modules\Barren\Models\Barren;
use App\Modules\Bills\Models\Bill;
use App\Modules\Bills\Models\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class AdminBarrenController extends Controller
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
                DB::table('barrens')
                    ->orderBy('id','desc')
                    ->join('users','barrens.by_id','users.id')
                    ->select('barrens.*','users.name As user')
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
                    $btn='<a href="' . route('barrens.show', $row->id) . '" title="' . trans('Show'). '" data-id="' . $row->id . '" id="edit"  class="edit btn btn-success btn-sm ">'."تفاصيل حركة الجرد".'</a>';
                    $btn = $btn . '
                     <form action="' . url('admin/barrens/delete', $row->id) . '" id="delform2" method="get" style="display: inline-block">
                        <input type="hidden" name="_method" value="delete">
                    <a href="javascript:void(0)" data-id="' . $row->id . '" class="btn btn-danger btn-sm delete-category"><i class="fa fa-trash"></i></a>
                    </form>
                 ';
                    return $btn;
                })
                ->escapeColumns(['id', 'start_at', 'end_at', 'user', 'created_at', 'Action'])
                ->toJson()
                ;


        }
        return  view ('barrens.index');
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
        $date1 = Carbon::createFromFormat('Y-m-d', $request->start_at);
        $date2 = Carbon::createFromFormat('Y-m-d', $request->end_at);
        $result = $date1->lte($date2); if($result !=1){
            return back();
    }
        $total_money=DB::table('bills')->where('type_id',2)->whereBetween('created_at', [$date1->format('Y-m-d')." 00:00:00", $date2->format('Y-m-d')." 23:59:59"])->sum('total');
        $total_sales=DB::table('bills')->where('type_id',1)->whereBetween('created_at', [$date1->format('Y-m-d')." 00:00:00", $date2->format('Y-m-d')." 23:59:59"])->sum('total');
        $total_lost=DB::table('bills')->where('type_id',5)->whereBetween('created_at', [$date1->format('Y-m-d')." 00:00:00", $date2->format('Y-m-d')." 23:59:59"])->sum('total');
        $customer_id =DB::table('bills')->where('type_id',1)->whereBetween('created_at', [$date1->format('Y-m-d')." 00:00:00", $date2->format('Y-m-d')." 23:59:59"])->groupBy('customer_id')->orderBy('customer_id','desc')->pluck('customer_id')->first();
        $lcustomer_id =DB::table('bills')->where('type_id',1)->whereBetween('created_at', [$date1->format('Y-m-d')." 00:00:00", $date2->format('Y-m-d')." 23:59:59"])->groupBy('customer_id')->orderBy('customer_id','asc')->pluck('customer_id')->first();
        $suppler_id =DB::table('bills')->where('type_id',2)->whereBetween('created_at', [$date1->format('Y-m-d')." 00:00:00", $date2->format('Y-m-d')." 23:59:59"])->groupBy('customer_id')->orderBy('customer_id','desc')->pluck('customer_id')->first();
        $lsuppler_id =DB::table('bills')->where('type_id',2)->whereBetween('created_at', [$date1->format('Y-m-d')." 00:00:00", $date2->format('Y-m-d')." 23:59:59"])->groupBy('customer_id')->orderBy('customer_id','asc')->pluck('customer_id')->first();
        $hbill_id =DB::table('bills')->where('type_id',1)->whereBetween('created_at', [$date1->format('Y-m-d')." 00:00:00", $date2->format('Y-m-d')." 23:59:59"])->orderby('total','desc')->pluck('id')->first();
        $selbill_ids =DB::table('bills')->where('type_id',1)->whereBetween('created_at', [$date1->format('Y-m-d')." 00:00:00", $date2->format('Y-m-d')." 23:59:59"])->pluck('id')->toArray();
        $supplbill_ids =DB::table('bills')->where('type_id',2)->whereBetween('created_at', [$date1->format('Y-m-d')." 00:00:00", $date2->format('Y-m-d')." 23:59:59"])->pluck('id')->toArray();
        $dlbill_ids =DB::table('bills')->where('type_id',5)->whereBetween('created_at', [$date1->format('Y-m-d')." 00:00:00", $date2->format('Y-m-d')." 23:59:59"])->pluck('id')->toArray();
        $lbill_id =DB::table('bills')->where('type_id',1)->whereBetween('created_at', [$date1->format('Y-m-d')." 00:00:00", $date2->format('Y-m-d')." 23:59:59"])->orderby('total','asc')->pluck('id')->first();
        $hsbill_id =DB::table('bills')->where('type_id',2)->whereBetween('created_at', [$date1->format('Y-m-d')." 00:00:00", $date2->format('Y-m-d')." 23:59:59"])->orderby('total','desc')->pluck('id')->first();
        $lsbill_id =DB::table('bills')->where('type_id',2)->whereBetween('created_at', [$date1->format('Y-m-d')." 00:00:00", $date2->format('Y-m-d')." 23:59:59"])->orderby('total','asc')->pluck('id')->first();
        $hBalancede =BalanceDetalies::whereBetween('created_at', [$date1->format('Y-m-d')." 00:00:00", $date2->format('Y-m-d')." 23:59:59"])->pluck('balance_id')->toArray();
        $lBalance_id =DB::table('balances')->whereIn('id',$hBalancede)->orderby('total','asc')->pluck('id')->first();
        $hBalance_id =DB::table('balances')->whereIn('id',$hBalancede)->orderby('total','desc')->pluck('id')->first();
        $total_debt =DB::table('balances')->whereIn('id',$hBalancede)->where('total','>=',0)->sum('total');
        $total_term =DB::table('balances')->whereIn('id',$hBalancede)->where('total','<',0)->sum('total');
        $hProductB_id =DB::table('sales')->whereIn('bill_id',$selbill_ids)->orderby('amount','desc')
            ->pluck('product_id')->first();
        $lProductB_id =DB::table('sales')->whereIn('bill_id',$selbill_ids)->orderby('amount','asc')
            ->pluck('product_id')->first();
        $hProductS_id =DB::table('sales')->whereIn('bill_id',$supplbill_ids)->orderby('amount','desc')
            ->pluck('product_id')->first();
        $lProductS_id =DB::table('sales')->whereIn('bill_id',$supplbill_ids)->orderby('amount','asc')
            ->pluck('product_id')->first();
        $hProductD_id =DB::table('sales')->whereIn('bill_id',$dlbill_ids)->orderby('amount','desc')
            ->pluck('product_id')->first();
        $lProductD_id =DB::table('sales')->whereIn('bill_id',$dlbill_ids)->orderby('amount','asc')
            ->pluck('product_id')->first();

              $b=new Barren();
              $b->by_id=auth()->user()->id;
              $b->start_at=$request->start_at;
              $b->end_at=$request->end_at;
              if($suppler_id) {
                  $b->suppler_id = $suppler_id;
              } if($lsuppler_id) {
                $b->lsuppler_id = $lsuppler_id;
                  }
              if($lcustomer_id) {
                  $b->lcustomer_id = $lcustomer_id;
              }
              if($customer_id) {
                  $b->customer_id = $customer_id;
              }
              if($hbill_id) {
                  $b->hbill_id = $hbill_id;
              }
              if($lbill_id) {
                  $b->lbill_id = $lbill_id;
              }
              if($lbill_id) {
                  $b->lbill_id = $lbill_id;
              }
              if($hsbill_id) {
                  $b->hsbill_id = $hsbill_id;
              }
              if($lsbill_id) {
                  $b->lsbill_id = $lsbill_id;
              } if($hProductS_id) {
                  $b->hProductS_id = $hProductS_id;
              }
              if($lProductS_id) {
                  $b->lProductS_id = $lProductS_id;
              }
              if($hProductB_id) {
                  $b->hProductB_id = $hProductB_id;
              }
              if($lProductB_id) {
                  $b->lProductB_id = $lProductB_id;
              }
              if($lProductS_id) {
                  $b->lProductS_id = $lProductS_id;
              }
              if($hProductS_id) {
                  $b->hProductS_id = $hProductS_id;
              } if($hProductD_id) {
                  $b->hProductD_id = $hProductD_id;
              }
              if($lProductD_id) {
                  $b->lProductD_id = $lProductD_id;
              } if($hBalance_id) {
                  $b->hBalance_id = $hBalance_id;

              }if($lBalance_id) {
                  $b->hsBalance_id = $lBalance_id;
              }
              if($total_money) {
                  $b->total_money = $total_money;
              }   if($total_sales) {
                  $b->total_sales = $total_sales;
              }
              if($total_term) {
                  $b->total_term = $total_term;
              }  if($total_term) {
                  $b->total_term = $total_term;
              } if($total_lost) {
                  $b->total_lost = $total_lost;
              } if($total_debt) {
                  $b->total_debt = $total_debt;
              }

              $b->save();
              $b->total_profit=($b->total_sales-($b->total_money+$b->total_lost));
        $b->save();
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
       $data['barren']=Barren::find($id);
       return view('barrens.show',$data);
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
    public function destroy(Request $request)
    {
        try {
            $c = Barren::where('id', $request->id)->first();
            $c->delete();

            return response()->json(['success' => trans('main.Category has been deleted successfully')], 200);
        }catch (\Throwable $exception){
            return response()->json(['error' => trans('main.Category can not deleted')], 422);

        }
    }
}
