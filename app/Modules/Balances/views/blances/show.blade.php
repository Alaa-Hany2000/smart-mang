@extends('admin.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">بيانات الحساب</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">بيانات الحساب</a></li>
                            <li class="breadcrumb-item active">بيانات</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- products content -->
        <section class="content">
        <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">الدفع او دين يدوي</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="post" action="{{route('blances.store')}}">
       @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">المبلغ</label>
    <input type="hidden" name="balance" value="{{$balance->id}}">
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="amount" required min="1" placeholder="البلغ ">
    <small id="emailHelp" class="form-text text-muted">ادخل المبلغ</small>
    <div class="form-group">
     <label for="exampleFormControlSelect1">نوع التعامل</label>
    <select class="form-control" name="pay" id="exampleFormControlSelect1">
      <option value="1" >      
                                                     <span class="badge badge-success">( داخل)</span>
</option>
            <option value="2" >
                                                                 <span class="badge badge-danger">( خارج)</span>

            
            </option>

     
    </select>
    </div>
  
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">تراجع</button>
        <button type="supmit" class="btn btn-primary">حفظ </button>
      </div>
        </form>
    </div>
  </div>
</div>
            <div class="container-fluid">
                <div class="row">
                    <div class="card col-lg-12">
                        <div class="card-header d-flex p-0">
                            <h3 class="card-title p-3">معلومات الحساب </h3>
                            
                            <ul class="nav nav-pills ml-auto p-2">

                                <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">البايانات الاساسية</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">{{trans('products.AddtionalInfo')}}</a></li>
                               <li class="nav-item"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
                               تغير الحساب
  
</button></li>

                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active col-lg-12" id="tab_1">

                                    <table class="table">
                                        <thead class="thead-light">
                                        <tr class="table-primary">

                                            <th scope="col">{{trans('main.Name')}}</th>
                                            <th scope="col">{{trans('main.Value')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="table-success">
                                            <td>تاريخ التعامل الاول</td>
                                            <td>{{ date('d/m/Y', strtotime($balance->created_at)) }}</td>
                                        </tr>
                                        <tr class="table-primary">
                                      
                                        <tr class="table-info" >
                                            <td>العميل</td>
                                            <td>{{$customer->name}}</td>
                                        </tr>
                                    
                                      
                                    
  <tr class="table-dark">
                                            <td>اجمالي الحساب</td>
                                            <td>{{$balance->total}}</td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_2">
                                    <tr class="table">
                                        <table class="table">
                                                <th>تاريخ العملية</th>
                                                                                                <th>الساعة</th>

                                                <th>النوع</th>
                                              
                                                <th>{{ trans('main.Total') }}</th>



                                            <tbody>
                                                @if($detaile->count()>0)
                                                @foreach ($detaile as $sale)
                                                <?php
                                                $product=  App\Modules\Bills\Models\Bill::where('id',$sale->bill_id)->first();
                                                ?>
                                                  <tr >
                                                                                           <td>{{ date('d/m/Y', strtotime($sale->created_at)) }}</td>

                                                                                                      <td>{{ date('H:i', strtotime($sale->created_at)) }}</td>
  <td>

                                                @if($product)
                                              
                                                  
                                                    @if($product->type_id==1)
                                                    
                                                     <span class="badge badge-success">فاتورة بيع</span>
                                                     @elseif($product->type_id==2)
                                                     <span class="badge badge-info">فاتورة توريد</span>
                                                      @elseif($product->type_id==3)
                                                     <span class="badge badge-danger">فاتورة مرتجع</span>
                                                     @else
                                         <span class="badge badge-primary">فاتورة اعاده للمورد </span>
                                                 
                                               

                                                    @endif
                                                      @else
                                                      <span class="badge badge-dark">معاملة يدوية </span>
                                                   
                                                    </td>


                                                
                                                   @endif
                                                    <td>{{$sale->amount}}</td>
                                                   </tr>
                                                @endforeach
                                                @endif

                                            </tbody>
                                        </table>

                                    </tr>
                                </div>
                                <!-- /.tab-pane -->
                        
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>

                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- /.modal -->
    <!-- /.modal -->
    <!-- /.modal -->
    <!-- /.modal -->
    <!-- /.modal -->
@endsection

@push('js')
  

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
