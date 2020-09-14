<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
include("titlecase.php");

check_login();
$current_page ="manage-clients";
if(isset($_POST['submit']))
{

$try=0;

if($_POST['c_name'] != null)
{
      
  $cname=titlecase(addslashes($_POST['c_name']));
    $try++;
 }
 else
 {
    $nameerror="Enter Client Name";
 }

 if($_POST['c_add'] != null)
 { 
  $cadd= addslashes($_POST['c_add']);
  $try++;
}
else
{
    $cadderror="Enter Client Address";
}

  $mobcount=strlen(($_POST['mob']));
  if($mobcount == 10)
  {
  $mob= $_POST['mob'];
  $try++;
 }
 else{
  $moberror="Enter Valid 10 Digit Mobile number";
 }


$gstcount=strlen($_POST['gst']);

if($gstcount == 10 or $gstcount == 15 or $gstcount == 12)
{
 $gst=strtoupper($_POST['gst']);
 $try++;

 } 

else{
  $gsterror="Enter Valid 15 Digit GST / 10 Digit Pan or 12 Digit Adhaar number";
}

if($_POST['ctype'] != null)
{

  $ctype=$_POST['ctype'];
  $try++;
  //echo $ctype;
 }
 else
 {
  $ctypeerror="Select the Client Type";
 }


  $date= date("Y-m-d");


if($try ==5  &&  $mobcount == 10)
{

 $c=mysqli_query($con,"INSERT INTO `client` (`cid`, `c_name`, `c_add`,`mob`,`gst`,`c_type`, `created`) VALUES (NULL,'$cname', '$cadd', '$mob', '$gst','$ctype','$date')") or die("Error: " . mysqli_error($con));

if(!$c)
{
  
  $_SESSION['msg']="Error Occured ".mysqli_error($con);

}
else
{


$_SESSION['msg']="Client Added successfully";


echo "<script>
         setTimeout(function(){
            window.location.href = 'manage-clients.php';
         }, 3000);
      </script>";


 } 
}
else{
  //echo '<script type="text/javascript">validate();</script>';
}

}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | General Form Elements</title>
<?php include_once"links.php";?>


  
</head>
<body class="hold-transition skin-blue sidebar-mini" >
<div class="wrapper" style="height: 800px !important; min-height: 500px !important;">

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
        <li class="active">Add Clients</li>
      </ol>
    </section>

      <?php $ret=mysqli_query($con,"select (cid)+1 from client ORDER BY cid DESC LIMIT 1")or die("Error: " . mysqli_error($con));
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
                           <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return validate();">
                           <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
                         </br>
            <!-- /box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                
                <div class="form-group">
                  <label id="cidlbl" class="col-sm-2 control-label">Client ID</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="cid" id="cid" required="required" value="<?php echo $row[0]; ?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label id="cnamelbl" class="col-sm-2 control-label">Company Name</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="c_name" 
                    value="<?php if(isset($_POST['c_name'])){ echo $_POST['c_name'];} ?>" id="c_name" 
                     placeholder="Company Name">
                    <div id="nameerror" style="color:red;"><?php if(isset($nameerror)) {echo $nameerror; } ?> </div>
                  </div>
                </div>

                <div class="form-group">
                  <label id="caddlbl" class="col-sm-2 control-label">Address</label>
                  <div class="col-sm-8">
                    <textarea class="form-control" name="c_add" id="c_add" 
                      placeholder="Address"><?php if(isset($_POST['c_add'])){ echo $_POST['c_add'];} ?></textarea>
                                  <div id="adderror" style="color: red;"><?php if(isset($cadderror)) {
                                    echo $cadderror;
                                  } ?> </div>
                </div>
              </div>

              <div class="form-group">
                  <label id="cmoblbl" class="col-sm-2 control-label">Mobile</label>
                  <div class="col-sm-8">
                   <input type="number" class="form-control" name="mob" id="mob" 
                   value="<?php if(isset($_POST['mob'])){ echo $_POST['mob'];} ?>" 
                    placeholder="Mobile">
                                  <div id="moberror" style="color:red;"><?php if(isset($moberror)){
                                    echo $moberror;
                                  } ?> </div>
                </div>
              </div>

              <div class="form-group">
                  <label id="cgstlbl" class="col-sm-2 control-label">GST</label>
                  <div class="col-sm-8">
                   <input type="text" style="text-transform: uppercase;" class="form-control" 
                   value="<?php if(isset($_POST['gst'])){ echo $_POST['gst'];} ?>" id="gst" name="gst"  placeholder="GST / PAN or Adhaar">
                  <div id="gsterror" style="color: red;"> <?php if(isset($gsterror)){
                                    echo $gsterror;
                                  } ?> </div>
                </div>
              </div>

                 <div class="form-group">
                  <label id="type" class="col-sm-2 control-label">Client Type</label>
                  <div class="col-sm-8">
                   <select name="ctype" class="form-control select2" style=" height: 34px;width:30%" id="ctype">
                   	<option value=""></option>
                  <?php 

                    $type=mysqli_query($con,"select * from clienttype");
                    while($rop=mysqli_fetch_array($type))
                    {
                        if(isset($_POST['ctype']))
                        {
                          if($rop['type'] == $_POST['ctype'])
                          {


                  ?>        

                     <option value="<?php echo $rop['type']; ?>" selected="selected"> <?php echo $rop['type']; ?> </option>
                     <?php } }
                      ?>
                       <option value="<?php echo $rop['type']; ?>"> <?php echo $rop['type']; ?> </option>
                     <?php } ?>
                   </select>
                                  <div id="typeerror" style="color: red;"> <?php if(isset($ctypeerror)) {
                                    echo $ctypeerror; 
                                  } ?> </div>
                </div>
              </div>

              <div class="form-group">
                  <label id="c_datelbl" class="col-sm-2 control-label">Creation Date</label>
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

  <?php include_once"footer.php"; ?>

  <?php include_once"settings.php"; ?>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- 
<script type="text/javascript">

var cname=document.getElementById("c_name").value;
  var cadd= document.getElementById("c_add").value;
  var mob=document.getElementById("mob").value;
  var gst=document.getElementById("gst").value;
  var type=document.getElementById("ctype").value;
  function validate(){
  

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
      troods();
   }  
  if(!gst)
  {
    document.getElementById("gsterror").innerHTML=" Enter GST / PAN or Adhaar";
    document.getElementById("gsterror").style.color="Red";
  }
  else
  {

       //foods(); 
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
 function troods(){
  if(mob.length != 10){
   
   console.log(mob.length);
       document.getElementById("moberror").innerHTML=" Enter 10 Digit Valid mobile number";
    document.getElementById("moberror").style.color="Red";
    }
}

function foods(){
  if(gst.length == 10 || gst.length == 12 || gst.length == 15)
  {
    console.log(gst.length);
  }
  else
  {
    document.getElementById("gsterror").innerHTML="Enter valid 10 Digit Pan / 12 Digit Adhaar or 15 Digit GST Number";
    document.getElementById("gsterror").style.color="Red";
  }
}


</script> -->


<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2({
       placeholder: "Select a Client",
    allowClear: true
    });

  });

  
</script>
</body>
</html>
