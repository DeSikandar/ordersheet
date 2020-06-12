
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $p_title ?>
        <small>Manage <?= $p_title ?></small>
      </h1>
      <ol class="breadcrumb">
        <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li> -->
        <!-- <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-sellsy"></i> ORDER ID : <?= $order['order_id'] ?>  (<?= ucfirst($order['status']) ?>)
            <small class="pull-right">Date: <?= $order['created_at'] ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <i class="fa fa-user"></i> User Details<br><br>
          <address>
            <strong><?= $user['first_name'] .' '.$user['last_name'] ?></strong><br>
            Phone:  <?= $user['phone']  ?><br>
            Email: <?= $user['email']  ?><br><br>

            

            
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <i class="fa fa-map-marker"></i> <?= ($order['delivery_type'] == 'pickup') ? 'Pickup Location' : 'Shipping Address' ?>  <br><br>
          <address>
           <strong><?= $order['address_type']  ?></strong><br>
            <?= $order['area_street']  ?>, <?= $order['building_name']  ?> - <?= $order['pincode']  ?><br>
            <?= $order['city']  ?> -  <?= $order['state']  ?><br>
            <?= $order['landmark']  ?><br>
          </address>
        </div>
        <!-- /.col -->
        <!-- <div class="col-sm-4 invoice-col">
          <b>Invoice #007612</b><br>
          <br>
          <b>Order ID:</b> 4F3S8J<br>
          <b>Payment Due:</b> 2/22/2014<br>
          <b>Account:</b> 968-34567
        </div> -->
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              
              <th>Product</th>
              <th>Qty</th>
              <th>Price</th>
              <th>Subtotal</th>
            </tr>
            </thead>

            <tbody>
              <?php if($order_detail) {

                $sub_total = 0;

                foreach ($order_detail as $key => $value) {
                  
                //print_r($value);
                  $sub_total += ($value['price'] * $value['qty']);
               ?>

                <tr>
                  
                  <td> <?= $value['product_name'] ?></td>
                  <td> <?= $value['qty'] ?> </td>
                  <td> $ <?= $value['price'] ?> </td>
                  <td> $ <?= $value['price'] * $value['qty'] ?>  </td>
                </tr>

              <?php } } ?>
            
            </tbody>

          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <!-- <p class="lead">Payment Methods:</p>
          <img src="../../dist/img/credit/visa.png" alt="Visa">
          <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="../../dist/img/credit/american-express.png" alt="American Express">
          <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
          </p> -->
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Summary</p>

          <div class="table-responsive">
            <table class="table">
              <tbody><tr>
                <th style="width:50%">Subtotal:</th>
                <td>$ <?= (isset($sub_total) && $sub_total) ? $sub_total : '' ?></td>
              </tr>
              <!-- <tr>
                <th>Tax (9.3%)</th>
                <td>$10.34</td>
              </tr>
               -->
              <tr>
                <th>Shipping:</th>
                <td>$ <?= $order['shipping_charge'] ?></td>
              </tr>

              <tr>
                <th>Total:</th>
                <td>$ <?= $order['total'] + $order['shipping_charge'] ?></td>
              </tr>
            </tbody></table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <?php

          $disabled_dispached = '';
          $disabled_delivered = '';

          if($order['status']=='dispatched' || $order['status']=='delivered') {
              $disabled_dispached = 'disabled';
          }
          if($order['status']=='delivered') {
              $disabled_delivered = 'disabled';
          }

          //echo 'disabled_delivered '. $disabled_delivered;
         // echo 'disabled_dispached '. $disabled_dispached;
          

          ?>
          <!-- <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a> -->
          <button type="button" class="btn btn-success pull-right" disabled=""  data-id="<?= $order['order_id'] ?>" data-type="delivered"  style="margin-right: 5px;"><i class="fa  fa-battery-full"></i>   Order Delivered 
          </button>
          <button type="button" class="btn btn-primary pull-right" disabled=""  data-id="<?= $order['order_id'] ?>" data-type="dispatched" style="margin-right: 5px;">
            <i class="fa fa-battery-half"></i> Order Dispached for Delivery
          </button>
          <button type="button" class="btn btn-info pull-right" data-id="<?= $order['order_id'] ?>" disabled="" style="margin-right: 5px;"><i class="fa fa-battery-empty"></i> Order Placed
          </button>
         
          

           
        </div>
      </div>
    </section>
    <!-- /.content -->

    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">
    
     $(document).on("click", ".pull-right", function () {
          
          var _t = $(this);
          _t.attr('disabled',true);
          var order_id = _t.data('id');
          var status = _t.data('type');

          $.ajax({
               // url: 'orders/change_status',
                type: 'POST',
                data: {order_id: order_id, status: status},
                success: function(resp) {
                  _t.attr('disabled',false);
                    if(resp && resp == 'success') {
                      location.reload();
                    }
                }
            }) 
      })

  </script>
