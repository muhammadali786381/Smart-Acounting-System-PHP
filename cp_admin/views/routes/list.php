<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Routes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo BASE_URL.ADMIN_DIR; ?>/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Routes</li>
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
                <h3 class="card-title">Account Head</h3>
                <a href="#" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right"  data-toggle="modal" data-target="#AddNew"><i class="fas fa-plus fa-sm text-white-100"></i> Create New</a>
              </div>
             <!-- /.card-header -->
              <div class="card-body">
                <table id="list" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Day</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                      if($data!="NO_DATA"):
                          foreach ($data as $row):
                        ?>
                      
                  <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['route_name'];?></td>
                    <td><?php echo $row['day_name'];?></td>
                    <td><?php echo $row['description'];?></td>
                    <!--<i class="fa fa-eye"></i> -->
                    <td><button  type="button" href="#" class="d-sm-inline-block btn btn-outline-danger shadow-sm btn-view"  data-toggle="modal" data-target="#"><i class="fas fa-eye fa-sm text-white-100"></i> View</a></td>
                  </tr>
                  
                  <?php
                          endforeach;
                      endif;
                   ?>
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Day</th>
                    <th>Description</th>
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
  </div>
  <!-- /.content-wrapper -->
  
  <?php
  //add new model load
  include_once __DIR__.'/create_new.php';
  ?>
  
  
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

