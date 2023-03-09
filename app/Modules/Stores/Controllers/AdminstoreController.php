<?php

namespace App\Modules\Stores\Controllers;

use App\Exports\StoresExport;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserStore;
use App\Modules\Category\models\Category;
use App\Modules\Category\models\MstoreCategory;
use App\Modules\Salaries\Models\WeekDays;
use App\Modules\Stores\models\Mstore;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use PDF;

class AdminstoreController extends Controller
{

    // Generate PDF
    public function createPDF() {
        // retrieve all records from db
        $data = Mstore::all();

        // share data to view
        view()->share('stores',$data);
        $pdf = PDF::loadView('stores.pdf', $data);

        return $pdf->stream('pdf_file.pdf');

    }

    /**
     * Export model to excel
     * @return mixed
     */
    public function export()
    {
        return Excel::download(new StoresExport, 'stores.xlsx');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (request()->ajax()) {
            $category =
                DB::table('mstores')
                    ->join('users', 'mstores.user_id', '=', 'users.id')
                    ->select('mstores.*', 'users.name')
                    ->get();
            return DataTables::of($category)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="#" id="' . $row->id . '" data-id="' . $row->id . '" data-title="' . $row->title . '" data-user_id="' . $row->user_id . '" data-toggle="modal" data-phone="' . $row->phone . '" data-address="' . $row->address . '" id="edit' . $row->id . '" data-target="#editstrore"  class="edit btn btn-primary btn-sm editstrore"><i class="fa fa-edit"></i></a>';
                    // $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>';
                    $btn = $btn . '
                     <form action="' . url('admin/adminStores/delete', $row->id) . '" id="delform2" method="get" style="display: inline-block">
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
                    $btn=$btn. '<a href="' . route('adminStores.show', $row->id) . '" title="' . trans('Show'). '" data-id="' . $row->id . '" id="edit"  class="edit btn btn-success btn-sm "><i class="fa fa-eye"></i></a>';

                    return $btn;
                })
                ->rawColumns(['id', 'title', 'image', 'published', 'action'])
                ->make(true);
        }
        return view('stores.index');
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (request()->ajax()) {
            $validator = Validator::make(request()->all(), [
                'title' => 'required',
                'user_id' => 'required'
            ]);

            if ($validator->passes()) {

                $add = new Mstore();
                $add->title = $request->title;
                $add->phone = $request->phone;
                $add->address = $request->address;
                $add->user_id = $request->user_id;
                $add->save();


                return response()->json(['success' => trans('store has been added successfully')], 200);
            } else {
                return response()->json(["error" => $validator->messages()], 404);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['store']=Mstore::where('id',$id)->first();
        $data['categories']=Category::get();
        $data['users']=User::get();
        $data['days']=WeekDays::get();
        $data['m']=MstoreCategory::where('store_id',$id)->pluck('category_id')->toArray();
        $data['u']=UserStore::where('store_id',$id)->pluck('user_id')->toArray();
        return view('stores.showd',$data);
    }
    public function employees(Request $request)
    {
        if (request()->ajax()) {
            if ($request->published == "on") {
                $um=new UserStore();
                $um->user_id=$request->user_id;
                $um->store_id=$request->store_id;
                $um->save();
            } else if ($request->published == "off") {
                $Um=UserStore::where('user_id',$request->user_id)->where('store_id',$request->store_id)->first();
                if($Um){
                    $Um->delete();
                }
            }


            return response()->json(['success' => trans('main.updated successfully')]);
        }
    }
    public function categories(Request $request)
    {
        if (request()->ajax()) {
            if ($request->published == "on") {
                $um=new MstoreCategory();
                $um->store_id=$request->store_id;
                $um->category_id=$request->category_id;
                $um->save();
            } else if ($request->published == "off") {
                $Um=MstoreCategory::where('store_id',$request->store_id)->where('category_id',$request->category_id)->first();
                if($Um){
                    $Um->delete();
                }
            }


            return response()->json(['success' => trans('main.updated successfully')]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (request()->ajax()) {
            $validator = Validator::make(request()->all(), [
                'title' => 'required',
                'user_id' => 'required'
            ]);

            if ($validator->passes()) {

                $add =  Mstore::find($id);
                $add->title = $request->title;
                $add->phone = $request->phone;
                $add->address = $request->address;
                $add->user_id = $request->user_id;
                $add->save();


                return response()->json(['success' => trans('store has been update successfully')], 200);
            } else {
                return response()->json(["error" => $validator->messages()], 404);
            }

//        dd('not ajax');
        }
    }
    public function updatee(Request $request, $id)
    {
        if (request()->ajax()) {
            $validator = Validator::make(request()->all(), [
                'title' => 'required',
                'user_id' => 'required'
            ]);

            if ($validator->passes()) {

                $add =  Mstore::find($id);
                $add->title = $request->title;
                $add->phone = $request->phone;
                $add->address = $request->address;
                $add->user_id = $request->user_id;
                $add->save();


                return response()->json(['success' => trans('store has been update successfully')], 200);
            } else {
                return response()->json(["error" => $validator->messages()], 404);
            }

//        dd('not ajax');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $store = Mstore::find($request->id);
        try {
            $store->delete();
            return response()->json(['message' => trans("store has been deleted")]);
        } catch (\Throwable $exception) {
            return response()->json(['error' => trans("you can not delete it ")],422);

        }
    }

    public function destroy($id)
    {
    }


}
