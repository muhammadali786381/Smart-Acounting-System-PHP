<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products List</h1>
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
               <h3 class="card-title">Products List</h3>
                <a href="#" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right"  data-toggle="modal" data-target="#AddNew"><i class="fas fa-edit fa-sm text-white-100"></i> Create New</a>
              </div>
             <!-- /.card-header -->
              <div class="card-body">
                <table id="list" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID#</th>
                    <th>Name</th>
                    <th>B.Price | S.Prince</th>
                    <th>Description</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                     // print_r($data);
                      if($data!="NO_DATA"):
                          foreach ($data as $row):
                         
                        ?>
                      
                  <tr>
                    <td><?php echo $row['id'];?> <button class="btn btn-link update-id" id="<?php echo $row['id'];?>" data-buy-price="<?php echo $row['buy_price'];?>"  data-sale-price="<?php echo $row['sale_price'];?>"><i class="fa fa-edit"></i></button></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo currency_format($row['buy_price'])." <b>|</b> ".currency_format($row['sale_price']);?></td>
                    <td><?php echo $row['description'];?></td>
                  </tr>
                  
                  <?php
                          endforeach;
                      endif;
                   ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID#</th>
                    <th>Name</th>
                    <th>B.Price | S.Prince</th>
                    <th>Description</th>
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
  
 <?php
 //load creat new model
 include_once __DIR__.'/create_new_model.php';
 
 //load update model
 include_once __DIR__.'/update_model.php';
 ?> 
       
   
        
        
 
  
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
  });   
</script>