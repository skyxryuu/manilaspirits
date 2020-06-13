<?php if(!isset($_SESSION['item_cart']) || empty($_SESSION['item_cart'])) {?>
    <tr class="cart_item">
        <td class="center" colspan=5>Your cart is empty. click <a href="clienthome.php">here</a> to continue shopping.</td>
    </tr>
<?php } else { ?>
    
    <?php foreach($_SESSION['item_cart'] as $key => $value):?>
<?php @$total += $value['product_quantity'] * $value['product_price'];?>
<tr class="cart_item">
    <td class="cart-product-thumbnail">
        <a href="#"><img width="64" height="64" src="../assets/uploads/<?=$value['product_brand']?>/<?=$value['product_images']?>" alt="<?=$value['product_name']?>"></a>
    </td>

    <td class="cart-product-name">
        <a href="#"><?=$value['product_name']?></a>
    </td>

    <td class="cart-product-price">
        <span class="amount">₱<?=number_format($value['product_price'],2)?></span>
    </td>

    <td class="cart-product-quantity">
        <div class="quantity clearfix">
            <span class="amount"><?=$value['product_quantity']?></span>
        </div>
    </td>

    <td class="cart-product-subtotal">
        <span class="amount">₱<?=number_format($value['product_price'] * $value['product_quantity'],2)?></span>
    </td>
</tr>
<?php endforeach;?>
<?php } ?>
