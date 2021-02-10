<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products Price List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           <div class="card card-success">
              <div class="card-header">
               <h3 class="card-title">Products Price List</h3>
<!--              <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right"  data-toggle="modal" data-target="#AddNew"><i class="fas fa-edit fa-sm text-white-100"></i> Create New</a>-->
              </div>
             <!-- /.card-header -->
              <div class="card-body">
                <table id="list" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID#</th>
                    <th width="10%">Image</th>
                    <th>Name</th>
                    <th>Buy Price</th>
                    <th>Sale Price</th>
                  </tr>
                  </thead>
                  <tbody >
                      <?php
                      if($products_list!="NO_DATA"):
                          foreach ($products_list as $row):
                         
                        ?>
                      
                  <tr>
                    <td><?php echo $row['id'];?> <button class="btn btn-link update-id" id="<?php echo $row['id'];?>"><i class="fa fa-edit"></i></button></td>
                    <td><center><img src="<?php echo BASE_URL."uploads/products/".$row['file_link'];?>" class="img-circle img-size-32" style="width:100px;height:100px;"/></center></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['buy_price'];?></td>
                    <td><?php echo $row['sale_price'];?></td>
                  </tr>
                  
                  <?php
                          endforeach;
                      endif;
                   ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Buy Price</th>
                    <th>Sale Price</th>
                  </tr>
                </tfoot>
                </table>
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
  <div class="modal fade" id="AddNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id=""><i class="far fa-plus-square"></i> Create New</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
             <div class="modal-body">
                 <form class="" method="POST" enctype="multipart/form-data">
                   <div class="form-group">
                    <label class="text-primary">Name</label>
                    <input type="text"  class="form-control"  name="name" value="" required="">
                   </div>
                   <div class="form-group">
                    <label class="text-primary">UoM</label>
                    <select class="form-control select2"  name="uom_id"  required="">
                        <option value="">Select UoM</option>
                        <?php $view->selectUoM();?>
                    </select>
                   </div>
                   <div class="form-group">
                    <label class="text-primary">Purchase Price (Optional)</label>
                    <input type="number" step="0.01"  class="form-control"  name="buy_price" value="" >
                   </div>
                   <div class="form-group">
                    <label class="text-primary">Sale Price (Optional)</label>
                    <input type="number" step="0.01"  class="form-control"  name="sale_price" value="" >
                   </div> 
                   <div class="form-group">
                    <label class="text-primary">Description (Optional)</label>
                    <input type="text" class="form-control"  name="description">
                  </div>
                  <div class="form-group">
                    <label class="text-primary">Image (Optional)</label>
                    <input type="file" class="form-control"  name="file">
                  </div>  
                <button  type="submit" name="createNewProduct" class="btn btn-primary btn-user btn-block">
                    <i class="far fa-paper-plane"></i>  Create
               </button>
              </form>
          </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
        
        
        
  <!-- edit model-->
  <div class="modal fade" id="update-model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Update <b>[<span id="edit_name"></span>]</b></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
                   <form class="user" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                    <input type="hidden" name="id" id="edit_value" value=""/>
                    <label class="text-primary">Buy Price</label>
                    <input type="number" step="0.01" class="form-control" name="buy_price" id="edit_buy_price" value=""/>
                    <label class="text-primary">Sale Price</label>
                    <input type="number" step="0.01" class="form-control" name="sale_price" id="edit_sale_price" value=""/>
                    </div>    
                <button  type="submit" name="updateProductPrice" class="btn btn-primary btn-user btn-block">
                <i class="fa fa-check-circle-o"> </i>  Update
               </button>
              </form>
         </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
</div>
  
  
  
<script>
  $(document).ready(function () {
    $('#list').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "order": [[ 0, "desc" ]]
    });
    
      //get table row data 
        $('.table tbody').on('click', '.update-id', function(){ 
        var currow=$(this).closest('tr');
        var col1=currow.find('td:eq(0)').text();
        var col2=currow.find('td:eq(2)').text();
        var col3=currow.find('td:eq(3)').text();
        var col4=currow.find('td:eq(4)').text();
        $('#edit_value').val(col1);
        $('#edit_name').text(col2);
        $('#edit_buy_price').val(col3);
        $('#edit_sale_price').val(col4);
        $('#update-model').modal('show');
       });
  });
 
</script>