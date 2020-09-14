<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();

$current_page="manage-paidhistory";

if(isset($_POST['submit']))
{
  $payid=$_GET['payid'];
  $pm=$_POST['pm'];
  $amount=$_POST['amount'];
  $purpose=$_POST['purpose'];
    $mode=$_POST['mode'];
  $date= date("Y-m-d");

  $c=mysqli_query($con,"update `paidhistory` set  `p_m`='$pm', `amount`='$amount', `mode`='$mode', `date`='$date',`purpose`='$purpose' where
   pay_id='$payid'")  or die("Error: " . mysqli_error($con));


if(!$c)
{
  
  $_SESSION['msg']="Error Occured ".mysqli_error($con);

  
}
else
{


$_SESSION['msg']="Payment Details Updated successfully";


echo "<script>
         setTimeout(function(){
            window.location.href = 'paid-his.php';
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
  <?php include_once "navbar.php"; ?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Manage Clients
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>
 <?php 
        $payid=$_GET['payid'];

     $ret=mysqli_query($con,"select * from paidhistory where pay_id='$payid'")or die("Error: " . mysqli_error($con));
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
              <h3 class="box-title">Add Client</h3>
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
                  <label id="cid" class="col-sm-2 control-label">Pay Id</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="payid" id="payid" value="<?php echo $row['pay_id']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label id="c_name" class="col-sm-2 control-label">Person or Company</label>
                  <div class="col-sm-8">
                    <!-- <input type="text" class="form-control" name="pm"  id="pm" value="<?php echo $row['p_m']; ?>"> -->
                     <select class="form-control select2" name="pm" style="width: 100%;">
                  <option value="<?php echo $row['p_m']; ?>"><?php echo $row['p_m']; ?></option>
                   <?php 
                   //$val= $row['p_m'];
                   //echo $val;
                $pur=mysqli_query($con,"select * from purchasecom") or die("Error:".mysqli_error($con));

                while($ro=mysqli_fetch_array($pur))
                {
                    
                ?>
                 <option value="<?php echo $ro['pcname'];?>"><?php echo $ro['pcname']; ?></option>
                
                 <?php } ?>
                </select>

                    <div id="nameerror"> </div>
                  </div>
                </div>

                <div class="form-group">
                  <label id="c_add" class="col-sm-2 control-label">Amount</label>
                  <div class="col-sm-8">
                    <input type="number" class="form-control" name="amount" id="amount" value="<?php echo $row['amount']; ?>"></textarea>
                                  <div id="adderror"> </div>
                </div>
              </div>

              <div class="form-group">
                  <label id="c_add" class="col-sm-2 control-label">Purpose</label>
                  <div class="col-sm-8">
                   <input type="text" class="form-control" name="purpose" id="purpose" value="<?php echo $row['purpose']; ?>">
                                  <div id="moberror"> </div>
                </div>
              </div>
              <?php $modevalue=$row['mode'];
                //echo $modevalue;
               ?>

              <div class="form-group">
                  <label id="c_add" class="col-sm-2 control-label">Mode of Payment</label>
                  <div class="col-sm-8">
                   <select name="mode" style="height: 32px;">
                      <option value="0">Mode</option>         
                      <?php

                       $data=mysqli_query($con,"select mode from paymode");

                      
                       while($row=mysqli_fetch_array($data))
                       {

                        if($row['mode'] == $modevalue)
                        {
                       ?>     
                        <option value="<?php echo $row['mode']; ?>" selected="selected"><?php echo $row['mode']; ?></option>
                       <?php 
                           }
                           else {

                        ?>
                             <option value="<?php echo $row['mode']; ?>"><?php echo $row['mode']; ?></option>       
                                 <?php } }?>

                                  </select>

                                  <label> </label>
                                  <div id="gsterror"> </div>

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
              <!-- /.box-footer -->
              <br/><br/><br/>
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
   <?php include_once"settings.php";?>
   
  
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



<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2({
       placeholder: "Select a Person or Company",
    allowClear: true
    });

  });

  
</script>
</body>
</html>
