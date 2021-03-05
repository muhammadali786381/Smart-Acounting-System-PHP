 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Setting</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">Setting</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           <div class="card card-success">
              <div class="card-header">
               <h3 class="card-title">Setting</h3>
               <a href="#" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right mr-1"  data-toggle="modal" data-target="#AddInvoiceLogo"><i class="fas fa-image fa-sm text-white-100"></i> Update Invoice Logo</a>
               <a href="#" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right mr-1"  data-toggle="modal" data-target="#AddAppLogo"><i class="fas fa-image fa-sm text-white-100"></i> Update App Logo</a>
               <a href="#" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right mr-1"  data-toggle="modal" data-target="#AddFavIcon"><i class="fas fa-image fa-sm text-white-100"></i> Update Fav Icon</a>
               <a href="#" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right mr-1"  data-toggle="modal" data-target="#AddSideBarLogo"><i class="fas fa-image fa-sm text-white-100"></i> Update Side Bar Logo</a>
              </div>
             <!-- /.card-header -->
              <div class="card-body">
                 <form class="" method="POST" enctype="multipart/form-data">
                   <div class="form-group">
                    <label class="text-primary">Application Name</label>
                    <input type="text"  class="form-control"  name="APP_NAME" value="<?php echo $view->app_config("APP_NAME")?>" required="">
                   </div>
                   <div class="form-group">
                    <label class="text-primary">Application Short Name</label>
                    <input type="text" class="form-control"  name="APP_SHORT_NAME" value="<?php echo $view->app_config("APP_SHORT_NAME")?>" required="">
                  </div>
                  <div class="form-group">
                    <label class="text-primary">Application Dashboard Name</label>
                    <input type="text" class="form-control"  name="APP_DASHBOARD_NAME" value="<?php echo $view->app_config("APP_DASHBOARD_NAME")?>" required="">
                  </div>   
                  <div class="form-group">
                    <label class="text-primary">Currency Name</label>
                    <input type="text" class="form-control"  name="APP_CURRENCY_NAME" value="<?php echo $view->app_config("APP_CURRENCY_NAME")?>" required="">
                  </div> 
                  <div class="form-group">
                    <label class="text-primary">Currency Symbol</label>
                    <input type="text" class="form-control"  name="APP_CURRENCY_SYMBOL" value="<?php echo $view->app_config("APP_CURRENCY_SYMBOL")?>" required="">
                  </div>  
                   <div class="form-group">
                    <label class="text-primary">Phone</label>
                    <input type="text" class="form-control"  name="APP_PHONE" value="<?php echo $view->app_config("APP_PHONE")?>" required="">
                  </div>  
                  
                  <div class="form-group">
                    <label class="text-primary">YA RAZZAQ PERCENT</label>
                    <input type="number" class="form-control"  name="APP_YA_RAZZAQ_PERCENT" value="<?php echo $view->app_config("APP_YA_RAZZAQ_PERCENT")?>" required="">
                  </div>     
                     
                     
                     
                    
                <button  type="submit" name="updateAppSetting" class="btn btn-primary btn-user btn-block">
                    <i class="fa fa-check-circle-o"></i>  Update
               </button>
              </form>
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
  
  
        <!-- create new coupon model-->
  <div class="modal fade" id="AddInvoiceLogo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id=""><i class="far fa-edit"></i> Update Logo</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
             <div class="modal-body">
                 <form class="" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label class="text-primary">Logo (80x80)</label>
                    <input type="file" name="file" class="form-control" required=""/>
                   </div>     
                <button  type="submit" name="updateSystemLogo" class="btn btn-primary btn-user btn-block">
                    <i class="fa fa-check-circle-o"></i>  Update
               </button>
              </form>
          </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>  
        
         <!-- create new coupon model-->
  <div class="modal fade" id="AddAppLogo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id=""><i class="far fa-edit"></i> Update Logo</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
             <div class="modal-body">
                 <form class="" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label class="text-primary">Logo (250x70)</label>
                    <input type="file" name="file" class="form-control" required=""/>
                   </div>     
                <button  type="submit" name="updateAppLogo" class="btn btn-primary btn-user btn-block">
                    <i class="fa fa-check-circle-o"></i>  Update
               </button>
              </form>
          </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>   
         
         <!-- create new coupon model-->
  <div class="modal fade" id="AddFavIcon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id=""><i class="far fa-edit"></i> Update Logo</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
             <div class="modal-body">
                 <form class="" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label class="text-primary">Logo (32x32)</label>
                    <input type="file" name="file" class="form-control" required=""/>
                   </div>     
                <button  type="submit" name="updateFavIcon" class="btn btn-primary btn-user btn-block">
                    <i class="fa fa-check-circle-o"></i>  Update
               </button>
              </form>
          </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>    
  
  
  <!-- create new coupon model-->
  <div class="modal fade" id="AddSideBarLogo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id=""><i class="far fa-edit"></i> Update Logo</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
             <div class="modal-body">
                 <form class="" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label class="text-primary">Logo (100x88)</label>
                    <input type="file" name="file" class="form-control" required=""/>
                   </div>     
                <button  type="submit" name="updateSideBarLogo" class="btn btn-primary btn-user btn-block">
                    <i class="fa fa-check-circle-o"></i>  Update
               </button>
              </form>
          </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>     
       
