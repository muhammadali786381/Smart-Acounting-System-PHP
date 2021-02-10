<?php

//
//---------------all user input processing-----//
//user login

if(isset($_POST["userLogin"]) && csrf_token_verify($_POST["csrf_token"])){
    
    if(empty($_POST["userMail"]) && empty($_POST["userPass"])){
         AlertMsg("Email or Password Empty", BASE_URL."login");
         exit();
    }
     //clean data
     $mail=remove_xss($_POST["userMail"]);
     $pass=remove_xss($_POST["userPass"]);
     $result=$user->UserLogin($mail,$pass);
     if($result=="error_login"){
     //header("location:".BASE_URL."index.php");
     SweetAlert("Login Fail","login");
    }else{
      //header("location:".BASE_URL."index.php?dashboard");
          $user->insert_user_log($_SESSION['userId'],"login",get_real_user_ip());
            //check account status
            if($user->isUserDelete($_SESSION['userId'])==1){
                SweetAlert("Your account has been deleted.", BASE_URL."logout", "Alert", "error");
                exit();
            }
            if($user->isUserBlock($_SESSION['userId'])==1){
                SweetAlert("Your account has been temporarily blocked. Please contact support at ".$view->app_config("APP_PHONE").".", BASE_URL."logout", "Warning", "warning");
                exit();
            }
          RedirectURL(BASE_URL."dashboard");
    }
    exit();
}

//register by user
if(isset($_POST['createNewMember'])){
    //PostDataArray($_POST);
    //die();
    //check mobile exsit
    if($user->isMobileExist(remove_xss($_POST['mobile']))){
        SweetAlert("Mobile number you have entered is already in use. Please enter unique mobile number.", BASE_URL.$url['0']."/".$url['1'], "Alert", "info");
        exit();
    }
    //check mail exsit
    if($user->isMailExist(remove_xss($_POST['email']))){
        SweetAlert("Email address you have entered is already in use. Please enter unique email address.", BASE_URL.$url['0']."/".$url['1'], "Alert", "info");
        exit();
    }
    //$pass_genrate=rand(100000,999999);
    $pass_genrate=remove_xss($_POST['password']);
    $pass=PASS_SALT_1.remove_xss(md5($pass_genrate)).PASS_SALT_2;
    //insert basic user data into user table
    $id=$main->insert_record("users",
            array(
             "first_name"=> remove_xss($_POST['first_name']),
             "last_name"=> remove_xss($_POST['last_name']),
             "mobile"=> remove_xss($_POST['mobile']),
             "email"=> remove_xss($_POST['email']),
             "agency_name"=> remove_xss($_POST['agency_name']),
             "gender"=> remove_xss($_POST['gender']),
             "city_id"=> remove_xss($_POST['city_id']),
             "password"=> remove_xss($pass)
             ));
             //check user insert reccord
             if($id!=false){
               //store into session for later use
               $_SESSION['RegAccountId']=$id;  
              //send mail
               if(isMailEnable()){
               send_mail(remove_xss($_POST['email']), "Account Activation", $mail_msg, $sms);
               }
               //send sms
               //if(isSMSEnable()){
               if(true){
                //sms on password send  
                $sms="";
                $sms.="Dear ".$_POST['first_name']." \n \n";
                $sms.="Welcome to IMAC (Inventory MAnagement & Coordination portal), Pakistans first real estate inventory management portal for realtors to interact with each other on single click. Your membership registration has been successfully completed with the following credentials: \n \n";
                $sms.="============== \n";
                $sms.="Membership #: ".$id." \n";
                $sms.="PIN: ".$pass_genrate." \n";
                $sms.="============== \n";
                $sms.="For support, contact at: \n ".$view->app_config("APP_PHONE")."";
                send_sms(remove_xss($_POST['mobile']) ,$sms);
                }
               SweetAlert("Your registeration has been successfully completed. Your membership number is ".$id.".", BASE_URL."login", "Congratulations", "success");
               }else{
                SweetAlert("Access denied", BASE_URL."register/1", "ERROR", "error");
                exit();
               }
 exit();  
}



