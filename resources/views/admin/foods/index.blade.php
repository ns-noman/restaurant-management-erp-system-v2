@extends('admin.layouts.app')
@section('title','Foods')
@section('content')

            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
              <div class="breadcrumb-title pe-3">Foods</div>
              <div class="ps-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Foods list</li>
                  </ol>
                </nav>
              </div>

            </div>

            <div class="card">
                <div class="card-header py-3">
                  <h6 class="mb-0">Foods list  <a href="{{ route('food.create') }}" class="float-end btn btn-primary"> <i class="bx bx-plus"></i> Add New Food</a></h6>
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
                   <div class="row">
                     <div class="col-12 col-lg-12">
                        <div class="table-responsive mt-3">
                            <table id="table01" class="table align-middle ">
                                <thead class="table-secondary">
                                 <tr>
                                   <th>SL</th>
                                   <th>Name</th>

                                   <th>Category</th>
                                   <th>Price</th>
                                   <th>Menu Type</th>
                                   <th>Image</th>
                                   <th>Action</th>
                                 </tr>
                               </thead>
                               <tbody>
                                @foreach($foods as $food)
                                <tr>

                                  <td>
                                    <!-- Button trigger modal -->
										<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#food_image_{{ $food->id }}">Update </button>
										<!-- Modal -->
										<div class="modal fade" id="food_image_{{ $food->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog">
                                                <form action="{{ route('food.image.upload',$food->id) }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Image Upload</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row g-3">
                                                                <div class="col-12">
                                                                    <label class="form-label">Image</label>
                                                                    <input type="file"  name="image" class="form-control">
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </div>
                                                </form>
											</div>
										</div>



                                  </td>
                                  <td>{{ $food->name }}</td>
                                  <td>{{ $food->category?$food->category->name:'' }}</td>
                                  <td>{{ $food->price }}Tk</td>
                                  <td>{{ $food->menutype?$food->menutype->name:'' }}</td>
                                  <td>
                                    <img src="{{ asset('images/'.$food->image) }} " width="60">
                                  </td>
                                  <td>
                                     <form action="{{ route('food.destroy',$food->id) }}" method="POST">

                                             <a href="{{ route('food.show',$food->id) }}" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views"><i class="bi bi-eye-fill"></i></a>

                                             <a href="{{ route('food.edit',$food->id) }}" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit" aria-label="Edit"> <i class="bi bi-pencil-fill"></i></a>

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-danger btn" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></button>
                                        </form>
                                  </td>
                                </tr>
                                @endforeach
                               </tbody>
                             </table>
                          </div>
                    </div>
                   </div><!--end row-->
                </div>
              </div>
@endsection
