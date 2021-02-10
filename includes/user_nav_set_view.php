<?php
 
       //nav bar for member
       if(isset($_SESSION["userRole"])){
           if(isConsultant()){
           include_once __DIR__.'/../themes/'.$view->app_config("APP_THEME").'/top_bar.php';     
           //load nav bar after login
           include_once __DIR__.'/../themes/'.$view->app_config("APP_THEME").'/nav_bar.php';
           }
       }
       
     

?>