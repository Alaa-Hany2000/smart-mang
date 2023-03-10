@extends('admin.index')
@section('cssStyle')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <script>

        alert
    </script>
    @if(Session::has('role'))
        <div class="alert alert-danger text-center col-6 offset-3" id="errorMessage" style="margin-top:10px">
            {{ Session::get('role') }}
        </div>
    @endif
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{trans('main.Starter Page')}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">{{trans('main.Home')}}</a></li>
                            <li class="breadcrumb-item active">{{trans('main.Starter Page')}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <?php
            $billsale= App\Modules\Bills\Models\Bill::whereDate('created_at', \Carbon\Carbon::today())->where('type_id',1)->count();
            $billin= App\Modules\Bills\Models\Bill::whereDate('created_at',\Carbon\Carbon::today())->where('type_id',2)->count();
                        $suplers= App\Modules\Customeres\models\Customer::whereDate('created_at','>', \Carbon\Carbon::today()->subDays(30))->where('type',2)->count();
                                                $cua= App\Modules\Customeres\models\Customer::whereDate('created_at','>', \Carbon\Carbon::today()->subDays(30))->where('type',1)->count();



            ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                      <div class="info-box">
                        <span class="info-box-icon bg-info bg-gradient-info elevation-1"><i class="fas fa-cart-arrow-down"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text">فاونير الوارد اليوم</span>
                          <span class="info-box-number">
                           {{ $billin}}
                          </span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                      <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-cart-plus"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text">فواتير المبيعات اليوم</span>
                          <span class="info-box-number">{{ $billsale }}</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                      <div class="info-box mb-3">
                        <span class="info-box-icon bg-success bg-gradient-success  elevation-1"><i class="fas fa-shipping-fast"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text">الموردين الجدد</span>
                          <span class="info-box-number">{{  $suplers}}</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                      <div class="info-box mb-3">
                        <span class="info-box-icon bg-info  bg-gradient-info elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text">العملاء الجدد</span>
                          <span class="info-box-number">{{  $cua}}</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                  </div>
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info bg-gradient-info ">
                            <div class="inner">
                                <h3>{{$categories->count()}}</h3>

                                <p>{{trans('main.Categories')}}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-android-list"></i>
                            </div>
                            <a href="{{url('/admin/adminCategories')}}" class="small-box-footer">{{trans('main.More_info')}} <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success bg-gradient-success ">
                            <div class="inner">
                                <h3>{{$products->count()}}<sup style="font-size: 20px"><i class="ion ion-images"></i></sup></h3>

                                <p>{{trans('main.Products')}}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-images"></i>
                            </div>
                            <a href="{{url('/admin/adminProducts')}}" class="small-box-footer">{{trans('main.More_info')}}<i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gradient-olive">
                            <div class="inner">
                                <h3>{{$suppliers->count()}}</h3>

                                <p>{{trans('main.Suppliers')}}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{url('admin/adminSuppliers')}}" class="small-box-footer">{{trans('main.More_info')}} <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger bg-gradient-danger">
                            <div class="inner">
                                <h3>{{$customers->count()}}</h3>

                                <p>{{trans('main.Customers')}}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-people"></i>
                            </div>
                            <a href="{{url('admin/adminCustomers')}}" class="small-box-footer">{{trans('main.More_info')}}<i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <div class="row">

                    @if($suppl)
                        <div class="col-lg-6 col-6">

                            <div class="small-box bg-gray bg-gradient-dark">
                                <div class="inner">
                                    <h6>{{$suppl->name}}</h6>
                                    <h3>{{$suppl->phone}}</h3>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="{{url('/admin/adminSuppliers')}}" class="small-box-footer"> عرض<i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    @endif
                    @if($zp)
                        <div class="col-lg-6 col-6">

                            <div class="small-box bg-warning bg-gradient-warning ">
                                <div class="inner">
                                    <h6>اخر منتج نفاذ</h6>
                                    <p>{{$zp->title}}</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="{{route('adminProducts.show',$zp)}}" class="small-box-footer">عرض <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    @endif

                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div dir="rtl" class="card-header border-transparent">
                                <h3 class="card-title">اكثر المنتجات مبيعا</h3>
                                <div  style="float:left" class="card-tools">
                                    <button  type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead>
                                        <tr>
                                            <th>كود</th>
                                            <th>الاسم</th>
                                            <th>السعر</th>
                                            <th>الكمية</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($hproducts->count() > 0)
                                            @foreach($hproducts as $hp)
                                                <tr>
                                                    <td><a href="{{route('adminProducts.show',$hp)}}">{{$hp->slug}}</a></td>
                                                    <td>{{$hp->title}}</td>
                                                    <td><span class="badge badge-success">{{$hp->max_price}}</span></td>
                                                    <td><span class="badge badge-warning">{{$hp->total}}</span></td>

                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td class="alert-default-info" colspan="4"> لا يوجدحتي الان </td>
                                            </tr>

                                        @endif

                                        </tbody>
                                    </table>
                                </div>

                            </div>



                        </div>

                    </div>  <div class="col-lg-6">
                        <div class="card">
                            <div dir="rtl" class="card-header border-transparent">
                                <h3 class="card-title">اقل مخزون</h3>
                                <div style="float:left" class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead>
                                        <tr>
                                            <th>كود</th>
                                            <th>الاسم</th>
                                            <th>السعر</th>
                                            <th>الكمية</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($lproducts->count() > 0)
                                            @foreach($lproducts as $lp)
                                                <tr>
                                                    <td><a href="{{route('adminProducts.show',$lp)}}">{{$lp->slug}}</a></td>
                                                    <td>{{$lp->title}}</td>
                                                    <td><span class="badge badge-success">{{$lp->max_price}}</span></td>
                                                    <td><span class="badge badge-warning">{{$lp->total}}</span></td>

                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td class="alert-default-info" colspan="4"> لا يوجدحتي الان </td>
                                            </tr>

                                        @endif
                                        </tbody>
                                    </table>
                                </div>

                            </div>


                        </div>

                    </div>
                </div>

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </div>
    <!-- /.content-wrapper -->
@endsection
@push('js')
    <script>
        setTimeout(function () {
            $('#errorMessage').fadeOut(100);
        }, 4000);
    </script>
    <script type="text/javascript">
        let d1='{{$d1}}';
        let d2='{{$d2}}';
        let d3='{{$d3}}';
        let d4='{{$d4}}';
        let d5='{{$d5}}';
        console.log(d1);
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['قيمه الفواتير', 'Hours per Day'],
                ['.           . .                      مبيع',    d1],
                ['.           . .             شراء',      d2],
                ['    .           . .         ارجاع للمورد',  d3],
                [' .           . .         مرتجع', d4],
                [' .           . .        تالف',   d5]
            ]);

            var options = {
                title: 'نسبة المبيعات',
                is3D: true,
                pieSliceText: 'label',


            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
    </script>

     @endpush
