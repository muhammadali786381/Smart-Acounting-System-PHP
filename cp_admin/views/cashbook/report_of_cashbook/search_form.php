        <div class="card <?php echo $view->app_config("APP_TABLE_HEAD_COLOR_CLASS");?>">
              <div class="card-header">
               <h3 class="card-title">Criteria</h3>
                
              </div>
             <!-- /.card-header -->
              <div class="card-body">
                <form action="" method="POST">
                <div class="row">
                <div class="col-12 col-sm-6 col-md-4">
                    <label>From</label>
                    <input type="date" name="from_date" value="<?php (isset($_POST['from_date'])?$_POST['from_date']:"")?>" class="form-control" required=""/>
                </div>
                  <!-- /.col -->
                  
                 <div class="col-12 col-sm-6 col-md-4">
                    <label>To</label>
                    <input type="date" name="to_date" value="<?php (isset($_POST['to_date'])?$_POST['to_date']:"")?>" class="form-control" required=""/>
                </div>
                  <!-- /.col --> 
                  
<!--                <div class="col-12 col-sm-6 col-md-3">
                    <label>Party</label>
                    <select class="form-control select2" name="party_id" required="">
                        <option value="">Select Party</option>
                        <?php
                        //get cash party
                        $view->selectActiveHead(1);
                        //get bank party
                        $view->selectActiveHead(2);
                        ?>
                    </select>
                </div>-->
                  <!-- /.col --> 
                
                <div class="col-12 col-sm-6 col-md-4">
                    <label>Action</label><br>
                    <input type="submit" name="reportOfCashbook" value="Submit" class="btn btn-primary"/>
                </div>  
                  
             

               <!--fix for small devices only -->
                  <div class="clearfix hidden-md-up"></div>

                </div>
           <!--/.row -->
           </form>
          <!--/.row -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
