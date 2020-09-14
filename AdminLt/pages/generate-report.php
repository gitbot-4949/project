<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();

$current_page="generate-report";

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
  line-height: 25px !important;
 
  
}
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include_once "header.php"; ?>
    
<?php include_once"navbar.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Manage Report
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="active">Manage Report</li>
      </ol>
    </section>

                          <?php 
                                 if(isset($_GET['submit']))
                                     {
                                        $_SESSION['query2']="";

                                        $search_query="";
                                        
                                      
                                      if($_GET['person'] == 'Previous Month' )
                                      {
                                       
                                       $search_query="";
                                        
                                        $_SESSION['query2']="";
                                        
                                        $search_query .= "select invtest2.invid 'Invoice No',invtest2.created 'Inv Date', client.c_name 'Client',substring_index(client.c_add, ',', -1) as location, client.gst 'GST',client.c_type 'C_type', invtest2.subtotal 'subtotal',invtest2.taxrate 'Taxrate',invtest2.taxamount 'taxamount',invtest2.totalamount 'totalamount' from invtest2 inner join client on invtest2.cid = client.cid WHERE YEAR(invtest2.created) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH) AND MONTH(invtest2.created) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)";
                                        
                                        $_SESSION['query2']=$search_query;
                                        
                                        }


                                     
                                      else if($_GET['person'] == 'Current Month')
                                      {
                                         $search_query = "";
                                       
                                       $_SESSION['query2'] = "";
                                        
                                        $search_query .= "select invtest2.invid 'Invoice No',invtest2.created 'Inv Date', client.c_name 'Client',substring_index(client.c_add, ',', -1) as location, client.gst 'GST',client.c_type 'C_type', invtest2.subtotal 'subtotal',invtest2.taxrate 'Taxrate',invtest2.taxamount 'taxamount',invtest2.totalamount 'totalamount' from invtest2 inner join client on invtest2.cid = client.cid WHERE MONTH(invtest2.created) = MONTH(CURRENT_DATE()) AND YEAR(invtest2.created) = YEAR(CURRENT_DATE())";

                                        $_SESSION['query2']=$search_query;
                                      }

    
                                     else if($_GET['person'] == 'Current Year')
                                      {
                                        if (date('m') > 3) {
                                        $year = date('Y')."-".(date('Y') +1);
                                        } 
                                        else {
                                        $year = (date('Y')-1)."-".date('Y');
                                        }
                                        //echo $year; // 2015-2016


                                        $startyear = substr($year, 0,4);

                                        //echo "\n<br>".$startyear;

                                          $endyear=substr($year,5,8);

                                          //echo "<br>".$endyear;

                                         $search_query="";
                                       
                                       $_SESSION['query2']="";
                                        
                                        $search_query .= "select invtest2.invid 'Invoice No',invtest2.created 'Inv Date', client.c_name 'Client',substring_index(client.c_add, ',', -1) as location, client.gst 'GST',client.c_type 'C_type', invtest2.subtotal 'subtotal',invtest2.taxrate 'Taxrate',invtest2.taxamount 'taxamount',invtest2.totalamount 'totalamount' from invtest2 inner join client on invtest2.cid = client.cid where invtest2.created between '$startyear-04-01' and '$endyear-03-31'";

                                        $_SESSION['query2']=$search_query;
                                      }
                                     



                                        $ret=mysqli_query($con,$search_query) or die("Eror:".mysqli_error($con));
  

                                       // echo $search_query;                           

                                        if(isset($_SESSION['query2']))
                                        {
                                        //echo $_SESSION['query2'];
                                         } 
                              
                                }
                               
                                 else
                               
                                {
                                  
                                if (date('m') > 3) {
                                        $year = date('Y')."-".(date('Y') +1);
                                        } 
                                        else {
                                        $year = (date('Y')-1)."-".date('Y');
                                        }
                                        //echo $year; // 2015-2016


                                        $startyear = substr($year, 0,4);

                                        //echo "\n<br>".$startyear;

                                          $endyear=substr($year,5,8);

                                          //echo "<br>".$endyear;


                                  $search_query="";
                            
                                  $search_query.="select invtest2.invid 'Invoice No',invtest2.created 'Inv Date', client.c_name 'Client',substring_index(client.c_add, ',', -1) as location, client.gst 'GST',client.c_type 'C_type', invtest2.subtotal 'subtotal',invtest2.taxrate 'Taxrate',invtest2.taxamount 'taxamount',invtest2.totalamount 'totalamount' from invtest2 inner join client on invtest2.cid = client.cid where invtest2.created between '$startyear-04-01' and '$endyear-03-31'";
                            

                                          $_SESSION['query2']="";
                                           $_SESSION['query2']=$search_query;  

                                           //echo $_SESSION['query2'];


                                  $ret=mysqli_query($con,$search_query);
                                }




