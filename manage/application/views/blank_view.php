
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>

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
          <h3 class="box-title"><?php print_r($user[0]['first_name']); echo " ".$user[0]['city']." "; ?>Machine List</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <table class="table">
                
               <a class="btn btn-primary" data-target="#exampleModal" data-toggle="modal"><i class="glyphicon glyphicon-plus-sign"></i>Add</a>
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Blank</th>
                  <th scope="col">Bottom</th>
                  <!--<th scope="col">Handle</th>-->
                </tr>
              </thead>
              <tbody>
                <?php $i=1; foreach($cname as $cname){  ?>
                <tr>
                  <th scope="row"><?php echo $i;  ?></th>
                  <td><?php echo $cname['blank_co']." X ".$cname['title']; ?></td>
                  <td><?php echo $cname['bottom_Co']." X ".$cname['bottom_size']; ?></td>
                  <td><a href="employee/deletm/<?php echo $cname['id']; ?>/<?php echo $id; ?>" class="btn">Delete</a></td>
                 
                
                </tr>
                <?php $i++; } ?>
                
              </tbody>
            </table>
         
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
               <form id="form1" action="employee/insert_add" method="POST"  >
                  
                  
                  <div class="form-group">
                    <label for="man">No.Of Machine</label>
                    <input type="text" name="noofmachine" class="form-control" id="man"  >
                    <input type="hidden" name="user" value="<?php echo $id; ?>"/>
                  </div>
                 
                  
                 
                      
                  
                    
                     
                     <div id="bl">
                     
                  
                  </div>
                  
                  
                  <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                </form>
          
       </div>
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
