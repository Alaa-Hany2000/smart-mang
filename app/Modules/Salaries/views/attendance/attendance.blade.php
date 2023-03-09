@extends('admin.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">الحضور والانصراف اليوم</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">الحضور والانصراف اليوم</a></li>
                            <li class="breadcrumb-item active">الحضور والانصراف اليوم</li>
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
                                <h3 class="card-title">الحضور والانصراف اليومي</h3>
                            </div>
                            <div class="card-header" style="border-bottom: none">
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-striped" style="width: 100%" id="facility_cat">
                                    <thead>
                                    <tr>
                                        <th>{{trans("main.id")}}</th>
                                        <th>المخزن</th>
                                        <th>حضور</th>
                                        <th>انصراف</th>
                                        <th>الاسم</th>
                                        <th>البريد الالكتروني</th>
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
    <!-- /.modal -->
    <div class="modal fade" id="editCategory">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{trans("main.Edit Category")}} <span id="category_name"></span></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- form start -->
                <form action="#" method="post" role="form">
                    @csrf
                    @method("PATCH")
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" class="form-control" id="id">
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-2 col-form-label">{{trans("main.Title")}}</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="title"
                                                   placeholder="{{trans('main.Enter Title')}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="info" class="col-sm-2 col-form-label">{{trans("main.Info")}}</label>
                                        <div class="col-sm-10">
                                        <textarea row="5" class="form-control" id="info"
                                                  placeholder="{{trans('main.Enter_Info')}}"></textarea>
                                        </div>
                                    </div>

                                    {{--
                                                                    <div class="form-group">
                                                                        <label>{{trans("main.Language")}}</label>
                                                                        <select class="form-control select2" id="language" style="width: 100%;">
                                                                            <option value="" selected="selected">{{trans("main.Select Language")}}</option>
                                                                            @foreach($languages as $language)
                                                                            <option value="{{$language->id}}">{{$language->title}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                    --}}
                                    <div class="form-group row">
                                        <label for="published" class="col-sm-2 col-form-label">{{trans("main.Published")}}</label>
                                        <div class="col-sm-10">
                                            <label class="switch">
                                                <input type="checkbox" class="onoffswitch" name="published" id="published" checked>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-group text-center">
                                            <img class="img-fluid img-thumbnail w-100"  id="img_view" src="{{asset('images/Image.png')}}" alt="">
                                        </div>

                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="imag_url">
                                                <label class="custom-file-label" id="img_lable" for="imag_url">{{trans("main.Choose Photo")}}</label>
                                            </div>
                                            <div class="input-group-append">
                                                <button type="button" id="remove_img" class="input-group-text btn btn-danger">{{trans("main.Remove")}}</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>



                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{trans("main.Close")}}</button>
                        <button type="button" class="btn btn-primary" id="save_category">{{trans("main.Save changes")}}</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- /.modal -->
    <!-- /.modal -->
    <!-- /.modal -->
@endsection

@push('js')
    <script>
        $(document).ready(() => {
            let id;
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
                    url: "{{ route('adminAttendance.index') }}",
                    type: 'GET',
                },
                columns: [
                    {data: "id" },
                    {data: "title"},

                    {data: "attend_at"},


                    {data: "departure_at"},
                    {data: "name"},

                    {data: "email"},
                ]
            });

            // =========== Create new category ========

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
