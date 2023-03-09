@extends('admin.index')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{trans('main.Users Management') }}</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a href="{{ url('/admin/addUser') }}" id="open_model_Aop7U" class="btn btn-info">
                        <i class="fa fa-fw fa-plus"></i>
                        {{trans('main.Add New') }}
                    </a>
                    <table id="users_management" class="table table-bordered table-striped" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('main.Name') }}</th>
                                <th>{{trans('main.Email') }} </th>
                                <th>{{trans('main.Role') }}</th>
                                <th>{{trans('main.Action') }}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>

    </section>
</div>

@endsection
@push('js')
    <script>
        $(document).ready(() => {


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            });
            var table = $('#users_management').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                searchable: true,
                ajax: {
                    url: "{{ url('admin/listUsers') }}",
                    method: 'GET',
                },
                columns: [{
                        data: 'id',
                        name: '#'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'Email'
                    },
                    {
                        data: 'roleName',
                        name: 'roleName'
                    },
                    {
                        data: "action",
                        name: 'Action',
                        orderable: false
                    }
                ]
            });
        });

    </script>
@endpush
@push('css')
    <style>
        .dataTables_filter {
            display: flex;
            justify-content: flex-end;
        }

        .dataTables_paginate.paging_simple_numbers .pagination {
            display: flex;
            justify-content: flex-end;
        }

    </style>
@endpush
