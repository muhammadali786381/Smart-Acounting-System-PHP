<?php
// user login ajax
if(isLogin()){
   //ajax invoice detail request detail
  if(isset($_POST['ajax_invoice_detail_id'])){
   $id=remove_xss($_POST['ajax_invoice_detail_id']);
   $data=array();
   //get club detail
   $user_invoice=$main->getSingleRecord("user_invoice","id",$id);
   if($user_invoice!="NO_DATA"){
     //store data into array
     $data=array(
               "status"=>1,
               "message"=>"Record Found.",
               "id"=>$user_invoice['id'],
               "invoice_date"=>$user_invoice['invoice_date'],
               "user_id"=>$user_invoice['user_id'],
               "club_id"=>$user_invoice['club_id'],
               "amount"=>$user_invoice['amount'],
               "note"=>$user_invoice['note'],
               "file_link"=>$user_invoice['file_link'],
               "create_by_id"=>$user_invoice['create_by_id'],
               "approve_by_id"=>$user_invoice['approve_by_id'],
               "invoice_status"=>$user_invoice['status']
               );
   }else{
       //fail to get data
       $data=array(
               "status"=>0,
               "message"=>"No Record Found"
               );
   }
   echo  json_encode($data);
   exit();
}
    
  
}

  






