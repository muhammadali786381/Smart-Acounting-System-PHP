<?php

//
//---------------all admin input processing-----//
//admin login

if(isset($_POST["adminLogin"]) && csrf_token_verify($_POST['csrf_token'])){
    
    if(empty($_POST["userMail"]) && empty($_POST["userPass"])){
         AlertMsg("Email or Password Empty", BASE_URL."login");
         exit();
    }
    
    //clean data
     $mail=remove_xss($_POST["userMail"]);
     $pass=remove_xss($_POST["userPass"]);
     
     $result=$user->AdminLogin($mail,$pass);
     if($result=="error_login"){
     SweetAlert("Login Fail.",BASE_URL.ADMIN_DIR."/login");
    }else{
        if(!($user->isAdminActive($_SESSION['adminId']))){
            $user->insert_admin_log($_SESSION['adminId'],"Try login",get_real_user_ip()); 
            SweetAlert("Your account has been deactivate", BASE_URL.ADMIN_DIR."/logout", "Error", "error");
            exit();
        }
      //header("location:".BASE_URL."index.php?dashboard"); 
          $user->insert_admin_log($_SESSION['adminId'],"login",get_real_user_ip());        
	  RedirectURL(BASE_URL.ADMIN_DIR."/dashboard");
    }
    exit();
}

//select company
if(isset($_POST["selectCompanyByAdmin"])){
    //PostDataArray($_POST);
    //die();
    $id=remove_xss($_POST["id"]);
    if(!empty($id)){
        $_SESSION['selectCompnayId']=$id;
        RedirectURL(BASE_URL.ADMIN_DIR."/dashboard");
    }else{
        SweetAlert("Access Denied.", BASE_URL.ADMIN_DIR."/".$url['1'], "Error", "erroe");
    }
    exit();
}

//create new admin user
if(isset($_POST["createNewAdmin"])){
    //PostDataArray($_POST);
    //die();
    //check mail exist
    if($user->isAdminMailExist(remove_xss($_POST['email']))==true){
        SweetAlert("Email already used.", BASE_URL.ADMIN_DIR."/".$url['1']."/".$url['2'], "Info", "info");	 
        exit();
    }
    //check mobile exist
    if($user->isAdminMobileExist(remove_xss($_POST['mobile']))==true){
        SweetAlert("Mobile Number already used.", BASE_URL.ADMIN_DIR."/".$url['1']."/".$url['2'], "Info", "info");	 
        exit();
    }
    
    $passwd=PASS_SALT_1.remove_xss($_POST['password']).PASS_SALT_2;
    $res=$main->insert_record("admins",array(
        "first_name"=> remove_xss($_POST['first_name']),
        "last_name"=> remove_xss($_POST['last_name']),
//      "city_id"=> remove_xss($_POST['city_id']),
        "gender"=> remove_xss($_POST['gender']),
        "email"=> remove_xss($_POST['email']),
        "role"=> remove_xss($_POST['role']),
        "mobile"=> remove_xss($_POST['mobile']),
        "password"=> remove_xss($passwd)
    ));
    
    if($res!=FALSE){
     $user->insert_admin_log($_SESSION['adminId'],"Create New User",$res);     
     SweetAlert("Create successfully", BASE_URL.ADMIN_DIR."/".$url['1']."/".$url['2'], "Alert", "success");
    }else{
        //header("location:".BASE_URL."index.php?users"); 	
	SweetAlert("Operation Fail", BASE_URL.ADMIN_DIR."/".$url['1']."/".$url['2'], "Error", "error");	
    }
exit();
}

//updating users Password by admin
if(isset($_POST["chnagePassByAdminForAdmin"]) && isSuperAdmin()){
    $newpass=PASS_SALT_1.md5($_POST["newUserPass"]).PASS_SALT_2;
    $result=$main->update_record("admins",["admin_id"=> remove_xss($_POST["admin_id"])],["password"=>$newpass]);
    if($result=="UPDATED"){
     $user->insert_admin_log($_SESSION['adminId'],"Update Admin Password",remove_xss($_POST["admin_id"])); 
     SweetAlert("Update successfuly", BASE_URL.ADMIN_DIR."/".$url['1']."/".$url['2']."/".$url['3'], "Alert", "success");
    }else{
    	SweetAlert("Fail to update", BASE_URL.ADMIN_DIR."/".$url['1']."/".$url['2']."/".$url['3'], "Error", "error");	
    }
    
    exit();
}


