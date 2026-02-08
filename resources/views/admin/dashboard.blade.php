@extends('admin.layouts.app')
@section('title','Dashboard')
@section('content')


<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-4">
    <div class="col">
      <div class="card radius-10 bg-primary">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="">
              <p class="mb-1 text-white">Total Users</p>
              <h4 class="mb-0 text-white">{{$user_count}}</h4>
            </div>
            <div class="ms-auto widget-icon bg-white-1 text-white">
              <a href="#" class="text-white"><i class="bi bi-bag-check-fill"></i></a>
            </div>
          </div>
        </div>
      </div>
     </div>
     <div class="col">
      <div class="card radius-10 bg-success">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="">
              <p class="mb-1 text-white">Total Product</p>
              <h4 class="mb-0 text-white">{{$total_product}}</h4>
            </div>
            <div class="ms-auto widget-icon bg-white-1 text-white">
              <a href="{{route('food.index')}} " class="text-white"><i class="bi bi-currency-dollar"></i></a>
            </div>
          </div>
        </div>
      </div>
     </div>
     <div class="col">
      <div class="card radius-10 bg-pink">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="">
              <p class="mb-1 text-white">Total Category</p>
              <h4 class="mb-0 text-white">{{$total_categories}}</h4>
            </div>
            <div class="ms-auto widget-icon bg-white-1 text-white">
              <a href="{{route('category.index')}}"class="text-white"><i class="bi bi-bar-chart-fill"></i></a>
            </div>
          </div>
        </div>
      </div>
     </div>

     <div class="col">
      <div class="card radius-10 bg-primary">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="">
              <p class="mb-1 text-white">Total Order</p>
              <h4 class="mb-0 text-white">{{$total_order}}</h4>
            </div>
            <div class="ms-auto widget-icon bg-white-1 text-white">
                <a href="{{route('admin.order.all')}}"class="text-white"><i class="bi bi-bar-chart-fill"></i></a>
            </div>
          </div>
        </div>
      </div>
     </div>
     <div class="col">
        <div class="card radius-10 bg-orange">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="">
                <p class="mb-1 text-white">Pending</p>
                <h4 class="mb-0 text-white">{{$pending}}</h4>
              </div>
              <div class="ms-auto widget-icon bg-white-1 text-white">
                  <a href="{{route('admin.order.all')}}"class="text-white"><i class="bi bi-bar-chart-fill"></i></a>
              </div>
            </div>
          </div>
        </div>
       </div><div class="col">
        <div class="card radius-10 bg-success">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="">
                <p class="mb-1 text-white">Confirmed</p>
                <h4 class="mb-0 text-white">{{$Confirmed}}</h4>
              </div>
              <div class="ms-auto widget-icon bg-white-1 text-white">
                  <a href="{{route('admin.order.all')}}"class="text-white"><i class="bi bi-bar-chart-fill"></i></a>
              </div>
            </div>
          </div>
        </div>
       </div><div class="col">
        <div class="card radius-10 bg-primary">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="">
                <p class="mb-1 text-white">Processing</p>
                <h4 class="mb-0 text-white">{{$processing}}</h4>
              </div>
              <div class="ms-auto widget-icon bg-white-1 text-white">
                  <a href="{{route('admin.order.all')}}"class="text-white"><i class="bi bi-bar-chart-fill"></i></a>
              </div>
            </div>
          </div>
        </div>
       </div><div class="col">
        <div class="card radius-10 bg-info">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="">
                <p class="mb-1 text-white">Out Of Delivery</p>
                <h4 class="mb-0 text-white">{{$outofdelivery}}</h4>
              </div>
              <div class="ms-auto widget-icon bg-white-1 text-white">
                  <a href="{{route('admin.order.all')}}"class="text-white"><i class="bi bi-bar-chart-fill"></i></a>
              </div>
            </div>
          </div>
        </div>
       </div><div class="col">
        <div class="card radius-10 bg-success">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="">
                <p class="mb-1 text-white">Delivered</p>
                <h4 class="mb-0 text-white">{{$delivered}}</h4>
              </div>
              <div class="ms-auto widget-icon bg-white-1 text-white">
                  <a href="{{route('admin.order.all')}}"class="text-white"><i class="bi bi-bar-chart-fill"></i></a>
              </div>
            </div>
          </div>
        </div>
       </div><div class="col">
        <div class="card radius-10 bg-danger">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="">
                <p class="mb-1 text-white">Return</p>
                <h4 class="mb-0 text-white">{{$returned}}</h4>
              </div>
              <div class="ms-auto widget-icon bg-white-1 text-white">
                  <a href="{{route('admin.order.all')}}"class="text-white"><i class="bi bi-bar-chart-fill"></i></a>
              </div>
            </div>
          </div>
        </div>
       </div><div class="col">
        <div class="card radius-10 bg-warning">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="">
                <p class="mb-1 text-white">Failed</p>
                <h4 class="mb-0 text-white">{{$failed}}</h4>
              </div>
              <div class="ms-auto widget-icon bg-white-1 text-white">
                  <a href="{{route('admin.order.all')}}"class="text-white"><i class="bi bi-bar-chart-fill"></i></a>
              </div>
            </div>
          </div>
        </div>
       </div>
       <div class="col">
        <div class="card radius-10 bg-danger">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="">
                <p class="mb-1 text-white">Cancel</p>
                <h4 class="mb-0 text-white">{{$cancel}}</h4>
              </div>
              <div class="ms-auto widget-icon bg-white-1 text-white">
                  <a href="{{route('admin.order.all')}}"class="text-white"><i class="bi bi-bar-chart-fill"></i></a>
              </div>
            </div>
          </div>
        </div>
       </div>










     </div>
     </div>
@endsection
