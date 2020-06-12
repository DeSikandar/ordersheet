
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
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?= $p_title ?> List</h3>

            <!-- <a href="product/add"  class="btn btn-primary "><i class="glyphicon glyphicon-plus-sign"></i> Add</a> -->
          <div class="box-tools pull-right">

           

            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>

        </div>
        <div class="row" style="margin-bottom: 20px; margin-top: 5px; display: none;">
            
              <div class="col-md-4">
              <div class="form-group">
                  <!-- <label for="category_id" class="col-sm-2 control-label">Product</label> -->
                  <div class="col-sm-10">
                      <select class="form-control" name="product_id" id="product_id">
                        <option value="">Select product</option>

                         
                      </select>
                    </div>
                </div>
                </div>
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                <div class="form-group">
                  <!-- <label for="category_id" class="col-sm-2 control-label">Product</label> -->
                  <div class="col-sm-10">
                      <button type="button" class="btn btn-info pull-right btn_filter">Filter</button>
                    </div>
                </div>
                </div>
                
          </div>
        <div class="box-body">
          
          <?php echo $content; ?>
        </div>
        <!-- /.box-body -->
        <!-- <div class="box-footer">
          Footer
        </div> -->
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">
    jQuery(document).on('click', '.btn_filter', function () {
           
            var container = jQuery('.xcrud-ajax');
            var data = Xcrud.list_data(container);
            var product_id = jQuery('#product_id').val();
            data.product_id = product_id;
           
            console.log(data);
                jQuery.ajax({
                    url: 'orders/filter_order',
                    type: "post",
                    data: {
                        "xcrud": data
                    },
                    beforeSend: function () {
                        Xcrud.current_task = data.task;
                        Xcrud.show_progress(container);
                    },
                    success: function (response) {
                        jQuery(container).html(response);
                        //jQuery(container).trigger("xcrudafterrequest");
                        jQuery(document).trigger("xcrudafterrequest", [container, data]);
                    },
                    complete: function () {
                        Xcrud.hide_progress(container);
                    }
                });
        });
  </script>
