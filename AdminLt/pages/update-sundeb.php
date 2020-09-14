<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();

$current_page="manage-debitors";

if(isset($_POST['submit']))
{
  $cname=$_POST['pcname'];
  $cadd=$_POST['pcadd'];
  $mob=$_POST['pcmob'];
  $email=$_POST['email'];
  $gst=$_POST['gst'];
  $date= date("Y/m/d");

  $d=mysqli_query($con,"update purchasecom set pcname='$cname' ,pcadd='$cadd' , pcmob='$mob', email='$email', gst='$gst', created='$date' where pcid='".$_GET['pcid']."'") or die("Error: " . mysqli_error($con));

 

  if(!$d)
{
  
  $_SESSION['msg']="Error Occured ".mysqli_error($con);

}
else
{


$_SESSION['msg']="Debitors Updated successfully";


echo "<script>
         setTimeout(function(){
            window.location.href = 'manage-clients.php';
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
  <?php include_once "links.php"; ?>
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
      Manage Purchase Clients
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Update Sundry Debitors</li>
      </ol>
    </section>

       <?php $ret=mysqli_query($con,"select * from purchasecom where pcid=".$_GET['pcid']."") or die("Error: " . mysqli_error($con));
    while($row=mysqli_fetch_array($ret))
    {?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Update Purchase </h3>
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
            <form class="form-horizontal" action="" method="POST">
              <div class="box-body">
                
                <div class="form-group">
                  <label id="cid" class="col-sm-2 control-label">Pc Id</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="pcid" value="<?php echo $row['pcid']; ?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label id="c_name" class="col-sm-2 control-label">P Company Name</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="pcname" name="pcname"  required="required" value="<?php echo $row['pcname'];?>">
                    <div id="pcnameerror"> </div>
                  </div>
                </div>

                <div class="form-group">
                  <label id="c_add" class="col-sm-2 control-label">P Address</label>
                  <div class="col-sm-8">
                    <textarea class="form-control" name="pcadd" id="pcadd"><?php echo $row['pcadd'];?></textarea>
                                  <div id="pcadderror"> </div>
                </div>
              </div>

              <div class="form-group">
                  <label id="c_add" class="col-sm-2 control-label">Mob</label>
                  <div class="col-sm-8">
                   <input type="text" class="form-control" name="pcmob" id="pcmob" value="<?php echo $row['pcmob'];?>" minlength="10"  maxlength="10" required="required">
                                  <div id="pcmoberror"> </div>
                </div>
              </div>

              <div class="form-group">
                  <label id="c_add" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-8">
                   <input type="email" class="form-control" name="email" id="hsn" value="<?php echo $row['email'];?>" required="required">
                                  <div id="email"> </div>
                </div>
              </div>

              <div class="form-group">
                  <label id="c_add" class="col-sm-2 control-label">GST</label>
                  <div class="col-sm-8">
                    <input type="text" style="text-transform: uppercase;" class="form-control" name="gst" maxlength="15" minlength="10"  
                    required="required" value="<?php echo $row['gst'];?>">
                </div>
              </div>

              <div class="form-group">
                  <label id="c_add" class="col-sm-2 control-label">Creation Date</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="created" value="<?php  $c=date("d-M-Y",strtotime($row['created']));
                                        echo $c;?>" readonly/>
                </div>
              </div>

               <?php } ?>
              <!-- /.box-body -->
              <div class="box-footer ">
                <label class="col-sm-2"></label>
                <input type="submit" name="submit" class="btn btn-info col-sm-8">
                              </div>
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
  <?php include_once"footer.php"; ?>

  <?php include_once"settings.php"; ?>
  
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<script type="text/javascript">



  function validate(){
  var cname=document.getElementById("c_name").value;
  var cadd= document.getElementById("c_add").value;
  var mob=document.getElementById("mob").value;
  var gst=document.getElementById("gst").value;

  if(!cname)
  {
    document.getElementById("nameerror").innerHTML="Enter Company Name ";
    document.getElementById("nameerror").style.color="Red";
  }
  else
  {
    document.getElementById("nameerror").innerHTML="";
  }
  if(!cadd)
  {
    document.getElementById("adderror").innerHTML="Enter Company Address ";
    document.getElementById("adderror").style.color="Red";
  }
  else
  {
    document.getElementById("adderror").innerHTML="";
  }
  if(!mob)
  {
    document.getElementById("moberror").innerHTML=" Enter mobile number";
    document.getElementById("moberror").style.color="Red";

  }
  else
  {
    document.getElementById("moberror").innerHTML="";
  }
  if(!gst)
  {
    document.getElementById("gsterror").innerHTML=" Enter GST number";
    document.getElementById("gsterror").style.color="Red";
  }
  else
  {
   document.getElementById("gsterror").innerHTML=""; 
  }

}
</script>


</body>
</html>
