<?php
class User{
    
   private $con;
  //connect to database  
  function __construct() {
        include_once __DIR__.'/../config/database.php';
        $db= new Db();
        $this->con=$db->connect();
       
    }
 
    //admin login
    public function AdminLogin($userMail,$userPass){
            $userPass= md5($userPass);
            $userPass=PASS_SALT_1.$userPass.PASS_SALT_2;
            $pre_statm=$this->con->prepare('SELECT `admin_id`,`role` FROM `admins` WHERE email=? AND password=?');
            $pre_statm->bind_param('ss',$userMail,$userPass);
            $pre_statm->execute() or die($this->con->error);
            $result=$pre_statm->get_result();
            if(($result->num_rows)==1){
                //echo "Login";
                $row = $result->fetch_assoc();
                $_SESSION["adminId"]=$row["admin_id"];
                $_SESSION["adminRole"]=$row["role"];
                return "login";
            }else{
                //echo "login problem";
                   return "error_login";
                }
     }
    
    
    //user login
    public function UserLogin($userName,$userPass){
            $userPass= md5(remove_xss($userPass));
            //$userPass= md5($userPass);
            $userPass=PASS_SALT_1.$userPass.PASS_SALT_2;
            $userName=remove_xss($userName);
            //$userName=$userName;
            $pre_statm=$this->con->prepare("SELECT `user_id` FROM `users` WHERE (email='".$userName."' OR user_id='".$userName."') AND password=?");
            $pre_statm->bind_param('s',$userPass);
            $pre_statm->execute() or die($this->con->error);
            $result=$pre_statm->get_result();
            if(($result->num_rows)==1){
                //echo "Login";
                $row = $result->fetch_assoc();
                $_SESSION["userId"]=$row["user_id"];
                return "login";
            }else{
                //echo "login problem";
                   return "error_login";
                }
     }
     
     //check admin mail exist
      public function isAdminMailExist($userMail){
            $pre_statm= $this->con->prepare("SELECT  `email` FROM `admins` WHERE email=?");
            $pre_statm->bind_param("s",$userMail);
            $pre_statm->execute() or die($this->con->error);
            $result=$pre_statm->get_result();
            if(($result->num_rows)>=1){
                return true;
            }else{
                   return false;
             }
       }
       
       //check mail exist
      public function isAdminMobileExist($userMobile){
            $pre_statm= $this->con->prepare("SELECT  `mobile` FROM `admins` WHERE mobile=?");
            $pre_statm->bind_param("s",$userMobile);
            $pre_statm->execute() or die($this->con->error);
            $result=$pre_statm->get_result();
            if(($result->num_rows)>=1){
                return true;
            }else{
                   return false;
             }
       }
       
