<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>{{ $settings->ar_title }}</title>

	<!-- Bootstrap cdn 3.3.7 -->
	   <!-- <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css')}}"> -->

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap-rtl.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/css/adminlte-rtl.css')}}">
    <!--<link rel="stylesheet" href="{{ asset('admin/css/admin.min-rtl.css')}}">-->

    <!-- Google Font: Cairo -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->
  <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{asset('admin/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{asset('admin/plugins/icheck-bootstrap/icheck-bootstrap-rtl.min.css')}}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{asset('admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{asset('admin/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset('admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('admin/plugins/toastr/toastr.min.css')}}">

    <!-- <link rel="stylesheet" href="{{asset('admin/bower_components/font-awesome/css/font-awesome.min.css')}}"> -->




      <!-- DataTables -->

    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">


    <link rel="stylesheet" href="{{ asset('admin/css/rtl.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />



	<!-- Custom style invoice1.css -->
	<link rel="stylesheet" type="text/css" href="{{asset('/admin/invoice1.css')}}">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    
    <![endif]-->
</head>
<body>
<?php 
$balance=App\Modules\Balances\Models\Balance::where('customer_id',$customer->id)->first();
?>

	<section class="back">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="">
						<div class="flax" style="max-hight:120px;">
							<div class="row" >
							
							
						
									<div class="  col-sm-4 text-right" >
									
									<div class="logo-wrapper">
										<img src="{{asset('upload').'/'.$settings['logo']}}" width="30" hight="30" alt="AdminLTE Logo" class=" logo pull-right brand-image img-circle elevation-3" style="opacity: .8">
										</div>
										<h2 style=" display: inline; "  class="our-company-name">مؤسسة:{{ $settings->ar_title }}</h2>
									
																				<h6 >بتاريخ {{ date('d/m/Y', strtotime($bill->created_at)) }}</h5>
										
										<h6  style=" display: inline; >{{ $settings->phone1 }} ,{{ $settings->phone2 }}</h6>
										<div  style=" display: inline; " >
								
											<h6 style=" display: inline; "  >المحرر {{$user->name}}</h6>
											</div>

								</div>
						</div>
					
								<h4 class="text-center">فاتورة توريد </h4>
								<div class="row">
									<table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th class="text-right" scope="col">رقم الفاتورة</th>
     
      <th class="text-right" colspan="3">{{$bill->id }}222</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th class="text-right" scope="row">الاسم</th>
     
     
      <td  class="text-right" colspan="3">{{$customer->name}}</td>
    </tr>
    <tr>
      <th scope="row" class="text-right">العنوان</th>
     
      <td  class="text-right" colspan="3">{{$customer->address}}</td>
    </tr>
    <tr>
      <th scope="row" class="text-right">التلفون</th>
      <td  class="text-right" colspan="3">{{$customer->phone}}</td>
    </tr>
	  <tr>
      <th scope="row" class="text-right">الرصيد السابق</th>
      <td  class="text-right" colspan="3">@if($balance){{$balance->total}}@else 00 @endif</td>
    </tr>
  </tbody>
</table>




									
								</div>
									<div class="row">
								<div class="col-md-12 col-sm-12">
								
										    <table class="table table-bordered">
										
											 <thead class="thead-dark">
    <tr  class="table-dark" style="background-color: #45aa67;">
	                                                <th class="text-right" >م</th>

                                                <th class="text-right" >{{ trans('main.Product') }}</th>
                       <th class="text-right" >{{ trans('main.Unit') }}</th>

                                                <th class="text-right" >{{ trans('main.Amount') }}</th>
												      <th class="text-right" >{{ trans('main.Price') }}</th>
													        <th class="text-right" >الخصم</th>
                                                <th class="text-right" >القيمة</th>
								   <th class="text-right" >{{ trans('main.Total') }}</th>



  </tr>
  </thead>
                                            <tbody>
                                                @if($sales->count()>0)
                                                @foreach ($sales as $sale)
                                                <?php
                                                $product= App\Modules\Product\models\Product::where('id',$sale->product_id)->first();
												$amount=$sales->sum('amount');
														$coum=0;
                                                ?>
                                                @if($product)
												<?php
												$unit=App\Modules\Units\models\Unit::where('id',$product->unit_id)->first();
												?>
                                                <tr >
												   <td  class="text-right">{{++$coum}}</td>
                                                    <td  class="text-right">{{$product->title}}</td>
								 <td  class="text-right">@if($unit){{$unit->title}}@endif</td>

                                                    <td class="text-right">{{$sale->amount}}</td>
										          <td class="text-right">{{$sale->price}}</td>
								                 <td class="text-right">0.00</td>


                                                    <td class="text-right">{{$sale->total}}</td>
   <td class="text-right">{{$sale->total}}</td>
                                                </tr>
                                                   @endif
                                                @endforeach
												<tr>
												<td scope="col" class="text-right" colspan="3">الاجمالي</td>
		
																		<td scope="col" class="text-right" colspan="4">{{$amount}}</td>
	
																					<td scope="col" class="text-right">{{$bill->total}}</td>


												</tr>
                                                @endif

                                            </tbody>
                                        </table>
											<div class="col-sm-3 col-md-3" dir="ltr">
								
									
										<h5 style=" display: inline; " > المدفوع</h5>
										<h4 style=" display: inline; " > {{$bill->paid}}</h4>
											<h5 style=" display: inline; " > الباقي</h5>
										<h4 style=" display: inline; " > {{$bill->unpaid}}</h4>
									
								</div>
								</div>
									
										<ul>
											<li>{{ $settings->term }}</li>
										
										</ul>
								
								</div>
								<div class="clearfix"></div>
								<div class="col-xs-12">
									<hr class="divider">
								</div>
								<div class="col-sm-4" style=" display: inline; " >
									<h6 class="text-left" style=" display: inline; " >01013924210</h6>
								</div>
								<div class="col-sm-4" style=" display: inline; " >
									<h6 class="text-center" style=" display: inline; " >muhammadabdelsalam7@gmail.com</h6>
								</div>
								<div class="col-sm-4" style=" display: inline; " >
									<h6 class="text-right" style=" display: inline; " >برمجة م / محمد الشخص</h6>
								</div>
							</div>
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- jquery slim version 3.2.1 minified -->
	   <script src="{{ asset('admin/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- DataTables -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>

    <script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <!-- CK Editor -->
    <script src="{{asset('admin/plugins/ckeditor/ckeditor.js')}}"></script>
    <!---- added text color & background  and browse image --->

    <!-- Select2 -->
    <script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{asset('admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
    <!-- InputMask -->
    <script src="{{asset('admin/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('admin/plugins/inputmask/jquery.inputmask.js')}}"></script>
    <!-- date-range-picker -->
    <script src="{{asset('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- bootstrap color picker -->
    <script src="{{asset('admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Bootstrap Switch -->
    <script src="{{asset('admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
    <!-- AdminLTE App -->
    <!-- SweetAlert2 -->
    <script src="{{asset('admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <!-- Toastr -->
    <script src="{{asset('admin/plugins/toastr/toastr.min.js')}}"></script>

    <!-- jquery-validation -->
    <script src="{{ asset('admin/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('admin/plugins/jquery-validation/additional-methods.min.js')}}"></script>
    <script src="vendor/jquery/dist/jquery.min.js"></script>

    <script src="{{ asset('admin/js/adminlte.min.js')}}"></script>
   
<script type="text/javascript">
window.print();
    </script>
</body>
</html>
