<?php

namespace App\Modules\Product\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Category\models\Category;
use App\Modules\Customeres\models\Customer;
use App\Modules\Product\models\Product;
use App\Modules\Product\models\ProductCustomer;
use App\Modules\Stores\models\Mstore;
use App\Modules\Units\models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function         getprodects(Request $request) {
        $data=Product::where('title', 'LIKE','%'.$request->keyword.'%')->get();
        return response()->json($data);
    }

    public function index()
    {
        if (request()->ajax()) {
//            $studies = Study::pluck("blog_id");
            $blogsManagement =
                DB::table('products')
                    ->join('categories', 'categories.id', '=', 'products.category_id')

//                ->orderByRaw('created_at')
                    ->select(
                        'products.*',
                        'categories.title as category',

                    )
                    ->get();
//            dd($blogsManagement);
            return DataTables::of($blogsManagement)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="' . route('adminProducts.edit', $row->id) . '" id="' . $row->id . '" data-id="' . $row->id . '" id="edit"  class="edit btn btn-primary btn-sm editCategory"><i class="fa fa-edit"></i></a>';
                    // $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>';
                    $btn = $btn . '
                        <a href="#" data-id="' . $row->id . '" class="btn btn-danger btn-sm delete-product"><i class="fa fa-trash"></i></a>
                 ';
                    //     $btn = $btn . '
                    //    <div class="btn-group">
                    //   <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown">
                    //     <i class="fas fa-cog"></i>
                    //     <span class="caret"></span>
                    //     <span class="sr-only">Toggle Dropdown</span>
                    //   </button>
                    //   <ul class="dropdown-menu" role="menu">
                    //             ' . $options . '
                    //   </ul>
                    // </div>
                    //  ';
                    $btn = $btn . '<a href="' . route('adminProducts.show', $row->id) . '" title="' . trans('Show') . '" data-id="' . $row->id . '" id="edit"  class="edit btn btn-success btn-sm "><i class="fa fa-eye"></i></a>';
                    return $btn;
                })
                ->escapeColumns(['id', 'title',  'amount', 'category','published', 'Action'])
                ->toJson();

        }
        return view('products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['suppliers'] = Customer::where('type', 2)->get();
        $data['categories'] = Category::where('is_blocked',0)->get();
        $data['units'] = Unit::get();
        return view('products.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:180',
            'slug' => 'required|max:180|unique:products',

            'category_id' => 'required',
            'unit_id' => 'required',
            'buy_price' => 'required|numeric|between:0,999999.99',
            'max_price' => 'required|numeric|between:0,999999.99',
            'min_price' => 'required|numeric|between:0,999999.99',
        ]);
        if (($request->produce_at && !$request->expired_at) || ($request->expired_at && !$request->produce_at)) {
            return back()->with('error', 'ادخل التاريخ بشكل صحيح');
        }
        if ($request->produce_at && $request->expired_at) {
            if (strtotime($request->produce_at) > strtotime($request->expired_at) || (strtotime(now()) > strtotime($request->expired_at))) {
                return back()->with('error', 'ادخل التاريخ بشكل صحيح');
            }
        }
        if ($request->min_price > ($request->max_price) || ($request->max_price) < ($request->buy_price)) {
            return back()->with('error', 'ادخل الاسعار بشكل صحيح');
        }


        if ($request->img_url) {
            $imageName['img_url'] = time() . '.' . request()->img_url->getClientOriginalExtension();
            request()->img_url->move(public_path('upload/products'), $imageName['img_url']);
            $p = new Product();
            $p->title = $request->title;
            $p->category_id = $request->category_id;
            $p->unit_id = $request->unit_id;
            $p->img_url = $imageName['img_url'];
            $p->buy_price = $request->buy_price;
            $p->max_price = $request->max_price;
            $p->min_price = $request->min_price;
            $p->info = $request->info;
            $p->produce_at = $request->produce_at;
            $p->expired_at = $request->expired_at;
            $p->save();

        } else {
            $p = new Product();
            $p->title = $request->title;
            $p->rival = $request->rival;
            $p->addRival = $request->addRival;

            $p->slug = $request->slug;
            $p->category_id = $request->category_id;
            $p->unit_id = $request->unit_id;
            $p->buy_price = $request->buy_price;
            $p->max_price = $request->max_price;
            $p->min_price = $request->min_price;

            $p->info = $request->info;
            $p->produce_at = $request->produce_at;
            $p->expired_at = $request->expired_at;
            $p->save();
        }
        return redirect(route('adminProducts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['product'] =
            DB::table('products')

                ->join('categories', 'categories.id', '=', 'products.category_id')
                   ->where('products.id','=',$id)
//                ->orderByRaw('created_at')
                ->select(
                    'products.*',

                    'categories.title as category',

                )
                ->first();
              $data['stores']=Mstore::get();
              $data['storesDes']=ProductCustomer::where('product_id',$id)->get();
        return view('products.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['suppliers'] = Customer::where('type', 2)->get();
        $data['categories'] = Category::where('is_blocked',0)->get();
        $data['units'] = Unit::get();
        $data['product'] = Product::where('id', $id)->first();
        return view('products.edit', $data);
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
        $this->validate($request, [
            'title' => 'required|max:180',
            'category_id' => 'required',
            'slug' => 'required|max:180|unique:products,slug,'.$id,

            'unit_id' => 'required',
            'buy_price' => 'required|numeric|between:0,999999.99',
            'max_price' => 'required|numeric|between:0,999999.99',
            'min_price' => 'required|numeric|between:0,999999.99',
        ]);
        if (($request->produce_at && !$request->expired_at) || ($request->expired_at && !$request->produce_at)) {
            return back()->with('error', 'ادخل التاريخ بشكل صحيح');
        }
        if ($request->produce_at && $request->expired_at) {
            if (strtotime($request->produce_at) > strtotime($request->expired_at) || (strtotime(now()) > strtotime($request->expired_at))) {
                return back()->with('error', 'ادخل التاريخ بشكل صحيح');
            }
        }
        if ($request->min_price > ($request->max_price) || ($request->max_price) < ($request->buy_price)) {
            return back()->with('error', 'ادخل الاسعار بشكل صحيح');
        }


        if ($request->img_url) {
            $imageName['img_url'] = time() . '.' . request()->img_url->getClientOriginalExtension();
            request()->img_url->move(public_path('upload/products'), $imageName['img_url']);
            $p = Product::find($id);

            $p->title = $request->title;
            $p->rival = $request->rival;
            $p->addRival = $request->addRival;

            $p->slug = $request->slug;
            $p->category_id = $request->category_id;
            $p->unit_id = $request->unit_id;
            $p->img_url = $imageName['img_url'];
            $p->buy_price = $request->buy_price;
            $p->max_price = $request->max_price;
            $p->min_price = $request->min_price;
            $p->supplier_id = $request->supplier_id;
            $p->info = $request->info;
            $p->produce_at = $request->produce_at;
            $p->expired_at = $request->expired_at;
            $p->save();
        } else {
            $p = Product::find($id);
            $p->title = $request->title;
            $p->rival = $request->rival;
            $p->addRival = $request->addRival;

            $p->slug = $request->slug;
            $p->category_id = $request->category_id;
            $p->unit_id = $request->unit_id;
            $p->buy_price = $request->buy_price;
            $p->max_price = $request->max_price;
            $p->min_price = $request->min_price;


            $p->info = $request->info;
            $p->produce_at = $request->produce_at;
            $p->expired_at = $request->expired_at;
            $p->save();
        }
        return redirect(route('adminProducts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function updatePublished(Request $request)
    {
        dd($request->all());
        if (request()->ajax()) {
            $published = 0;
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

    public function delete(Request $request)
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
            Product::where('id', $request->id)->delete();

            return response()->json(['success' => trans('Product has been deleted successfully')], 200);
        } catch (\Throwable $exception) {
            return response()->json(['error' => trans('Product can not deleted')], 422);

        }
    }

}
