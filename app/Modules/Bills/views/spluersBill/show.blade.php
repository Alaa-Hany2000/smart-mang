@extends('admin.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">بيانات الفاتورة</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">بيانات الفاتورة</a></li>
                            <li class="breadcrumb-item active">بيانات</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- products content -->
        <section class="content">
            <div class="container-fluid">
            <a href="{{route("printPagesu",$bill->id)}}" target="_blank" class="btn btn-seccess btn-sm" >طباعة<i class="fad fa-shredder"></i> </a>
                <div class="row">
                    <div class="card col-lg-12">
                        <div class="card-header d-flex p-0">
                            <h3 class="card-title p-3">البيانات الاساسية</h3>
                            
                            <ul class="nav nav-pills ml-auto p-2">

                                <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">البايانات الاساسية</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">{{trans('products.AddtionalInfo')}}</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab"> الدفع والطباعة</a></li>
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
                                            <tr class="table-success">
                                            <td>التاريخ</td>
                                            <td>{{ date('d/m/Y', strtotime($bill->created_at)) }}</td>
                                        </tr>
                                        <tr class="table-primary">
                                            <td>البائع</td>
                                            <td>{{$user->name}}</td>
                                        </tr>
                                        <tr class="table-info" >
                                            <td>المورد</td>
                                            <td>{{$customer->name}}</td>
                                        </tr>
                                    
                                      
                                         <tr class="table-light">
                                            <td>المدفوع</td>
                                            <td>{{$bill->paid}}</td>
                                        </tr>
                                         <tr class="table-danger">
                                            <td>الباقي</td>
                                            <td>{{$bill->unpaid}}</td>
                                        </tr>
  <tr class="table-dark">
                                            <td>اجمالي الفاتورة</td>
                                            <td>{{$bill->total}}</td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_2">
                                    <tr class="table">
                                        <table class="table">
                                                <th>{{ trans('main.Product') }}</th>
                                                <th>{{ trans('main.Price') }}</th>
                                                <th>{{ trans('main.Amount') }}</th>
                                                <th>{{ trans('main.Total') }}</th>



                                            <tbody>
                                                @if($sales->count()>0)
                                                @foreach ($sales as $sale)
                                                <?php
                                                $product= App\Modules\Product\models\Product::where('id',$sale->product_id)->first();
                                                ?>
                                                @if($product)
                                                <tr >
                                                    <td>{{$product->title}}</td>
                                                    <td>{{$sale->price}}</td>
                                                    <td>{{$sale->amount}}</td>
                                                    <td>{{$sale->total}}</td>

                                                </tr>
                                                   @endif
                                                @endforeach
                                                @endif

                                            </tbody>
                                        </table>

                                    </tr>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_3">
                                    <table class="table">
                                        <caption class="danger" >انتبة للتغير قيمة المدفوع تجري تحديثات  الحساب اّليا</caption>
                                        <thead>
                                        <tr>
                                            <th scope="col">{{trans('main.Total')}}</th>
                                            <th scope="col">المدفوع</th>
                                            <th scope="col">الاجل</th>
                                           

                                        </tr>
                                        </thead>
                                        <tbody>
                                            <td>{{$bill->total}}</td>
                                            <td> @if($bill->is_print==0 && $bill->unpaid < 1 )<input type="number" id="pad" min="0" max="{{$bill->total}}"  value="{{$bill->total}}" /> <a href="{{route("printPage",$bill->id)}}" target="_blank"  class="btn btn-success btn-sm" id="pp">حفظ</a> @else <a href="#" class="btn btn-success btn-sm">تم الطبع:{{$bill->is_print}}</a>@endif </td>
                                            <td> @if($bill->is_print==0 && $bill->unpaid == 0 ) <input type="number" id="unpad" readonly  min="0" max="{{$bill->total}}"  value="" /> @else {{$bill->unpaid}}  @endif</td>

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
               $('#pad').on('change', function () {
                     var amount =  $(this).val();
                var total = '{{ $bill->total}}';
                var bill_id ='{{ $bill->id }}';
                $('#unpad').val(total-amount);
               })
            $('#pp').on('click', function () {
                var amount =  $('#pad').val();
                var total = '{{ $bill->total}}';
                var bill_id ='{{ $bill->id }}';
                $('#unpad').val(total-amount);


                // console.log(blog_management_id,attr)
                // return ;

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{  route('padto') }}",
                    method: "post",
                    data: {

                        'paid':amount,
                        'bill_id':bill_id,


                    },
                    statusCode: {
                        200: (response) => {
                            toastr.success(response.success)
                            consol.log(response)
                      },
                        404:(response) => {
                            console.log('error', response)
                        }
                    }
                });
                location.reload(true);  

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
