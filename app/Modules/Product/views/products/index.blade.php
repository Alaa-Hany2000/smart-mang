@extends('admin.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{trans("main.Products")}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">{{trans("main.Products")}}</a></li>
                            <li class="breadcrumb-item active">{{trans("main.Products")}}</li>
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
                                <h3 class="card-title">{{trans("main.Blogs Products DataTable")}}</h3>
                            </div>
                            <div class="card-header" >
                                <a class="btn btn-primary"  href="{{route('adminProducts.create')}}">{{trans("main.Add Product")}}</a>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-striped" style="width: 100%" id="facility_cat">
                                    <thead>
                                    <tr>
                                        <th>{{trans("main.id")}}</th>
                                        <th>كود</th>
                                        <th>{{trans("main.Name")}}</th>
                                        <th>{{trans("main.amount")}}</th>
                                        <th>{{trans('main.Category')}}</th>

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
                    url: "{{ route('adminProducts.index') }}",
                    type: 'GET',
                },
                columns: [
                    {data: "id" },
                    {data: "slug"},
                    {data: "title"},
                    {data: "total"},

                    {data: "category"},

                    {data: "action"}
                ]
            });


            // =========== Create new category ========
            // =========== Delete category ========
            $('body').on('click', '.delete-product', function () {
                var category_id = $(this).data("id");
                console.log(category_id)
                Swal.fire({
                    title: '{{trans('main.Do you want to delete it?')}}',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '{{trans('main.Yes,delete it!')}}',
                    cancelButtonText:'{{trans('main.cancel')}}'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: "{{ url('admin/adminProducts/delete') }}",
                            method: "post",
                            data:{'id':category_id},
                            statusCode: {
                                200: (response) => {
                                    Swal.fire(

                                        '{{trans('main.Delete!')}}',
                                        response.success,
                                        'success',

                                    )
                                    table.ajax.reload();
                                },
                                422:(response) => {
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
                $('body').on('change', '.onoffswitch-checkbox', function () {
    let blog_management_id = $(this).data('id');
    var attr = $(this).attr('checked');
    if (typeof attr !== typeof undefined && attr !== false){
    $(this).val("off")
    } else {
    $(this).val("on")
    }
    // console.log(blog_management_id,attr)
    // return ; adminCategories
    $.ajax({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
            url: "{{  url('/admin/adminCategories/update') }}",
            method: "get",
            data: {
            'blog_id':blog_management_id,
             'ttype':2,
                    'published':$(this).val(),
            },
            statusCode: {
            200: (response) => {
            toastr.success('success',response)
                    table.ajax.reload();
            },
                    404:(response) => {
            console.log('error', response)
            }
            }
    });
    })

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
