<?php
//code here
//
//
//
//check user is super admin
function isSuperAdmin (){
    if(isset($_SESSION['adminRole'])){
        if($_SESSION['adminRole']=="1"){
            
            return true;
        }else{
            
            return false;
        }
    }
}

//check user is admin
function isAdmin (){
    if(isset($_SESSION['adminRole'])){
        if($_SESSION['adminRole']=="2"){
            return true;
        }else{
            return false;
        }
    }
}

//check login for Support Person
function isAccountant(){
    if(isset($_SESSION['adminRole'])){
        if($_SESSION['adminRole']=="3"){
            return true;
        }else{
            return false;
        }
    }
}

function checkPermission(){
    global $url;
    print_r($url);
}

 //check login status for admin
   function isAdminLogin(){
    if(isset($_SESSION["adminId"])){
        return true;
    }else{
        return false;
        }
    }

 //check login status of user
   function isLogin(){
    if(isset($_SESSION["userId"])){
        return true;
    }else{
        return false;
        }
    }
   
    
 //msg function
function AlertMsg($msg,$header){
echo '<script>';
echo "swal('$msg')";
echo ".then(function(){";
    echo "window.location.assign('$header');";
    echo "})";
echo '</script>';
}

//sweet alert message and redirect url
function SweetAlert($msg,$header,$title="Alert",$type="info"){
//type=> "warning" "error" "success" "info" 
echo '<script>';
echo "swal('$title', '$msg', '$type')";
    //then start
    echo ".then(function(){";
    echo "window.location.assign('$header');";
    echo "})";
    //then end
echo '</script>';
}

//only alert
function Alert($msg){
//type=> "warning" "error" "success" "info" 
    echo '<script>';
    echo "swal('$msg')";
    echo '</script>';
}



//Redirect URL
function RedirectURL($header){
echo '<script>';
echo "window.location.assign('$header');";
echo '</script>';
}


//get company cash head
function getCompanyCashHead(){
    if($_SESSION['selectCompnayId']==1){
        $cr_head=1;
    }elseif($_SESSION['selectCompnayId']==2){
        $cr_head=2;
    }
    
    return $cr_head;
}

//get company cash head
function getCompanyBankHead(){
    if($_SESSION['selectCompnayId']==1){
        $cr_head=3;
    }elseif($_SESSION['selectCompnayId']==2){
        $cr_head=4;
    }
    
    return $cr_head;
}





    // file upload function
function file_upload($file,$upload_path,$allowed_file_types=array('.doc','.docx','.rtf','.pdf','.png','.jpg','.jpeg','.gif','.zip','.rar'),$max_size=104857600){
	//function is created by Muhammad Ali | veerali95@gmail.com
	//by default size is allowed is 100MB
	//how use-> file_upload($_FILES['upload'],"upload/",[,size in bytes],[,array for extensions eg. array('.doc','.docx','.rtf','.pdf','.png','.jpg','.jpge','.gif','.zip','.rar')]);
	
	$filename = $file['name'];
	
	$file_basename = substr($filename, 0, strripos($filename, '.')); // get file name
	
	$file_ext = substr($filename, strripos($filename, '.')); // get file extension 
	
	$filesize = $file['size'];
	
	$allowed_file_types = $allowed_file_types;	

	if (in_array($file_ext,$allowed_file_types) && ($filesize < $max_size))
	{	
		// Rename file str_replace(' ', '_', $file_basename)
		$newfilename = str_replace(' ', '_', $file_basename)."_".date('Ymdhis').$file_ext;
		
                $upload_path= $_SERVER['DOCUMENT_ROOT']."/".BASE_PATH.$upload_path; 
		
		if (file_exists($upload_path . $newfilename))
		{
			// file already exists error
			echo "You have already uploaded this file.";
			return false;
		}
		else
		{		
			move_uploaded_file($file['tmp_name'], $upload_path . $newfilename);
			//echo "File uploaded successfully.";	
			
			return $newfilename;
				
		}
	}
	elseif (empty($file_basename))
	{	
		// file selection error
		echo "Please select a file to upload.";
		return false;
	} 
	elseif ($filesize > $max_size)
	{	
		// file size error
		echo "The file you are trying to upload is too large.";
		return false;
	}
	else
	{
		// file type error
		echo "Only these file typs are allowed for upload: " . implode(', ',$allowed_file_types);
		unlink($file['tmp_name']);
		return false;
	}
	
	
    }
    
    // file upload function
