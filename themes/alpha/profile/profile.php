<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Account ID#: <?php echo $data['user_id'];?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo BASE_URL?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">Account ID#: <?php echo $data['user_id'];?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-success card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?php echo BASE_URL ?>uploads/profile/<?php if(empty($data['profile_img'])){if($data['gender']=="Male"){echo "d-avatar.png";}else{echo "f-avatar.jpg";}}else {echo $data['profile_img'];} ?>"
                       alt="<?php echo $data['user_id'];?>">
                 </div>
                <h3 class="profile-username text-center"><?php echo $data['first_name']." ".$data['last_name'];?></h3>
                <p class="text-muted text-center"><span class="badge badge-info"><?php echo $data['status']?></span></p>
                <p class="text-muted text-center">(Member Since: <?php echo db_date_output($data['create_on']);?>)</p>
                <a type="button" class="btn btn-primary btn-block text-white" data-toggle="modal" data-target="#edit_profile" ><b><i class=" fa fa-edit"></i> Edit Profile Image</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Inventory Summary</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-building mr-1"></i> My Total Inventory</strong><br>
                <p class="text-muted float-right"><span class="badge badge-success"><?php echo $global_your_properties_total;?></span></p><br>
                <hr>
                <strong><i class="fas fa-building mr-1"></i>Inventory Sold Out By Me</strong><br>
                <p class="text-muted float-right"><span class="badge badge-success"><?php echo $global_your_properties_sale;?></span></p><br>
                <hr>
                <strong><i class="fas fa-building mr-1"></i>Inventory Rented Out By Me</strong><br>
                <p class="text-muted float-right"><span class="badge badge-success"><?php echo $global_your_properties_rent;?></span></p><br>
                <hr>
                <strong><i class="fas fa-building mr-1"></i>My Available Inventory</strong><br>
                <p class="text-muted float-right"><span class="badge badge-success"><?php echo $global_your_properties_total_available;?></span></p><br>
                <hr>
                
                <strong><i class="fas fa-building mr-1"></i>Offers Sent</strong><br>
                <p class="text-muted float-right"><span class="badge badge-success"><?php echo $global_your_offers_sent;?></span></p><br>
                <hr>
                
             </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-success card-outline">
              <div class="card-header p-2">
                <ul class="nav nav-pills nav-tabs">
                  
                  <li class="nav-item"><a class="nav-link active"  href="#address_info" data-toggle="tab" ><i class="fas fa-info-circle"></i> Information</a></li>
                  <li class="nav-item"><a class="nav-link" href="#logs" data-toggle="tab"><i class="fas fa-history"></i> Logs</a></li>
<!--                  <li class="nav-item"><a class="nav-link"  href="#attachment" data-toggle="tab" ><i class="fas fa-building"></i> Posted Properties</a></li>-->
                  <li class="nav-item"><a class="nav-link"  href="#chnage_pass" data-toggle="tab" ><i class="fas fa-key"></i> Change Password</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                    
                  <div class="tab-pane  active" id="address_info">
                  <?php
                  //logs tab template get for cusultant/template folder
                  include_once __DIR__.'/info_tab.php';
                  ?>
                  </div>
                          <!-- /.tab-pane -->  
                          
                    <div class="tab-pane" id="logs">
                  <?php
                  //logs tab template get for cusultant/template folder
                  include_once __DIR__.'/logs_list_tab.php';
                  ?>
                  </div>
                          <!-- /.tab-pane -->
                          
                  <div class="tab-pane" id="attachment">
                  <?php
                  //logs tab template get for cusultant/template folder
                  include_once __DIR__.'/doc_list_tab.php';
                  ?>
                  </div>
                          <!-- /.tab-pane -->         
                          
                          
                          
                 <div class="tab-pane" id="chnage_pass">
                  <?php
                  //password change tab template get for cusultant/template folder
                  include_once __DIR__.'/change_password_tab.php';
                  ?>
                  </div>
                          <!-- /.tab-pane -->         
                
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
       </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
   </div>
  <!-- /.content-wrapper -->
  
  <?php
      include_once __DIR__.'/edit_profile_img.php';
  ?>
  
  
  
 
 

