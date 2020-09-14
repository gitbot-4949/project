<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();

$current_page='manage-products';

if(isset($_POST['submit']))
{
  
  $pname=$_POST['pname'];
  
  $pdesc=$_POST['desc'];
  

  $hsn=$_POST['hsn'];
  $date= date("Y-m-d");
 $c= mysqli_query($con,"INSERT INTO `products` (`p_id`, `name`, `hsn`, `created`, `description`) VALUES (NULL,'$pname', '$hsn','$date', '$pdesc')")
    or die("Error: " . mysqli_error($con));


if(!$c)
{
  
  $_SESSION['msg']="Error Occured ".mysqli_error($con);

 
}
else
{

$_SESSION['msg']="Product Added successfully";

echo "<script>
         setTimeout(function(){
            window.location.href = 'manage-products.php';
         }, 4000);
      </script>";



 } 
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | General Form Elements</title>
  <?php include_once"links.php"; ?>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include_once"header.php"; ?>
 <?php include_once"navbar.php"; ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Manage Products
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Products</li>
      </ol>
    </section>

      <?php $ret=mysqli_query($con,"select (p_id)+1 from products ORDER BY p_id DESC LIMIT 1")or die("Error: " . mysqli_error($con));
      $row=mysqli_fetch_array($ret);

    ?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Product</h3>
            </div>
          </br>
           <p align="center" style="color:#F00;"><?php 
                     if(isset($_SESSION['msg']))
                     {
                     echo $_SESSION['msg']; }?><?php echo $_SESSION['msg']=""; ?></p>
                           <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();">
                           <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
                         </br>
            <!-- /box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                
                <div class="form-group">
                  <label id="cid" class="col-sm-2 control-label">Product Id</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="pid" value="<?php echo $row[0] ?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label id="c_name" class="col-sm-2 control-label">Product Name</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="pname" name="pname" required="required" placeholder="Product Name">
                    <div id="nameerror"> </div>
                  </div>
                </div>

                <div class="form-group">
                  <label id="c_add" class="col-sm-2 control-label">Description</label>
                  <div class="col-sm-8">
                    <textarea class="form-control" name="desc" id="desc" required="required" placeholder="Description"></textarea>
                                  <div id="descerror"> </div>
                </div>
              </div>

              <div class="form-group">
                  <label id="c_add" class="col-sm-2 control-label">HSN</label>
                  <div class="col-sm-8">
                   <input type="text" class="form-control" name="hsn" id="hsn" required="required" placeholder="HSN Code">
                                  <div id="hsnerror"> </div>
                </div>
              </div>

              <div class="form-group">
                  <label id="c_add" class="col-sm-2 control-label">Creation Date</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="created" value="<?php  $c=date("d-M-Y");
                                        echo $c; ?>" readonly/>
                </div>
              </div>


              <!-- /.box-body -->
              <div class="box-footer ">
                <label class="col-sm-2"></label>
                <input type="submit" name="submit" onclick="validate()" class="btn btn-info col-sm-8">

              </div>
              <br/><br/><br/>
              <!-- /.box-footer -->
            </form>
            
          </div>
            </div>            <!-- Form Element sizes -->
          
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include_once"footer.php";?>

 <?php include_once"settings.php"; ?>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<script type="text/javascript">

  function validate(){
  var cname=document.getElementById("pname").value;
  var cadd= document.getElementById("desc").value;
  var mob=document.getElementById("hsn").value;
  //var gst=document.getElementById("gst").value;

  if(!cname)
  {
    document.getElementById("nameerror").innerHTML="Enter Product Name ";
    document.getElementById("nameerror").style.color="Red";
  }
  else
  {
    document.getElementById("nameerror").innerHTML="";
  }
  
  if(!cadd)
  {
    document.getElementById("descerror").innerHTML="Enter Product Name ";
    document.getElementById("descerror").style.color="Red";
  }
  else
  {
    document.getElementById("descerror").innerHTML="";
  }
  

  if(!mob)
  {
    document.getElementById("hsnerror").innerHTML=" Enter HSN number";
    document.getElementById("hsnerror").style.color="Red";

  }
  else
  {
    document.getElementById("hsnerror").innerHTML="";
  }
  

}
</script>


</body>
</html>
