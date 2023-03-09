@extends('admin.index')
@push('js')
    @if(Session::has('success'))
        <script>
            toastr.success("{{ session('success') }}");
        </script>
    @elseif(Session::has('error'))
        <script>
            toastr.error("{{ session('error') }}");
        </script>
    @endif

@endpush
@section('content')



    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="card-body">
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{trans('settings.settings')}}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{route('settings.update')}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    @foreach($settings as $setting)
                                        <a href="#" class="float-left deleteKey" data-id="{{$setting->id}}"><i
                                                class="fas fa-trash"></i></a>
                                        @if($setting->type == 'text')
                                            <div class="form-group">
                                                <label for="">{{trans('settings.' .$setting->display_name)}}</label>


                                                <input type="text" class="form-control" id="{{$setting->key}}"
                                                       name="{{$setting->key}}" value="{{ $setting->value ?? '' }}">

                                            </div>

                                        @elseif($setting->type == "text_area")
                                            <div class="form-group">
                                                <label
                                                    for="{{ $setting->key }}">{{trans('settings.' .$setting->display_name)}}</label>
                                                <textarea class="form-control"
                                                          name="{{ $setting->key }}">{{ $setting->value ?? '' }}</textarea>
                                            </div>
                                        @elseif($setting->type == 'image' || $setting->type== 'file')
                                            <div class="form-group">
                                                <label
                                                    for="{{ $setting->key }}">{{trans('settings.' .$setting->display_name)}}</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="{{ $setting->key }}"
                                                               class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                                            file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">{{trans('main.Save')}}</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{trans('settings.Add new column')}}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{route('settings.store')}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group col-md-6">
                                        <label for="key">key</label>
                                        <input type="text" class="form-control" id="key" name="key">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="type">Type</label>
                                        <select name="type" class="form-control" required="required">
                                            <option value="">Choose type</option>
                                            <option value="text">{{trans('text') }}</option>
                                            <option value="text_area">{{trans('textarea') }}</option>
                                            <option value="file">{{ trans('file') }}</option>
                                            <option value="image">{{ trans('image') }}</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="display_name">display name</label>
                                        <input type="text" class="form-control" id="key" name="display_name">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="display_name">display name in Arabic</label>
                                        <input type="text" class="form-control" id="key" name="display_name_in_arabic">
                                    </div>


                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">{{trans('main.Save')}}</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('js')
    <script>

        setTimeout(function () {
            $('#successMessage').fadeOut(100);
        }, 4000);

        $('.deleteKey').on('click', function (e) {
            let id = $(this).data('id');

            if (confirm('هل أنت متأكد؟')) {
                let url = '{{url('admin/settings/delete')}}/' + id;
                $.ajax({
                    url: url,
                    data: {
                        _token: '{{csrf_token()}}',
                    },
                    type: 'DELETE',
                    dataType: 'JSON',
                    beforeSend: function () {
                        toastr.info('Loading...');
                    },
                    success: function (results) {

                        // $('#comment-' + id).fadeOut(2000).remove();
                        if (results.success) {
                            toastr.info(results.success);
                            location.reload();
                        }
                    },
                    error: function (results) {
                        $.each(results.responseJSON.errors, function (index, val) {
                            toastr.info(val)
                        });
                    },
                })
            }
        })


    </script>
@endpush

