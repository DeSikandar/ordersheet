
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blank
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
          <h3 class="box-title">Blank List</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
                <form action="blank/importcsv" method="POST" enctype="multipart/form-data">
            <input type="file" accept=".csv" name="empimport">
            <button type="submit" name="import">Import</button>
          </form>
          <!--<a class="btn btn-primary" data-target="#exampleModal" data-toggle="modal"><i class="glyphicon glyphicon-plus-sign"></i>Add</a>-->
          <!--<a type="button" id="create"  class="btn btn-primary" -->
          <!--data-toggle="modal" data-target="#exampleModal"><i class="glyphicon glyphicon-plus-sign"></i>Add</button>-->
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
               <form action="blank/insert" method="POST" enctype="multipart/form-data" >
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" aria-describedby="please enter title">
                </div>
                  <div class="form-group">
                      <img src="#" id="blah" class="img-thumbnail"/>
                    <label for="image1">Image1</label>
                    <input type="file" name="image1" class="form-control" id="image1" accept="image/*">
                  </div>
                  <div class="form-group">
                      <img src="#" id="blah1" class="img-thumbnail"/>
                    <label for="image2">Image2</label>
                    <input type="file" name="image2" class="form-control" id="image2" accept="image/*">
                  </div>
                  <div class="form-group">
                      <img src="#" id="blah2" class="img-thumbnail"/>
                    <label for="blank_layout">blank layout</label>
                    <input type="file" name="blank_layout" class="form-control" id="blank_layout" accept="image/*">
                  </div>
                  <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="text" name="stock" class="form-control" id="stock" >
                  </div>
                  <div id="chil">
                   <div class="form-group">
                    <label for="real">Reel Size</label>
                    <input type="text" class="form-control" id="real" name="reelsize[]" aria-describedby="please enter title">
                </div>
                  
                  <div class="form-group">
                    <label for="real_layout">Reel layout</label>
                    <input type="file" name="real_layout[]" class="form-control" id="real_layout" accept="image/*">
                  </div>
                  </div>
                 
                  <div id="reel">
                      
                  </div>
                  <button type="button" class="btn btn-primary" id="add">Add reel size and layout</button><button id="rm" type="button" class="btn btn-warning">Remove</button><br><hr>
                  
                  <button type="submit" class="btn btn-primary">Submit</button>
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


    // $('#create').html("hai");
   $('#add').click(()=>{
       $('#reel').append(`
        <div id="chil">
                   <div class="form-group">
                    <label for="real">Reel Size</label>
                    <input type="text" class="form-control" id="real" name="reelsize[]" aria-describedby="please enter title">
                </div>
               
                  
                  <div class="form-group">
                    <label for="real_layout">Reel layout</label>
                    <input type="file" name="real_layout[]" class="form-control" id="real_layout" accept="image/*">
                  </div>
                  </div>
       
       `);
       
   });
   
   $('#rm').click(()=>{
$('#reel').children().last().remove();
    
});




    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah1').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah2').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#image1").change(function(){
        readURL(this);
    });
    
    
     $("#image2").change(function(){
        readURL1(this);
    });
    
     $("#blank_layout").change(function(){
        readURL2(this);
    });
</script>