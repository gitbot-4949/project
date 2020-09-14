<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();

$current_page='manage-invoice';
$current_page1="manage-prolist"



?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Advanced form elements</title>
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
        Proforma Invoice List
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Proforma Invoice List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
              <h3 class="box-title" style="padding-top: 10px;">Proforma Invoice Search </h3>
            </div>
          </br>

            <form action="" method="GET">
             &nbsp;&nbsp;&nbsp; <b> Client Name </b> &nbsp;

                          <select name="client" class="form-control select2" style="height:32px;width:30%;border-radius:0px;">
                            <option> </option>
                          <?php $ret=mysqli_query($con,"select c_name from client");
                $cnt=1;
                if(mysqli_num_rows($ret)==0)
                {
                  echo "No Records Found";
                }
                while($row=mysqli_fetch_array($ret))
                { ?>

                          
                            <option value="<?php echo $row['c_name'];?>"> <?php echo $row['c_name']; ?> </option>

                            <?php } ?> 
                          </select>

                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b> Year </b> &nbsp;
   
                         <select name="year" class="form-control select2" style="height:32px;width:20%;border-radius:0px;" >
                            <option> Year</option>
                          <?php $yr =mysqli_query($con,"SELECT CASE WHEN MONTH(created)>=4 THEN concat(YEAR(created), '-',YEAR(created)+1) ELSE concat(YEAR(created)-1,'-', YEAR(created)) END AS financial_year FROM protest2 GROUP BY financial_year");
                $cnt=1;
                if(mysqli_num_rows($yr)==0)
                {
                  echo "No Records Found";
                }
                while($row=mysqli_fetch_array($yr))
                { ?>

                          
                            <option value="<?php echo $row['financial_year'];?>"> <?php echo $row['financial_year']; ?> </option>

                            <?php } ?> 
                          </select>

                            &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <input type="submit" class="btn btn-success" name="submit">
                          </form></br>
</br>

