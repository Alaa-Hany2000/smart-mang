<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>{{ $settings->ar_title }}</title>

	<!-- Bootstrap cdn 3.3.7 -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Custom font montseraat -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700" rel="stylesheet">

	<!-- Custom style invoice1.css -->
	<link rel="stylesheet" type="text/css" href="{{asset('/admin/invoice1.css')}}">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

	<section class="back">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="">
						<div class="flax" style="max-hight:120px;">
							<div class="row" >



									<div class="  col-sm-4">

									<div class="logo-wrapper">
										<img src="{{asset('upload').'/'.$settings['logo']}}" width="30" hight="30" alt="AdminLTE Logo" class=" logo pull-right brand-image img-circle elevation-3" style="opacity: .8">
										</div>
										<h2 style=" display: inline; "  class="our-company-name">مؤسسة:{{ $settings->ar_title }}</h2>
										<h6 style=" "  class="our-address">العنوان:{{ $settings->address1 }}</h6>
																				<h6 >بتاريخ {{ date('d/m/Y', strtotime($bill->created_at)) }}</h5>

										<h6>{{ $settings->phone1 }} ,{{ $settings->phone2 }}</h6>
										<div  style=" display: inline; " >

											<h6 style=" display: inline; "  >القائم بالحصر  {{$user->name}}</h6>
											</div>

								</div>
						</div>
						<div class="">
							<div class="row">
								<div class="col-xs-12">
									<h3 class="text-center" >بيان الحصر</h3>
								</div>


								<div class="col-sm-3 col-md-3" dir="ltr">

										<h5  style=" display: inline; " > رقم</h5>
										<h4 style=" display: inline; " > {{$bill->id }}222</h4>


								</div>
								<div class="col-md-offset-1 col-md-8 col-sm-9">

										    <table class="table">
                                                <th class="text-right" >{{ trans('main.Product') }}</th>
                                                <th class="text-right" >{{ trans('main.Price') }}</th>
                                                <th class="text-right" >{{ trans('main.Amount') }}</th>
                                                <th class="text-right" >{{ trans('main.Total') }}</th>



                                            <tbody>
                                                <?php
                                                $coum=1;
                                                ?>
                                                @if($sales->count()>0)
                                                @foreach ($sales as $sale)
                                                <?php
                                                $product= App\Modules\Product\models\Product::where('id',$sale->product_id)->first();
												$amount=$sales->sum('amount');

                                                ?>
                                                @if($product)
                                                <tr >
                                                    <td>{{$product->title}}</td>
                                                    <td>{{$sale->price}}</td>
                                                    <td>{{$sale->amount}}</td>
                                                    <td>{{$sale->total}}</td>

                                                </tr>
                                                   @endif
                                                @endforeach
												<tr>
												<td>الاجمالي</td>
									<td></td>
																		<td>{{$amount}}</td>

																					<td>{{$bill->total}}</td>


												</tr>
                                                @endif

                                            </tbody>
                                        </table>
											<div class="col-sm-3 col-md-3" dir="ltr">




								</div>


								</div>
								<div class="clearfix"></div>
								<div class="col-xs-12">
									<hr class="divider">
								</div>
								<div class="col-sm-4" style=" display: inline; " >
									<h6 class="text-left" style=" display: inline; " >0101210</h6>
								</div>
								<div class="col-sm-4" style=" display: inline; " >
									<h6 class="text-center" style=" display: inline; " >muhamm.com</h6>
								</div>
								<div class="col-sm-4" style=" display: inline; " >
									<h6 class="text-right" style=" display: inline; " >{{$settings->ar_title}}</h6>
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
