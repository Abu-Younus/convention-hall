<head>
    <title>Find Convention Hall</title>
    <!--/tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Elite Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--//tags -->
    <link href="{{ asset('/') }}front-end/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('/') }}front-end/css/flexslider.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}front-end/css/jquery-ui.css">
    <link href="{{ asset('/') }}front-end/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('/') }}front-end/css/font-awesome.css" rel="stylesheet">
    <link href="{{ asset('/') }}front-end/css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
    <style type="text/css">
            #myUL {
                /* Remove default list styling */
                list-style-type: none;
                padding: 0;
                margin: 0;
                }

                #myUL li a {
                    margin-top: -1px; /* Prevent double borders */
                    background-color: #ffffff; /* Grey background color */
                    padding: 12px; /* Add some padding */
                    text-decoration: none; /* Remove default text underline */
                    font-size: 18px; /* Increase the font-size */
                    color: black; /* Add a black text color */
                    display: none; /* Make it into a block element to fill the whole list */
                }

                #myUL li a:hover:not(.header) {
                    background-color: #eee; /* Add a hover effect to all links, except for headers */
                }
    </style>
    <!-- //for bootstrap working -->
</head>

<body>
<!-- header -->
<div class="header" id="home">
    <div class="container-fluid">
        <ul>
            <!-- <li><i class="fa fa-phone" aria-hidden="true"></i> Call : 01234567898</li>
            <li><i class="fa fa-envelope" aria-hidden="true"></i> <a href="">Mail</a></li> -->

            <li> <a href="/food/allfoods">All Foods </a></li>
            <li> <a href="/food/allseats">All Seats </a></li> 
            @if(Session::get('customerId'))
                <li> <a href="/customer/dashboard"><i class="fa fa-customer" aria-hidden="true"></i> Dashboard </a></li> 
                <li>
                    <a href="#" onclick="document.getElementById('customerLogoutForm').submit();">
                        <i class="fa fa-unlock-alt" aria-hidden="true"></i> Logout
                    </a>
                </li>
                {{ Form::open(['url' => '/customer/logout', 'method'=>'POST', 'id'=>'customerLogoutForm']) }}
                {{ Form::close() }}
            @else
                <li> <a href="/customer/create"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Create Account </a></li>
                <li>
                    <a href="/customer/signin">
                        <i class="fa fa-unlock-alt" aria-hidden="true"></i> Login
                    </a>
                </li>
            @endif 
        </ul>
    </div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
    <div class="header-bot_inner_wthreeinfo_header_mid">
        <div class="col-md-4 header-middle">
            {{ Form::open(['url' => '/search/result','method'=>'POST']) }}
                <input type="search" name="search" id="search" value="{{ request()->input('search') }}" placeholder="Search for Halls" required="">
                <input type="submit" value=" ">
                <ul id="myUL">
                    @foreach ($halls as $hall)
                        <li><a href="/hall/view/{{$hall->id}}">{{ $hall->hall_name }}</a></li>
                    @endforeach
                  </ul>
                <div class="clearfix"></div>
            {{ Form::close() }}
        </div>
        <!-- header-bot -->
        <div class="col-md-4 logo_agile">
            <h1><a href="{{ url('/') }}"><span>F</span>ind Convention Hall <i class="fa fa-shopping-bag top_logo_agile_bag" aria-hidden="true"></i></a></h1>
        </div>
        <!-- header-bot -->
        <div class="col-md-4 agileits-social top_content">
            <ul class="social-nav model-3d-0 footer-social w3_agile_social">
                <li class="share">Share On : </li>
                <li><a href="#" class="facebook">
                        <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                        <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
                <li><a href="#" class="twitter">
                        <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                        <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
                <li><a href="#" class="instagram">
                        <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                        <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
                <li><a href="#" class="pinterest">
                        <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                        <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //header-bot -->
<!-- banner -->
<div class="ban-top">
    <div class="container">
        <div class="top_nav_left">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav menu__list">
                            @foreach($categories as $category)
                            <li class="active menu__item menu__item">
                                <a class="menu__link" href="/category/hall/{{$category->id}}">{{ $category->category_name }}
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="pull-right">
            <div class="wthreecartaits wthreecartaits2 cart cart box_1">
                <a href="/cart/show">
                    <input type="hidden" name="cmd" value="_cart">
                    <input type="hidden" name="display" value="1">
                    <button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
                </a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //banner-top -->
<!-- Modal1 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body modal-body-sub_agile">
                <div class="col-md-8 modal_body_left modal_body_left1">
                    <h3 class="agileinfo_sign">Sign In <span>Now</span></h3>
                    <form action="#" method="post">
                        <div class="styled-input agile-styled-input-top">
                            <input type="text" name="Name" required="">
                            <label>Name</label>
                            <span></span>
                        </div>
                        <div class="styled-input">
                            <input type="email" name="Email" required="">
                            <label>Email</label>
                            <span></span>
                        </div>
                        <input type="submit" value="Sign In">
                    </form>
                    <ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
                        <li><a href="#" class="facebook">
                                <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                                <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
                        <li><a href="#" class="twitter">
                                <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                                <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
                        <li><a href="#" class="instagram">
                                <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
                        <li><a href="#" class="pinterest">
                                <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                                <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
                    </ul>
                    <div class="clearfix"></div>
                    <p><a href="#" data-toggle="modal" data-target="#myModal2" > Don't have an account?</a></p>

                </div>
                <div class="col-md-4 modal_body_right modal_body_right1">
                    <img src="{{ asset('/') }}front-end/images/log_pic.jpg" alt=" "/>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>
<!-- //Modal1 -->
<!-- Modal2 -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body modal-body-sub_agile">
                <div class="col-md-8 modal_body_left modal_body_left1">
                    <h3 class="agileinfo_sign">Sign Up <span>Now</span></h3>
                    <form action="#" method="post">
                        <div class="styled-input agile-styled-input-top">
                            <input type="text" name="Name" required="">
                            <label>Name</label>
                            <span></span>
                        </div>
                        <div class="styled-input">
                            <input type="email" name="Email" required="">
                            <label>Email</label>
                            <span></span>
                        </div>
                        <div class="styled-input">
                            <input type="password" name="password" required="">
                            <label>Password</label>
                            <span></span>
                        </div>
                        <div class="styled-input">
                            <input type="password" name="Confirm Password" required="">
                            <label>Confirm Password</label>
                            <span></span>
                        </div>
                        <input type="submit" value="Sign Up">
                    </form>
                    <ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
                        <li><a href="#" class="facebook">
                                <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                                <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
                        <li><a href="#" class="twitter">
                                <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                                <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
                        <li><a href="#" class="instagram">
                                <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
                        <li><a href="#" class="pinterest">
                                <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                                <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
                    </ul>
                    <div class="clearfix"></div>
                    <p><a href="#">By clicking register, I agree to your terms</a></p>

                </div>
                <div class="col-md-4 modal_body_right modal_body_right1">
                    <img src="{{ asset('/') }}front-end/images/log_pic.jpg" alt=" "/>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>
<!-- //Modal2 -->

<script>
    var searchInput = document.getElementById('search');
    searchInput.onkeyup = function() {
        var filter, ul, li, a, i, txtValue;
        filter = searchInput.value.toUpperCase();
        ul = document.getElementById("myUL");
        li = ul.getElementsByTagName('li');
        // Loop through all list items, and hide those who don't match the search query
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }
</script>

</body>
