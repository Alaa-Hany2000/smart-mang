@extends('admin.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{trans("products.Product Info")}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">{{trans("products.Product")}}/الكتب الخارجية</a></li>
                            <li class="breadcrumb-item active">{{trans("products.Product Info")}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- products content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card col-lg-12">
                        <div class="card-header d-flex p-0">
                            <h3 class="card-title p-3">{{trans('products.Product Info')}}</h3>
                            <ul class="nav nav-pills ml-auto p-2">

                                <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">{{trans('products.Main Info')}}</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">{{trans('products.AddtionalInfo')}}</a></li>
                                <!--   <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab"> {{trans('products.distr')}}</a></li> -->
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active col-lg-12" id="tab_1">

                                    <table class="table">
                                        <thead class="thead-light">
                                        <tr class="table-primary">

                                            <th scope="col">{{trans('main.Name')}}</th>
                                            <th scope="col">{{trans('main.Value')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="table-primary">
                                            <td>{{trans('main.Title')}}</td>
                                            <td>{{$product->title}}</td>
                                        </tr>
                                        <tr class="table-info" >
                                            <td>{{trans('main.Total')}}</td>
                                            <td>{{$product->total}}</td>
                                        </tr>
                                        <tr class="table-success">
                                            <td>{{trans('main.Max_price')}}</td>
                                            <td>{{$product->max_price}}</td>
                                        </tr> <tr class="table-success">
                                            <td>نسبة الخصم</td>
                                            <td>{{$product->rival}}</td>
                                        </tr> <tr class="table-success">
                                            <td>نسبة الخصم الاضافية</td>
                                            <td>{{$product->addRival}}</td>
                                        </tr>
                                        <tr class="table-dark">
                                            <td>{{trans('main.Min_price')}}</td>
                                            <td>{{$product->min_price}}</td>
                                        </tr>
                                        @if($product->produce_at&&$product->expired_at)
                                            <tr class="table-light">
                                                <td>{{trans('main.Produce_at')}}</td>
                                                <td>{{$product->produce_at}}</td>
                                            </tr>  <tr class="table-danger">
                                                <td>{{trans('main.Expired_at')}}</td>
                                                <td>{{$product->expired_at}}</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>

                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_2">
                                    <tr class="table">
                                        <table class="table">

                                            <tbody>
                                            <tr >
                                                <td>{{trans('main.Info')}}</td>
                                                <td>{!! $product->info !!}</td>
                                            </tr>

                                            </tbody>
                                        </table>

                                    </tr>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_3">
                                    <table class="table">
                                        <caption>{{trans('products.distr')}}</caption>
                                        <thead>
                                        <tr>
                                            <th scope="col">{{trans('products.Store')}}</th>
                                            <th scope="col">{{trans('main.amount')}}</th>
                                            <th scope="col">{{trans('main.Save')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <!--   @if($stores->count()>0)
                                            @foreach($stores as $s)
                                                    <?php
                                                    $des=\App\Modules\Product\models\ProductMstore::where('store_id',$s->id)->where('product_id',$product->id)->first();
                                                    ?>
                                                    <tr>

                                                        <td>{{$s->title}}</td>
                                                    @if($des)
                                                    <td><input type="number" min="0" max="{{$product->total}}" value="{{$des->amount}}" id="{{$s->id}}" name="amount"></td>
                                                        @else
                                                    <td><input type="number" min="0" max="{{$product->total}}" value="0" id="{{$s->id}}" name="amount"></td>
@endif
                                                <td><button  class=" btn btn-success switch" store_id="{{$s->id}}">حفظ</button> </td>

                                        </tr>
                                            @endforeach
                                        @endif -->
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>

                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- /.modal -->
    <!-- /.modal -->
    <!-- /.modal -->
    <!-- /.modal -->
    <!-- /.modal -->
@endsection

@push('js')
    <script>
        $(document).ready(() => {
            $('body').on('change', '.onoffswitch-checkbox', function () {
                var id =  $(this).attr('id');
                var store_id =  $(this).attr('store_id');

                alert('gghthfghjjh');
                // console.log(blog_management_id,attr)
                // return ;

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{  url('/admin/adminStores/employees') }}",
                    method: "post",
                    data: {

                        'store_id':store_id,
                        'published':$(this).val(),
                    },
                    statusCode: {
                        200: (response) => {
                            toastr.success(response.success)
                            table.ajax.reload();
                        },
                        404:(response) => {
                            console.log('error', response)
                        }
                    }
                });

            })
            $('.switch').on('click', function () {

                var id =  $(this).attr('id');
                var store_id =  $(this).attr('store_id');
                var amount=$('#'+store_id).val();
                let product_id='{{$product->id}}'

                // console.log(blog_management_id,attr)
                // return ;

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{  url('/admin/adminStores/des') }}",
                    method: "post",
                    data: {
                        'amount':amount,
                        'store_id':store_id,
                        'product_id':product_id,
                    },
                    statusCode: {
                        200: (response) => {
                            toastr.success('تم العمليه بنجاح')
                        },
                        422:(response) => {
                            toastr.error('هذه الكميه غير موجوده')
                        }
                    }
                });

            })

        })
    </script>

@endpush
@push("css")
    <style>
        /* The switch - the box around the slider */
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
@endpush
