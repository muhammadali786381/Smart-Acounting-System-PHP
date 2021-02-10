<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Inventory</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo BASE_URL?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">Edit Inventory</li>
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
             <h4>Inventory Edit Form</h4>
             <p class="text-black-50">Please enter inventory details carefully</p>
             </div>
              <div class="card-body">
                  <form class="" method="POST" enctype="multipart/form-data">
                  
                  <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="text-primary"><i class="fas fa-archway"></i> Project Name <a href="#" class="btn-sm btn-primary shadow-sm"  data-toggle="modal" data-target="#AddNewProject"> <i class="fas fa-plus-square fa-sm text-white-100"></i></a></label>
                    <select class="form-control select2" name="project_name_list_id" required="">
                        <optgroup label="Current selection">
                            <option value="<?php echo $data['project_detail']['id']; ?>"><?php echo $data['project_detail']['name']; ?></option>
                        </optgroup>
                        
                        <optgroup label="Available selection">
                        <?php
                        echo $view->selectProject();
                        ?>
                        </optgroup>
                        
                   </select>
                    </div>
                    <div class="col-sm-4">
                     <label class="text-primary"><i class="fa fa-tag"></i> Inventory Type</label>
                    <select class="form-control select2" name="property_type_id" required="">
                        <optgroup label="Current selection">
                            <option value="<?php echo $data['property_post_type_detail']['id']; ?>"><?php echo $data['property_post_type_detail']['name']; ?></option>
                        </optgroup>
                        <optgroup label="Available selection">
                        <?php
                        echo $view->selectPropertyPostType();
                        ?>
                        </optgroup>    
                    </select>
                    </div>
                      
                    <div class="col-sm-4">
                     <label class="text-primary"><i class="fas fa-building"></i> Property Type</label>
                    <select class="form-control select2" name="property_post_type_id" required="">
                        <optgroup label="Current selection">
                            <option value="<?php echo $data['property_type_detail']['id']; ?>"><?php echo $data['property_type_detail']['name']; ?></option>
                        </optgroup>
                        <optgroup label="Available selection">
                        <?php
                        echo $view->selectPropertyType();
                        ?>
                        </optgroup>
                   </select>
                    </div>
                 </div>  
                 <hr>
                  <div class="form-group row">
                   <div class="col-sm-4">
                     <label class="text-primary"><i class="fas fa-balance-scale"></i> Area Unit</label>
                    <select class="form-control select2" name="area_unit_id" required="">
                        <optgroup label="Current selection">
                            <option value="<?php echo $data['area_unit_detail']['id']; ?>"><?php echo $data['area_unit_detail']['name']; ?></option>
                        </optgroup>
                        <optgroup label="Available selection">
                        <?php
                        echo $view->selectUnitArea();
                        ?>
                        </optgroup>    
                   </select>
                    </div>
                      
                    <div class="col-sm-4">
                    <label class="text-primary"><i class="fas fa-arrows-alt-h"></i> Area</label>
                    <input type="text" name="area_size" value="<?php echo $data['data']['area_size']; ?>" class="form-control" placeholder="" required="">
                    </div>
                      
                    <div class="col-sm-4">
                    <label class="text-primary"><i class="fas fa-sign"></i> Plot Number</label>
                    <input type="text" name="plot_no"  placeholder="" value="<?php echo $data['data']['plot_no']; ?>" class="form-control" required="">
                    </div>  
                      
                    <div class="col-sm-4">
                    <label class="text-primary"><i class="fas fa-sign"></i> Street No (Optional)</label>
                    <input type="text" name="st_no"  placeholder="" value="<?php echo $data['data']['st_no']; ?>" class="form-control">
                    </div> 
                    
                    <div class="col-sm-4">
                    <label class="text-primary"><i class="fas fa-sign"></i> Sector</label>
                    <input type="text" name="sector"  placeholder="" value="<?php echo $data['data']['sector']; ?>" class="form-control" required="">
                    </div>
                      
                     <div class="col-sm-4">
                     <label class="text-primary"><i class="fas fa-city"></i> City</label>
                    <select class="form-control select2" name="city_id" required="">
                        <optgroup label="Current selection">
                            <option value="<?php echo $data['city_detail']['id']; ?>"><?php echo $data['city_detail']['city_name']; ?></option>
                        </optgroup>
                        <optgroup label="Available selection">
                        <?php
                        echo $view->selectCity();
                        ?>
                         </optgroup>   
                   </select>
                    </div> 
                 </div> 
                 <hr>
                 <div class="form-group row">
                     
                   <div class="col-sm-3">
                    <label class="text-primary"><i class="fas fa-money-bill-wave"></i> Your Demand</label>
                    <input type="number" name="demand"  placeholder="" value="<?php echo $data['data']['demand']; ?>" class="form-control" required="">
                    </div>  
                    
                    <div class="col-sm-3">
                    <label class="text-primary"><i class="fas fa-money-bill-wave"></i> Bottom Line (Optional)</label>
                    <input type="number" name="bottom_line_amount" value="<?php echo $data['data']['bottom_line_amount']; ?>"  placeholder="" class="form-control">
                    </div>  
                    
                    <div class="col-sm-3">
                        <label class="text-primary"><i class="fas fa-paperclip"></i> Attachment <small>(Allowed: png|jpg|jpeg)</small></label>
                    <input type="file" name="file_link" value="<?php echo $data['data']['file_link'];?>"  placeholder="" class="form-control">
                    </div>
                     
                    <div class="col-sm-3">
                    <label class="text-primary"><i class="fas fa-clipboard"></i> Comments <small>(if any)</small></label>
                    <input type="text" name="property_description" value="<?php echo $data['data']['property_description']; ?>"  placeholder="" class="form-control">
                    </div> 
                     
                   </div> 
                   
                 <input type="hidden" name="id" value="<?php echo $data['data']['id']; ?>"  placeholder="" class="form-control">     
               <button  type="submit" name="updatePropertybyUser" class="btn btn-primary btn-user btn-block">
                    <i class="far fa-paper-plane"></i>  Update Inventory
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
  
  
  
  
  
 
 

