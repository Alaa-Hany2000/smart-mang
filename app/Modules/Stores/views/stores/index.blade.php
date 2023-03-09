@extends('admin.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{trans("main.Stores")}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">{{trans("main.Stores")}}</a></li>
                            <li class="breadcrumb-item active">{{trans("main.Stores")}}</li>
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
                                <h3 class="card-title">{{trans("main.Blogs Stores DataTable")}}</h3>
                            </div>
                            <div class="card-header" style="border-bottom: none">
                                <button class="btn btn-primary" data-toggle="modal"
                                        data-target="#createstore">{{trans("main.Add store")}}</button>
                                <a class="btn btn-primary" href="{{ route('stores.pdf') }}">Export to PDF</a>
                                <a class="btn btn-primary" href="{{ route('stores.excel') }}">Export to excel</a>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-striped" style="width: 100%" id="facility_cat">
                                    <thead>
                                    <tr>
                                        <th>{{trans("main.id")}}</th>
                                        <th>{{trans("main.Title")}}</th>
                                        <th>{{trans('main.phone')}}</th>
                                        <th>{{trans('main.manger')}}</th>
                                        <th>{{trans('main.Action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
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
    <div class="modal fade" id="editstrore">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{trans("main.Edit store")}} <span id="store_name"></span></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- form start -->
                <form action="#" method="post" role="form">
                    @csrf
                    {{--
                                        @method("PATCH")
                    --}}
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" class="form-control" id="id">
                                    <div class="form-group row">
                                        <label for="title"
                                               class="col-sm-2 col-form-label">{{trans("main.Title")}}</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="title"
                                            >
                                        </div>
                                    </div>


                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="phone"
                                               class="col-sm-2 col-form-label">{{trans("main.Phone")}}</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="phone"
                                            >
                                        </div>
                                    </div>


                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="address"
                                               class="col-sm-2 col-form-label">{{trans("main.Address")}}</label>
                                        <div class="col-sm-10">
                                            <textarea rows="4" class="form-control" id="address"
                                            ></textarea>
                                        </div>
                                    </div>


                                </div>
                                <div class="col-md-12">
                                    <?php
                                    $users = \App\Models\User::all();
                                    ?>
                                    <div class="form-group row">
                                        <label for="create_user_id"
                                               class="col-sm-2 col-form-label">{{trans("main.Manger")}}</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="user_id"
                                            >
                                                @foreach($users as $user)
                                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default"
                                        data-dismiss="modal">{{trans("main.Close")}}</button>
                                <button type="submit" class="btn btn-primary"
                                        id="save_store">{{trans("main.Save changes")}}</button>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- /.modal -->
    <div class="modal fade" id="createstore">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{trans("main.Add store")}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- form start -->
                <form action="#" class="form-horizontal" method="post" role="form">
                    @csrf
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="create_title"
                                               class="col-sm-2 col-form-label">{{trans("main.Title")}}</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="create_title"
                                                   placeholder="{{trans('main.Enter Title')}}">
                                        </div>
                                    </div>


                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="create_phone"
                                               class="col-sm-2 col-form-label">{{trans("main.Phone")}}</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="create_phone"
                                                   placeholder="{{trans('main.Enter Phone')}}">
                                        </div>
                                    </div>


                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="create_address"
                                               class="col-sm-2 col-form-label">{{trans("main.Address")}}</label>
                                        <div class="col-sm-10">
                                            <textarea rows="3" class="form-control" id="create_address"
                                                      placeholder="{{trans('main.Enter address')}}"></textarea>
                                        </div>
                                    </div>


                                </div>
                                <div class="col-md-12">
                                    <?php
                                    $users = \App\Models\User::all();
                                    ?>
                                    <div class="form-group row">
                                        <label for="create_user_id"
                                               class="col-sm-2 col-form-label">{{trans("main.Manger")}}</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="create_user_id"
                                            >
                                                <option value="" disabled selected>{{trans('main.Chose')}}</option>
                                                @foreach($users as $user)
                                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                </div>


                            </div>

                        </div>


                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default"
                                    data-dismiss="modal">{{trans("main.Close")}}</button>
                            <button type="submit" class="btn btn-primary" id="addstore">{{trans("main.Save")}}</button>
                        </div>

                    </div>
                    <!-- /.card-body -->

                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- /.modal -->
@endsection

@push('js')
    <script>
        $(document).ready(() => {
            let Category_id;
            $('.select2').select2()
            let table = $('#facility_cat').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                ajax: {
                    url: "{{ route('adminStores.index') }}",
                    type: 'GET',
                },
                columns: [
                    {data: "id"},
                    {data: "title"},
                    {data: "phone"},
                    {data: "name"},


                    {data: "action"}
                ]
            });

            $("body").on("click", ".editstrore", function () {
                let title = $(this).data("title");
                Category_id = $(this).data("id");
                let address = $(this).data("address");
                let phone = $(this).data("phone");
                let user_id = $(this).data("user_id");
                // return ;

                $("#title").val(title)
                $("#phone").val(phone)
                $("#address").val(address)
                $("#user_id").val(user_id)


            })
            // =========== Update category ========
            $('body').on('click', '#save_store', function (e) {

                e.preventDefault()
                let title = $("#title").val();
                let phone = $("#phone").val();
                let address = $("#address").val();
                let user_id = $("#user_id").val();
                let id = $("#id").val();
                // console.log($('#published').val())
                // return ;
                let formData = new FormData();
                formData.append('title', title);
                formData.append('address', address);
                formData.append('phone', phone);
                formData.append('user_id', user_id);
                formData.append('id', id);


                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('admin/adminStores/update') }}",
                    method: "get",
                    data: formData,
                    contentType: false,
                    processData: false,
                    statusCode: {
                        200: (response) => {
                            toastr.success(response.success)
                            $("#editstrore").modal('hide');
                            table.ajax.reload();
                        },
                        404: (response) => {
                            console.log('error', response)
                        }
                    }
                });

            });
            // =========== Create new category ========
            $("#createstore").on('submit', (e) => {
                e.preventDefault();

                let store_title = $("#create_title").val();
                let store_address = $("#create_address").val();
                let store_phone = $("#create_phone").val();
                let store_user_id = $("#create_user_id").val();
                let formData = new FormData();
                formData.append('title', store_title);
                formData.append('address', store_address);
                formData.append('phone', store_phone);
                formData.append('user_id', store_user_id);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route("adminStores.store") }}",
                    method: "POST",
                    // type:"POST",
                    {{--"_token": "{{ csrf_token() }}", --}}
                    data: formData,
                    contentType: false,
                    processData: false,
                    statusCode: {
                        200: (response) => {
                            toastr.success(response.success)
                            $("#createstore").modal('hide');

                            table.ajax.reload();
                            // $('#create_published').removeAttr('checked');
                        },
                        404: (response) => {
                            if (response.responseJSON.error.title) {
                                for (const error of response.responseJSON.error.title) {
                                    toastr.error(error)
                                }
                            }
                            if (response.responseJSON.error.img_url) {
                                for (const error of response.responseJSON.error.img_url) {
                                    toastr.error(error)
                                }
                            }
                        }
                    }
                })
            })
            // =========== Delete category ========
            $('body').on('click', '.delete-category', function () {
                var category_id = $(this).data("id");
                console.log(category_id)
                Swal.fire({
                    title: '{{trans('main.Do you want to delete it?')}}',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '{{trans('main.Yes,delete it!')}}',
                    cancelButtonText: '{{trans('main.cancel')}}'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: "{{ url('admin/adminStores/delete') }}",
                            method: "post",
                            data: {'id': category_id},
                            statusCode: {
                                200: (response) => {
                                    Swal.fire(
                                        '{{trans('main.Delete!')}}',
                                        response.success,
                                        'success',
                                    )
                                    table.ajax.reload();
                                },
                                422: (response) => {
                                    Swal.fire(
                                        '{{trans('لا يمكن الحذف')}}',
                                        response.error,
                                        'error'
                                    )
                                }
                            }
                        });
                    }
                })
            });
            // =========== get data of lang ========

        })
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
