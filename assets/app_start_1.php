<?php
/*
* User main index file.
* Also used ajax request
*  
 */
//stat new session
session_start();

//generating new session on each refresh
session_regenerate_id(true);
//load language package

//include_once __DIR__.'/../languages/eng.php';

//load App config
include_once __DIR__.'/../config/config.php';
//load all classes
include_once __DIR__."/../classes/Main.php";
include_once __DIR__."/../classes/User.php";
include_once __DIR__."/../classes/View.php";


//load php mailer
include_once __DIR__."/../vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;




//object of Main class
$main= new Main();
//object of User Class
$user= new User();
//object of view class
$view= new View();
//object init end
//email sender function
function send_mail_2($to_mail,$subject,$body,$altBody="",$receiverName=""){
    $PHPmailer = new PHPMailer;
     try{
        global $view;   
        //localhost
        //Server settings
        //$PHPmailer->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $PHPmailer->isSMTP();                                            // Send using SMTP
        $PHPmailer->Host= $view->app_config("APP_MAIL_SERVER");                    // Set the SMTP server to send through
        $PHPmailer->SMTPAuth   =true;                                   // Enable SMTP authentication
        $PHPmailer->Username   =$view->app_config("APP_MAIL_USERNAME");                  // SMTP username
        $PHPmailer->Password   =$view->app_config("APP_MAIL_PASS");                         // SMTP password
        $PHPmailer->SMTPSecure =PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $PHPmailer->Port       =$view->app_config("APP_MAIL_PORT");                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $PHPmailer->setFrom($view->app_config("APP_MAIL_USERNAME"), 'IMAC');
        $PHPmailer->addAddress($to_mail, $receiverName);     // Add a recipient
        //$mail->addAddress('ellen@example.com');               // Name is optional
        $PHPmailer->addReplyTo('support@imac.pk');
        $PHPmailer->addCC($to_mail);
        $PHPmailer->addBCC($to_mail);
    
        // Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    
        // Content
        $PHPmailer->isHTML(true);                                  // Set email format to HTML
        $PHPmailer->Subject =  $subject;
        $PHPmailer->Body    =  $body;
        $PHPmailer->AltBody = $altBody;
        $result=$PHPmailer->send();
        return $result;
        //echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    } 
}


//load function files
include_once __DIR__."/../includes/general_functions.php";






//url picker
$url=array("/");
//get action url
if(isset($_GET['link'])){
     $url=DecodeUrl($_GET['link']);
}




