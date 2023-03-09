@extends('admin.index')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{trans("main.Categories")}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{trans("main.Categories")}}</a></li>
                        <li class="breadcrumb-item active">{{trans("main.Categories")}}</li>
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
                            <h3 class="card-title">{{trans("main.Blogs Categories DataTable")}}</h3>
                        </div>
                        <div class="card-header" style="border-bottom: none">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#createCategory">{{trans("main.Add Category")}}</button>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped" style="width: 100%" id="facility_cat">
                                <thead>
                                    <tr>
                                        <th>{{trans("main.id")}}</th>
                                        <th>{{trans("main.Title")}}</th>
                                        <th>{{trans('main.Image')}}</th>
                                        <th>{{trans('main.Info')}}</th>
                                        <th>{{trans('main.Published')}}</th>
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
<div class="modal fade" id="createCategory">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{trans("main.Add Category")}}</h4>
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
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="title" class="col-sm-2 col-form-label">{{trans("main.Title")}}</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="create_title"
                                           placeholder="{{trans('main.Enter Title')}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="create_info" class="col-sm-2 col-form-label">{{trans("main.Info")}}</label>
                                    <div class="col-sm-10">
                                        <textarea rows="4" class="form-control" id="create_info"
                                                  placeholder="{{trans('main.Enter_Info')}}"></textarea>
                                    </div>
                                </div>

