<?php
//get action url for app_start.php page


//echo "<pre>";
//print_r($url);
////die;

//check session set
if(isset($_SESSION['adminRole']) && isAdminLogin()){
//   echo "<pre>";
//   print_r($url);
//   echo "</pre>";
    
      
      
    
    if(!isset($_SESSION['selectCompnayId'])){
      //load constant pages in header
      include_once __DIR__.'/../'.ADMIN_DIR.'/views/top_bar.php';
      include_once __DIR__.'/../'.ADMIN_DIR.'/views/nav_bar.php';
        
       //get company detail
       $data=$main->getAllRecord("company_list"); 
       include_once __DIR__.'/../'.ADMIN_DIR.'/views/select_company.php';
       
       //load footer
       include_once __DIR__.'/../'.ADMIN_DIR.'/views/footer_content.php';
       //exit
       exit();
    }else{
        //fetch selected company data
        $select_company=$main->getSingleRecord("company_list","id",$_SESSION['selectCompnayId']);
    }
    
     //load constant pages in header
      include_once __DIR__.'/../'.ADMIN_DIR.'/views/top_bar.php';
      include_once __DIR__.'/../'.ADMIN_DIR.'/views/nav_bar.php';
    
    switch ($url['1']){
        //load login
        case "login":
        include_once __DIR__.'/../'.ADMIN_DIR.'/views/login.php';
        break;
    
        //load logout
        case "logout":
        include_once __DIR__.'/../'.ADMIN_DIR.'/views/logout.php';
        break;
        
        case "select-company":
         //get company detail
         $data=$main->getAllRecord("company_list"); 
         include_once __DIR__.'/../'.ADMIN_DIR.'/views/select_company.php';
        break;
        
        //load dashboard
        case "dashboard":
        include_once __DIR__.'/../'.ADMIN_DIR.'/views/dashboard.php';
        break;
        
        //product list
        case "product-list":
        //get aa products
        $data=$main->getAllConditionRecords("products","company_id",$_SESSION['selectCompnayId'],"id");
        include_once __DIR__.'/../'.ADMIN_DIR.'/views/product/product_list.php';
        break;
        
        //cash books
        case "cash-book":
         //load view
         include_once __DIR__.'/../'.ADMIN_DIR.'/views/cashbook/links.php';
        break;
    
        //Sale purchase
        case "sale-purchase":
         //load view
         include_once __DIR__.'/../'.ADMIN_DIR.'/views/sale_purchase/links.php';
        break;
    
        //ledger
        case "ledger":
         //load view
         include_once __DIR__.'/../'.ADMIN_DIR.'/views/ledger/links.php';
        break;
    
        //ledger
        case "head-list":
         $data=$main->getAllConditionRecords("account_head","company_id",$_SESSION['selectCompnayId'],"id");
         //load view
         include_once __DIR__.'/../'.ADMIN_DIR.'/views/heads/list.php';
        break;
    
    
        //cash received voucher
        case "cash-received-voucher":
         $data=$main->getAllConditionRecords("voucher","company_id",$_SESSION['selectCompnayId'],"id");
         //load view
         include_once __DIR__.'/../'.ADMIN_DIR.'/views/cashbook/crv/list.php';
        break;
    
        //cash payment voucher
        case "cash-payment-voucher":
         $data=$main->getAllConditionRecords("voucher","company_id",$_SESSION['selectCompnayId'],"id");
         //load view
         include_once __DIR__.'/../'.ADMIN_DIR.'/views/cashbook/cpv/list.php';
        break;
    
        //bank received voucher
        case "bank-receipt-voucher":
         $data=$main->getAllConditionRecords("voucher","company_id",$_SESSION['selectCompnayId'],"id");
         //load view
         include_once __DIR__.'/../'.ADMIN_DIR.'/views/cashbook/brv/list.php';
        break;
    
        //bank-payment-voucher
        case "bank-payment-voucher":
         $data=$main->getAllConditionRecords("voucher","company_id",$_SESSION['selectCompnayId'],"id");
         //load view
         include_once __DIR__.'/../'.ADMIN_DIR.'/views/cashbook/bpv/list.php';
        break;
        
         //journal-voucher
        case "journal-voucher":
         $data=$main->getAllConditionRecords("voucher","company_id",$_SESSION['selectCompnayId'],"id");
         //load view
         include_once __DIR__.'/../'.ADMIN_DIR.'/views/cashbook/jv/list.php';
        break;
    
        
         //sale-voucher
        case "sale-voucher":
         $data=$main->getAllConditionRecords("product_transation","company_id",$_SESSION['selectCompnayId'],"id");
         //load view
         include_once __DIR__.'/../'.ADMIN_DIR.'/views/sale_purchase/sale/sale.php';
        break;
    
         //view sale-voucher
        case "sview":
         if(isset($url[1]) && $url[1]=="sview"){
                     $id= remove_xss($url[2]);   
                    if(empty($id)){
                         SweetAlert("Invoice Number Required.", BASE_URL.ADMIN_DIR."/sale-voucher", "Alert", "error");
                         exit();
                    }
                   //get invoice detail
                   $invoice_data=$main->getSingleRecord("product_transation","id",$id);
                   if($invoice_data=="NO_DATA" || $invoice_data['type']!="1" || $invoice_data['company_id']!=$_SESSION['selectCompnayId']){
                       SweetAlert("Invoice Number Required.", BASE_URL.ADMIN_DIR."/sale-voucher", "Alert", "error");
                       exit();
                   }
                   //get invoice detail
                   $invoice_detail=$main->getAllConditionRecords("product_transation_detail","invoice_id",$id,"id","ASC");
                   //get invoice comapny detail
                   $invoice_company=$main->getSingleRecord("company_list","id",$_SESSION['selectCompnayId']);
                   //get invoice head detail
                   $invoice_head=$main->getSingleRecord("account_head","id",$invoice_data['head_id']);
                   include_once __DIR__.'/../'.ADMIN_DIR.'/views/sale_purchase/sale/view.php';
            }   
       
        break;
        
        
         //purchase-voucher
        case "purchase-voucher":
         $data=$main->getAllConditionRecords("product_transation","company_id",$_SESSION['selectCompnayId'],"id");
         //load view
         include_once __DIR__.'/../'.ADMIN_DIR.'/views/sale_purchase/purchase/purchase.php';
        break;
        
    
        //view purchase-voucher
        case "pview":
         if(isset($url[1]) && $url[1]=="pview"){
                     $id= remove_xss($url[2]);   
                    if(empty($id)){
                         SweetAlert("Invoice Number Required.", BASE_URL.ADMIN_DIR."/purchase-voucher", "Alert", "error");
                         exit();
                    }
                   //get invoice detail
                   $invoice_data=$main->getSingleRecord("product_transation","id",$id);
                   if($invoice_data=="NO_DATA" || $invoice_data['type']!="2" || $invoice_data['company_id']!=$_SESSION['selectCompnayId']){
                       SweetAlert("Invoice Number Required.", BASE_URL.ADMIN_DIR."/purchase-voucher", "Alert", "error");
                       exit();
                   }
                   //get invoice detail
                   $invoice_detail=$main->getAllConditionRecords("product_transation_detail","invoice_id",$id,"id","ASC");
                   //get invoice comapny detail
                   $invoice_company=$main->getSingleRecord("company_list","id",$_SESSION['selectCompnayId']);
                   //get invoice head detail
                   $invoice_head=$main->getSingleRecord("account_head","id",$invoice_data['head_id']);
                   include_once __DIR__.'/../'.ADMIN_DIR.'/views/sale_purchase/purchase/view.php';
            }   
       break;
    
    
        
        
    
        //users get request
        case "users":
            //admin list AND Profile
            if($url[2]=="administrator" && isSuperAdmin()){
              //set list view 
              if(!isset($url[3]) || empty($url[3])){
                //fetch admin data
                $data=$main->getAllRecord("admins");    
                //load list view
                include_once __DIR__.'/../'.ADMIN_DIR.'/views/administrator/admin_list.php';  
                }
                //load admin profile
                else{
                 $id=remove_xss($url[3]);
                 //fetch admin detail
                 $data=$main->getSingleRecord("admins","admin_id",$id);
                  if($data=="NO_DATA"){
                        SweetAlert("No Record Find.", BASE_URL.ADMIN_DIR."/".$url[1]."/".$url[2], "Info", "info");
                   }else{
                      //get admin other detail
                      //get city
                      //$admin_city=$main->getSingleRecord("city","id",$data['city_id']); 
                      $logs=$main->getAllConditionRecords("admin_logs","admin_id",$id,"log_id");
                      //load profile view
                      include_once __DIR__.'/../'.ADMIN_DIR.'/views/administrator/admin_profile.php'; 
                      }
                    
                }
             //end admin views
             }
                //member list AND profile
    elseif($url[2]=="member" && (isSuperAdmin() || isAdmin())){
                        //set list view 
                     if(!isset($url[3]) || empty($url[3])){
                       //fetch users data
                       $data=$main->getAllRecord("users");    
                       //load list view
                       include_once __DIR__.'/../'.ADMIN_DIR.'/views/member/member_list.php';  
                       }
                       //load member profile
                       else{
                        $id=remove_xss($url[3]);
                        //fetch member detail
                        $data=$main->getSingleRecord("users","user_id",$id);
                         if($data=="NO_DATA"){
                               SweetAlert("No Record Find.", BASE_URL.ADMIN_DIR."/".$url[1]."/".$url[2], "Info", "info");
                          }else{
                             //get city
                             //$user_city=$main->getSingleRecord("city","id",$data['city_id']); 
                             $logs=$main->getAllConditionRecords("user_logs","user_id",$id,"log_id");
                             
                             //load profile view
                             include_once __DIR__.'/../'.ADMIN_DIR.'/views/member/member_profile.php'; 
                         }
                     }
            }
            //end member view
            else{
                SweetAlert("Access denied.", BASE_URL.ADMIN_DIR."/", "Info", "info"); 
            }
            //end used view
          break;
          
        /*
         * Report routes
         * sale
         * purchase
         * 
         * 
         */
        
         //load other offers list
        case "report-of-sale-purchase":
        include_once __DIR__.'/../'.ADMIN_DIR.'/views/sale_purchase/report/report.php';
        break; 
          
        //load other offers list
        case "app-basic":
        include_once __DIR__.'/../'.ADMIN_DIR.'/views/appbasic/app_basic_setting.php';
        break;
    
    
        
    
    
    
       //default case
        default:
        include_once __DIR__.'/../'.ADMIN_DIR.'/views/404.php';
    }
    
     include_once __DIR__.'/../'.ADMIN_DIR.'/views/footer_content.php';
    //end login section
}
//login page load
elseif(!isset($_SESSION['adminRole']) && !isAdminLogin() && $url['1']=="login") {
    include_once __DIR__.'/../'.ADMIN_DIR.'/views/login.php';
}
else{
    RedirectURL(BASE_URL.ADMIN_DIR."/login");
}

?>