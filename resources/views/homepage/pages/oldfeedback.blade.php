@extends('homepage.layouts.app')
@section('title','Feedback')
@section('content')

    <style>
        .feedback{
            width: 100%;
            max-width: 780px;
            background: #fff;
            margin: 0 auto;
            padding: 30px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            background: #ffff001f;

        }
        .survey-hr{
            margin:10px 0;
            border: .5px solid #ddd;
        }
        .star-rating {
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
        .choice {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            text-align: center;
            padding: 20px;
            display: block;
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

        .reviewbox{
            font-family: 'open_sansregular', Arial, Helvetica, sans-serif;
            color: #151515;
            list-style: none;
            text-align: left;
            background-color: #f6fff5;
            margin: 0 0 15px 0;
            border: #dcdcdc 1px solid;
            padding: 25px 20px 25px 20px;
            outline: none;
            text-decoration: none;
        }




        /* new reviwes */

        .main-section{
            background-color:#fff;
            padding:30px 15px;
            }
            .rating-part-left h1{
            font-size:75px;
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
            .progress{
            background: #f1f1f1;
            box-shadow: none;
            border-radius: 0px;
            margin:7px 0px;
            }
            .progress .progress-bar{
            background: #8EBF1D;
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
            }
            .review-section{
            padding: 0px 15px;
            }
            .review-part-left img{
            height:75px;
            width:75px;
            border-radius: 50%;
            border:2px solid #8EBF1D;
            }
            .review-part-left p{
            margin:0px;
            font-size:17px;
            color:#B3B5B4;
            }
            .review-part-left span{
            font-size:19px;
            }
            .review-part-left small{
            color:#B3B5B4;
            }
            .review-part-right p{
            font-size: 18px;
            color:#585858;
            }
        .feedback form input{
            box-shadow: none;
            background: none;
            border: 1px solid var(--pc);

        }
        .feedback form input:focus{
            box-shadow: none;
            border: 1px solid #FDC91B;
        }
        .feedback form  label{
            font-weight: 600;
            text-transform: capitalize;
            padding-bottom: 5px;
        }

        .feedback form textarea{


        }
        .feedback form textarea:focus{
            box-shadow: none;
            border: 1px solid #FDC91B;
        }
        .reviews-comment{
            margin: 0 auto;
        }


/* new reviwes */
    </style>

                <div class="content">

                    <section class="parallax-section hero-section hidden-section" data-scrollax-parent="true">
                        <div class="bg par-elem " data-bg="{{ asset('home') }}/images/bg/10.jpg" data-scrollax="properties: { translateY: '30%' }" style="background-image: url(&quot;{{ asset('home') }}/images/bg/10.jpg&quot;); transform: translateZ(0px) translateY(29.9368%);"></div>
                        <div class="overlay"></div>
                        <div class="container">
                            <div class="section-title">
                                <h4>Enjoy your time in our restaurant with pleasure.</h4>
                                <h2>Feedback</h2>
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
                    <section class="hidden-section big-padding" data-scrollax-parent="true">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="section-title text-align_center">

                                        <h2>Feedback</h2>
                                        <div class="dots-separator fl-wrap"><span></span></div>
                                    </div>
                                    <div class="text-block ">
                                        <div class="feedback">
                                            <p style="font-weight: 700; margin-bottom: 3px;">Dear Customer<br>
                                            <h4 style="margin-bottom: 10px; text-transform: capitalize;">Please rate your service experience for the following parameters</h4>

                                            <form class="custom-form" method="post" action="{{ route('feedbackstore') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="">Name:</label><br>
                                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                                    <div class="text-danger">
                                                    {{ $errors->first('name') }}
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Mobile Number:</label>
                                                    <input type="text" class="form-control" name="mobile">
                                                    <div class="text-danger">
                                                            {{ $errors->first('mobile') }}
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label>Your overall experience with us ?</label> <br>
                                                    <span class="star-rating">
                                                        <input type="radio" name="rating" value="1"><i></i>
                                                        <input type="radio" name="rating" value="2"><i></i>
                                                        <input type="radio" name="rating" value="3" selected><i></i>
                                                        <input type="radio" name="rating" value="4"><i></i>
                                                        <input type="radio" name="rating" value="5"><i></i>
                                                    </span>
                                                </div>
                                        </div>

                                        <div class="col-md-12 py-2">
                                            <label>Friendliness and courtesy shown to you while watter serve our food?</label>
                                            <div style="color:grey">
                                                <span style="float:left" class="text-danger">
                                                POOR
                                                </span>
                                                <span style="float:right; color:#FDC91B;">
                                                BEST
                                                </span>

                                            </div>
                                            <span class="scale-rating d-flex justify-content-between">
                                            <label value="1">
                                            <input type="radio" value="1" name="rating_number">
                                            <label style="width:100%;"></label>
                                            </label>
                                            <label value="2">
                                            <input type="radio" value="2" name="rating_number">
                                            <label style="width:100%;"></label>
                                            </label>
                                            <label value="3">
                                            <input type="radio" value="3" name="rating_number">
                                            <label style="width:100%;"></label>
                                            </label>
                                            <label value="4">
                                            <input type="radio" value="4" name="rating_number">
                                            <label style="width:100%;"></label>
                                            </label>
                                            <label value="5">
                                            <input type="radio" value="5" name="rating_number">
                                            <label style="width:100%;"></label>
                                            </label>
                                            <label value="6">
                                            <input type="radio" value="6" name="rating_number">
                                            <label style="width:100%;"></label>
                                            </label>
                                            <label value="7">
                                            <input type="radio" value="7" name="rating_number">
                                            <label style="width:100%;"></label>
                                            </label>
                                            <label value="8">
                                            <input type="radio" value="8" name="rating_number">
                                            <label style="width:100%;"></label>
                                            </label>
                                            <label value="9">
                                            <input type="radio" value="9" name="rating_number">
                                            <label style="width:100%;"></label>
                                            </label>
                                            <label value="10">
                                            <input type="radio" value="10" name="rating_number" value="10">
                                            <label style="width:100%;"></label>
                                            </label>
                                            </span>
                                        </div>


                                            <div class="col-md-12 py-2">
                                            <label for="">Your Comments:</label>

                                            <textarea cols="50" name="description" class="form-control" rows="4"></textarea>
                                                <div class="text-danger">
                                                        {{ $errors->first('description') }}
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <br>
                                                <br>
                                                <label for="">Image:</label>
                                                <input type="file" class="form-control" name="image">
                                                <br>
                                                <div class="text-danger">
                                                        {{ $errors->first('image') }}
                                                </div>
                                            </div>

                                            <div class="text-center pt-2">
                                                <input style="background:#2ca50e;color:#fff;padding:12px;border:0; font-weight: 400;" type="submit" value="Submit your Feedback">&nbsp;
                                            </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="section-dec sec-dec_top"></div>
							<div class="wave-bg" data-scrollax="properties: { translateY: '-150px' }" style="transform: translateZ(0px) translateY(-2.5788px);"></div>
                        </div>
                    </section>
                    <!--  section  end-->



        <section class="reviews-comment">
            <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-12 rating-part-left">
                              <h1>
                                @php
                                   $count =  $feedbacks->count() ;
                                   $sum   = $feedbacks->sum('rating');
                                    echo   $sum  / $count;

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
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
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
                </div>
              </div>
          </div>
        </section>




                    <div class="brush-dec2 brush-dec_bottom"></div>
                </div>





@endsection
