var url = '../../class/functions.php';

// add products 
function add_products() {
    $('#btn_products').click(function(e){
        var data = {
            action : 'Products', 
            product_name: $("#product_name").val(), product_brand : $("#product_brand").val(), 
            product_category : $("#product_category").val(), product_price : $("#product_price").val(), 
            product_discount : $("#product_discount").val(), product_stocks : $("#product_stocks").val(), 
            product_id : $('#product_id').val(), product_description : $("#product_description").val()
        };
        $.ajax({
            type : 'POST', url : url, data: data, cache: false, dataType: 'json',
            success:function(data) {
                show_products();
            }
        });
    });
}

// show modal for addming products
function modal_add_product() {
    $('#myModal').modal('show');
    $('#btn_products').html('Add Product');
    CKEDITOR.instances["prod_desc"].setData('');
    $('#myModal').find($('#product_id')).val('');
    $('#myModal').find($('#product_stocks')).val(0);
    $('#myModal').find($('#product_discount')).val(0);
    $('#myModal').find($('#product_price')).val(0);
    $('#myModal').find($('#product_name')).val('');
    $('#myModal').find($('#product_brand')).val('Samsung');
    $('#myModal').find($('#product_category')).val(data.product_category);
    $('#myModal').find($('#product_description')).val('');
}

// delete products using their id 
function delete_product_by_id(id) {
    var data = { action : 'Delete Products By Id', product_id : id };
    $.ajax({
        type : 'POST', url : url, data : data, cache : false, dataType : 'json',
        success:function(data) {
            successful(data.success,data.bgcolor,data.color,data.message);
            show_products();
        }
    })
}

// edit products using product id 
function edit_product_by_id(id) {
    var data = { action : 'Get Products By Id', product_id : id };
    $.ajax({
        type : 'POST', url : url,
        data: data, cache: false, 
        dataType: 'json',
        success:function(data) {
            $('#myModal').modal('show');
            $('#myModal').find($('#product_id')).val(id);
            $('#myModal').find($('#product_name')).val(data.product_name);
            $('#myModal').find($('#product_brand')).val(data.product_brand);
            $('#myModal').find($('#product_category')).val(data.product_category);
            $('#myModal').find($('#product_price')).val(data.product_price);
            $('#myModal').find($('#product_discount')).val(data.product_discount);
            $('#myModal').find($('#product_description')).val(data.product_description);
            CKEDITOR.instances["prod_desc"].setData(data.product_description);
            $('#myModal').find($('#product_stocks')).val(data.product_stocks);
            $('#btn_products').html('Save Changes');
        }
    });
} 

// add to cart module 
function add_to_cart(product_id,status) {
    var quantity = $('#quantity'+product_id).val();
    var button = (status === 'Delete') ? $('#add_to_cart'+product_id).html('<i class="icon icon-shopping-cart"></i> Purchase') : $('#add_to_cart'+product_id).html('<i class="icon icon-check"></i> Added');
    button,setTimeout(function(){
        var data = { action : 'Add To Cart', product_id : product_id, status : status, quantity : quantity };
        $.ajax({
            type: 'POST', url : 'shop-native/'+url, data :data, cache : false,
            success:function(data) {
                $('#add_to_cart'+product_id).html('<i class="icon-shopping-cart"></i> Purchase');
                show_cart_counts();
                show_cart_contents();
                show_cart_content_in_cart_page();
                show_cart_total();
                show_cart_content_in_checkout_page();

            }
        })
        window.location.href = 'order.php';
    },300);
   
}

// upload image for carousel using product id 
function add_image_product_by_id(id,brand) {
    $('#modal_upload_pictures').modal('show');
    $('#modal_upload_pictures').find($('#image_id')).val(id);
    $('#modal_upload_pictures').find($('#image_brand')).val(brand);
} 


// show products in admin page
function show_products() {
    var data = { action : 'Show Product Table' };
    $.ajax({
        type: 'POST',
        url : url,
        data: data,
        cache: false,
        success:function(data) {
            $('#show_table').html(data);
        }
    })
}

