
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Offers List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">My Offers List</li>
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
           <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Offers List</h3>
              </div>
             <!-- /.card-header -->
              <div class="card-body">
                <table id="list" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Inventory ID</th>
                    <th>Offer</th>
                    <th>Demand</th>
                    <th>Inventory Status</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      if($data!="NO_DATA"):
                         foreach ($data as $row):
                          //get project detail
                          $property_data=$main->getSingleRecord("property_post_list","id",$row['property_post_list_id']);
                          //get proerty status
                          $status_post_status=$main->getSingleRecord("property_post_status","id",$property_data['property_post_status_id']);
                       ?>
                  <tr>
                      <td><a href="<?php echo BASE_URL."viewproperty/".$row['property_post_list_id']; ?>" class="btn btn-outline-info"><i class="fas fa-eye"></i> View Inventory</a></td>
                    <td><?php echo currency_format($row['offer_amount']);?></td>
                    <td><?php echo currency_format($row['demand_amount']);?></td>
                    <td><span class="badge badge-primary"><?php echo $status_post_status['name'];?></span></td>
                  </tr>
                  <?php
                          endforeach;
                      endif;
                   ?>
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Inventory ID</th>
                    <th>Demand</th>
                    <th>Offer</th>
                    <th>Inventory Status</th>
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
      "pageLength": 50,
      "order": [[ 0, "desc" ]]
    });
  });
</script>

