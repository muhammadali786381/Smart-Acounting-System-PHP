<!-- send offer model-->
  <div class="modal fade" id="make-offer-model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-coffee"></i> Send Offer</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
                   <form class="user" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label class="text-primary">Demand Amount</label>  
                      <input type="number" step="0.01" name="demand_amount" class="form-control" id="demand_amount" value="<?php echo ($url[0]=="viewproperty")?$data['data']['demand']:"";?>" readonly="" required=""/>
                      <label class="text-primary">Offer Amount</label>  
                      <input type="number" step="0.01" name="offer_amount" class="form-control" id="offer_amount" value="" required=""/>
                    </div>   
                       
                       
                 <input type="hidden" name="id" id="edit_value" value="<?php echo($url[0]=="viewproperty")?$data['data']['id']:"";?>"/>      
                <button  type="submit" name="sendOfferByUser" class="btn btn-primary btn-user btn-block">
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
        $('.make-offer-id').on('click', function(){
         <?php
         if($url[0]!="viewproperty"):
         ?>   
        var id=$(this).attr("id");    
        var demand_amount=$(this).attr("data-demand");
        $('#edit_value').val(id);
        $('#demand_amount').val(demand_amount);
        <?php
         endif;
         ?>  
        $('#make-offer-model').modal('show');
       });
  });
</script>
                               
                               
   