//check cnic on register
if(isset($_POST['ForGetStep1']) && csrf_token_verify($_POST["csrf_token"])){
    //PostDataArray($_POST);
    //die;
    //get Single record by CNIC
    $data=$main->getSingleRecord("users","user_id", remove_xss($_POST['userAccountID']));
    if($data!="NO_DATA"){
        if($data['status']!="Block"){
           $_SESSION['tempUserMail']=$data['email'];
           $_SESSION['tempUserMobile']=$data['mobile'];
           $_SESSION['forGetUserId']=$data['user_id'];
           RedirectURL(BASE_URL."forget-password/2");
        }else{
          SweetAlert("Your account temporarily blocked. Please contact support.", BASE_URL."login", "OOPS!", "error");  
          exit();   
        }
    }else{
       SweetAlert("Your Account ID is not registered with IMAC", BASE_URL.$url['0']."/".$url['1'], "Sorry!", "error"); 
       exit();
    }
 exit();   
}

//check secret code on register
if(isset($_POST['ForGetStep2']) && csrf_token_verify($_POST["csrf_token"]) && isset($_SESSION['forGetUserId'])){
    //PostDataArray($_POST);
    //echo $_SESSION['regCNIC'];
    //die;
    //get Single record by CNIC
    //session_destroy();
    $new_pass=rand(100000,999999);
    $pass=PASS_SALT_1.md5($new_pass).PASS_SALT_2;
    //update password
    $update=$main->update_record("users",["user_id"=>$_SESSION['forGetUserId']],
            [
             "password"=>$pass   
            ]
            );
    if($update=="UPDATED"){
        if(remove_xss($_POST['resetMethod']=="1")){
         //send message to mobile
          $sms="Dear Member \n";
          $sms.="Your New IMAC Password is:".$new_pass."";
          send_sms($_SESSION['tempUserMobile'], $sms);
          session_destroy();
          SweetAlert("Your new password has been sent to  your registered mobile number.", BASE_URL."login","Success", "success"); 
        }elseif(remove_xss($_POST['resetMethod']=="2")){
          $mail="Please find below your credentials for login to your member portal of IMAC: \n"; 
          $mail.="Login ID: ".$_SESSION['forGetUserId']." \n"; 
          $mail.="New Password: ".$new_pass.""; 
          $mail_sent=send_mail_2($_SESSION['tempUserMail'], "IMAC Password Reset", $mail, $mail);
          session_destroy();
          if($mail_sent){
            SweetAlert("Your new password has been sent to  your registered email address.", BASE_URL."login","Success", "success");  
          }else{
             SweetAlert("There is something wrong. Please try again later or contact to IMAC support team.", BASE_URL."login","Alert", "info");   
          }
        }else{
            session_destroy();  
            SweetAlert("Access denied.", BASE_URL."login","ERROR", "error"); 
        }
    }else{
       SweetAlert("No Record Found. Try again with correct cnic", BASE_URL.$url['0']."/".$url['1'], "Alert", "error"); 
       exit();
    }
 exit();   
}










//change password request
if(isset($_POST['chnagePassByUser']) && isLogin()){
    //print_r($_POST);
    
    $oldPass=PASS_SALT_1.md5(remove_xss($_POST['oldUserPass'])).PASS_SALT_2;
    $newPass=PASS_SALT_1.md5(remove_xss($_POST['newUserPass'])).PASS_SALT_2;
    $rePass=PASS_SALT_1.md5(remove_xss($_POST['reNewUserPass'])).PASS_SALT_2;
    
    //get oldpassword for db
    $dbStorePass=$main->getSingleRecord("users", "user_id", $_SESSION['userId']);
    
     //update password if old password match
    if($dbStorePass['password']==$oldPass){
        if($rePass==$newPass){
             //update password
                $result=$main->update_record("users", ["user_id"=>$_SESSION['userId']],[ "password"=>$newPass]);
                if($result=="UPDATED"){
                    $user->insert_user_log($_SESSION['userId'],"Change Password",get_real_user_ip());
                    SweetAlert("Your password has been changed successfully.", BASE_URL."logout","Success","success");
                }else{
                    SweetAlert("Access denied. Please contact support at ".$view->app_config("APP_PHONE")." .", BASE_URL.$url[0],"Error","error");
                }
        
        }else{
          //if password cannot match  
         SweetAlert("Password mismatched.", BASE_URL.$url[0],"Error","error");
        }
       
        
    }else{
        //old password cannot match
         SweetAlert("Old password mismatched.", BASE_URL.$url[0],"Error","error");
    }
exit();    
}


