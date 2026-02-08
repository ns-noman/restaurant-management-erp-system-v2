@extends('admin.layouts.app')
@section('title','Food Category')
@section('content')

            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
              <div class="breadcrumb-title pe-3">Food</div>
              <div class="ps-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Categories</li>
                  </ol>
                </nav>
              </div>

            </div>






            <div class="card">
                <div class="card-header py-3">
                  <h6 class="mb-0">Food Category</h6>
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
                           <form class="row g-3" method="POST" action="{{ route('category.store')  }}" enctype="multipart/form-data">
                            @csrf
                             <div class="col-12">
                               <label class="form-label">Name</label>
                               <input type="text" name="name" class="form-control" value="{{ old('name')  }}" placeholder="Category name">
                               <div class="text-danger">{{ $errors->first('name') }}</div>
                             </div>
                             <div class="col-12">
                               <label class="form-label">Bangla Name</label>
                               <input type="text" name="bn_name" class="form-control" value="{{ old('bn_name')  }}" placeholder="ক্যাটাগরী বাংলা নাম">
                               <div class="text-danger">{{ $errors->first('bn_name') }}</div>
                             </div>
                             <div class="col-12">
                              <label class="form-label">Slug</label>
                              <input type="text" name="slug" class="form-control" value="{{ old('slug')  }}" placeholder="Slug name">
                              <div class="text-danger">{{ $errors->first('slug') }}</div>

                            </div>
                            <div class="col-12">
                              <label class="form-label">Parent</label>
                              <select class="form-select" name="parent_id">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                    <option {{ old('parent_id') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                              </select>
                              <div class="text-danger">{{ $errors->first('parent_id') }}</div>
                            </div>

                             <div class="col-12">
                               <label class="form-label">Image</label>
                               <input type="file" name="image" class="form-control" placeholder="image">
                               <div class="text-danger">{{ $errors->first('image') }}</div>
                             </div>

                            <div class="col-12">
                              <label class="form-label">Description</label>
                              <textarea class="form-control" name="description" rows="3" cols="3" placeholder="Product Description">{{ old('description') }}</textarea>
                               <div class="text-danger">{{ $errors->first('description') }}</div>
                            </div>
                            <div class="col-12">
                              <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Add Category</button>
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
                                   <th>Bangla Name</th>
                                   <th>Description</th>
                                   <th>Slug</th>
                                   <th>Image</th>
                                   <th>Parent</th>
                                   <th>Action</th>
                                 </tr>
                               </thead>
                               <tbody>

                                @foreach ($categories as $category)


                                 <tr>
                                   <td><input class="form-check-input" type="checkbox"></td>
                                   <td>{{ $loop->iteration }}</td>
                                   <td>{{ $category->name }}</td>
                                   <td>{{ $category->bn_name }}</td>
                                   <td>{{ $category->description }}</td>
                                   <td>{{ $category->slug }}</td>
                                   <td>
                                       <img src="{{ asset('images/'.$category->image) }}" alt="" width="60">
                                   </td>
                                   <td>{{ $category->category?$category->category->name:'' }}</td>

                                   <td>
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                        <form action="{{ route('category.destroy',$category->id) }}" method="POST">
                                             <a href="#" class="text-warning"  data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit" data-bs-toggle="modal" data-bs-target="#category_edit_{{ $category->id }}"> <i class="bi bi-pencil-fill"></i></a>













                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-danger btn" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></button>
                                        </form>

										<!-- Modal -->
										<div class="modal fade" id="category_edit_{{ $category->id }}" tabindex="-1" aria-hidden="true">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title">Edit Food Category </h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
                                                         <div class="row">
                                                            <div class="col-12 col-lg-12 d-flex">
                                                            <div class="card border shadow-none w-100">
                                                                <div class="card-body">
                                                                <form class="row g-3" method="POST" action="{{ route('category.update',$category->id)  }}" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="col-12">
                                                                    <label class="form-label">Name</label>
                                                                    <input type="text" name="name" class="form-control" value="{{ $category->name  }}" placeholder="Category name">
                                                                    <div class="text-danger">{{ $errors->first('name') }}</div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                    <label class="form-label">Bangla Name</label>
                                                                    <input type="text" name="bn_name" class="form-control" value="{{ $category->bn_name  }}" placeholder="ক্যাটাগরী বাংলা নাম">
                                                                    <div class="text-danger">{{ $errors->first('bn_name') }}</div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                    <label class="form-label">Slug</label>
                                                                    <input type="text" name="slug" class="form-control" value="{{ $category->slug  }}" placeholder="Slug name">
                                                                    <div class="text-danger">{{ $errors->first('slug') }}</div>

                                                                    </div>
                                                                    <div class="col-12">
                                                                    <label class="form-label">Parent</label>
                                                                    <select class="form-select" name="parent_id">
                                                                            <option value="">Select Category</option>
                                                                            @foreach($categories as $cat)
                                                                            <option {{ $category->parent_id  == $cat->id ? 'selected' : '' }} value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                                            @endforeach
                                                                    </select>
                                                                    <div class="text-danger">{{ $errors->first('parent_id') }}</div>
                                                                    </div>

                                                                    <div class="col-12">
                                                                    <label class="form-label">Image</label>
                                                                    <br>
                                                                    <img src="{{ asset('images/'.$category->image) }}" alt="" width="60">
                                                                    <br>
                                                                    <br>
                                                                    <input type="file" name="image" class="form-control" placeholder="image">
                                                                    <div class="text-danger">{{ $errors->first('image') }}</div>
                                                                    </div>

                                                                    <div class="col-12">
                                                                    <label class="form-label">Description</label>
                                                                    <textarea class="form-control" name="description" rows="3" cols="3" placeholder="Product Description">{{ $category->description }}</textarea>
                                                                    <div class="text-danger">{{ $errors->first('description') }}</div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                    <div class="d-grid">
                                                                        <button type="submit" class="btn btn-primary">Update Category</button>
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
