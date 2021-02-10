<!-- Info boxes 
properties -> Inventory
-->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
              <a href="<?php echo BASE_URL."listofproperty";?>"> 
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-th-list"></i></span>
               <div class="info-box-content">
                <span class="info-box-text">Inventory</span>
                <span class="info-box-number"><?php echo $global_total_properties;?></span>
              </div>
        <!-- /.info-box-content -->
            </div>
                  </a>
            <!--  /.info-box -->
          </div>
            <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
              <a href="<?php echo BASE_URL."availforsale";?>"> 
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-box-open"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Inventory Available for Sale</span>
                <span class="info-box-number"><?php echo $global_total_properties_available_sale;?></span>
              </div>
    <!-- /.info-box-content -->
            </div>
                </a>
    <!--/.info-box -->
          </div>
    <!-- /.col -->
    
        <div class="col-12 col-sm-6 col-md-3">
              <a href="<?php echo BASE_URL."availforrent";?>"> 
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-box-open"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Inventory Available for Rent</span>
                <span class="info-box-number"><?php echo $global_total_properties_available_rent;?></span>
              </div>
    <!-- /.info-box-content -->
            </div>
                </a>
    <!--/.info-box -->
          </div>
    <!-- /.col -->
    
    <div class="col-12 col-sm-6 col-md-3">
              <a href="<?php echo BASE_URL."postbymeproperty";?>"> 
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-th-list"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">My Total Inventory</span>
                <span class="info-box-number"><?php echo $global_your_properties_total;?></span>
              </div>
<!--               /.info-box-content -->
            </div>
<!--             /.info-box -->
                </a>
          </div>
<!--           /.col -->
    
    
        <div class="col-12 col-sm-6 col-md-3">
                  <a href="<?php echo BASE_URL."propertysoldbyme";?>"> 
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-info elevation-1"><i class="fas fa-certificate"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Inventory Sold Out By Me</span>
                    <span class="info-box-number"><?php echo $global_your_properties_sale;?></span>
                  </div>
    <!--               /.info-box-content -->
                </div>
    <!--             /.info-box -->
                    </a>
            </div>
    <!--           /.col -->
    
    
    
            <div class="col-12 col-sm-6 col-md-3">
                  <a href="<?php echo BASE_URL."propertyrentedbyme";?>"> 
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-certificate"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Inventory Rented Out By Me</span>
                    <span class="info-box-number"><?php echo $global_your_properties_rent;?></span>
                  </div>
    <!--               /.info-box-content -->
                </div>
    <!--             /.info-box -->
                    </a>
              </div>
    <!--           /.col -->
    
    
    <!--fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          

          <div class="col-12 col-sm-6 col-md-3">
              <a href="<?php echo BASE_URL."myavail";?>"> 
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-box-open"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">My Available Inventory</span>
                <span class="info-box-number"><?php echo $global_your_properties_total_available;?></span>
              </div>
<!--               /.info-box-content -->
            </div>
<!--             /.info-box -->
                </a>
          </div>
<!--           /.col -->


         <div class="col-12 col-sm-6 col-md-3">
                  <a href="<?php echo BASE_URL."myoffers";?>"> 
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-coffee"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Offers Sent</span>
                    <span class="info-box-number"><?php echo $global_your_offers_sent;?></span>
                  </div>
    <!--/.info-box-content -->
                </div>
    <!--/.info-box -->
                   </a>
              </div>
    <!--/.col -->
        </div>
   <!--/.row -->