//change Address info by user
if(isset($_POST['chnageAddressInfoByUser']) && isLogin()){
       //update user info
        $result=$main->update_record("users", ["user_id"=>$_SESSION['userId']],[ "phone"=> remove_xss($_POST['phone']),"city_id"=> remove_xss($_POST['city_id'])]);
         if($result=="UPDATED"){
          $user->insert_user_log($_SESSION['userId'],"Change Address Information",get_real_user_ip());
          SweetAlert("Updated successfully.", BASE_URL.$url[0],"Success","success");
         }else{
          SweetAlert("Access denied", BASE_URL.$url[0],"Error","error");
        }
exit();    
}



//update profile Image
if(isset($_POST['editProfileImgByUser']) && isLogin()){
    //print_r($_FILES);
    //die;
    //upload file to server
    $img=file_upload($_FILES['profile'],"uploads/profile/",array('.png','.jpg','.jpeg'));
    if($img!=false){
        //update link
        $result=$main->update_record("users", ["user_id"=>$_SESSION['userId']], ["profile_img"=>$img]);
            if($result=="UPDATED"){
                 $user->insert_user_log($_SESSION['userId'],"Update Profile Image",get_real_user_ip());
                 SweetAlert("Updated successfully.", BASE_URL.$url[0],"Success","success");
            }else{
                SweetAlert("Access denied", BASE_URL.$url[0],"Error","error");
            }
    }else {
        SweetAlert("Access denied. There is some problem in uploading image", BASE_URL.$url[0],"Error","error");
    }
 exit();   
}


//mail verification by user
if(isset($_POST['mailVerficationByUser']) && (isCustomer() || isConsultant())){
    //get user data for data
    $user_detail=$main->getSingleRecord("users", "user_id",$_SESSION['userId']);
    
   if($user_detail['email_verification_code']==$_POST['emailCode']){
    $main->update_record("users", ["user_id"=>$_SESSION['userId']], ["email_verification_code"=>"0"]);
    SweetAlert("Your mail is verified successfuly.", BASE_URL."dashboard","Alert","success");
   }else{
       AlertMsg("Verification code cannot match try again", BASE_URL."verification");
   }
  
 exit();   
}

//mobile verification by user
if(isset($_POST['mobileVerficationByUser']) && (isCustomer() || isConsultant())){
    //get user data for data
    $user_detail=$main->getSingleRecord("users", "user_id",$_SESSION['userId']);
    
   if($user_detail['mobile_verification_code']==$_POST['mobileCode']){
    $main->update_record("users", ["user_id"=>$_SESSION['userId']], ["mobile_verification_code"=>"0"]);
    SweetAlert("Your mobile is verified successfuly.", BASE_URL."dashboard","Alert","success");
   }else{
       AlertMsg("Verification code cannot match try again", BASE_URL."verification");
   }
  
 exit();   
}


