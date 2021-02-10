<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Inventory Rented Out By Me</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">Inventory Rented Out By Me</li>
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
                <h3 class="card-title">Inventory Rented Out By Me</h3>
                <a href="<?php echo BASE_URL;?>addnewproperty" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right"><i class="fas fa-plus fa-sm text-white-100"></i> Add New Inventory</a>
              </div>
             <!-- /.card-header -->
              <div class="card-body">
                <table id="list" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Type</th>
                    <th>Project Name</th>
                    <th>Demand</th>
                    <th>Area</th>
                    <th>City</th>
                    <th>Post Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                      if($data!="NO_DATA"):
                         foreach ($data as $row):
                          if($row['property_post_status_id']=="3"):
                          //get project detail
                         $project_data=$main->getSingleRecord("project_name_list","id",$row['project_name_list_id']);
                          //get area_unit
                         $unit_area_data=$main->getSingleRecord("area_unit_list","id",$row['area_unit_id']);
                         //get city
                         $city_data=$main->getSingleRecord("city","id",$row['city_id']);
                         //get status
                         $status_data=$main->getSingleRecord("property_post_status","id",$row['property_post_status_id']);
                         //get proerty post type
                         $status_post_type_data=$main->getSingleRecord("property_post_type","id",$row['property_type_id']);
                        ?>
                      
                  <tr>
                    <td><span class="badge badge-info"><?php echo $status_post_type_data['name'];?></span></td>
                    <td><?php echo $project_data['name'];?></td>
                    <td><?php echo currency_format($row['demand']);?></td>
                    <td><?php echo $row['area_size']." ".$unit_area_data['name'];?></td>
                    <td><span class="badge badge-primary"><?php echo $city_data['city_name'];?></span></td>
                    <td><span class="badge badge-danger"><?php echo db_date_output($row['create_on']);?></span></td>
                    <td><span class="badge badge-success"><?php echo $status_data['name'];?></span> <a href="#" id="<?php echo $row['property_post_status_id']; ?>" title="Update Status" data-id="<?php echo $row['id'];?>" data-for-property="<?php echo $row['property_type_id'];?>" class="btn-sm btn-outline-secondary update-id"><i class="fas fa-edit"></i></a></td>
                    <td>
                    <a href="<?php echo BASE_URL;?>viewproperty/<?php echo $row['id']; ?>"  title="Detail" class="btn btn-outline-danger"><i class="fa fa-eye"></i> View Details</a>
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
                    <th>Type</th>
                    <th>Project Name</th>
                    <th>Demand</th>
                    <th>Area</th>
                    <th>City</th>
                    <th>Post Date</th>
                    <th>Status</th>
                    <th>Actions</th>
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
 //load make offer model
 include_once __DIR__.'/../change_status_model.php';
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

