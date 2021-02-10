 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
<!--    <div class="content-header">
      <div class="container-fluid">
          
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboards</h1>
          </div> /.col 
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo BASE_URL.ADMIN_DIR; ?>/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Company</li>
            </ol>
          </div> /.col 
        </div> /.row 
        
      </div> /.container-fluid 
    </div>-->
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <h1 class="text-center text-warning"><?php echo $view->app_config("APP_COMPANY_NAME")?></h1>
          
          <div class="row" style="margin-top:5%;">
          <?php
          if($data!="NO_DATA"):
              foreach ($data as $row):
         ?>
              
          <div class="col-md-6">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <h3 class="widget-user-username"><?php echo $row['name'];?></h3>
                <h5 class="widget-user-desc"><?php echo $row['address'];?></h5>
              </div>
              
              <div class="widget-user-image">
                  <img class="img-circle elevation-2" src="<?php echo BASE_URL; ?>uploads/site/<?php echo (!empty($row['image_link']))?$row['image_link']:"company-logo.jpg";?>" alt="logo">
              </div>
              
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="description-block">
                        <form action="" method="POST">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input type="submit" class="btn btn-primary" name="selectCompanyByAdmin" value="Select">
                        </form>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              
            </div>
            <!-- /.widget-user -->
          </div>
              
              <?php
                 endforeach;
          endif;
         ?>
          
        </div>
          
       
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->