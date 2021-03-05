           <div class="card <?php echo $view->app_config("APP_TABLE_HEAD_COLOR_CLASS");?>">
              <div class="card-header">
               <h3 class="card-title">Party Ledger</h3>
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
                    <h3 style="text-align:center;">
                     <?php echo $get_cashbook_detail['company_name']." [".$get_cashbook_detail['company_name']." (".$get_cashbook_detail['cell_1'].") ]"?>
                    </h3>
                    <h5 style="text-align:center;">
                     <?php echo $get_cashbook_detail['address'];?>
                    </h5>
                </div>
                <!-- /.col -->
              </div>    
              <div class="row">
                <div class="col-sm-6">
                    <b>Form:</b> <?php echo (isset($_POST['from_date']))?db_date_output($_POST['from_date']):"";?>
                    <br><b class="mr-3">To: </b> <?php echo (isset($_POST['to_date']))?db_date_output($_POST['to_date']):"";?>
                </div>
                <!-- /.col -->
                <hr/>
              </div>    
               <table id="list" class="table table-striped table-bordered">
                  <thead>
                  <tr>
                    <th width="10%">Date</th>
<!--                    <th width="40%">Description</th>-->
                    <th width="35%">Credit</th>
                    <th width="10%">Amount</th>
                    <th width="35%">Debit</th>
                    <th width="10%">Amount</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                      <td class="text-bold"><?php echo "---------";?></td>
                      <td class="text-bold"><?php echo "Opening Balance";?></td>
                       <td class="text-bold" style="text-align:right"><?php echo "";?></td>
                      <td class="text-bold" style="text-align:right"><?php echo "";?></td>
<!--                      <td class="text-bold" style="text-align:right"><?php echo "";?></td>-->
                      <td class="text-bold" style="text-align:right"><?php echo currency_format($balance);?></td>
                  </tr>
                  <?php
                  if($data!="NO_DATA"):
                      foreach ($data as $row):
                            if($row['company_id']==$_SESSION['selectCompnayId']):
                              
                                 //calculate balance 
                                 if($row['cr_head_id']==$party_id){
                                     $balance+=$row['amount'];
                                     $total_cr+=$row['amount'];
                                 } 
                                
                                 if($row['dr_head_id']==$party_id){
                                     $balance-=$row['amount'];
                                     $total_dr+=$row['amount'];
                                 } 
                             
                            
                            
                  ?>
                  <tr>
                      <td><?php echo db_date_output($row['date']);?></td>
<!--                      <td><?php echo $row['note'];?></td>-->
                      <td style="text-align:left"><?php echo $view->viewHeadName($row['cr_head_id']);?></td></td>
                      <td style="text-align:right"><?php echo currency_format($row['amount']);?></td>
                      <td style="text-align:left"><?php echo $view->viewHeadName($row['dr_head_id']);?></td>
                      <td style="text-align:right"><?php echo currency_format($row['amount']);?></td>
                  </tr>
                 <?php 
                              
                            endif;
                      endforeach;
                   ?>   
                  <tr>
                      <td class="text-bold"><?php echo "---------";?></td>
                      <td class="text-bold"><?php echo "Cash in hand";?></td>
                      <td class="text-bold" style="text-align:right"><?php echo "";?></td>
                       <td class="text-bold" style="text-align:right"><?php echo "";?></td>
<!--                      <td class="text-bold" style="text-align:right"><?php echo "";?></td>-->
                      <td class="text-bold" style="text-align:right"><?php echo currency_format($balance); ?></td>
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
          
     