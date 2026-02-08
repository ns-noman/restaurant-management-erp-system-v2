@extends('admin.layouts.app',['title' => 'Show Order'])



@section('content')
    <!--start content-->
    <main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center py-2 px-3" style="background: rgb(46 57 78);">
        <div class="pe-3"><h5 class="text-white m-0"> Order Invoice </h5></div>

    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body">
            <div class="card border shadow-none">
                <div class="card-header py-3">
                     <div class="row align-items-center g-3">
                       <div class="col-12 col-lg-6">
                         <h5 class="mb-0">Halalincu</h5>
                       </div>
                       <div class="col-12 col-lg-6 text-md-end">
                         <a href="javascript:;" class="btn btn-sm btn-danger me-2"><i class="bi bi-file-earmark-pdf-fill"></i> Export as PDF</a>
                         <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-secondary"><i class="bi bi-printer-fill"></i> Print</a>
                       </div>
                     </div>
                </div>
                <div class="card-header py-2 bg-light">
                  <div class="row row-cols-1 row-cols-lg-3">
                    <div class="col">
                     <div class="">

                       <address class="m-t-5 m-b-5">
                          <strong class="text-inverse">Personal Information</strong><br>
                          Name: {{$order->billing ? $order->billing->name: ''}}<br>
                          Company Name:{{$order->billing? $order->billing->company_name:''}}<br>
                          Email: {{$order->billing ? $order->billing->email:''}}<br>
                          Phone: {{$order->billing ? $order->billing->contract_number:''}}<br>

                       </address>
                      </div>
                    </div>
                    <div class="col">
                     <div class="">

                       <address class="m-t-5 m-b-5">
                          <strong class="text-inverse">Billing Information</strong><br>
                          Apartment: {{$order->billing ? $order->billing->apartment_address:''}}, Street: {{$order->billing ? $order->billing->street_address:''}}<br>
                          Town: {{$order->billing ? $order->billing->town:''}}<br>
                          City: {{$order->billing ? $order->billing->city:''}}, Zip Code: {{$order->billing ? $order->billing->zip_code:''}}<br>


                       </address>
                      </div>
                   </div>
                   <div class="col">
                     <div class="">
                       <small>Invoice</small>
                       <div class=""><b>{{$order->billing ? $order->billing->created_at->format('d M Y') : ''}}</b></div>
                       <div class="invoice-detail">
                          #{{$order->uid }}<br>
                          Services Product
                       </div>
                     </div>
                   </div>
                  </div>
                </div>
               <div class="card-body">
                 <div class="table-responsive">
                   <table class="table table-invoice">
                      <thead>
                         <tr>
                            <th width="10%">#SL</th>
                            <th width="50%">PRODUCT NAME</th>
                            <th class="text-center" width="10%">PRICE</th>
                            <th class="text-center" width="10%">QUENTITY</th>
                            <th class="text-right" width="20%">SUB TOTAL</th>
                         </tr>
                      </thead>

                      <tbody>

                          @foreach ($order->orderdetails as $item )


                         <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                               <span class="text-inverse">{{$item->product->name}}</span><br>

                            </td>
                            <td class="text-center">{{$item->price}}</td>
                            <td class="text-center">{{$item->qty}}</td>
                            <td class="text-right">{{$item->total_price}}</td>

                         </tr>
                         @endforeach

                      </tbody>
                   </table>
                </div>

                <div class="row bg-light align-items-center m-0">
                  <div class="col col-auto p-4">
                     <p class="mb-0">SUBTOTAL</p>
                     <h4 class="mb-0">{{$order->subtotal}}</h4>
                  </div>
                  <div class="col col-auto p-4">
                     <i class="bi bi-plus-lg text-muted"></i>
                  </div>
                  <div class="col col-auto me-auto p-4">
                     <p class="mb-0">SHIPPING</p>
                     <h4 class="mb-0">{{$order->shipping}}</h4>
                  </div>
                  <div class="col bg-dark col-auto p-4">
                   <p class="mb-0 text-white">TOTAL</p>
                   <h4 class="mb-0 text-white">{{$order->total}}</h4>
                  </div>
                </div><!--end row-->

                <hr>
              <!-- begin invoice-note -->
              <div class="my-3">
               * Make all cheques payable to [Your Company Name]<br>
               * Payment is due within 30 days<br>
               * If you have any questions concerning this invoice, contact  [Name, Phone Number, Email]
              </div>
            <!-- end invoice-note -->
               </div>

               <div class="card-footer py-3">
                   <p class="text-center mb-2">
                      THANK YOU FOR YOUR BUSINESS
                   </p>
                   <p class="text-center d-flex align-items-center gap-3 justify-content-center mb-0">
                      <span class=""><i class="bi bi-globe"></i> {{$websetting->website_name}}</span>
                      <span class=""><i class="bi bi-telephone-fill"></i>{{$websetting->phone}}</span>
                      <span class=""><i class="bi bi-envelope-fill"></i>{{$websetting->email}} </span>
                   </p>
               </div>
              </div>

        </div>
    </div>


    </main>
<!--end page main-->
@endsection
