<?php

namespace App\Modules\Units\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Category\models\Category;
use App\Modules\Units\models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class adminUintController extends Controller{
    // ============== List categories ===============
    public function index()
    {
//        dd("mohamed");
        if (request()->ajax()) {
            $category =
                DB::table('units')

                    ->get();
//            dd($category);
            return DataTables::of($category)
                ->addIndexColumn()

                ->addColumn('action', function ($row)  {
//                    $editUrl = url('cp/blog/edit'.$row->id);
                    $btn = '<a href="#" id="' . $row->id . '" data-id="' . $row->id . '" data-name="' . $row->title . '" data-info="' . $row->info . '" data-toggle="modal" '  . ' data-published="' . $row->active . '" data-target="#editUnit" id="edit' . $row->id . '"   class="edit btn btn-primary btn-sm editUnit"><i class="fa fa-edit"></i></a>';
                    // $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>';
                    $btn = $btn . '
                     <form action="' . url('admin/adminUnits/delete', $row->id) . '" id="delform2" method="get" style="display: inline-block">
                        <input type="hidden" name="_method" value="delete">
                    <a href="javascript:void(0)" data-id="' . $row->id . '" class="btn btn-danger btn-sm delete-Unit"><i class="fa fa-trash"></i></a>
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
                ->rawColumns(['id', 'title',  'published', 'action'])
                ->make(true);
        }
        return view('units.index');
    }

    public function create()
    {
        dd("create");
    }

    // ============== Create new category ================
    public function store(Request $request) {
        if(request()->ajax()){
            $validator = Validator::make(request()->all(), [
                'title'  => 'required',
            ]);
            if ($request->published == 'on') {
                $published = 1;
            } else {
                $published = 0;
            }
            if ($validator->passes()) {

                $add =  new Unit();
                $add->active = $published;
                $add->title=$request->input('title');
                $add->info =$request->input('info');
                $add->save();

                return response()->json(['success' => trans('Category has been added successfully')],200);
            } else {
                return response()->json(["error" => $validator->messages()], 404);
            }
        }
//        dd('not ajax');
    }

    public function show(Request  $request,$id)
    {
        if (request()->ajax()) {
            $published = 0;
            if ($request->published == "on") {
                $published = 1;
            } else if ($request->published == "off") {
                $published = 0;
            }
            Unit::where('id', $request->blog_id)->update([
                'active' => $published,
            ]);
            return response()->json(['success' => trans('Published has been updated successfully')]);
        }

    }

    public
    function edit($id)
    {
        dd("edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function updatee(Request $request)
    {
        if (request()->ajax()) {
            request()->validate([
                'title' => 'required',
                'img_url' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            if ($request->published == 'on') {
                $published = 1;
            } else {
                $published = 0;
            }
//            dd($published);
//                dd("mohamed");

                $categoryData = Unit::find($request->id);
                $categoryData->active = $published;
                $categoryData->title = $request->title;
                $categoryData->info = $request->info;
                $categoryData->save();
                return response()->json(['success' => trans('Category has been updated successfully')]);

            }
        }


    // =============== Delete specific category ===============
    public function destroy(Request $request)
    {
//        dd($request->all());
        /*  $category_rows = CategoryData::where('category_id',$request->id)->orderByDesc('created_at')->get();
          if ($category_rows){
              return response()->json(['success' => 'Category has been deleted successfully'],200);

          }
          foreach ($category_rows as $row){
              $row->delete();
          }*/
        try {
            Unit::where('id', $request->id)->delete();

            return response()->json(['success' => trans('Category has been deleted successfully')], 200);
        }catch (\Throwable $exception){
            return response()->json(['error' => trans('Category can not deleted')], 422);

        }
    }
    // ============== get lang function ==============


}
