<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();

$current_page="manage-invoice";
$current_page1="manage-invlist";

if(isset($_GET['invid']))
{

  $invid=$_GET['invid'];
  $invdata=mysqli_query($con,"select * from invtest2 where invid='$invid'");


 while($row=mysqli_fetch_array($invdata))        
  {   
    $invid=$row['invid'];
    $clientid=$row['cid'];
    $orderid=$row['orderid'];

    //echo "$orderid";
    $totalitems=$row['totalitems'];
    $subtotal=$row['subtotal'];
    $taxrate=$row['taxrate'];
    $taxamount=$row['taxamount'];
    $totalAftertax=$row['totalamount'];
    $created=$row['created'];
  }
}



if(isset($_POST['submit']))
{


    //echo $orderid;
    $del=mysqli_query($con,"DELETE FROM `invtest` WHERE `invtest`.`orderid` = '$orderid'");

   // echo "\n DELETE FROM `invtest` WHERE `invtest`.`orderid` = '$orderid'";
      //$conn = mysqli_connect("localhost","root","test", "blog_samples");
    $itemCount = count($_POST["item_name"]);
    $itemValues=0;
    $query = "INSERT INTO invtest (orderno,orderid,item_name,item_desc,hsn,quantity,price,total) VALUES ";
    $queryValue = "";
    for($i=0;$i<$itemCount;$i++) {
      if(!empty($_POST["item_name"][$i]) || !empty($_POST["price"][$i])) {
        $itemValues++;
        if($queryValue!="") {
          $queryValue .= ",";
        }

        $queryValue .= "(NULL,'" . $orderid . "','" . $_POST["item_name"][$i] . "','" . $_POST["item_desc"][$i] . "','" . $_POST["hsn"][$i] . "',
        '" . $_POST["item_quantity"][$i] . "', '" . $_POST["price"][$i] . "','" . $_POST["total"][$i] . "')"
         or die("Error IN ORDER TABLE: " . mysqli_error($con));
      }
    }

    $sql = $query.$queryValue;
    //ECHO "\n".$sql."\n";
    if($itemValues!=0) {
        $result = mysqli_query($con, $sql);
      
      if(!empty($result)) 
        {$message = "Added Successfully.";
       // echo $message;
    }}
    else{
      $message= "error";
    }
  
   // echo "\n Total No. of Items:".$itemCount."";


    $client=$_POST['client'];
  $getclientid=mysqli_query($con,"select cid from Client where c_name='$client'")or die("Error IN FETCHING Client ID: " . mysqli_error($con));
  $data2=mysqli_fetch_array($getclientid);
  //echo "\n Client id".$data2[0];
  $fg2=$data2[0];

    $subTotal=$_POST['subTotal'];
    $taxRate = $_POST['taxRate'];
    $taxAmount=$_POST['taxAmount'];
    $totalAftertax =$_POST['totalAftertax'];
    $date= date("Y-m-d");

   $demo= mysqli_query($con,"update invtest2 set cid='$fg2', orderid='$orderid',totalitems='$itemCount',subtotal='$subTotal',
    taxrate='$taxRate',taxamount='$taxAmount',totalamount='$totalAftertax' where invid='$invid'") or die("Error IN INVOICE TABLE".mysqli_error($con));


    // echo "update invtest2 set invid = '$invid',cid='$fg2', orderid='$orderid',totalitems='$itemCount',subtotal='$subTotal',
    //taxrate='$taxRate',taxamount='$taxAmount',totalamount='$totalAftertax'";

       // echo "\n insert into invtest2(invid,cid, orderid,totalitems,subtotal,taxrate,taxamount,totalamount,created) values (Null,'$fg2','$orderid','$itemCount','$subTotal','$taxRate','$taxAmount','$totalAftertax','$date')";
    if(!$demo)
    {
         $_SESSION['msg']="Error Occured ".mysqli_error($con);
    }
    else
    {
       $_SESSION['msg']="Invoice Edited Successfully";

       $id=$_POST['cid'];

     echo "<script type=\"text/javascript\">
        setTimeout(function(){
        window.open('invtest.php?inv=".$invid."', '_blank')
        }, 1000);
    </script>";


    }



  }


$connect = new PDO("mysql:host=localhost;dbname=loginsystem", "root", "");

function fill_unit_select_boxold($connect,$rsp)
{ 
 $output = '';
 $query = "SELECT * FROM products";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  
  if($row['name'] == $rsp)
  {
    $output .= '<option value="'.$row["name"].'" selected="selected">'.$row["name"].'</option>';  
  }
  else{
  $output .= '<option value="'.$row["name"].'">'.$row["name"].'</option>';
}}
 
 //$callvalue++;
 return $output;
}

