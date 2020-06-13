<div class="top-cart-content" >
    <div class="top-cart-title">
        <h4>Shopping Cart</h4>
    </div>
    <div id="scroller">
        <div class="top-cart-items" >
        <?php 
        if(!isset($_SESSION['item_cart']) || empty($_SESSION['item_cart'])) {
            echo 'Your cart is empty.';
        } else {
        foreach($_SESSION['item_cart'] as $id=>$val):?>
        <?php @$total += $val['product_quantity'] * $val['product_price'];?>

            <div class="top-cart-item clearfix">
            <div class="top-cart-item-image">
                    <a href="#"><img src="../assets/uploads/<?=$val['product_brand']?>/<?=$val['product_images']?>" alt="<?=$val['product_name']?>" /></a>
                </div>
                <div class="top-cart-item-desc">
                    <a href="products?id=<?=$val['product_id']?>"><?=$val['product_name']?></a>
                    <span class="top-cart-item-price">₱<?=number_format($val['product_price'],2)?></span>
                    <span class="top-cart-item-price"><a style="cursor:pointer" onclick="add_to_cart('<?=$val['product_id']?>','Delete')">Remove</a></span>
                    <span class="top-cart-item-quantity">x <?=$val['product_quantity']?></span>
                </div>
            </div>
        <?php endforeach;?>
        </div>
    </div>
    <div class="top-cart-action clearfix">
        <span class="fleft top-checkout-price">₱<?=number_format($total,2)?></span>
        <a href="cart" class="button button-small nomargin fright">View Cart</a>
    </div>
    <?php } ?>
</div>


