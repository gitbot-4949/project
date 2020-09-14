<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();

$current_page='manage-debitors';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Data Tables</title>
  
  <?php include_once"links.php"; ?>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include_once "header.php"; ?>
    
<?php include_once"navbar.php";?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Manage Purchase Company
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage Sundry Debitors</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title" style="padding-top: 10px;"> All Purchase Company</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                            
                            <button type="button" id="btnplus"class="btn btn-success btn-sm pull-right" style="margin: 2px 20px 2px 2px;" onclick="window.location.href = 'add-sundeb.php'";><span class="glyphicon glyphicon-plus"></span></button></br> 
                            <hr>
                              <thead>
                              <tr>
                                  <th>Sr. no.</th>
                                  <th class="hidden-phone">P Company Name</th>
                                  <th> P Address</th>
                                  <th> Mob </th>
                                  <th> Email </th>
                                  <th>GST</th>
                                   <th> Reg. Date </th>
                                  <th>Operations</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php $ret=mysqli_query($con,"select * from purchasecom");
                $cnt=1;
                while($row=mysqli_fetch_array($ret))
                {?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                                  <td><?php echo $row['pcname'];?></td>
                                  <td><?php echo $row['pcadd'];?></td>
                                  <td><?php echo $row['pcmob'];?></td>
                                  <td><?php echo $row['email'];?></td> 
                                   <td><?php echo $row['gst'];?></td> 
                                   <td><?php  $c=date("d-M-Y",strtotime($row['created']));
                                        echo $c;?></td>
                                  <td>
                                     
                                     <a href="update-sundeb.php?pcid=<?php echo $row['pcid'];?>"> 
                                     <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                     <?php $did=$row['pcid']; ?>
                                   
                                    <a class="btn btn-danger btn-xs" id="delete_product" data-id="<?php echo $did; ?>" ><i class="fa fa-trash-o "></i></a>
                                  </td>
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                             
                              </tbody>
                <tfoot>
                <tr>
                  <th>Sr. no.</th>
                  <th>P Company Name</th>
                  <th>P Address</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>GST</th>
                  <th>Reg. Date</th>
                  <th>Operation</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <?php include_once"footer.php"; ?>

<?php include_once"settings.php";?>

  
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
  $(document).ready(function(){
    
    //readProducts(); /* it will load products when document loads */
    
    $(document).on('click', '#delete_product', function(e){
      
      var productId = $(this).data('id');
      SwalDelete(productId);
      e.preventDefault();
      console.log(productId);
    });
    
  });
  
  function SwalDelete(productId){
    
    swal({
      title: 'Are you sure?',
      text: "It will be deleted permanently!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!',
      showLoaderOnConfirm: true,
        
      preConfirm: function() {
        return new Promise(function(resolve) {
             
           $.ajax({
            url: 'delete debitors.php',
            type: 'POST',
              data: 'delete='+productId,
              dataType: 'json'
           })
           .done(function(response){
            swal('Deleted!', response.message, response.status);
          readProducts();
           })
           .fail(function(){
            swal('Oops...', 'Something went wrong with ajax !', 'error');
           });
        });
        },
      allowOutsideClick: false        
    }); 
    
  }
  
  function readProducts(){
    setTimeout(function(){
            window.location.href = 'sundry-debitors.php';
         }, 3000);
    //$('#load-products').load('manage-clients.php'); 
  }
  
</script>
</body>
</html>