//$connect = new PDO("mysql:host=localhost;dbname=loginsystem", "root", "");

function fill_unit_select_box($connect)
{ 
 $output = '';
 $query = "SELECT * FROM products";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {

  $output .= '<option value="'.$row["name"].'">'.$row["name"].'</option>';
 }
 return $output;
}



?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | General Form Elements</title>
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

<?php include_once"header.php"; ?>
  <!-- Left side column. contains the logo and sidebar -->
    
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/user2_160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Tejas Chavda</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
         <li >
          <a href="index1.php">
            <i class="fa fa-dashboard"  style="padding-left: 4px"></i> <span>Dashboard</span>
           
          </a>
        </li>   
      
          <li>
          <a href="manage-clients.php">
            <i class="fa fa-fw fa-shield"></i> <span>Manage Clients</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>

        <li>
          <a href="manage-products.php">
            <i  class="fa fa-fw fa-gears"></i> <span>Manage Products</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>

         <li>
          <a href="sundry-debitors.php">
            <i class="fa fa-fw fa-qrcode"></i> <span>Manage Debitors</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>

        <li class="active treeview">
          <a href="#">
            <i class="fa fa-fw fa-cloud-download"></i>
            <span>Manage Invoice</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li ><a href="proforma-list.php"><i class="glyphicon glyphicon-floppy-saved"></i> Proforma Invoice List</a></li>
            <li class="active"><a href="inv-list.php"><i class="glyphicon glyphicon-barcode"></i> Tax Invoice List</a></li>
           
          </ul>
        </li>

        <li>
          <a href="paid-his.php">
            <i class="fa fa-fw fa-rupee"></i> <span>Paid History </span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>



        <li class="treeview">
          <a href="#">
            <i class="fa fa-fw fa-print"></i>
            <span>Generate Invoice</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="gen-pro.php"><i class="glyphicon glyphicon-floppy-saved"></i>Generate Proforma </a></li>
            <li ><a href="gen-inv.php"><i class="glyphicon glyphicon-barcode"></i>Generate Tax Invoice</a></li>
           
          </ul>
        </li>

        

        <li>
          <a href="Generate-report.php">
            <i class="fa fa-fw fa-file-excel-o" ></i> <span>Generate Report</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>

         <li>
          <a href="profile.php">
            <i class="fa fa-fw fa-gear" ></i> <span>Settings</span>
          
          </a>
        </li>

        <li>
          <a href="logout.php">
            <i class="fa fa-fw fa-power-off" ></i> <span>Logout</span>
            
          </a>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>






  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Invoice Details
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Generate Invoice</li>
      </ol>
    </section>

       <?php $ret=mysqli_query($con,"select (invid)+1 from invtest2 ORDER BY invid DESC LIMIT 1")or die("Error: " . mysqli_error($con));
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
              <h3 class="box-title">Generate Invoice</h3>
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
                <form method="POST" action ="">
                
                <div class="form-group">
                  <label id="cid" class="col-sm-2 control-label">Invoice ID</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" name="cid" id="cid" value="<?php echo $invid; ?>">
                  </div>

                  <label id="c_addlbl1" class="col-sm-2 control-label">Client Name</label>
                  <div class="col-sm-4">
                    <select name="client"class="form-control select2" onchange="showCustomer(this.value)" 
                    style="height:40px;width: 80%;border-radius:0px;">
                                 
                                  
                                <?php $r=mysqli_query($con,"select * from client");
                                  while($ro=mysqli_fetch_array($r))
                                  {
                                      if($ro['cid'] == $clientid)
                                      {
                                        $clientadd = $ro['c_add'];
                                 ?>
                                    <option value="<?php echo $ro['c_name']; ?>" selected="selected"> <?php echo $ro['c_name']; ?> </option>

                                  <?php 
                                }
                                else
                                {

                                  ?>

                                    <option value="<?php echo $ro['c_name']; ?>"> <?php echo $ro['c_name']; ?> </option>
                                  

                                 <?php }} ?>
                                  </select>
                                   <button type="button" id="btnplus"class="btn btn-success btn-sm " style="margin: 2px 2px 2px 30px;" onclick="window.location.href = 'add-client.php'";><span class="glyphicon glyphicon-plus"></span></button><br>
                </div>

                </div>

                <div class="form-group">
                  <label id="c_name" class="col-sm-2 control-label">Invoice Date</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" name="created" value="<?php  $c=date("d-M-Y");
                                        echo $c; ?>" />
                    <div id="nameerror"> </div>
                  </div>

                  <label id="c_addlbl" class="col-sm-2 control-label">Address</label>
                  <div class="col-sm-4">
                   <textarea class="form-control" rows="3" id="c_add" name="c_add" required="required"><?php  echo $clientadd; ?> </textarea>
                                  <div id="moberror"> </div>
                </div>

                </div>

