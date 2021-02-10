<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Member Portal | <?php echo $view->app_config("APP_SHORT_NAME"); if(isset($_GET['link'])){echo " - ".ucfirst($url[0]);} ?> </title>
    <meta charset="utf-8">
    <!-- Meta -->
    <meta name="keywords" content="" />
    <meta name="author" content="">
    <meta name="robots" content="" />
    <meta name="description" content="" />
  <!-- this styles only adds some repairs on idevices  -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Favicon -->
    <link rel="icon" href="<?php echo BASE_URL ?>uploads/site/<?php echo $view->app_config("APP_FAV_ICON"); ?>" sizes="32x32">
    <link rel="icon" href="<?php echo BASE_URL ?>uploads/site/<?php echo $view->app_config("APP_FAV_ICON"); ?>" sizes="192x192" />
    <link rel="apple-touch-icon" href="<?php echo BASE_URL ?>uploads/site/<?php echo $view->app_config("APP_FAV_ICON"); ?>" />
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo BASE_URL?>vendor/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo BASE_URL;?>vendor/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo BASE_URL;?>vendor/dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo BASE_URL;?>vendor/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo BASE_URL;?>vendor/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- custom style -->
  <link rel="stylesheet" href="<?php echo BASE_URL;?>vendor/custom/cus_style.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo BASE_URL;?>vendor/plugins/summernote/summernote-bs4.css">
  <!-- select2 -->
  <link rel="stylesheet" href="<?php echo BASE_URL;?>vendor/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo BASE_URL;?>vendor/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- ekko-lightbox -->
  <link rel="stylesheet" href="<?php echo BASE_URL;?>vendor/plugins/ekko-lightbox/ekko-lightbox.css">
  
  
  
   <!--Pre REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo BASE_URL?>vendor/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo BASE_URL;?>vendor/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- sweetalert -->
<script type="text/javascript" src="<?php echo BASE_URL;?>vendor/plugins/sweetalert/sweetalert.js"></script>
<!-- select2 -->
<script src="<?php echo BASE_URL;?>vendor/plugins/select2/js/select2.full.min.js"></script>
<?php
if($url[0]!="login" || $url[0]!="register"):
 ?>  
<link rel="stylesheet" href="<?php echo BASE_URL;?>vendor/plugins/floating-wpp/floating-wpp.min.css">
<script src="<?php echo BASE_URL;?>vendor/plugins/floating-wpp/floating-wpp.min.js"></script>
<?php
endif;
?>
<?php
if($url[0]=="login" || $url[0]=="register" || $url[0]=="forget-password"):
 ?>  
<style type="text/css">
.login-page {
background-image:url('<?php echo BASE_URL."uploads/site/body_bg_img_desktop.webp"?>'); no-repeat center center fixed;
background-size: cover;	
}
@media only screen and (max-width: 600px) {
  .login-page{
    <?php
    if($url[0]!="login"){
       echo "height: 100% !important;";   
      } 
    ?>  
  }
}
</style>
<?php
endif;
?>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">