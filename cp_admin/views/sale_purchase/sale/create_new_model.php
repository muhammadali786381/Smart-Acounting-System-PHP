        <!-- create new coupon model-->
  <div class="modal fade" id="AddNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header <?php echo $view->app_config("APP_MODEL_HEAD_COLOR_CLASS");?>">
            <h5 class="modal-title" id=""><i class="fas fa-file-invoice"></i> Create New</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
             <div class="modal-body">
                 <form class="" method="POST" enctype="multipart/form-data">
                   <div class="form-group row">
                    <div class="col-sm-4">
                    <label class="text-primary"><i class="fa fa-calendar"></i> Invoice Date</label>
                    <input type="date" name="inv_date" class="form-control" required="">
                    </div>
                       
                    <div class="col-sm-8">
                    <label class="text-primary"><i class="fa fa-user-secret"></i> Party</label>
                    <select class="form-control select2" name="head_id" required="">
                        <option value="">Select Party</option>
                        <?php
                        echo $view->selectActiveHead(3);
                        ?>
                    </select>
                    </div>   
                   </div>
                   <div class="form-group">
                       <table id="inv_tbl" class="table table-responsive-sm table-striped">
                           <thead >
                               <th width="40%">Product</th>
                               <th>Qty</th>
                               <th>Price</th>
                               <th style="display: none;">Sub Total</th>
                               <th style="display: none;">VAT%</th>
                               <th style="display: none;">VAT Amount</th>
                               <th>Total</th>
                               <th>Action</th>
                           </thead>
                         <tfoot>
                            <tr class="text-center">
                                <td colspan="8"><button type="button" class="btn btn-success add-more-fac" ><b><i class="fa fa-plus-square"></i> Add More</b></button></td>
                           </tr>
                        </tfoot>
                          <tbody>
                           <!--coming from ajax-->
                          </tbody>
                       </table>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-4" style="display: none;">
                    <label class="text-primary"><i class="fa fa-money"></i> Sub Total</label>
                    <input type="number" name="inv_subtotal" readonly="" value="0.00" class="form-control inv_sub_total">
                    </div>
                    <div class="col-sm-4" style="display: none;">
                    <label class="text-primary"><i class="fas fa-percent"></i> VAT Total</label>
                    <input type="number" name="inv_vat_total" readonly="" value="0.00" class="form-control inv_vat_total">
                    </div>
                    <div class="col-sm-4" style="display: none;">
                    <label class="text-primary"><i class="fas fa-file-invoice "></i> Total</label>
                    <input type="number" name="inv_total" readonly="" value="0.00" class="form-control inv_total">
                    </div> 
                      
                    <div class="col-sm-12 text-center">
                    <label class="text-primary"><i class="fas fa-file-invoice "></i> Total</label>
                    <h1><span id="text-total">0.00</span></h1>
                    </div>  
                      
                 </div> 
                 
                 <hr/>
                 <div class="form-group row">
                    <div class="col-sm-12">
                    <label class="text-primary"><i class="fas fa-clipboard"></i> Note</label>
                    <textarea name="note" class="form-control" required=""></textarea>
                    </div>   
                 </div> 
                     
               <button  type="submit" name="createNewSaleVoucher" class="btn btn-primary btn-user btn-block">
                    <i class="far fa-paper-plane"></i>  Generate
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
      
    //add new row
        add_inv_row();
    $(document).on('click', '.add-more-fac', function(){
        add_inv_row();
     });
     //function to add new row
    function add_inv_row(){
         var html = '';
         html +='<tr>';
         html +='<td>';
         html +='<select id="product_id" name="product_id[]"  required="" class="form-control select2">';
         html +='<option value="">Select Product</option>';
         html +='<?php echo $view->selectProdcutWithSalePrice();?>';
         html +='</select>';
         html +='</td>';
         html +='<td>';
         html +='<input type="number" class="form-control calculate" name="qty[]" value="1" required="">';
         html +='</td>';
         html +='<td>';
         html +='<input type="text" class="form-control calculate" name="price[]" value="0.00" required="">';
         html +='</td>';
         html +='<td style="display: none;">';
         html +='<input type="text" class="form-control row-subtotal" name="subtotal[]" readonly="" required="">';
         html +='</td>';
         html +='<td style="display: none;">';
         html +='<input type="text" class="form-control calculate" name="vat_percent[]" value="0" required="">';
         html +='</td>';
         html +='<td style="display: none;">';
         html +='<input type="text" class="form-control row-vat-amt" name="vat_amount[]" readonly="" required="">';
         html +='</td>';
         html +='<td>';
         html +='<input type="text" class="form-control row-total" name="total[]" readonly="" value="0.00" required="">';
         html +='</td>';
         html +='<td class="text-center">';
         html +='<button type="button" class="btn btn-danger remove-inv-row" ><i class="far fa-times-circle"></i></button>';
         html +='</td>';
         html +='</tr>';
         $('#inv_tbl').append(html);
         //select2 active class
        $('.select2').select2({
            theme: "bootstrap4",
            width: '100%'
        });
         
    }
     
     //remove amount row
     $(document).on('click', '.remove-inv-row', function(){
      $(this).closest('tr').remove();
      calculateTotal();
        });  
        
     $('#inv_tbl').on('input', '.calculate', function () {
	    updateTotals(this);
	    //calculateTotal();
            calculateTotal();
	});   
        
     function updateTotals(elem){
           //get data
        var tr=$(elem).closest('tr'),
            quantity=$('[name="qty[]"]', tr).val(),
	    price=$('[name="price[]"]', tr).val(),
            vat_per=$('[name="vat_percent[]"]', tr).val();
            //calculate
            var subtotal = parseInt(quantity) * parseFloat(price);
            var row_vat_amt=(parseFloat(vat_per*subtotal)/100);
            var row_total=parseFloat(subtotal+row_vat_amt);
            //set view
            $('.row-subtotal',tr).val(subtotal.toFixed(2));
	    $('.row-vat-amt',tr).val(row_vat_amt.toFixed(2));
            $('.row-total',tr).val(row_total.toFixed(2));
            
	}


        
	function calculateTotal(){
	    var inv_subtotal= 0,
	    	inv_vat_total = 0,
	    	inv_total= 0;

	    $('#inv_tbl tbody tr').each(function() {
           var r_inv_subtotal=$('.row-subtotal', this).val(),
               r_inv_vat_total=$('.row-vat-amt', this).val(),
               r_inv_total=parseFloat(inv_subtotal)+parseFloat(inv_vat_total);
               
               inv_subtotal+=parseFloat(r_inv_subtotal+r_inv_vat_total);
               inv_vat_total+=parseFloat(r_inv_vat_total);
               inv_total=parseFloat(inv_subtotal+inv_vat_total);
            });


	
	$('.inv_sub_total').val(inv_subtotal.toFixed(1));
        $('.inv_vat_total').val(inv_vat_total.toFixed(2));
        $('.inv_total').val(inv_total.toFixed(2));
         $('#text-total').html(inv_total.toFixed(2));

        }
        
         //get Party name
          $('.agent_id').change(function(){
              var ajaxIdAgentCommissionPercent = $(this).children("option:selected").val();
            //alert(ajaxIdAgentCommissionPercent);
               $.ajax({
                      url : '<?php echo BASE_URL;?>ajax.php',
                      method : "POST",
                      data  : {ajaxIdAgentCommissionPercent},
                      success : function(data){
                          //alert(data);
                          $(".commission_id").html('<option value="">Select Commission %</option>' + data);
                      }
                      });

              });

   
   
  });
 
</script>  