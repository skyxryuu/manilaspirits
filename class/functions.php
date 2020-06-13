<?php 
include 'config.php';

switch($_POST['action']) {

    case 'Products';
        $product_id          = $data->post('product_id');
        $product_name        = $data->post('product_name');
        $product_brand       = $data->post('product_brand');
        $product_category    = $data->post('product_category');
        $product_price       = $data->post('product_price');
        $product_discount    = $data->post('product_discount');
        $product_description = $data->post('product_description');
        $product_stocks      = $data->post('product_stocks');
        $data->products($product_id,$product_name,$product_brand,$product_category,$product_price,$product_discount,$product_description,$product_stocks);
    break;

    case 'Show Product Table': 
        $data->show_products();
    break;

    case 'Get Products By Id':
        $product_id = $data->post('product_id');
        $data->get_product_by_id($product_id);
    break;

    case 'Delete Products By Id':
        $product_id = $data->post('product_id');
        $data->delete_product_by_id($product_id);
    break;

    case 'Upload Product Images':
        $image_id    = $data->post('image_id');
        $image_brand = $data->post('image_brand');
        $file        = $data->post('files');
        $data->upload_image_for_products($file,$image_id,$image_brand);
    break;

    case 'Add To Cart':
        $product_id = $data->post('product_id');
        $status     = $data->post('status');
        $quantity   = $data->post('quantity');
        $data->add_to_cart($product_id,$status,$quantity);
    break;

    case 'Get Products By Hash Id':
        $product_id = $data->post('product_id');
        $hash_product_id = $data->post('hash_product_id');
        $data->get_products_by_id_using_hash($product_id,$hash_product_id);
    break;

    case 'Update Quantity In Cart':
        $product_id = $data->post('product_id');
        $quantity   = $data->post('quantity');
        $status     = 'Update Quantity In Cart';
        $data->add_to_cart($product_id,$status,$quantity);
    break;

    case 'Place Order':
        $data->place_order();
    break;

    case 'Show Cart Counts':
        include 'includes/show_cart_counts.php';
    break;

    case 'Show Cart Total':
        include 'includes/show_cart_total.php';
    break;

    case 'Show Cart Contents In Cart Page':
        include 'includes/show_cart_content_in_cart_page.php';
    break;

    case 'Show Cart Contents In Checkout Page':
        include 'includes/show_cart_content_in_checkout_page.php';
    break;

    case 'Show Cart Contents':
        include 'includes/show_cart_contents.php';
    break;


}
