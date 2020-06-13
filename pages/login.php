<?php include '../class/config.php';
     unset($_SESSION['item_cart']);
     unset($_SESSION['userId']);
?>

<!DOCTYPE html>
<html>

<head>

    <!-- Stylesheets
        ============================================= -->
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
    <title>Login</title>
    <link rel="icon" href="../assets/images/logo1.png" type="image/icon" sizes="16x16">
    <link rel="stylesheet" href="../assets/css/sweetalert2.css" type="text/css" />
    <style>
        #scroller {
            max-height: 280px;
            overflow: auto;
            background: ivory;
        }
    </style>
</head>

            <body class="stretched">


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
                                    <a href="<?= base_url('pages','home')?>" class="standard-logo" data-dark-logo="../assets/images/logo.png"><img src="../assets/images/logo.png"></a>
                                    <a href="<?= base_url('pages','home')?>" class="retina-logo" data-dark-logo="../assets/images/logo.png"><img src="../assets/images/logo.png"  ></a>
                                </div>
                                <!-- #logo end -->

                                <!-- Primary Navigation
                            ============================================= -->
                                <nav id="primary-menu">

                                    <ul>
                                        <li>
                                            <a href="<?= base_url('pages','home')?>">
                                                <div>Home</div>
                                            </a>
                                        </li>
                                        <li class="current">
                                            <a href="<?= base_url('pages','login')?>">
                                                <div>Login</div>
                                            </a>
                                        </li>
                                 
                                    </ul>

                                    <!-- Top Cart
                                ============================================= -->
                             
                                    <!-- #top-cart end -->


                                </nav>
                                <!-- #primary-menu end -->

                    </header>
                    <!-- #header end -->

                    <!-- Page Title
		============================================= -->
                    <section id="page-title">

                        <div class="container clearfix">
                            <h1>Login / Register</h1>
                            <ol class="breadcrumb">
                                <li><a href="<?= base_url('pages','home')?>">Home</a></li>
                                <li class="active">Login / Register</li>
                            </ol>
                        </div>

                    </section>
                    <!-- #page-title end -->

                    <!-- Content
                ============================================= -->
                    <section id="content">

                        <div class="content-wrap">

                            <div class="container clearfix">

                                <div class="col_one_third nobottommargin">

                                    <div class="well well-lg nobottommargin">
                                        <form method="post" id="loginForm" name="loginForm" novalidate class="nobottommargin" action="#">

                                            <h3>Login to your Account</h3>

                                            <div class="col_full">
                                                <label for="login-form-username">Username:</label>
                                                <input type="text" id="lusername" name="lusername" placeholder="Enter your username" class="form-control" />
                                                
                                            </div>

                                            <div class="col_full">
                                                <label for="login-form-password">Password:</label>
                                                <input type="password" id="lpassword" name="lpassword" placeholder="Enter your password" class="form-control" />
                                              
                                            </div>

                                            <div class="col_full nobottommargin">
                                                <input type="button" id="btnLogin" name="btnLogin" class="button button-blue" value="login">

                                            </div>

                                        </form>

                                    </div>

                                </div>

                                <div class="col_two_third col_last nobottommargin">

                                    <h3>Don't have an Account? Register Now.</h3>

                                    <form id="registerForm" name="registerForm" class="nobottommargin" action="#" method="post">

                                        <div class="col_half">
                                            <label for="register-form-firstName">First Name:</label>
                                            <input type="text" id="firstname" name="firstname"class="form-control" placeholder="Enter your First Name" />
                                        </div>

                                        <div class="col_half col_last">
                                            <label for="register-form-lastName">Middle Name:</label>
                                            <input type="text" id="middlename" name="middlename"  class="form-control" placeholder="Enter your Middle Name" />
                                        </div>

                                        <div class="col_half ">
                                            <label for="register-form-lastName">Last Name:</label>
                                            <input type="text" id="lastname" name="lastname"  class="form-control" placeholder="Enter your Last Name" />
                                        </div>

                                        <div class="col_half col_last">
                                            <label for="register-form-lastName">Suffix:</label>
                                            <input type="text" id="suffix" name="suffix"  class="form-control" placeholder="Enter your Suffix" />
                                        </div>
                                        
                                        <div class="clear"></div>

                                        <div class="col_half">
                                            <label for="register-form-username">Username:</label>
                                            <input type="text" id="username" name="username"  placeholder="Enter your Username" class="form-control" />
                                        </div>

                                        <div class="col_half col_last">
                                            <label for="register-form-password">Password:</label>
                                            <input type="password" name="password" class="form-control"  minlength="8"  id="password"   placeholder="Enter your Password">
                                        </div>


                                        <div class="col_half">
                                            <label for="register-form-email">Email Address:</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" >
                                        </div>
                             
                                        <div class="clear"></div>


                                        <div class="col_full nobottommargin">
                                            <input type="button" class="button button-blue nomargin" id="btnSave" name="btnSave" value="REGISTER">

                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>

                    </section>
                    <!-- #content end -->

                </div>
                <!-- #wrapper end -->


                <!-- External JavaScripts
	============================================= -->
                <script type="text/javascript" src="../assets/js/jquery.js"></script>
                <script type="text/javascript" src="../assets/js/plugins.js"></script>
                <script  type="text/javascript" src="../assets/js/sweetalert2.all.min.js"></script>
                <!-- Footer Scripts
	============================================= -->
                <script type="text/javascript" src="../assets/js/ajax_functions.js"></script>
                <script type="text/javascript" src="../assets/js/customize.js"></script>
                <script type="text/javascript" src="../assets/js/functions.js"></script>
                <!-- amaran notification  -->
               <script type="text/javascript" src="sweetalert-dev.js"></script>
               <script type="text/javascript" src="sweetalert.min.js"></script>
                <script type="text/javascript" src="../assets/js/jquery.amaran.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

          
             
  <script type="text/javascript">

      $( document ).ready(function() {
        let ipAddress 
        $.getJSON("https://api.ipify.org/?format=json", function(e) {
            ipAddress = e.ip;
        });

        function validateEmail($email) {
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            return emailReg.test( $email );
        }
                        /* Update Function */
           $('#btnSave').on( 'click', function(){

                
           let firstname  = $('#firstname').val();
           let middlename = $('#middlename').val();
           let lastname   = $('#lastname').val();
           let suffix   = $('#suffix').val();
           let username   = $('#username').val();
           let password   = $('#password').val();
           let email   = $('#email').val();
           var passw=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
       
            if(firstname == "" || lastname == ""  || username == "" || password == "" || email == ""){
                  Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Please Complete all Fields!',
                    showConfirmButton: false,
                    timer: 1300
                  })
            }else if(!password.match(passw)){
                   Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Password must contain 1 uppercase, 1 lowercase , 1 numeric! and contain minimum of 8 characters',
                            showConfirmButton: false,
                            timer: 1500
                    })
                    // return false;
            }else if(!validateEmail(email)){
                    Swal.fire({ 
                        position: 'center',
                        icon: 'error',
                        title: 'Please enter a valid email! <br> Sample format - email@gmail.com',
                        showConfirmButton: false,
                        timer: 1500
                    })
            }else{


                  $.ajax({
                  method: 'POST',
                  url: "functions.php",
                  data:   {procedure:"saveUser",firstname:firstname,middlename:middlename,lastname:lastname,suffix:suffix,username:username,password:password,email:email,ipAddress:ipAddress},
                  dataType: "json",
                  success: function(data){							
                    
                      if(data.status =="Success")
                      {
                          Swal.fire({
                            icon: 'success',
                            position: 'center',
                            title: 'User has been saved!',
                            showConfirmButton: false,
                            timer: 1000,
                          }).then((result) => {
                            location.reload();
                          })
                      }else if(data.status == "Failed"){
                          Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Request Failed!',
                            showConfirmButton: false,
                            timer: 1500
                          })
                      }else if(data.status == "Existing"){
                          Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Username is already exist!',
                            showConfirmButton: false,
                            timer: 1500
                          })
                      }
                  }

                });
          }

       });

       $('#btnLogin').on( 'click', function(){
            LoginUser();
        });

        $('#lusername').on('keypress', function (e) {
            if(e.which === 13){
            LoginUser();
            }
        });

        $('#lpassword').on('keypress', function (e) {
            if(e.which === 13){
                LoginUser();
            }
        });

    
    function LoginUser(){

          let username   = $('#lusername').val();
           let password   = $('#lpassword').val();

            if(username == "" || password == "" ){
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
                  data:   {procedure:"loginUser",username:username,password:password},
                  dataType: "json",
                  success: function(data){							
                    
                      if(data.status =="Success")
                      {
                          Swal.fire({
                            icon: 'success',
                            position: 'center',
                            title: 'Successfully Login!',
                            showConfirmButton: false,
                            timer: 1000,
                          }).then((result) => {
                            window.location.href = 'clienthome.php';
                            localStorage.setItem("userId", username)
                          })

                      }else if(data.status == "Failed"){
                          Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Request Failed!',
                            showConfirmButton: false,
                            timer: 1500
                          })
                      }else if(data.status == "Invalid"){
                          Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Username or Password is Incorrect!',
                            showConfirmButton: false,
                            timer: 1500
                          })
                      }
                  }

                });
          }

       }

       

                    //    jQuery.validator.addMethod("passwordCheck",
                    //         function(value, element, param) {
                    //             if (this.optional(element)) {
                    //                 return true;
                    //             } else if (!/[A-Z]/.test(value)) {
                    //                 return false;
                    //             } else if (!/[a-z]/.test(value)) {
                    //                 return false;
                    //             } else if (!/[0-9]/.test(value)) {
                    //                 return false;
                    //             }

                    //             return true;
                    //         },
                    //         "error msg here");

                    //    $('#firstName').on('keypress', function(e) {
                    //         var regex = new RegExp("^[a-zA-Z ]*$");
                    //         var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                    //         if (regex.test(str)) {
                    //         return true;
                    //         }
                    //         e.preventDefault();
                    //         return false;
                    //     });

                    //     $('#lastName').on('keypress', function(e) {
                    //         var regex = new RegExp("^[a-zA-Z ]*$");
                    //         var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                    //         if (regex.test(str)) {
                    //         return true;
                    //         }
                    //         e.preventDefault();
                    //         return false;
                    //     });

                        
                    //     $("#contact").on("keypress keyup blur",function (event) {    
                    //         $(this).val($(this).val().replace(/[^0-9\.]/g,''));
                    //         if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                    //             event.preventDefault();
                    //         }
                    //     });
                                    
          
                  });
          </script>
            </body>

            </html>
