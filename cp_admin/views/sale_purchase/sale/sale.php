 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Sale Voucher</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">Sale Voucher</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    
        <?php
        //load invoice list
        include_once __DIR__.'/list.php';  
        //load create new invoice model
        include_once __DIR__.'/create_new_model.php';  
        ?>
    
  </div>
  <!-- /.content-wrapper -->