//create new Property
if(isset($_POST['createNewProperty']) && isLogin()){
    //PostDataArray($_POST);
    //die();
   $file=null;  
   //check file null
   if($_FILES['file_link']['name']!=""){
      $file= file_upload($_FILES['file_link'], "uploads/property_imges/", array('.PNG','.png','.jpg','.JPG','.jpeg','.JPEG')); 
   }
    //insert basic user data into user table
    $id=$main->insert_record("property_post_list",
            array(
             "property_type_id"=> remove_xss($_POST['property_type_id']),
             "area_unit_id"=> remove_xss($_POST['area_unit_id']),
             "area_size"=> remove_xss($_POST['area_size']),
             "plot_no"=> remove_xss($_POST['plot_no']),
             "st_no"=> remove_xss($_POST['st_no']),
             "sector"=> remove_xss($_POST['sector']),
             "project_name_list_id"=> remove_xss($_POST['project_name_list_id']),
             "city_id"=> remove_xss($_POST['city_id']),
             "property_post_type_id"=>remove_xss($_POST['property_post_type_id']),
             "property_description"=> remove_xss($_POST['property_description']),
             "demand"=> remove_xss($_POST['demand']),
             "bottom_line_amount"=>remove_xss($_POST['bottom_line_amount']),   
             "file_link"=> remove_xss($file),
             "user_id"=> remove_xss($_SESSION['userId'])
             ));
             //check user insert reccord
             if($id!=false){
              //send mail
               if(isMailEnable()){
               send_mail(remove_xss($_POST['email']), "Account Activation", $mail_msg, $sms);
               }
               //send mail
               if(isSMSEnable()){
                send_sms(remove_xss($_POST['mobile']) ,$sms);
                }
               $user->insert_user_log($_SESSION['userId'],"Post New Property",$id); 
               SweetAlert("Your inventory has been added successfully. Inventory ID: ".$id, BASE_URL.$url[0], "Success", "success");
               
               }else{
                   
                SweetAlert("Access denied", BASE_URL.$url[0], "ERROR", "error");
                exit();
                
             }
 exit();  
}


//update Property details
if(isset($_POST['updatePropertybyUser']) && isLogin()){
    //get property details
    $post_data=$main->getSingleRecord("property_post_list","id", remove_xss($_POST['id']));
    if($post_data['user_id']==$_SESSION['userId']){
        $file=null;  
        //check file null
        if($_FILES['file_link']['name']!=""){
           $file= file_upload($_FILES['file_link'], "uploads/property_imges/", array('.PNG','.png','.jpg','.JPG','.jpeg','.JPEG')); 
        }
        //update details
        $result=$main->update_record("property_post_list", ["id"=>remove_xss($_POST['id'])], 
                [
             "property_type_id"=> remove_xss($_POST['property_type_id']),
             "area_unit_id"=> remove_xss($_POST['area_unit_id']),
             "area_size"=> remove_xss($_POST['area_size']),
             "plot_no"=> remove_xss($_POST['plot_no']),
             "st_no"=> remove_xss($_POST['st_no']),
             "sector"=> remove_xss($_POST['sector']),
             "project_name_list_id"=> remove_xss($_POST['project_name_list_id']),
             "city_id"=> remove_xss($_POST['city_id']),
             "property_post_type_id"=>remove_xss($_POST['property_post_type_id']),
             "property_description"=> remove_xss($_POST['property_description']),
             "demand"=> remove_xss($_POST['demand']),
             "bottom_line_amount"=>remove_xss($_POST['bottom_line_amount']),   
             "file_link"=> remove_xss($file),
             "user_id"=> remove_xss($_SESSION['userId'])
                ]
                );
            if($result=="UPDATED"){
                 $user->insert_user_log($_SESSION['userId'],"Update inventorty details",remove_xss($_POST['id']));
                 SweetAlert("Updated successfully.", BASE_URL."postbymeproperty","Success","success");
            }else{
                SweetAlert("Access denied.", BASE_URL."postbymeproperty","Error","error");
            }
    } else {
        SweetAlert("Access denied. There is some problem in uploading file", BASE_URL.$url[0]."/"."$url[1]","Error","error");
    }
 exit();   
}


//update Property Status
if(isset($_POST['updatePropertyStatusByUser']) && isLogin()){
    //print_r($_FILES);
    //die;
    //get post data
    $post_data=$main->getSingleRecord("property_post_list","id", remove_xss($_POST['id']));
    
    if($post_data['user_id']==$_SESSION['userId']){
        //update link
        $result=$main->update_record("property_post_list", ["id"=>remove_xss($_POST['id'])], 
                [
                 "property_post_status_id"=>remove_xss($_POST['property_post_status_id'])
                ]
                );
            if($result=="UPDATED"){
                 $user->insert_user_log($_SESSION['userId'],"Update Post Property Status",remove_xss($_POST['id']));
                 SweetAlert("Updated successfully.", BASE_URL.$url[0],"Success","success");
            }else{
                SweetAlert("Access denied.", BASE_URL.$url[0],"Error","error");
            }
    } else {
        SweetAlert("Access denied. There is some problem in uploading file", BASE_URL.$url[0],"Error","error");
    }
 exit();   
}


