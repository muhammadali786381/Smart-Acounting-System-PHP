                        <div class="container-fluid">
                              <div class="row">
                               <div class="col-12">
                                 <div class="card">
                                     <div class="card-header">
                                         <h3 class="card-title"><i class="fas fa-history"></i> Logs</h3>
                                         </div>
                                           <div class="card-body">
                                                 <table id="logs-list" class="table table-bordered table-striped">
                                           <thead>
                                           <tr>
                                             <th>#</th>
                                             <th>Time Date</th>
                                             <th>Activity</th>
                                             <th>Object ID</th>
                                           </tr>
                                           </thead>
                                           <tbody >
                                             <?php
                                               if($logs!="NO_DATA"):
                                                   $i=1;
                                                   foreach ($logs as $log):
                                                   if($log['user_id']==$id):
                                                   ?>
                                          <tr>
                                             <td><?php echo $i;?></td>
                                             <td><?php echo db_date_time_output($log['create_on']);?></td>
                                             <td><?php echo $log['logs'];?></td>
                                             <td><?php echo $log['log_item'];?></td>
                                           </tr>

                                           <?php
                                                       endif;
                                                       $i++;
                                                   endforeach;
                                               endif;
                                            ?>
                                           </tbody>
                                           <tfoot>
                                           <tr>
                                            <th>#</th>
                                            <th>Time</th>
                                            <th>Activity</th>
                                            <th>Object ID</th>
                                           </tr>
                                         </tfoot>
                                         </table>
                                         
                                       </div>
                                        <!--end card body -->
                                     </div>
                                   <!--end card -->
                                  </div>
                                  <!--end col-12 -->
                                 </div>
                                <!--end row -->
                                </div>
                               <!--end container-fluid --> 
                               
                               
                               
                               
 <script>
  $(document).ready(function () {
    $('#logs-list').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "order": [[ 0, "asc" ]]
    }); 
});  
    
 </script>   