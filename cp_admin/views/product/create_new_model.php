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
                    <label class="text-primary">Purchase Price</label>
                    <input type="number" step="0.01"  class="form-control"  name="buy_price" required="" value="" >
                   </div>
                     
                   <div class="form-group">
                    <label class="text-primary">Sale Price </label>
                    <input type="number" step="0.01"  class="form-control"  name="sale_price" required="" value="" >
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
        