function multiple_files_upload($file,$loop_no,$upload_path,$allowed_file_types=array('.doc','.docx','.rtf','.pdf','.png','.jpg','.jpeg','.gif','.zip','.rar'),$max_size=104857600){
	//function is created by Muhammad Ali | veerali95@gmail.com
	//by default size is allowed is 100MB
	/*
         * ===how to use===
            if(isset($_FILES['service_files'])){
            if(is_array($_FILES['service_files'])){
                 $no_file=count($_FILES['service_files']['name']);
                 $i=0;
                 for($i;$i<$no_file;$i++){
                     // '.pdf',  '.excel', '.word' , '.zip' ,'.rar',  '.jpg' , '.ppt' , '.png' 
                     $img=multiple_files_upload($_FILES['service_files'],$i,"uploads/order/",array('.pdf',  '.excel', '.word' , '.zip' ,'.rar',  '.jpg' , '.ppt' , '.png' ,'.jpeg'));
                     echo $img.'<br>';
                     //Alert("File Upload.");
                    }
                 }
            }
        */
	
	$filename = $file['name'][$loop_no];
	
	$file_basename = substr($filename, 0, strripos($filename, '.')); // get file name
	
	$file_ext = substr($filename, strripos($filename, '.')); // get file extension 
	
        $filesize = $file['size'][$loop_no];
	
	$allowed_file_types = $allowed_file_types;	

	if (in_array($file_ext,$allowed_file_types) && ($filesize < $max_size))
	{	
		// Rename file
		$newfilename = str_replace(' ', '_', $file_basename)."_".date('Ymdhis').$file_ext;
		
                $upload_path= $_SERVER['DOCUMENT_ROOT']."/".BASE_PATH.$upload_path; 
		
		if (file_exists($upload_path . $newfilename))
		{
			// file already exists error
			echo "You have already uploaded this file.";
			return false;
		}
		else
		{		
			move_uploaded_file($file['tmp_name'][$loop_no], $upload_path . $newfilename);
			//echo "File uploaded successfully.";	
			
			return $newfilename;
				
		}
	}
	elseif (empty($file_basename))
	{	
		// file selection error
		echo "Please select a file to upload.";
		return false;
	} 
	elseif ($filesize > $max_size)
	{	
		// file size error
		echo "The file you are trying to upload is too large.";
		return false;
	}
	else
	{
		// file type error
		echo "Only these file typs are allowed for upload: " . implode(', ',$allowed_file_types);
		unlink($file['tmp_name']);
		return false;
	}
	
	
    }
    
    
 //remove hacking tag form input   
//function remove_xss($data) {
//  $data = trim($data);
//  $data = stripslashes($data);
//  $data= filter_var($data, FILTER_SANITIZE_STRING);
////$data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
//  return $data;
//}

//remove hacking tag form input new function 
function remove_xss($data) {
  $data = trim($data);
  $data = stripslashes($data);
  //$data= filter_var($data, FILTER_SANITIZE_STRING);
  
  // Fix &entity\n;
  $data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
  $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
  $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
  //$data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

    // Remove any attribute starting with "on" or xmlns
   $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

    // Remove javascript: and vbscript: protocols
   $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
   $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
   $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

    // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

    // Remove namespaced elements (we do not need them)
    $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

        do
        {
            // Remove really unwanted tags
            $old_data = $data;
            $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
        }
        while ($old_data !== $data);

        // we are done...
        return $data;
}

function RandomStringCode($length = 10){
    //all upper and lower case
    //$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}



//decode rewite url from .htaccess
function DecodeUrl($url){
    $url= explode("/",$url);
    return $url;
}


//rate view
function rating_start_view($rate){
    if($rate>4){
                        echo "<a href='#'><span class='fa fa-star'></span></a>";
                        echo "<a href='#'><span class='fa fa-star'></span></a>";
                        echo "<a href='#'><span class='fa fa-star'></span></a>";
                        echo "<a href='#'><span class='fa fa-star'></span></a>";
                        echo "<a href='#'><span class='fa fa-star'></span></a>";
                          
    }elseif ($rate>3) {
                        echo "<a href='#'><span class='fa fa-star'></span></a>";
                        echo "<a href='#'><span class='fa fa-star'></span></a>";
                        echo "<a href='#'><span class='fa fa-star'></span></a>";
                        echo "<a href='#'><span class='fa fa-star'></span></a>";
                        echo "<a href='#'><span class='far fa-star'></span></a>";
    }
    elseif ($rate>2) {
                        echo "<a href='#'><span class='fa fa-star'></span></a>";
                        echo "<a href='#'><span class='fa fa-star'></span></a>";
                        echo "<a href='#'><span class='fa fa-star'></span></a>";
                        echo "<a href='#'><span class='far fa-star'></span></a>";
                        echo "<a href='#'><span class='far fa-star'></span></a>";
    }
    elseif ($rate>1) {
                        echo "<a href='#'><span class='fa fa-star'></span></a>";
                        echo "<a href='#'><span class='fa fa-star'></span></a>";
                        echo "<a href='#'><span class='far fa-star'></span></a>";
                        echo "<a href='#'><span class='far fa-star'></span></a>";
                        echo "<a href='#'><span class='far fa-star'></span></a>";
    }
    elseif ($rate>0) {
                        echo "<a href='#'><span class='fa fa-star'></span></a>";
                        echo "<a href='#'><span class='far fa-star'></span></a>";
                        echo "<a href='#'><span class='far fa-star'></span></a>";
                        echo "<a href='#'><span class='far fa-star'></span></a>";
                        echo "<a href='#'><span class='far fa-star'></span></a>";
    }
    elseif ($rate<=0) {
                        echo "<a href='#'><span class='far fa-star'></span></a>";
                        echo "<a href='#'><span class='far fa-star'></span></a>";
                        echo "<a href='#'><span class='far fa-star'></span></a>";
                        echo "<a href='#'><span class='far fa-star'></span></a>";
                        echo "<a href='#'><span class='far fa-star'></span></a>";
    }
}
    
	
	
	
//get your ip address
function get_real_user_ip(){
  	/// This is to check ip from shared internet network
  	if(!empty($_SERVER['HTTP_CLIENT_IP'])){
  	$ip = $_SERVER['HTTP_CLIENT_IP'];
  	}
  	/// This is to check ip if it is passing from proxy network
  	elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
  	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  	}
  	else{
  	$ip = $_SERVER['REMOTE_ADDR'];
  	}
  	return $ip;
	}
	
        
        //input date into database 
