function implement_custom_file() {
    $("#product_image").fileinput({
        showPreview: false,
        showUpload: false,
        allowedFileTypes: ["image"]
    });
}

function implement_dataTable() {
    $('#datatable1').dataTable();
} 

function implement_ckeditor() {
    var editor = CKEDITOR.replace( 'prod_desc' );
    editor.on( 'change', function( evt ) {
        $('#product_description').val( evt.editor.getData() );
    });
}


function implement_multi_image() {
    $("#image-multiple").fileinput({
        maxFileCount: 10,
        allowedFileTypes: ["image", "video"]
    });
}

// custom function for add quantity in quick view and product per page 
function add_quantity_in_product_per_page_quick_view() {
    var product_id = $('#product_id').val();
    $("#minus").click(function(){
        $('#quantity'+product_id).val() <= 1 ?  1  :  $("#quantity"+product_id).val(Number($('#quantity'+product_id).val()) - 1 );;
    });
    $("#plus").click(function(){
        $("#quantity"+product_id).val(Number($('#quantity'+product_id).val()) + 1 );
    }); 
}

