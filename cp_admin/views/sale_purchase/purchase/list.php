<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           <div class="card <?php echo $view->app_config("APP_TABLE_HEAD_COLOR_CLASS");?>">
              <div class="card-header">
               <h3 class="card-title">Purchase Voucher List</h3>
                <a href="#" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right"  data-toggle="modal" data-target="#AddNew"><i class="fas fa-edit fa-sm text-white-100"></i> Create New</a>
              </div>
             <!-- /.card-header -->
              <div class="card-body">
                <table id="list" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID#</th>
                    <th>Date</th>
                    <th>Note</th>
                    <th>Total</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody >
                      <!-- <button class="btn btn-link update-id" id="<?php echo $row['id'];?>"><i class="fa fa-edit"></i></button>-->
                      <?php
                      if($data!="NO_DATA"):
                          foreach ($data as $row):
                            if($row['type']==2):
                           
                        ?>

                  <tr>
                    <td><?php echo $row['id'];?> </td>
                    <td><?php echo db_date_output($row['date']);?></td>
                    <td><?php echo $row['note'];?></td>
                    <td><?php echo currency_format($row['sale_total']);?></td>
                    <td>
                     <a href="<?php echo BASE_URL.ADMIN_DIR."/pview/".$row['id']?>" class="btn btn-sm btn-success" target="__blank"  title="View"><i class="fas fa-eye fa-sm text-white-100"></i></a>&nbsp; 
                    </td>
                   </tr>
                  
                  <?php
                               
                             endif;
                          endforeach;
                      endif;
                   ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID#</th>
                    <th>Date</th>
                    <th>Note</th>
                    <th>Total</th>
                    <th>Action</th>
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
  

<script>
  $(document).ready(function () {
    $('#list').DataTable({
      "paging": true,
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