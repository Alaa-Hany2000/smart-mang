@extends('admin.index')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{trans("main.Add New User")}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">{{trans("main.Add New User")}}</a></li>
                            <li class="breadcrumb-item active">{{trans("main.Add New User")}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{trans("main.Add New User")}}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul style="list-style: none;">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <!-- /.content-header -->

                                    <form action="{{url('/admin/storeUser')}}" id="addUserForm" class="form-horizontal" role="form" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">{{trans("main.Display Name")}}</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="name" class="form-control" placeholder="{{trans('main.Enter User Name')}}"/>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">{{trans("main.Email")}}
                                                    </label>

                                                    <div class="col-sm-10">
                                                        <input type="email" name="email" class="form-control" placeholder="{{trans('main.Enter Email Address')}}"/>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">{{trans("main.Add Role")}}</label>
                                                    <div class="col-sm-10">
                                                        <select name="roleID" id="category_id"  class="form-control">
                                                            <option value="" selected="selected" disabled="disabled">{{trans("main.Select Role")}}</option>
                                                            @if(count($roles)>0)
                                                                @foreach($roles as $role)
                                                                    <option value="{{$role->id}}">{{$role->ar_name}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">{{trans("main.Password")}}</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" name="password" id="password" class="form-control" placeholder="{{trans('main.Enter Password')}}"/>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">{{trans("main.Confirm Password")}}</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" name="confirm" class="form-control" placeholder="{{trans('main.Enter Confirm Password')}}"/>
                                                    </div>
                                                </div>
                                                    <button type="submit" class="btn btn-info col-lg-12 ">{{trans('main.Save')}}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->

    </div>


{{--
    <div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="content-wrapper">
                <div class="card-body">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('main.Add New User ')}}</h3>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul style="list-style: none;">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(Session::has('error'))
                        <div class="alert alert-danger text-center col-6 offset-3" id="errorMessage" style="margin-top:10px">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    <form action="{{url('/admin/storeUser')}}" id="addUserForm" class="form-horizontal" role="form" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">{{trans("main.Display Name")}}</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" placeholder="Enter User Name"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">{{trans("main.Email")}}
                                        <span>login email</span>
                                    </label>

                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control" placeholder="Enter Email Address"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">{{trans("main.Add Role")}}</label>
                                    <div class="col-sm-10">
                                    <select name="roleID" id="category_id"  class="form-control">
                                        <option value="" selected="selected" disabled="disabled">{{trans("main.Select Role")}}</option>
                                        @if(count($roles)>0)
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">{{trans("main.Password")}}</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password"/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">{{trans("main.Confirm Password")}}</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="confirm" class="form-control" placeholder="Enter Confirm Password"/>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">{{trans('main.Submit')}}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
--}}
<!-- /.login-box -->
@endsection
@push('js')
    <script>
            $(document).ready(() => {
            $('#addUserForm').on('submit',function(){
                return;
            })
           $('#addUserForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    password: {
                        required: true,
                        minlength: 5

                    },
                    confirm: {
                        required: true,
                        minlength: 5,
                        equalTo: "#password"
                    },
                    roleID:{
                        required:true
                    }
                },
                messages: {
                    name: {
                        required: '{{trans("main.Please enter a user name")}}',
                    },
                    email: {
                        required: '{{trans("main.Please enter a user email")}}',
                    },
                    password: {
                        required:'{{trans("main.Please enter a password")}}' ,
                    },
                    confirm:{
                        required: '{{trans("main.Please confirm password" )}}'
                    },
                    roleID:{
                        required: '{{trans('main.Please Choose Role To User')}}'
                    }

                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
                }
            });

    })
        setTimeout(function() {
            $('#errorMessage').fadeOut(100);
        }, 4000);
    </script>
@endpush