//updating profile admin
if(isset($_POST["editProfileByAdminForAdmin"]) && isSuperAdmin()){
       //update user status
       $result=$main->update_record("admins",["admin_id"=>remove_xss($_POST["admin_id"])],
               [
           "first_name"=> remove_xss($_POST["first_name"]),
           "last_name"=> remove_xss($_POST["last_name"]),
           "email"=> remove_xss($_POST["email"]),
           "mobile"=> remove_xss($_POST["mobile"]),
           "status"=> remove_xss($_POST["status"]),
           "city_id"=> remove_xss($_POST["city_id"]),        
           ]);
        if($result=="UPDATED"){
            $user->insert_admin_log($_SESSION['adminId'],"Update Admin Profile",remove_xss($_POST["admin_id"])); 
            SweetAlert("Updated Successfully", BASE_URL.ADMIN_DIR."/".$url['1']."/".$url['2']."/".$url['3'], "Success", "success");
        }else{
            SweetAlert("Fail to update", BASE_URL.ADMIN_DIR."/".$url['1']."/".$url['2']."/".$url['3'], "Error", "error");
        }
        
    
    
    exit();
}

//create new member by admin
if(isset($_POST['createNewMember'])){
    //PostDataArray($_POST);
    //die();
    //check mobile exsit
    if($user->isMobileExist(remove_xss($_POST['mobile']))){
        SweetAlert("Mobile already in used.", BASE_URL.ADMIN_DIR."/".$url['1']."/".$url['2'], "Alert", "info");
        exit();
    }
    //check mail exsit
    if($user->isMailExist(remove_xss($_POST['email']))){
        SweetAlert("Mail already in used.", BASE_URL.ADMIN_DIR."/".$url['1']."/".$url['2'], "Alert", "info");
        exit();
    }
    
    $pass=PASS_SALT_1.remove_xss(md5($_POST['password'])).PASS_SALT_2;
    
    //insert basic user data into user table
    $id=$main->insert_record("users",
            array(
             "first_name"=> remove_xss($_POST['first_name']),
             "last_name"=> remove_xss($_POST['last_name']),
             "mobile"=> remove_xss($_POST['mobile']),
             "email"=> remove_xss($_POST['email']),
             "agency_name"=> remove_xss($_POST['agency_name']),
             "gender"=> remove_xss($_POST['gender']),
//             "city_id"=> remove_xss($_POST['city_id']),
             "password"=> remove_xss($pass)
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
                
               $user->insert_admin_log($_SESSION['adminId'],"New member created",remove_xss($id)); 
               SweetAlert("New member created successfuly. Member Account ID: ".$id, BASE_URL.ADMIN_DIR."/".$url['1']."/".$url['2'], "Success", "success");
               
               }else{
                   
                SweetAlert("Operation Fail.", BASE_URL.ADMIN_DIR."/".$url['1']."/".$url['2'], "ERROR", "error");
                exit();
                
             }
             
    
 exit();  
}

//updating profile user
if(isset($_POST["editProfileByAdminForUser"]) && (isSuperAdmin() || isAdmin())){
       //update user status
       $result=$main->update_record("users",["user_id"=>remove_xss($_POST["user_id"])],
               [
           "first_name"=> remove_xss($_POST["first_name"]),
           "last_name"=> remove_xss($_POST["last_name"]),
           "email"=> remove_xss($_POST["email"]),
           "mobile"=> remove_xss($_POST["mobile"]),
           "status"=> remove_xss($_POST["status"]),
           "city_id"=> remove_xss($_POST["city_id"]),        
           ]);
        if($result=="UPDATED"){
            $user->insert_admin_log($_SESSION['adminId'],"Update Member Profile",remove_xss($_POST["user_id"])); 
            SweetAlert("Updated Successfully", BASE_URL.ADMIN_DIR."/".$url['1']."/".$url['2']."/".$url['3'], "Success", "success");
        }else{
            SweetAlert("Fail to update", BASE_URL.ADMIN_DIR."/".$url['1']."/".$url['2']."/".$url['3'], "Error", "error");
        }
    exit();
}

//updating user Password by admin
if(isset($_POST["chnagePassByAdminForUser"]) && isSuperAdmin()){
    $newpass=PASS_SALT_1.md5($_POST["newUserPass"]).PASS_SALT_2;
    $result=$main->update_record("users",["user_id"=>$_POST["user_id"]],["password"=>$newpass]);
    if($result=="UPDATED"){
     $user->insert_admin_log($_SESSION['adminId'],"Update Member Password",remove_xss($_POST["user_id"])); 
     SweetAlert("Update successfuly", BASE_URL.ADMIN_DIR."/".$url['1']."/".$url['2']."/".$url['3'], "Alert", "success");
    }else{
    //header("location:".BASE_URL."index.php?users"); 	
	SweetAlert("Fail to update", BASE_URL.ADMIN_DIR."/".$url['1']."/".$url['2']."/".$url['3'], "Error", "error");	
    }
    
    exit();
}

  
//change password request
if(isset($_POST['updatePassForAdmin']) && isAdminLogin()){
    //print_r($_POST);
    
    $oldPass=PASS_SALT_1.md5(remove_xss($_POST['oldPass'])).PASS_SALT_2;
    $newPass=PASS_SALT_1.md5(remove_xss($_POST['newPass'])).PASS_SALT_2;
    $rePass=PASS_SALT_1.md5(remove_xss($_POST['rePass'])).PASS_SALT_2;
    
    //get oldpassword for db
    $dbStorePass=$main->getSingleRecord("admins", "admin_id", $_SESSION['adminId']);
    
     //update password if old password match
    if($dbStorePass['password']==$oldPass){
        if($rePass==$newPass){
             //update password
                $result=$main->update_record("admins", ["admin_id"=>$_SESSION['adminId']],[ "password"=>$newPass]);
                if($result=="UPDATED"){
                  AlertMsg("Password Changed Successfully.", BASE_URL.ADMIN_DIR."/logout");
                }else{
                    AlertMsg("Problem! Contact to Admin.", BASE_URL.ADMIN_DIR."/dashboard");
                }
        
            
        }else{
            
         AlertMsg("Repassword Cannot Match.", BASE_URL.ADMIN_DIR."/dashboard");
            
        }
       
        
    }else{
         AlertMsg("Old Password Cannot Match.", BASE_URL.ADMIN_DIR."/dashboard");
    }
exit();    
}


//create new head
if(isset($_POST['createNewHead'])){
    
    //insert basic user data into user table
    $id=$main->insert_record("account_head",
            array(
             "company_id"=> remove_xss($_SESSION['selectCompnayId']),
             "company_name"=> remove_xss($_POST['company_name']),
             "owner_name"=> remove_xss($_POST['owner_name']),
             "cell_1"=> remove_xss($_POST['cell_1']),
             "cell_2"=> remove_xss($_POST['cell_2']),
             "address"=> remove_xss($_POST['address']),
             "head_type"=> remove_xss($_POST['head_type'])
             ));
             //check user insert reccord
             if($id!=false){
               $user->insert_admin_log($_SESSION['adminId'],"New head created",remove_xss($id)); 
               SweetAlert("New head created successfully. #:".$id, BASE_URL.ADMIN_DIR."/".$url['1'], "Success", "success");
               }else{
                SweetAlert("Operation Fail.", BASE_URL.ADMIN_DIR."/".$url['1'], "ERROR", "error");
                exit();
             }
             
    
 exit();  
}



//create new C.R.V
if(isset($_POST['createNewCashReceicedVoucher'])){
    $file=null;
    if(!empty($_FILES['file_link']['name'])){
      $file= file_upload($_FILES['file_link'], "uploads/attachment/");  
    }
    //select cr_head
//    if($_SESSION['selectCompnayId']==1){
//        $dr_head=1;
//    }elseif($_SESSION['selectCompnayId']==2){
//        $dr_head=2;
//    }
    
    //insert basic user data into user table
    $id=$main->insert_record("voucher",
            array(
             "type"=> remove_xss("c.r.v"),
             "date"=> remove_xss(db_date_input($_POST['date'])),
             "cr_head_id"=> remove_xss($_POST['cr_head_id']),
             "dr_head_id"=> remove_xss(getCompanyCashHead()),
             "note"=> remove_xss($_POST['note']),
             "amount"=> remove_xss($_POST['amount']),
             "extra_amount"=> remove_xss($_POST['extra_amount']),
             "admin_id"=> remove_xss($_SESSION['adminId']),
             "company_id"=> remove_xss($_SESSION['selectCompnayId']),
             "file_link"=> remove_xss($file),
             ));
             //check user insert reccord
             if($id!=false){
             
               $user->insert_admin_log($_SESSION['adminId'],"New C.R.V voucher created",remove_xss($id)); 
               SweetAlert("New voucher created successfully. #:".$id, BASE_URL.ADMIN_DIR."/".$url['1'], "Success", "success");
               
               }else{
                   
                SweetAlert("Operation Fail.", BASE_URL.ADMIN_DIR."/".$url['1'], "ERROR", "error");
                exit();
                
             }
             
    
 exit();  
}

//create new C.P.V
if(isset($_POST['createNewCashPaymentVoucher'])){
    $file=null;
    if(!empty($_FILES['file_link']['name'])){
      $file= file_upload($_FILES['file_link'], "uploads/attachment/");  
    }
    //select cr_head
//    if($_SESSION['selectCompnayId']==1){
//        $cr_head=1;
//    }elseif($_SESSION['selectCompnayId']==2){
//        $cr_head=2;
//    }
    
    //insert basic user data into user table
    $id=$main->insert_record("voucher",
            array(
             "type"=> remove_xss("c.p.v"),
             "date"=> remove_xss(db_date_input($_POST['date'])),
             "cr_head_id"=> remove_xss(getCompanyCashHead()),
             "dr_head_id"=> remove_xss($_POST['dr_head_id']),
             "note"=> remove_xss($_POST['note']),
             "amount"=> remove_xss($_POST['amount']),
             "extra_amount"=> remove_xss($_POST['extra_amount']),
             "admin_id"=> remove_xss($_SESSION['adminId']),
             "company_id"=> remove_xss($_SESSION['selectCompnayId']),
             "file_link"=> remove_xss($file),
             ));
             //check user insert reccord
             if($id!=false){
             
               $user->insert_admin_log($_SESSION['adminId'],"New C.P.V voucher created",remove_xss($id)); 
               SweetAlert("New voucher created successfully. #:".$id, BASE_URL.ADMIN_DIR."/".$url['1'], "Success", "success");
               
               }else{
                   
                SweetAlert("Operation Fail.", BASE_URL.ADMIN_DIR."/".$url['1'], "ERROR", "error");
                exit();
                
             }
             
    
 exit();  
}

//create new B.R.V
if(isset($_POST['createNewBankReceicedVoucher'])){
    $file=null;
    if(!empty($_FILES['file_link']['name'])){
      $file= file_upload($_FILES['file_link'], "uploads/attachment/");  
    }
    //select cr_head
//    if($_SESSION['selectCompnayId']==1){
//        $dr_head=3;
//    }elseif($_SESSION['selectCompnayId']==2){
//        $dr_head=4;
//    }
    
    //insert basic user data into user table
    $id=$main->insert_record("voucher",
            array(
             "type"=> remove_xss("b.r.v"),
             "date"=> remove_xss(db_date_input($_POST['date'])),
             "cr_head_id"=> remove_xss($_POST['cr_head_id']),
             "dr_head_id"=> remove_xss($_POST['dr_head_id']),
             "note"=> remove_xss($_POST['note']),
             "amount"=> remove_xss($_POST['amount']),
             "extra_amount"=> remove_xss($_POST['extra_amount']),
             "admin_id"=> remove_xss($_SESSION['adminId']),
             "company_id"=> remove_xss($_SESSION['selectCompnayId']),
             "file_link"=> remove_xss($file),
             ));
             //check user insert reccord
             if($id!=false){
             
               $user->insert_admin_log($_SESSION['adminId'],"New B.R.V voucher created",remove_xss($id)); 
               SweetAlert("New voucher created successfully. #:".$id, BASE_URL.ADMIN_DIR."/".$url['1'], "Success", "success");
               
               }else{
                   
                SweetAlert("Operation Fail.", BASE_URL.ADMIN_DIR."/".$url['1'], "ERROR", "error");
                exit();
                
             }
             
    
 exit();  
}

//create new B.P.V
if(isset($_POST['createNewBankPaymentVoucher'])){
    $file=null;
    if(!empty($_FILES['file_link']['name'])){
      $file= file_upload($_FILES['file_link'], "uploads/attachment/");  
    }
//    //select cr_head
//    if($_SESSION['selectCompnayId']==1){
//        $cr_head=3;
//    }elseif($_SESSION['selectCompnayId']==2){
//        $cr_head=4;
//    }
//    
    //insert basic user data into user table
    $id=$main->insert_record("voucher",
            array(
             "type"=> remove_xss("b.p.v"),
             "date"=> remove_xss(db_date_input($_POST['date'])),
             "cr_head_id"=> remove_xss($_POST['cr_head_id']),
             "dr_head_id"=> remove_xss($_POST['dr_head_id']),
             "note"=> remove_xss($_POST['note']),
             "amount"=> remove_xss($_POST['amount']),
             "extra_amount"=> remove_xss($_POST['extra_amount']),
             "admin_id"=> remove_xss($_SESSION['adminId']),
             "company_id"=> remove_xss($_SESSION['selectCompnayId']),
             "file_link"=> remove_xss($file),
             ));
             //check user insert reccord
             if($id!=false){
             
               $user->insert_admin_log($_SESSION['adminId'],"New B.P.V voucher created",remove_xss($id)); 
               SweetAlert("New voucher created successfully. #:".$id, BASE_URL.ADMIN_DIR."/".$url['1'], "Success", "success");
               
               }else{
                   
                SweetAlert("Operation Fail.", BASE_URL.ADMIN_DIR."/".$url['1'], "ERROR", "error");
                exit();
                
             }
             
    
 exit();  
}


//create new J.V
if(isset($_POST['createNewJournalVoucher'])){
    $file=null;
    if(!empty($_FILES['file_link']['name'])){
      $file= file_upload($_FILES['file_link'], "uploads/attachment/");  
    }
    
    
    //insert basic user data into user table
    $id=$main->insert_record("voucher",
            array(
             "type"=> remove_xss("j.v"),
             "date"=> remove_xss(db_date_input($_POST['date'])),
             "cr_head_id"=> remove_xss($_POST['cr_head_id']),
             "dr_head_id"=> remove_xss($_POST['dr_head_id']),
             "note"=> remove_xss($_POST['note']),
             "amount"=> remove_xss($_POST['amount']),
             "extra_amount"=> remove_xss($_POST['extra_amount']),
             "admin_id"=> remove_xss($_SESSION['adminId']),
             "company_id"=> remove_xss($_SESSION['selectCompnayId']),
             "file_link"=> remove_xss($file),
             ));
             //check user insert reccord
             if($id!=false){
               $user->insert_admin_log($_SESSION['adminId'],"New J.V voucher created",remove_xss($id)); 
               SweetAlert("New voucher created successfully. #:".$id, BASE_URL.ADMIN_DIR."/".$url['1'], "Success", "success");
               }else{
                   
                SweetAlert("Operation Fail.", BASE_URL.ADMIN_DIR."/".$url['1'], "ERROR", "error");
                exit();
                
             }
             
    
 exit();  
}



//create new sales invoice Voucher
if(isset($_POST['createNewSaleVoucher'])){
    if(!is_numeric($_POST['inv_total'])){
       SweetAlert("Access Denied", BASE_URL.$url['0']."/".$url['1'], "ERROR", "error"); 
      exit();
    }
    //PostDataArray($_POST);
    //die;
    $sale_total=0;
    $buy_total=0;
     $inv=$main->insert_record("product_transation",array(
        "prefix_id"=>remove_xss($view->app_config("APP_SALE_INV_PREFIX")),
        "date"=> remove_xss(db_date_input($_POST['inv_date'])),
        "type"=> remove_xss(1),
        "head_id"=> remove_xss($_POST['head_id']),
        "company_id"=> remove_xss($_SESSION['selectCompnayId']),
        "note"=> remove_xss($_POST['note']),
        "sale_total"=> remove_xss($_POST['inv_total']),
        "buy_total"=> remove_xss(0.00),
        "admin_id"=> remove_xss($_SESSION['adminId'])
     ));
     if($inv!=FALSE){
         $id=FALSE;
         if(is_array($_POST['qty'])){
             $count=count($_POST['qty']);
             $i=0;
             for($i;$i<$count;$i++){
                 //get product detail
                 $pdetail=$main->getSingleRecord("products","id",$_POST['product_id'][$i]);
                 //calculate total
                 $sale_total+=($_POST['qty'][$i]*$_POST['price'][$i]);
                 $buy_total+=($_POST['qty'][$i]*$pdetail['buy_price']);
             $id=$main->insert_record("product_transation_detail",array(
                    "company_id"=> remove_xss($_SESSION['selectCompnayId']),
                    "invoice_id"=>remove_xss($inv),
                    "date"=> remove_xss(db_date_input($_POST['inv_date'])),
                    "type"=> remove_xss(1),
                    "product_id"=>remove_xss($_POST['product_id'][$i]),
                    "qty"=>remove_xss($_POST['qty'][$i]),
                    "sale_price"=>remove_xss($_POST['price'][$i]),
                    "buy_price"=>remove_xss($pdetail['buy_price'])
                ));
             }
         }
         if($id!=FALSE){
             //update invoice Price
             $invoice_update=$main->update_record("product_transation",["id"=>$inv],["sale_total"=>$sale_total,"buy_total"=>$buy_total]);
             //genrate voucher
             $voucher=$main->insert_record("voucher",
                array(
                 "type"=> remove_xss("s.v"),
                 "date"=> remove_xss(db_date_input($_POST['inv_date'])),
                 "cr_head_id"=> remove_xss($_POST['head_id']),
                 "dr_head_id"=> remove_xss(getCompanyCashHead()),
                 "note"=> remove_xss($_POST['note']),
                 "amount"=> remove_xss($sale_total),
                 "extra_amount"=> remove_xss(0.00),
                 "admin_id"=> remove_xss($_SESSION['adminId']),
                 "company_id"=> remove_xss($_SESSION['selectCompnayId']),
                 "product_transaction_id"=> remove_xss($inv) 
                 ));
            //insert logs
             $user->insert_admin_log($_SESSION['adminId'],"New Sale created",remove_xss($inv)); 
            SweetAlert("Added Successfuly. Invoice Number: . $inv . Voucher Number: $voucher", BASE_URL.$url['0']."/".$url['1'], "Success", "success");
         }else{
              //delete_record();
             $main->deleteRecord("product_transation_detail","invoice_id",$inv);
             $main->deleteRecord("product_transation","id",$inv);
             SweetAlert("Fail.", BASE_URL.$url['0']."/".$url['1'], "ERROR", "error");
         }
     }
     
   
   exit(); 
}


//create new purchase invoice Voucher
if(isset($_POST['createNewPurchaseVoucher'])){
    if(!is_numeric($_POST['inv_total'])){
       SweetAlert("Access Denied", BASE_URL.$url['0']."/".$url['1'], "ERROR", "error"); 
      exit();
    }
    //PostDataArray($_POST);
    //die;
    $sale_total=0;
    $buy_total=0;
     $inv=$main->insert_record("product_transation",array(
        "prefix_id"=>remove_xss($view->app_config("APP_PURCHASE_INV_PREFIX")),
        "date"=> remove_xss(db_date_input($_POST['inv_date'])),
        "type"=> remove_xss(2),
        "head_id"=> remove_xss($_POST['head_id']),
        "company_id"=> remove_xss($_SESSION['selectCompnayId']),
        "note"=> remove_xss($_POST['note']),
        "sale_total"=> remove_xss(0.00),
        "buy_total"=> remove_xss($_POST['inv_total']),
        "admin_id"=> remove_xss($_SESSION['adminId'])
     ));
     if($inv!=FALSE){
         $id=FALSE;
         if(is_array($_POST['qty'])){
             $count=count($_POST['qty']);
             $i=0;
             for($i;$i<$count;$i++){
                 //get product detail
                 $pdetail=$main->getSingleRecord("products","id",$_POST['product_id'][$i]);
                 //calculate total
                 $buy_total+=($_POST['qty'][$i]*$_POST['price'][$i]);
                 $sale_total+=($_POST['qty'][$i]*$pdetail['sale_price']);
             $id=$main->insert_record("product_transation_detail",array(
                    "company_id"=> remove_xss($_SESSION['selectCompnayId']),   
                    "invoice_id"=>remove_xss($inv),
                    "date"=> remove_xss(db_date_input($_POST['inv_date'])),
                    "type"=> remove_xss(2),
                    "product_id"=>remove_xss($_POST['product_id'][$i]),
                    "qty"=>remove_xss($_POST['qty'][$i]),
                    "sale_price"=>remove_xss($pdetail['buy_price']),
                    "buy_price"=>remove_xss($_POST['price'][$i])
                ));
             }
         }
         if($id!=FALSE){
             //update invoice Price
             $invoice_update=$main->update_record("product_transation",["id"=>$inv],["sale_total"=>$sale_total,"buy_total"=>$buy_total]);
             //genrate voucher
             $voucher=$main->insert_record("voucher",
                array(
                 "type"=> remove_xss("p.v"),
                 "date"=> remove_xss(db_date_input($_POST['inv_date'])),
                 "cr_head_id"=> remove_xss(getCompanyCashHead()),
                 "dr_head_id"=> remove_xss($_POST['head_id']),
                 "note"=> remove_xss($_POST['note']),
                 "amount"=> remove_xss($buy_total),
                 "extra_amount"=> remove_xss(0.00),
                 "admin_id"=> remove_xss($_SESSION['adminId']),
                 "company_id"=> remove_xss($_SESSION['selectCompnayId']),
                 "product_transaction_id"=> remove_xss($inv) 
                 ));
            //insert logs
             $user->insert_admin_log($_SESSION['adminId'],"New Sale created",remove_xss($inv)); 
            SweetAlert("Added Successfuly. Invoice Number: . $inv . Voucher Number: $voucher", BASE_URL.$url['0']."/".$url['1'], "Success", "success");
         }else{
              //delete_record();
             $main->deleteRecord("product_transation_detail","invoice_id",$inv);
             $main->deleteRecord("product_transation","id",$inv);
             SweetAlert("Fail.", BASE_URL.$url['0']."/".$url['1'], "ERROR", "error");
         }
     }
     
   
   exit(); 
}


//update application setting
  if(isset($_POST['updateAppSetting'])){
      //echo "<pre>";
      //print_r($_POST);
      $result=array();
      $result['1']=$main->update_record("setting", ["key_value"=>"APP_NAME"], ["value"=>$_POST['APP_NAME']]);
      $result['2']=$main->update_record("setting", ["key_value"=>"APP_SHORT_NAME"], ["value"=>$_POST['APP_SHORT_NAME']]);
      $result['3']=$main->update_record("setting", ["key_value"=>"APP_CURRENCY_NAME"], ["value"=>$_POST['APP_CURRENCY_NAME']]);
      $result['5']=$main->update_record("setting", ["key_value"=>"APP_CURRENCY_SYMBOL"], ["value"=>$_POST['APP_CURRENCY_SYMBOL']]);
      $result['6']=$main->update_record("setting", ["key_value"=>"APP_PHONE"], ["value"=>$_POST['APP_PHONE']]);
      $result['7']=$main->update_record("setting", ["key_value"=>"APP_DASHBOARD_NAME"], ["value"=>$_POST['APP_DASHBOARD_NAME']]);
      
     //print_r($result);
      if(!in_array("false",$result)){
           SweetAlert("Update Successfuly", BASE_URL.$url['0']."/".$url['1'], "Success", "success");
      }else{
          SweetAlert("Fail.", BASE_URL.$url['0']."/".$url['1'], "ERROR", "error");
      }
      
      exit();
  }
  
//update logo
  if(isset($_POST['updateSystemLogo'])){
      $file= file_upload($_FILES['file'], "uploads/site/",array('.png','.jpg'));
     if($file!=FALSE){
         $result=$main->update_record("setting", ["key_value"=>"APP_INVOICE_LOGO"], ["value"=>$file]);
         if($result=="UPDATED"){
              SweetAlert("Update Successfuly", BASE_URL.$url['0']."/".$url['1'], "Success", "success");
         }else{
             SweetAlert("Fail.", BASE_URL.$url['0']."/".$url['1'], "ERROR", "error");
         }
     } else {
         SweetAlert("File Cannot upload. Try again", BASE_URL.$url['0']."/".$url['1'], "ERROR", "error");
     }
      exit();
  }  
  
  
//update Applogo
  if(isset($_POST['updateAppLogo'])){
      $file= file_upload($_FILES['file'], "uploads/site/",array('.png','.jpg'));
     if($file!=FALSE){
         $result=$main->update_record("setting", ["key_value"=>"APP_APP_LOGO"], ["value"=>$file]);
         if($result=="UPDATED"){
              SweetAlert("Update Successfuly", BASE_URL.$url['0']."/".$url['1'], "Success", "success");
         }else{
             SweetAlert("Fail.", BASE_URL.$url['0']."/".$url['1'], "ERROR", "error");
         }
     } else {
         SweetAlert("File Cannot upload. Try again", BASE_URL.$url['0']."/".$url['1'], "ERROR", "error");
     }
      exit();
  }  
  
  
  
  //update AppFavIcon
  if(isset($_POST['updateFavIcon'])){
      $file= file_upload($_FILES['file'], "uploads/site/",array('.png','.jpg'));
     if($file!=FALSE){
         $result=$main->update_record("setting", ["key_value"=>"APP_FAV_ICON"], ["value"=>$file]);
         if($result=="UPDATED"){
              SweetAlert("Update Successfuly", BASE_URL.$url['0']."/".$url['1'], "Success", "success");
         }else{
             SweetAlert("Fail.", BASE_URL.$url['0']."/".$url['1'], "ERROR", "error");
         }
     } else {
         SweetAlert("File Cannot upload. Try again", BASE_URL.$url['0']."/".$url['1'], "ERROR", "error");
     }
      exit();
  } 
  
 
   //update AppSideBarLogo
  if(isset($_POST['updateSideBarLogo'])){
      $file= file_upload($_FILES['file'], "uploads/site/",array('.png','.jpg'));
     if($file!=FALSE){
         $result=$main->update_record("setting", ["key_value"=>"APP_SIDEBAR_LOGO"], ["value"=>$file]);
         if($result=="UPDATED"){
              SweetAlert("Update Successfuly", BASE_URL.$url['0']."/".$url['1'], "Success", "success");
         }else{
             SweetAlert("Fail.", BASE_URL.$url['0']."/".$url['1'], "ERROR", "error");
         }
     } else {
         SweetAlert("File Cannot upload. Try again", BASE_URL.$url['0']."/".$url['1'], "ERROR", "error");
     }
      exit();
  }
  
  
//create products
if(isset($_POST['createNewProduct'])){
    //default image
    $file="placeholderproduct.png";
    //upload file
    if(!empty($_FILES["file"]["name"])){
        $file= file_upload($_FILES["file"], "uploads/products/");
    }
    
    $res=$main->insert_record("products",array(
        "company_id"=> remove_xss($_SESSION['selectCompnayId']),
        "name"=> remove_xss($_POST['name']),
        "buy_price"=> remove_xss($_POST['buy_price']),
        "sale_price"=> remove_xss($_POST['sale_price']),
        "file_link"=> remove_xss($file),
        "description"=> remove_xss($_POST['description'])
    ));
    if($res!=FALSE){
        SweetAlert("Added Successfuly", BASE_URL.$url['0']."/".$url['1'], "Success", "success");
    }else{
        SweetAlert("Fail.", BASE_URL.$url['0']."/".$url['1'], "ERROR", "error");
    }
   exit(); 
}

//update products price
if(isset($_POST['updateProductPrice'])){
    //get Product detail
    $get_product=$main->getSingleRecord("products","id", remove_xss($_POST['id']));
    //insert price update log
    if($get_product!="NO_DATA"){
        $price_update_logs=$main->insert_record("product_price_update_logs",array(
            "product_id"=> remove_xss(remove_xss($_POST['id'])),
            "old_buy_price"=> remove_xss($get_product['buy_price']),
            "new_buy_price"=> remove_xss($_POST['buy_price']),
            "old_sale_price"=> remove_xss($get_product['sale_price']),
            "new_sale_price"=> remove_xss($_POST['sale_price']),
            "company_id"=> remove_xss($_SESSION['selectCompnayId']),
            "admin_id"=> remove_xss($_SESSION['adminId'])
        ));    
    }
    
    $res=$main->update_record("products",["id"=>remove_xss($_POST['id'])],["sale_price"=>remove_xss($_POST['sale_price']),"buy_price"=>remove_xss($_POST['buy_price'])]);
    if($res=="UPDATED"){
        SweetAlert("Update Successfuly", BASE_URL.$url['0']."/".$url['1'], "Success", "success");
    }else{
        SweetAlert("Fail.", BASE_URL.$url['0']."/".$url['1'], "ERROR", "error");
    }
   exit(); 
}































/*
 * Reports processing in next update change into speart file
 *
 */

if(isset($_POST['productReportQuery'])){
    $from_date= remove_xss(db_date_input($_POST['from_date']));
    $to_date= remove_xss(db_date_input($_POST['to_date']));
    $product_id= remove_xss($_POST['product_id']);
    //get product detai;
    $get_product_detail=$main->getSingleRecord("products","id",$product_id);
    //get list
    $data=$main->getDateRangeRecord("product_transation_detail","date",$from_date,$to_date,"id","ASC");
    
    return;
}
    



    