<hr>
                <div class="form-group col-sm-12 col-md-12" style="margin-left: 3px;">
                  
                  <table class="table table-bordered" id="item_table">
      <tr>
        <th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
              <th width="8%">Item No</th>
              <th width="25%">Item Name</th>
              <th width="20%">Description Name</th>
              <th width="10%">HSN </th> 
              <th width="5%">Quantity</th>
              <th width="15%">Price</th>                
              <th width="25%">Total</th>
       <th><button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>
      </tr>
     <?php 
            $cnt=0;

            $items=mysqli_query($con,"select * from invtest where orderid='$orderid'")or die("Error".mysqli_error($connect));

            //echo "select * from invtest where orderid='$orderid'";
            while($ros=mysqli_fetch_array($items))
            {
              $cnt++;

      ?>

      <tr>
        <td><input class="itemRow" type="checkbox"></td>
        <td><input type="text" name="item_code[]" id="productCode_<?php echo $cnt; ?>" value="<?php echo $cnt; ?>" class="form-control" 
          autocomplete="off"></td>
        
        <td><select name="item_name[]" id="productName_<?php echo $cnt; ?>" class="form-control item_unit" onchange="showproduct(this.value)">
          <option value="">Select Unit</option>
          <?php
           $rsp=$ros['item_name'];
           echo fill_unit_select_boxold($connect,$rsp); ?></select>
        </td>
        
        <td><input type="text" name="item_desc[]" id="productDesc_<?php echo $cnt; ?>" value="<?php echo $ros['item_desc']; ?>"class="form-control item_name" ></td>
        <td><input type="text" name="hsn[]" id="hsn_<?php echo $cnt; ?>" value="8443" class="form-control item_hsn" ></td>
        <td><input type="number" name="item_quantity[]" id="quantity_<?php echo $cnt; ?>" value="<?php echo $ros['quantity']; ?>" class="form-control quantity" ></td>
        
        <td><input type="number" name="price[]" id="price_<?php echo $cnt; ?>" value="<?php echo $ros['price']; ?>" class="form-control price" autocomplete="off"></td>
         
              <td><input type="number" name="total[]" id="total_<?php echo $cnt; ?>" value="<?php echo $ros['total']; ?>"class="form-control total" autocomplete="off"></td>
              <td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td>
  </tr>
<?php } ?>

     </table>
  
              </div>
