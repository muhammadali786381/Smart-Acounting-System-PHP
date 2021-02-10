<?php

if(isset($url['0'])){
    
   if($url['0']==ADMIN_DIR){
       //admin side nav view site
       include_once __DIR__.'/admin_nav_set_view.php';
        
    }else{
        //user side nav view site
        include_once __DIR__.'/user_nav_set_view.php';
        
    }
}
 

?>