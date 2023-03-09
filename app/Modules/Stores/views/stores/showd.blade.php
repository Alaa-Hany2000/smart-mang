@extends('admin.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{trans("main.Stores Info")}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">{{trans("main.Stores")}}</a></li>
                            <li class="breadcrumb-item active">{{trans("main.Stores Info")}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                        <div class="row">
                            <div class="card col-lg-12">
                                <div class="card-header d-flex p-0">
                                    <h3 class="card-title p-3">{{trans('main.Stores Info')}}</h3>
                                    <ul class="nav nav-pills ml-auto p-2">

                                        <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">{{trans('main.Employees')}}</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">{{trans('main.Categories')}}</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">ايام العمل</a></li>
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active col-lg-12" id="tab_1">
                                            <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                                <thead>
                                                <tr>

                                                    <th>{{trans('main.Name')}}</th>
                                                    <th>{{trans('main.Published')}}</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if($users->count()>0)
                                                    @foreach($users as $user)

                                                        <tr>
                                                    <td>{{$user->name}}</td>
                                                    <td>@if(in_array($user->id,$u))
                                                        <label class="switch">
                                                            <input type="hidden" class='id' name="id" value="{{$user->id}}">
                                                            <input type="checkbox" class="onoffswitch-checkbox" name="published" store_id="{{$store->id}}" id="{{$user->id}}" checked>
                                                            <span class="slider round"></span>
                                                        </label>@else
                                                            <label class="switch">
                                                                <input type="hidden" class='id' name="id" value="{{$user->id}}">

                                                                <input type="checkbox" class="onoffswitch-checkbox" name="published" store_id="{{$store->id}}" id="{{$user->id}}" >
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @endif
                                                    </td>

                                                </tr>
                                                    @endforeach
                                                      @endif
                                                </tbody>

                                            </table>


                                        </div>
                                        <!-- /.tab-pane -->
                                        <div class="tab-pane" id="tab_2">
                                            <table class="table table-sm-12">
                                                <thead>
                                                <tr>

                                                    <th>{{trans('main.Name')}}</th>
                                                    <th>{{trans('main.Published')}}</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if($categories->count()>0)
                                                    @foreach($categories as $category)

                                                        <tr>
                                                            <td>{{$category->title}}</td>
                                                            <td>@if(in_array($category->id,$m))
                                                                    <label class="switch">
                                                                        <input type="hidden" class='id' name="id" value="{{$category->id}}">
                                                                        <input type="checkbox" class="switch-checkbox" name="published" store_id="{{$store->id}}" id="{{$category->id}}" checked>
                                                                        <span class="slider round"></span>
                                                                    </label>@else
                                                                    <label class="switch">
                                                                        <input type="hidden" class='id' name="id" value="{{$category->id}}">

                                                                        <input type="checkbox" class="switch-checkbox" name="published" store_id="{{$store->id}}" id="{{$category->id}}" >
                                                                        <span class="slider round"></span>
                                                                    </label>
                                                                @endif
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                @endif
                                                </tbody>
                                            </table>

                                        </div>
                                        <!-- /.tab-pane -->
                                        <div class="tab-pane" id="tab_3">

                                           @foreach($days as $day)

                                                <div class="form-group row">
                                                    <div class="col-sm-2">
                                                    </div>
                                                    <div id="toggle{{$day->order}}" class="col-sm-10btn btn-success btn-block toggle">
                                                        <label >عمل يوم:{{$day->name}}</label>
                                                    </div>
                                                </div>

                                                <div id="target{{$day->order}}">
                                                    <div class="form-group row">
                                                        <label for="from_date" class="col-sm-2 col-form-label">يبداء في</label>
                                                        <div class="col-sm-10">
                                                            <input type="time" name="start{{$day->order}}"  value="{{old('start'.$day->order)}}"  class="form-control"   min="06:00" max="20:00"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="to_date" class="col-sm-2 col-form-label">{{trans("main.Expired_at")}}</label>
                                                        <div class="col-sm-10">
                                                            <input type="time" name="end{{$day->order}}"  value="{{old('end'.$day->order)}}"  class="form-control"  min="06:00" max="20:00" />
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
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

                var attr = $(this).attr('checked');
                if (typeof attr !== typeof undefined && attr !== false){
                    $(this).val("off")
                    alert('jjjj');
                } else {
                    $(this).val("on")
                }
                // console.log(blog_management_id,attr)
                // return ;

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{  url('/admin/adminStores/employees') }}",
                    method: "post",
                    data: {
                        'user_id':id,
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
            $('body').on('change', '.switch-checkbox', function () {
                var id =  $(this).attr('id');
                var store_id =  $(this).attr('store_id');

                var attr = $(this).attr('checked');
                if (typeof attr !== typeof undefined && attr !== false){
                    $(this).val("off")
                } else {
                    $(this).val("on")
                }
                // console.log(blog_management_id,attr)
                // return ;

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{  url('/admin/adminStores/categories') }}",
                    method: "post",
                    data: {
                        'category_id':id,
                        'store_id':store_id,
                        'published':$(this).val(),
                    },
                    statusCode: {
                        200: (response) => {
                            toastr.success(response.success)
                        },
                        404:(response) => {
                            console.log('error', response)
                        }
                    }
                });

            })

        })
    </script>
<script>
    // Basic example
    $(document).ready(function () {
        $('#dtBasicExample').DataTable({
            "pagingType": "simple" // "simple" option for 'Previous' and 'Next' buttons only
        });
        $('.dataTables_length').addClass('bs-select');
    });

</script>
    <script type="text/javascript">
        $(document).ready(function() {

            $("#toggle1").click(function(){
                $("#target1").toggle( 'slow', function(e){
                    stop();
                });
            });
            $("#toggle2").click(function(){
                $("#target2").toggle( 'slow', function(e){
                    stop();
                });
            });
            $("#toggle3").click(function(){
                $("#target3").toggle( 'slow', function(e){
                    stop();
                });
            });
            $("#toggle4").click(function(){
                $("#target4").toggle( 'slow', function(e){
                    stop();
                });
            });
            $("#toggle5").click(function(){
                $("#target5").toggle( 'slow', function(e){
                    stop();
                });
            });
            $("#toggle6").click(function(){
                $("#target6").toggle( 'slow', function(e){
                    stop();
                });
            });
            $("#toggle7").click(function(){
                $("#target7").toggle( 'slow', function(e){
                    stop();
                });
            });
            });
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