     //insert admin logs
     public function insert_admin_log($adminid,$log,$item_id=null){
        $pre_statm= $this->con->prepare("INSERT INTO `admin_logs` (`admin_id`, `log_item`, `logs`)
               VALUES(?,?,?)");
        $pre_statm->bind_param("iss",$adminid,$item_id,$log);
        $result=$pre_statm->execute();
        if($result){
           return TRUE;
        }else{
            return FALSE;
        }
     }
     
     //insert users logs
     public function insert_user_log($userid,$log,$item_id=null){
        $pre_statm= $this->con->prepare("INSERT INTO `user_logs` (`user_id`,`logs` , `log_item`)
               VALUES(?,?,?)");
        $pre_statm->bind_param("iss",$userid,$log,$item_id);
        $result=$pre_statm->execute();
        if($result){
           return TRUE;
        }else{
            return FALSE;
        }
     }




     //check mail exist
      public function isMailExist($userMail){
            $pre_statm= $this->con->prepare("SELECT  `email` FROM `users` WHERE email=?");
            $pre_statm->bind_param("s",$userMail);
            $pre_statm->execute() or die($this->con->error);
            $result=$pre_statm->get_result();
            if(($result->num_rows)>=1){
                return true;
            }else{
                   return false;
             }
       }
       
       //mobile exit
        public function isMobileExist($userMobile){
            $pre_statm= $this->con->prepare("SELECT  `mobile` FROM `users` WHERE mobile=?");
            $pre_statm->bind_param("s",$userMobile);
            $pre_statm->execute() or die($this->con->error);
            $result=$pre_statm->get_result();
            if(($result->num_rows)>=1){
                return true;
            }else{
                 return false;
             }
       }
       
        //CNIC exit
        public function isCnicExist($userCnic){
            $pre_statm= $this->con->prepare("SELECT  `cnic` FROM `users` WHERE cnic=?");
            $pre_statm->bind_param("s",$userCnic);
            $pre_statm->execute() or die($this->con->error);
            $result=$pre_statm->get_result();
            if(($result->num_rows)>=1){
                return true;
            }else{
                 return false;
             }
       }
       
        //check Email verification
        public function isMailVerified($userId){
            $pre_statm= $this->con->prepare("SELECT  `email_verification_code` FROM `users` WHERE user_id=? AND email_verification_code=0");
            $pre_statm->bind_param("s",$userId);
            $pre_statm->execute() or die($this->con->error);
            $result=$pre_statm->get_result();
            if(($result->num_rows)>=1){
                return true;
            }else{
                 return false;
             }
       }
       
       //check Mobile verification
        public function isMobileVerified($userId){
            $pre_statm= $this->con->prepare("SELECT  `mobile_verification_code` FROM `users` WHERE user_id=? AND mobile_verification_code=0");
            $pre_statm->bind_param("s",$userId);
            $pre_statm->execute() or die($this->con->error);
            $result=$pre_statm->get_result();
            if(($result->num_rows)>=1){
                return true;
            }else{
                 return false;
             }
       }
   
        //check Nadra verification
        public function isNadraVerified($userId){
            $pre_statm= $this->con->prepare("SELECT  `nadra_verification` FROM `users` WHERE user_id=? AND nadra_verification='Yes'");
            $pre_statm->bind_param("s",$userId);
            $pre_statm->execute() or die($this->con->error);
            $result=$pre_statm->get_result();
            if(($result->num_rows)>=1){
                return true;
            }else{
                 return false;
             }
       }
       
        //check Admin verification
        public function isAdminVerified($userId){
            $pre_statm= $this->con->prepare("SELECT  `admin_verification` FROM `users` WHERE user_id=? AND admin_verification='Yes'");
            $pre_statm->bind_param("s",$userId);
            $pre_statm->execute() or die($this->con->error);
            $result=$pre_statm->get_result();
            if(($result->num_rows)>=1){
                return true;
            }else{
                 return false;
             }
       }
       
       
       //check out of office status
        public function isOutOfOffice($userId){
            $pre_statm= $this->con->prepare("SELECT  `out_of_office` FROM `users` WHERE user_id=? AND out_of_office='1'");
            $pre_statm->bind_param("s",$userId);
            $pre_statm->execute() or die($this->con->error);
            $result=$pre_statm->get_result();
            if(($result->num_rows)>=1){
                return true;
            }else{
                 return false;
             }
       }
       
       
       //check user admin for delete
        public function isUserDelete($userId){
            $pre_statm= $this->con->prepare("SELECT  `status` FROM `users` WHERE user_id=? AND status='Delete'");
            $pre_statm->bind_param("s",$userId);
            $pre_statm->execute() or die($this->con->error);
            $result=$pre_statm->get_result();
            if(($result->num_rows)>=1){
                return true;
            }else{
                 return false;
             }
       }
       
       //check user admin for block
        public function isUserBlock($userId){
            $pre_statm= $this->con->prepare("SELECT  `status` FROM `users` WHERE user_id=? AND status='Block'");
            $pre_statm->bind_param("s",$userId);
            $pre_statm->execute() or die($this->con->error);
            $result=$pre_statm->get_result();
            if(($result->num_rows)>=1){
                return true;
            }else{
                 return false;
             }
       }
       
       //check admin account for active status
        public function isAdminActive($adminId){
            $pre_statm= $this->con->prepare("SELECT  `status` FROM `admins` WHERE admin_id=? AND status='Active'");
            $pre_statm->bind_param("s",$adminId);
            $pre_statm->execute() or die($this->con->error);
            $result=$pre_statm->get_result();
            if(($result->num_rows)>=1){
                return true;
            }else{
                 return false;
             }
       }
       
       //check is user send offer already
       public function isOfferSendByUser($userId,$PropertyId){
            $pre_statm= $this->con->prepare("SELECT  `id` FROM `offer_list` WHERE user_id=? AND property_post_list_id=?");
            $pre_statm->bind_param("ss",$userId,$PropertyId);
            $pre_statm->execute() or die($this->con->error);
            $result=$pre_statm->get_result();
            if(($result->num_rows)>=1){
                return true;
            }else{
                 return false;
             }
       }
    
       
      //check is user send offer already
       public function isWantedHelpSendByUser($userId,$wantId){
            $pre_statm= $this->con->prepare("SELECT  `id` FROM `wanted_help_list` WHERE user_id=? AND wanted_list_id=?");
            $pre_statm->bind_param("ss",$userId,$wantId);
            $pre_statm->execute() or die($this->con->error);
            $result=$pre_statm->get_result();
            if(($result->num_rows)>=1){
                return true;
            }else{
                 return false;
             }
       } 
   
    
}
//$obj =new User();
//$res=$obj->UserLogin("100014","12345678");
//echo $res; 