<!DOCTYPE html>
<!--
Item Name: Elisyam - Web App & Admin Dashboard Template
Version: 1.5
Author: SAEROX

** A license must be purchased in order to legally use this template for your project **
-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CLINIC SYSTEM | HERMOSILLA DENTAL CLINIC</title>
        <meta name="description" content="Elisyam is a Web App and Admin Dashboard Template built with Bootstrap 4">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Google Fonts -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
        <script>
          WebFont.load({
            google: {"families":["Montserrat:400,500,600,700","Noto+Sans:400,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url('design/assets/img/apple-touch-icon.png');?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url('design/assets/img/favicon-32x32.png');?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url('design/assets/img/favicon-16x16.png');?>">
        <!-- Stylesheet -->
        <link rel="stylesheet" href="<?=base_url('design/assets/vendors/css/base/bootstrap.min.css');?>">
        <link rel="stylesheet" href="<?=base_url('design/assets/vendors/css/base/elisyam-1.5.min.css');?>">
        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    </head>
    <body class="bg-fixed-01">
        <!-- Begin Preloader -->
        <div id="preloader">
            <div class="canvas">
                <img src="<?=base_url('design/assets/img/cliniclogo.jpg');?>" alt="logo" class="loader-logo">
                <div class="spinner"></div>   
            </div>
        </div>
        <!-- End Preloader -->
        <!-- Begin Section -->
        <div class="container-fluid h-100 overflow-y">
            <div class="row flex-row h-100">
                <div class="col-12 my-auto">
                    <div class="lock-form mx-auto">
                        <div class="photo-profil">
                            <div class="icon"><i class="la la-unlock"></i></div>
                            <img src="<?=base_url('design/assets/img/cliniclogo.jpg');?>" alt="..." class="img-fluid rounded-circle">
                        </div>
                        <h3>Login to start your session</h3>
                        <form action="<?=base_url('authenticate');?>" method="POST">
                            <div class="group material-input">
                            <input name="username" type="text" required autocomplete="off">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Username</label>
                            </div>
                            <div class="group material-input">
                            <input name="password" type="password" required>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Password</label>
                            </div>                        
                        <div class="button text-center">
                            <button type="submit" class="btn btn-lg btn-gradient-01">
                                Sign in
                            </button>
                        </div>
                        </form>
                        <!-- <div class="back">
                            <a href="db-default.html">It is not you ?</a>
                        </div> -->
                    </div>      
                </div>
            </div>
            <!-- End Container -->
        </div>  
        <!-- End Section -->  
        <!-- Begin Vendor Js -->
        <script src="<?=base_url('design/assets/vendors/js/base/jquery.min.js');?>"></script>
        <script src="<?=base_url('design/assets/vendors/js/base/core.min.js');?>"></script>
        <!-- End Vendor Js -->
        <!-- Begin Page Vendor Js -->
        <script src="<?=base_url('design/assets/vendors/js/app/app.min.js');?>"></script>
        <!-- End Page Vendor Js -->
    </body>
</html>