<?php

namespace App\Modules\Salaries\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\Salaries\Models\Salary;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class AdminSaleraysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         $users=User::all();
         foreach ($users as $user){
             $salary=Salary::where('user_id',$user->id)->where('month',date_format(now(),'m'))->first();
             if($salary==null) {
                 $salary = new Salary();
                 $salary->user_id = $user->id;
                 $salary->month = date_format(now(), 'm');
                 $salary->date = date_format(now(), 'Y-m-d');
                 $s = Salary::where('user_id', $salary->user_id = $user->id)->where('month', $salary->month)->first();
                 if ($s == null) {

                     $salary->save();

                 }
             }
         }
        if (request()->ajax()) {
            $month= date_format(now(), 'm');
            $category =
                DB::table('salaries')
                    ->where('month','=',$month)
                    ->join('users','users.id','=','salaries.user_id')
                    ->select('salaries.*','users.name','users.email')
                    ->get();
            return DataTables::of($category)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn= '<a href="' . route('adminSalaries.show', $row->id) . '" title="' .'تفاصيل وتعديل'. '" data-id="' . $row->id . '" id="edit"  class="edit btn btn-success btn-sm "><i class="fa fa-eye"></i></a>';

                    return $btn;
                })

                ->rawColumns(['id', 'name','email', 'pons', 'deductions', 'total', 'action'])

                ->make(true);
        }

        return view('salaries.index');
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
       $data['salary']=Salary::find($id);
       return  view('salaries.show',$data);
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
