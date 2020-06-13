<?php 
include '../config.php';
$product_id = $data->get('product_id');
$row = $data->get_products_for_quick_view($product_id);
?>
<?php $price_with_discount = $row->product_price - ($row->product_price * ($row->product_discount / 100)); ?>


<div class="single-product shop-quick-view-ajax clearfix">

    <div class="ajax-modal-title">
        <h2><?=$row->product_name?> </h2>
    </div>

    <div class="product modal-padding clearfix">

        <div class="col_half nobottommargin">
            <div class="product-image">
                <div class="fslider" data-pagi="false">
                    <div class="flexslider">
                        <div class="slider-wrap">
                            <?php foreach($data->get_product_for_slides($product_id) as $row_slides):?>
                                <div class="slide"><img src="../assets/uploads/<?=$row->product_brand?>/<?=$row_slides['product_images']?>" alt="Pink Printed Dress"></div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
                <?= $row->product_discount == 0 ? '' : '<div class="sale-flash">'.$row->product_discount.'% Off*</div>';?>
            </div>
        </div>
        <div class="col_half nobottommargin col_last product-desc">
            <div class="product-price"><?= $row->product_discount == 0 ? '<ins>₱'.number_format($row->product_price,2).'</ins>' : '<del>₱'.number_format($row->product_price,2).'</del> <ins>&#8369;'.number_format(sprintf("%1.2f",round($price_with_discount)),2).'</ins>';?></div>
            <div class="product-rating">
                <i class="icon-star3"></i>
                <i class="icon-star3"></i>
                <i class="icon-star3"></i>
                <i class="icon-star3"></i>
                <i class="icon-star3"></i>
            </div>
            <div class="clear"></div>
            <div class="line"></div>

            <!-- Product Single - Quantity & Cart Button
            ============================================= -->
                <?php 
                if($row->product_stocks == 0){?>
                    <button class="add-to-cart button nomargin add_to_cart_in_quick_view"><span> Not Available </span></button>
                <?php } else { ?>
                <?php } ?>

            <div class="clear"></div>
            <div class="line"></div>
            <?=$row->product_description?>
            <div class="panel panel-default product-meta ">
                <div class="panel-body">
                    <span class="posted_in">Stocks: <a><?=$row->product_stocks?></a></span>
                    <span class="posted_in">Brand: <a><?=$row->product_brand?></a></span>
                    <span class="posted_in">Category: <a><?=$row->product_category?></a></span></div>
                </div>
            </div>

    </div>

</div>
<script type="text/javascript" src="../assets/js/customize.js"></script>
<script>
// implement add or minus quantity in every click 
add_quantity_in_product_per_page_quick_view();
</script>