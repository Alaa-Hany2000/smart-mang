<?php

namespace App\Modules\Customeres\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Customeres\models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class adminSupplieresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (request()->ajax()) {
            $category =
                DB::table('customers')->where('is_blocked',0)
                    ->where('type',2)
                    ->get();
            return DataTables::of($category)
                ->addIndexColumn()

                ->addColumn('action', function ($row)  {
//                    $editUrl = url('cp/blog/edit'.$row->id);
                    $btn = '<a href="' . route('adminSuppliers.edit', $row->id) . '" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>';
                    $btn =$btn.'
                     <form action="' . url('admin/adminSuppliers/delete', $row->id) . '" id="delform2" method="get" style="display: inline-block">
                        <input type="hidden" name="_method" value="delete">
                    <a href="javascript:void(0)" data-id="' . $row->id . '" class="btn btn-danger btn-sm delete-category"><i class="fa fa-trash"></i></a>
                    </form>
                 ';
                    //     $btn = $btn . '
                    //     <div class="btn-group">
                    //       <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown">
                    //         <i class="fas fa-cog"></i>
                    //         <span class="caret"></span>
                    //         <span class="sr-only">Toggle Dropdown</span>
                    //       </button>
                    //       <ul class="dropdown-menu" role="menu">
                    //                 ' . $options . '
                    //       </ul>
                    //     </div>
                    //  ';
                    return $btn;
                })
                ->rawColumns(['id', 'name',  'phone', 'action'])
                ->make(true);
        }
        return view('suppliers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suppliers.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $c=new Customer();
        $c->name=$request->name;
        $c->address=$request->address;
        $c->type=2;
        $c->phone=$request->phone;
        $c->email=$request->email;
        $c->info=$request->info;
        $c->save();

        return redirect()->route('adminSuppliers.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }
    public  function  delete(Request  $request){
        try {
            Customer::where('id', $request->id)->delete();

            return response()->json(['success' => trans('customer has been deleted successfully')], 200);
        }catch (\Throwable $exception){
            return response()->json(['error' => trans('customer can not deleted')], 422);

        }

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['Suppliers']=Customer::find($id);
        return view('suppliers.edit',$data);
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
        $c= Customer::find($id);
        $c->name=$request->name;
        $c->address=$request->address;
        $c->phone=$request->phone;
        $c->email=$request->email;
        $c->info=$request->info;
        $c->save();

        return redirect()->route('adminSuppliers.index');
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
