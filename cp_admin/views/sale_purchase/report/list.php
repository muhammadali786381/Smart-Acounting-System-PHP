        <?php
//         $get_profit=$main->select_records("voucher", 
//                                        array(
//                                    "type"=>"y.r.v",
//                                    "product_transaction_id"=>"65"
//                                    )
//                                        );
//                                echo "<pre>";        
//                                print_r($get_profit);
        ?>
           <div class="card <?php echo $view->app_config("APP_TABLE_HEAD_COLOR_CLASS");?>">
              <div class="card-header">
               <h3 class="card-title">Sale Purchase Report</h3>
                 <a type="button" onclick="PrintNow('.PrintFundFlow')" class="btn btn-primary float-right" ><i class="fas fa-print"></i> Print</a>
              </div>
             <!-- /.card-header -->
              <div class="card-body">
                <div class="PrintFundFlow">
                <div class="row">
                <div class="col-12">
                  <h4>
                      <img src="<?php echo BASE_URL."uploads/site/".$select_company['image_link']?>" width="80px" height="80px"> <?php echo $select_company['name'];?>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <div class="row">
                <div class="col-12">
                    <h5 style="text-align:center;">
                     Sale Purchase Report
                    </h5>
                </div>
                <!-- /.col -->
              </div>    
              <div class="row">
                <div class="col-sm-4">
                    <b>Form:</b> <?php echo (isset($_POST['from_date']))?db_date_output($_POST['from_date']):"";?>
                </div>
                <div class="col-sm-4">
                  <b>To:</b> <?php echo (isset($_POST['to_date']))?db_date_output($_POST['to_date']):"";?>
                </div>
                <div class="col-sm-4">
                   <b>Product:</b> <?php echo (isset($get_product_detail) && $get_product_detail!="NO_DATA")? " (". $get_product_detail['id'] .") ".$get_product_detail['name']:"";?>
                </div>  
                <!-- /.col -->
                <hr/>
              </div>    
               <table id="list" class="table table-striped table-bordered">
                  <thead>
                  <tr>
                    <th width="">#</th>
                    <th width="">Date</th>
                    <th width="">Invoice ID</th>
                    <th width="">Note</th>
                    
                    <th width="">Purchase (CR)</th>
                    
                    <th width="">Sale (DR)</th>
                    
                    <th width="">Stock</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  if($data!="NO_DATA"):
                      $stock=0;
                      $yar_razzaq_profit=0;
                      $total_buy=0;
                      $total_sale=0;
                      $i=1;
                      foreach ($data as $row):
                            if($row['company_id']==$_SESSION['selectCompnayId']):
                             //calculate balance
                            if($row['type']=="1"){
                               //get ya razzaq profile 
                               $get_profit=$main->select_records("voucher", array("type"=>"y.r.v","product_transaction_id"=>$row['invoice_id']));
                               if($get_profit!="NO_DATA"){
                                 $yar_razzaq_profit+=$get_profit[0]['amount'];  
                               }
                               
                               $stock-=$row['qty'];
                               $sale=$row['qty']*$row['sale_price'];
                               $total_sale+=$sale;
                             }else{
                               $stock+=$row['qty'];
                               $buy=$row['qty']*$row['buy_price'];
                               $total_buy+=$buy;
                            }
                            //set note
                            $invoice_summery=$main->getSingleRecord("product_transation","id",$row['invoice_id']);
                  ?>
                  <tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo db_date_output($row['date']);?></td>
                      <td><?php echo $invoice_summery['prefix_id'].$invoice_summery['id'];?></td>
                      <td><?php echo $invoice_summery['note'];?></td>
                      <td style="text-align:right"><?php echo ($row['type']=="2")?$row['qty']." &#x2715; ".$row['buy_price']."=".currency_format($buy):"-";?></td>
                      <td style="text-align:right"><?php echo ($row['type']=="1")?$row['qty']." &#x2715; ".$row['sale_price']."=".currency_format($sale):"-";?></td>
                      <td style="text-align:right"><?php echo $stock;?></td>
                  </tr>
                 <?php 
                             $i++;
                            endif;
                      endforeach;
                   ?>   
                  <tr>
                      <td colspan="4"></td>
<!--                      <td colspan=""></td>
                      <td colspan=""></td>
                      <td colspan=""></td>-->
                      
                      <td colspan="" class="text-right"><b>Total: <?php echo currency_format($total_buy);?> </b></td>
<!--                      <td colspan="" class="text-right"><b>Total: <?php echo currency_format($total_sale);?></b></td>-->
                     <td colspan=""></td>
                     <td colspan=""></td>
                  </tr>
                  
                  <tr>
                      <td colspan="4"></td>
<!--                      <td colspan=""></td>
                      <td colspan=""></td>
                      <td colspan=""></td>-->
                      
                      <td colspan="" class="text-right"><b>G.Profit: <?php echo currency_format(($total_sale-$total_buy)-$yar_razzaq_profit);?> </b></td>
                      <td colspan=""></td>
                  </tr>
                  
                  <tr>
                      <td colspan="4"></td>
<!--                      <td colspan=""></td>
                      <td colspan=""></td>
                      <td colspan=""></td>-->
                      
                      <td colspan="" class="text-right"><b>YR: <?php echo currency_format($yar_razzaq_profit);?> </b></td>
                     
                      <td colspan=""></td>
                  </tr>
                  
                  <tr>
                      <td colspan="4"></td>
<!--                      <td colspan=""></td>
                      <td colspan=""></td>
                      <td colspan=""></td>-->
                      
                      <td colspan="" class="text-right"><b>Grand Total: <?php echo currency_format($total_buy+($total_sale-$total_buy));?> </b></td>
                      <td colspan="" class="text-right"><b>Grand Total: <?php echo currency_format($total_sale);?></b></td>
                     <td colspan=""></td>
                  </tr>
                  <?php 
                   endif;
                  ?>
                  </tbody>
                </table>
                  </div>
                  <!-- /.print-->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          
     