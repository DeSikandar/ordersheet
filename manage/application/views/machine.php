
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
          <h3 class="box-title">
              <?php echo "Bottom Size "; print_r($bottom[0]['bottom_size']); ?>
              Machine List</h3>

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
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">User</th>
                  <th scope="col">Machine</th>
                 
                  <!--<th scope="col">Handle</th>-->
                </tr>
              </thead>
              <tbody>
                
                <?php $i=1; foreach($mname as $mname){  ?>
                <tr>
                  <th scope="row"><?php echo $i;  ?></th>
                  <td><?php echo $mname['first_name']; ?></td>
                  <td><?php echo $mname['blank_co'];  ?></td>
                
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
