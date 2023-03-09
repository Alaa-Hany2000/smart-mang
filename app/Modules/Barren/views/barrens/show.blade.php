@extends('admin.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">بيانات الجرد</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">بيانات الجرد</a></li>
                            <li class="breadcrumb-item active">بيانات</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- products content -->
        <section class="content">
        <!-- Button trigger modal -->


<!-- Modal -->
            <div class="container-fluid">
                <div class="row">
                    <div class="card col-lg-12">
                        <div class="card-header d-flex p-0">
                            <h3 class="card-title p-3">معلومات الجرد </h3>

                            <ul class="nav nav-pills ml-auto p-2">

                                <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">البايانات الاساسية</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">{{trans('products.AddtionalInfo')}}</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">الفواتير</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">اخري</a></li>




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
                                            <td>تاريخ الجرد</td>
                                            <td>{{ date('d/m/Y', strtotime($barren->created_at)) }}</td>
                                        </tr>
                                        <tr class="table-primary">

                                        <tr class="table-info" >
                                            <td>من</td>
                                            <td>{{$barren->start_at}}</td>
                                        </tr>   <tr class="table-danger" >
                                            <td>الي</td>
                                            <td>{{$barren->end_at}}</td>
                                        </tr>



                                          <tr class="table-dark">
                                            <td>اجمالي المشتريات</td>
                                            <td>{{$barren->total_money}}</td>
                                        </tr>
                                            <tr class="table-success">
                                            <td>اجمالي المبيعات</td>
                                            <td>{{$barren->total_sales}}</td>
                                        </tr>
                                            <tr class="table-inverse">
                                            <td>اجمالي الدين الخارجي </td>
                                            <td>{{$barren->total_debt}}</td>
                                        </tr>   <tr class="table-primary">
                                            <td>اجمالي الدين علي العملاء </td>
                                            <td>{{$barren->total_term}}</td>
                                        </tr>  <tr class="table-gray">
                                            <td>اجمالي سعر التالف  </td>
                                            <td>{{$barren->total_lost}}</td>
                                        </tr>  <tr class="table-active">
                                            <td>اجمالي  هامش الربح  </td>
                                            <td>{{$barren->total_profit}}</td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>
                                <?php
                                $hBalance=null;
                                $lBalance=null;
                                    $suppler=\App\Modules\Customeres\models\Customer::where('id',$barren->suppler_id)->first();
                                    $lsuppler=\App\Modules\Customeres\models\Customer::where('id',$barren->lsuppler_id)->first();
                                    $customer=\App\Modules\Customeres\models\Customer::where('id',$barren->customer_id)->first();
                                    $lcustomer=\App\Modules\Customeres\models\Customer::where('id',$barren->customer_id)->first();
                                    $hProductS=\App\Modules\Product\models\Product::where('id',$barren->hProductS_id)->first();
                                    $lProductS=\App\Modules\Product\models\Product::where('id',$barren->lProductS_id)->first();
                                    $hProductB=\App\Modules\Product\models\Product::where('id',$barren->hProductB_id)->first();
                                    $lProductB=\App\Modules\Product\models\Product::where('id',$barren->lProductB_id)->first();
                                    $hProductD=\App\Modules\Product\models\Product::where('id',$barren->hProductD_id)->first();
                                    $lProductD=\App\Modules\Product\models\Product::where('id',$barren->lProductD_id)->first();
                                    $hBalance=\App\Modules\Balances\Models\Balance::where('id',$barren->hBalance_id)->first();
                                    if($hBalance){
                                        $hbCu=\App\Modules\Customeres\models\Customer::where('id',$hBalance->customer_id)->first();
                                    }
                                    $lBalance=\App\Modules\Balances\Models\Balance::where('id',$barren->hsBalance_id)->first();
                                if($lBalance){
                                    $lbCu=\App\Modules\Customeres\models\Customer::where('id',$lBalance->customer_id)->first();
                                }
                                    $hbill=\App\Modules\Bills\Models\Bill::where('id',$barren->hbill_id)->first();
                                    $lbill=\App\Modules\Bills\Models\Bill::where('id',$barren->lbill_id)->first();
                                    $lsbill=\App\Modules\Bills\Models\Bill::where('id',$barren->lsbill_id)->first();
                                    $hsbill=\App\Modules\Bills\Models\Bill::where('id',$barren->hsbill_id)->first();
                                ?>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_2">
                                    <tr class="table">
                                        <table class="table">
                                            <tr class="table-primary">

                                                <th scope="col">{{trans('main.Name')}}</th>
                                                <th scope="col">{{trans('main.Value')}}</th>
                                            </tr>

                                            <tbody>
                                            @if($suppler)
                                            <tr class="editable-submit">
                                                <td>اكثر الموردين في الفتره </td>
                                                <td>{{$suppler->name}}</td>
                                            </tr>
                                                @endif
                                            @if($lsuppler)
                                            <tr class="table-danger">
                                                <td>اقل الموردين في الفتره </td>
                                                <td>{{$lsuppler->name}}</td>
                                            </tr>
                                                @endif
                                            @if($customer)
                                            <tr class="table-success">
                                                <td>  اكثر العملاء سحب في  الفتره</td>
                                                <td>{{$customer->name}}</td>
                                            </tr>
                                                @endif
                                            @if($lcustomer)
                                            <tr class="table-danger">
                                                <td>اقل العملاء سحب </td>
                                                <td>{{$lcustomer->name}}</td>
                                            </tr>
                                                @endif
                                            </tbody>
                                        </table>

                                    </tr>
                                </div>
                                <div class="tab-pane" id="tab_3">
                                    <tr class="table">
                                        <table class="table">
                                            <tr class="table-primary">

                                                <th scope="col">{{trans('main.Name')}}</th>
                                                <th scope="col">{{trans('main.Value')}}</th>
                                            </tr>

                                            <tbody>
                                            @if($hProductS)
                                            <tr class="editable-submit">
                                                <td>اكثر المنتجات مبيع في الفتره </td>
                                                <td>{{$hProductS->title}}</td>
                                            </tr>
                                                @endif
                                            @if($lProductS)
                                            <tr class="table-danger">
                                                <td>اقل المنتجات مبيع في الفتره </td>
                                                <td>{{$lProductS->title}}</td>
                                            </tr>
                                                @endif
                                            @if($hProductB)
                                            <tr class="table-success">
                                                <td>  اكثر المنتجات  سحب في  الفتره</td>
                                                <td>{{$hProductB->title}}</td>
                                            </tr>
                                                @endif
                                            @if($lProductB)
                                            <tr class="table-danger">
                                                <td>اقل  المنتجات  سحب </td>
                                                <td>{{$lProductB->title}}</td>
                                            </tr>
                                                @endif
                                            @if($hProductD)
                                            <tr class="table-success">
                                                <td>  اكثر المنتجات تلف  الفتره</td>
                                                <td>{{$hProductD->title}}</td>
                                            </tr>
                                                @endif
                                            @if($lProductD)
                                            <tr class="table-danger">
                                                <td>اقل  المنتجات  تلف </td>
                                                <td>{{$lProductD->title}}</td>
                                            </tr>
                                                @endif
                                            </tbody>
                                        </table>

                                    </tr>
                                </div>
                                <div class="tab-pane" id="tab_4">
                                    <tr class="table">
                                        <table class="table">
                                            <tr class="table-primary">

                                                <th scope="col">{{trans('main.Name')}}</th>
                                                <th colspan="3" scope="col">{{trans('main.Value')}}</th>
                                            </tr>

                                            <tbody>
                                            @if($hbill)
                                            <tr class="editable-submit">
                                                <td>قيمه اعلي فتوره بيع في الفتره  </td>
                                                <td colspan="3">{{$hbill->total}}</td>
                                            </tr>
                                                @endif
                                            @if($lbill)
                                            <tr class="table-danger">
                                                <td>اقل  فتوره بيع في الفتره </td>
                                                <td colspan="3"> {{$lbill->total}}</td>
                                            </tr>
                                                @endif
                                            @if($hsbill)
                                            <tr class="editable-submit">
                                                <td>قيمه اعلي فتوره توريد في الفتره  </td>
                                                <td colspan="3">{{$hsbill->total}}</td>
                                            </tr>
                                                @endif
                                            @if($lsbill)
                                            <tr class="table-danger">
                                                <td>اقل  فتوره بيع في الفتره </td>
                                                <td colspan="3">{{$lsbill->total}}</td>
                                            </tr>
                                                @endif
                                            @if($hBalance && $hbCu)
                                            <tr class="table-success">
                                                <td>  اعلي دين خارجي في الفتره</td>
                                                <td>{{$hBalance->total}}</td>
                                                <td>  صاحبه</td>
                                                <td class="badge-info">{{$hbCu->name}}</td>
                                            </tr>
                                                @endif
                                            @if($lBalance && $lbCu)
                                            <tr class="table-danger">
                                                <td>  اعلي دين علي عميل  في الفتره</td>
                                                <td>{{$lBalance->total}}</td>
                                                <td>  صاحبه</td>
                                                <td class="badge-danger">{{$lbCu->name}}</td>
                                            </tr>
                                                @endif

                                            </tbody>
                                        </table>

                                    </tr>
                                </div>
                                <!-- /.tab-pane -->

                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>

                </div>
                <!-- /.row -->

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
