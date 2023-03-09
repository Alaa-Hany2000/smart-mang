@extends('admin.index')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">{{trans("main.Edit Profile")}}</h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">{{trans("main.Dashboard")}}</a></li>
                        <li class="breadcrumb-item active">{{trans("main.Edit Profile")}}</li>
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
                            <h3 class="card-title">{{trans("main.Edit Admin Profile")}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <!-- /.content-header -->
                                <form action="{{ url('/admin/updateProfile') }}" id="create-study-management" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="alerts">
                                            </div>
                                            @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul style="list-style: none;color:#fff">
                                                    @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif
                                            @if(Session::has('success'))
                                            <div class="alert alert-info text-center col-6 offset-3" id="successMessage" style="margin-top:10px;">
                                                {{ Session::get('success') }}
                                            </div>
                                            @elseif(Session::has('error'))
                                            <div class="alert alert-danger text-center col-6 offset-3" id="errorMessage" style="margin-top:10px;">
                                                {{ Session::get('error') }}
                                            </div>
                                            @endif
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-3 col-form-label">{{trans("main.Display name")}}</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}" />
                                                    <input type="text" name="id" hidden class="form-control" value="{{$user->id}}" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-3 col-form-label">{{trans("main.Email")}}</label>
                                                <div class="col-sm-9">
                                                    <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}" />
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-3">
                                                    <a href="#" data-toggle="modal" class="btn btn-info" data-target=".modal" id="change">{{trans("main.Change Password")}}</a>
                                                </div>
                                                <div class="col-sm-9">
                                                    <button type="submit" class="btn btn-info btn-block">{{trans("main.Update")}}</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            @if($user->photo !=null)
                                            <div class="card card-primary">
                                                <img class="img-fluid img-thumbnail" style="width: 100%;height:400px" id="img_view" src="<?php echo asset('upload/adminProfile/') . '/' . $user->photo ?>" alt="">
                                            </div>
                                            @else
                                            <div class="card card-primary">
                                                <img class="img-fluid img-thumbnail" style="width: 100%;height:400px" id="img_view" src="{{asset('admin/img/not_found.jpg')}}" alt="">
                                            </div>
                                            @endif
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-2 col-form-label">{{trans("main.Image")}}</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="img_url" id="img_url" class="form-control" />
                                                            <label class="custom-file-label" id="img_lable" for="img_url"> {{trans("main.Choose Photo")}}</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <button type="button" id="removeImage" class="btn btn-danger upload-image">{{trans("main.Remove")}}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
@include('adminAccount.changePassword')
<!-- /.login-box -->
@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script>
    $(document).ready(() => {
        $('#editAdminProfile').on('submit', function() {
            return;
        })
        $('#editAdminProfile').validate({
            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                // img_url: {
                //     required: true
                // }
            },
            messages: {
                name: {
                    required: '{{trans("main.Please enter a user name")}}',
                },
                email: {
                    required: '{{trans("main.Please valid email")}}',
                },
                // img_url: {
                //     required: "Please enter a Image"
                // }
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });

        setTimeout(function() {
            $('#successMessage').fadeOut(100);
            $('#errorMessage').fadeOut(100);
        }, 4000);
        $("#img_url").on('change', function(e) {
            $("#img_lable").text($(this).prop('files')[0].name)
            $("#img_view").attr('src', URL.createObjectURL(e.target.files[0]))
        })
        $("#change").on('click', function() {
            $('.alerts').children().remove();
            let oldPassword = $("#oldPassword");
            let newPassword = $("#newPassword");
            let configPassword = $("#configPassword");
            oldPassword.val('')
            newPassword.val('')
            configPassword.val('')
        })
        $("#removeImage").on('click', function() {
            // e.preventDefault();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{url('admin/deleteImage')}}",
                method: "post",
                "_token": "{{ csrf_token() }}",
                data: {},
                success(data) {
                    if (data.message) {
                        $("#img_view").attr('src', '{{ asset("admin/img/not_found.jpg")}}');
                        swal({
                            title: `${data.message}`,
                            type: "success",
                            confirmButtonColor: '#09305f',
                            confirmButtonText: 'OK',
                        });
                        $("#img_lable").text('{{trans("main.Choose file")}}');
                    }

                },
                error: function() {
                    console.log('error');
                },
                complete: function() {}

            });
        });
    });
</script>
@endpush
