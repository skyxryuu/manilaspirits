<?php include '../class/config.php';?>
<?php
if(isset($_SESSION['id'])) {
    redirect('pages','my-account');
}
if(empty($_SESSION['item_cart'])) {header('location:index.php');}

?>


<?php
include "config.php";

$userId = $_SESSION['userId'];

//Our select statement. This will retrieve the data that we want.
$sql = "SELECT * FROM login_tbl WHERE userId = '{$userId}'";
$stmt = $dbConn->prepare($sql);
$stmt->execute();
$adviserList = $stmt->fetchAll();

$address = "";
foreach ($adviserList as $item)
{
    $address =  $item['address'];

}

    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $result = '';
    $referenceNo = '';
    for ($i = 0; $i < 6; $i++)
    {
        $result .= $characters[mt_rand(0, 27)];
    }
    $referenceNo = 'MS-'.$result;


?>

            <!DOCTYPE html>
            <html dir="ltr" lang="en-US">
            <head>
              
                <!-- Stylesheets ============================================= -->
                <script src="sweetalert2.all.min.js"></script>

                <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
                <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
                <link rel="stylesheet" href="../assets/css/bootstrap.css" type="text/css" />
                <link rel="stylesheet" href="../assets/style.css" type="text/css" />
                <link rel="stylesheet" href="../assets/css/dark.css" type="text/css" />
                <link rel="stylesheet" href="../assets/css/font-icons.css" type="text/css" />
                <link rel="stylesheet" href="../assets/css/animate.css" type="text/css" />
                <link rel="stylesheet" href="../assets/css/magnific-popup.css" type="text/css" />
                <!-- amaran notification  -->
                <link rel="stylesheet" href="../assets/css/amaran.min.css" type="text/css" />
                <link rel="stylesheet" href="../assets/css/animate.min.css" type="text/css" />

                <link rel="stylesheet" href="../assets/css/responsive.css" type="text/css" />
                <meta name="viewport" content="width=device-width, initial-scale=1" />
                
                <link rel="stylesheet" href="sweetalert.css" type="text/css" />

                <link rel="icon" href="../assets/images/logo1.png" type="image/icon" sizes="16x16">
              
                <style>
                    #scroller {
                        max-height: 280px;
                        overflow: auto;
                        background: ivory;
                    }

                </style>


                <title>Submit your information </title>

            </head>

            <body ng-app="app" ng-controller="mainController" class="stretched">

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
                                    <a href="<?= base_url('pages','clienthome')?>" class="standard-logo" data-dark-logo="../assets/images/logo.png"><img src="../assets/images/logo.png"></a>
                                    <a href="<?= base_url('pages','clienthome')?>" class="retina-logo" data-dark-logo="../assets/images/logo.png"><img src="../assets/images/logo.png"></a>
                                </div>
                                <!-- #logo end -->

                                <!-- Primary Navigation
                            ============================================= -->
                                <nav id="primary-menu">

                                    <ul>
                                        <li>
                                            <a href="<?= base_url('pages','clienthome')?>">
                                                <div>Home</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('pages','login')?>">
                                                <div>Logout</div>
                                            </a>
                                        </li>
                                    </ul>

                                    <!-- Top Cart
                                ============================================= -->
                                    <!-- <div id="top-cart">
                                        <a href="#" id="top-cart-trigger">
                                            <i class="icon-shopping-cart"></i>
                                            <span id="show_cart_counts"></span>
                                        </a>
                                        <div id="show_cart_contents"></div>
                                    </div> -->
                                    <!-- #top-cart end -->

                                    <!-- Top Search
                                ============================================= -->
                                    <!-- #top-search end -->

                                </nav>
                                <!-- #primary-menu end -->

                            </div>

                        </div>

                    </header>
                    <!-- #header end -->

                    <!-- Page Title
		============================================= -->
                    <section id="page-title">

                        <div class="container clearfix">
                            <h1>CONFIRM CHECKOUT</h1>
                            <ol class="breadcrumb">
                                <li><a href="<?= base_url('pages','clienthome')?>">Home</a></li>
                                <li class="active">Confirm Checkout</li>
                            </ol>
                        </div>

                    </section>
                    <!-- #page-title end -->

                    <!-- Content
                ============================================= -->
                    <section id="content">

                        <div class="content-wrap">

                            <div class="container clearfix">

                                <div class="col_full nobottommargin">

                                    <h3>Please fill up the information below.</h3>

                                    <form >
                                    <input type="hidden" id="referenceNo" value="<?php echo $referenceNo; ?>">
                                    <input type="hidden" id="userId" value="<?php echo $userId; ?>">

                                 

                                        <div class="clear"></div>

                                        <div class="col_one_fourth">
                                            <label for="register-form-password">Select Payment Method:</label>
                                            <select class="form-control" id="paymentMethod">
                                               <option value="" readonly selected disabled>Select Option</option>
                                                <option value="COD">Cash on Delivery</option>
                                                <option value="CARD">Debit/Credit Card</option>
                                            </select>
                                        </div>


                                        <div class="clear"></div>

                                        <div class="cardDiv">
                                            <div class="col_one_fourth">
                                                <label for="register-form-password">Credit Card Number</label>
                                                <input type="text"   class="form-control" id="creditCardNo" placeholder="Enter Credit Card Number" required>
                                            </div>

                                            <div class="col_one_fourth">
                                                <label for="register-form-password">Expiration Date</label>
                                                <input type="text"  style="background-color:white;" class="form-control" id="expirationDate" placeholder="Enter Expiration Date" required>
                                            </div>

                                            <div class="col_one_fourth">
                                                <label for="register-form-password">CVV</label>
                                                <input type="text"   class="form-control" id="cvvNo" placeholder="Enter CVV" required>
                                            </div>
                                        </div>

                                        <div class="col_full">
                                            <label for="register-form-username">Address:</label>
                                            <textarea class="form-control is-invalid" name="address" id="address"  placeholder="Enter Address"> <?php echo $address; ?></textarea>
                                        </div> 

                                        <div class="clear"></div>

                                        <div class="col_full nobottommargin">
                                            <input type="button" class="button button-blue nomargin" id="btnCheck"   value="SUBMIT">
                                                &nbsp; &nbsp; &nbsp;
                                               <a href="clienthome.php" class="button button-blue nomargin">BACK</a>

                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>

                    </section>
                    <!-- #content end -->

                </div>
                <!-- #wrapper end -->

                <div id="gotoTop" class="icon-angle-up"></div>
                <script type="text/javascript" src="../assets/js/jquery.js"></script>
                <script type="text/javascript" src="../assets/js/plugins.js"></script>

                <!-- Footer Scripts
	            ============================================= -->
                <script type="text/javascript" src="../assets/js/ajax_functions.js"></script>
                <script type="text/javascript" src="../assets/js/customize.js"></script>
                <script type="text/javascript" src="../assets/js/functions.js"></script>
                <!-- amaran notification  -->
                <script type="text/javascript" src="sweetalert-dev.js"></script>
                <script type="text/javascript" src="sweetalert.min.js"></script>
                <script type="text/javascript" src="../assets/js/jquery.amaran.min.js"></script>
                <!-- form validation using angularjs -->
                <script src="../assets/angular/1.4.8.angular.min.js"></script>
                <script src="../assets/angular/1.4.2.angular.min.js"></script>
             
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
                <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

                <script type="text/javascript">
                
                        $("#creditCardNo").on("keypress keyup blur",function (event) {    
                        $(this).val($(this).val().replace(/[^\d].+/, ""));
                            if ((event.which < 48 || event.which > 57)) {
                                event.preventDefault();
                            }
                        });

                        
                        $("#cvvNo").on("keypress keyup blur",function (event) {    
                        $(this).val($(this).val().replace(/[^\d].+/, ""));
                            if ((event.which < 48 || event.which > 57)) {
                                event.preventDefault();
                            }
                        });


                        $('.cardDiv').hide();

                        let paymentType = ""

                        $('#paymentMethod').on('change', function() {
                         
                                if(this.value == "COD"){
                                    paymentType = "COD"
                                    $('.cardDiv').hide();
                                    $('#creditCardNo').val("");
                                    $('#expirationDate').val("");
                                    $('#cvvNo').val("");
                                }else if(this.value=="CARD"){
                                    paymentType = "CARD"
                                    $('.cardDiv').show();
                                }
                        });

                     

                    
                    // add quantity in quick view and product per page 
                    add_quantity_in_product_per_page_quick_view();
                    // show cart counts when ajax triggered 
                    show_cart_counts();
                    // show cart contents when ajax triggered
                    show_cart_contents();
                    var app = angular.module('app', ['ngMessages']);
                    app.controller('mainController', function($scope) {});
                    $( document ).ready(function() {

                      
                 $('#expirationDate').flatpickr({dateFormat: 'Y-m-d' , minDate: "today"});


                  $('#btnCheck').on( 'click', function(){

          

                            let referenceNo   = $('#referenceNo').val();
                            let creditCardNo   = $('#creditCardNo').val();
                            let expirationDate   = $('#expirationDate').val();
                            let cvvNo   = $('#cvvNo').val();
                            let userId   = $('#userId').val();
                            let address = $('textarea#address').val()

                            let required  
                            if(paymentType == "CARD"){
                                required = address == "" || creditCardNo == "" || expirationDate == ""  || cvvNo == ""
                            }else{
                                required = address == "" || paymentType == ""
                            }   

                            if(required){
                                Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    title: 'Please Complete all Fields!',
                                    showConfirmButton: false,
                                    timer: 1300
                                })
                            }else{

                                    $.ajax({
                                    method: 'POST',
                                    url: "functions.php",
                                    data:   {procedure:"saveOrder",userId:userId,paymentType:paymentType,referenceNo:referenceNo,creditCardNo:creditCardNo,expirationDate:expirationDate,cvvNo:cvvNo,address:address},
                                    dataType: "json",
                                    success: function(data){	
                                        
                                       
                                    
                                        if(data.status =="Success")
                                        {
                                            Swal.fire({
                                                icon: 'success',
                                                position: 'center',
                                                title: 'Order has successfully checkout!',
                                                showConfirmButton: false,
                                                timer: 1000,
                                                }).then((result) => {
                                              
                                                window.location.href = 'orderSuccess.php'; 
                                            })

                                        }else if(data.status == "Failed"){
                                            Swal.fire({
                                            position: 'center',
                                            icon: 'error',
                                            title: 'Order Failed!',
                                            showConfirmButton: false,
                                            timer: 1500
                                            })
                                        }else if(data.status == "Invalid"){
                                            Swal.fire({
                                            position: 'center',
                                            icon: 'error',
                                            title: 'Order Failed!',
                                            showConfirmButton: false,
                                            timer: 1500
                                            })
                                        }
                                    }

                                });
                            }

                            });
                        
                    } );


                </script>
            </body>

            </html>
