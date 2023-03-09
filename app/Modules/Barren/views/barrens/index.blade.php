@extends('admin.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">حركة الجرد</h1>

                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a  href="#">حركة الجرد</a></li>
                            <li class="breadcrumb-item active">حركة الجرد</li>
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

                            <div class="card-header col-lg-12">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <h3 class="card-title">حركة الجرد</h3>
                                    </div>
                                    <div class=" col-lg-12">
                                        <form method="post" action="{{route('barrens.store')}}" class="form-inline col-lg-12">
                                            @csrf

                                                    <div class=" col-sm-1">
                                                        <label for="staticEmail2" class="">من</label>
                                                    </div>
                                                    <div class=" col-sm-4">
                                                        <input required type="date"  name="start_at" class="form-control-plaintext" id="staticEmail2"   value="2022-09-15"
                                                               min="2022-01-01" max="2088-12-31">
                                                    </div>
                                                    <div class=" col-sm-1">
                                                        <label for="staticEmail2" class="">الي</label>
                                                    </div>
                                                    <div class=" col-sm-4">
                                                        <input required type="date" name="end_at"  class="form-control-plaintext" id="staticEmail2"   value="2022-09-15"
                                                               min="2022-01-01" max="2088-12-31">
                                                    </div>
                                                    <div class=" col-sm-2">

                                                        <button type="submit" class="btn btn-primary">اضافه جرد</button>
                                                    </div>

                                        </form>
                                    </div>
                                </div>

                        </div>


                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-striped" style="width: 100%" id="facility_cat">
                                    <thead>
                                    <tr>
                                        <th>{{trans("main.id")}}</th>

                                        <th>تاريخ الجرد</th>
                                                                                <th> من</th>
                                                                                <th> الي</th>
                                                                                <th> القائم</th>

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
                    url: "{{ route('barrens.index') }}",
                    type: 'GET',
                },
                columns: [
                    {data: "id" },
                      {data: "created_at"},
                      {data: "start_at"},
                      {data: "end_at"},
                      {data: "user"},




                    {data: "action"}
                ]
            });
            $('body').on('click', '.delete-category', function () {
                var id = $(this).data("id");
                console.log(id)
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
                            url: "{{ asset('admin/barrens/delete') }}" + '?id=' + id,
                            method: "delete",
                            type: 'DELETE',
                            statusCode: {
                                200: (response) => {
                                    Swal.fire(
                                        '{{trans('main.Delete!')}}', response.success, 'success',

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


            // =========== Create new category ========
            // =========== Delete category ========
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