// upload product images 
function upload_product_images() {
    $('.file').change(function(e){
        e.preventDefault();
        var data = new FormData($('#FormImageProducts')[0]);
        data.append('action','Upload Product Images');
        data.append('image_id',$('#image_id').val());
        data.append('image_brand',$('#image_brand').val());
        data.append('files',$('#FormImageProducts')[0]);
        $.ajax({  
            type: 'POST', url: url, data: data,  
            contentType: false, processData:false, cache:false,
            dataType: 'json',mimeType: "multipart/form-data",
            success: function(data) {  
                data.success == true ? successful(data.success,data.bgcolor,data.color,data.message) : successful(data.success,data.bgcolor,data.color,data.message);
            }  
       });  
    })
}

// custom function for plus / minus in cart module
function quantity_in_cart(product_id,button) {
    if(button === 'minus') {
        if($('#quantity'+product_id).val() <= 1) {
            $('#quantity'+product_id).val(1);
        } else {
            $("#quantity"+product_id).val(Number($('#quantity'+product_id).val()) - 1 );
            var quantity = $('#quantity'+product_id).val();
            var data = { action : 'Update Quantity In Cart', product_id : product_id, quantity : quantity };
            $.ajax({type : 'POST',url : 'shop-native/'+url, data : data,
                success:function(data){
                    show_cart_content_in_cart_page();
                    show_cart_counts();
                    show_cart_contents();
                    show_cart_total();
                }
            })
        }
    } else {
        $('#quantity'+product_id).val(Number($('#quantity'+product_id).val()) + 1 );
        var quantity = $('#quantity'+product_id).val();
        var data = { action : 'Update Quantity In Cart', product_id : product_id, quantity : quantity };
        $.ajax({type : 'POST',url : 'shop-native/'+url, data : data,
            success:function(data){
                show_cart_content_in_cart_page();
                show_cart_counts();
                show_cart_contents();
                show_cart_total();
            }
        })
    }
}

// complete the transaction 
function place_order() {
    $("#place_order").click(function(e){
        var data = { action : 'Place Order' };
        $.ajax({type : 'POST',url : 'shop-native/'+url, data : data, dataType: 'json',
            success:function(data){
                data.success == true ? location.href = '../index.php' : location.href = '../index.php';
            }
        })
    })   
}

// show cart counts 
function show_cart_counts() {
    $.ajax({type:'POST',
        data:{
            action:'Show Cart Counts'},
        url:'shop-native/'+url,
        success:function(data){
            $('#show_cart_counts').html(data);
        }
    });
}



// show cart counts 
function show_cart_total() {
    $.ajax({type:'POST',data:{action:'Show Cart Total'},url:'shop-native/'+url,success:function(data){$('.lead').html(data);}});
}

// show cart contents 
function show_cart_contents() {
    $.ajax({type:'POST',data:{action:'Show Cart Contents'},url:'shop-native/'+url,success:function(data){$('#show_cart_contents').html(data);}});
}

// show cart contents in cart page
function show_cart_content_in_cart_page() {
    $.ajax({type:'POST',data:{action:'Show Cart Contents In Cart Page'},url:'shop-native/'+url,success:function(data){$('#show_cart_content_in_cart_page').html(data);}});
}

// show cart contents in checkout page
function show_cart_content_in_checkout_page() {
    $.ajax({type:'POST',data:{action:'Show Cart Contents In Checkout Page'},url:'shop-native/'+url,success:function(data){$('#show_cart_content_in_checkout_page').html(data);}});
}

// custom method if the request was success. 
function successful(data,bgcolor,color,message) {
    data == true ? notify(bgcolor,color,message) : notify(bgcolor,color,message);
}
// amaran notification  
function notify(bgcolor,color,message) {
    $.amaran({
        'theme'     : 'colorful', 'content'   : { bgcolor: bgcolor,color: color,message: message },
        'position'  : 'top left', 'outEffect' : 'slideBottom'
    });
}