<?php 
include '../class/config.php';
if(empty($_SESSION['item_cart'])) {header('location:index.php');}
?>
<?php include "headers.php"; ?>

<body class="stretched">

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
                                <a href="index.php" class="standard-logo" data-dark-logo="../assets/images/logo.png"><img src="../assets/images/logo.png"></a>
                                <a href="index.php" class="retina-logo" data-dark-logo="../assets/images/logo.png"><img src="../assets/images/logo.png"></a>
                            </div><!-- #logo end -->
        
                            <!-- Primary Navigation
                            ============================================= -->
                            <nav id="primary-menu">
        
                                <ul>
                                    <li class="current"><a href="clienthome.php"><div>Home</div></a></li>
                                      <li><a href="login.php"><div>Logout</div></a></li>
                                </ul>
        
                                <!-- Top Cart
                                ============================================= -->
                                <div id="top-cart">
                                    <a href="#" id="top-cart-trigger">
                                        <i class="icon-shopping-cart"></i>
                                        <span id="show_cart_counts"></span>
                                    </a>
                                    <div id="show_cart_contents"></div>
                                </div><!-- #top-cart end -->
        
                                <!-- Top Search-->
                                
                            </nav><!-- #primary-menu end -->
        
                        </div>
        
                    </div>
        
                </header><!-- #header end -->

		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Review your orders</h1>
				<ol class="breadcrumb">
					<li><a href="clienthome.php">Home</a></li>
                    <li class="active">Cart</li>
				</ol>
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">
                
            <div class="content-wrap">

                <div class="container clearfix">

                    <div class="table-responsive bottommargin">

                        <table class="table cart">
                            <thead>
                                <tr>
                                    <th class="cart-product-remove">&nbsp;</th>
                                    <th class="cart-product-thumbnail">&nbsp;</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="cart-product-price">Unit Price</th>
                                    <th class="cart-product-quantity">Quantity</th>
                                    <th class="cart-product-subtotal">Total</th>
                                </tr>
                            </thead>
                            <tbody id="show_cart_content_in_cart_page"></tbody>

                        </table>

                </div>

            <div class="row clearfix">
               

                <div class="col-md-6 clearfix">
                    <div class="table-responsive">
                        <h4>Cart Totals</h4>

                        <table class="table cart">
                            <tbody class="lead"></tbody>        
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
        

	</div><!-- #wrapper end -->

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
    <script type="text/javascript">
    // show cart counts when ajax triggered 
    show_cart_counts()
    // show cart contents when ajax triggered
    show_cart_contents()
    // show cart contents in cart page
    show_cart_content_in_cart_page();
    // show cart total
    show_cart_total();
   </script>
</body>
</html>