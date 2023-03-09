@extends('admin.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{trans("main.Customers")}}</h1>
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
                                <a class="btn btn-primary"
                                   href="{{route('adminCustomers.create')}}">{{trans('main.add') . ' ' .  trans('main.customer')}}</a>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-striped" style="width: 100%" id="facility_cat">
                                    <thead>
                                    <tr>
                                        <th>{{trans("main.id")}}</th>
                                        <th>{{trans("main.Name")}}</th>
                                        <th>{{trans('main.phone')}}</th>
                                        <th>{{trans('main.Address')}}</th>
                                        <th>{{trans('main.Action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
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
                    url: "{{ route('adminCustomers.index') }}",
                    type: 'GET',
                },
                columns: [
                    {data: "id"},
                    {data: "name"},
                    {data: "phone"},
                    {data: "address"},


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
            $('body').on('submit', '#editstrore', function (e) {
                e.preventDefault();

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
                    url: "{{ url('admin/adminCustomers/updatee') }}",
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
                            url: "{{ url('admin/adminCustomers/delete') }}",
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
                                        '{{trans('main.you can not delete  blog a content founded')}}',
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
