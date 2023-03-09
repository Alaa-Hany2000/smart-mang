@extends('admin.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{trans("main.Suppliers")}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">{{trans("main.Suppliers")}}</a></li>
                            <li class="breadcrumb-item active">{{trans("main. Edit_Suppliers")}}</li>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-name">{{trans("main.Blogs Suppliers DataTable")}}</h3>
                            </div>
                            <div class="card-header" style="border-bottom: none">
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">

                                <div class="container">
                                    <h2>{{trans('main.Edit_Suppliers')}}</h2>
                                    <form action="{{route('adminSuppliers.update',$Suppliers->id)}}" method="post" name="registration">
                                        @method('PUT')

                                        @csrf
                                        <div class="form-group">

                                            <label for="name">{{trans('main.Name')}}</label>
                                            <input type="text" name="name" id="name" value="{{$Suppliers->name}}" class="form-control" placeholder="John"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">{{trans('main.Phone')}}</label>
                                            <input type="text" name="phone" value="{{$Suppliers->phone}}" id="phone" class="form-control" placeholder="0000"/>
                                        </div>
                                        <div class="form-group">

                                            <label for="email">{{trans('main.Email')}}</label>
                                            <input type="email" name="email" id="email" value="{{$Suppliers->email}}"  class="form-control" placeholder="john@doe.com"/>
                                        </div>
                                        <div class="form-group">

                                            <label for="address">{{trans('main.Address')}}</label>
                                            <input type="text" name="address" id="address"  value="{{$Suppliers->address}}" class="form-control" placeholder="{{trans('main.Address')}}"/>
                                        </div>
                                        <div class="form-group">

                                            <label for="info">{{trans('main.Info')}}</label>
                                            <input type="text" name="info" id="info" value="{{$Suppliers->info}}"  class="form-control" placeholder="{{trans('main.Info')}}"/>
                                        </div>

                                        <div class="form-group">

                                            <button class="btn btn-success btn-block" type="submit">{{trans('main.Edit')}}</button>
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
    <!-- /.content-wrapper -->
    <!-- /.modal -->
    <!-- /.modal -->
    <!-- /.modal -->
    <!-- /.modal -->
    <!-- /.modal -->
@endsection

@push('js')
    <script>
        // Wait for the DOM to be ready
        $(function() {
            // Initialize form validation on the registration form.
            // It has the name attribute "registration"
            $("form[name='registration']").validate({
                // Specify validation rules
                rules: {
                    // The key name on the left side is the name attribute
                    // of an input field. Validation rules are defined
                    // on the right side
                    name: "required",
                    phone:
                        {   required  : true,
                            matches   : "^(\\d|\\s)+$",
                            minlength : 10,
                            maxlength : 20}
                    ,
                    address: {
                        required: true,
                        // Specify that email should be validated
                        // by the built-in "email" rule
                    },
                    info: {
                        required: false,
                        minlength: 5
                    }
                },
                // Specify validation error messages
                messages: {
                    name: "{{trans('main.Please enter')}}",
                   name: "ادخل الاسم",
                      address: "ادخل العنوان",
                    phone: {required: "ادخل رقم الهاتف", minlength: "{{trans('main.Your_phone_must_be_at_least_10_characters_long')}}"}
                ,
                    email: "Please enter a valid email address"
                },
                // Make sure the form is submitted to the destination defined
                // in the "action" attribute of the form when valid
                submitHandler: function(form) {
                    form.submit();
                }
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
