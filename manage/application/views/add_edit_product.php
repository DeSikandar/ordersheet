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
                  <label for="product_name" class="col-sm-2 control-label">Product Name</label>

                  <div class="col-sm-10">
                    <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Product Name" value="<?= (isset($product['product_name'])) ? $product['product_name'] : "" ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="product_name_fr" class="col-sm-2 control-label">Product Name (French)</label>

                  <div class="col-sm-10">
                    <input type="text" name="product_name_fr" class="form-control" id="product_name_fr" placeholder="Product Name" value="<?= (isset($product['product_name_fr'])) ? $product['product_name_fr'] : "" ?>">
                  </div>
                </div>
               
               <div class="form-group">
                  <label for="category_id" class="col-sm-2 control-label">Category</label>
                  <div class="col-sm-10">
                      <select class="form-control" name="category_id" id="category_id">
                        <option value="">Select category</option>

                          <?php
                          if($category) {
                            
                            foreach ($category as $key => $value) {
                              $selected = '';
                              if(isset($product['category_id']) && $product['category_id'] == $value['category_id']) {
                                $selected = 'selected';
                              }

                              echo "<option value='".$value['category_id'] ."' ".$selected.">". $value['category']  ."</option>";
                            }
                          }
                          ?>
                      </select>
                    </div>
                </div>
                <div class="form-group" >
                  <label for="sub_category_id" class="col-sm-2 control-label">Sub Category</label>
                  <div class="col-sm-10">
                      <select class="form-control" name="sub_category_id" id="sub_category_id">
                        <option value="">Select sub category</option>

                      </select>
                    </div>
                </div>
                <div class="form-group">
                  <label for="brand_id" class="col-sm-2 control-label">Brand</label>
                  <div class="col-sm-10">
                      <select class="form-control" name="brand_id" id="brand_id">
                        <option value="">Select brand</option>

                          <?php
                          if($brand) {
                            foreach ($brand as $key => $value) {
                              $selected = '';
                              if(isset($product['brand_id']) && $product['brand_id'] == $value['brand_id']) {
                                $selected = 'selected';
                              }
                              echo "<option value='".$value['brand_id'] ."' ".$selected.">". $value['brand']  ."</option>";
                            }
                          }
                          ?>
                      </select>
                    </div>
                </div>
                 <div class="form-group">
                  <label for="price" class="col-sm-2 control-label">Product Price</label>

                  <div class="col-sm-10">
                    <input type="text" name="price" class="form-control" id="price" placeholder="Product Price" value="<?= (isset($product['price'])) ? $product['price'] : "" ?>">
                  </div>
                </div>
                  <div class="form-group">
                  <label for="stock" class="col-sm-2 control-label">Product Stock</label>

                  <div class="col-sm-10">
                    <input type="text" name="stock" class="form-control" id="stock" placeholder="Product Stock Ex.5" value="<?= (isset($product['stock'])) ? $product['stock'] : "" ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="stock" class="col-sm-2 control-label">Cashback Percentage</label>

                  <div class="col-sm-10">
                    <input type="text" name="cashback_percentage" class="form-control" id="cashback_percentage" placeholder="Cashback Percentage " value="<?= (isset($product['cashback_percentage']) && $product['cashback_percentage']) ? $product['cashback_percentage'] : "" ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="shipping_charge" class="col-sm-2 control-label">Shipping Charge</label>

                  <div class="col-sm-10">
                    <input type="text" name="shipping_charge" class="form-control" id="shipping_charge" placeholder="Shipping Charge" value="<?= (isset($product['shipping_charge'])) ? $product['shipping_charge'] : "" ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="delivery_days" class="col-sm-2 control-label">Estimate Delivery Days</label>

                  <div class="col-sm-10">
                    <input type="text" name="delivery_days" class="form-control" id="delivery_days" placeholder="Estimate Delivery Days. Default 7 Days" value="<?= (isset($product['delivery_days'])) ? $product['delivery_days'] : "" ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="description" class="col-sm-2 control-label">Description</label>

                  <div class="col-sm-10">
                    <textarea name="description" class="form-control" id="description" placeholder="Description"><?= (isset($product['description'])) ? $product['description'] : "" ?></textarea>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="description_fr" class="col-sm-2 control-label">Description (French)</label>

                  <div class="col-sm-10">
                    <textarea name="description_fr" class="form-control" id="description_fr" placeholder="Description"><?= (isset($product['description_fr'])) ? $product['description_fr'] : "" ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="specification" class="col-sm-2 control-label">Specification</label>

                  <div class="col-sm-10">
                    <textarea name="specification" class="form-control" id="specification" placeholder="Specification"><?= (isset($product['specification'])) ? $product['specification'] : "" ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="specification_fr" class="col-sm-2 control-label">Specification (French)</label>

                  <div class="col-sm-10">
                    <textarea name="specification_fr" class="form-control" id="specification_fr" placeholder="Specification"><?= (isset($product['specification_fr'])) ? $product['specification_fr'] : "" ?></textarea>
                  </div>
                </div>

                
                <div class="form-group" >
                  <label for="price" class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-10">
                      <select class="form-control" name="status" id="status">
                        <option value="1" <?= (isset($product['status']) && $product['status'] == 1)  ? 'selected' : "" ?> >Active</option>
                        <option value="0" <?= (isset($product['status']) && $product['status'] == 0)  ? 'selected' : "" ?> >Inactive</option>
                      </select>
                    </div>
                </div>

                
                <div class="form-group">
                  <div class="col-sm-4 col-md-offset-2">
                  <label for="exampleInputFile">Image 1</label>
                  <?php if(isset($product['image1'])){ ?>
                    <br>
                    <a href="./../upload/<?= $product['image1'] ?>" target="_blank">
                    <img src="./../upload/<?= $product['image1'] ?>" alt="" height="50px" weight="70px" class="image_prd">
                    </a>
                    <br><br>
                  <?php } ?>
                  <input type="file" id="image1" name="image1" >

                  <p class="help-block">Select image 1.</p>
                  </div>
                  <div class="col-sm-4">
                  <label for="exampleInputFile">Image 2</label>
                  <?php if(isset($product['image2'])){ ?>
                    <br>
                    <a href="./../upload/<?= $product['image2'] ?>" target="_blank">
                    <img src="./../upload/<?= $product['image2'] ?>" alt="" height="50px" weight="70px" class="image_prd">
                    </a>
                    <br><br>
                  <?php } ?>
                  <input type="file" id="image2" name="image2">

                  <p class="help-block">Select image 2.</p>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-4 col-md-offset-2">
                  <label for="exampleInputFile">Image 3</label>
                  <?php if(isset($product['image3'])){ ?>
                    <br>
                    <a href="./../upload/<?= $product['image3'] ?>" target="_blank">
                    <img src="./../upload/<?= $product['image3'] ?>" alt="" height="50px" weight="70px" class="image_prd">
                    </a>
                    <br><br>
                  <?php } ?>
                  <input type="file" id="image3" name="image3">

                  <p class="help-block">Select image 3.</p>
                  </div>
                  <div class="col-sm-4">
                  <label for="exampleInputFile">Image 4</label>
                  <?php if(isset($product['image4'])){ ?>
                    <br>
                    <a href="./../upload/<?= $product['image4'] ?>" target="_blank">
                    <img src="./../upload/<?= $product['image4'] ?>" alt="" height="50px" weight="70px" class="image_prd">
                    </a>
                    <br><br>
                  <?php } ?>
                  <input type="file" id="image4" name="image4">

                  <p class="help-block">Select image 4.</p>
                  </div>
                </div>
                


              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-default btn_cancel">Cancel</button>
                <button type="button" class="btn btn-info pull-right btn_save">Save</button>
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
<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>

  <script type="text/javascript">
    var product_id = "<?= (isset($product['product_id'])) ? $product['product_id'] : "" ?>";
    var sub_category_id = "<?= (isset($product['sub_category_id'])) ? $product['sub_category_id'] : "" ?>";
    jQuery(document).ready(function($) {
      if(product_id) {
          $('#category_id').trigger('change');

      }
    });

     function CKupdate(){
        for ( instance in CKEDITOR.instances )
            CKEDITOR.instances[instance].updateElement();
    }

    jQuery(document).ready(function($) {
      CKEDITOR.editorConfig = function (config) {
          config.language = 'es';
          config.uiColor = '#F7B42C';
          config.height = 300;
          config.toolbarCanCollapse = true;

      };

      CKEDITOR.replace('description');
      CKEDITOR.replace('description_fr');
      CKEDITOR.replace('specification');
      CKEDITOR.replace('specification_fr');
    });

    $(document).on('change', '#category_id', function(event) {
     
      var category_id = $(this).val();

      $.ajax({
        url: 'product/getSubcategory',
        type: 'POST',
        data: {category_id: category_id},
        success: function(resp) {
            $('#sub_category_id').html(resp);

            if(product_id && sub_category_id){
                $('#sub_category_id').val(sub_category_id);
            }
        }
      })
      
      
    });


      $(document).on('click', '#icon_img', function(event) {
        event.preventDefault();
        $('#icon').trigger('click');
    });

    var _URL = window.URL || window.webkitURL;
    var file, img;
    $("#icon").change(function (e) {
        
        $('#icon').siblings('.error').remove();

        if ((file = this.files[0])) {
            //console.log('file', file);
            img = new Image();
            img.onload = function () {
                //alert(this.width + " " + this.height);
                checkImageDImension_icon(this.width, this.height, file);
            };
            img.src = _URL.createObjectURL(file);
           
        }
    });

    function checkImageDImension_icon(i_width, i_height) {

        $('#icon_img').attr({src: _URL.createObjectURL(file)});

        // if(i_width && i_height && i_width == 640 && i_height == 480) {
        //     uploadFile(file);
        //    $('#icon_img').attr({src: _URL.createObjectURL(file)});  
        // } else {
        //     $('#icon_img').after('<label class="error">Please select image in Ratio : (640 * 480)</label>');
        // }
    }
  </script>

  <!-- For Banner -->
  <script type="text/javascript">
      $(document).on('click', '#banner_img', function(event) {
        event.preventDefault();
        $('#banner').trigger('click');
    });

    var _URL = window.URL || window.webkitURL;
    var file, img;
    $("#banner").change(function (e) {
        
        $('#banner').siblings('.error').remove();

        if ((file = this.files[0])) {
            //console.log('file', file);
            img = new Image();
            img.onload = function () {
                //alert(this.width + " " + this.height);
                checkImageDImension_banner(this.width, this.height, file);
            };
            img.src = _URL.createObjectURL(file);
           
        }
    });

    function checkImageDImension_banner(i_width, i_height) {

        $('#banner_img').attr({src: _URL.createObjectURL(file)});

        // if(i_width && i_height && i_width == 640 && i_height == 480) {
        //     uploadFile(file);
        //    $('#icon_img').attr({src: _URL.createObjectURL(file)});  
        // } else {
        //     $('#icon_img').after('<label class="error">Please select image in Ratio : (640 * 480)</label>');
        // }
    }
  </script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<script type="text/javascript">
  jQuery(document).ready(function($) {
        $('#frm_product').validate({
                 ignore: [],  
                 debug: false,
                //errorElement: 'div',
                //errorClass: "invalid-feedback",
                rules: {
                    product_name: {
                        minlength: 3,
                        required: true,
                    },
                    category_id: {
                        required: true,
                    },
                    sub_category_id: {
                        required: true,
                    },
                    brand_id: {
                        required: true,
                    },
                    price: {
                        required: true,
                        number: true
                    },
                    stock: {
                        required: true,
                        number: true
                    },
                    cashback_percentage: {
                        //required: true,
                        number: true,
                        min: 1,
                        max: 99
                    },
                    shipping_charge: {
                       // required: true,
                        number: true
                    },
                    delivery_days: {
                       required: true,
                        number: true,
                        min: 1
                    },
                    description: {
                        required: function() 
                        {
                         CKEDITOR.instances.description.updateElement();
                        },
                        minlength: 10
                    },
                    description_fr: {
                        required: function() 
                        {
                         CKEDITOR.instances.description_fr.updateElement();
                        },
                        minlength: 10
                    },
                    specification: {
                        required: function() 
                        {
                         CKEDITOR.instances.specification.updateElement();
                        },
                        minlength: 10
                    },
                    specification_fr: {
                        required: function() 
                        {
                         CKEDITOR.instances.specification_fr.updateElement();
                        },
                        minlength: 10
                    },
                    image1: {
                      required: function(element){
                          return $("#product_id").val()=="";
                      },
                      extension: "gif|jpg|png|bmp|jpeg"
                    },
                    image2: {
                       required: function(element){
                          return $("#product_id").val()=="";
                      },
                      extension: "gif|jpg|png|bmp|jpeg"
                    },
                    image3: {
                        required: function(element){
                          return $("#product_id").val()=="";
                        },
                       extension: "gif|jpg|png|bmp|jpeg"
                    },
                    image4: {
                        required: function(element){
                          return $("#product_id").val()=="";
                        },
                       extension: "gif|jpg|png|bmp|jpeg"
                    }
                   
                   
                },
                messages: {
                    
                },
               
                submitHandler: function (form) {
                   // return true;
                }
                
            });



            $(document).on('click', '.btn_save', function() {
              var _t = $(this);
              CKupdate();
            //  var data = new FormData($("#frm_product"));
              var form = $('form')[0]; // You need to use standard javascript object here
              var formData = new FormData(form);
              console.log(formData);
                if($("#frm_product").valid()) {

                    CKEDITOR.instances.description.updateElement();

                    _t.prop('disabled', true).text('Processing...');
                      $.ajax({
                               url:'product/save_product',
                               type: 'POST',
                               processData: false,
                               contentType: false,
                              data: formData,
                                success: function (data, status, jqxhr) {
                                    console.log(data);
                                    _t.prop('disabled', false).text('Save');
                                    if(status == 'success') {
                                        location.replace('product/');
                                    } else {
                                        alert('Cannot save product.');
                                    }
                                },
                                error: function (jqxhr, status, msg) {
                                    //error code
                                }
                            });
                }
            });


            $(document).on('click', '.btn_cancel', function(event) {
                location.replace('product');
            });

  });
</script>
