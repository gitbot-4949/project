<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
include_once("titlecase.php");

check_login();
$current_page ="manage-clients";
if(isset($_POST['submit']))
{

  //$comp=addslashes($_POST['c_name']);

  $cname=titlecase(addslashes($_POST['c_name']));
  

//  $comp2=addslashes($_POST['c_add']);
  
  $cadd= addslashes($_POST['c_add']);


$mobcount=strlen(($_POST['mob']));
  if($mobcount == 10)
  {
  $mob= $_POST['mob'];
 }
 else{
  $moberror="Enter Valid 10 Digit Mobile number";
 }


$gstcount=strlen($_POST['gst']);

if($gstcount == 10 or $gstcount == 15 or $gstcount == 12)
{
 $gst=strtoupper($_POST['gst']);


 } 

else{
  $gsterror="Enter Valid 15 Digit GST / 10 Digit Pan or 12 Digit Adhaar number";
}
  

if($_POST['ctype'] != null)
{

  $ctype=$_POST['ctype'];
  //echo $ctype;
 }
 else
 {
  $ctypeerror="Select the Client Type";
 }

  
  $date= date("Y/m/d");


if($cname != null && $cadd != null   &&  $mobcount == 10)
{
  $c=mysqli_query($con,"update client set c_name='$cname' ,c_add='$cadd' , mob='$mob', gst='$gst',c_type='$ctype',created='$date' where cid='".$_GET['clid']."'") or die("Error: " . mysqli_error($con));
if(!$c)
{
  
  $_SESSION['msg']="Error Occured ".mysqli_error($con);

  
}
else
{


$_SESSION['msg']="Profile Updated successfully";


echo "<script>
         setTimeout(function(){
            window.location.href = 'manage-clients.php';
         }, 4000);
      </script>";



 } 

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
  <style>
    [class^='select2'] {
  border-radius: 0px !important;
  line-height: 21px !important;
  
  
}
  </style>
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
      Manage Clients
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Update Client Details</li>
      </ol>
    </section>

      <?php $ret=mysqli_query($con,"select * from Client where cid=".$_GET['clid']."") or die("Error: " . mysqli_error($con));
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
              <h3 class="box-title">Update Client Details</h3>
              <hr>
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
                  <label id="cidlbl" class="col-sm-2 control-label">Client ID</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="cid" id="cid" value="<?php echo $row['cid']; ?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label id="c_namelbl" class="col-sm-2 control-label">Company Name</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="c_name"  id="c_name" required="required" value="<?php echo $row['c_name'];?>">
                    <div id="nameerror"> </div>
                  </div>
                </div>

                <div class="form-group">
                  <label id="c_addlbl" class="col-sm-2 control-label">Address</label>
                  <div class="col-sm-8">
                    <textarea class="form-control" name="c_add" id="c_add"><?php echo $row['c_add']; ?></textarea>
                                  <div id="adderror"> </div>
                </div>
              </div>

              <div class="form-group">
                  <label id="cmoblbl" class="col-sm-2 control-label">Mobile</label>
                  <div class="col-sm-8">
                   <input type="number" class="form-control" name="mob" id="mob"  required="required" 
                   value="<?php echo $row['mob'];?>">
                                  <div id="moberror" style="color: red;"><?php if(isset($moberror)){
                                    echo $moberror;
                                  } ?> </div>
                </div>
              </div>

              <div class="form-group">
                  <label id="gstlbl" class="col-sm-2 control-label">GST</label>
                  <div class="col-sm-8">
                   <input type="text" style="text-transform: uppercase;" class="form-control" id="gst" name="gst" required="required" value="<?php echo $row['gst'];?>">
                                  <div id="gsterror" style="color: red;"> <?php if(isset($gsterror)){
                                    echo $gsterror;
                                  } ?></div>
                </div>
              </div>
            

                <div class="form-group">
                  <label id="typelbl" class="col-sm-2 control-label">Client Type</label>
                  <div class="col-sm-8">
                   <select name="ctype" id="ctype" class="form-control select2"  required="required" style="width: 30%; height: 34px; border-radius: 0px !important;">

              <option value=""></option>
                  <?php 

                    $type=mysqli_query($con,"select * from clienttype");
                    while($rop=mysqli_fetch_array($type))
                    {
                      if($rop['type'] == $row['c_type'])
                      {
                  ?>    
                         <option value="<?php echo $rop['type']; ?>" selected="selected"> <?php echo $rop['type']; ?> </option>                      
                    <?php 
                      } 
                      else {
  
                        ?> 

                     <option value="<?php echo $rop['type']; ?>"> <?php echo $rop['type']; ?> </option>
                     <?php } } ?>
                   
                      
                   </select>
                       <?php } ?>
                                  <div id="typeerror"> </div>
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
                <input type="submit" name="submit" class="btn btn-info col-sm-8" onclick="validate()">
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

<script type="text/javascript">

  function validate(){
  var cname=document.getElementById("c_name").value;
  var cadd= document.getElementById("c_add").value;
  var mob=document.getElementById("mob").value;
  var gst=document.getElementById("gst").value;
  var type=document.getElementById("ctype").value;

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
    document.getElementById("gsterror").innerHTML=" Enter GST / PAN or Adhaar";
    document.getElementById("gsterror").style.color="Red";
  }
  else
  {
   document.getElementById("gsterror").innerHTML=""; 
  }

  if(!type)
   {
    document.getElementById("typeerror").innerHTML="Select Client Type";
    document.getElementById("typeerror").style.color="Red"; 
   }
   else
   {
    document.getElementById("typeerror").innerHTML="";
   }

}
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2({
       placeholder: "Select a Client Type",
    allowClear: true
    });

  });

  
</script>
</body>
</html>
