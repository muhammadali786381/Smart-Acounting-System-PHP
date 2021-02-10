<?php
//pre need pages
include_once __DIR__.'/assets/app_start_1.php';

if(isAdminLogin()){
    //load admin ajax
   include_once __DIR__.'/includes/admin_ajax_processing.php'; 
}else{
    //load user ajax
   include_once __DIR__.'/includes/user_ajax_processing.php'; 
}



