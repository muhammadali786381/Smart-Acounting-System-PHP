<?php
//get action url for app_start.php page


//echo "<pre>";
//print_r($url);

//die;
//check session set
if(isLogin()){
//    echo "<pre>";
//    print_r($url);
//    echo "</pre>";
//    
     //check Mail verification status for application setting
//    if(($view->app_config("APP_MAIL_VERIFICATION")=="Yes")){
//        
//            if($url['0']=="logout"){
//                
//            include_once __DIR__.'/../themes/'.$view->app_config("APP_THEME").'/logout.php';
//           
//            //route to verification menu
//            }elseif(($user->isMailVerified($login_user['user_id'])!=1)) {
//                
//            $url['0']="verification";
//            
//             }
//        
//    }
//         //check Mobie verification status for application setting
//    if(($view->app_config("APP_MOBILE_VERIFICATION")=="Yes")){
//        
//            if($url['0']=="logout"){
//                
//            include_once __DIR__.'/../themes/'.$view->app_config("APP_THEME").'/logout.php';
//           
//            //route to verification menu
//            }elseif(($user->isMobileVerified($login_user['user_id'])!=1)) {
//                
//            $url['0']="verification";
//            
//             }
//        
//    }
//    
    
    //preload calculate variables used in differnets place 
    $global_total_properties=$main->CountData("id","property_post_list");
    $global_total_properties_available_sale=$main->CountDatTwoCondition("property_post_list","property_type_id","1","property_post_status_id","1");
    $global_total_properties_available_rent=$main->CountDatTwoCondition("property_post_list","property_type_id","2","property_post_status_id","1");
    $global_your_properties_total=$main->CountDataCondition("user_id","property_post_list",$login_user['user_id']); 
    $global_your_properties_sale=$main->CountDatThreeCondition("property_post_list","user_id",$login_user['user_id'],"property_type_id","1","property_post_status_id","4");
    $global_your_properties_rent=$main->CountDatThreeCondition("property_post_list","user_id",$login_user['user_id'],"property_type_id","2","property_post_status_id","3");
    $global_your_offers_sent=$main->CountDataCondition("user_id","offer_list",$login_user['user_id']);
    $global_your_properties_total_available=$global_your_properties_total-($global_your_properties_sale+$global_your_properties_rent);
    $global_your_wanted=$main->CountDatTwoCondition("wanted_list","user_id",$login_user['user_id'],"wanted_status_user_id","1");
    $global_total_wanted=$main->CountDataCondition("wanted_status_user_id","wanted_list","1");
    //preload page
    include_once __DIR__.'/../themes/'.$view->app_config("APP_THEME").'/top_bar.php';
    include_once __DIR__.'/../themes/'.$view->app_config("APP_THEME").'/nav_bar.php';
             
    
    
    switch ($url['0']){
        
        //load login
        case "login":
        include_once __DIR__.'/../themes/'.$view->app_config("APP_THEME").'/login.php';
        break;
    
        //load logout
        case "logout":
        include_once __DIR__.'/../themes/'.$view->app_config("APP_THEME").'/logout.php';
        break;
        
        //load dashboard
        case "dashboard":
         //get properties data
        $data=$main->getAllConditionRecords("property_post_list","property_post_status_id","1","id");   
        include_once __DIR__.'/../themes/'.$view->app_config("APP_THEME").'/dashboard.php';
        break;
    
        //load profile
        case "profile":
         //get user data
           $data=$main->getSingleRecord("users","user_id",$_SESSION['userId']);
            if($data!="NO_DATA"){
               //get city name
               $user_city=$main->getSingleRecord("city","id",$data['city_id']);
               //get document
               //$user_doc=$main->getAllConditionRecords("user_doc_list","user_id",$_SESSION['userId'],"id","ASC");
               //get logs
               $logs=$main->getAllConditionRecords("user_logs","user_id",$_SESSION['userId'],"log_id");
               
               include_once __DIR__.'/../themes/'.$view->app_config("APP_THEME").'/profile/profile.php'; 
            }else{
                SweetAlert("Operation Fail",BASE_URL."dashboard", "Info", "info");
            }
        break;
        
         //load add property
        case "addnewproperty":
        //get user data
        include_once __DIR__.'/../themes/'.$view->app_config("APP_THEME").'/property/add_new_property.php'; 
        break;
        
        //load property list
        case "listofproperty":
         //get data
           $data=$main->getAllConditionRecords("property_post_list","property_post_status_id","1","id");
            if($data!="NO_DATA"){
               include_once __DIR__.'/../themes/'.$view->app_config("APP_THEME").'/property/lists/available_properties_list.php'; 
            }else{
                SweetAlert("Operation Fail",BASE_URL."dashboard", "Info", "info");
            }
        break;
        
        //load for sale property list
        case "availforsale":
         //get data
           $data=$main->getAllConditionRecords("property_post_list","property_post_status_id","1","id");
            if($data!="NO_DATA"){
               include_once __DIR__.'/../themes/'.$view->app_config("APP_THEME").'/property/lists/available_for_sale_properties_list.php'; 
            }else{
                SweetAlert("Operation Fail",BASE_URL."dashboard", "Info", "info");
            }
        break;
        
         //load for rent property list
        case "availforrent":
         //get data
           $data=$main->getAllConditionRecords("property_post_list","property_post_status_id","1","id");
            if($data!="NO_DATA"){
               include_once __DIR__.'/../themes/'.$view->app_config("APP_THEME").'/property/lists/available_for_rent_properties_list.php'; 
            }else{
                SweetAlert("Operation Fail",BASE_URL."dashboard", "Info", "info");
            }
        break;
        
        //load property list by me
        case "postbymeproperty":
         //get user data
           $data=$main->getAllConditionRecords("property_post_list","user_id",$login_user['user_id'],"id");
            if($data!="NO_DATA"){
               include_once __DIR__.'/../themes/'.$view->app_config("APP_THEME").'/property/lists/post_by_me_properties_list.php'; 
            }else{
                SweetAlert("Operation Fail",BASE_URL."dashboard", "Info", "info");
            }
        break;
        
        //load avail property list by me
        case "myavail":
         //get user data
           $data=$main->getAllConditionRecords("property_post_list","user_id",$login_user['user_id'],"id");
            if($data!="NO_DATA"){
               include_once __DIR__.'/../themes/'.$view->app_config("APP_THEME").'/property/lists/my_available_inventory_list.php'; 
            }else{
                SweetAlert("Operation Fail",BASE_URL."dashboard", "Info", "info");
            }
        break;
        
        //load sold property list by me
        case "propertysoldbyme":
         //get user data
           $data=$main->getAllConditionRecords("property_post_list","user_id",$login_user['user_id'],"id");
            if($data!="NO_DATA"){
               include_once __DIR__.'/../themes/'.$view->app_config("APP_THEME").'/property/lists/my_sold_inventory_list.php'; 
            }else{
                SweetAlert("Operation Fail",BASE_URL."dashboard", "Info", "info");
            }
        break;
        
        //load rented property list by me
        case "propertyrentedbyme":
         //get user data
           $data=$main->getAllConditionRecords("property_post_list","user_id",$login_user['user_id'],"id");
            if($data!="NO_DATA"){
               include_once __DIR__.'/../themes/'.$view->app_config("APP_THEME").'/property/lists/my_rented_out_inventory_list.php'; 
            }else{
                SweetAlert("Operation Fail",BASE_URL."dashboard", "Info", "info");
            }
        break;
        
        
        
        //load property list by me
        case "viewproperty":
          if(isset($url[1]) && !empty($url[1])){
                //get data
                $data=array();
                $data['data']=$main->getSingleRecord("property_post_list","id",$url[1]);
                if($data['data']!="NO_DATA"){
                    //get project name
                      $data['project_detail']=$main->getSingleRecord("project_name_list","id",$data['data']['project_name_list_id']);
                    //get city
                      $data['city_detail']=$main->getSingleRecord("city","id",$data['data']['city_id']);
                    //get status
                      $data['status_detail']=$main->getSingleRecord("property_post_status","id",$data['data']['property_post_status_id']);
                    //get area unit 
                      $data['area_unit_detail']=$main->getSingleRecord("area_unit_list","id",$data['data']['area_unit_id']);
                    //get property post type 
                     $data['property_post_type_detail']=$main->getSingleRecord("property_post_type","id",$data['data']['property_type_id']);  
                     //get property type
                     $data['property_type_detail']=$main->getSingleRecord("property_type_list","id",$data['data']['property_post_type_id']);
                    include_once __DIR__.'/../themes/'.$view->app_config("APP_THEME").'/property/view_property.php'; 
                 }else{
                     SweetAlert("Operation Fail",BASE_URL."dashboard", "Info", "info");
                 }
          }else{
              SweetAlert("ID Required.",BASE_URL."listofproperty", "Info", "info");
          }  
        break;
        
        
        //load property list by me
        case "editproperty":
          if(isset($url[1]) && !empty($url[1])){
                //get data
                $data=array();
                $data['data']=$main->getSingleRecord("property_post_list","id",$url[1]);
                if($data['data']!="NO_DATA"){
                    //check property owner
                    if($data['data']['user_id']!=$_SESSION['userId']):
                        SweetAlert("Access denied.",BASE_URL."dashboard", "Info", "error");
                    endif;
                    //get project name
                      $data['project_detail']=$main->getSingleRecord("project_name_list","id",$data['data']['project_name_list_id']);
                    //get city
                      $data['city_detail']=$main->getSingleRecord("city","id",$data['data']['city_id']);
                    //get status
                      $data['status_detail']=$main->getSingleRecord("property_post_status","id",$data['data']['property_post_status_id']);
                    //get area unit 
                      $data['area_unit_detail']=$main->getSingleRecord("area_unit_list","id",$data['data']['area_unit_id']);
                    //get property post type 
                     $data['property_post_type_detail']=$main->getSingleRecord("property_post_type","id",$data['data']['property_type_id']);  
                     //get property type
                     $data['property_type_detail']=$main->getSingleRecord("property_type_list","id",$data['data']['property_post_type_id']);
                    include_once __DIR__.'/../themes/'.$view->app_config("APP_THEME").'/property/edit_property.php'; 
                 }else{
                     SweetAlert("Access denied.",BASE_URL."dashboard", "Info", "info");
                 }
          }else{
              SweetAlert("ID Required.",BASE_URL."listofproperty", "Info", "info");
          }  
        break;
        
        
        //load offers list
        case "myoffers":
         //get data iffers data
           $data=$main->getAllConditionRecords("offer_list","user_id",$_SESSION['userId'],"id");
            if($data!="NO_DATA"){
               include_once __DIR__.'/../themes/'.$view->app_config("APP_THEME").'/offers/offer_list.php'; 
            }else{
                SweetAlert("No Offers Found.",BASE_URL."dashboard", "Info", "info");
            }
        break;
        
        //load add wanted
        case "addwanted":
        //get user data
        include_once __DIR__.'/../themes/'.$view->app_config("APP_THEME").'/wanted/add_new_wanted.php'; 
        break;
    
        //load wanted list by user
        case "mywanted":
         //get data iffers data
           $data=$main->getAllConditionRecords("wanted_list","user_id",$_SESSION['userId'],"id");
            if($data!="NO_DATA"){
               include_once __DIR__.'/../themes/'.$view->app_config("APP_THEME").'/wanted/post_by_me_wanted_list.php'; 
            }else{
                SweetAlert("No Offers Found.",BASE_URL."dashboard", "Info", "info");
            }
        break;
        
        //load wanted list
        case "wantedlist":
         //get data 
           $data=$main->getAllConditionRecords("wanted_list","wanted_status_user_id","1","id");
            if($data!="NO_DATA"){
               include_once __DIR__.'/../themes/'.$view->app_config("APP_THEME").'/wanted/wanted_list.php'; 
            }else{
                SweetAlert("No Wanted Found.",BASE_URL."dashboard", "Info", "info");
            }
        break;
        
        
        
        
    
        
    
        //load verification
        case "verification":
        include_once __DIR__.'/../themes/'.$view->app_config("APP_THEME").'/verification.php';
        break;
    
        //default case
        default:
        include_once __DIR__.'/../themes/'.$view->app_config("APP_THEME").'/dashboard.php';
    }
    
  
    
    
//post page load

include_once __DIR__.'/../themes/'.$view->app_config("APP_THEME").'/footer_content.php';
//end login pages
}