function db_date_input($date){
            //use-> echo db_date_input("04/30/2020");
            return date('Y-m-d',strtotime($date));
        }
        
         //out data into database 
function db_date_output($date){
            //use-> echo db_date_output("2020-04-25");
            return date('d-m-Y',strtotime($date));
        }
		
	//setup date and time for view	
function db_date_time_output($date){
            //use-> echo db_date_output("2020-04-25");
            return date('h:i:s a d-m-Y',strtotime($date));
        }
        
        //setup date with month name
function db_date_out_month_name_output($date){
            //use-> echo db_date_output("2020-04-25");
            return date('d F,Y',strtotime($date));
        }        
        
        //setup time output
function db_time_output($time){
            //use-> echo db_date_output("2020-04-25");
            return date('h:i:s a',strtotime($time));
        } 
        
        //currency format for view
function currency_format($number,$decimal=0){
            global $view;
            //use-> echo db_date_output("2020-04-25");
            return $view->app_config("APP_CURRENCY_SYMBOL")." ".number_format($number,$decimal);
        }         
        
        
  //send sms function      
  function send_sms($mobile_number ,$msg){
            global $view;
            //$user_name=$view->app_config('SMS_USER_NAME');
            $username = $view->app_config('SMS_USER_NAME');///Your Username
            $password = $view->app_config('SMS_PASSWORD');///Your Password
            $mobile = $mobile_number;///Recepient Mobile Number
            $sender = $view->app_config('SMS_MASK');
            $message = $msg;

            ////sending sms

            $post = "sender=".urlencode($sender)."&mobile=".urlencode($mobile)."&message=".urlencode($message)."";
            $url = "http://sms.alphasmspk.com/web_distributor/api/sms.php?username=$username&password=$password";
            $ch = curl_init();
            $timeout = 30; // set to zero for no timeout
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)');
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            $result = curl_exec($ch); 
            /*Print Responce*/
            //echo $result; 
            return $result;
            
        }
        
        
 //check mail enable
 function isMailEnable(){
     global $view;
     $status=$view->app_config('SEND_MAIL');
     if($status=="Yes"){
         return true;
     } else {
         return false;
     }
 }
        
 //check sms enable
 function isSMSEnable(){
     global $view;
     $status=$view->app_config('SEND_SMS');
     if($status=="Yes"){
         return true;
     } else {
         return false;
     }
 }
 
 //check mail verification enable
 function isMailVerificationEnable(){
     global $view;
     $status=$view->app_config('APP_MAIL_VERIFICATION');
     if($status=="Yes"){
         return true;
     } else {
         return false;
     }
 }
 
 //check Mobile verification enable
 function isMobileVerificationEnable(){
     global $view;
     $status=$view->app_config('APP_MOBILE_VERIFICATION');
     if($status=="Yes"){
         return true;
     } else {
         return false;
     }
 }
           

 //get csrf token genrates
 function csrf_token(){
     $token= bin2hex(random_bytes(32));
     $_SESSION['csrf_token']=$token;
     return $token;
 }
 //verified CSRF token
 function csrf_token_verify($token){
     if(empty($token)){
         return FALSE;
     }elseif($token!=$_SESSION['csrf_token']){
         return FALSE;
     }elseif($token==$_SESSION['csrf_token']){
         return TRUE;
     }else{
         return FALSE;
     }
     
 }


// send_mail("veerali95@gmail.com","Test Message","<h1>Hello World</h1>");
// echo  get_real_user_ip();  
//echo RandomStringCode(10);
 //send_sms("923058644255" ,"Test MSG");
        
        
        
/*
 * development user functions   
 *      
 */
      //array view of POST or GET data
function PostDataArray($data){
          echo "<pre>";
          if(is_array($data)){
              print_r($data);
          }
          echo "</pre>";
      }
      
  
      
      

?>