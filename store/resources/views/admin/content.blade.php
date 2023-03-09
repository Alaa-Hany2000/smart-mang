@extends('admin.index')

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
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cart-arrow-down"></i></span>
          
                        <div class="info-box-content">
                          <span class="info-box-text">فواتير الوارد اليوم</span>
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
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shipping-fast"></i></span>
          
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
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
          
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
                        <div class="small-box bg-info">
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
                        <div class="small-box bg-success">
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
                        <div class="small-box bg-danger">
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
  

@endpush
