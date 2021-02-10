  <!-- edit model-->
  <div class="modal fade" id="update-model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Update</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
                   <form class="user" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="id" id="edit_value" value=""/>
                    <label class="text-primary">Buy Price</label>
                    <input type="number" class="form-control"  name="buy_price" id="edit_buy_price" value=""/>
                    <label class="text-primary">Sale Price</label>
                    <input type="number" class="form-control"  name="sale_price" id="edit_sale_price" value=""/>
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
      //get table row data 
        $('.update-id').on('click', function(){
        var buy_price=$(this).attr("data-buy-price");
        var sale_price=$(this).attr("data-sale-price");
        var id=$(this).attr("id"); 
        $('#edit_value').val(id);
        $('#edit_buy_price').val(buy_price);
        $('#edit_sale_price').val(sale_price);
        $('#update-model').modal('show');
       });
  });
 
</script>