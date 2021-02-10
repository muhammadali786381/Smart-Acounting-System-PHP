<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Wanted List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo BASE_URL.ADMIN_DIR; ?>/dashboard">Home</a></li>
              <li class="breadcrumb-item active">My Wanted List</li>
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
                <h3 class="card-title">Wanted List</h3>
                <a href="<?php echo BASE_URL;?>addwanted" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right"><i class="fas fa-plus fa-sm text-white-100"></i> Add New Wanted</a>
              </div>
               <?php
               //print_r($data);
               ?>
             <!-- /.card-header -->
              <div class="card-body">
                <table id="list" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Type</th>
                    <th>Requirements</th>
                    <th>Project Name</th>
                    <th>City</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                      if($data!="NO_DATA"):
                          foreach ($data as $row):
                            if($row['user_id']!=$_SESSION['userId']):
                            
                          //get project detail
                         $project_data=$main->getSingleRecord("project_name_list","id",$row['propject_name_list_id']);
                          //get area_unit
                         $unit_area_data=$main->getSingleRecord("area_unit_list","id",$row['area_unit_id']);
                         //get city
                         $city_data=$main->getSingleRecord("city","id",$row['city_id']);
                         //get proerty post type
                         $status_post_type_data=$main->getSingleRecord("property_post_type","id",$row['property_post_type_id']);
                         //get wanted status for user
                         $wanted_user_status=$main->getSingleRecord("wanted_status_user","id",$row['wanted_status_user_id']);
                         
                         
                        ?>
                      
                  <tr>
                    <td><span class="badge badge-info"><?php echo $status_post_type_data['name'];?></span></td>
                    <td>
                        
                        <table class="table"> 
                          <tr>
                          <td><b> Area:</b> </td>
                          <td><?php echo $row['area']." ".$unit_area_data['name'];?></td>
                          </tr>  
                          
                          <tr>
                          <td><b> Street No:</b> </td>
                          <td><?php echo $row['st_no'];?></td>
                          </tr>
                          
                          <tr>
                          <td><b> Sector: </b> </td>
                          <td><?php echo $row['sector'];?></td>
                          </tr>
                          
                          <tr>
                          <td><b> Wanted Type: </b> </td>
                          <td><?php echo $status_post_type_data['name'];?></td>
                          </tr>
                          
                          <tr>
                          <td><b> Property Type: </b></td>
                          <td><?php echo $row['area']." ".$unit_area_data['name'];?></td>
                          </tr>
                          
                          <tr>
                          <td><b> Min Range: </b></td>
                          <td><?php echo currency_format($row['min_range_amount']);?></td>
                          </tr>
                          
                          <tr>
                          <td><b> Max Range: </b></td>
                          <td><?php echo currency_format($row['max_range_amount']);?></td>
                          </tr>
                          
                      </table>
                    </td>
                    <td><?php echo $project_data['name'];?></td>
                    <td><span class="badge badge-primary"><?php echo $city_data['city_name'];?></span></td>
                    
                    <td class="text-center">
                        <?php
                        if(!$user->isWantedHelpSendByUser($_SESSION['userId'],remove_xss($row['id']))):
                           ?> 
                            <form action="" method="POST">
                                <input type="hidden" name="wanted_id" value="<?php echo $row['id'];  ?>">   
                            <button type="submit" name="WantICanHelp" class="btn btn-sm btn-outline-info"><i class="fas fa-hands-helping"></i> I can Help</button>
                            </form>
                        <?php
                        else:
                            ?>
                        <span class="text-center text-primary">
                            Already sent 
                        </span>
                                
                        <?php
                          endif;
                        ?>
                        
                        
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
                    <th>Requirements</th>
                    <th>Project Name</th>
                    <th>City</th>
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
  //load change status model
  include_once __DIR__.'/change_status_model.php';
  
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

