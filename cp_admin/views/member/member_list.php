<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Member List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo BASE_URL.ADMIN_DIR; ?>/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Member List</li>
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
                <h3 class="card-title">Member List</h3>
                <a href="#" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right"  data-toggle="modal" data-target="#AddNew"><i class="fas fa-plus fa-sm text-white-100"></i> Create New</a>
              </div>
             <!-- /.card-header -->
              <div class="card-body">
                <table id="list" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Account ID#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Agency Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                      if($data!="NO_DATA"):
                          foreach ($data as $row):
                        ?>
                      
                  <tr>
                    <td><?php echo $row['user_id'];?></td>
                    <td><?php echo $row['first_name']." ".$row['last_name'];?></td>
                    <td><?php echo $row['mobile'];?></td>
                    <td><?php echo $row['agency_name'];?></td>
                    <td><span class="badge badge-primary"><?php echo $row['email'];?></span></td>
                    <td><span class="badge badge-danger"><?php echo $row['status'];?></span></td>
                    <td><a href="<?php echo BASE_URL.ADMIN_DIR; ?>/users/member/<?php echo $row['user_id']; ?>" target="__blank" title="Detail" class="btn btn-outline-danger"><i class="fa fa-eye"></i></a></td>
                  </tr>
                  
                  <?php
                          endforeach;
                      endif;
                   ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Account ID#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Agency Name</th>
                    <th>Email</th>
                    <th>Status</th>
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
  include_once __DIR__.'/create_new_model.php';
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

