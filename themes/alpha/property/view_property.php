<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Inventory ID#: <?php echo $data['data']['id'];?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo BASE_URL?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">Inventory ID#: <?php echo $data['data']['id'];?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <div class="row">
             <div class="col-sm-3"> 
            <!-- About Me Box -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Specific Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-arrows-alt-h mr-1"></i> Area</strong><br>
                <p class="text-muted float-right"><span class="badge badge-success"><?php echo $data['data']['area_size']." ".$data['area_unit_detail']['name']; ?></span></p><br>
                <hr>
                
                <strong><i class="fas fas fa-sign mr-1"></i> Plot Number</strong><br>
                <p class="text-muted float-right"><span class="badge badge-success"><?php echo $data['data']['plot_no']; ?></span></p><br>
                <hr>
                
                <strong><i class="fas fa-sign mr-1"></i> Street Number</strong><br>
                <p class="text-muted float-right"><span class="badge badge-success"><?php echo $data['data']['st_no']; ?></span></p><br>
                <hr>
                
                <strong><i class="fas fas fa-sign mr-1"></i> Sector</strong><br>
                <p class="text-muted float-right"><span class="badge badge-success"><?php echo $data['data']['sector']; ?></span></p><br>
                <hr>
                
                <strong><i class="fas fas fa-building mr-1"></i> Project</strong><br>
                <p class="text-muted float-right"><span class="badge badge-success"><?php echo ($data['project_detail']!="NO_DATA")?$data['project_detail']['name']:"";?></span></p><br>
                <hr>
                
                <strong><i class="fas fa-city mr-1"></i> City</strong><br>
                <p class="text-muted float-right"> <span class="badge badge-success"><?php echo ($data['city_detail']!="")?$data['city_detail']['city_name']:"";?></span></p>
                
             </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
              
            <div class="col-sm-3">
            <!-- About Box -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">General Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <strong><i class="fas fa-building mr-1"></i> Inventory Type</strong>
                <p class="text-muted"><?php echo ($data['property_post_type_detail']!="")?$data['property_post_type_detail']['name']:"";?></p>
                <hr>
                
                <strong><i class="fas fa-tag mr-1"></i> Property Type</strong>
                <p class="text-muted"><?php echo ($data['property_type_detail']!="")?$data['property_type_detail']['name']:"";?></p>
                <hr>
                
                <strong><i class="fas fa-calendar mr-1"></i> Posted On</strong>
                <p class="text-muted"><?php echo ($data['data']!="")?db_date_output($data['data']['create_on']):"";?></p>
                <hr>
                
                <strong><i class="fas fa-question-circle mr-1"></i> Status</strong>
                <p class="text-muted"><span class="badge badge-info"><?php echo ($data['status_detail']!="")?$data['status_detail']['name']:"";?></span></p>
                <hr>
                
                
             </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
              
             
            
            <div class="col-sm-3">
            <!-- About Me Box -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Demand</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-bod text-center">
                  <h2 class="text-center m-2"><?php echo currency_format($data['data']['demand'],0); ?></h2>
                  <?php
                        if(!$user->isOfferSendByUser($login_user['user_id'],$data['data']['id']) && $login_user['user_id']!=$data['data']['user_id']):
                          ?>
                  <br><a href="#"  title="Send Offer" class="btn btn-outline-info make-offer-id" style="margin-top:-5%;margin-bottom:1%"><i class="fas fa-coffee"></i> Send Offer</a>
                         <?php 
                        endif;
                     ?>
             </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
              
            <?php
            //show only for property owner
            if($login_user['user_id']==$data['data']['user_id']):
            ?>  
            <div class="col-sm-3">
            <!-- About Me Box -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Potential Offer</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-bod text-center">
                  <h2 class="text-center m-2"><?php echo ($data['data']['admin_offer']!=0)?currency_format($data['data']['admin_offer'],0):"--";?></h2>
                  <?php
                  if($data['data']['admin_offer']!=0):
                  ?>
                  <a href="https://api.whatsapp.com/send?phone=<?php echo $view->app_config("APP_WP_OFFER_NO"); ?>&text=Hello... This message relates to offer of plot#<?php echo $data['data']['plot_no'];?>." class="btn btn-outline-info m-1"> <i class="fab fa-whatsapp"></i> Chat regarding offer</a>
                  <br>
                  <a href="tel:<?php echo  $view->app_config("APP_MOBILE_OFFER_NO")?>" class="btn btn-outline-danger m-1"><i class="fas fa-phone-alt"></i> <?php echo  $view->app_config("APP_MOBILE_OFFER_NO")?></a>
                   <?php
                  endif;
                  ?>
                  
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
            <?php 
              endif;
            ?>
              
              
              
              
         </div>
          <!-- /row -->
          
          
          <div class="col-md-12">
            <div class="card card-success card-outline">
              <div class="card-header p-2">
                <ul class="nav nav-pills nav-tabs">
                  <li class="nav-item"><a class="nav-link active" href="#logs" data-toggle="tab"><i class="fas fa-paperclip"></i> Attachment</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                    
                 
                          <!-- /.tab-pane -->
                   <div class="tab-pane active" id="logs">
                  <?php
                  //logs tab template get for cusultant/template folder
                  include_once __DIR__.'/attachment.php';
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
        
       </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
   </div>
  <!-- /.content-wrapper -->
  
  
 <?php
 //load make offer model
 include_once __DIR__.'/make_offer_model.php';
 ?> 
  
  
  
  
  
 
 

