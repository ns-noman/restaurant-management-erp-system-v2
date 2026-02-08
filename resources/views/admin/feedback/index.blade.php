@extends('admin.layouts.app')
@section('title','All Feedback List')
@section('content')
            <div class="card">
                <div class="card-header py-3">
                  <h6 class="mb-0">Feedback list </h6>
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
                            <th>NAME</th>
                            <th>PHONE</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($feedbacks as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->created_at->format('d M Y')}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->mobile }}</td>
                            <td>{{$item->email }}</td>
                            <td>
                                <img src="{{ $item->image }}" alt="" class="w-25">
                            </td>
                            <td>
                                @if($item->status == 0)
                                    <span class="btn btn-danger status-btn" data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $item->id }}">Deleted</span>
                                @elseif($item->status == 1)
                                <span class="btn btn-warning status-btn" data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $item->id }}">Request</span>
                                @elseif($item->status == 2)
                                <span class="btn btn-info status-btn" data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $item->id }}">Confirm</span>
                                @elseif($item->status == 3)
                                <span class="btn btn-secondary status-btn" data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $item->id }}">Rejected</span>
                                @endif

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal_{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                             <form action="{{ route('adminfeedback.update',$item->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Change Review</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                    <select name="status" id="" class="form-control" required>
                                                        <option value="">Select Status</option>
                                                        <option value="0">Deleted</option>
                                                        <option value="1">Request</option>
                                                        <option value="2">Confirm</option>
                                                        <option value="3">Rejected</option>
                                                    </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                    <form action="{{ route('adminfeedback.destroy',$item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="confirm('Are you sure delete this data')">  <i class="bi bi-trash"></i> Delete</button>
                                    </form>
                                    <a href="{{ route('adminfeedback.show',$item->id) }}" class="btn btn-info text-white"><i class="bi bi-eye"></i>  Show</a>
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
