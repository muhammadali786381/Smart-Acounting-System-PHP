<?php

//-----------------------------below we can set all views---------------------------//
class View extends Main{
    /*
     * get all view that is used
     * 
     * 
     * 
     */
    
    //get APP_SETTING from DB Settig Table
    public function app_config($key_value){
        //user-> $obj->app_config("APP_NAME");
        $config= $this->getSingleRecord("setting", "key_value", $key_value);
        return $config['value'];
    }
    
    //get status value according to code
    public function viewStatus($value){
        if($value==1){
           $data="Active"; 
        }else{
        $data="Deactivate"; 
        }
        return $data;
    }
    
    //get head type value according to code
    public function viewHeadType($value){
        
        if($value==1){
           $data="Cash"; 
        }elseif($value==2){
          $data="Bank"; 
        }elseif($value==3){
          $data="Client"; 
        }elseif($value==4){
          $data="Supplier"; 
        }
        return $data;
    }
    
    //get product tranaction type value according to code
    public function viewTransactionType($value){
        
        if($value==1){
           $data="Sale"; 
        }elseif($value==2){
          $data="Purchase"; 
        }
        return $data;
    }
    
    public function viewHeadName($value){
        
        $data=$this->getSingleRecord("account_head","id",$value);
        if($data!="NO_DATA"){
            $data="(". $data['id'] .") ". $data['company_name'] . " - ". $data['owner_name'];    
        }else{
            $data="No head found";
        }
        
        return $data;
    }
    
    
    /*
     * DropDown Lists
     * 
     * 
     * 
     */
    
    //get active head dropdown list
    public function selectActiveHead($type=""){
       $data= $this->getAllRecord("account_head");
        if($data!="NO_DATA"){
         foreach ($data as $row){
             if($row['status']==1 && $row['company_id']==$_SESSION['selectCompnayId'] && $row['head_type']==$type){
              echo  "<option value=".$row['id'].">(".$row['id'].") ".$row['company_name']."-".$row['owner_name']." (".$this->viewStatus($row['status']).")</option>";
             }
          }
       }
     }
     
     //get all head dropdown list
    public function selectDeactivateHead($type=""){
       $data= $this->getAllRecord("account_head");
        if($data!="NO_DATA"){
         foreach ($data as $row){
             if($row['status']==0 && $row['company_id']==$_SESSION['selectCompnayId'] && $row['head_type']==$type){
              echo  "<option value=".$row['id'].">(".$row['id'].") ".$row['company_name']."-".$row['owner_name']." (".$this->viewStatus($row['status']).")</option>";
             }
          }
       }
     }
     
     //get all head dropdown list
    public function selectAllHead(){
       $data= $this->getAllRecord("account_head");
        if($data!="NO_DATA"){
         foreach ($data as $row){
             if($row['company_id']==$_SESSION['selectCompnayId']){
              echo  "<option value=".$row['id'].">(".$row['id'].") ".$row['company_name']."-".$row['owner_name']." [ ". $this->viewHeadType($row['head_type']). " ] [".$this->viewStatus($row['status'])."] </option>";
             }
          }
       }
     }
     
     
      //get all products with sale price
    public function selectProdcutWithSalePrice(){
       $data= $this->getAllRecord("products");
        if($data!="NO_DATA"){
         foreach ($data as $row){
             if($row['company_id']==$_SESSION['selectCompnayId']){
              echo  "<option value=".$row['id'].">(".$row['id'].") ".$row['name']." | S-".$row['sale_price']." (".$this->viewStatus($row['status']).")</option>";
             }
          }
       }
     }
     
     
       //get all prdoucts with purchase Price
    public function selectProdcutWithPurchasePrice(){
       $data= $this->getAllRecord("products");
        if($data!="NO_DATA"){
         foreach ($data as $row){
             if($row['company_id']==$_SESSION['selectCompnayId']){
              echo  "<option value=".$row['id'].">(".$row['id'].") ".$row['name']." B-".$row['buy_price']." (".$this->viewStatus($row['status']).")</option>";
             }
          }
       }
     }
     
     //get all prdoucts 
   public function selectProdcut(){
       $data= $this->getAllRecord("products");
        if($data!="NO_DATA"){
         foreach ($data as $row){
             if($row['company_id']==$_SESSION['selectCompnayId']){
              echo  "<option value=".$row['id'].">(".$row['id'].") ".$row['name']." (".$this->viewStatus($row['status']).")</option>";
             }
          }
       }
     }  
   
     
       //get club type dropdown list
    public function selectUser(){
       $data= $this->getAllRecord("users");
        if($data!="NO_DATA"){
         foreach ($data as $row){
            if($row['status']=="Active"){
              echo  "<option value=".$row['user_id'].">(".$row['user_id'].") ".$row['first_name']." ".$row['last_name']." (Reg.Status:".$row['reg_status'].")</option>";  
            }
          }
       }
     }
     
   //get club type dropdown list
    public function selectAdmin(){
       $data= $this->getAllRecord("admins");
        if($data!="NO_DATA"){
         foreach ($data as $row){
            echo  "<option value=".$row['admin_id'].">(".$row['admin_id'].") ".$row['first_name']." ".$row['last_name']." (".$row['status'].")</option>";  
          }
       }
     }
     
     //get admin type dropdown list
     public function selectAdminType(){
      //'Super Admin','Admin','Support Person','Data Entry'
      echo  "<option value='1'>Super Admin</option>";  
      echo  "<option value='2'>Admin</option>";  
      echo  "<option value='3'>Support Person</option>";  
     }
     
     //get admin type dropdown list
     public function selectStatus(){
      echo  "<option value='1'>Active</option>";  
      echo  "<option value='0'>Deactivate</option>";  
      }
     
     
     //get admin type dropdown list
     public function selectGender(){
      //'Super Admin','Admin','Support Person','Data Entry'
      echo  "<option value='Male'>Male</option>";  
      echo  "<option value='Female'>Female</option>";  
     }
     
     
     //get admin type dropdown list
     public function selectHeadType(){
      //1=>Cash 2=>Bank 3=>Client 4=>Supplier 
      echo  "<option value='1'>Bank</option>";    
      echo  "<option value='3'>Client</option>";  
      echo  "<option value='4'>Supplier</option>";  
     }
     
     
     
    
     
    
   
  
   
     
    
     
    
     
   
     
    
     
     
    
     
    
     
    
    
     
     
     
     
     
     /*
      * End Dropdowns
      * 
      */
     
     /*
      * 
      * Ajax detail view
      * 
      */
   
     
     
 //end of class view    
}
//$obj= new View();


//calling view class data
//echo $obj->app_config("APP_NAME");

//$obj->getAllTaskListByStatus("Assigned");