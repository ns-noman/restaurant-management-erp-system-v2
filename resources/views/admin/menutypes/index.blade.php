@extends('admin.layouts.app')
@section('title','Food Menu Type')
@section('content')

            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
              <div class="breadcrumb-title pe-3">Food</div>
              <div class="ps-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Menu Type</li>
                  </ol>
                </nav>
              </div>

            </div>






            <div class="card">
                <div class="card-header py-3">
                  <h6 class="mb-0">Food Menu Type</h6>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                </div>
                <div class="card-body">
                   <div class="row">
                     <div class="col-12 col-lg-4 d-flex">
                       <div class="card border shadow-none w-100">
                         <div class="card-body">
                           <form class="row g-3" method="POST" action="{{ route('menutype.store')  }}" enctype="multipart/form-data">
                            @csrf
                             <div class="col-12">
                               <label class="form-label">Name</label>
                               <input type="text" name="name" class="form-control" value="{{ old('name')  }}" placeholder="Menu Type name">
                               <div class="text-danger">{{ $errors->first('name') }}</div>
                             </div>

                             <div class="col-12">
                               <label class="form-label">Icon</label>
                               <input type="file" name="icon" class="form-control" placeholder="icon">
                               <div class="text-danger">{{ $errors->first('icon') }}</div>
                             </div>


                            <div class="col-12">
                              <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Add Menu Type</button>
                              </div>
                            </div>
                           </form>
                         </div>
                       </div>
                     </div>
                     <div class="col-12 col-lg-8 d-flex">
                      <div class="card border shadow-none w-100">
                        <div class="card-body">
                          <div class="table-responsive">
                             <table class="table align-middle">
                               <thead class="table-light">
                                 <tr>
                                   <th><input class="form-check-input" type="checkbox"></th>
                                   <th>SL</th>
                                   <th>Name</th>
                                   <th>Image</th>
                                   <th>Action</th>
                                 </tr>
                               </thead>
                               <tbody>

                                @foreach ($menutypes as $menutype)


                                 <tr>
                                   <td><input class="form-check-input" type="checkbox"></td>
                                   <td>{{ $loop->iteration }}</td>
                                   <td>{{ $menutype->name }}</td>

                                   <td>
                                       <img src="{{ asset('images/'.$menutype->icon) }}" alt="" width="60">
                                   </td>


                                   <td>
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                        <form action="{{ route('menutype.destroy',$menutype->id) }}" method="POST">
                                             <a href="#" class="text-warning"  data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit" data-bs-toggle="modal" data-bs-target="#category_edit_{{ $menutype->id }}"> <i class="bi bi-pencil-fill"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-danger btn" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></button>
                                        </form>

										<!-- Modal -->
										<div class="modal fade" id="category_edit_{{ $menutype->id }}" tabindex="-1" aria-hidden="true">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title">Edit  Menu Type </h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
                                                         <div class="row">
                                                            <div class="col-12 col-lg-12 d-flex">
                                                            <div class="card border shadow-none w-100">
                                                                <div class="card-body">
                                                                <form class="row g-3" method="POST" action="{{ route('menutype.update',$menutype->id)  }}" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="col-12">
                                                                    <label class="form-label">Name</label>
                                                                    <input type="text" name="name" class="form-control" value="{{ $menutype->name  }}" placeholder="Category name">
                                                                    <div class="text-danger">{{ $errors->first('name') }}</div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                    <label class="form-label">Icon</label>
                                                                    <br>
                                                                    <img src="{{ asset('images/'.$menutype->icon) }}" alt="" width="60">
                                                                    <br>
                                                                    <br>
                                                                    <input type="file" name="image" class="form-control" placeholder="image">
                                                                    <div class="text-danger">{{ $errors->first('icon') }}</div>
                                                                    </div>


                                                                    <div class="col-12">
                                                                    <div class="d-grid">
                                                                        <button type="submit" class="btn btn-primary">Update Menu Type</button>
                                                                    </div>
                                                                    </div>
                                                                </form>
                                                                </div>
                                                            </div>
                                                            </div>
                                                            </div>
                                                    </div>

												</div>
											</div>
										</div>


                                    </div>
                                   </td>
                                 </tr>

                                @endforeach


                               </tbody>
                             </table>
                          </div>

                        </div>
                      </div>
                    </div>
                   </div><!--end row-->
                </div>
              </div>
@endsection
