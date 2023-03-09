@extends('admin.index')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{trans("main.Edit User")}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">{{trans("main.Edit User")}}</a></li>
                            <li class="breadcrumb-item active">{{trans("main.Edit User")}}</li>
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
                                <h3 class="card-title">{{trans("main.Edit User")}}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="card-header">
                                    <h3 class="card-title">{{trans('main.Edit User')}}</h3>
                                </div>
                                @if(Session::has('error'))
                                    <div class="alert alert-danger text-center col-6 offset-3" id="errorMessage" style="margin-top:10px">
                                        {{ Session::get('error') }}
                                    </div>
                                @endif
                                <form action="{{url('/admin/updateUser')}}" id="addUserForm" class="form-horizontal" role="form" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">{{trans("main.Display Name")}}</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="name" value="{{$user->name}}" class="form-control"/>
                                                    <input type="text" name="id" hidden value="{{$user->id}}" class="form-control"/>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">{{trans("main.Email")}}</label>
                                                <div class="col-sm-10">
                                                    <input type="email" name="email" value="{{$user->email}}" class="form-control"/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">{{trans("main.Edit Role")}}</label>
                                                <div class="col-sm-10">
                                                    <select name="roleID" id="category_id"  class="form-control">
                                                        <option value="" selected="selected" disabled="disabled">{{trans("main.Select Role")}}</option>
                                                        @if(count($roles)>0)
                                                            @foreach($roles as $role)
                                                                <option value="{{$role->id}}" selected="@if($user->roleName == $role->name): selected @endif">{{$role->ar_name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">{{trans("main.Password")}}</label>
                                                <div class="col-sm-10">
                                                    <input type="password" name="password" value="" class="form-control" placeholder="Enter New Password"/>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">{{trans("main.Confirm Password")}}</label>
                                                <div class="col-sm-10">
                                                    <input type="password" name="confirm" value="" class="form-control" placeholder=" Confirm New Password"/>
                                                </div>
                                            </div>
                                                <button type="submit" class="btn btn-info col-lg-12 ">{{trans('main.Save')}}</button>

                                        </div>
                                    </div>
                                </form>

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
<!-- /.login-box -->
@endsection
@push('js')
    <script>
        setTimeout(function() {
            $('#errorMessage').fadeOut(100);
        }, 4000);
    </script>
@endpush