</br></br></br>
<hr>
      <div class="row"> 
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8" style="padding-left: 50px;">
          <h3>Notes: </h3>
          <div class="form-group">
            <textarea class="form-control txt" rows="5" name="notes" id="notes" placeholder="Your Notes"></textarea>
          </div>
          <br>
          <div class="form-group">
            <input type="hidden" value="<?php echo $_SESSION['userid']; ?>" class="form-control" name="userId">
            <input data-loading-text="Saving Invoice..." type="submit" onclick="validate()"  name="submit" value="Save Invoice" style="width: 15em;  height: 3em; font-size:20px; " class="btn btn-success submit_btn invoice-save-btm">           
          </div>
          
        </div>
      </br></br></br>





        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding-left:50px; ">
      
            <div class="form-group">

              <label>Subtotal: &nbsp;</label> 
            
              <div class="input-group col-sm-10">
                <div class="input-group-addon "><i class="fa fa-fw fa-inr"></i></div>
                <input value="" type="number" class="form-control" name="subTotal" id="subTotal" placeholder="Subtotal">
              </div>
            </div> 
            <div class="form-group">
              <label>Tax Rate: &nbsp;</label>
          
              <div class="input-group col-sm-10">
                <input type="number" class="form-control" name="taxRate" value= "<?php echo $taxrate; ?>" id="taxRate" required="required" placeholder="Tax Rate">
                <div class="input-group-addon">%</div>
              </div>
            </div>

            <div class="form-group">
              <label>Tax Amount: &nbsp;</label>
              <div class="input-group col-sm-10">
                <div class="input-group-addon currency"><i class="fa fa-fw fa-inr"></i></div>
                <input value="<?php echo $taxamount; ?>" type="number" class="form-control" name="taxAmount" id="taxAmount" placeholder="Tax Amount">
              </div>
            </div>              
            <div class="form-group">
              <label>Total: &nbsp;</label>
              <div class="input-group col-sm-10">
                <div class="input-group-addon currency"><i class="fa fa-fw fa-inr"></i></div>
                <input value="" type="number" class="form-control" name="totalAftertax" id="totalAftertax" placeholder="Total">
              </div>
            </div>

           <!--  <div class="form-group">
              <label>Amount Paid: &nbsp;</label>
              <div class="input-group">
                <div class="input-group-addon currency">$</div>
                <input value="" type="number" class="form-control" name="amountPaid" id="amountPaid" placeholder="Amount Paid">
              </div>
            </div>
            <div class="form-group">
              <label>Amount Due: &nbsp;</label>
              <div class="input-group">
                <div class="input-group-addon currency">$</div>
                <input value="" type="number" class="form-control" name="amountDue" id="amountDue" placeholder="Amount Due">
              </div>
            </div>
 -->
          </form>

              <div class="form-group">
                  
              </div>


              <!-- <div class="form-group">
                  <label id="products" class="col-sm-2 control-label">Product</label>
                  <div class="col-sm-8">
                   <select name="products" style="height:32px;" onchange="showproduct(this.value)">
                                 <option value="none"> none</option>
                                  
                                <?php $rc=mysqli_query($con,"select * from products");
                                  while($rows=mysqli_fetch_array($rc))
                                  {
                                 ?>
                                
                                    <option value="<?php echo $rows['name']; ?>"> <?php echo $rows['name']; ?> </option>
                                  

                                 <?php } ?>
                                  </select>
                                  <button type="button" id="btnplus"class="btn btn-success btn-sm " style="margin: 2px 2px 2px 30px;" onclick="window.location.href = 'add-products.php'";><span class="glyphicon glyphicon-plus"></span></button><br>
                                  

                               </div>
                        </div>


                  <div class="form-group">
                  <label id="cid" class="col-sm-2 control-label">Description</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="desc" id="desc" placeholder="Description">
                  </div>
                </div>

                <div class="form-group">
                  <label id="cid" class="col-sm-2 control-label">Quantity</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="quan" id="quan"  onblur="calc()" placeholder="quantity">
                    <div id="errorquantity"> </div>
                  </div>
                </div>

                <div class="form-group">
                  <label id="cid" class="col-sm-2 control-label">Per Item Cost</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="amount" id="amount" style="padding-left: -10px" onblur="calc()" required="required">
                    <div id="erroramount"> </div>
                  </div>
                </div>

                  <div class="form-group">
                  <label id="cid" class="col-sm-2 control-label">Overall Cost</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" onblur="calc()"  name="tamount" id="tamount"  required="required">
                  </div>
                </div>

                <div class="form-group">
                  <label id="cid" class="col-sm-2 control-label">IGST 18%</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" onblur="calc()"  name="damount" id="damount"  required="required">
                  </div>
                </div>

                <div class="form-group">
                  <label id="cid" class="col-sm-2 control-label">Final Amount</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" onblur="calc()"  name="famount" id="famount"  required="required">
                  </div>
              </div>


 -->
              <!-- /.box-body -->
              <!-- <div class="box-footer ">
                <label class="col-sm-2"></label>
                <input type="submit" name="submit" onclick="validate()" class="btn btn-info col-sm-8">
              </div> -->
              <!-- /.box-footer -->
      
            
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
 
 <?php include_once"settings.php"; ?>
 <?php include_once"footer.php";?>

<!-- <script type="text/javascript">

  function calc(){
  var quantity=parseInt(document.getElementById("quan").value);
   var amount=parseInt(document.getElementById("amount").value);
   var error1=document.getElementById("erroramount");
   var error2=document.getElementById("errorquantity");

  if(!quantity)
{
  document.getElementById("errorquantity").innerHTML="Enter Quantity ";
  document.getElementById("errorquantity").style.color="Red";
}
else
{
 document.getElementById("errorquantity").innerHTML=""; 
}

if(!amount)
{
  document.getElementById("erroramount").innerHTML="Enter Amount ";
  document.getElementById("erroramount").style.color="Red";
}
else
{
 document.getElementById("erroramount").innerHTML=""; 
}

   // document.write(amount);
    //document.write(quantity);
    var tamount= document.getElementById('tamount');
    var newval=Math.ceil(quantity*amount);

document.getElementById("tamount").value=newval;

    var tax= Math.ceil((newval*18)/100);

document.getElementById("damount").value=tax;

 var famount=newval+tax;
 document.getElementById("famount").value=famount;

    
    //var newval=quantity*amount;
      //console.log(tamount);
    // document.getElementById('tamount').innerHTML = newval;
}


