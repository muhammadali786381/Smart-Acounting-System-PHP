<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Purchase Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>dashboard">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $id; ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
   </section>
    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- print area -->
            <div class="print_invoice" id="print_invoice">  
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                      <img src="<?php echo BASE_URL."uploads/site/".$invoice_company['image_link']?>" width="80px" height="80px"> <?php echo $invoice_company['name'];?>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  <b>Company Detail</b>
                  <address>
                    Adress: <?php echo $invoice_company['address'];?><br>
                    Phone: <?php echo $invoice_company['phone'];?><br>
                    Email: <?php echo $invoice_company['email'];?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Supplier Detail</b>
                  <address>
                    Company Name: <?php echo $invoice_head['company_name'];?><br>
                    Phone: <?php echo $invoice_head['cell_1'];?><br>
                    Address: <?php echo $invoice_head['address'];?><br>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                   <h4 style="color:green;"><b>INVOICE DETAIL</b></h4>
                  <b>Invoice #:</b> <?php echo $invoice_data['prefix_id'].$invoice_data['id'];?><br>
                  <b>Date:</b> <?php echo db_date_output($invoice_data['date']);?><br>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Sr. No.</th>
                      <th>Product</th>
                      <th>Qty</th>
                      <th>Price</th>
                      <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                     <?php
                      if($invoice_detail!="NO_DATA"):
                          $i=1;
                          foreach ($invoice_detail as $row):
                          //get product detail
                        $product_data=$main->getSingleRecord("products","id",$row['product_id']);
                      ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $product_data['name']; ?></td>
                      <td><?php echo $row['qty']; ?></td>
                      <td><?php echo number_format($row['buy_price'],2); ?></td>
                      <td><?php echo number_format($row['buy_price']*$row['qty'],2); ?></td>
                    </tr>
                   <?php
                     $i++;
                    endforeach;
                      endif;
                      ?> 
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Note:</p>
                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                   <?php echo $invoice_data['note'];?>
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                 <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td><?php echo number_format($invoice_data['buy_total'],2);?></td>
                      </tr>
                      <tr>
                        <th>Last Balance:</th>
                        <td><?php echo ($last_balance<0 )?number_format(abs($last_balance)-$invoice_data['buy_total'],2):number_format($last_balance-$invoice_data['buy_total'],2);?></td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td><?php echo ($last_balance<0 )? number_format(abs($last_balance),2)." DR":number_format(abs($last_balance),2)." CR";?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
                
              </div>
              <!-- /.row -->
             </div>
                 <!-- /.print area -->
              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a type="button" onclick="PrintNow('.print_invoice')" class="btn btn-default" ><i class="fas fa-print"></i> Print</a>
<!--                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>-->
                  
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->  