</div></div></div>



      <div class="row">
                    
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                            
          
           <?php 

    
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


        if(isset($_GET['submit']))
        {
          if($_GET['client'] != null){
              $val=$_GET['client'];

              $gval=mysqli_query($con,"select cid from client where c_name='$val'");

              $cs=mysqli_fetch_array($gval);
                          
              $ds=$cs[0];            
                          $ret2=mysqli_query($con,"SELECT protest2.invid,client.c_name,substring_index(c_add, ',', -1) as location, protest2.totalamount, protest2.created FROM `protest2` INNER join client on protest2.cid=client.cid where client.cid='$ds' order by invid desc")or die("Error: " . mysqli_error($con));
                        

                          // echo "SELECT protest2.invid,client.c_name,substring_index(c_add, ',', -1) as location, protest2.totalamount, protest2.created FROM `protest2` INNER join client on protest2.cid=client.cid where client.cid='$ds' order by invid desc";

                        }


             
             else if(isset($_GET['year']))
             {
              if($_GET['year'] != null)
              {

              $year=$_GET['year'];
              $startyear = substr($year, 0,4);
              $endyear=substr($year,5,8);


              $ret2=mysqli_query($con,"SELECT protest2.invid,client.c_name,substring_index(c_add, ',', -1) as location, protest2.totalamount, protest2.created FROM `protest2` INNER join client on protest2.cid=client.cid where protest2.created between '$startyear-04-01' and '$endyear-03-31' order by invid desc") or die("Error: " . mysqli_error($con)); 


             // echo  "\n <br> SELECT protest2.invid,client.c_name,substring_index(c_add, ',', -1) as location, protest2.totalamount, protest2.created FROM `protest2` INNER join client on protest2.cid=client.cid where protest2.created between '$startyear-04-01' and '$endyear-03-31' order by invid desc";

            }
             }

             elseif (($_GET['client'] != "") && ($_GET['year'] != "")) {


               $val=$_GET['client'];

              $gval=mysqli_query($con,"select cid from client where c_name='$val'");

              $cs=mysqli_fetch_array($gval);
                          
              $ds=$cs[0];   

               $year=$_GET['year'];
              $startyear = substr($year, 0,4);
              $endyear=substr($year,5,8);

              $ret2=mysqli_query($con,"SELECT protest2.invid,client.c_name,substring_index(c_add, ',', -1) as location, protest2.totalamount, protest2.created FROM `protest2` INNER join client on protest2.cid=client.cid where client.c_name= '$ds' and protest2.created between '$startyear-04-01' and '$endyear-03-31' order by invid desc") or die("Error: " . mysqli_error($con)); 
               

             // echo   "SELECT protest2.invid,client.c_name,substring_index(c_add, ',', -1) as location, protest2.totalamount, protest2.created FROM `protest2` INNER join client on protest2.cid=client.cid where client.c_name= '$ds' and protest2.created between '$startyear-04-01' and '$endyear-03-31' order by invid desc";
             }
}

                          else
                          {
                            $ret2=mysqli_query($con,"SELECT protest2.invid,client.c_name,substring_index(c_add, ',', -1) as location, protest2.totalamount, protest2.created FROM `protest2` INNER join client on protest2.cid=client.cid where protest2.created between '$startyear-04-01' and '$endyear-03-31' order by invid desc")or die("Error: " . mysqli_error($con));

// echo "SELECT protest2.invid,client.c_name,substring_index(c_add, ',', -1) as location, protest2.totalamount, protest2.created FROM `protest2` INNER join client on protest2.cid=client.cid where protest2.created between '$startyear-04-01' and '$endyear-03-31' order by invid desc";
                          }

                        
                          if(mysqli_num_rows($ret2)==0)
                                             {?>
                                              <div align="center">
                                              <font color='red' align='center'>No Records Found </font>       </div>                                       
                                           <?php  }                  


              


                          $cnt=1;
                          $x=1;
                while($row=mysqli_fetch_array($ret2))
                  {?>
                              <?php 
                              if($x % 3 == 0) echo "<tr>";
                                 $x++;  ?>
                                  
                                  <a href="proformainv.php?inv=<?php echo $row['invid']; ?>" target="_blank">
                                  <div class="col-md-4" id="example1">
                                    <div class="box box-info">
                                            
                                            <div class="box-header">
                                               <h3 class="box-title"> <?php $id = $row['invid'];
                                      echo $id;?>  </h3> </div>

                                      <div class="box-body">
                                          <div class="form-group">
                                      <strong><p align="center" style="color:black;"><?php echo $row['c_name']; ?></p></strong>
                                      <p align="center"><strong>Location:</strong> <?php echo $row['location'];?>  </p>
                                      <p align="center"><strong> Total Bill:</strong> <?php echo $row['totalamount'];?></p>
                                      <p align="center"><strong> Created: </strong>
                                        <?php 
                                      
                                        $c=date("d-M-Y",strtotime($row['created']));
                                        echo $c;
                                         ?></p></a>
                                       </br> 
                                     <a href="edittest2.php?invid=<?php echo $row['invid'];?>"> 
                                     <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>

                                     <a class="btn btn-danger btn-xs pull-right" id="delete_product" data-id="<?php echo $id; ?>" ><i class="fa fa-trash-o "></i></a>
                                  </div> 
                                </div>

                              </div></div> 
                              <?php $cnt=$cnt+1; }?>
                            </table>
                            </div></div>
                        
                     
  </div>
</div>  
</section>

<?php include_once"footer.php";?>
<?php include_once"settings.php";?>



<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2({
       placeholder: "Select a Person or Company",
    allowClear: true
    });

  });

  
</script>
<script>
  $(document).ready(function(){
    
    //readProducts(); /* it will load products when document loads */
    
    $(document).on('click', '#delete_product', function(e){
      
      var productId = $(this).data('id');
      SwalDelete(productId);
      e.preventDefault();
      console.log(productId);
    });
    
  });
  
  function SwalDelete(productId){
    
    swal({
      title: 'Are you sure?',
      text: "It will be deleted permanently!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!',
      showLoaderOnConfirm: true,
        
      preConfirm: function() {
        return new Promise(function(resolve) {
             
           $.ajax({
            url: 'delete pro.php',
            type: 'GET',
              data: 'delete='+productId,
              dataType: 'json'
           })
           .done(function(response){
            swal('Deleted!', response.message, response.status);
          readProducts();
           })
           .fail(function(){
            swal('Oops...', 'Something went wrong with ajax !', 'error');
           });
        });
        },
      allowOutsideClick: false        
    }); 
    
  }
  
  function readProducts(){
    setTimeout(function(){
            window.location.href = 'proforma-list.php';
         }, 3000);
    //$('#load-products').load('manage-clients.php'); 
  }
  
</script>

</body>
</html>
