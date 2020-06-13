<?php include '../class/config.php';
if(empty($_SESSION['userId'])) {header('location:login.php');}
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
                                <a href="<?= base_url('pages','home')?>" class="standard-logo" data-dark-logo="../assets/images/logo.png"><img src="../assets/images/logo.png"></a>
                                <a href="<?= base_url('pages','home')?>" class="retina-logo" data-dark-logo="../assets/images/logo.png"><img src="../assets/images/logo.png"></a>
                            </div><!-- #logo end -->
        
                            <!-- Primary Navigation
                            ============================================= -->
                            <nav id="primary-menu">
        
						     	<ul>
									<li class="current"><a href="<?= base_url('pages','clienthome')?>"><div>Home</div></a></li>
                                   <li><a  href="login.php"><div>Logout</div></a></li>
                                    
                                </ul>
                              
                                <!-- <div id="top-cart">
                                    <a href="#" id="top-cart-trigger">
                                        <i class="icon-shopping-cart"></i>
                                        <span id="show_cart_counts"></span>
                                    </a>
                                    <div id="show_cart_contents"></div>
                                </div> -->
                          
                            </nav><!-- #primary-menu end -->
        
                        </div>
        
                    </div>
        
                </header><!-- #header end -->

		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
			
				<h1>Manila Spirits is dedicated to good drinking and great living. </h1>
				<span>We create entertaining and educational content and experiences that inspire good drinking and great living</span>
				<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li class="active">Gallery</li>
				</ol>
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">
					<!-- Post Content
					============================================= -->
					<div class="postcontent nobottommargin col_last">
					<input type="text" id="searchProduct" class="form-control" placeholder="Search Product" style="margin-bottom:30px;">

						<!-- Shop ============================================= -->
					<div id="shop" class="shop product-3 grid-container clearfix" data-layout="fitRows">

					<?php 
					foreach($data->get_products() as $row_products):?>
					<?php $price_with_discount = $row_products['product_price'] - ($row_products['product_price'] * ($row_products['product_discount'] / 100)); ?>
					<div class="product <?=$row_products['product_brands_id']?> clearfix">
						<div class="product-image">
						
							<?php foreach($data->get_image_by_id($row_products['product_id']) as $row_image):?>
							<a href="<?=base_url('pages','products?id='.$row_products['product_id'])?>"><img style="width:280px;height:250px" src="../assets/uploads/<?=$row_products['product_brand']?>/<?=$row_image['product_images']?>" alt="<?=$row_products['product_name']?>"></a>
							<?php endforeach;?>
							<?= $row_products['product_discount'] == 0 ? '' : '<div class="sale-flash">'.$row_products['product_discount'].'% Off*</div>';?>
							<div class="product-overlay">
								<input type="hidden" id="quantity<?=$row_products['product_id']?>" value=1 >
								<?php 
								if($row_products['product_stocks'] == 0){?>
									<a style="cursor:pointer" class="add-to-cart"><span> Not Available </span></a>
								<?php } else { ?>
									<a style="cursor:pointer" id="add_to_cart<?=$row_products['product_id']?>" onclick="add_to_cart('<?=$row_products['product_id']?>','Add',1)" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Purchase </span></a>
								<?php } ?>
								<a href="../class/includes/quick-view.php?product_id=<?=$row_products['product_id']?>" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
							</div>
						</div>
						<div class="product-desc">
							<div class="product-title"><h3><a href="<?=base_url('pages','products?id='.$row_products['product_id'])?>"><?= $row_products['product_name']?></a></h3></div>
							<div class="product-price"><?= $row_products['product_discount'] == 0 ? '<ins>&#8369;'.number_format($row_products['product_price'],2).'</ins>' : '<del>&#8369;'.number_format($row_products['product_price'],2).'</del> <ins>&#8369;'.number_format(sprintf("%1.2f",round($price_with_discount)),2).'</ins>';?></div>
							<div class="product-rating">
								<span>Brand:</span> <?=$row_products['product_brand']?>
							</div>
							
						</div>
					</div>
					<?php endforeach;?>

				</div><!-- #shop end -->

					</div><!-- .postcontent end -->

					<!-- Sidebar
					============================================= -->
					<div class="sidebar nobottommargin">
						<div class="sidebar-widgets-wrap">

							<div class="widget widget-filter-links clearfix">

								<h4>Select Brand</h4>
								<ul class="custom-filter" data-container="#shop" data-active-class="active-filter">
									<li class="widget-filter-reset active-filter"><a href="#" data-filter="*">Clear</a></li>
									<?php foreach($data->get_product_brand() as $cat_row): ?>
										<li><a href="#" data-filter=".<?=$cat_row['product_brands_id']?>"><?=$cat_row['product_brand']?></a></li>
									<?php endforeach;?>
								</ul>

							</div>

							<div class="widget widget-filter-links clearfix">

								<h4>Sort By</h4>
								<ul class="shop-sorting">
									<li class="widget-filter-reset active-filter"><a href="#" data-sort-by="original-order">Clear</a></li>
									<li><a href="#" data-sort-by="name">Name</a></li>
									<li><a href="#" data-sort-by="price_lh">Price: Low to High</a></li>
									<li><a href="#" data-sort-by="price_hl">Price: High to Low</a></li>
								</ul>

							</div>

						</div>
					</div><!-- .sidebar end -->

					

				</div>

            </div>
		</section><!-- #content end -->
	</div><!-- #wrapper end -->
	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>
	<!-- External JavaScripts
	============================================= -->
	<script type="text/javascript" src="<?= base_url('assets/js/','jquery.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/','plugins.js')?>"></script>
	<!-- Footer Scripts
	============================================= -->
	<script type="text/javascript" src="<?= base_url('assets/js/','ajax_functions.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/','customize.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/','functions.js')?>"></script>
	<!-- amaran notification  -->
	<script type="text/javascript" src="<?= base_url('assets/js/','jquery.amaran.min.js')?>"></script>
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
<script>
	function goToCheckOut()
	{	
		window.location.href = 'order.php';
	}
		jQuery(document).ready( function($){

			var qsRegex;

			var $quicksearch = $('#searchProduct').keyup( debounce( function() {
				qsRegex = new RegExp( $quicksearch.val(), 'gi' );
				$grid.isotope();
			}, 100 ) );

			var $grid = $('#shop').isotope({
				itemSelector: '.product',
				layoutMode: 'fitRows',
				filter: function() {
					return qsRegex ? $(this).text().match( qsRegex ) : true;
				}
			});

		

			function debounce( fn, threshold ) {
				var timeout;
				threshold = threshold || 100;
				return function debounced() {
					clearTimeout( timeout );
					var args = arguments;
					var _this = this;
					function delayed() {
					fn.apply( _this, args );
					}
					timeout = setTimeout( delayed, threshold );
				};
			}

			let userId = localStorage.getItem("userId");

			if(userId == null || userId == ""){
				window.location.href = 'login.php';
			}


			$('#shop').isotope({
				transitionDuration: '0.65s',
				getSortData: {
					name: '.product-title',
					price_lh: function( itemElem ) {
						if( $(itemElem).find('.product-price').find('ins').length > 0 ) {
							var price = $(itemElem).find('.product-price ins').text();
						} else {
							var price = $(itemElem).find('.product-price').text();
						}

						priceNum = price.split("₱");

						return parseFloat( priceNum[1] );
					},
					price_hl: function( itemElem ) {
						if( $(itemElem).find('.product-price').find('ins').length > 0 ) {
							var price = $(itemElem).find('.product-price ins').text();
						} else {
							var price = $(itemElem).find('.product-price').text();
						}

						priceNum = price.split("₱");

						return parseFloat( priceNum[1] );
					}
				},
				sortAscending: {
					name: true,
					price_lh: true,
					price_hl: false
				}
			});

			$('.custom-filter:not(.no-count)').children('li:not(.widget-filter-reset)').each( function(){
				var element = $(this),
					elementFilter = element.children('a').attr('data-filter'),
					elementFilterContainer = element.parents('.custom-filter').attr('data-container');

				elementFilterCount = Number( jQuery(elementFilterContainer).find( elementFilter ).length );

				element.append('<span>'+ elementFilterCount +'</span>');

			});

			$('.shop-sorting li').click( function() {
				$('.shop-sorting').find('li').removeClass( 'active-filter' );
				$(this).addClass( 'active-filter' );
				var sortByValue = $(this).find('a').attr('data-sort-by');
				$('#shop').isotope({ sortBy: sortByValue });
				return false;
			});
		});
	</script>
</body>
</html>