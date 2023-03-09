<?php

namespace App\Modules\Salaries\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\Stores\models\Mstore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class AdminAttendanceFiltter extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['stores']=Mstore::get();
        $data['users']=User::get();

        if (request()->ajax()) {
            $r=date('Y-m-d');
            $attendance=DB::table('attendances')->where('date',$r)
                ->join('users','attendances.user_id','=','users.id')->join('mstores','attendances.store_id','=','mstores.id')->select('attendances.*','users.name','users.email','mstores.title')->get();
            return DataTables::of($attendance)
                ->addIndexColumn()

                ->rawColumns(['id', 'title', 'attend_at','departure_at', 'email', 'name'])
                ->make(true);
        }
        return view('attendance.attendanceFillter',$data);
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
    public function getfillter(Request $request)
    {
        $data['stores']=Mstore::get();
        $data['users']=User::get();


        if (request()->ajax()) {

            $attendance=DB::table('attendances')
                ->join('users','attendances.user_id','=','users.id')
                ->join('mstores','attendances.store_id','=','mstores.id')

                ->select('attendances.*','users.name','users.email','mstores.title')

                      ->where('date',$request->date)


                        ->where('store_id',$request->mstore)
                     ->where('user_id',$request->user)
                        ->get();
            return DataTables::of($attendance)
                ->addIndexColumn()

                ->rawColumns(['id', 'title', 'attend_at','departure_at', 'email', 'name'])
                ->make(true);
        }
        return view('attendance.attendanceFilltert',$data);
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