//make offer by user
if(isset($_POST['sendOfferByUser']) && isLogin()){
    //PostDataArray($_POST);
    //die();
    $property_data=$main->getSingleRecord("property_post_list","id",remove_xss($_POST['id']));
    //offer sender data
    $sender_person_data=$main->getSingleRecord("users","user_id",$_SESSION['userId']);
    //offer receiver data
    $receiver_person_data=$main->getSingleRecord("users","user_id",$property_data['user_id']);
    $id=$main->insert_record("offer_list",
            array(
             "property_post_list_id"=> remove_xss($_POST['id']),
             "demand_amount"=> remove_xss($_POST['demand_amount']),
             "offer_amount"=> remove_xss($_POST['offer_amount']),
             "user_id"=> remove_xss($_SESSION['userId'])
             ));
             //check user insert reccord
             if($id!=false){
              //send mail
               if(isMailEnable()){
               send_mail(remove_xss($_POST['email']), "Account Activation", $mail_msg, $sms);
               }
               //send mail
               //if(isSMSEnable()){
               if(true){
                 //send sms to sender person
                 $sms_sender_person="Dear Member \n";
                 $sms_sender_person.="Your offer on plot#: ".$property_data['plot_no']." (ID:".remove_xss($_POST['id']).") has been conveyed to the relevant person. You will soon receive a call from our representative.";
                 send_sms(remove_xss($sender_person_data['mobile']) ,$sms_sender_person);
                 //offer reveiver person
                 
                 /* disable reveicer msg
                 $sms_reviver_person="Dear Member \n";
                 $sms_reviver_person.="Hurray, an offer on your inventory id: ".remove_xss($_POST['id'])." has been received. Please login to your IMAC portal and respond accordingly.";
                 send_sms(remove_xss($receiver_person_data['mobile']) ,$sms_reviver_person);
                  */
                 
                 //send sms to portal admin
                 $sms_admin_person="Notification: An offer of ".currency_format(remove_xss($_POST['offer_amount']))." on plot#: ".$property_data['plot_no']." (ID:".remove_xss($_POST['id']).") has been received from ".$sender_person_data['user_id'].". The demand was ".currency_format(remove_xss($_POST['demand_amount']))." ";
                 send_sms(remove_xss($view->app_config("APP_OFFER_RECEIVER_MOBILE")),$sms_admin_person);
                }
               $user->insert_user_log($_SESSION['userId'],"Send Offer On Property","O.ID:".$id." P.ID:".remove_xss($_POST['id'])); 
               if($url[0]=="viewproperty"):
                SweetAlert("Your offer has been conveyed. Offer ID: ".$id, BASE_URL.$url[0]."/".$url[1], "Success", "success");
                else:
                SweetAlert("Your offer has been conveyed. Offer ID: ".$id, BASE_URL.$url[0], "Success", "success"); 
               endif;
               }else{
                SweetAlert("Access denied.", BASE_URL.$url[0], "ERROR", "error");
                exit();
             }
             
    
 exit();  
}


//make new project by user
if(isset($_POST['createNewProject']) && isLogin()){
    //PostDataArray($_POST);
    //die();
    $id=$main->insert_record("project_name_list",
            array(
             "name"=> remove_xss($_POST['name']),
             "description"=> remove_xss($_POST['description']),
             "is_user_create"=> remove_xss("1"),
             "user_id"=> remove_xss($_SESSION['userId'])
             ));
             //check user insert reccord
             if($id!=false){
               SweetAlert("Added Successfully.", BASE_URL.$url[0], "Success", "success");
               }else{
                SweetAlert("Access denied.", BASE_URL.$url[0], "ERROR", "error");
                exit();
             }
 exit();  
}


