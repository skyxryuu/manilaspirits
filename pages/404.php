<?php include '../class/config.php';?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<!-- Stylesheets
	============================================= -->
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
    <style>#scroller {max-height: 280px; overflow: auto;background: ivory;}</style>

	<!-- Document Title
	============================================= -->
	<title>404 ERROR | Manila Spirits</title>
	<link rel="icon" href="../assets/images/logo1.png" type="image/icon" sizes="16x16">
</head>

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
                                <a href="<?= base_url('pages','home')?>" class="standard-logo" data-dark-logo="../assets/images/logo.png"><img src="../assets/images/logo.png"></a>
                                <a href="<?= base_url('pages','home')?>" class="retina-logo" data-dark-logo="../assets/images/logo.png"><img src="../assets/images/logo.png"></a>
                            </div><!-- #logo end -->
        
                            <!-- Primary Navigation
                            ============================================= -->
                            <nav id="primary-menu">
        
                                <ul>
                                    <li><a href="<?= base_url('pages','home')?>"><div>Home</div></a></li>
                                </ul>
        
                                <!-- Top Cart
                                ============================================= -->
                                <!-- Top Search
                                ============================================= -->
                            </nav><!-- #primary-menu end -->
        
                        </div>
        
                    </div>
        
                </header><!-- #header end -->

			<!-- Page Title
		============================================= -->
		<section id="page-title">
		
					<div class="container clearfix">
						<h1>Page Not Found</h1>
						<ol class="breadcrumb">
							<li><a href="home.php">Home</a></li>
							<li><a href="login.php">Login</a></li>
							<li class="active">404</li>
						</ol>
					</div>
		
				</section><!-- #page-title end -->
		
				<!-- Content
				============================================= -->
				<section id="content">
		
					<div class="content-wrap">
		
						<div class="container clearfix">
		
							<div class="col_half nobottommargin">
								<div class="error404 center">404</div>
							</div>
		
							<div class="col_half nobottommargin col_last">
		
								<div class="heading-block nobottomborder">
									<h4>Ooopps.! The Page you were looking for, couldn't be found.</h4>
									<span>Try searching for the best match or browse the links below:</span>
								</div>
		
							</div>
		
						</div>
		
					</div>
		
				</section><!-- #content end -->

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
	</script>
<?php 
if(isset($_SESSION['message'])) { ?>
<script type="text/javascript">
	$.amaran({
        'theme'     : 'colorful', 'content'   : { bgcolor: '#336699',color: '#fff',message: '<?=$_SESSION['message']?>' },
        'position'  : 'top left', 'outEffect' : 'slideBottom'
	});
</script>
<?php unset($_SESSION['message']); } ?>
</body>
</html>