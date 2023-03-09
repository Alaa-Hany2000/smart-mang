@extends('admin.adminlayout')
@section('contentindex')

    <div class="login-box text-center" style="margin: auto;margin-top: 70px;">
        <div class="login-logo">
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <center>
                    <a href="url('/')"><img src="{{asset('front/img')}}/logo.png"></a>
                    <p class="login-box-msg">{{trans("Sign in to start your session")}}</p>
                </center>

                @if(Session::has('error'))
                    <div class="alert alert-error"> {{ Session::get('error') }}</div>
                @endif
                @if($errors->any())
                    {!! implode('', $errors->all('<div class="alert alert-error">:message</div>')) !!}
                @endif
                <form action="{{url('admin/login')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <input type="email" name="email" class="form-control" placeholder="Email">

                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <input type="password" name="password" class="form-control" placeholder="Password">

                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    {{trans("Remember Me")}}
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">{{trans("Sign In")}}</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
@endsection
