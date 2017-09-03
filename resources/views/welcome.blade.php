<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Fervor Landing Page</title>





    <!-- Landing page css -->
    <link href="{{ ('css/landing-page.css') }}" rel="stylesheet">

</head>




<body>

@if (Route::has('login'))
    <div class="top-right links">
    @if (Auth::check())
        <!-- Navigation -->

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
                        <a class="navbar-brand" href="#">
                            <img alt="Fervor" src="/img/logo-white.png" class="nav-logo-white">
                            <img alt="Fervor" src="/img/logo-white.png" class="nav-logo">
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">

                            <li><a href="{{ url('/home') }}">Home</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            <!-- Navigation ends -->

            <!-- HEADER -->
            <div class="section-header">
                <div class="section-header-overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1 class="header-heading">Australia’s Number <br class="hidden-xs"> 1 Free Dating Site</h1>
                            <h3>100% Free to contact and chat with other members</h3>
                        </div>
                    </div>
                </div>
            </div>
            <!-- HEADER ends -->


            <div class="container truck-section">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="truck-section-heading">Join the Fervor network and see how<br class="visible-md"> we can help you</h1>
                        <br>
                        <br>
                    </div>
                    <div class="col-sm-3">
                        <h5 class="truck-heading">Meet Like-Minded Singles</h5>
                        <p>Meet like-minded singles in your area with Fervor online dating app.</p>
                        <br>
                        <h5 class="truck-heading">Find Your Match</h5>
                        <p>Fervor will find matches for you according to your preferences and your personality. Whoever suits you, can be your dream patner which you must be looking for.</p>

                    </div>
                    <div class="col-sm-6">
                        <img class="img-responsive truck-image" alt="Love image" src="/img/borderless.jpg">
                    </div>
                    <div class="col-sm-3">
                        <h5 class="truck-heading">Provide Online Introduction Services </h5>
                        <p>A variation of the online dating model emerged in the form of introduction sites, where members have to search and contact other members, who introduce them to other members whom they deem compatible.</p>
                        <br>
                        <h5 class="truck-heading">Get Rid Of Your Nervousness</h5>
                        <p>For those nervous about dating, this site puts the control in your fingertips allowing you access to thousands of profiles and the ability to chat to potential dates at the rate which works for you.</p>
                    </div>
                </div>
            </div>
            <!-- TRUCK IMAGE SECTION ends -->

            <!-- STEPS SECTION -->
            <div class="section-steps">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1 class="steps-heading">Get started with Fervor in 3 easy steps</h1>
                        </div>
                        <div class="col-sm-4">
                            <img class="step-icon" src="/img/step-1.png">
                            <h4 class="step-heading">Step 1</h4>
                            <p class="step-text">Sign up online with Fervor</p>
                        </div>
                        <div class="col-sm-4">
                            <img class="step-icon" src="/img/step-2.png">
                            <h4 class="step-heading">Step 2</h4>
                            <p class="step-text">Sign in  online with Fervor</p>
                        </div>
                        <div class="col-sm-4">
                            <img class="step-icon" src="/img/step-3.png">
                            <h4 class="step-heading">Step 3</h4>
                            <p class="step-text">Find Your Match</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- STEPS SECTION ends -->

            <!-- MAP SECTION -->
            <div class="section-map">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1>Borderless Dating</h1>
                            <p class="map-text">The world awaits. Take advantage of our international user and meet  your match across the borders<br class="visible-md visible-lg"> </p>
                            <img class="img-responsive" src="/img/map.png">
                        </div>
                    </div>
                </div>
            </div>
            <!-- MAP SECTION ends -->

            <!-- FOOTER -->
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="col-xs-6">
                                <img src="/img/logo-white.png">
                                <br>
                                <br>
                            </div>

                            <div class="col-xs-6">
                                <h5 class="footer-heading">Follow Us</h5>
                                <a target="_blank" class="social-link" href="https://www.facebook.com/"><img alt="Facebook" src="/img/fb.png"></a>
                                <a target="_blank" class="social-link" href="https://twitter.com/?lang=en"><img alt="Twitter" src="/img/twitter.png"></a>
                                <br class="visible-xs">
                                <br class="visible-xs">
                                <a target="_blank" class="social-link" href="https://www.youtube.com/"><img alt="Youtube" src="/img/youtube.png"></a>
                                <a target="_blank" class="social-link" href="https://www.instagram.com/?hl=en"><img alt="Instagram" src="/img/instagram.png"></a>
                                <br>
                                <br>
                            </div>
                            <div class="col-xs-6">
                                <h5 class="footer-heading">Company</h5>
                                <a href="#">About Us</a>
                                <a href="#">Location</a>
                                <a href="#">FAQ</a>
                                <br>
                                <br>
                            </div>
                            <div class="col-xs-6">
                                <h5 class="footer-heading">Support</h5>
                                <a href="#">Storage Tips</a>
                                <a href="#">Blog</a>
                                <a href="#">Terms of Service</a>
                                <a href="#">Privacy</a>
                                <br>
                                <br>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <h5 class="footer-heading">Contact Us</h5>
                            <form action="" method="post" enctype="text/plain">
                                <input type="text" name="name" placeholder="Name">
                                <input type="text" name="mail" placeholder="Email">
                                <textarea name="enquiry" rows="5" placeholder="Write your enquiry"></textarea>
                                <button class="contact-btn" type="submit">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- FOOTER ends -->


            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        @endif
    </div>
