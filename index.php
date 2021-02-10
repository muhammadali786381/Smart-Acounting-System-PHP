<?php
//pre need pages
include_once __DIR__.'/assets/app_start_1.php';
include_once __DIR__.'/assets/app_start_2.php';
//nav view set form user
include_once __DIR__.'/includes/nav_set_view.php';
//test sms
//send_sms("923062388261" ,"Hello Boss");
//include_once __DIR__.'/assets/phpMailer_config.php';
//echo send_mail_2("zammad.18@gmail.com","Test Mail","Test Mail From IMAC");
//get request responce 
include_once __DIR__.'/includes/route.php'; 

if($url['0']==ADMIN_DIR){
    //load admin footer
    include_once __DIR__.'/'.ADMIN_DIR.'/views/footer.php'; 
}else{
//load user footer
include_once __DIR__.'/themes/'.$view->app_config("APP_THEME").'/footer.php';
}



?>