<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();
include("titlecase.php");

$current_page='manage-debitors';
if(isset($_POST['submit']))
{

  $pcname=titlecase(addslashes($_POST['pcname']));

  $pcadd=addslashes($_POST['pcadd']);
 

 $pcmobcount=strlen(($_POST['pcmob']));
  if($pcmobcount == 10)
  {
  $pcmob=$_POST['pcmob'];
 }
 else{
  $moberror="Invalid Mobile number";
 }


  
  $email=$_POST['email'];
 
  $gst=strtoupper($_POST['gst']);
 
  $date= date("Y-m-d");
 

  $c=mysqli_query($con,"INSERT INTO `purchasecom` (`pcid`, `pcname`, `pcadd`,`pcmob`,`email`,`gst`, `created`) VALUES (NULL,'$pcname', '$pcadd', '$pcmob','$email', '$gst','$date')")
    or die("Error: " . mysqli_error($con));


if(!$c)
{
  
  $_SESSION['msg']="Error Occured ".mysqli_error($con);

  //echo "update products set name='$pname' ,hsn='$hsn' , created='$date', description='$pdesc' where p_id='".$_GET['pid']."'";
}
else
{

$_SESSION['msg']="Product Updated successfully";

echo "<script>
         setTimeout(function(){
            window.location.href = 'sundry-debitors.php';
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
      Manage Purchase Clients
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Purchase Clients</li>
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
              <h3 class="box-title">Add Purchase </h3>
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
                  <label id="cid" class="col-sm-2 control-label">Pc Id</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="pcid" value="<?php echo $row[0] ?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label id="c_name" class="col-sm-2 control-label">P Company Name</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="pcname" name="pcname"  required="required" placeholder="Purchase Company /per">
                    <div id="pcnameerror"> </div>
                  </div>
                </div>

                <div class="form-group">
                  <label id="c_add" class="col-sm-2 control-label">P Address</label>
                  <div class="col-sm-8">
                    <textarea class="form-control" name="pcadd" id="pcadd" placeholder="Per/com Address"></textarea>
                                  <div id="pcadderror"> </div>
                </div>
              </div>

              <div class="form-group">
                  <label id="c_add" class="col-sm-2 control-label">Mob</label>
                  <div class="col-sm-8">
                   <input type="number" class="form-control" name="pcmob" id="pcmob" onblur="troods()" placeholder="Mobile" required="required">
                                  <div id="pcmoberror"><?php if(isset($moberror)){
                                    echo $moberror;
                                  } ?>  </div>
                </div>
              </div>

              <div class="form-group">
                  <label id="c_add" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-8">
                   <input type="email" class="form-control" name="email" id="email" required="required" onclick="validateEmail(this)" placeholder="Email">
                                  <div id="emailerror"> </div>
                </div>
              </div>

              <div class="form-group">
                  <label id="c_add" class="col-sm-2 control-label">GST</label>
                  <div class="col-sm-8">
                    <input type="text" style="text-transform: uppercase;" class="form-control" name="gst" id="gst" maxlength="15" minlength="10"  placeholder="GST number or Pan or Adhaar" required="required">
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
                <input type="submit" onclick="validate()" name="submit" class="btn btn-info col-sm-8">
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
  <?php include_once"footer.php";?>

 <?php include_once"settings.php"; ?>

<script type="text/javascript">

  function validate(){
  var cname=document.getElementById("pcname").value;
  var cadd= document.getElementById("pcadd").value;
  var mob=document.getElementById("pcmob").value;
  var gst=document.getElementById("gst").value;
    var email=document.getElementById("email").value;
  

  if(!cname)
  {
    document.getElementById("pcnameerror").innerHTML="Enter Company Name ";
    document.getElementById("pcnameerror").style.color="Red";
  }
  else
  {
    document.getElementById("pcnameerror").innerHTML="";
  }
  if(!cadd)
  {
    document.getElementById("pcadderror").innerHTML="Enter Company Address ";
    document.getElementById("pcadderror").style.color="Red";
  }
  else
  {
    document.getElementById("adderror").innerHTML="";
  }
  if(!mob)
  {
    document.getElementById("pcmoberror").innerHTML=" Enter mobile number";
    document.getElementById("pcmoberror").style.color="Red";

  }
  else
  {
    //document.getElementById("pcmoberror").innerHTML="";
     troods();
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
  // if(!email)
  // {
  //   document.getElementById("emailerror").innerHTML=" Enter Email";
  //   document.getElementById("emailerror").style.color="Red";
  // }
  // else
  // {
  //    document.getElementById("emailerror").innerHTML="";
  // }

function troods(){
  if(mob.length != 10){
   
   console.log(mob.length);
       document.getElementById("moberror").innerHTML=" Enter 10 Digit Valid mobile number";
    document.getElementById("moberror").style.color="Red";
    }
}

}
</script>
<script>
function validateEmail(emailField){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(emailField.value) == false) 
        {
            document.getElementById("emailerror").innerHTML=" Enter Valid Email";
    document.getElementById("emailerror").style.color="Red";
            return false;
        }

        return true;

}


</script>

</body>
</html>
