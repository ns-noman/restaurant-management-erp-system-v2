@extends('admin.layouts.app')
@section('title','All Out Of Delivery Order List')
@section('content')

            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
              <div class="breadcrumb-title pe-3">Order</div>
              <div class="ps-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Out Of Delivery Order list</li>
                  </ol>
                </nav>
              </div>

            </div>

            <div class="card">
                <div class="card-header py-3">
                  <h6 class="mb-0">Out Of Delivery Orders list </h6>
                        @if ($message = Session::get('success'))
                        <div class="alert border-0 bg-light-success alert-dismissible fade show py-2 mt-4">
                        <div class="d-flex align-items-center">
                          <div class="fs-3 text-success"><i class="bi bi-check-circle-fill"></i>
                          </div>
                          <div class="ms-3">
                            <div class="text-success">{{ $message }}</div>
                          </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                      @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive mt-3">
                    <table class="table align-middle">
                        <thead class="table-secondary">
                        <tr>
                            <th>SL#</th>
                            <th>DATE</th>
                            <th>CUSTOMER NAME</th>
                            <th>PHONE</th>
                            <th>ADDRESS</th>
                            <th>STATUS</th>
                            <th>SUB TOTAL</th>
                            <th>DELIVERY CHARGE</th>
                            <th>VAT</th>
                            <th>TOTAL</th>
                            <th>PAYMENT STATUS</th>
                            <th>ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($orderall as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->created_at->format('d M Y')}}</td>
                            <td>{{$item->user ? $item->user->name :''}}</td>
                            <td>{{$item->user ? $item->user->mobile :''}}</td>
                            <td>{{$item->user ? $item->user->address :''}}</td>
                            <td>
                                @if ($item->status == 0)
                                    <span class="btn btn-danger status-btn ">Cancel</span>
                                @elseif($item->status == 1)
                                <span class="btn btn-success status-btn">Confirmed</span>
                                @elseif($item->status == 2)
                                <span class="btn btn-warning status-btn">Pending</span>
                                @elseif($item->status == 3)
                                <span class="btn btn-info status-btn">Processing</span>
                                @elseif($item->status == 4)
                                <span class="btn btn-primary status-btn">Out Of Delivery</span>
                                @elseif($item->status == 5)
                                <span class="btn btn-warning status-btn">Delivered</span>
                                @elseif($item->status == 6)
                                <span class="btn btn-secondary status-btn">Returned</span>
                                @elseif($item->status == 7)
                                <span class="btn btn-dark status-btn">Failed</span>
                                @endif
                            </td>
                            <td>{{$item->subtotal }}</td>
                            <td>{{$item->shipping }}</td>
                            <td>{{$item->vat }}</td>
                            <td>{{$item->total}}</td>
                            <td>
                                @if ($item->payment_status == 1)
                                <span class="btn btn-danger status-btn">Unpaid</span>
                            @elseif($item->payment_status == 2)
                            <span class="btn btn-success status-btn">Paid</span>
                            @endif
                            </td>


                            <td>
                            <div class="table-actions d-flex align-items-center gap-3 fs-6">

                                <a href="{{route('admin.order.show',$item->id)}}" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Views" aria-label="Views"><i class="bi bi-eye-fill"></i></a>


                            </div>
                            </td>
                        </tr>

                        @endforeach

                        </tbody>
                    </table>
                    </div>
                </div>
        </div>


@endsection
