@extends('admin.layouts.app')
@section('title','Show Feedback Detail')
@section('content')
            <div class="card">
                <div class="card-header py-3">
                  <h6 class="mb-0">Show Feedback Detail </h6>
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
                    <table class="table table-bordered table-hovered">
                            <tr>
                                <th>Name</th>
                                <td>{{ $feedback->name }}</td>
                            </tr>
                            <tr>
                                <th>Mobile</th>
                                <td>{{ $feedback->mobile }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $feedback->email }}</td>
                            </tr>
                            <tr>
                                <th>Comments</th>
                                <td>{{ $feedback->comments }}</td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td>
                                    <img src="{{ asset($feedback->image) }}" alt="" class="w-50">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <table class="table">
                                        <tr>
                                            <th></th>
                                            <th>Excellent</th>
                                            <th>Good</th>
                                            <th>Average</th>
                                            <th>Poor</th>
                                        </tr>
                                         <tr>
                                            <td>
                                                Quality of Food
                                            </td>
                                            <td>
                                                <input type="checkbox" name="q_food" value="1" id="" @if($feedback->q_food == 1) checked @endif>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="q_food" value="2" id="" @if($feedback->q_food == 2) checked @endif>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="q_food" value="3" id="" @if($feedback->q_food == 3) checked @endif>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="q_food" value="4" id="" @if($feedback->q_food == 4) checked @endif>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                    Cleanliness of Restaurant
                                            </td>
                                            <td>
                                                <input type="checkbox" name="cleanliness" value="1" id="" @if($feedback->cleanliness == 1) checked @endif>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="cleanliness" value="2" id="" @if($feedback->cleanliness == 2) checked @endif>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="cleanliness" value="3" id="" @if($feedback->cleanliness == 3) checked @endif>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="cleanliness" value="4" id="" @if($feedback->cleanliness == 4) checked @endif>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Quality of Service
                                            </td>
                                            <td>
                                                <input type="checkbox" name="q_service" value="1" id="" @if($feedback->q_service == 1) checked @endif>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="q_service" value="2" id="" @if($feedback->q_service == 2) checked @endif>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="q_service" value="3" id="" @if($feedback->q_service == 3) checked @endif>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="q_service" value="4" id="" @if($feedback->q_service == 4) checked @endif>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                    Friendliness of Stuff
                                            </td>
                                            <td>
                                                <input type="checkbox" name="friendliness" value="1" id="" @if($feedback->friendliness == 1) checked @endif>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="friendliness" value="2" id="" @if($feedback->friendliness == 2) checked @endif>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="friendliness" value="3" id="" @if($feedback->friendliness == 3) checked @endif>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="friendliness" value="4" id="" @if($feedback->friendliness == 4) checked @endif>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Speed of Service
                                            </td>
                                            <td>
                                                <input type="checkbox" name="speed" value="1" id="" @if($feedback->speed == 1) checked @endif>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="speed" value="2" id="" @if($feedback->speed == 2) checked @endif>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="speed" value="3" id="" @if($feedback->speed == 3) checked @endif>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="speed" value="4" id="" @if($feedback->speed == 4) checked @endif>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                    Appearance of Staff
                                            </td>
                                            <td>
                                                <input type="checkbox" name="apprearance" value="1" id="" @if($feedback->apprearance == 1) checked @endif>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="apprearance" value="2" id="" @if($feedback->apprearance == 2) checked @endif>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="apprearance" value="3" id="" @if($feedback->apprearance == 3) checked @endif>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="apprearance" value="4" id="" @if($feedback->apprearance == 4) checked @endif>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                 <th>Date</th>
                                 <td>{{ $feedback->created_at }}</td>
                            </tr>


                    </table>
                </div>
        </div>


@endsection
