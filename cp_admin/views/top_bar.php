 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-cyan">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <?php
    if(isset($select_company)):
    ?>
    <h5 class="text-warning" style="margin-top:0.5%;"><b><?php echo (isset($select_company))?"(".$select_company['id'].")".$select_company['name']:"";?></b> <a href="<?php echo BASE_URL.ADMIN_DIR."/select-company"?>"><i class="fas fa-edit"></i></a></h5> 
    <?php
    endif;
    ?>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
          <a class="nav-link"  href="<?php echo BASE_URL.ADMIN_DIR ?>/logout" role="button">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->