<?php

 if($url['0']==ADMIN_DIR){
    //load uuser theme head
    include_once __DIR__.'/../'.ADMIN_DIR.'/views/head.php'; 
    //load admin processing file
    include_once __DIR__.'/../includes/admin_processing.php';
    
    
    if(isAdminLogin()){
    $login_user=$main->getSingleRecord("admins","admin_id",$_SESSION['adminId']);
    }
}else{
    //load uuser theme head
    include_once __DIR__.'/../themes/'.$view->app_config("APP_THEME").'/head.php'; 
    
    //load user processing file
    include_once __DIR__.'/../includes/user_processing.php';

    //get user data in case login
    if(isLogin()){
    $login_user=$main->getSingleRecord("users","user_id",$_SESSION['userId']);
    }
}