//create new wanted
if(isset($_POST['createNewWanted']) && isLogin()){
    //PostDataArray($_POST);
    //die();
   
    //insert basic user data into user table
    $id=$main->insert_record("wanted_list",
            array(
             "propject_name_list_id"=> remove_xss($_POST['propject_name_list_id']), 
             "property_post_type_id"=> remove_xss($_POST['property_post_type_id']),
             "property_type_id"=> remove_xss($_POST['property_type_id']),
             "area_unit_id"=> remove_xss($_POST['area_unit_id']),
             "area"=> remove_xss($_POST['area']),
             "st_no"=> remove_xss($_POST['st_no']),
             "sector"=> remove_xss($_POST['sector']),
             "city_id"=> remove_xss($_POST['city_id']),
             "min_range_amount"=> remove_xss($_POST['min_range_amount']),
             "max_range_amount"=> remove_xss($_POST['max_range_amount']),
             "description"=>remove_xss($_POST['description']),
             "user_id"=> remove_xss($_SESSION['userId'])
             )
            );
             //check user insert reccord
             if($id!=false){
              //send mail
               if(isMailEnable()){
               send_mail(remove_xss($_POST['email']), "Account Activation", $mail_msg, $sms);
               }
               //send mail
               if(isSMSEnable()){
                send_sms(remove_xss($_POST['mobile']) ,$sms);
                }
                
               $user->insert_user_log($_SESSION['userId'],"New wanted add.",$id); 
               SweetAlert("Your wanrted has been added successfully. Wanted ID: ".$id, BASE_URL.$url[0], "Success", "success");
               
               }else{
                SweetAlert("Access denied", BASE_URL.$url[0], "ERROR", "error");
                exit();
             }
 exit();  
}



//update wanted Status
if(isset($_POST['updateWantedStatusByUser']) && isLogin()){
    //print_r($_FILES);
    //die;
    //get post data
    $post_data=$main->getSingleRecord("wanted_list","id", remove_xss($_POST['id']));
    //check for owner
    if($post_data['user_id']==$_SESSION['userId']){
        //update status
        $result=$main->update_record("wanted_list", ["id"=>remove_xss($_POST['id'])], 
                [
                 "wanted_status_user_id"=>remove_xss($_POST['property_post_status_id'])
                ]
                );
            if($result=="UPDATED"){
                 $user->insert_user_log($_SESSION['userId'],"Update Wanted Status",remove_xss($_POST['id']));
                 SweetAlert("Updated successfully.", BASE_URL.$url[0],"Success","success");
            }else{
                SweetAlert("Access denied.", BASE_URL.$url[0],"Error","error");
            }
    } else {
        SweetAlert("Access denied. There is some problem in uploading file", BASE_URL.$url[0],"Error","error");
    }
 exit();   
}


//make wanted help by user
if(isset($_POST['WantICanHelp']) && isLogin()){
    PostDataArray($_POST);
    //die();
    //check if offer is allready send
    if($user->isWantedHelpSendByUser($_SESSION['userId'],remove_xss($_POST['wanted_id']))):
        SweetAlert("Access denied.", BASE_URL.$url[0], "ERROR", "error");
        exit();
     endif;
    
    $id=$main->insert_record("wanted_help_list",
            array(
             "wanted_list_id"=> remove_xss($_POST['wanted_id']),
             "user_id"=> remove_xss($_SESSION['userId'])
             ));
             //check user insert reccord
             if($id!=false){
              //send mail
               if(isMailEnable()){
               send_mail(remove_xss($_POST['email']), "Account Activation", $mail_msg, $sms);
               }
               //send mail
               //if(isSMSEnable()){
               if(true){
                 //send sms to portal admin
                 $sms_admin_person="Notification: User ID: ".$_SESSION['userId']." can help with the requirement #".remove_xss($_POST['wanted_id'])."";
                 send_sms(remove_xss($view->app_config("APP_OFFER_RECEIVER_MOBILE")),$sms_admin_person);
                }
               //$user->insert_user_log($_SESSION['userId'],"Send Offer On Property","O.ID:".$id." P.ID:".remove_xss($_POST['id'])); 
               SweetAlert("Your message has been conveyed.", BASE_URL.$url[0], "Success", "success"); 
               }else{
                SweetAlert("Access denied.", BASE_URL.$url[0], "ERROR", "error");
                exit();
             }
 exit();  
}






    






