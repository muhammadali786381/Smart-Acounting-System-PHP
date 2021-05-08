        <div class="card <?php echo $view->app_config("APP_TABLE_HEAD_COLOR_CLASS");?>">
              <div class="card-header">
               <h3 class="card-title">Criteria</h3>
              </div>
             <!-- /.card-header -->
              <div class="card-body">
                <form action="" method="POST">
                <div class="row">
                <div class="col-12 col-sm-6 col-md-6">
                    <label>Route</label>
                    <select class="form-control select2" name="route_id" required="">
                        <option value="">Select Route</option>
                        <?php
                        echo $view->selectHeadRoute();
                        ?>
                    </select>
                </div>
                  <!-- /.col --> 
                <div class="col-12 col-sm-6 col-md-6">
                    <label>Action</label><br>
                    <input type="submit" name="partyRouteLedgerQuery" value="Submit" class="btn btn-primary"/>
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
