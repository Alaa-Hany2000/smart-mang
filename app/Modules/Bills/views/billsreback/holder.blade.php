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

                                    <form action="{{route('adminBills.store')}}" id="addUserForm" class="form-horizontal" role="form" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-10">


                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">{{trans("main.Select Customer")}}</label>
                                                    <div class="col-sm-10">
                                                        <select name="customer_id" id="customer_id"  class="form-control">
                                                            <option value="" selected="selected" disabled="disabled">{{trans("main.Select Customer")}}</option>
                                                            @if(count($customers)>0)
                                                                @foreach($customers as $customer)
                                                                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <table class="table table-sm-12">
                                                        <thead>
                                                        <tr>

                                                            <th >{{trans('main.Product')}}</th>
                                                            <th >{{trans('main.AVAmount')}}</th>
                                                            <th>{{trans('main.Price')}}</th>
                                                            <th>{{trans('main.amount')}}</th>
                                                            <th>{{trans("main.Total")}}</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="mytable">
                                                       
                                                          
                                                              <tr>
                                                                <td >
                                                                     <select  id="country-dd"   class="form-control col-sm-12 select " name="productid[]">
                                                              <option value="" selected="selected" disabled>{{trans('main.Product')}}</option>

                                                                @foreach($products as $product)
                                                                    <option   value="{{$product->id}}"> 
                                                                            {{$product->title}}
                                                                      </option>
                                                                @endforeach
                                                      
                                                      
                                                          </select>   
                                                               </td>
                                                               <td > <input style="max-width:70px;" type="number" readonly name="allow" id="allow"></td>
                                                                 <td > <input type="number" name="prices[]" id="priceone" ></td>
                                                                   <td><input type="range"style="max-width: 135px;"  name="amount" value="1"  min="1" step="1" id="rangeone"><input type="number" disabled style="max-width: 87px;" id="rr" class="border border-dark "/>
</td>
                                                                     <td><input style="max-width:87px;" type="number" readonly name="total[]" id="amountone"></td>
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

<script 
>
    

  $(document).ready(() => {

     $('.addprice').on('click', function() {
            $('#mytable').append('<tr>' +
                '<td class="col-xs-3"><input type="text" name="distance_pricingar[]" class="description"></td>' +
                  '<td class="col-xs-3"><input type="text" name="rr[]" class="description"></td>' +
                '<td class="col-xs-3"><input type="text" name="distance_pricingen[]" class="description"></td>' +
                '<td class="col-xs-3"><input type="number" name="distance_pricing[]" class="description"></td>' +



                '<td class="col-xs-3">' +
                '<button class="btn">' +
                '<i class="fa fa-trash-o"></i>' +
                'حذف' +
                '</button>' +
                '</td>' +
                '</tr>');
        });
        });
</script>
    <script>
          $(document).ready(function(e) {
            $('form input').keydown(function (e) {
if (e.keyCode == 13) {
    e.preventDefault();
    return false;
}
});

            $("#toggle").click(function(){
                $("#target").toggle( 'slow', function(e){
                    stop();
                }); 
                });
            });
        $(document).ready(function () {
//change selectboxes to selectize mode to be searchable
            $("select").select2();
  
});
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
          $("#rangeone").attr('max', response.total);
           $("#rangeone").attr('title', response.total);
          
  
           $("#priceone").val(response.max_price);
            $( '#rangeone').on('change', function (e) {
    var m=response.max_price*$(this).val();
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

            $('#addUserForm').on('submit',function(){
                return;
            })
            $('#addUserForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    password: {
                        required: true,
                        minlength: 5

                    },
                    confirm: {
                        required: true,
                        minlength: 5,
                        equalTo: "#password"
                    },
                    roleID:{
                        required:true
                    }
                },
                messages: {
                    name: {
                        required: '{{trans("main.Please enter a user name")}}',
                    },
                    email: {
                        required: '{{trans("main.Please enter a user email")}}',
                    },
                    password: {
                        required:'{{trans("main.Please enter a password")}}' ,
                    },
                    confirm:{
                        required: '{{trans("main.Please confirm password" )}}'
                    },
                    roleID:{
                        required: '{{trans('main.Please Choose Role To User')}}'
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

        })
        setTimeout(function() {
            $('#errorMessage').fadeOut(100);
        }, 4000);
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
