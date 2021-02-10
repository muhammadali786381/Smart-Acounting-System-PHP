<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Requirements</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo BASE_URL?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">Add Requirements</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <!-- Profile Image -->
            <div class="card card-success card-outline">
             <div class="card-header">
             <h4>Requirements Submission Form</h4>
             <p class="text-black-50">Please enter requirements carefully</p>
             </div>
              <div class="card-body">
                  <form class="" method="POST" enctype="multipart/form-data">
                  
                  <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="text-primary"><i class="fas fa-archway"></i> Project Name <a href="#" class="btn-sm btn-primary shadow-sm"  data-toggle="modal" data-target="#AddNewProject"> <i class="fas fa-plus-square fa-sm text-white-100"></i></a></label>
                        <select class="form-control select2" name="propject_name_list_id" required="" autofocus="">
                        <option value="">Select Project</option>
                        <?php
                        echo $view->selectProject();
                        ?>
                   </select>
                    </div>
                      
                    <div class="col-sm-4">
                     <label class="text-primary"><i class="fa fa-tag"></i> Wanted Type</label>
                    <select class="form-control select2" name="property_post_type_id" required="">
                        <option value="">Select Inventory Type</option>
                        <?php
                        echo $view->selectPropertyPostType();
                        ?>
                    </select>
                    </div>
                      
                    <div class="col-sm-4">
                     <label class="text-primary"><i class="fas fa-building"></i> Property Type</label>
                    <select class="form-control select2" name="property_type_id" required="">
                        <option value="">Select Property Type</option>
                        <?php
                        echo $view->selectPropertyType();
                        ?>
                   </select>
                    </div>
                 </div>  
                 <hr>
                  <div class="form-group row">
                   <div class="col-sm-3">
                     <label class="text-primary"><i class="fas fa-balance-scale"></i> Area Unit</label>
                    <select class="form-control select2" name="area_unit_id" required="">
                        <option value="">Select Area Unit</option>
                        <?php
                        echo $view->selectUnitArea();
                        ?>
                   </select>
                    </div>
                      
                    <div class="col-sm-3">
                    <label class="text-primary"><i class="fas fa-arrows-alt-h"></i> Area</label>
                    <input type="text" name="area" class="form-control" placeholder="" required="">
                    </div>
                      
                      
                    <div class="col-sm-3">
                    <label class="text-primary"><i class="fas fa-sign"></i> Street No (Optional)</label>
                    <input type="text" name="st_no"  placeholder="" class="form-control">
                    </div> 
                    
                    <div class="col-sm-3">
                    <label class="text-primary"><i class="fas fa-sign"></i> Sector</label>
                    <input type="text" name="sector"  placeholder="" class="form-control" required="">
                    </div>
                 </div> 
                 <hr>
                 
                 <div class="form-group row">
                    <div class="col-sm-4">
                     <label class="text-primary"><i class="fas fa-city"></i> City</label>
                        <select class="form-control select2" name="city_id" required="">
                            <option value="">Select City</option>
                            <?php
                            echo $view->selectCity();
                            ?>
                       </select>
                    </div> 
                     
                     
                   <div class="col-sm-4">
                    <label class="text-primary"><i class="fas fa-money-bill-wave"></i> Your Minimum Range</label>
                    <input type="number" name="min_range_amount"  placeholder="" class="form-control" required="">
                   </div>  
                    
                    <div class="col-sm-4">
                    <label class="text-primary"><i class="fas fa-money-bill-wave"></i> Your Maximum Range</label>
                    <input type="number" name="max_range_amount"  placeholder="" class="form-control">
                    </div>  
                    
                     
                    <div class="col-sm-12">
                    <label class="text-primary"><i class="fas fa-clipboard"></i> Comments <small>(if any)</small></label>
                    <input type="text" name="description"  placeholder="" class="form-control">
                    </div> 
                     
                   </div> 
                   
                     
               <button  type="submit" name="createNewWanted" class="btn btn-primary btn-user btn-block">
                    <i class="far fa-paper-plane"></i>  Submit Wanted
               </button>
                     
               </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
       </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
   </div>
  <!-- /.content-wrapper -->
  
  <?php
  //load create new project model
  include_once __DIR__.'/add_project_model.php';
  ?>
  
  
  
  
  
 
 