{{--
                                <div class="form-group">
                                    <label>{{trans("main.Language")}}</label>
                                    <select class="form-control select2" id="create_language" style="width: 100%;">
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
                                            <input type="checkbox" class="onoffswitch-checkbox" name="published" id="create_published" checked>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-center">
                                    <img class="img-fluid img-thumbnail w-100" id="create_img_view" src="{{asset('images/Image.png')}}" alt="">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="create_imag_url">
                                            <label class="custom-file-label" id="create_img_lable" for="imag_url">{{trans("main.Choose Photo")}}</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button type="button" id="create_remove_img" class="input-group-text btn btn-danger">{{trans("main.Remove")}}</button>
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
                    <button type="button" class="btn btn-primary" id="addCategory">{{trans("main.Save")}}</button>
                </div>
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
            url: "{{ route('adminCategories.index') }}",
                    type: 'GET',
                },
                columns: [
                    {data: "id" },
                    {data: "title"},
                    {
                        data: function (data) {
                            if(data.img_url != null)
                                return '<img class="imgCategory" src=" <?php echo asset('upload/blog_category') ?>/' + data.img_url + '" width="70px" height="70px" />';
                            else
                                return '<img class="imgCategory" src="{{asset("images/Image.png")}}" width="70px" height="70px" />';
                        }
                    }
                    ,
                    {data: "info"},

                    {
                        data: function (data) {
                            console.log(data)
                            if (data.active == 1) {
                                return `
                                <label class="switch">
                                      <input type="checkbox" class="onoffswitch-checkbox" name="published" id="published${data.id}" data-id="${data.id}" checked>
                                      <span class="slider round"></span>
                                </label>
                                `;
                            } else {
                                return `
                                <label class="switch">
                                      <input type="checkbox" class="onoffswitch-checkbox" name="published" id="published${data.id}" data-id="${data.id}">
                                      <span class="slider round"></span>
                                </label>
                                `;
                            }
                        }
                    },
                    {data: "action"}
                ]
            });
            $("body").on("change","#imag_url",function (e){
                $("#img_lable").text($(this).prop('files')[0].name)
                $("#img_view").attr('src',URL.createObjectURL(e.target.files[0]))
            })

            $("body").on("click", "#remove_img", function() {
            axios.post('/admin/deleteCategoryImage',{
                id:id
            })
            .then((res)=>{
                $("#img_view").attr("src", "{{asset('images/Image.png')}}")
                        swal({
                            title: `${res.data.message}`,
                            type: "success",
                            confirmButtonColor: '#09305f',
                            confirmButtonText: 'OK',
                        });
                        $("#img_lable").text("Choose file")
                        $("#imag_url").val("")
                        table.ajax.reload();
            })
            .catch((error)=>console.log('error'))

        });
            $("body").on("change", "#create_imag_url", function (e){
    $("#create_img_lable").text($(this).prop('files')[0].name)
            $("#create_img_view").attr('src', URL.createObjectURL(e.target.files[0]))
    })
            $("body").on("click", "#create_remove_img", function (){
    $("#create_img_lable").text("Choose file")
            $("#create_imag_url").val("")
            $("#create_img_view").attr("src", "{{asset('images/Image.png')}}")
    })
            $("body").on("click", "#create_published", function (){
    let published = $(this).attr('checked');
    if (typeof published !== typeof undefined && published !== false){
    $(this).val("off")
    } else {
    $(this).val("on")
    }
    })
            $("body").on("click", ".editCategory", function (){
    let title = $(this).data("name");
    let id = $(this).data("id");
    let image = $(this).data("image");
    let info = $(this).data("info");
    let published = $(this).data("published");
    // return ;

    $("#title").val(title)
    $("#info").val(info)
    $("#id").val(id)
            if (published == 0){
    $("#published").removeAttr("checked")
    } else {
    $("#published").attr("checked", "checked")
    }
    $('.select2').trigger('change');
    if(image == '')
    {
        $("#img_view").attr("src", "{{asset('images/Image.png')}}")
            $("#img_lable").text("{{trans('main.Choose Photo')}}")
    }
    else{
        $("#img_view").attr("src", "{{asset('upload/blog_category')}}" + "/" + image)
            $("#img_lable").text(image)

    }
    $("#id").val(id)

    })
            $("body").on("click", "#published", function (){
    // let published = $("#published").data("published");
    var attr = $(this).attr('checked');
    if (typeof attr !== typeof undefined && attr !== false){
    $(this).val("off")
            $("#published").removeAttr("checked")
    } else {
    $(this).val("on")
            $("#published").attr("checked", "checked")
    }
    })
            // =========== Update category ========
            $('body').on('click', '#save_category', function () {
    let category_title = $("#title").val();
    let id = $("#id").val();
    let lang_id = $('#info').val();
    // console.log($('#published').val())
    // return ;
    let formData = new FormData();
    formData.append('title', category_title);
    formData.append('info', lang_id);
    formData.append('id', id);
    formData.append('published', $('#published').val());
    let img_url = $('#imag_url').prop('files')[0];
    if (img_url){

    formData.append('img_url', img_url);
    $.ajax({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
            url: "{{ url('admin/adminCategories/updatee') }}",
            type: "get",
            data: formData,
            contentType : false,
            processData : false,
            statusCode: {
            200: (response) => {
            toastr.success(response.success)
                    $("#editCategory").modal('hide');
            table.ajax.reload();
            },
                    404:(response) => {
            console.log('error', response)
            }
            }
    });
    } else {
    $.ajax({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
            url: "{{ asset('admin/adminCategories/updatee') }}",
            method: "post",
            data: formData,
            contentType : false,
            processData : false,
            statusCode: {
            200: (response) => {
            toastr.success(response.success)
                    $("#editCategory").modal('hide');
            table.ajax.reload();
            },
                    404:(response) => {
            console.log('error', response)
            }
            }
    });
    }
    });
    // =========== Create new category ========
    $("#addCategory").on('click', () => {
    let category_title = $("#create_title").val();
    let info = $('#create_info').val();
    let img_url = $('#create_imag_url').prop('files')[0];
    let formData = new FormData();
    formData.append('img_url', img_url);
    formData.append('title', category_title);
    formData.append('info', info);
    formData.append('published', $('#create_published').val());
    $.ajax({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
            url: "{{ route("adminCategories.store") }}",
            method: "POST",
            // type:"POST",
            {{--"_token": "{{ csrf_token() }}", --}}
    data: formData,
            contentType : false,
            processData : false,
            statusCode: {
            200: (response) => {
            toastr.success(response.success)
                    table.ajax.reload();
            $("#create_img_lable").text("Choose file")
                    $("#create_imag_url").val("")
                    $("#create_img_view").attr("src", "{{asset('images/Image.png')}}")
                    $('#create_title').val('');
                    $('#create_info').val('');
            $(".select2").val("");
            $('.select2').trigger('change');
            // $('#create_published').removeAttr('checked');
            $("#createCategory").modal('hide');
            },
                    404:(response) => {
            if (response.responseJSON.error.title){
            for (const error of response.responseJSON.error.title) {
            toastr.error(error)
            }
            }
            if (response.responseJSON.error.img_url){
            for (const error of response.responseJSON.error.img_url) {
            toastr.error(error)
            }
            }
            }
            }
    });
    })
            // =========== Delete category ========
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
            url: "{{ asset('admin/adminCategories/delete') }}" + '?id=' + id,
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
    // =========== get data of lang ========

            // =========== update blog management published ========
            $('body').on('change', '.onoffswitch-checkbox', function () {
    let blog_management_id = $(this).data('id');
    var attr = $(this).attr('checked');
    if (typeof attr !== typeof undefined && attr !== false){
    $(this).val("off")
    } else {
    $(this).val("on")
    }
    // console.log(blog_management_id,attr)
    // return ;
    $.ajax({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
            url: "{{  url('/admin/adminCategories/update') }}",
            method: "get",
            data: {
            'blog_id':blog_management_id,
                         'ttype':1,

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
