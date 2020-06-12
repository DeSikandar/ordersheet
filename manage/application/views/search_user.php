 <?php
if (!isset($product['icon']) || !$product['icon']) {
   // $product['icon'] = NO_ICON;
}

if (!isset($product['banner']) || !$product['banner']) {
   // $product['banner'] = NO_ICON;
}
?>

<style type="text/css">
    .error {
      color: red;
    }
    .image_prd {
      max-width: 200px;
      max-height: 100px;
    }
    .success {
      color: green;
    }
</style>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <?=  $p_title ?>
        <!-- <small>it all starts here</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> <?=  $p_title ?></a></li>
       <!--  <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li> -->
      </ol>
    </section>

    <!-- Main content -->
 <!-- Main content -->
    <section class="content">
      <div class="row">
      
        <!-- right column -->
        <div class="col-md-8 col-md-offset-2">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?=  $p_title ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="frm_product" method="post">
              <input type="hidden" name="product_id" id="product_id" value="<?= (isset($product['product_id'])) ? $product['product_id'] : "" ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="product_name" class="col-sm-2 control-label">Enter Email ID</label>

                  <div class="col-sm-10">
                    <input type="text" name="email" class="form-control" id="email" placeholder="Email ID to Search" required="" >
                  </div>
                </div>

                <div class="user_info hide" >
                  <input type="hidden" name="user_id" id="user_id">
                 <div class="form-group">
                  <label for="product_name" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="text"  class="form-control"  readonly="" id="name">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="product_name" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="text"  class="form-control"  readonly="" id="ret_email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="product_name" class="col-sm-2 control-label">Amount</label>

                  <div class="col-sm-10">
                    <input type="text"  class="form-control"  placeholder="Enter Amount to Rechage" id="amount">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-10 col-md-offset-5">
                    <button type="button" class="btn btn-info  btn_recharge">Click to Recharge</button>
                  </div>
                </div>
                
              

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <!-- <button type="button" class="btn btn-default btn_cancel">Cancel</button> -->
                <button type="button" class="btn btn-info pull-right btn_search">Search</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          <!-- general form elements disabled -->
         
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<!-- For ICON -->

  <script type="text/javascript">
  
    $(document).on('click', '.btn_recharge', function(event) {
        var _t = $(this);
        $('.error').remove();
        $('.success').remove();
        var user_id = $('#user_id').val();
        var amount = $('#amount').val();
        if(!user_id || !amount) {
            $('#amount').after('<span class="error"> Enter amount to proceed. </span>');
        } else {
            _t.attr('disabled', true).text('Proccessing..');
            $.ajax({
              url: 'users/rechargeUserWallet',
              type: 'POST',
              data: {user_id: user_id, amount: amount},
              success: function(resp) {

                _t.attr('disabled', false).text('Click to Recharge');

                if(resp == 'success') {
                  $('#amount').after('<span class="success"> Wallet  recharge successfully. </span>');
                  $('#amount').val('');
                  setTimeout(function(){
                       window.location.reload();
                    }, 500);

                } else if(resp == 'insufficient'){

                  alert('insufficient balance in your Wallet. Contact admin to recharge your wallet.'); return false;

                } else {
                   $('#amount').after('<span class="error"> Oops... Something went wrong. </span>');
                }
              }
            })
        }

        
    });

    $(document).on('click', '.btn_search', function(event) {
     
     var _t = $(this);
     $('.user_info').addClass('hide');
     $('.error').remove();
      var email = $('#email').val();
      _t.attr('disabled', true).text('Searching..');
      $.ajax({
        url: 'users/getUserByEmail',
        type: 'POST',
        data: {email: email},
        success: function(resp) {

          _t.attr('disabled', false).text('Search');

          if(resp) {

            try {
              resp = JSON.parse(resp);
            } catch(e){}
            $('.user_info').removeClass('hide');
              $('#name').val(resp.first_name + ' ' + resp.last_name);
              $('#ret_email').val(resp.email);
              $('#user_id').val(resp.user_id);

          } else {
             $('#email').after('<span class="error"> No user found with entered email. </span>');
          }
        }
      })
      
      
    });


     
  </script>

