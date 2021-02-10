<?php
$data=array();
if(!isAdminLogin()){
      $data=array(
               "status"=>0,
               "message"=>"Login Fail"
               );
     exit();
 }
 //ajax invoice detail request detail
  if(isset($_POST['ajax_crv_id'])){
   $id=remove_xss($_POST['ajax_crv_id']);
   //get club detail
   $xhr_data=$main->getSingleRecord("voucher","id",$id);
   if($xhr_data!="NO_DATA"){
     //store data into array
     $data=array(
               "status"=>1,
               "message"=>"Record Found.",
               "id"=>$xhr_data['id'],
               "date"=> $xhr_data['date'],
               "cr_head_id"=>$xhr_data['cr_head_id'],
               "dr_head_id"=>$xhr_data['dr_head_id'],
               "note"=>$xhr_data['note'],
               "amount"=>$xhr_data['amount'],
               "extra_amount"=>$xhr_data['extra_amount']
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

  






