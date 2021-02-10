 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Sale Purchase</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo BASE_URL.ADMIN_DIR; ?>/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Sale Purchase</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            
            <div class="row">
                
                <div class="col-12 col-sm-6 col-md-3">
                    <a href="<?php echo BASE_URL.ADMIN_DIR."/sale-voucher";?>"> 
                  <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cash-register"></i></span>
                     <div class="info-box-content">
                      <span class="info-box-text">Sale Voucher</span>
                      <span class="info-box-number"><?php echo "";?></span>
                    </div>
              <!-- /.info-box-content -->
                  </div>
                        </a>
                  <!--  /.info-box -->
                </div>
                  <!-- /.col -->
                  
                <div class="col-12 col-sm-6 col-md-3">
                    <a href="<?php echo BASE_URL.ADMIN_DIR."/purchase-voucher";?>"> 
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-cash-register"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Purchase Voucher</span>
                      <span class="info-box-number"><?php echo "";?></span>
                    </div>
          <!-- /.info-box-content -->
                  </div>
                      </a>
          <!--/.info-box -->
                </div>
          <!-- /.col -->


           <div class="col-12 col-sm-6 col-md-3">
                    <a href="<?php echo BASE_URL.ADMIN_DIR."/report-of-sale-purchase";?>"> 
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-list-ul"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Report of Sale Purchase</span>
                      <span class="info-box-number"><?php echo "";?></span>
                    </div>
          <!-- /.info-box-content -->
                  </div>
                      </a>
          <!--/.info-box -->
                </div>
          <!-- /.col -->

          <!--fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

              </div>
         <!--/.row -->
         
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



