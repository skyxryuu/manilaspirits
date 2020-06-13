<?php if(empty($_SESSION['item_cart'])) { ?>

<tr class="cart_item">
    <td class="cart-product-name">
        <strong>Total</strong>
    </td>

    <td class="cart-product-name">
        <span class="amount color lead"><strong>₱<?=number_format(0,2)?></strong></span>
    </td>
</tr>

<?php } else { ?>
<?php foreach($_SESSION['item_cart'] as $id=>$val):?>
<?php @$total += $val['product_quantity'] * $val['product_price'];?>
<?php endforeach;?>

<tr class="cart_item">
    <td class="cart-product-name">
        <strong>Total</strong>
    </td>

    <td class="cart-product-name">
        <span class="amount color lead"><strong>₱<?=number_format($total,2)?></strong></span>
    </td>
</tr>

<?php } ?>