<?php

namespace App\Modules\Category\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Category\models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Modules\Product\models\Product;

class Categorycontroller extends Controller{
    // ============== List categories ===============
    public function index()
    {
//        dd("mohamed");
        if (request()->ajax()) {
            $category =
                DB::table('categories')->where('is_blocked',0)
                    ->get();
//            dd($category);
            return DataTables::of($category)
                ->addIndexColumn()

                ->addColumn('action', function ($row)  {
//                    $editUrl = url('cp/blog/edit'.$row->id);
                    $btn = '<a href="#" id="' . $row->id . '" data-id="' . $row->id . '" data-name="' . $row->title . '" data-info="' . $row->info . '" data-toggle="modal" data-image="' . $row->img_url . '" data-published="' . $row->active . '" id="edit' . $row->id . '" data-target="#editCategory"  class="edit btn btn-primary btn-sm editCategory"><i class="fa fa-edit"></i></a>';
                    // $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>';
                    $btn = $btn . '
                     <form action="' . url('admin/adminCategories/delete', $row->id) . '" id="delform2" method="get" style="display: inline-block">
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
                ->rawColumns(['id', 'title', 'image', 'published', 'action'])
                ->make(true);
        }
        return view('index');
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
         //       'img_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            if ($request->published == 'on') {
                $published = 1;
            } else {
                $published = 0;
            }
            if ($validator->passes()) {
         //       $imageName['img_url'] = time() . '.' . request()->img_url->getClientOriginalExtension();
          //      request()->img_url->move(public_path('upload/blog_category'), $imageName['img_url']);
                $add =  new Category();
             //       $add->img_url = $imageName['img_url'];
                    $add->active = $published;
                    $add->title=$request->input('title');
                    $add->info =$request->input('info');
                        $add->save();

                return response()->json(['success' => trans('main.Category has been added successfully')],200);
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
            Category::where('id', $request->blog_id)->update([
                'active' => $published,
            ]);
            return response()->json(['success' => trans('main.Published has been updated successfully')]);
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
               // 'img_url' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            if ($request->published == 'on') {
                $published = 1;
            } else {
                $published = 0;
            }
//            dd($published);
//                dd("mohamed");
            if ($request->img_url != null) {
               // $imageName['img_url'] = time() . '.' . request()->img_url->getClientOriginalExtension();
              //  request()->img_url->move(public_path('upload/blog_category'), $imageName['img_url']);

                $categoryData = Category::find($request->id);
              //  $categoryData->img_url = $imageName['img_url'];
                $categoryData->active= $published;
                $categoryData->title = $request->title;
                $categoryData->info = $request->info;
                $categoryData->save();
                return response()->json(['success' => trans('main.Category has been updated successfully')]);

            }else{
                $categoryData = Category::find($request->id);
                $categoryData->img_url =null;
                $categoryData->active = $published;
                $categoryData->title = $request->title;
                $categoryData->info = $request->info;
                $categoryData->save();
                return response()->json(['success' => trans('main.Category has been updated successfully')]);

            }
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
          $c = Category::where('id', $request->id)->first();
          $c->is_blocked=1;
          $c->save();

            return response()->json(['success' => trans('main.Category has been deleted successfully')], 200);
        }catch (\Throwable $exception){
            return response()->json(['error' => trans('main.Category can not deleted')], 422);

        }
    }
    // ============== get lang function ==============
    public function showLang(Request $request)
    {
        if(request()->ajax()){
            $source_id = DB::table('blog_category_data')
                ->select('id')
                ->where('blog_category_data.category_id' , '=' , $request->category_id)
                ->first();
            $lang = DB::table('blog_category_data')
                ->select('*')
                ->where('blog_category_data.category_id' , '=' , $request->category_id)
                ->where('blog_category_data.lang_id' , '=' , $request->lang_id)
                ->first();
            return response()->json(['lang' => $lang,'source_id' => $source_id]);
        }
    }
    // ============== update or create lang function ==============
    public function updateOrCreate(Request $request)
    {
        if(request()->ajax()){
            $lang = DB::table('blog_category_data')
                ->select('*')
                ->where('blog_category_data.category_id' , '=' , $request->category_id)
                ->where('blog_category_data.lang_id' , '=' , $request->lang_id)
                ->first();
            if ($lang == null){
                CategoryData::create([
                    'title' => $request->title,
                    'lang_id' => $request->lang_id,
                    'category_id' => $request->category_id,
                    'source_id' => $request->source_id,
                ]);
                return response()->json(['success' => trans('Lang has been created successfully')]);
            }else{
                CategoryData::where('source_id', '=' ,$request->source_id)
                    ->where('lang_id','=',$request->lang_id)
                    ->where('category_id','=',$request->category_id)
                    ->update([
                        'title' => $request->title,
                    ]);
                return response()->json(['success' =>trans( 'Lang has been updated successfully')]);
            }
        }
    }
    public function updatePublished(Request $request)
    {
       dd($request->all());
        if (request()->ajax()) {
            $published = 0;
            if($request->ttype==1){
            if ($request->published == "on") {
                $published = 1;
            } else if ($request->published == "off") {
                $published = 0;
            }
            Category::where('id', $request->blog_id)->update([
                'published' => $published,
            ]);
            return response()->json(['success' => trans('main.Published has been updated successfully')]);
        }
    }else{
        if ($request->published == "on") {
            $published = 1;
        } else if ($request->published == "off") {
            $published = 0;
        }
        Product::where('id', $request->blog_id)->update([
            'published' => $published,
        ]);
        return response()->json(['success' => trans('main.Published has been updated successfully')]);
    }
    }
    public function deleteCategoryImage(Request $request){
        $category = Category::find($request->id);
        if($category){
            $category->img_url = null;
            $category->save();
        }
        return response()->json(['message' => trans("main.image has been deleted")]);
    }

}

