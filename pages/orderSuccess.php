<?php include '../class/config.php';?>
<?php
if(isset($_SESSION['id'])) {
    redirect('pages','my-account');
}

?>

            <!DOCTYPE html>
            <html dir="ltr" lang="en-US">
            <head>
                <meta http-equiv="content-type" content="text/html; charset=utf-8" />       
         
                <script src="sweetalert2.all.min.js"></script>

                <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
                <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
                <link rel="stylesheet" href="../assets/css/bootstrap.css" type="text/css" />
                <link rel="stylesheet" href="../assets/style.css" type="text/css" />
                <link rel="stylesheet" href="../assets/css/dark.css" type="text/css" />
                <link rel="stylesheet" href="../assets/css/font-icons.css" type="text/css" />
                <link rel="stylesheet" href="../assets/css/animate.css" type="text/css" />

                <link rel="stylesheet" href="../assets/css/magnific-popup.css" type="text/css" />
                <!-- amaran notification  -->
                <link rel="stylesheet" href="../assets/css/amaran.min.css" type="text/css" />
                <link rel="stylesheet" href="../assets/css/animate.min.css" type="text/css" />

                <link rel="stylesheet" href="../assets/css/responsive.css" type="text/css" />
                <meta name="viewport" content="width=device-width, initial-scale=1" />

                <link rel="stylesheet" href="sweetalert.css" type="text/css" />

               <link rel="icon" href="../assets/images/logo1.png" type="image/icon" sizes="16x16">
              
                <style>
                    #scroller {
                        max-height: 280px;
                        overflow: auto;
                        background: ivory;
                    }

                </style>

                <!-- Document Title
	============================================= -->
                <title>Thank you - Manila Spirits</title>

            </head>

            <body ng-app="app" ng-controller="mainController" class="stretched">

                <!-- Document Wrapper
	============================================= -->
                <div id="wrapper" class="clearfix">

                    <!-- Header
		============================================= -->
                    <header id="header" class="full-header">

                        <div id="header-wrap">

                            <div class="container clearfix">

                                <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                                <!-- Logo
                            ============================================= -->
                                <div id="logo">
                                    <a href="<?= base_url('pages','clienthome')?>" class="standard-logo" data-dark-logo="../assets/images/logo.png"><img src="../assets/images/logo.png"></a>
                                    <a href="<?= base_url('pages','clienthome')?>" class="retina-logo" data-dark-logo="../assets/images/logo.png"><img src="../assets/images/logo.png"></a>
                                </div>
                                <!-- #logo end -->

                                <!-- Primary Navigation
                            ============================================= -->
                                <nav id="primary-menu">

                                    <ul>
                                        <li>
                                            <a href="<?= base_url('pages','clienthome')?>">
                                                <div>Home</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('pages','login')?>">
                                                <div>Logout</div>
                                            </a>
                                        </li>
                                    </ul>

                                    <!-- Top Cart
                                ============================================= -->
                                    <div id="top-cart">
                                        <a href="#" id="top-cart-trigger">
                                            <i class="icon-shopping-cart"></i>
                                            <span id="show_cart_counts"></span>
                                        </a>
                                        <div id="show_cart_contents"></div>
                                    </div>
                                    <!-- #top-cart end -->

                                    <!-- Top Search
                                ============================================= -->
                                    <!-- #top-search end -->

                                </nav>
                                <!-- #primary-menu end -->

                            </div>

                        </div>

                    </header>
                    <!-- #header end -->


                    <!-- Content
                    ============================================= -->
                    <section id="content">

                        <div class="content-wrap">

                            <div class="container clearfix">

                                <div class="col_full nobottommargin">
                                    <h1>Your order was successfully sent!</h1>
                                    <h3>Thankyou for choosing Manila Spirits!</h3>
                                    <!-- <h4 style="color:#39C1CD;">Kindly check your email for the reference no details.</h4> -->
                                   <img src="check.jpg" height="100" width="106">
                                   <br>
                                    <a href="clienthome.php" class="button button-blue nomargin" style="float:right;">BACK TO HOME</a>

                                </div>

                            </div>

                        </div>

                    </section>
                    <!-- #content end -->

                </div>
                <!-- #wrapper end -->

                <!-- Go To Top
	            ============================================= -->
                <div id="gotoTop" class="icon-angle-up"></div>

                <!-- External JavaScripts
	            ============================================= -->
                <script type="text/javascript" src="../assets/js/jquery.js"></script>
                <script type="text/javascript" src="../assets/js/plugins.js"></script>

                <!-- Footer Scripts
	            ============================================= -->
                <script type="text/javascript" src="../assets/js/ajax_functions.js"></script>
                <script type="text/javascript" src="../assets/js/customize.js"></script>
                <script type="text/javascript" src="../assets/js/functions.js"></script>
                <!-- amaran notification  -->
                <script type="text/javascript" src="../assets/js/jquery.amaran.min.js"></script>
                <!-- form validation using angularjs -->
                <script src="../assets/angular/1.4.8.angular.min.js"></script>
                <script src="../assets/angular/1.4.2.angular.min.js"></script>
                <script src="../assets/angular/passwordmatch.js"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
                <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

                <script type="text/javascript">
                    
                    // add quantity in quick view and product per page 
                    add_quantity_in_product_per_page_quick_view();
                    // show cart counts when ajax triggered 
                    show_cart_counts();
                    // show cart contents when ajax triggered
                    show_cart_contents();
                    var app = angular.module('app', ['ngMessages']);
                    app.controller('mainController', function($scope) {});
                    $( document ).ready(function() {

                        $('#timeAppointment').flatpickr({enableTime: true,noCalendar: true,dateFormat: "h:i K"});//Actual Deliv
                                $('#dateAppointment').flatpickr({dateFormat: 'Y-m-d' , minDate: "today"});
                        
                    } );


                </script>
            </body>

            </html>
