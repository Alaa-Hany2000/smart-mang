<?php

namespace App\Modules\Bills\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserStore;
use App\Modules\Bills\Models\Bill;
use App\Modules\Bills\Models\Sale;
use App\Modules\Category\models\Category;
use App\Modules\Balances\Models\Balance;
use App\Modules\Balances\Models\BalanceDetalies;

use App\Modules\Category\models\MstoreCategory;
use App\Modules\Customeres\models\Customer;
use App\Modules\Product\models\Product;
use App\Modules\Stores\models\Mstore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use PDF;

class AdminSuplersBillController extends Controller
{
    public function index()
    {


        if (request()->ajax()) {
            //            $studies = Study::pluck("blog_id");
            $blogsManagement =
                DB::table('bills')->where('type_id', 2)->get();

            //            dd($blogsManagement);
            return DataTables::of($blogsManagement)

                ->addIndexColumn()

                ->addColumn('action', function ($row) {


                    // $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>';
                    $btn =  '
                  <a target="_blank" href="' . route('printPagesu', $row->id) . '"class="edit btn btn-info btn-sm"' . '" ><i class="fa fa-print"></i></a>';
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
                    $btn = $btn . '<a href="' . route('spluersBill.show', $row->id) . '" title="' . trans('Show') . '" data-id="' . $row->id . '" id="edit"  class="edit btn btn-success btn-sm "><i class="fa fa-eye"></i></a>';
                    return $btn;
                })
                ->escapeColumns(['id', 'title',  'created_at', 'Action'])
                ->toJson();
        }
        return  view('spluersBill.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ds = UserStore::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->first();
        if ($ds) {
            $sc = MstoreCategory::where('store_id', $ds->store_id)->pluck('category_id')->toArray();
            $data['categories'] = Category::whereIn('id', $sc)->get();
            $data['products'] = Product::get();
        } else {
            $data['categories'] = Category::get();
            $data['products'] = Product::get();
        }
        $data['customers'] = Customer::where('type', 2)->where('is_blocked', 0)->get();
        return view('spluersBill.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $bill = new Bill();
        $bill->user_id = auth()->user()->id;
        $bill->customer_id = $request->customer_id;
        $bill->store_id = 1;
        $bill->type_id = 2;
        $bill->save();
        $id = $bill->id;


        $schedules = [];

        if (isset($request->productid) && count($request->prices) > 0) {
            foreach ($request->productid as $day => $v) {
                $schedules[] = [
                    'bill_id' => $id,
                    'price' => $request->prices[$day],
                    'product_id' => $request->productid[$day],
                    'amount' => $request->amounts[$day],



                ];
            }

            foreach ($schedules as $ss) {

                if ($ss['price'] && $ss['product_id']) {
                    $ini = new Sale();
                    $ini->bill_id = $ss['bill_id'];
                    $ini->price = $ss['price'];
                    $ini->product_id = $ss['product_id'];
                    $ini->amount = $ss['amount'];
                    $ini->total = $ss['amount'] * $ss['price'];
                    $ini->save();
                    $product = Product::where('id',  $ini->product_id)->first();
                    if ($product) {
                        $product->ex_qty = ($product->total +  $ini->amount) / 4;
                        $product->total +=  $ini->amount;
                        $product->save();
                    }
                }
            }
        }
        $lastsale = Sale::where('bill_id', $id)->sum('total');
        $bill->total = round($lastsale, 2);
        $bill->paid = round($lastsale, 2);

        $bill->save();
        return redirect(route('spluersBill.index'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['bill'] = Bill::where('id', $id)->first();
        $data['user'] = User::where('id', $data['bill']->user_id)->first();
        $data['customer'] = Customer::where('id', $data['bill']->customer_id)->first();
        $data['sales'] = Sale::where('bill_id', $id)->get();

        return view('spluersBill.show', $data);
    }
    public function printPage($id)
    {
        $bil = Bill::where('id', $id)->first();
        $bil->is_print += 1;
        $bil->save();
        $data['bill'] = Bill::where('id', $id)->first();

        $data['user'] = User::where('id', $data['bill']->user_id)->first();
        $data['customer'] = Customer::where('id', $data['bill']->customer_id)->first();
        $data['sales'] = Sale::where('bill_id', $id)->get();

        return view('spluersBill.printpage', $data);
    }
    public function pdfpage($id)
    {
        $data['bill'] = Bill::where('id', $id)->first();
        $data['user'] = User::where('id', $data['bill']->user_id)->first();
        $data['customer'] = Customer::where('id', $data['bill']->customer_id)->first();
        $data['sales'] = Sale::where('bill_id', $id)->get();
        view()->share('spluersBill.pdfpage', $data);
        $pdf = PDF::loadView('spluersBill.pdfpage', $data);

        return $pdf->stream(rand(111, 666) . 'pdf_file.pdf');
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
    public function pad(Request $request)
    {
        if ($request->paid < 0) {
            return    response()->json(['data' => $bill, 'success' => 'تم التحديث']);
        }
        $bill = Bill::where('id', $request->bill_id)->first();
        if ($bill) {
            $bill->paid = $request->paid;
            $bill->unpaid = $bill->total - $request->paid;
            $bill->save();
            if ($bill->unpaid > 0) {
                $customer = Customer::where('id', $bill->customer_id)->first();

                if ($customer) {
                    $balanc = Balance::where('customer_id', $customer->id)->first();
                    if ($balanc) {
                        $balanc->total += $bill->unpaid;
                        $balanc->save();
                        $bd = new BalanceDetalies();
                        $bd->bill_id = $bill->id;
                        $bd->user_id = $customer->id;
                        $bd->balance_id = $balanc->id;
                        $bd->amount += $bill->unpaid;
                        $bd->by_id = auth()->user()->id;

                        $bd->save();
                        $balanc->last_transaction = $bd->created_at;
                    } else {

                        $balanc = new Balance();

                        $balanc->customer_id = $customer->id;
                        $balanc->total += $bill->unpaid;
                        $balanc->save();
                        $bd = new BalanceDetalies();
                        $bd->bill_id = $bill->id;
                        $bd->user_id = $customer->id;
                        $bd->balance_id = $balanc->id;
                        $bd->amount += $bill->unpaid;
                        $bd->by_id = auth()->user()->id;

                        $bd->save();
                        $balanc->last_transaction = $bd->created_at;
                    }
                } // customer




            }
        }
        return    response()->json(['data' => $bill, 'success' => 'تم التحديث'], 200);
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
            Bill::where('id', $request->id)->delete();

            return response()->json(['success' => trans('main.Category has been deleted successfully')], 200);
        } catch (\Throwable $exception) {
            return response()->json(['error' => trans('main.Category can not deleted')], 422);
        }
    }
    public  function sales(Request $request)
    {

        $sa = Product::where('id', $request->product_id)->first();

        return response()->json($sa);
    }
    public function productsoptions()
    {
        $products = Product::get();





        $html = ' <select class="form-control col-sm-12 select"  name="productid[]" >
    <option value="">' . trans('main.Product') . '</option>';
        foreach ($products as $product) :
            $html .= '<option value="' . $product->id . '"> ' . $product->title . '</option>';
        endforeach;
        $html .= '</select>';
        return json_encode($html);
    }
}
