@extends('admin.index')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{trans("main.Add Bill")}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">{{trans("main.Add Bill")}}</a></li>
                            <li class="breadcrumb-item active">{{trans("main.Add Bill")}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">

                                <div class="col-lg-8">

                                <h3 class="card-title">{{trans("main.Add Bill")}}</h3>
                            </div>   <div class="col-lg-4">

                            </div>
                            </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul style="list-style: none;">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <!-- /.content-header -->

                                    <form action="{{route('spluersBill.store')}}" id="addUserForm" class="form-horizontal" role="form" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-10">


                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">اختر المورد</label>
                                                    <div class="col-sm-10">
                                                        <select required name="customer_id" id="customer_id"  class="form-control">
                                                            <option value="" selected="selected" disabled="disabled">اختر المورد</option>
                                                            @if(count($customers)>0)
                                                                @foreach($customers as $customer)
                                                                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <table  class="table ">
                                                        <thead>
                                                        <tr>

                                                            <th  class="col-sm-3">{{trans('main.Product')}}</th>
                                                            <th  class="col-sm-2">{{trans('main.AVAmount')}}</th>
                                                            <th  class="col-sm-2">{{trans('main.Price')}}</th>
                                                            <th  class="col-sm-2">{{trans('main.amount')}}</th>
                                                            <th  class="col-sm-2">{{trans("main.Total")}}</th>
                                                                                                                        <th  class="col-sm-1">حذف</th>

                                                        </tr>
                                                        </thead>
                                                        <tbody id="mytable">


                                                              <tr>
                                                                <td  class="col-sm-3" >
                                                                     <select  required id="country-dd"   class="form-control col-sm-12 select " name="productid[]">
                                                              <option value="" selected="selected" disabled>{{trans('main.Product')}}</option>

                                                                @foreach($products as $product)
                                                                    <option   value="{{$product->id}}">
                                                                            {{$product->title}}
                                                                      </option>
                                                                @endforeach


                                                          </select>
                                                               </td >
                                                               <td  class="col-sm-2"> <input style="max-width:70px;" type="number" readonly name="allow" id="allow"></td>
                                                                 <td  class="col-sm-2"> <input type="number" name="prices[]" id="priceone"style="max-width: 86px;" ></td>
                                                                   <td class="col-sm-2"><input type="number" style="max-width: 85px;"  name="amounts[]" value="1"  step="1" id="rangeone"></td>

                                                                   <td class="col-sm-2"><input style="max-width:87px;" type="number" class readonly name="totals[]" id="amountone"></td>
                                                               </tr>

                                                        </tbody>
                                                    </table>
 <d class="btn addprice">
                                                                                        <i class="fa fa-plus"></i> {{trans('main.Add')}}
                                                                                    </d>
                                                </div>

                                                <button type="submit" class="btn btn-info col-lg-12 ">{{trans('main.Save')}}</button>
                                            </div>
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



    <!-- /.login-box -->
@endsection
@push('js')
    <script src="{{asset('admin/plugins/dropify/dist/js/dropify.min.js')}}"></script>

    <script>
        $(document).ready(() => {
          $('#billToal').val(0);
            var t=0;
             $( '#country-dd').on('change', function (e) {
                   $("#allow").val(0);
                    $("#rangeone").val(0);
                     $("#priceone").val(0);
                      $("#amount").val(0);
                       $('#amountone').val(0);
                                              $('#amountone').val(0);


                    var product_id = this.value;
                  $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{  route('adminBill.sales') }}",
                    method: "post",
                    data: {
                        'product_id':product_id,

                    },
                    statusCode: {
                        200: (response) => {

        $("#allow").val(response.total);
          $("#rangeone").val(1);
          $("#rangeone").attr('max',10000);
           $("#rangeone").attr('title', response.total);


           $("#priceone").val(response.buy_price);
            $( '#rangeone').on('change', function (e) {
    var m=response.buy_price*$(this).val();
    $('#rr').val(($(this).val()));
    $('#amountone').val(m);

});
            console.log(response);
                        },
                        404:(response) => {
                            console.log('error', response)
                        }
                    }
                });

             })
            $( '.ragee').on('change', function (e) {

                let product_id = $(this).attr('product');
                let price = $('#'+product_id+'price').val();
                let amount = $('#'+product_id+'amount').val();
                var total=price*amount;

$('#'+product_id+'billToal').val(total);

$('#'+product_id+'billrange').val(amount);


                // console.log(blog_management_id,attr)
                // return ;


            })
            })


    </script>
    <script type="text/javascript">
      $(document).ready(() => {
         $('.addprice').on('click', function() {
            $('#mytable').append('<tr class="col-lg-12">' +
                '<td  class="fristtd col-sm-3" ></td>' +
                  '<td  class=" col-sm-2"  ><input  style="max-width:70px;" type="text" name="allows[]" readonly class="allows"></td>' +
                '<td   class=" col-sm-2" ><input style="max-width:70px;" type="text" name="prices[]" class="prices"></td>' +
                '<td  class=" col-sm-2" ><input type="number" style="max-width: 85px;"  name="amounts[]" value="1"  min="1" step="1" class="amounts ranges"></td>' +
                '<td  class=" col-sm-2" ><input style="max-width:70px;" type="number" readonly  name="totals[]" class="totals"></td>' +




                '<td  class=" col-sm-1" >' +
                '<button class="btn btn-sm btn-danger">' +
                '<i class="fa fa-trash-o"></i>' +
                '<i class="  fa fa-trash" aria-hidden="true"></i>' +
                '</button>' +
                '</td>' +
                '</tr>');
        });
        $(document).on('click', '.btn', function() {
            $(this).parent().parent('tr').remove();
        });

            $(document).on('click', '.addprice', function() {
                   var sum = 0;
$('input[name="totals[]"]').each(function(){
    sum = parseFloat(sum) + parseFloat(this.value);
  console.log(sum);
});

              var m = $('.fristtd:last');
            $(m).html(




                              '<select     class="form-control col-sm-12 select  selectadd" name="productid[]">' +
                                                              '<option value="" selected="selected" disabled>'+'{{trans("main.Product")}}'+'</option>'

                                                                @foreach($products as $product)
                                                                    +'<option   value="{{$product->id}}">'
                                                                          + '{{$product->title}}' +
                                                                      '</option>'
                                                                @endforeach


                                                         +'</select>' );


           });
        

              });
    </script>
