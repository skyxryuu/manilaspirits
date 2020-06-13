<?php
include 'controller.php';
class db extends Controller {

    // Get all category
    public function get_product_category() {
        $query = $this->db->query("SELECT * FROM products_category_tbl where status = 1");
        return $query;
    }
    // Get all brands
    public function get_product_brand() {
        $query = $this->db->query("SELECT * FROM products_brands_tbl where status = 1");
        return $query;
    }
    // Get all products
    public function get_products() {
        $query = $this->db->query("SELECT * FROM products_brands_tbl as pbt INNER JOIN products_tbl as pt ON pt.product_brand = pbt.product_brand");
        return $query;
    }
    // convert all characters to string using post method
    public function post($data) {
        return $data == 'product_description' ? $this->db->real_escape_string($_POST[$data]) : $this->db->real_escape_string(htmlentities($_POST[$data]));
    }
    public function get($data) {
        return $this->db->real_escape_string(htmlentities($_GET[$data]));
    }
    // Get products for quick view purposes
    public function get_products_for_quick_view($product_id) {
        $query = $this->db->query("SELECT * FROM products_tbl WHERE product_id = $product_id");
        $row   = $query->fetch_object();
        return $row;
    }
     // Get product details by id
     public function get_product_by_id($product_id) {
        $query = $this->db->query("SELECT * FROM products_tbl WHERE product_id = $product_id");
        foreach($query as $row) {
            $data = $row;
        }
        echo json_encode($data);
    }
    // get product per page using id 
    public function get_product_per_page_using_id($product_id) {
        $query = $this->db->query("SELECT * FROM products_tbl WHERE product_id = $product_id");
        return $query;
    }
    // get related product using brand name 
    public function get_related_product_by_brand($product_brand,$product_id) {
        $query = $this->db->query("SELECT * FROM products_tbl WHERE product_brand = '$product_brand' 
        AND product_id not in(SELECT product_id from products_tbl WHERE product_id = $product_id)");
        return $query;
    }
    //Add to cart 
    public function add_to_cart($product_id,$status,$quantity) {
        $search_query = $this->db->query("SELECT * FROM products_tbl as pt INNER JOIN products_carousel_tbl as pct
        ON pt.product_id = pct.product_id WHERE pt.product_id = $product_id");
        $row = $search_query->fetch_object();
        if(isset($product_id)) {
            switch($status) {
                case 'Delete':
                    unset($_SESSION['item_cart'][$product_id]);
                break;

                case 'Update Quantity In Cart':
                    if(isset($_SESSION['item_cart'][$product_id]['product_id']) == $product_id && isset($quantity)) {
                        $_SESSION['item_cart'][$product_id]['product_quantity'] = $quantity;
                        $qty = ($quantity == 1)  ?  'quantity' : 'quantities';
                    } 
                break;

                case 'Add':
                    if(isset($_SESSION['item_cart'][$product_id]['product_id']) == $product_id && isset($quantity)) {
                        $_SESSION['item_cart'][$product_id]['product_quantity'] += $quantity;
                        $qty = ($quantity == 1)  ?  'quantity' : 'quantities';
                    } else {
                        $count = (!isset($_SESSION['item_cart'])) ? 0 : count($_SESSION['item_cart']);
                        $add_quantity = (isset($quantity)) ? $quantity : 1;
                        $_SESSION['item_cart'][$product_id] = array( 
                            'base_count' => $product_id, 'product_id' => $product_id, 'product_price' => $row->product_price, 
                            'product_quantity' => $add_quantity, 'product_name' => $row->product_name, 'product_stocks' => $row->product_stocks,
                            'product_images' => $row->product_images, 'product_brand' => $row->product_brand
                        );
                    }
                break;
            }
        }
    }
    // save all items in database 
    public function place_order() {
        if(empty($_SESSION['item_cart'])) {
            $_SESSION['message'] = 'Your cart is empty.';
            echo json_encode(['success' => false]);
        } else {
            foreach($_SESSION['item_cart'] as $key => $value) {

                $product_id = $value['product_id'];
                $product_quantity = $value['product_quantity'];
                $product_stocks = $value['product_stocks'];
                $product_price = $value['product_price'];
                $query = '';
                $query .= $this->db->query("INSERT INTO products_transactions_tbl(product_id,product_quantity,product_price,orderdate) VALUES ($product_id,$product_quantity,$product_price,NOW())");
                $query .= $this->db->query("UPDATE products_tbl SET product_stocks = $product_stocks - $product_quantity WHERE product_id = $product_id");
            }
            if($query) {
               
                $_SESSION['message'] = 'Transaction has been completed!';
                unset($_SESSION['item_cart']);
                echo json_encode(['success' => true]);
            }
        }
         header('Location:pages/clienthome.php');
    }

    //Delete specific products by id 
    public function delete_product_by_id($product_id) {
        $query = $this->db->query("DELETE FROM products_tbl WHERE product_id = $product_id");
        $message = 'Product has been deleted';
        $query ? $this->notify([true,'#336699','#fff',$message]) : null;
    }

    // Execute add products
    public function products($product_id,$product_name,$product_brand,$product_category,$product_price,$product_discount,$product_description,$product_stocks) {
        if(empty($product_id)) {
            $check = $this->db->query("SELECT * FROM products_tbl WHERE product_name = '$product_name'");
            if($check->num_rows > 0) {
                $message = 'This item are already exist.';
                $this->notify([true,'#ff0000','#fff',$message]);
            } else {
                $message = $product_name.' has been added.';
                $query = $this->db->query("INSERT INTO products_tbl 
                (product_name,product_brand,product_category,product_price,product_discount,product_description,product_stocks) 
                VALUES 
                ('$product_name','$product_brand','$product_category','$product_price','$product_discount','$product_description','$product_stocks') ");
                $query ? $this->notify([true,'#336699','#fff',$message]) : null;
            }
        } else {
            $message = 'This item has been updated.';
            $query = $this->db->query("UPDATE products_tbl SET product_name = '$product_name',
            product_brand = '$product_brand', product_category = '$product_category', product_price = '$product_price',
            product_discount = '$product_discount',product_description = '$product_description', product_stocks = '$product_stocks'
            WHERE product_id = $product_id");
            $query ? $this->notify([true,'#336699','#fff',$message]) : null;
        }
        
    }
    
    // Show products 
    public function show_products() {
        foreach($this->get_products() as $row):?>
        <?php $data = $row?>
        <?php $status = ($row['product_stocks'] == 0) ? '<label class="label label-danger">Out of stocks</label>' : '<label class="label label-success">In stocks</label>';?>
            <tr>
                <td><?=$row['product_name']?></td>
                <td><?=$row['product_brand']?></td>
                <td><?=$row['product_category']?></td>
                <td>&#8369;<?=number_format($row['product_price'],2)?></td>
                <td><?=$row['product_discount']?>%</td>
                <td><?=$row['product_stocks']?></td>
                <td><?=$status?></td>
                <td style="text-align:center"><a onclick="add_image_product_by_id('<?=$row['product_id']?>','<?=$row['product_brand']?>')" style="cursor:pointer"><i class="icon icon-image"></i></a></td>
                <td style="text-align:center"><a onclick="delete_product_by_id('<?=$row['product_id']?>')" style="cursor:pointer"><i class="icon icon-remove"></i></a></td>
                <td style="text-align:center"><a onclick="edit_product_by_id('<?=$row['product_id']?>')" style="cursor:pointer"><i class="icon icon-pencil"></i></a></td>
            </tr>
        <?php endforeach;
    }

    // upload single or multiple product images 
    public function upload_image_for_products($file,$image_id,$image_brand) {
        if(!empty($_FILES)) {
        if (!file_exists('../assets/uploads/'.$image_brand)) {
            mkdir('../assets/uploads/'.$image_brand, 0777, true);
                 $message = 'Image has been added.';
            foreach($_FILES["files"]["tmp_name"] as $key => $value) {
                $image_name = $_FILES['files']['name'][$key];
                move_uploaded_file($_FILES['files']['tmp_name'][$key],'../assets/uploads/'.$image_brand.'/'.$_FILES['files']['name'][$key]);
                $query = $this->insert_product_images_by_id($image_name,$image_id);
                }
            $query ? $this->notify([true,'#336699','#fff', $message]) : null;
            } else {
            $message = 'Image has been added.';
            foreach($_FILES["files"]["tmp_name"] as $key => $value) {
                $image_name = $_FILES['files']['name'][$key];
                move_uploaded_file($_FILES['files']['tmp_name'][$key],'../assets/uploads/'.$image_brand.'/'.$_FILES['files']['name'][$key]);
                $query = $this->insert_product_images_by_id($image_name,$image_id);
                }
            $query ? $this->notify([true,'#336699','#fff', $message]) : null;
            } 
        }
    }

    // Get 2 product images for quick view 
    public function get_image_by_id($product_id) {
        $query = $this->db->query("SELECT * FROM products_carousel_tbl WHERE product_id = $product_id LIMIT 2");
        return $query;
    }

    // Get product images for quick view's sliders
    public function get_product_for_slides($product_id) {
        $query = $this->db->query("SELECT * FROM products_carousel_tbl WHERE product_id = $product_id");
        return $query;
    }
    // insert product image by id 
    public function insert_product_images_by_id($image_name,$image_id) {
        $query = $this->db->query("INSERT INTO products_carousel_tbl (product_images,product_id) VALUES ('$image_name','$image_id')");
        return $query;
    }
    // custom amaran notification
    public function notify($data) {
        echo json_encode(['success'=>$data[0],'bgcolor'=>$data[1],'color'=>$data[2],'message'=>$data[3]]);
    }

    
}
