    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           <div class="card <?php echo $view->app_config("APP_TABLE_HEAD_COLOR_CLASS");?>">
              <div class="card-header">
                <h3 class="card-title">Route Ledger</h3>
                 <a type="button" onclick="PrintNow('.PrintFundFlow')" class="btn btn-primary float-right" ><i class="fas fa-print"></i> Print</a>
              </div>
             <!-- /.card-header -->
              <div class="card-body">
                <div class="PrintFundFlow">
                 <h3 class="text-center"><?php echo ($route_detail!="NO_DATA")?$route_detail['route_name']:""; ?><small>(<?php echo ($route_detail!="NO_DATA")?$route_detail['day_name']:""; ?>)</small></h3>
                  <table id="list" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Company</th>
                    <th>Rec.%</th>
                    <th>Amount</th>
                    <th>LPD/LPR</th>
                    <th>Remark</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                      
                      
                      
                      
                      $total_dr=0;
                      $total_cr=0;
                      if($data!="NO_DATA"):
                        foreach ($data as $row):
                         if($row['head_route_id']==remove_xss($_POST['route_id'])):
                          $cr=$main->sumValues("voucher","amount","cr_head_id",$row['id']);
                          $dr=$main->sumValues("voucher","amount","dr_head_id",$row['id']);
                          //add last opening balance
                          $cr+=$row['opening_cr_balance'];
                          $dr+=$row['opening_dr_balance'];
                          //calculate party balance
                          $balance=$cr-$dr;
                          
                          //calculate total
                          if($balance<0){
                           $total_dr+=abs($balance);
                          }
                          
                          if($balance>=0){
                             $total_cr+=abs($balance);
                          }
                         
                         //calculate receiving calculation
                         if($cr==0){
                           $rec_percent=0.00;  
                         }else{
                           $rec_percent=($cr/$dr)*100;  
                         }
                        
                        //get last recevied voucher 
                        $sql_select_last_payment="SELECT * FROM `voucher` WHERE type='c.r.v' AND cr_head_id=".$row['id']." ORDER BY id DESC LIMIT 1";
                        $res=$main->query($sql_select_last_payment);
                        $row_last_payment=$res->fetch_assoc();
                        ?>
                      
                  <tr>
                    <td><?php echo $row['id'];?></td>
                    <td class="text-uppercase">
                     <?php 
                     echo $row['company_name'] ."<br>";
                     echo $row['cell_1'] ."<br>";
                     echo $row['address'] ."<br>";
                     ?>
                    </td>
                    <td><?php echo percentage_format($rec_percent);  ?></td>
                    <td><?php echo ($balance<0)?currency_format(abs($balance))." DR":currency_format(abs($balance))." CR";?></td>
                    <td>
                     <?php echo ($row_last_payment)?db_date_output($row_last_payment['date']). "<br>". currency_format($row_last_payment['amount']):"-";?>
                    </td>
                    
                    <td> </td>
                    <!--<i class="fa fa-eye"></i> -->
<!--                    <td><button  type="button" href="#" class="d-sm-inline-block btn btn-outline-danger shadow-sm btn-view"  data-toggle="modal" data-target="#"><i class="fas fa-eye fa-sm text-white-100"></i> View</a></td>-->
                  </tr>
                  
                  <?php
                                endif;
                          endforeach;
                      endif;
                   ?>
                   <tr class="text-right text-bold">
                          <td colspan="3">TOTAL (DR)</td><td  colspan="3"><?php echo currency_format($total_dr); ?></td>
                      </tr>
                      <tr class="text-right text-bold">
                          <td colspan="3">Cash Receive</td><td  colspan="3"></td>
                      </tr>
                      <tr class="text-right text-bold">
                          <td colspan="3">Token Receive</td><td  colspan="3"></td>
                      </tr>
                      <tr class="text-right text-bold">
                          <td colspan="3">Total:</td><td  colspan="3"></td>
                      </tr>
                      <tr class="text-right text-bold">
                          <td colspan="3">Recovery</td><td  colspan="3"></td>
                      </tr>
                      <tr class="text-right text-bold">
                          <td colspan="3">Recovery %</td><td  colspan="3"></td>
                      </tr>
                  </tbody>
                   <tfoot>
                      
                  </tfoot>
                </table>
               </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
 
  
  <?php
  //add new model load
  //include_once __DIR__.'/create_new.php';
  ?>
  
  
<script>
  $(document).ready(function () {
    $('#list').DataTable({
      dom: 'Bfrtip',
        buttons: [
            'print'
        ],  
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "order": [[ 0, "desc" ]]
    });
  });
</script>

