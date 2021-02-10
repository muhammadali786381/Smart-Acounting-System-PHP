<!-- send offer model-->
  <div class="modal fade" id="update-model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Update Status</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
                   <form class="user" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label class="text-primary">Status</label>
                      <select  name="property_post_status_id" class="form-control add_status" id="edit_status" value="">
                          
                      </select>    
                    </div>   
                       
                       
                 <input type="hidden" name="id" id="edit_value" value=""/>      
                <button  type="submit" name="updatePropertyStatusByUser" class="btn btn-primary btn-user btn-block">
                <i class="fas fa-check-circle"> </i>  Send
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
      //get table row data 
        $('.table tbody').on('click', '.update-id', function(){
        var status=$(this).attr("id"); 
        var id=$(this).attr("data-id"); 
        var data_property_id=$(this).attr("data-for-property"); 
        $('#edit_value').val(id);
        $('#edit_status').val(status);
        if(data_property_id==="1"){
           $('.add_status').html("<?php echo $view->selectPropertyPostStatus(1);?>");
        }else{
           $('.add_status').html("<?php echo $view->selectPropertyPostStatus(2);?>");  
        }
        $('#update-model').modal('show');
       });
  });
 
</script>
                               
                               
   