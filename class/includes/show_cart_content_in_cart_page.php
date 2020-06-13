
<?php if(!isset($_SESSION['item_cart']) || empty($_SESSION['item_cart'])) {?>
    <tr class="cart_item">
        <td class="center" colspan=6>Your cart is empty. click <a href="clienthome.php">here</a> to continue shopping.</td>
    </tr>
<?php } else { ?>
    
    <?php foreach($_SESSION['item_cart'] as $key => $value):?>
<?php @$total += $value['product_quantity'] * $value['product_price'];?>
<tr class="cart_item">
    <td class="cart-product-remove">
        <a style="cursor:pointer" onclick="add_to_cart('<?=$value['product_id']?>','Delete')" class="remove" title="Remove this item"><i class="icon-trash2"></i></a>
    </td>

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
            <input type="button" value="-" class="minus" id="minus<?=$value['product_id']?>" onclick="quantity_in_cart('<?=$value['product_id']?>','minus')">
            <input type="text" readonly name="quantity" id="quantity<?=$value['product_id']?>" value="<?=$value['product_quantity']?>" class="qty" />
            <input type="button" value="+" class="plus" id="plus<?=$value['product_id']?>" onclick="quantity_in_cart('<?=$value['product_id']?>','plus')">
        </div>
    </td>

    <td class="cart-product-subtotal">
        <span class="amount">₱<?=number_format($value['product_price'] * $value['product_quantity'],2)?></span>
    </td>
</tr>
<?php endforeach;?>

<tr class="cart_item">
    <td colspan="6">
        <div class="row clearfix">
            
            <div class="col-md-12 col-xs-8 nopadding">
                  <a href="clienthome.php" class="button notopmargin fright">Back</a>
                <a href="order.php" class="button notopmargin fright">Proceed to Checkout</a>

            </div>
            </div>
        </div>
    </td>
</tr>
<?php } ?>
