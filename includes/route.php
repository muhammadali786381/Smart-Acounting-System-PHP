<?php
//get action url for app_start.php page
//echo "<pre>";
//print_r($url);
//
//
//set route for admin and user. 
if($url['0']==ADMIN_DIR){
    include_once __DIR__.'/admin_route.php';
}else {
    include_once __DIR__.'/user_route.php';
}


?>