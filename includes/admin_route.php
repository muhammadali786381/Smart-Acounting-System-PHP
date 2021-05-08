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
      //checkPermission();
    
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
        if(!isSuperAdmin() && !isAccountant()):
        SweetAlert("Access Deined!", BASE_URL.ADMIN_DIR."/dashboard", "Alert", "error");    
        else:
        //get aa products
        $data=$main->getAllConditionRecords("products","company_id",$_SESSION['selectCompnayId'],"id");
        include_once __DIR__.'/../'.ADMIN_DIR.'/views/product/product_list.php';  
        endif;    
        
        break;
        
        //product list
        case "update-head-routes":
        if(!isSuperAdmin() && !isAccountant()):
        SweetAlert("Access Deined!", BASE_URL.ADMIN_DIR."/dashboard", "Alert", "error");    
        else:
        //get all head
        $data=$main->getAllConditionRecords("account_head","company_id",$_SESSION['selectCompnayId'],"id");
        include_once __DIR__.'/../'.ADMIN_DIR.'/views/heads/head_route.php';  
        endif;    
        break;
        
        //product list
        case "add-head-route":
        if(!isSuperAdmin() && !isAccountant()):
        SweetAlert("Access Deined!", BASE_URL.ADMIN_DIR."/dashboard", "Alert", "error");    
        else:
        //get aa products
        $data=$main->getAllConditionRecords("head_route","company_id",$_SESSION['selectCompnayId'],"id");
        include_once __DIR__.'/../'.ADMIN_DIR.'/views/routes/list.php';  
        endif;    
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
    
        //head list
        case "head-list":
         if(!isSuperAdmin() && !isAccountant()):
        SweetAlert("Access Deined!", BASE_URL.ADMIN_DIR."/dashboard", "Alert", "error");    
        else:   
         $data=$main->getAllConditionRecords("account_head","company_id",$_SESSION['selectCompnayId'],"id");
         //load view
         include_once __DIR__.'/../'.ADMIN_DIR.'/views/heads/list.php';
        endif;
        break;
        
       //ledger
        case "head-open-balance":
         if(!isSuperAdmin()):
        SweetAlert("Access Deined!", BASE_URL.ADMIN_DIR."/dashboard", "Alert", "error");    
        else:   
         $data=$main->getAllConditionRecords("account_head","company_id",$_SESSION['selectCompnayId'],"id");
         //load view
         include_once __DIR__.'/../'.ADMIN_DIR.'/views/heads/head_open_balance.php';
        endif;
        break; 
        
        
       //trille-balance list
        case "trille-balance":
         if(!isSuperAdmin() && !isAccountant() && !isAdmin()):
        SweetAlert("Access Deined!", BASE_URL.ADMIN_DIR."/dashboard", "Alert", "error");    
        else:   
         $data=$main->getAllConditionRecords("account_head","company_id",$_SESSION['selectCompnayId'],"id");
         //load view
         include_once __DIR__.'/../'.ADMIN_DIR.'/views/ledger/teller_balance/tb_report.php';
        endif;
        break; 
    
        //ledger-route-print
        case "ledger-route-print":
         if(!isSuperAdmin() && !isAccountant() && !isAdmin()):
        SweetAlert("Access Deined!", BASE_URL.ADMIN_DIR."/dashboard", "Alert", "error");    
        else:   
         $data=$main->getAllConditionRecords("account_head","company_id",$_SESSION['selectCompnayId'],"id");
        //get route detail
        $route_detail="NO_DATA";
            if(isset($_POST['route_id'])){
                $route_detail=$main->getSingleRecord("head_route","id", remove_xss($_POST['route_id'])); 
             }
         //load view
         include_once __DIR__.'/../'.ADMIN_DIR.'/views/ledger/ledger_route/report.php';
        endif;
        break; 
    
        //cash received voucher
        case "cash-received-voucher":
         if(!isSuperAdmin() && !isAccountant()):
        SweetAlert("Access Deined!", BASE_URL.ADMIN_DIR."/dashboard", "Alert", "error");    
        else:   
         $data=$main->getAllConditionRecords("voucher","company_id",$_SESSION['selectCompnayId'],"id");
         //load view
         include_once __DIR__.'/../'.ADMIN_DIR.'/views/cashbook/crv/list.php';
        endif; 
        break;
    
        //cash payment voucher
        case "cash-payment-voucher":
        if(!isSuperAdmin() && !isAccountant()):
        SweetAlert("Access Deined!", BASE_URL.ADMIN_DIR."/dashboard", "Alert", "error");    
        else:    
         $data=$main->getAllConditionRecords("voucher","company_id",$_SESSION['selectCompnayId'],"id");
         //load view
         include_once __DIR__.'/../'.ADMIN_DIR.'/views/cashbook/cpv/list.php';
        endif;
        break;
    
        //bank received voucher
        case "bank-receipt-voucher":
        if(!isSuperAdmin() && !isAccountant()):
        SweetAlert("Access Deined!", BASE_URL.ADMIN_DIR."/dashboard", "Alert", "error");    
        else:    
         $data=$main->getAllConditionRecords("voucher","company_id",$_SESSION['selectCompnayId'],"id");
         //load view
         include_once __DIR__.'/../'.ADMIN_DIR.'/views/cashbook/brv/list.php';
        endif; 
        break;
    
        //bank-payment-voucher
        case "bank-payment-voucher":
        if(!isSuperAdmin() && !isAccountant()):
        SweetAlert("Access Deined!", BASE_URL.ADMIN_DIR."/dashboard", "Alert", "error");    
        else:    
         $data=$main->getAllConditionRecords("voucher","company_id",$_SESSION['selectCompnayId'],"id");
         //load view
         include_once __DIR__.'/../'.ADMIN_DIR.'/views/cashbook/bpv/list.php';
        endif; 
        break;
        
         //journal-voucher
        case "journal-voucher":
        if(!isSuperAdmin() && !isAccountant()):
        SweetAlert("Access Deined!", BASE_URL.ADMIN_DIR."/dashboard", "Alert", "error");    
        else:    
         $data=$main->getAllConditionRecords("voucher","company_id",$_SESSION['selectCompnayId'],"id");
         //load view
         include_once __DIR__.'/../'.ADMIN_DIR.'/views/cashbook/jv/list.php';
        endif; 
        break;
    
        
         //sale-voucher
        case "sale-voucher":
         if(!isSuperAdmin() && !isAccountant()):
        SweetAlert("Access Deined!", BASE_URL.ADMIN_DIR."/dashboard", "Alert", "error");    
        else:   
         $data=$main->getAllConditionRecords("product_transation","company_id",$_SESSION['selectCompnayId'],"id");
         //load view
         include_once __DIR__.'/../'.ADMIN_DIR.'/views/sale_purchase/sale/sale.php';
         endif;
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
                   //get and calculate last balance of party
                          $cr=$main->sumValues("voucher","amount","cr_head_id",$invoice_data['head_id']);
                          $dr=$main->sumValues("voucher","amount","dr_head_id",$invoice_data['head_id']);
                          //add last opening balance
                          $cr+=$invoice_head['opening_cr_balance'];
                          $dr+=$invoice_head['opening_dr_balance'];
                          //calculate party balance
                          $last_balance=$cr-$dr;
                   include_once __DIR__.'/../'.ADMIN_DIR.'/views/sale_purchase/sale/view.php';
            }   
       
        break;
        
        
         //purchase-voucher
        case "purchase-voucher":
         if(!isSuperAdmin() && !isAccountant()):
        SweetAlert("Access Deined!", BASE_URL.ADMIN_DIR."/dashboard", "Alert", "error");    
        else:   
         $data=$main->getAllConditionRecords("product_transation","company_id",$_SESSION['selectCompnayId'],"id");
         //load view
         include_once __DIR__.'/../'.ADMIN_DIR.'/views/sale_purchase/purchase/purchase.php';
        endif; 
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
                   //get and calculate last balance of party
                          $cr=$main->sumValues("voucher","amount","cr_head_id",$invoice_data['head_id']);
                          $dr=$main->sumValues("voucher","amount","dr_head_id",$invoice_data['head_id']);
                          //add last opening balance
                          $cr+=$invoice_head['opening_cr_balance'];
                          $dr+=$invoice_head['opening_dr_balance'];
                          //calculate party balance
                          $last_balance=$cr-$dr;
                   include_once __DIR__.'/../'.ADMIN_DIR.'/views/sale_purchase/purchase/view.php';
            }   
       break;
    
    
        
        
    
        //users get request
        case "users":
       if(!isSuperAdmin()):
        SweetAlert("Access Deined!", BASE_URL.ADMIN_DIR."/dashboard", "Alert", "error");    
        else:  
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
           endif; 
          break;
          
        /*
         * Report routes
         * sale
         * purchase
         * 
         * 
         */
        
         //report
        case "report-of-sale-purchase":
        include_once __DIR__.'/../'.ADMIN_DIR.'/views/sale_purchase/report/report.php';
        break; 
    
    
        //party-ledger
        case "party-ledger":
        include_once __DIR__.'/../'.ADMIN_DIR.'/views/ledger/party_ledger/report.php';
        break;
    
        //cash-party-ledger
        case "cash-party-ledger":
        include_once __DIR__.'/../'.ADMIN_DIR.'/views/ledger/cash_party_ledger/report.php';
        break;
    
        //report-of-cashbook
        case "report-of-cashbook":
        include_once __DIR__.'/../'.ADMIN_DIR.'/views/cashbook/report_of_cashbook/report.php';
        break;
          
        //load other offers list
        case "app-basic":
         if(!isSuperAdmin()):
        SweetAlert("Access Deined!", BASE_URL.ADMIN_DIR."/dashboard", "Alert", "error");    
        else:   
        include_once __DIR__.'/../'.ADMIN_DIR.'/views/appbasic/app_basic_setting.php';
        endif;
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