//login page load
elseif(!isset($_SESSION['userRole']) && !isLogin() && $url['0']=="login") {
    include_once __DIR__.'/../themes/'.$view->app_config("APP_THEME").'/login.php';
}
//registration page load
elseif (!isset($_SESSION['userRole']) && !isLogin() && $url['0']=="register") {
    if($url['0']=="register" && $url['1']=="1"){
      include_once __DIR__.'/../themes/'.$view->app_config("APP_THEME").'/register/reg_step_1.php';  
    }elseif($url['0']=="register" && $url['1']=="2" && (isset($_SESSION['regCNIC']))){
       include_once __DIR__.'/../themes/'.$view->app_config("APP_THEME").'/register/reg_step_2.php'; 
    }
    elseif($url['0']=="register" && $url['1']=="3" && (isset($_SESSION['regUserId']))){
       //get user record
       $data=$main->getSingleRecord("users","user_id",$_SESSION['regUserId']);
       include_once __DIR__.'/../themes/'.$view->app_config("APP_THEME").'/register/reg_step_3.php'; 
    }else{
        RedirectURL(BASE_URL."logout");
    }
}
//forget paasword page load
elseif (!isset($_SESSION['userRole']) && !isLogin() && $url['0']=="forget-password"){
    if($url['0']=="forget-password" && $url['1']=="1"){
      include_once __DIR__.'/../themes/'.$view->app_config("APP_THEME").'/password_reset/1.php'; 
    }elseif($url['0']=="forget-password" && $url['1']=="2" && isset($_SESSION['forGetUserId'])){
      include_once __DIR__.'/../themes/'.$view->app_config("APP_THEME").'/password_reset/2.php'; 
    }else{
        RedirectURL(BASE_URL."logout");
    }
    
    
}else{
    RedirectURL(BASE_URL."login");
}

?>