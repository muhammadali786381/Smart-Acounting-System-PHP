<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Trille Balance</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo BASE_URL.ADMIN_DIR; ?>/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Account Head</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           <div class="card <?php echo $view->app_config("APP_TABLE_HEAD_COLOR_CLASS");?>">
              <div class="card-header">
                <h3 class="card-title">Teller Balance</h3>
              </div>
             <!-- /.card-header -->
              <div class="card-body">
                <table id="list" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Company</th>
                    <th>Amount (DR)</th>
                    <th>Amount (CR)</th>
                    <th>Type</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                      $total_dr=0;
                      $total_cr=0;
                      if($data!="NO_DATA"):
                          foreach ($data as $row):
                          $cr=$main->sumValues("voucher","amount","cr_head_id",$row['id']);
                          $dr=$main->sumValues("voucher","amount","dr_head_id",$row['id']);
                          //add last opening balance
                          $cr+=$row['opening_cr_balance'];
                          $dr+=$row['opening_dr_balance'];
                          
                          //calculate total
                          $total_dr+=$dr;
                          $total_cr+=$cr;
                          
                          
                        ?>
                      
                  <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['company_name'];?></td>
                    <td><?php echo currency_format($dr);?></td>
                    <td><?php echo currency_format($cr);?></td>
                    <td><span class="badge badge-info"><?php echo $view->viewHeadType($row['head_type']);?></span></td>
                    <!--<i class="fa fa-eye"></i> -->
<!--                    <td><button  type="button" href="#" class="d-sm-inline-block btn btn-outline-danger shadow-sm btn-view"  data-toggle="modal" data-target="#"><i class="fas fa-eye fa-sm text-white-100"></i> View</a></td>-->
                  </tr>
                  
                  <?php
                          endforeach;
                      endif;
                   ?>
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th></th>
                    <th></th>
                    <th>Total Amount: <?php echo currency_format($total_dr);?></th>
                    <th>Total Amount: <?php echo currency_format($total_cr);?></th>
                    <th></th>
                   </tr>
                </tfoot>
                </table>
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
  </div>
  <!-- /.content-wrapper -->
  
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
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "order": [[ 0, "desc" ]]
    });
  });
</script>

