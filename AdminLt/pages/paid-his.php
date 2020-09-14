<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
 check_login();

$current_page="manage-paidhistory";
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Data Tables</title>
  <?php include_once"links.php"; ?>

        <style>
    [class^='select2'] {
  border-radius: 0px !important;
  line-height: 19px !important;

  
}
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include_once "header.php"; ?>
<?php include_once "navbar.php"; ?>


  <!-- Content Wrapper. Contains page content -->
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Manage Paid History
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="active">Manage Paid History</li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
       
           
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title" style="padding-top: 10px;"> Filter Details</h3>
            </div>
           </br>

              <form method="POST" action="">
                          &nbsp;&nbsp;&nbsp; <b>To Date:</b> &nbsp;<input type="date" name="todate" style="height:32px" id="todate"> &nbsp;&nbsp; &nbsp;&nbsp; <b>From Date</b>&nbsp; <input type="date" name="fromdate" style="height:32px" id="fromdate"> &nbsp;&nbsp; &nbsp;&nbsp; <b> P/m.s </b> &nbsp;

                          <select name="person" class="form-control select2" style="width: 30%!important;">
                            <option value="">  </option>
                          <?php $ret=mysqli_query($con,"select pcname from purchasecom");
                $cnt=1;
                if(mysqli_num_rows($ret)==0)
                {
                  echo "No Records Found";
                }
                while($row=mysqli_fetch_array($ret))
                { ?>

                          
                            <option value="<?php echo $row['pcname'];?>"> <?php echo $row['pcname']; ?> </option>

                            <?php } ?> 
                          </select>
                            &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <input type="submit" class="btn btn-success" name="submit">
                          </form>

<?php 

  if(isset($_POST['submit']))
                                      {
                                        $_SESSION['query']="";

                                        $search_query = "SELECT * FROM paidhistory where";


                                      $todate=$_POST['todate'];
                                        
                                      $fromdate=$_POST['fromdate'];
                                     
                                      
                                      $pm=$_POST['person'];

                                     // $pms=urlencode($pm);
                                      if($pm != "") {
                                       $search_query="";
                                       $_SESSION['query']="";
                                        $search_query = " SELECT * FROM paidhistory where p_m like '$pm'";
                                        $_SESSION['query']=$search_query;
                                        }


                                      if($todate && $fromdate ) {
                                        $todates= date('Y-m-d',strtotime($todate));
                                         $fromdates= date('Y-m-d',strtotime($fromdate));
                                        //  echo $todates;
                                      //echo $fromdates;

                                       $_SESSION['query']="";
                                         $search_query .= " date between '".$todates."' and 
                                        '".$fromdates."'";
                                      
                                      $_SESSION['query']=$search_query;
                                      }

                                       if(($todate && $fromdate) && $pm)
                                      {
                                        $search_query="";
                                         $todates= date('Y-m-d',strtotime($todate));
                                         $fromdates= date('Y-m-d',strtotime($fromdate));
                                        //  echo $todates;
                                      //echo $fromdates;
                                         $_SESSION['query']="";
                                        $search_query= "SELECT * FROM `paidhistory` WHERE `p_m` LIKE '$pm' AND `date` BETWEEN '$todates' AND '$fromdates'";
                                         $_SESSION['query']=$search_query;
                                      }

                                     

                                        $ret=mysqli_query($con,$search_query) or die("Eror:".mysqli_error($con));

                                        

                                       

                                      //  echo $search_query;

                                          //$_SESSION['query']="";
                                           //$_SESSION['query']=$search_query;  
                          

                                        if(isset($_SESSION['query']))
                                        {
                                      //  echo $_SESSION['query'];
                                         } 
                              
                                }
                               
                                 else
                               
                                {
                                  //$search_query="";
                                  $search_query="select * from paidhistory";
                            

                                          $_SESSION['query']="";
                                           $_SESSION['query']=$search_query;  

                                         //  echo $_SESSION['query'];


                                  $ret=mysqli_query($con,$search_query);
                                }
                                $d=mysqli_num_rows($ret);
                                if($d == 0)
                                             {
                                              $nodata="No Records Found";                                              
                                            }                  

?>

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                  
                  <a href="excel.php?query=<?php echo $_SESSION['query']; ?>"> 
                                     <button class="btn btn-danger btn-xs pull-left" style="margin: 25px 70px 2px 20px; padding: 5px 5px 5px 5px;">
                                      <i class="fa fa-fw fa-file-excel-o" ></i>&nbsp;Export </button></a>
     


                  <button type="button" id="btnplus"class="btn btn-success btn-sm pull-right" style="margin: 20px 70px 2px 2px;" onclick="window.location.href = 'add-payhis.php'";><span class="glyphicon glyphicon-plus"></span></button></br></br>
                            <hr>

                              <thead>
                              <tr>
                                  <th>Sr. no.</th>
                                  <th class="hidden-phone">Per/comp</th>
                                  <th> Amount </th>
                                  <th> Mode Of Payment</th>
                                  <th> Purpose</th>
                                  <th>Paid Date</th>
                                      <th>Operation</th>
                              </tr>
                              </thead>
                              <tbody>
                            <?php    
                              
                                  



                $cnt=1;
                while($row=mysqli_fetch_array($ret))
                {?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                                  <td><?php echo $row['p_m'];?></td>
                                  <td>&nbsp;<?php echo $row['amount'];?></td>
                                  <td>&nbsp;<?php echo $row['mode'];?></td>
                                  <td>&nbsp;<?php echo $row['purpose'];?></td> 
                                   <td>&nbsp;<?php 
                                    $c=date("d-M-Y",strtotime($row['date']));
                                        echo $c;
                                  ?></td>
                                  <td>
                                     
                                    <a href="update-pay.php?payid=<?php echo $row['pay_id'];?>"> 
                                     <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                    
                                    <?php $did=$row['pay_id']; ?>
                                   
                                    <a class="btn btn-danger btn-xs" id="delete_product" data-id="<?php echo $did; ?>" ><i class="fa fa-trash-o "></i></a>
                                  </td>
                              
                              </tr>

                              
                              <?php $cnt=$cnt+1; }?>
                             
                              </tbody>
                <tfoot>
                <tr>
                  <th>Sr. no.</th>
                  <th class="hidden-phone">Per/comp</th>
                  <th> Amount </th>
                  <th> Mode Of Payment</th>
                  <th> Purpose</th>
                  <th>Paid Date</th>
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

  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2({
       placeholder: "Select a Person or Company",
    allowClear: true
    });

  });
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
            url: 'delete payhis.php',
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
            window.location.href = 'paid-his.php';
         }, 3000);
    //$('#load-products').load('manage-clients.php'); 
  }
  
</script>
</body>
</html>