@endif

@if (Route::has('login'))
    <div class="links">
    @if (Auth::check())

    @else
        <!-- Navigation -->

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
                        <a class="navbar-brand" href="#">
                            <img alt="Fervor" src="/img/logo-white.png" class="nav-logo-white">
                            <img alt="Fervor" src="/img/logo-white.png" class="nav-logo">
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="{{ url('/register') }}" class="sign-up-link">Sign Up</a></li>
                            <li><a href="{{ url('/login') }}">Login</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            <!-- Navigation ends -->

            <!-- HEADER -->
            <div class="section-header">
                <div class="section-header-overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1 class="header-heading">Australia’s Number <br class="hidden-xs"> 1 Free Dating Site</h1>
                            <h3>100% Free to contact and chat with other members</h3>
                        </div>
                    </div>
                </div>
            </div>
            <!-- HEADER ends -->


            <div class="container truck-section">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="truck-section-heading">Join the Fervor network and see how<br class="visible-md"> we can help you</h1>
                        <br>
                        <br>
                    </div>
                    <div class="col-sm-3">
                        <h5 class="truck-heading">Meet Like-Minded Singles</h5>
                        <p>Meet like-minded singles in your area with Fervor online dating app.</p>
                        <br>
                        <h5 class="truck-heading">Find Your Match</h5>
                        <p>Fervor will find matches for you according to your preferences and your personality. Whoever suits you, can be your dream patner which you must be looking for.</p>

                    </div>
                    <div class="col-sm-6">
                        <img class="img-responsive truck-image" alt="Love image" src="/img/borderless.jpg">
                    </div>
                    <div class="col-sm-3">
                        <h5 class="truck-heading">Provide Online Introduction Services </h5>
                        <p>A variation of the online dating model emerged in the form of introduction sites, where members have to search and contact other members, who introduce them to other members whom they deem compatible.</p>
                        <br>
                        <h5 class="truck-heading">Get Rid Of Your Nervousness</h5>
                        <p>For those nervous about dating, this site puts the control in your fingertips allowing you access to thousands of profiles and the ability to chat to potential dates at the rate which works for you.</p>
                    </div>
                </div>
            </div>
            <!-- TRUCK IMAGE SECTION ends -->

            <!-- STEPS SECTION -->
            <div class="section-steps">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1 class="steps-heading">Get started with Fervor in 3 easy steps</h1>
                        </div>
                        <div class="col-sm-4">
                            <img class="step-icon" src="/img/step-1.png">
                            <h4 class="step-heading">Step 1</h4>
                            <p class="step-text">Sign up online with Fervor</p>
                        </div>
                        <div class="col-sm-4">
                            <img class="step-icon" src="/img/step-2.png">
                            <h4 class="step-heading">Step 2</h4>
                            <p class="step-text">Sign in  online with Fervor</p>
                        </div>
                        <div class="col-sm-4">
                            <img class="step-icon" src="/img/step-3.png">
                            <h4 class="step-heading">Step 3</h4>
                            <p class="step-text">Find Your Match</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- STEPS SECTION ends -->

            <!-- MAP SECTION -->
            <div class="section-map">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1>Borderless Dating</h1>
                            <p class="map-text">The world awaits. Take advantage of our international user and meet  your match across the borders<br class="visible-md visible-lg"> </p>
                            <img class="img-responsive" src="/img/map.png">
                        </div>
                    </div>
                </div>
            </div>
            <!-- MAP SECTION ends -->

            <!-- FOOTER -->
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="col-xs-6">
                                <img src="/img/logo-white.png">
                                <br>
                                <br>
                            </div>

                            <div class="col-xs-6">
                                <h5 class="footer-heading">Follow Us</h5>
                                <a target="_blank" class="social-link" href="https://www.facebook.com/"><img alt="Facebook" src="/img/fb.png"></a>
                                <a target="_blank" class="social-link" href="https://twitter.com/?lang=en"><img alt="Twitter" src="/img/twitter.png"></a>
                                <br class="visible-xs">
                                <br class="visible-xs">
                                <a target="_blank" class="social-link" href="https://www.youtube.com/"><img alt="Youtube" src="/img/youtube.png"></a>
                                <a target="_blank" class="social-link" href="https://www.instagram.com/?hl=en"><img alt="Instagram" src="/img/instagram.png"></a>
                                <br>
                                <br>
                            </div>
                            <div class="col-xs-6">
                                <h5 class="footer-heading">Company</h5>
                                <a href="#">About Us</a>
                                <a href="#">Location</a>
                                <a href="#">FAQ</a>
                                <br>
                                <br>
                            </div>
                            <div class="col-xs-6">
                                <h5 class="footer-heading">Support</h5>
                                <a href="#">Storage Tips</a>
                                <a href="#">Blog</a>
                                <a href="#">Terms of Service</a>
                                <a href="#">Privacy</a>
                                <br>
                                <br>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <h5 class="footer-heading">Contact Us</h5>
                            <form action="" method="post" enctype="text/plain">
                                <input type="text" name="name" placeholder="Name">
                                <input type="text" name="mail" placeholder="Email">
                                <textarea name="enquiry" rows="5" placeholder="Write your enquiry"></textarea>
                                <button class="contact-btn" type="submit">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- FOOTER ends -->


            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>




        @endif
    </div>
@endif


</body>
</html>