@extends('admin.layouts.app')
@section('title','All Reservations List')
@section('content')

            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
              <div class="breadcrumb-title pe-3">Reservations</div>
              <div class="ps-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Reservations list</li>
                  </ol>
                </nav>
              </div>

            </div>

            <div class="card">
                <div class="card-header py-3">
                  <h6 class="mb-0">Reservations list </h6>
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
                            <th>PERSON</th>
                            <th>Reservation Date</th>
                            <th>Reservation Time</th>
                            <th>Message</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($reservations as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->created_at->format('d M Y')}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->phone }}</td>
                            <td>{{$item->person }}</td>
                            <td>{{$item->reservation_date }}</td>
                            <td>{{$item->reservation_time }}</td>
                            <td>{{$item->message }}</td>
                            <td>
                                @if ($item->status == 0)
                                    <span class="btn btn-danger status-btn ">Deleted</span>
                                @elseif($item->status == 1)
                                <span class="btn btn-warning status-btn">Request</span>
                                @elseif($item->status == 2)
                                <span class="btn btn-info status-btn">Pending</span>
                                @elseif($item->status == 3)
                                <span class="btn btn-secondary status-btn">Confirm</span>
                                @elseif($item->status == 4)
                                <span class="btn btn-dark status-btn">Successfully Delivered</span>
                                @endif
                            </td>
                            <td>
                            <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                 <form action="{{ route('reservation.destroy',$item->id) }}" method="POST">
                                     @csrf
                                     @method('DELETE')
                                     <button class="btn btn-danger btn-sm" onclick="confirm('Are you sure delete this data')">  <i class="bi bi-trash"></i> Delete</button>
                                 </form>
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