?>


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
       
           
          <div class="box">
            <div class="box-header">
              <h3 class="box-title" style="padding-top: 10px;"> Filter Details</h3>
            </div>
           </br>

              <form method="GET" action="">
                          &nbsp;&nbsp;&nbsp;<b> Invoice Data </b> &nbsp;

                          <select name="person" class="form-control select2" style="width: 30%!important;">
                            <option value="">  </option>
                                                   
                            <option value="Previous Month"> Previous Month </option>
                            <option value="Current Month"> Current Month </option>
                            <option value="Current Year"> Current Year </option>
                  
                          </select>
                            &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <input type="submit" class="btn btn-success" name="submit">
                          </form>

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
            
                 <a href="excel2.php?query2=<?php echo $search_query; ?>"> <button class="btn btn-danger btn-xs pull-left" id="clickme" style="margin: 25px 70px 2px 20px; padding: 5px 5px 5px 5px;">
                       <i class="fa fa-fw fa-file-excel-o" ></i>&nbsp;Export </button></a>
  <br/><br/><br/>    

                  <!-- <button type="button" id="btnplus"class="btn btn-success btn-sm pull-right" style="margin: 20px 70px 2px 2px;" onclick="window.location.href = 'add-payhis.php'";><span class="glyphicon glyphicon-plus"></span></button></br></br> -->
                            <hr>

                              <thead>
                              <tr>
                                  <th>Inv no.</th>
                                  <th> Inv Date </th>
                                  <th> Client Name </th>
                                  <th> Location </th>
                                  <th> GST </th>
                                  <th>Type</th>
                                  <th>Subtotal</th>
                                  <th>Taxrate</th>
                                  <th>Taxamount</th>
                                  <th> Total </th>
                               </tr>
                              </thead>
                              <tbody>
                            <?php    
                              
                                  

                                $d=mysqli_num_rows($ret);
                                
                                if($d == 0)
                                             {
                                              $nodata="No Records Found";                                              
                                            }                  



              
                while($row=mysqli_fetch_array($ret))
                {?>
                              <tr>
                              <td><?php echo $row['Invoice No']?></td>
                                  <td><?php echo $row['Inv Date'];?></td>
                                  <td>&nbsp;<?php echo $row['Client'];?></td>
                                  <td>&nbsp;<?php echo $row['location'];?></td>
                                  <td>&nbsp;<?php echo $row['GST'];?></td> 
                                   <td>&nbsp;<?php echo $row['C_type'];?></td>
                                    <td>&nbsp;<?php echo $row['subtotal'];?></td> 
                                     <td>&nbsp;<?php echo $row['Taxrate'];?></td>  
                                     <td>&nbsp;<?php echo $row['taxamount'];?></td>
                                     <td>&nbsp;<?php echo $row['totalamount'];?></td>    
                                   <!-- <td>&nbsp;<?php 
                                    $c=date("d-M-Y",strtotime($row['date']));
                                        echo $c;
                                  ?></td> -->                                    
                                   
                              
                              </tr>
                            <?php } ?>
                              
                                                         
                              </tbody>
                <tfoot>
                <tr>
                  <th>Inv no.</th>
                                  <th> Inv Date </th>
                                  <th> Client Name </th>
                                  <th> Location </th>
                                  <th> GST </th>
                                  <th>Type</th>
                                  <th>Subtotal</th>
                                  <th>Taxrate</th>
                                  <th>Taxamount</th>
                                  <th> Total </th>
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

  <?php include_once "settings.php";?>
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
 
</body>
</html>
