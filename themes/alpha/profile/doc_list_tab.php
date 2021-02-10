                        <div class="container-fluid">
                              <div class="row">
                               <div class="col-12">
                                 <div class="card">
                                     <div class="card-header">
                                         <h3 class="card-title"><i class="fas fa-building"></i> Attachment</h3>
                                         <button class="btn btn-primary float-right" data-toggle="modal" data-target="#AddNew" ><i class="fa fa-plus"></i> Add New</button>
                                         </div>
                                           <div class="card-body">
                                                 <table id="attachment-list" class="table table-bordered table-striped">
                                           <thead>
                                           <tr>
                                             <th>#</th>
                                             <th>Name</th>
                                             <th>Attachment</th>
                                             <th>Status</th>
                                           </tr>
                                           </thead>
                                           <tbody >
                                             
                                           </tbody>
                                           <tfoot>
                                           <tr>
                                             <th>#</th>
                                             <th>Name</th>
                                             <th>Attachment</th>
                                             <th>Status</th>
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
    $('#attachment-list').DataTable({
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