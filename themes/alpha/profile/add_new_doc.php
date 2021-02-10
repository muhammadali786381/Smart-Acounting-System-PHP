<div class="modal fade" id="AddNew">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header alert-success">
                <h4 class="modal-title">Add Document <b>[Account ID: <?php echo $data['user_id'];?>]</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="user_id" value="<?php echo $data['user_id'];?>" required="">
                    
                       <div class="form-group">
                       <div class="row">
                        <div class="col-md-12">
                           <label>Select Type</label>
                           <select class="form-control select2" name="user_doc_type_id"  required="">
                               <option value="">Select Type</option>
                               <?php
                               echo $view->selectUserDocType();
                               ?>
                            <select>
                        </div>  
                           
                         <br> 
                         
                        <div class="col-md-12">
                           <label>Select File (Allow:  .doc | .docx |  .pdf | .png | .jpg | jpeg)</label>
                           <input type="file" class="form-control" name="file" value="" required="">
                        </div>
                        </div>
                      </div>
                    
                    <button type="submit" class="btn btn-danger pull-right" name="addNewDocumentByUser" ><i class="fa fa-save"></i> Save</button>   
                </form>
               </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
