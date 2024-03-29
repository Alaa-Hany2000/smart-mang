@extends('admin.index')

@section('content')
<div class="content-wrapper">

    {{---------- Create Form ----------}}
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">{{trans('main.Product')}}</h3>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">{{trans('main.Create Product')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link previewEvent" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">{{trans('main.Preview')}}</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="custom-content-below-tabContent">
                                <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                                    <!-- form start -->
                                    <div class="row">
                                    @if ($errors->any())
                                    <div class="alert alert-danger" style="margin-top: 10px;" id="errorMessage">
                                        <ul style="list-style: none;">
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    <form role="form" class="form-horizontal col-md-12" id="eventForm" action="{{route('adminProducts.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body col-md-12">
                                           <!--  <div class="form-group row">
                                                <label for="total" class="col-sm-2 col-form-label">{{trans("main.Total")}}</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="total" id="total"  value="{{old('total')}}" class="form-control" placeholder="{{trans('main.Enter Total')}}"  />
                                                </div>
                                            </div> -->

                                            <div class="form-group row">
                                                <label for="title" class="col-sm-2 col-form-label">كود</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="slug" id="code"  value="{{old('slug')}}" class="form-control" placeholder="ادخل كود غير مكرر"  />
                                                </div>
                                            </div> <div class="form-group row">
                                                <label for="title" class="col-sm-2 col-form-label">{{trans("main.Title")}}</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="title" id="title"  value="{{old('title')}}" class="form-control" placeholder="{{trans('main.Enter Title')}}"  />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="category_id" class="col-sm-2 col-form-label">{{trans("main.Category")}}</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control col-sm-12" name="category_id" id="category_id"
                                                    >
                                                        @foreach($categories as $category)
                                                            <option  value="{{$category->id}}">{{$category->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                           <!--  <div class="form-group row">
                                                <label for="supplier_id" class="col-sm-2 col-form-label">{{trans("main.Supplier")}}</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control col-sm-12" name="supplier_id" id="supplier_id"
                                                    >
                                                        @foreach($suppliers as $s)
                                                            <option  value="{{$s->id}}">{{$s->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div> -->
                                            <div class="form-group row">
                                                <label for="unit_id" class="col-sm-2 col-form-label">{{trans("main.Unit")}}</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="unit_id" id="unit_id"
                                                    >
                                                        @foreach($units as $unit)
                                                            <option  value="{{$unit->id}}">{{$unit->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-2">
                                                </div>
                                                <div class="col-sm-10">
                                                    <button id="toggle" class="btn btn-success btn-block">{{trans('main.Has_Expired_at')}}</button>
                                                </div>
                                            </div>
                                            <div id="target">
                                            <div class="form-group row">
                                                <label for="from_date" class="col-sm-2 col-form-label">{{trans("main.Produce_at")}}</label>
                                                <div class="col-sm-10">
                                                    <input type="datetime-local" name="produce_at"  value="{{old('produce_at')}}" id="produce_at" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="to_date" class="col-sm-2 col-form-label">{{trans("main.Expired_at")}}</label>
                                                <div class="col-sm-10">
                                                    <input type="datetime-local" name="expired_at"  value="{{old('expired_at')}}" id="expired_at" class="form-control" />
                                                </div>
                                            </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="buy_price" class="col-sm-2 col-form-label">{{trans("main.Buy_price")}}</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="buy_price" id="buy_price"  value="{{old('buy_price')}}" class="form-control" placeholder="{{trans('main.Enter Price')}}" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="buy_price" class="col-sm-2 col-form-label"> نسبه الخصم</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="rival" id="rival"  value="{{old('rival')}}" class="form-control" placeholder="%ادخل نسبه الخصم" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="buy_price" class="col-sm-2 col-form-label"> نسبه الخصم الاضافي</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="addRival" id="addRival"  value="{{old('addRival')}}" class="form-control" placeholder="%ادخل نسبه الخصم الاضافي" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="max_price" class="col-sm-2 col-form-label">{{trans("main.Max_price")}}</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="max_price" id="max_price"  value="{{old('max_price')}}" class="form-control" placeholder="{{trans('main.Enter Price')}}" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="min_price" class="col-sm-2 col-form-label">{{trans("main.Min_price")}}</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="min_price" id="min_price"  value="{{old('min_price')}}" class="form-control" placeholder="{{trans('main.Enter Price')}}" />
                                                </div>
                                            </div>
{{--
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-2 col-form-label">{{trans("main.Image")}}</label>
                                                <div class="col-sm-10">https://www.facebook.com/Cinema.Fox.10/videos/3668055483239927
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="img_url" id="img_url" class="form-control" />
                                                            <label class="custom-file-label" id="img_lable" for="img_url"> {{trans("main.Choose file")}}</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <button type="button" id="removeImage" class="btn btn-danger upload-image">{{trans("main.Remove")}}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
--}}
                                            <div class="form-group row">
                                                <label for="description" class="col-sm-2 col-form-label">{{trans("main.Info")}}</label>
                                                <div class="col-sm-10">
                                                    <textarea id="editor1" class="textarea form-control" name="info" data-parsley-minlength="10" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" placeholder="{{trans('main.Place write content here...')}}"></textarea>
                                                    <button type="submit" class="btn btn-info btn-block" style="margin-top: 10px;">{{trans('main.Save')}}</button>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- /.card-body -->


                                       {{-- <div class="col-md-6 ">
                                            <div class="card card-primary">
                                                <img class="img-fluid img-thumbnail w-100" style="margin:auto;height:570px" id="show-image" src="{{ asset('admin/img/not_found.jpg')}}" alt="eventImage">
                                            </div>
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-2 col-form-label">{{trans("main.Image")}}</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="img_url" id="img_url" class="form-control" />
                                                            <label class="custom-file-label" id="img_lable" for="img_url"> {{trans("main.Choose file")}}</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <button type="button" id="removeImage" class="btn btn-danger upload-image">{{trans("main.Remove")}}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>--}}

                                        </div>
                                    </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
                                <main id="main">
                                    <!-- ======= Services Section ======= -->


                                    </main><!-- End #main -->
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('js')
<script>
    $(document).ready(() => {
            $('#eventForm').on('submit',function(){
                return;
            })
           $('#eventForm').validate({
                rules: {
                    title: {
                        required: true,
                    },
                   /* total: {
                        required: true,
                    },*/
                    min_price: {
                        required: true,

                    },
                    max_price: {
                        required: true,

                    },
                    buy_price: {
                        required: true
                    }
                },
                messages: {
                    title: {
                        required: '{{trans("main.Please enter a title")}}',
                    },
                   /* total: {
                        required: '{{trans("main.Please enter a valid amount")}}',
                    },*/
                    min_price: {
                        required:'{{trans( "main.Please enter a min_price")}}',
                    },
                    max_price:{
                        required:  "{{trans('main.Please enter a max_price')}}",
                    },
                    buy_price:{
                        required:  "{{trans('main.Please enter a buy_price')}}",

                    }
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
                }
            });
        $("#img_url").on('change', function(e) {
            $('#img_lable').text($(this).prop('files')[0].name)
            $("#show-image").attr('src', URL.createObjectURL(e.target.files[0]))

        })
        $("#removeImage").on('click', function() {
            $('#img_lable').text('Choose file')
            $("#show-image").attr('src', '{{ asset("admin/img/not_found.jpg")}}');
            $("#img_url").val('');
        })
        $("#max_price").change(function(){
            $("#min_price").val($('#max_price').val());
        })
        setTimeout(function () {
            $('#errorMessage').fadeOut(100);
        }, 4000);
        $('.previewEvent').on('click', function() {
            let title = $('#title').val();
            let max_price = $('#max_price').val();
            let min_price = $('#min_price').val();
            var editorText = CKEDITOR.instances.editor1.getData();
            let img = '{{ asset("admin/img/not_found.jpg")}}';
            if ($('#img_url').prop('files')[0] != undefined) {
                 img = URL.createObjectURL($('#img_url').prop('files')[0]);
            }
            $('#ProductPreview').children().remove();
                let div = $(`<div class="col-lg-8 col-md-6 " data-aos="fade-up">
                            <div class="card events " style="width: 100%;">
                                <img src="${img}" style="height: 200px;" class="card-img-top" alt="...">
                                <div class="card-body ">
                                    <h4 class="title"><a href="">${title}</a></h4>
                                    <h5 class=" ">من: ${max_price} </br> إلي:${min_price}</h5>
                                    <div class="entry-content">
                                        ${editorText}
                                    </div>
                                </div>
                            </div>
                        </div>`).appendTo($('#ProductPreview'));


        })

    })
    $(function() {
        CKEDITOR.replace('editor1', {
            height: 250,
            extraPlugins: 'colorbutton,colordialog',
            filebrowserUploadUrl: "{{asset('cp/plugins/ckeditor/ck_upload.php')}}",
            filebrowserUploadMethod: 'form',
            // height: 250,
            // extraPlugins: 'colorbutton'
        });
        CKEDITOR.colorButton_colors = '00923E,F8C100,28166F';
        var editor = CKEDITOR.instances['editor1']
        editor.setData("{!!html_entity_decode(old('description'))!!}");
    });
</script>
<script>
    $(document).ready(function () {
//change selectboxes to selectize mode to be searchable
        $("select").select2();
    });

    $(document).ready(function() {

        $("#toggle").click(function(){
            $("#target").toggle( 'slow', function(e){
                stop();
            });
        });
        function add(){
            var new_chq_no = parseInt($('#total_chq').val())+1;
            var new_input="<input type='text' id='new_"+new_chq_no+"'>";
            $('#new_chq').append(new_input);
            $('#total_chq').val(new_chq_no)
        }
        function remove(){
            var last_chq_no = $('#total_chq').val();
            if(last_chq_no>1){
                $('#new_'+last_chq_no).remove();
                $('#total_chq').val(last_chq_no-1);
            }
        }
    });

</script>

@endpush
@push('css')
<link href="{{ asset('front/css/style.css')}}" rel="stylesheet">

<style>
    /* The switch - the box around the slider */
    #target{
        display: none;
    }
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

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
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
