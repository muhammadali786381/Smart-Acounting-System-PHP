 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ledger</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo BASE_URL.ADMIN_DIR; ?>/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Ledger</li>
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
                    <a href="<?php echo BASE_URL.ADMIN_DIR."/party-ledger";?>"> 
                  <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-clipboard"></i></span>
                     <div class="info-box-content">
                      <span class="info-box-text">Party Ledger</span>
                      <span class="info-box-number"><?php echo "";?></span>
                    </div>
              <!-- /.info-box-content -->
                  </div>
                        </a>
                  <!--  /.info-box -->
                </div>
                  <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <a href="<?php echo BASE_URL.ADMIN_DIR."/monthly-sale";?>"> 
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-clipboard"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Monthly Sale</span>
                      <span class="info-box-number"><?php echo "";?></span>
                    </div>
          <!-- /.info-box-content -->
                  </div>
                      </a>
          <!--/.info-box -->
                </div>
          <!-- /.col -->

              <div class="col-12 col-sm-6 col-md-3">
                    <a href="<?php echo BASE_URL.ADMIN_DIR."/monthly-purchase";?>"> 
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-clipboard"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Monthly Purchase</span>
                      <span class="info-box-number"><?php echo "";?></span>
                    </div>
          <!-- /.info-box-content -->
                  </div>
                      </a>
          <!--/.info-box -->
                </div>
          <!-- /.col -->

           <div class="col-12 col-sm-6 col-md-3">
                    <a href="<?php echo BASE_URL.ADMIN_DIR."/monthly-commission";?>"> 
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-clipboard"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Monthly Commission</span>
                      <span class="info-box-number"><?php echo "";?></span>
                    </div>
          <!-- /.info-box-content -->
                  </div>
                      </a>
          <!--/.info-box -->
                </div>
          <!-- /.col -->


            <div class="col-12 col-sm-6 col-md-3">
                    <a href="<?php echo BASE_URL.ADMIN_DIR."/teller-balance";?>"> 
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-clipboard-check"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Teller Balance</span>
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



