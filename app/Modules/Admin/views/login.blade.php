<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{$settings->ar_title}}</title>

    <!-- <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css')}}"> -->

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap-rtl.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/css/adminlte-rtl.css')}}">
    <!--<link rel="stylesheet" href="{{ asset('admin/css/admin.min-rtl.css')}}">-->

    <!-- Google Font: Cairo -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{asset('admin/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{asset('admin/plugins/icheck-bootstrap/icheck-bootstrap-rtl.min.css')}}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{asset('admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{asset('admin/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset('admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('admin/plugins/toastr/toastr.min.css')}}">

    <!-- <link rel="stylesheet" href="{{asset('admin/bower_components/font-awesome/css/font-awesome.min.css')}}"> -->




    <!-- DataTables -->

    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">


    <link rel="stylesheet" href="{{ asset('admin/css/rtl.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />


    <link rel="stylesheet" href="{{ asset('style.css')}}">
    <style>
        .dataTables_filter {
            display: flex;
            justify-content: flex-end;
        }

        .dataTables_paginate.paging_simple_numbers .pagination {
            display: flex;
            justify-content: flex-end;
        }

        .select2-selection.select2-selection--single {
            height: auto;
        }

        .input-group-append {
            margin-right: -1px;
        }

        .custom-file-label::after {
            left: 0;
            right: auto;
            border-left-width: 0;
            border-right: inherit;
        }

        .input-group>.input-group-append>.btn,
        .input-group>.input-group-append>.input-group-text,
        .input-group>.input-group-prepend:not(:first-child)>.btn,
        .input-group>.input-group-prepend:not(:first-child)>.input-group-text,
        .input-group>.input-group-prepend:first-child>.btn:not(:first-child),
        .input-group>.input-group-prepend:first-child>.input-group-text:not(:first-child) {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }
    </style>
    @stack('css')

</head>

<body class="hold-transition sidebar-mini">
<nav class="navbar navbar-expand-lg navbar-light fixed-top" style=" background-image: linear-gradient(to bottom, #bdb659, #c5c054, #d0cb4b,#69662d, rgba(0,0,0,1))!important; ">
    <div class="container">
        <a href="{{url('/')}}" class="brand-link" class="text-align:center">
            <img src="{{asset('upload').'/'.$settings['logo']}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <br/>
            <span class="brand-text font-weight-light">{{ $settings->ar_title }}</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#NavBar"
                aria-controls="NavBar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="NavBar">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0 ">




                @if(Session::has('error'))
                    <div class="alert alert-error"> {{ Session::get('error') }}</div>
                @endif
                @if($errors->any())
                    {!! implode('', $errors->all('<div class="alert alert-error">:message</div>')) !!}
                @endif

                @if(app()->isLocale('en'))
                    <li class="nav-item">
                        <a class="nav-link " href="{{url('lang/ar')}}"> <i class="saudi arabia flag"></i> العربية </a>
                    </li>

                @else
                    <li class="nav-item">
                        <a class="nav-link " href="{{url('lang/en')}}"> <i class="united kingdom flag"></i> english</a>
                    </li>

                @endif


                <li class="nav-item">
                    <button type="button" class="nav-link btn btn-select" data-toggle="modal" data-target="#examp">
                        {{trans('main.lang')}}
                    </button>
                </li>
          <li class="nav-item" >@if(!Auth::check())
                <form action="{{url('admin/login')}}" class="form-inline" method="post">
                    @csrf
                    <input class="form-control mr-sm-2" name="email" type="email" placeholder="{{trans('main.Email')}}" aria-label="{{trans('main.Email')}}" aria-autocomplete="false">
                    <input class="form-control mr-sm-2" name="password" type="password" placeholder="{{trans('main.Password')}}" aria-label="{{trans('main.Password')}}">
                    <button class="btn btn btn-warning btn-round-3 my-2 my-sm-0" type="submit"> {{trans('main.login')}}</button>
                </form>
          </li>
            @else
                <li class="nav-item">
                </li>
            @endif
            </ul>
        </div>
    </div>
</nav>
<div class="wrapper">


    <div class="card  tt " style="margin-top: 15% ; max-width: content-box ; overflow-x: hidden  ">
        <div class="card-body row ">
               <div class="col-sm-12" id="fadeshow1">   <form  action="{{url('admin/login')}}" class="form-inline" method="post">
                       @csrf
                       <label for="exampleInputEmail1">{{trans('main.Email')}}</label>

                       <input class="form-control mr-sm-2" name="email" type="email" placeholder="{{trans('main.Email')}}" aria-label="{{trans('main.Email')}}" aria-autocomplete="false">
                       <label for="exampleInputPassword1">{{trans('main.Password')}}</label>

                       <input class="form-control mr-sm-2" name="password" type="password" placeholder="{{trans('main.Password')}}" aria-label="{{trans('main.Password')}}">
                       <button class="btn btn btn-warning btn-round-3 my-2 my-sm-0" type="submit"> {{trans('main.login')}}</button>
                   </form></div>
            <div class="col-lg-6 col-sm-12">

                <form action="{{url('/admin/storeUser')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">{{trans('main.Name')}}</label>
                        <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{trans('main.Name')}}">
                    </div> <div class="form-group">
                        <label for="exampleInputEmail1">{{trans('main.Email')}}</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{trans('main.Email')}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">{{trans('main.Password')}}</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="{{trans('main.Password')}}">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label style="margin: 12px" class="form-check-label" for="exampleCheck1">{{trans('main.remember')}}</label>
                    </div>
                    <button type="submit" class="btn btn-warning round-2 col-lg-12">{{trans('main.Register')}}</button>
                </form>

            </div>

            <div class="col-lg-6 col-sm-12"><img width="200" height="300" class="card-img-top" src="{{asset('1.png')}}" alt="Card image cap"></div>

        </div>
    </div>
    @yield('contentindex')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
{{--    <script src="{{ asset('js/app.js')}}"></script>--}}
<script src="{{ asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables -->
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>

<script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- CK Editor -->
<script src="{{asset('admin/plugins/ckeditor/ckeditor.js')}}"></script>
<!---- added text color & background  and browse image --->

<!-- Select2 -->
<script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{asset('admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('admin/plugins/inputmask/jquery.inputmask.js')}}"></script>
<!-- date-range-picker -->
<script src="{{asset('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{asset('admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Bootstrap Switch -->
<script src="{{asset('admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<!-- AdminLTE App -->
<!-- SweetAlert2 -->
<script src="{{asset('admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('admin/plugins/toastr/toastr.min.js')}}"></script>

<!-- jquery-validation -->
<script src="{{ asset('admin/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('admin/plugins/jquery-validation/additional-methods.min.js')}}"></script>
<script src="vendor/jquery/dist/jquery.min.js"></script>

<script src="{{ asset('admin/js/adminlte.min.js')}}"></script>
<script>

    $(document).ready(function() {
        $.extend(true, $.fn.dataTable.defaults, {
            language: {
                "sEmptyTable": "ليست هناك بيانات متاحة في الجدول",
                "sLoadingRecords": "جارٍ التحميل...",
                "sProcessing": "جارٍ التحميل...",
                "sLengthMenu": "أظهر _MENU_ مدخلات",
                "sZeroRecords": "لم يعثر على أية سجلات",
                "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                "sInfoPostFix": "",
                "sSearch": "ابحث:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "الأول",
                    "sPrevious": "السابق",
                    "sNext": "التالي",
                    "sLast": "الأخير"
                },
                "oAria": {
                    "sSortAscending": ": تفعيل لترتيب العمود تصاعدياً",
                    "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
                }
            }
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<style>
    @media only screen and (min-width: 980px) {
        #fadeshow1 {
            display: none;
        }
    }
</style>
@stack('js')
</body>

</html>