<script type="text/javascript">
    $(document).on("change",".selectadd",function() {
        var product_id = this.value;
       var parenti = $(this).closest('tr');
       var price = $(parenti).find('.prices');
       var allow = $(parenti).find('.allows');
       var amount = $(parenti).find('.amounts');
       var total = $(parenti).find('.totals');
       var rrr = $(parenti).find('.ranges');

         $(price).val(0);
         $(allow).val(0);
         $(amount).val(1);
         $(total).val(0);
         $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{  route('adminBill.sales') }}",
            method: "post",
            data: {
                'product_id':product_id,

            },
            statusCode: {
                200: (response) => {

$(allow).val(response.total);
  $(amount).val(1);
  $(amount).attr('max', 10000);
   $(amount).attr('title', response.total);


   $(price).val(response.buy_price);
    $( amount).on('change', function (e) {
var m=response.buy_price*$(this).val();
$(total).val(m);
$(rrr).val(($(this).val()));


});
    console.log(response);
                },
                404:(response) => {
                    console.log('error', response)
                }
            }
        });

     })
  

   
</script>
    <script type="text/javascript">
        $("#addNewTeam").click(function(){
            var elem = $("<input/>",{
                type: "text",
                name: "rePhones[]"
            });

            var removeLink = $("<span/>").html("X").click(function(){
                $(elem).remove();
                $(this).remove();
            });

            $("#teamArea").append(elem).append(removeLink);
        });
        /* $("#addNewTeam2").click(function(){
             var elem = $("<input/>",{
                 type: "text",
                 name: "phone_intreals[]"
             });

             var removeLink = $("<span/>").html("X").click(function(){
                 $(elem).remove();
                 $(this).remove();
             });

             $("#teamArea2").append(elem).append(removeLink);
         });
         $("#addNewTeam3").click(function(){
             var elem = $("<input/>",{
                 type: "text",
                 name: "emails[]"
             });

             var removeLink = $("<span/>").html("X").click(function(){
                 $(elem).remove();
                 $(this).remove();
             });

             $("#teamArea3").append(elem).append(removeLink);
         });
         $("#addNewTeamsa").click(function(){
             var elem = $("<input/>",{
                 type: "time",
                 name: "Saturdayfrom[]"
             }); var elem1 = $("<input/>",{
                 type: "time",
                 name: "SaturdayTo[]"
             });

             var removeLink = $("<span/>").html("X").click(function(){
                 $(elem).remove();
                 $(elem1).remove();
                 $(this).remove();
             });

             $("#teamAreasa").append(elem).append(removeLink);
             $("#teamAreasa").append(elem1).append(removeLink);
         });
         $("#addNewTeamsu").click(function(){
             var elem = $("<input/>",{
                 type: "time",
                 name: "Sunfrom[]"
             }); var elem1 = $("<input/>",{
                 type: "time",
                 name: "SunTo[]"
             });

             var removeLink = $("<span/>").html("X").click(function(){
                 $(elem).remove();
                 $(elem1).remove();
                 $(this).remove();
             });

             $("#teamAreasu").append(elem).append(removeLink);
             $("#teamAreasu").append(elem1).append(removeLink);
         });
         $("#addNewTeammo").click(function(){
             var elem = $("<input/>",{
                 type: "time",
                 name: "Mofrom[]"
             }); var elem1 = $("<input/>",{
                 type: "time",
                 name: "MoTo[]"
             });

             var removeLink = $("<span/>").html("X").click(function(){
                 $(elem).remove();
                 $(elem1).remove();
                 $(this).remove();
             });

             $("#teamAreamo").append(elem).append(removeLink);
             $("#teamAreamo").append(elem1).append(removeLink);
         });
         $("#addNewTeamTu").click(function(){
             var elem = $("<input/>",{
                 type: "time",
                 name: "Tufrom[]"
             }); var elem1 = $("<input/>",{
                 type: "time",
                 name: "TuTo[]"
             });

             var removeLink = $("<span/>").html("X").click(function(){
                 $(elem).remove();
                 $(elem1).remove();
                 $(this).remove();
             });

             $("#teamAreaTu").append(elem).append(removeLink);
             $("#teamAreaTu").append(elem1).append(removeLink);
         });
         $("#addNewTeamWe").click(function(){
             var elem = $("<input/>",{
                 type: "time",
                 name: "Wefrom[]"
             }); var elem1 = $("<input/>",{
                 type: "time",
                 name: "WeTo[]"
             });

             var removeLink = $("<span/>").html("X").click(function(){
                 $(elem).remove();
                 $(elem1).remove();
                 $(this).remove();
             });

             $("#teamAreaWe").append(elem).append(removeLink);
             $("#teamAreaWe").append(elem1).append(removeLink);
         });
         $("#addNewTeamTh").click(function(){
             var elem = $("<input/>",{
                 type: "time",
                 name: "Thfrom[]"
             }); var elem1 = $("<input/>",{
                 type: "time",
                 name: "TThTo[]"
             });

             var removeLink = $("<span/>").html("X").click(function(){
                 $(elem).remove();
                 $(elem1).remove();
                 $(this).remove();
             });

             $("#teamAreaTh").append(elem).append(removeLink);
             $("#teamAreaTh").append(elem1).append(removeLink);
         });
         $("#addNewTeamfr").click(function(){
             var elem = $("<input/>",{
                 type: "time",
                 name: "frfrom[]"
             }); var elem1 = $("<input/>",{
                 type: "time",
                 name: "frTo[]"
             });

             var removeLink = $("<span/>").html("X").click(function(){
                 $(elem).remove();
                 $(elem1).remove();
                 $(this).remove();
             });

             $("#teamAreafr").append(elem).append(removeLink);
             $("#teamAreafr").append(elem1).append(removeLink);
         });*/

    </script>
    <script>
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

        $(document).ready(function () {
            $('.dropify').dropify();

        });
    </script>
    <script type="text/javascript">
        $('#country_id').on('change', function () {
            $("#subcategoryList").attr('disabled', false); //enable subcategory select
            $("#subcategoryList").val("");
            $(".subcategory").attr('disabled', true); //disable all category option
            $(".subcategory").hide(); //hide all subcategory option
            $(".parent-" + $(this).val()).attr('disabled', false); //enable subcategory of selected category/parent
            $(".parent-" + $(this).val()).show();
        });
    </script>
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
                    total: {
                        required: true,
                    },
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
                    total: {
                        required: '{{trans("main.Please enter a valid amount")}}',
                    },
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

    </script>

    {{--  <script>
          $(document).ready(() => {
              $('#eventForm').on('submit',function(){
                  return;
              })
              $('#eventForm').validate({
                  rules: {
                      title: {
                          required: true,
                      },
                      total: {
                          required: true,
                      },
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
                      total: {
                          required: '{{trans("main.Please enter a valid amount")}}',
                      },
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
      </script>--}}
    <script>

        $(document).ready(function () {
//change selectboxes to selectize mode to be searchable
            $("select").select2();
            $('.dropify').dropify();

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
    <script type="text/javascript">
        var showPass = 0;
        $('.btn-show-pass').on('click', function(){
            if(showPass == 0) {
                $(this).next('input').attr('type','text');
                $(this).find('i').removeClass('zmdi-eye');
                $(this).find('i').addClass('zmdi-eye-off');
                showPass = 1;
            }
            else {
                $(this).next('input').attr('type','password');
                $(this).find('i').addClass('zmdi-eye');
                $(this).find('i').removeClass('zmdi-eye-off');
                showPass = 0;
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
