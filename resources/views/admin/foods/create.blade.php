@extends('admin.layouts.app')
@section('title','Food Category')
@section('content')

            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
              <div class="breadcrumb-title pe-3">Foods</div>
              <div class="ps-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add New Food</li>
                  </ol>
                </nav>
              </div>
            </div>
            <div class="row">
                 <div class="col-lg-12 mx-auto">
                  <div class="card">
                    <div class="card-header py-3 bg-transparent">
                      <div class="d-sm-flex align-items-center">
                        <h5 class="mb-2 mb-sm-0">Add New Food</h5>

                      </div>
                     </div>
                    <div class="card-body">
                      <form class="form" method="post" action="{{ route('food.store') }}" enctype="multipart/form-data">
                        @csrf
                       <div class="row g-3">
                         <div class="col-12 col-lg-8">
                            <div class="card shadow-none bg-light border">
                              <div class="card-body">
                                <form class="row g-3">
                                  <div class="col-12">
                                    <label class="form-label">Food Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Food Name" value="{{ old('name') }}">
                                    <div class="text-danger">{{ $errors->first('name') }}</div>
                                  </div>

                                  <div class="col-12">
                                    <label class="form-label">Food Name (Bangla)</label>
                                    <input type="text" name="bn_name" class="form-control" placeholder="Food Name (Bangla)" value="{{ old('bn_name') }}">
                                  </div>
                                  <div class="col-12">
                                    <label class="form-label">Slug</label>
                                    <input type="text" name="slug" class="form-control" placeholder="Slug" value="{{ old('slug') }}">
                                  </div>


                                  <div class="col-12">
                                      <label class="form-label">Category</label>
                                      <select class="form-select" name="category_id">
                                        <option>Select Category</option>
                                        @foreach($categories as $category)
                                        <option {{ $category->id == old('category_id') ? 'selected' : '' }}  value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach

                                      </select>
                                  </div>
                                  <div class="col-12">
                                      <label class="form-label">Menu Type</label>
                                      <select class="form-select" name="menu_type_id">
                                        <option>Select Type</option>
                                        @foreach ($menutypes as $menutype)
                                        <option {{ $menutype->id == old('menu_type_id') ? 'selected' : '' }} value="{{ $menutype->id }}">{{ $menutype->name }}</option>
                                        @endforeach

                                      </select>
                                  </div>


                                  <div class="col-12">


                                    <label class="form-label">Images</label>
                                    <input class="form-control" type="file" name="image">
                                  </div>
                                  <div class="col-12">
                                    <label class="form-label">Full description</label>
                                    <textarea class="form-control" placeholder="Full description" rows="4" cols="4" name="description">{{  old('description') }}</textarea>
                                  </div>
                                </form>
                              </div>
                            </div>
                         </div>

                         <div class="col-12 col-lg-4">
                            <div class="card shadow-none bg-light border">
                              <div class="card-body">
                                  <div class="row g-3">
                                    <div class="col-12">
                                      <label class="form-label">Price</label>
                                      <input type="text" name="price" class="form-control" placeholder="Price">
                                    </div>

                                    <div class="col-12">
                                      <label class="form-label">Offer Price</label>
                                      <input type="text" name="discount_price" class="form-control" placeholder="Offer Price">
                                    </div>


                                    <div class="col-12">
                                      <label class="form-label">Price Active</label>
                                      <select class="form-select" name="price_active">
                                        <option value="1">Regular Price</option>
                                        <option value="2">Offer Price</option>
                                      </select>
                                    </div>

                                    <div class="col-12">
                                      <button type="submit" class="btn btn btn-primary">Published </button>

                                    </div>



                                  </div><!--end row-->
                              </div>
                            </div>
                        </div>

                       </div><!--end row-->
                        </form>
                     </div>
                    </div>
                 </div>
              </div>

@endsection
