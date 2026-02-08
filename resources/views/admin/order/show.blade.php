@extends('admin.layouts.app')
@section('Order Details')
@section('content')

            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
              <div class="breadcrumb-title pe-3">Order</div>
              <div class="ps-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Order Detail</li>
                  </ol>
                </nav>
              </div>
            </div>


            <div class="card border shadow-none">
             <div class="card-header py-3">
                  <div class="row align-items-center g-3">
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-0">Order Invoice - Wooden Spoon</h5>
                    </div>
                    <div class="col-12 col-lg-6 text-md-end">
                      <a href="javascript:;" class="btn btn-sm btn-danger me-2"><i class="bi bi-file-earmark-pdf-fill"></i> Export as PDF</a>
                      <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-secondary"><i class="bi bi-printer-fill"></i> Print</a>
                    </div>
                  </div>
             </div>
             <div class="card-header py-2 bg-light">
                 <div class="row border-bottom mb-3">
                     <div class="col-12 col-lg-8">
                         <div class="row">
                             <div class="col"><h4>Order #{{ $ordershow->id }} </h4></div>
                             <div class="col">{{ $ordershow->created_at->format('d M Y') }}</div>
                             <div class="col">
                                @if ($ordershow->payment_status == 2)
                                 Payment Status :    <span class="btn btn-xs btn-success"> Paid</span>
                                @elseif ($ordershow->payment_status == 1)
                                 Payment Status :     <span class="btn btn-xs btn-danger"> Unpaid</span>
                                @endif
                             </div>
                             <div class="col">
                                 Status :
                                   @if ($ordershow->status == 0)
                                        <span class="btn btn-danger status-btn ">Cancel</span>
                                    @elseif($ordershow->status == 1)
                                        <span class="btn btn-success status-btn">Confirmed</span>
                                    @elseif($ordershow->status == 2)
                                        <span class="btn btn-warning status-btn">Pending</span>
                                    @elseif($ordershow->status == 3)
                                        <span class="btn btn-info status-btn">Processing</span>
                                    @elseif($ordershow->status == 4)
                                        <span class="btn btn-primary status-btn">Out Of Delivery</span>
                                    @elseif($ordershow->status == 5)
                                        <span class="btn btn-warning status-btn">Delivered</span>
                                    @elseif($ordershow->status == 6)
                                        <span class="btn btn-secondary status-btn">Returned</span>
                                    @elseif($ordershow->status == 7)
                                        <span class="btn btn-dark status-btn">Failed</span>
                                    @endif
                             </div>
                         </div>
                         </div>

                            <div class="col-12 col-lg-4">
                                <div class="order-top-left d-lg-flex justify-content-end">
                                    <div class="d-flex">
                                        <form action="{{ route('admin.payment.update', $ordershow->id) }}"
                                            class="form-order" method="post">
                                            @csrf
                                            <select name="payment_status">
                                                <option value="2" {{ $ordershow->payment_status == 2 ? 'selected' : '' }}>
                                                    Paid</option>
                                                <option value="1" {{ $ordershow->payment_status == 1 ? 'selected' : '' }}>
                                                    Unpaid</option>
                                            </select>
                                            <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                        </form>


                                        <form action="{{ route('admin.order.update', $ordershow->id) }}"
                                            class="form-order" method="post">
                                            @csrf

                                            <select name="status">
                                                <option value="2" {{ $ordershow->status == 2 ? 'selected' : '' }}>
                                                    Pending
                                                </option>
                                                <option value="1" {{ $ordershow->status == 1 ? 'selected' : '' }}>
                                                    Confirmed
                                                </option>
                                                <option value="3" {{ $ordershow->status == 3 ? 'selected' : '' }}>
                                                    Processing
                                                </option>
                                                <option value="4" {{ $ordershow->status == 4 ? 'selected' : '' }}>Out Of
                                                    Delivery</option>
                                                <option value="5" {{ $ordershow->status == 5 ? 'selected' : '' }}>
                                                    Delivered
                                                </option>
                                                <option value="6" {{ $ordershow->status == 6 ? 'selected' : '' }}>
                                                    Returned
                                                </option>
                                                <option value="7" {{ $ordershow->status == 7 ? 'selected' : '' }}>Failed
                                                </option>
                                                <option value="0" {{ $ordershow->status == 0 ? 'selected' : '' }}>
                                                    Canceled
                                                </option>
                                            </select>
                                            <button type="submit" class="btn btn-sm  btn-primary">Save</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                 </div>
               <div class="row row-cols-1 row-cols-lg-3">
                 <div class="col-6">
                  <div class="">
                    <small>Customer Information</small>
                    <address class="m-t-5 m-b-5">
                       <strong class="text-inverse">{{ $ordershow->user?$ordershow->user->name:'' }}</strong><br>
                        {{ $ordershow->user?$ordershow->user->address:'' }}<br>
                       Phone: {{ $ordershow->user?$ordershow->user->mobile:'' }}<br>
                    </address>
                   </div>
                </div>
                <div class="col-6">
                  <div class="">
                    <small>Invoice / {{ $ordershow->created_at->format('M')  }} period</small>
                    <div class=""><b> {{ $ordershow->created_at  }}</b></div>
                    <div class="invoice-detail">
                       #{{ $ordershow->id  }}<br>
                       Food Order
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
                         <th  width="10%">SL</th>
                         <th  width="60%">Food Item</th>
                         <th class="text-left" width="10%">RATE</th>
                         <th class="text-left" width="10%">QTY</th>
                         <th class="text-left" width="10%">TOTAL</th>
                      </tr>
                   </thead>
                   <tbody>
                       @foreach ($ordershow->orderdetail as $orderdetail)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $orderdetail->food?$orderdetail->food->name:'' }}</td>
                            <td>{{ $orderdetail->price  }}</td>
                            <td>{{ $orderdetail->qty  }}</td>
                            <td>{{ $orderdetail->total  }}</td>
                        </tr>
                        @endforeach
                   </tbody>
                </table>
             </div>

             <div class="row bg-light align-items-center m-0">
               <div class="col col-auto p-4">
                  <p class="mb-0">SUBTOTAL</p>
                  <h4 class="mb-0">={{ $ordershow->subtotal  }}/-</h4>
               </div>
               <div class="col col-auto p-4">
                  <i class="bi bi-plus-lg text-muted"></i>
               </div>
               <div class="col col-auto me-auto p-4">
                  <p class="mb-0">Delivery Charge</p>
                  <h4 class="mb-0">={{ $ordershow->shipping  }}/-</h4>
               </div>
               <div class="col bg-dark col-auto p-4">
                <p class="mb-0 text-white">TOTAL</p>
                <h4 class="mb-0 text-white">={{ $ordershow->total  }}/-</h4>
               </div>
             </div><!--end row-->

             <hr>
           <!-- begin invoice-note -->

         <!-- end invoice-note -->
            </div>

            <div class="card-footer py-3">
                <p class="text-center mb-2">
                   THANK YOU FOR YOUR BUSINESS
                </p>
                <p class="text-center d-flex align-items-center gap-3 justify-content-center mb-0">
                   <span class=""><i class="bi bi-globe"></i>    Wooden Spoon</span>
                   <span class=""><i class="bi bi-telephone-fill"></i> T: +8801847-091017</span>
                   <span class=""><i class="bi bi-envelope-fill"></i>  info@woodenspoonbd.com</span>
                </p>
            </div>
           </div>

@endsection
