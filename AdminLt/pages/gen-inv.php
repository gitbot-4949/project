<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();

include("backupdata.php");

$current_page="generate-inv";
$current_page1="gen-inv";

if(isset($_POST['submit']))
{

    $orderid=uniqid();

    //echo $orderid;
    //$_GET['cid'];

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
  // ECHO $sql;
    if($itemValues!=0) {
        $result = mysqli_query($con, $sql);
      
      if(!empty($result)) 
        {
          $message = "Added Successfully.";
        //echo $message;
    }}
    else{
      echo "error";
    }
  
    //echo "\n Total No. of Items:".$itemCount."";

    $invid=$_POST['invid'];

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



//$date=date('Y-m-d');
$stm=mysqli_query($con, "insert into invtest2(invid,cid, orderid,totalitems,subtotal,taxrate,taxamount,totalamount,created) values ('$invid','$fg2','$orderid','$itemCount','$subTotal','$taxRate','$taxAmount','$totalAftertax','$date')");

// echo "insert into invtest2(invid,cid, orderid,totalitems,subtotal,taxrate,taxamount,totalamount,created) values ('$invid','$fg2','$orderid','$itemCount','$subTotal','$taxRate','$taxAmount','$totalAftertax','$date')";

    if(!$stm)
    {
        $_SESSION['msg']="Error Occured ".mysqli_error($con);
    }
    
      else{

$_SESSION['msg']="Invoice Added successfully";

dbbackup("localhost", "root", "", "loginsystem" );


echo "<script type=\"text/javascript\">
        setTimeout(function(){
        window.open('invtest.php?inv=".$invid."', '_blank')
        }, 1000);
    </script>";

//header("Refresh:7; url=gen-inv.php");

  }


}

$connect = new PDO("mysql:host=localhost;dbname=loginsystem", "root", "");

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
  line-height: 25px !important;
  
    
}
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include_once"header.php"; ?>
  <!-- Left side column. contains the logo and sidebar -->
    
<?php include_once"navbar.php"; ?>





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

       <?php 
  
       if (date('m') > 3) {
    $year = date('y')."-".(date('y') +1);
}
else {
    $year = (date('y')-1)."-".date('y');
}
//echo $year;

$date=date('Y-m-d');

$datalog= "SELECT CONCAT_WS( '/', '$year'
                , COALESCE(LPAD(
                      CASE WHEN '$date' >= DATE_FORMAT('$date','%Y-04-01') 
                           THEN SUM(created >= DATE_FORMAT('$date','%Y-04-01')) 
                           ELSE SUM(created BETWEEN DATE_FORMAT('$date','%Y-04-01')-INTERVAL 1 YEAR AND 
                           DATE_FORMAT('$date','%Y-04-01'))
                      END +1,4,0
                      ),LPAD(1,4,0))
                ) 'invid' from invtest2 ";
 
 //$do=mysqli_fetch_array($datalog);
 //$ds=$do[0];
     
$stmt = mysqli_query($con,$datalog);

    $dat=mysqli_num_rows($stmt);
    if($dat > 0) {
        if ($row = mysqli_fetch_assoc($stmt)) {
            $value2 = $row['invid'];
            
           // echo $value2;

            $value2 = substr($value2, 6, 4);//separating numeric part

            //echo "\n after substr".$value2;

          //  $value2 = $value2 + 1;//Incrementing numeric part
            $value2 = "\n INV/".$year."/" . sprintf('%04s', $value2);//concatenating incremented value
            $value = $value2; 
        }
    } 
    else {
        $value2 = "INV/".$year."/0001";
        $value = $value2;
    }
   // echo $value;//

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
                  <label id="ccid" class="col-sm-2 control-label">Invoice ID</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" name="invid" id="invid" value="<?php echo $value; ?>">
                  </div>
                      <label id="c_addlbl1" class="col-sm-2 control-label">Client Name</label>
    
                    <div class="col-sm-4">
                    <select name="client" class="form-control select2" onchange="showCustomer(this.value)" style="height:40px !important;width: 80%;border-radius:0px; ">
                                 <option></option>
                                  
                                <?php $r=mysqli_query($con,"select * from client");
                                  while($row=mysqli_fetch_array($r))
                                  {
                                 ?>
                                
                                    <option value="<?php echo $row['c_name']; ?>"> <?php echo $row['c_name']; ?> </option>
                                  

                                 <?php } ?>
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
                   <textarea class="form-control" rows="3" id="c_add" name="c_add" required="required"></textarea>
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
      <tr>
        <td><input class="itemRow" type="checkbox"></td>
        <td><input type="text" name="item_code[]" id="productCode_1" value="1" class="form-control" autocomplete="off"></td>
        
        <td><select name="item_name[]" id="productName_1" class="form-control item_unit"  required="required" onchange="showproduct(this.value)"
          style=" width: 100% !important;">
          <option value="">Select Item</option>
          <?php echo fill_unit_select_box($connect); ?></select>
        </td>
        
        <td><input type="text" name="item_desc[]" id="productDesc_1"class="form-control item_name" ></td>
        <td><input type="text" name="hsn[]" id="hsn_1" value="8443" class="form-control item_hsn" ></td>
        <td><input type="number" name="item_quantity[]" id="quantity_1" min="1" oninput="validity.valid||(value='');" class="form-control quantity" ></td>
        
        <td><input type="number" name="price[]" id="price_1" class="form-control price" required="required" autocomplete="off"></td>
         
              <td><input type="number" name="total[]" id="total_1" class="form-control total" autocomplete="off"></td>
              <td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td>
  </tr>
     </table>
  
              </div>
</br></br></br>
<hr>
      <div class="row"> 
        <div class="col-xs-10 col-sm-8 col-md-8 col-lg-8" style="padding-left: 50px;">
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





        <div class="col-xs-10 col-sm-4 col-md-4 col-lg-4" style="padding-left:50px; ">
      
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
                <input value="" type="number" class="form-control" name="taxRate" id="taxRate" placeholder="Tax Rate" required="required">
                <div class="input-group-addon">%</div>
              </div>
            </div>

            <div class="form-group">
              <label>Tax Amount: &nbsp;</label>
              <div class="input-group col-sm-10">
                <div class="input-group-addon currency"><i class="fa fa-fw fa-inr"></i></div>
                <input value="" type="number" class="form-control" name="taxAmount" id="taxAmount" placeholder="Tax Amount">
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
  html += '<td><select name="item_name[]" id="productName_'+count+'" class="form-control select2 item_unit" required="required" onchange="showproduct(this.value)" style="width:100% !important;"><option value="">Select Item</option><?php echo fill_unit_select_box($connect); ?></select></td>';


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


 // var productName = $('#productName_'+id).val();

 //    if(!'productName_'+id) {
 //      $(this).css({ 'background': 'red' });
 //    };


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
  dataType: 'JSON';

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
//strs = JSON.stringify(String(str));

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
