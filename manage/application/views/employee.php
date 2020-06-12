<style>
    .whatsapp{
        color:red;
    }
    
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <!-- <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li> -->
        <!-- <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">User List</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <a class="btn btn-primary" data-target="#exampleModal" data-toggle="modal"><i class="glyphicon glyphicon-plus-sign"></i>Add</a>
        
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
  
  
  
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Blank Add</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="box">
           <div class="box-body">
               <form id="form1" action="employee/insert" method="POST"  >
                  <div class="form-group">
                    <label for="title">First Name</label>
                    <input type="text" class="form-control" name="fname" id="title" aria-describedby="please enter title">
                </div>
                  <div class="form-group">
                      
                    <label for="image1">Division</label>
                    <input type="text" name="division" class="form-control" id="image1" >
                  </div>
                  <div class="form-group">
                      
                    <label for="image2">Email</label>
                    <input type="email" name="email" class="form-control" id="image2">
                  </div>
                  <div class="form-group">
                      
                    <label for="blank_layout">Password</label>
                    <input type="password" name="password" class="form-control" id="blank_layout" accept="image/*">
                  </div>
                  <div class="form-group">
                    <label for="stock">city</label>
                    
                    <select name="city" class="form-control" >
                        <?php foreach($city as $city){   ?>
                        <option value="<?php print($city['city_id']); ?>"><?php print_r($city['city']); ?></option>
                        <?php }?>
                    </select>
                    
                    <!--<input type="text" name="city" class="form-control" id="stock" >-->
                  </div>
                  <div id="chil">
                   <div class="form-group">
                    <label for="real">Is default</label>
                    <input type="checkbox" name="check" value="1" >
                </div>
                  
                  <div class="form-group">
                    <label for="real_layou">Mobile1</label>
                    <input type="text" name="mobile1" class="form-control" id="real_layou" >
                  </div>
                  
                  <div class="form-group">
                    <label for="rea_layout">Mobile2</label>
                    <input type="text" name="mobile2" class="form-control" id="rea_layout" >
                  </div>
                  
                  
                  <div class="form-group">
                    <label for="man">No.Of Machine</label>
                    <input type="text" name="noofmachine" class="form-control" id="man"  >
                  </div>
                 
                  
                 
                      
                  </div>
                    
                     
                     <div id="bl">
                     
                  
                  </div>
                  
                  
                  <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                </form>
          
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<script>
    $('#man').change(()=>{
         $('#bl').html('');
        for (i = 0; i <$('#man').val(); i++) {
           
            $('#bl').append(`
         <div class="form-group">
                          <label for="b">Select Blank</label>
                          <select name="blank[]" class="form-control">
                                <?php  foreach($blank as $blank){ ?>
                              <option value="<?php print($blank['blank_id']); ?>"><?php print($blank['title']); ?></option>
                                <?php  } ?>
                          </select>
                      </div>
                      
                      <div class="form-group">
                          <label for="b">Select Bottom</label>
                          <select name="bottom[]"  class="form-control">
                            <?php  foreach($bottom as $bottom){ ?>
                              <option value="<?php echo($bottom['id']); ?>"><?php print($bottom['bottom_size']); ?></option>
                              <?php } ?>
                          </select>
                      </div>
        
        `);
  
}
        
    });
    
// $("#form1").submit(function(e){
//     return false;
// });

// $('#submit').click(()=>{
//     alert($('#form1').serialize());
// })
</script>