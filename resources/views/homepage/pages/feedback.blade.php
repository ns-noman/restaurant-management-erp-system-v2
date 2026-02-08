@extends('homepage.layouts.app')
@section('title','Feedback')
@section('content')
   <style>

        .star-rating {
            float: left;
            font-size: 0;
            white-space: nowrap;
            display: inline-block;
            width: 175px;
            height: 35px;
            overflow: hidden;
            position: relative;
            background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjREREREREIiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
            background-size: contain;
        }
        .star-rating i {
            opacity: 0;
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 20%;
            z-index: 1;
            background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjRkZERjg4IiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
            background-size: contain;
        }
        .star-rating input {
            -moz-appearance: none;
            -webkit-appearance: none;
            opacity: 0;
            display: inline-block;
            width: 20%;
            height: 100%;
            margin: 0;
            padding: 0;
            z-index: 2;
            position: relative;
        }
        .star-rating input:hover + i,
        .star-rating input:checked + i {
            opacity: 1;
        }
        .star-rating i ~ i {
            width: 40%;
        }
        .star-rating i ~ i ~ i {
            width: 60%;
        }
        .star-rating i ~ i ~ i ~ i {
            width: 80%;
        }
        .star-rating i ~ i ~ i ~ i ~ i {
            width: 100%;
        }
        .progress{
            background: #f1f1f1;
            box-shadow: none;
            border-radius: 0px;
            margin:12px 0px;
         }
        .progress .progress-bar{
            background: #8EBF1D;
            height: 15px;
         }

          .rating-part-right{
            float: left;
            text-align: left;
          }
         .rating-part-right i,.review-part-right i{
            font-size: 20px;
            padding:4px 0px;
            color:#FDC91B;
            }
            .rating-part-right span{
            color:#8EBF1D;
            font-size:17px;
            padding-left: 5px;
            float: right;
            }

        .rating-part-left h1{
            font-size:48px;
            margin:0px;
            color: #8EBF1D;
            }
            .rating-part-left i{
            font-size:22px;
            padding:2px;
            color:#FDC91B;
            }
            .rating-part-left p{
            font-size:18px;
            color:#504F55;
            }


        span.scale-rating{
            margin: 5px 0 15px;
            display: inline-block;
            width: 100%;
        }
        span.scale-rating>label {
            position:relative;
            -webkit-appearance: none;
            outline:0 !important;
            border: 1px solid grey;
            height: 46px;
            margin: 0 5px 0 0;
            width: calc(10% - 7px);
            float: left;
            cursor:pointer;
        }
        span.scale-rating label {
            position:relative;
            -webkit-appearance: none;
            outline:0 !important;
            height: 46px;
            margin: 0 5px 0 0;
            width: calc(10% - 7px);
            float: left;
            cursor:pointer;
        }
        span.scale-rating input[type=radio] {
            position:absolute;
            -webkit-appearance: none;
            opacity:0;
            outline:0 !important;
            /*border-right: 1px solid grey;*/
            height:33px;
            margin: 0 5px 0 0;
            width: 100%;
            float: left;
            cursor:pointer;
            z-index:3;
        }
        span.scale-rating label:hover{
            background:#fddf8d;
        }
        span.scale-rating input[type=radio]:last-child{
            border-right:0;
        }
        span.scale-rating label input[type=radio]:checked ~ label{
            -webkit-appearance: none;
            margin: 0;
            background:#fddf8d;
        }
        span.scale-rating label:before
        {
            content:attr(value);
            top: 7px;
            width: 100%;
            position: absolute;
            left: 0;
            right: 0;
            text-align: center;
            vertical-align: middle;
            z-index:2;
        }
   </style>
    <div class="content">
        <!--  section  -->
        <section class="parallax-section hero-section hidden-section" data-scrollax-parent="true">
            <div class="bg par-elem " data-bg="{{ asset('home') }}/images/bg/10.jpg" data-scrollax="properties: { translateY: '30%' }" style="background-image: url(&quot;{{ asset('home') }}/images/bg/10.jpg&quot;); transform: translateZ(0px) translateY(29.9368%);"></div>
            <div class="overlay"></div>
                <div class="container">
                    <div class="section-title">
                        <h4>Enjoy your time in our restaurant with pleasure.</h4>
                        <h2>feedback</h2>
                        <div class="dots-separator fl-wrap"><span></span></div>
                    </div>
                </div>
                <div class="hero-section-scroll">
                    <div class="mousey">
                        <div class="scroller"></div>
                    </div>
                </div>
            <div class="brush-dec"></div>
        </section>
        <!--  section  end-->
        <!--  section  -->
        <section class="hidden-section " data-scrollax-parent="true">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-3 col-md-6">
                            <div class="contactform-wrap">
                            <div id="message"></div>
                            <form class="custom-form" action="{{ route('feedbackstore') }}" name="contactform" id="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <fieldset>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input type="text" name="name" id="name" placeholder="Your Name *" value="" required="" >
                                            <div class="text-danger"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="email" name="email" id="email" placeholder="Email Address *" value="" required>
                                            <div class="text-danger"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" name="mobile" id="mobile" placeholder="Phone *" value="" required>
                                            <div class="text-danger"></div>
                                        </div>

                                        <div class="col-md-12" style="text-align:left;margin-bottom:20px">
                                            <label>Your overall experience with us ?</label> <br>
                                            <span class="star-rating">
                                                <input type="radio" name="rating" value="1"><i></i>
                                                <input type="radio" name="rating" value="2"><i></i>
                                                <input type="radio" name="rating" value="3" selected><i></i>
                                                <input type="radio" name="rating" value="4"><i></i>
                                                <input type="radio" name="rating" value="5"><i></i>
                                            </span>
                                        </div>
                                        <div class="col-md-12">
                                            <table class="table" style="width: 100%;text-align:left">
                                                <tr>
                                                    <th></th>
                                                    <th style="padding:20px 0px;margin:20px 0px">Excellent</th>
                                                    <th>Good</th>
                                                    <th>Average</th>
                                                    <th>Poor</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Quality of Food
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="q_food" value="1" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="q_food" value="2" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="q_food" value="3" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="q_food" value="4" id="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                         Cleanliness of Restaurant
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="cleanliness" value="1" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="cleanliness" value="2" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="cleanliness" value="3" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="cleanliness" value="4" id="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Quality of Service
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="q_service" value="1" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="q_service" value="2" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="q_service" value="3" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="q_service" value="4" id="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                         Friendliness of Stuff
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="friendliness" value="1" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="friendliness" value="2" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="friendliness" value="3" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="friendliness" value="4" id="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Speed of Service
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="speed" value="1" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="speed" value="2" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="speed" value="3" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="speed" value="4" id="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                         Appearance of Staff
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="apprearance" value="1" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="apprearance" value="2" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="apprearance" value="3" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="apprearance" value="4" id="">
                                                    </td>
                                                </tr>
                                            </table>
                                            <br>
                                            <br>
                                        </div>

                                        <div class="col-sm-12">
                                            <textarea name="comments" id="comments" cols="40" rows="3" placeholder="Your comments:" required></textarea>
                                            <div class="text-danger"></div>
                                        </div>

                                            <div class="col-sm-6" style="text-align:left;">
                                                <br>
                                                <input type="file" name="image" id="image" placeholder="image"  value="">
                                                <div class="text-danger"></div>
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>
                                    <button type="submit" class="btn float-btn flat-btn color-bg" id="">Send Feedback <i class="fal fa-long-arrow-right"></i></button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="bold-separator bold-separator_dark"><span></span></div>
                <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-12 rating-part-left">
                              <h1>
                                @php
                                   $count =  $feedbacks->count() ;
                                   $sum   = $feedbacks->sum('rating');
                                    echo   number_format($averageratting = $sum  / $count,2)."/5";

                                    $total1rating = $feedbacks->where('rating',1)->sum('rating');
                                    $total2rating = $feedbacks->where('rating',2)->sum('rating');
                                    $total3rating = $feedbacks->where('rating',3)->sum('rating');
                                    $total4rating = $feedbacks->where('rating',4)->sum('rating');
                                    $total5rating = $feedbacks->where('rating',5)->sum('rating');

                                    $rate1 =  $total1rating * 100 /$sum;
                                    $rate2 =  $total2rating * 100 /$sum;
                                    $rate3 =  $total3rating * 100 /$sum;
                                    $rate4 =  $total4rating * 100 /$sum;
                                    $rate5 =  $total5rating * 100 /$sum;
                                @endphp
                              </h1>
                                @if($averageratting<=0)
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                @elseif($averageratting<=2)
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                @elseif($averageratting<=3)
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                @elseif($averageratting<=4)
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                @elseif($averageratting<=5)
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                @endif
                              <p>Average Rating</p>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="progress">
                                  <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:{{  $rate5 }}%"></div>
                              </div>
                              <div class="progress">
                                  <div class="progress-bar" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width:{{  $rate4 }}%"></div>
                              </div>
                              <div class="progress">
                                  <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:{{  $rate3 }}%"></div>
                              </div>
                              <div class="progress">
                                  <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:{{  $rate2 }}%"></div>
                              </div>
                              <div class="progress">
                                  <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:{{  $rate1 }}%"></div>
                              </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12 rating-part-right">
                              <div class="row">
                                  <div class="col-md-12">
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <span>{{ ceil($rate5) }}%</span>
                                  </div>
                                  <div class="col-md-12">
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star-o" aria-hidden="true"></i>
                                      <span>{{ ceil($rate4) }}%</span>
                                  </div>
                                  <div class="col-md-12">
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star-o" aria-hidden="true"></i>
                                      <i class="fa fa-star-o" aria-hidden="true"></i>
                                      <span>{{ ceil($rate3) }}%</span>
                                  </div>
                                  <div class="col-md-12">
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star-o" aria-hidden="true"></i>
                                      <i class="fa fa-star-o" aria-hidden="true"></i>
                                      <i class="fa fa-star-o" aria-hidden="true"></i>
                                      <span>{{ ceil($rate2) }}%</span>
                                  </div>
                                  <div class="col-md-12">
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star-o" aria-hidden="true"></i>
                                      <i class="fa fa-star-o" aria-hidden="true"></i>
                                      <i class="fa fa-star-o" aria-hidden="true"></i>
                                      <i class="fa fa-star-o" aria-hidden="true"></i>
                                      <span>{{ ceil($rate1) }}%</span>
                                  </div>
                              </div>
                        </div>
                </div>
                <div class="clearfix"></div>
                <div class="bold-separator bold-separator_dark"><span></span></div>
                <div class="row">
                      @foreach($feedbacks as $feedback)
                         <div class="col-md-12" style="text-align:left;border-bottom:1px solid rgb(235, 235, 235);margin:10px 0">
                                @if($feedback->rating==1)
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                @elseif($feedback->rating==2)
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                @elseif($feedback->rating==3)
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                @elseif($feedback->rating==4)
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                @elseif($feedback->rating==5)
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                @endif
                                <br>
                               <h3>{{ $feedback->name }}</h3>
                               <p>{{ $feedback->comments }}</p>

                                @if($feedback->image)
                                <img src="{{ asset($feedback->image) }}" alt="" style="height: 150px">
                                @endif
                         </div>

                      @endforeach
                </div>
            </div>
        </section>
        <!--  section  end-->
        <div class="brush-dec2 brush-dec_bottom"></div>
    </div>





@endsection
