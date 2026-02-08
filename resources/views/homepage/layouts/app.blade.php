<!DOCTYPE HTML>
<html lang="en">
<head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>@yield('title') - Wooden Spoon  </title>
         <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="robots" content="index, follow"/>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <!--=============== css  ===============-->
        <link type="text/css" rel="stylesheet" href="{{ asset('home') }}/css/reset.css">
        <link type="text/css" rel="stylesheet" href="{{ asset('home') }}/css/plugins.css">
        <link type="text/css" rel="stylesheet" href="{{ asset('home') }}/css/style.css">
        <link type="text/css" rel="stylesheet" href="{{ asset('home') }}/css/color.css">
        <!--=============== favicons ===============-->
        <link rel="shortcut icon" href="{{ asset('home') }}/images/logo.png">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" /
    </head>
    <body>
        <!-- lodaer  -->
        {{-- <div class="loader-wrap">
            <div class="loader-item">
                <div class="cd-loader-layer" data-frame="25">
                    <div class="loader-layer"></div>
                </div>
                <span class="loader"></span>
            </div>
        </div> --}}
        <!-- loader end  -->
        <!-- main start  -->
        <div id="main">
            <!-- header  -->
            <header class="main-header">
                <!-- header-top  -->
                <div class="header-top">
                    <div class="container">
                        <div class="lang-wrap"><a href="#" class="act-lang">En</a><span>/</span><a href="#">Bn</a></div>
                        <div class="header-top_contacts"><a href="#"><span>Call now:</span> +8801847-091017, +8801847421166</a><a href="#"><span>Write :</span>  info@woodenspoonbd.com</a></div>
                    </div>
                </div>
                <!--header-top end -->
                <!-- header-inner -->
                <div class="header-inner  fl-wrap">
                    <div class="container">
                        <div class="header-container fl-wrap">
                            <a href="{{ route('homepage') }}" class="logo-holder"><img src="{{ asset('home') }}/images/logo.png" alt=""></a>
                            {{-- <div class="show-reserv_button show-rb"><span>Reservation</span> <i class="fal fa-bookmark"></i></div> --}}

                            <div class="show-cart sc_btn htact">
                                <i class="fal fa-shopping-bag"></i>
                                <span class="show-cart_count cart_count_number">
                                </span>
                                <span class="header-tooltip">Your Cart</span>
                            </div>

                            <!-- nav-button-wrap-->
                            <div class="nav-button-wrap">
                                <div class="nav-button">
                                    <span></span><span></span><span></span>
                                </div>
                            </div>
                            <!-- nav-button-wrap end-->
                            <!--  navigation -->
                            <div class="nav-holder main-menu">
                                <nav>
                                    <ul>
                                        <li><a href="{{ route('homepage') }}">Home </a></li>
                                        <li><a href="{{ route('menu',['woodenspoon'])  }}">Wooden Spoon Menu</a></li>
                                        <li><a href="{{ route('menu',['deshibites'])  }}">Deshi Bites Menu</a></li>
                                        <li><a href="{{ route('about') }}">About</a></li>
                                        <li><a href="{{ route('contact') }}">Contact</a></li>

                                        @if(Auth::check())
                                            @if(Auth::user()->is_admin=='admin')
                                            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                            @elseif(Auth::user()->is_admin=='user')
                                            <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                                            @endif
                                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();"> Logout </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                        @else
                                        <li><a href="{{ route('user.login') }}">Login</a></li>
                                        @endif

                                    </ul>
                                </nav>
                            </div>
                            <!-- navigation  end -->
                            <!-- header-cart_wrap  -->
                            <div class="header-cart_wrap novis_cart">




                            </div>
                            <!-- header-cart_wrap end  -->
                        </div>
                    </div>
                </div>
                <!-- header-inner end  -->
            </header>
            <!--header end -->
            <!-- wrapper  -->
            <div id="wrapper">



                @yield('content')



                <!-- footer -->
                <div class="height-emulator fl-wrap"></div>
                <footer class="fl-wrap dark-bg fixed-footer">
                    <div class="container">

                        <!-- footer-widget-wrap -->
                        <div class="footer-widget-wrap fl-wrap">
                            <div class="row">
                                <!-- footer-widget -->
                                <div class="col-md-2">
                                    <div class="footer-widget">
                                        <div class="footer-widget-title">About us</div>
                                        <div class="footer-widget-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eaque ipsa quae ab illo inventore veritatis et quasi architecto. </p>
                                            <a href="{{ route('about') }}" class="footer-widget-content-link">Read more</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- footer-widget  end-->
                                <!-- footer-widget -->
                                <div class="col-md-4">
                                    <div class="footer-widget">
                                        <div class="footer-widget-title">Contact info  </div>
                                        <div class="footer-widget-content">
                                            <div class="footer-contacts footer-box fl-wrap">
                                                <ul>
                                                    <li><span>Call :</span><a href="#">+8801847-091017 , +8801847421166 </a></li>
                                                    <li><span>Write  :</span><a href="#">info@woodenspoonbd.com</a></li>
                                                    <li><span>Find us : </span><a href="#">304/7 NSU Main Campus Rd, Dhaka 1229</a></li>
                                                </ul>
                                            </div>


                                        </div>
                                        <a href="{{ route('blogs') }}" class="footer-widget-content-link" style="float: left;margin-right:20px"> Blogs </a> <br>
                                        <a href="{{ route('feedback') }}" class="footer-widget-content-link" style="float: left"> Feedback </a>
                                    </div>
                                </div>
                                <!-- footer-widget  end-->
                                <!-- footer-widget -->
                                <div class="col-md-3">
                                    <div class="footer-widget">
                                        <div class="footer-widget-title">Subscribe</div>
                                        <div class="footer-widget-content">
                                            <div class="subcribe-form fl-wrap">
                                                <p>Want to be notified when we launch a new template or an udpate. Just sign up and we'll send you a notification by email.</p>
                                                <form id="subscribe" class="fl-wrap">
                                                    <input class="enteremail" name="email" id="subscribe-email" placeholder="Your Email" spellcheck="false" type="text">
                                                    <button type="submit" id="subscribe-button" class="subscribe-button color-bg">Send </button>
                                                    <label for="subscribe-email" class="subscribe-message"></label>
                                                </form>
                                            </div>
                                            <a href="https://www.facebook.com/WoodenSpoonHomebakery/" class="footer-widget-content-link" style="float: left;margin-right:20px">Facebook</a>
                                            <a href="" class="footer-widget-content-link" style="float: left;margin-right:20px">Youtube</a>
                                            <a href="https://instagram.com/woodenspoon_bistro_patisserie?igshid=YmMyMTA2M2Y=" class="footer-widget-content-link" >Instagram</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="footer-widget">
                                        <div class="footer-widget-title">Opening Hours</div>
                                        <div class="footer-widget-content">
                                              <div class="column-text">
                                                <div class="work-time fl-wrap">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <h3>Sunday to Thursday</h3>
                                                            <div class="hours">
                                                                09:00 AM<br>
                                                                01:00 AM
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <h3>Friday to Saturday</h3>
                                                            <div class="hours">
                                                                02:00 PM<br>
                                                                01:00 AM
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- footer-widget  end-->
                            </div>
                        </div>
                        <!-- footer-widget-wrap end-->
                        <div class="footer-bottom fl-wrap">
                            <div class="copyright"> Wooden Spoon 2022 . All rights reserved. </div>
                            <div class="to-top"><span>Back To Top </span><i class="fal fa-angle-double-up"></i></div>
                        </div>
                    </div>
                </footer>
                <!-- footer end-->
            </div>


            <!-- wrapper end -->

            <!-- reservation-modal-wrap-->
            @include('homepage.components.reservation')
            <!-- reservation-modal-wrap end-->



            <!-- cursor-->
            <div class="element">
                <div class="element-item"></div>
            </div>
            <!-- cursor end-->
        </div>
        <!-- Main end -->
        <!--=============== scripts  ===============-->
        <script src="{{ asset('home') }}/js/jquery.min.js"></script>
        <script src="{{ asset('home') }}/js/plugins.js"></script>
        <script src="{{ asset('home') }}/js/scripts.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.0.8/sweetalert.min.js" integrity="sha512-fcAEThGLlyTKt+mmcRprds9PxumnuZukst32LxyzgU8ga0jKzlHCHawCo+eynUAgrHpuUe1QGSHe6X6cXYcZAg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

         <!-----for Ajax handeling----->
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
        <!-----for Ajax handeling----->


        <script>


              $(document).ready(function() {
                showcartcount();
                showcarthover();
                showcarttable();
                showcartsummery();
              });

                  // cart script


              function showcartcount()
                {
                    $.ajax({
                        url: `{{ route('food.cart.count.ajax') }}`,
                        success: function(data) {
                            $('.cart_count_number').html(data);
                        }
                    })
                }
              function showcarthover()
                {
                    $.ajax({
                        url: `{{ route('food.cart.hover.ajax') }}`,
                        success: function(data) {
                            $('.novis_cart').html(data);
                        }
                    })
                }


              function showcarttable()
                {
                    $.ajax({
                        url: `{{ route('food.cartable.ajax') }}`,
                        success: function(data) {
                            $('.carttable').html(data);
                        }
                    })
                }
              function showcartsummery()
                {
                    $.ajax({
                        url: `{{ route('food.cartsummery.ajax') }}`,
                        success: function(data) {
                            $('.cart-totals').html(data);
                        }
                    })
                }




                $('.add_to_cart').on('click', function() {
                    var food_id = $(this).data('id');
                    var url = "{{ route('food.add_to_cart') }}";
                    $.ajax({
                        url: url,
                        data: {
                            food_id: food_id,
                        },
                        type: "post",
                        success: function(data){
                                  showcartcount();
                                  showcarthover();
                            if ($.isEmptyObject(data.error)) {
                                toastr.success(data.success, 'Food add your Cart', {
                                    timeOut: 3000
                                });
                            } else {
                                toastr.error(data.error, {
                                    timeOut: 3000
                                });
                            }
                        },
                        error: function(data) {
                            console.log('Error:', data);
                        },
                    });
                });

                 // remove cart
                $(document).on('click','.removecart',function(e){
                    e.preventDefault();
                    const rowId = $(this).data("id")
                    const url =  "{{ route('food.remove_cart') }}"
                    $.ajax({
                        type: "post",
                        url: url,
                        data: {
                            rowId
                        },
                        success: function(data){
                            console.log(data)
                                showcartcount();
                                showcarthover();
                                showcarttable();
                                showcartsummery();
                        },
                        error: function(data) {
                            console.log('Error:', data);
                        }
                    });
                });







        </script>



        <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
            case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
            case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
            case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
            case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
            }
        @endif

        $(document).on('click', '#delete', function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            Swal.fire({
                title: 'Are you sure?',
                text: "Delete this data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    window.location.href = link;
                    Swal.fire(
                        'Deleted!',
                        'Data has been deleted.',
                        'success'
                    )
                }
            })
        });



           // increment cart
        $(document).on('click','.incrementCart',function(e){
           e.preventDefault();
           var rowId = $(this).data('id');
           const url = "{{route('food.incrementCart')}}";
           $.ajax({
                type: "post",
                url: url,
                data: {
                    rowId
                },
                success: function(data){
                    showcartcount();
                    showcarthover();
                    showcarttable();
                    showcartsummery();
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });

        // decrement cart
        $(document).on('click',".decrementCart",function(e){
            e.preventDefault();
            var rowId = $(this).data('id');
            const url = "{{route('food.decrementCart')}}";
            $.ajax({
                type: "post",
                url: url,
                data: {
                    rowId
                },
                success: function(data){
                    showcartcount();
                    showcarthover();
                    showcarttable();
                    showcartsummery();
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });





    </script>

    <script>
        // the selector will match all input controls of type :checkbox
        // and attach a click event handler
        $("input:checkbox").on('click', function() {
        // in the handler, 'this' refers to the box clicked on
        var $box = $(this);
        if ($box.is(":checked")) {
            // the name of the box is retrieved using the .attr() method
            // as it is assumed and expected to be immutable
            var group = "input:checkbox[name='" + $box.attr("name") + "']";
            // the checked state of the group/box on the other hand will change
            // and the current value is retrieved using .prop() method
            $(group).prop("checked", false);
            $box.prop("checked", true);
        } else {
            $box.prop("checked", false);
        }
        });

    </script>

    </body>
</html>
