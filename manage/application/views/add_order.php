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
    .selected_img {
      cursor: pointer;
    }
    img{border:solid 1px red; margin:10px;}
    .selected{
        box-shadow:0px 12px 22px 10px #3beb79;
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
              
              <div class="box-body">
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="name" value="<?php if(isset($user)){echo $user[0]['first_name'];} ?>">
                  </div>
                </div>
              
               
               <div class="form-group">
                  <label for="city_id" class="col-sm-2 control-label">City</label>
                  <div class="col-sm-10">
                      <select class="form-control" name="city_id" id="city_id">
                        <!-- <option value="">Select city</option> -->

                          <?php
                          if($city) {
                            
                            foreach ($city as $key => $value) {
                              $selected = '';
                              if($user[0]['city_id']==$value['city_id']){
                                  $selected="selected";
                              }

                              echo "<option value='".$value['city_id'] ."' ".$selected.">". $value['city']  ."</option>";
                            }
                          }
                          ?>
                      </select>
                    </div>
                </div>
               
                <div class="form-group">
                  <label for="blank_id" class="col-sm-2 control-label">Blank</label>
                  <div class="col-sm-10">
                      <select class="form-control" name="blank_id" id="blank_id">
                       <!--  <option value="">Select blank</option> -->

                          <?php
                          if($blank) {
                            foreach ($blank as $key => $value) {
                              $selected = '';
                             
                              echo "<option data-image1='".$value['image1']."' data-image2='".$value['image2']."' data-image3='".$value['image3']."' data-image4='".$value['image4']."' data-image5='".$value['image5']."' value='".$value['blank_id'] ."' ".$selected.">". $value['title']  ."</option>";
                            }
                          }
                          ?>
                      </select>
                    </div>
                </div>
                 <div class="form-group imgs_div">
                  <div class="col-sm-10 col-md-offset-2 replace_imgs">
                    <?php if($blank[0]['image1']){ ?>
                      <div class="col-md-2">
                        <img src="../upload/<?= $blank[0]['image1'] ?>" data-v="<?= $blank[0]['image1'] ?>" class="selected_img" data-im="image1" width="100px;" alt="">
                      </div>
                    <?php } ?>
                    
                    <?php if($blank[0]['image2']){ ?>
                      <div class="col-md-2">
                        <img src="../upload/<?= $blank[0]['image2'] ?>"  data-v="<?= $blank[0]['image2'] ?>" class="selected_img" data-im="image2" width="100px;" alt="">
                      </div>
                    <?php } ?>

                    <?php if($blank[0]['image3']){ ?>
                      <div class="col-md-2">
                        <img src="../upload/<?= $blank[0]['image3'] ?>" data-v="<?= $blank[0]['image3'] ?>"  class="selected_img" data-im="image3" width="100px;" alt="">
                      </div>
                    <?php } ?>

                    <?php if($blank[0]['image4']){ ?>
                      <div class="col-md-2">
                        <img src="../upload/<?= $blank[0]['image4'] ?>" data-v="<?= $blank[0]['image4'] ?>"  class="selected_img" data-im="image4" width="100px;" alt="">
                      </div>
                    <?php } ?>

                    <?php if($blank[0]['image5']){ ?>
                      <div class="col-md-2">
                        <img src="../upload/<?= $blank[0]['image5'] ?>" data-v="<?= $blank[0]['image5'] ?>"  class="selected_img" data-im="image5" width="100px;" alt="">
                      </div>
                    <?php } ?>

                  </div>

                 </div>

                 <div class="form-group">
                  <label for="bottom" class="col-sm-2 control-label">Bottom</label>

                  <div class="col-sm-10">
                      <select class="form-control" name="bottom" id="bottom">
                          
                           <?php
                          if($ottom) {
                            
                            foreach ($ottom as $key => $value) {
                              $selected = '';
                              

                              echo "<option value='".$value['bottom_size'] ."' ".$selected.">". $value['bottom_size']  ."</option>";
                            }
                          }
                          ?>
                    <input type="hidden"  class="form-control" id="" >
                  </div>
                </div>

                

                <div class="form-group">
                  <label for="reel_size" class="col-sm-2 control-label">Reel Size</label>

                  <div class="col-sm-10">
                    <input type="text" name="reel_size" class="form-control" id="reel_size" >
                  </div>
                </div>

                <!-- <div class="form-group">-->
                <!--  <label for="mill" class="col-sm-2 control-label">Mill</label>-->

                <!--  <div class="col-sm-10">-->
                <!--    <input type="text" name="mill" class="form-control" id="mill" >-->
                <!--  </div>-->
                <!--</div>-->


                <!--<div class="form-group">-->
                <!--  <label for="gsm" class="col-sm-2 control-label">GSM</label>-->

                <!--  <div class="col-sm-10">-->
                <!--    <input type="text" name="gsm" class="form-control" id="gsm" >-->
                <!--  </div>-->
                <!--</div>-->

                <div class="form-group">
                  <label for="weight" class="col-sm-2 control-label">Weight</label>

                  <div class="col-sm-10">
                    <input type="text" name="weight" class="form-control" id="weight" >
                  </div>
                </div>


                <div class="form-group">
                  <label for="remark" class="col-sm-2 control-label">Remark</label>

                  <div class="col-sm-10">
                    <input type="text" name="remark" class="form-control" id="remark" >
                  </div>
                </div>


                <!--<div class="form-group">-->
                <!--  <label for="remark" class="col-sm-2 control-label">D.D</label>-->

                <!--  <div class="col-sm-10">-->

                      

                <!--      <label class="radio-inline">-->
                <!--        <input type="radio" name="dd" value="Sample" checked>Sample-->
                <!--      </label>-->
                <!--      <label class="radio-inline">-->
                <!--        <input type="radio" name="dd" value="Development">Development-->
                <!--      </label>-->
                <!--       <label class="radio-inline">-->
                <!--        <input type="radio" name="dd" value="Order">Order-->
                <!--      </label>-->
                <!--  </div>-->
                <!--</div>-->
              
                


              </div>
              <!-- /.box-body -->
              <div class="box-footer">
              <!--   <button type="button" class="btn btn-default btn_cancel">Cancel</button> -->
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

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<script type="text/javascript">
 // $('img').click(function(){
  $(document).on('click','img', function(e){
    $('.selected').removeClass('selected');
    $(this).addClass('selected');
});

  $(document).on('change','#blank_id', function(e){
    var _t = $(this);
    var img1 = _t.find(':selected').data('image1');
    var img2 = _t.find(':selected').data('image1');
    var img3 = _t.find(':selected').data('image1');
    var img4 = _t.find(':selected').data('image1');
    var img5 = _t.find(':selected').data('image1');

    var html = '';
    if(img1) {
      html += '<div class="col-md-2"><img src="../upload/'+img1+'" data-v="'+img1+'" class="selected_img" data-im="image1" width="100px;" alt=""></div>';
    }
    if(img2) {
      html += '<div class="col-md-2"><img src="../upload/'+img2+'" data-v="'+img2+'" class="selected_img" data-im="image1" width="100px;" alt=""></div>';
    }
    if(img3) {
      html += '<div class="col-md-2"><img src="../upload/'+img3+'" data-v="'+img3+'" class="selected_img" data-im="image1" width="100px;" alt=""></div>';
    }
    if(img4) {
      html += '<div class="col-md-2"><img src="../upload/'+img4+'" data-v="'+img4+'" class="selected_img" data-im="image1" width="100px;" alt=""></div>';
    }
    if(img5) {
      html += '<div class="col-md-2"><img src="../upload/'+img5+'" data-v="'+img5+'" class="selected_img" data-im="image1" width="100px;" alt=""></div>';
    }

    $('.replace_imgs').html(html);
    console.log(img1);
  });

  jQuery(document).ready(function($) {
        $('#frm_product').validate({
                 ignore: [],  
                 debug: false,
                //errorElement: 'div',
                //errorClass: "invalid-feedback",
                rules: {
                    name: {
                       // minlength: 3,
                        required: true,
                    },
                  
                   
                   
                },
                messages: {
                    
                },
               
                submitHandler: function (form) {
                   // return true;
                }
                
            });



            $(document).on('click', '.btn_save', function() {
              var _t = $(this);
             
              var form = $('form')[0]; // You need to use standard javascript object here
              var formData = new FormData(form);

              if( $('.replace_imgs').find('.selected') ){
                  formData.append( $('.selected').data('im') , $('.selected').data('v'));
              }
              
              
              
              console.log(formData);
                if($("#frm_product").valid()) {

                    

                    _t.prop('disabled', true).text('Processing...');
                      $.ajax({
                               url:'users/save_data',
                               type: 'POST',
                               processData: false,
                               contentType: false,
                              data: formData,
                                success: function (data, status, jqxhr) {
                                    console.log(data);
                                    _t.prop('disabled', false).text('Save');

                                    location.replace('users/')
                                    if(status == 'success') {
                                       // location.replace('product/');
                                    } else {
                                       // alert('Cannot save product.');
                                    }
                                },
                                error: function (jqxhr, status, msg) {
                                    //error code
                                }
                            });
                }
            });


            $(document).on('click', '.btn_cancel', function(event) {
                //location.replace('product');
            });

  });
</script>