</script>
 -->

 <script>

 
  $(document).ready(function(){
  
  $(document).on('click', '#checkAll', function() {           
    $(".itemRow").prop("checked", this.checked);
  }); 


  $(document).on('click', '.itemRow', function() {    
    if ($('.itemRow:checked').length == $('.itemRow').length) {
      $('#checkAll').prop('checked', true);
    } else {
      $('#checkAll').prop('checked', false);
    }
  });  

  var count = $(".itemRow").length;

 
 $(document).on('click', '.add', function(){
  count++;
  var html = '';
  html += '<tr>';
  html += '<td><input class="itemRow" type="checkbox"></td>';
  html += ' <td><input type="text" name="productCode[]" id="productCode_'+count+'" value='+count+' class="form-control" autocomplete="off"></td>';
  html += '<td><select name="item_name[]" id="productName_'+count+'" class="form-control item_unit" onchange="showproduct(this.value)"><option value="">Select Unit</option><?php echo fill_unit_select_box($connect); ?></select></td>';


  html += '<td><input type="text" name="item_desc[]" id="descName_'+count+'" class="form-control item_name" /></td>';

  html += '<td><input type="text" name="hsn[]" id="hsn_'+count+'" value="8443" class="form-control item_hsn" /></td>';
  html += '<td><input type="number" name="item_quantity[]" id="quantity_'+count+'" class="form-control item_quantity" /></td>';

  html += ' <td><input type="number" name="price[]" id="price_'+count+'" class="form-control price" autocomplete="off"></td>';
  html += '<td><input type="number" name="total[]" id="total_'+count+'" class="form-control total" autocomplete="off"></td>';
 
  html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';

  $('#item_table').append(html);
 });
 

$(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
 });

$('#checkAll').prop('checked', false);
    calculateTotal();
  });



$(document).on('blur', "[id^=quantity_]", function(){
    calculateTotal();
  }); 
  $(document).on('blur', "[id^=price_]", function(){
    calculateTotal();
  }); 
  $(document).on('blur', "#taxRate", function(){    
    calculateTotal();
  }); 
  $(document).on('blur', "#amountPaid", function(){
    var amountPaid = $(this).val();
    var totalAftertax = $('#totalAftertax').val();  
    if(amountPaid && totalAftertax) {
      totalAftertax = totalAftertax-amountPaid;     
      $('#amountDue').val(totalAftertax);
    } else {
      $('#amountDue').val(totalAftertax);
    } 
  }); 
  
function calculateTotal(){
  var totalAmount = 0; 
  $("[id^='price_']").each(function() {
    var id = $(this).attr('id');
    id = id.replace("price_",'');
    var price = $('#price_'+id).val();
    var quantity  = $('#quantity_'+id).val();
    if(!quantity) {
      quantity = 1;
    }
    var total = price*quantity;
    $('#total_'+id).val(parseFloat(total));
    totalAmount += total;     
  });
  $('#subTotal').val(parseFloat(totalAmount));  
  var taxRate = $("#taxRate").val();
  var subTotal = $('#subTotal').val();  
  
  if(subTotal) {
    var taxAmount = Math.ceil(subTotal*taxRate/100);
    $('#taxAmount').val(taxAmount);
        subTotal =Math.ceil(parseFloat(subTotal)+parseFloat(taxAmount));
    $('#totalAftertax').val(subTotal);    
    
    var amountPaid = $('#amountPaid').val();
    var totalAftertax = $('#totalAftertax').val();  
    if(amountPaid && totalAftertax) {
      totalAftertax = totalAftertax-amountPaid;     
      $('#amountDue').val(totalAftertax);
    } else {    
      $('#amountDue').val(subTotal);
    }
  }
}

 
 

 </script>

  <script>
function showCustomer(str) {
  var xhttp;  
  if (str == "") {
    document.getElementById("c_add").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("c_add").innerHTML = this.responseText;
    }
  };
  var encodedstr = encodeURIComponent(str);
console.log(encodedstr);
  
  xhttp.open("GET", "getcustomer.php?q="+encodedstr, true);
  xhttp.send();
}

</script>

<script>
function showproduct(str) {
  var xhttp;  
  if (str == "") {
    document.getElementById("desc").value = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("desc").value = this.responseText;
    }
  };
  xhttp.open("GET", "getproduct.php?qs="+str, true);
  xhttp.send();
}

 </script> 


<!-- <script src="js/invoice.js"></script> -->


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
