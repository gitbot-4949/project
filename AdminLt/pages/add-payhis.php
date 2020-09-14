<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();

$current_page='manage-paidhistory';

if(isset($_POST['submit']))
{
  $pm=$_POST['pm'];
  $amount=$_POST['amount'];
  $purpose=$_POST['purpose'];
    $mode=$_POST['mode'];
  $date= date("Y-m-d");

  $cs=mysqli_query($con,"INSERT INTO `paidhistory` (`pay_id`, `p_m`, `amount`, `mode`, `date`,`purpose`) VALUES (NULL,'$pm', '$amount','$mode','$date','$purpose' )")
    or die("Error: " . mysqli_error($con));



if(!$cs)
{
  
  $_SESSION['msg']="Error Occured ".mysqli_error($con);

  
}
else
{

$_SESSION['msg']="Payment Details inserted successfully";

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
 <?php include_once"navbar.php"; ?>





  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Manage Payments
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Paid History</li>
      </ol>
    </section>
 
      <?php $ret=mysqli_query($con,"select count(*)+1 from paidhistory")or die("Error: " . mysqli_error($con));
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
              <h3 class="box-title">Add Payment Details</h3>
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
                    <input type="text" class="form-control" name="payid" id="payid" value="<?php echo $row[0]; ?>">
                  </div>
                </div>
               

                <div class="form-group">
                  <label id="c_name" class="col-sm-2 control-label">Person or Company</label>
                  <div class="col-sm-8">
                   <!--  <input type="text" class="form-control" name="pm"  id="pm" required="required" placeholder="Person or Company Name"> -->
                <select class="form-control select2" name="pm" style="width: 100%;">
                  <option></option>
                   <?php 

                $pur=mysqli_query($con,"select * from purchasecom") or die("Error:".mysqli_error($con));

                while($rows=mysqli_fetch_array($pur))
                {

                ?>
                  <option value="<?php echo $rows['pcname'];?>"><?php echo $rows['pcname']; ?></option>
                 <?php } ?>
                </select>
              </div>

                    <div id="pmerror"> </div>
                  </div>
                

                <div class="form-group">
                  <label id="c_add" class="col-sm-2 control-label">Amount</label>
                  <div class="col-sm-8">
                    <input type="number" class="form-control" name="amount" id="amount" required="required" placeholder="Amount"></textarea>
                                  <div id="amounterror"> </div>
                </div>
              </div>

              <div class="form-group">
                  <label id="c_add" class="col-sm-2 control-label">Purpose</label>
                  <div class="col-sm-8">
                   <input type="text" class="form-control" name="purpose" id="purpose" required="required" placeholder="Purpose">
                                  <div id="purposeerror"> </div>
                </div>
              </div>

              <div class="form-group">
                  <label id="c_add" class="col-sm-2 control-label">Mode of Payment</label>
                  <div class="col-sm-8">
                   <select name="mode" style="height: 32px;" id="mode">
                    <option value="0">Mode</option>
                     <?php

                       $data=mysqli_query($con,"select mode from paymode");

                       
                       while($row=mysqli_fetch_array($data))
                       {
                       ?>
                                   
                                    
                                    <option value="<?php echo $row['mode']; ?>"><?php echo $row['mode']; ?></option>
                                    
                                    <?php } ?>
                                  </select>
                                  <div id="modeerror"> </div>
                </div>
              </div>

              <div class="form-group">
                  <label id="c_add" class="col-sm-2 control-label">Creation Date</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" name="created" value="<?php  $c=date("d-M-Y");
                                        echo $c; ?>" />

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
  <?php include_once"settings.php";?>
  <?php include_once"footer.php"; ?>

<script type="text/javascript">



  function validate(){
  var pm=document.getElementById("pm").value;
  var amount= document.getElementById("amount").value;
  var purpose=document.getElementById("purpose").value;
  var mode=document.getElementById("mode").value;

  if(!pm)
  {
    document.getElementById("pmerror").innerHTML="Enter Person or Company Name ";
    document.getElementById("pmerror").style.color="Red";
  }
  else
  {
    document.getElementById("pmerror").innerHTML="";
  }
  if(!amount)
  {
    document.getElementById("amounterror").innerHTML="Enter Amount ";
    document.getElementById("amounterror").style.color="Red";
  }
  else
  {
    document.getElementById("amounterror").innerHTML="";
  }
  if(!purpose)
  {
    document.getElementById("purposeerror").innerHTML=" Enter purpose of Payment";
    document.getElementById("purposeerror").style.color="Red";

  }
  else
  {
    document.getElementById("purposeerror").innerHTML="";
  }
  if(!mode)
  {
    document.getElementById("modeerror").innerHTML=" Select Mode of Payment";
    document.getElementById("modeerror").style.color="Red";
  }
  else
  {
   document.getElementById("modeerror").innerHTML=""; 
  }

}
</script>





<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Select2 -->
<script src="../bower_components/select2/dist/js/select2.full.min.js"></script>


<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

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
