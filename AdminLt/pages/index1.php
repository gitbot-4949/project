<?php

session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();

$neworder=mysqli_query($con,"SELECT count(invid) FROM invtest2 WHERE MONTH(created) = MONTH(CURRENT_DATE())");

$val=mysqli_fetch_array($neworder);



$bouncerate=mysqli_query($con,"SELECT count(invid) FROM invtest2 WHERE YEAR(created) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH)
AND MONTH(created) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)");

$getval=mysqli_fetch_array($bouncerate);

$val2=$val[0]-$getval[0];



$newclients=mysqli_query($con,"SELECT count(c_name) FROM client WHERE MONTH(created) = MONTH(CURRENT_DATE())");
$val3=mysqli_fetch_array($newclients);


$total=mysqli_query($con,"SELECT sum(totalamount) FROM invtest2 WHERE MONTH(created) = MONTH(CURRENT_DATE())");

$val4=mysqli_fetch_array($total);

$current_page="index1";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  
  <!-- Morris chart -->
  <link rel="stylesheet" href="../bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
 
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="../https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="../https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans);

@keyframes bake-pie {
  from {
    transform: rotate(0deg) translate3d(0,0,0);
  }
}
  

.pieID {
  display: inline-block;
  vertical-align: top;
}
.pie {
  height: 200px;
  width: 200px;
  position: relative;
  margin: 90px 0px 54px -116px;
}
.pie::before {
  content: "";
  display: block;
  position: absolute;
  z-index: 1;
  width: 100px;
  height: 100px;
  background: #EEE;
  border-radius: 50%;
  top: 50px;
  left: 50px;
}
.pie::after {
  content: "";
  display: block;
  width: 120px;
  height: 2px;
  background: rgba(0,0,0,0.1);
  border-radius: 50%;
  box-shadow: 0 0 3px 4px rgba(0,0,0,0.1);
  margin: 150px auto;
  
}
.slice {
  position: absolute;
  width: 200px;
  height: 200px;
  clip: rect(0px, 200px, 200px, 100px);
  animation: bake-pie 1s;
}
.slice span {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  background-color: black;
  width: 200px;
  height: 200px;
  border-radius: 50%;
  clip: rect(0px, 200px, 200px, 100px);
}
.legend {
  list-style-type: none;
  padding: 0;
  margin: 100px 30px 30px 80px;
  background: #FFF;
  padding: 15px;
  font-size: 13px;
  box-shadow: 1px 1px 0 #DDD,
              2px 2px 0 #BBB;
}
.legend li {
  width: 110px;
  height: 1.25em;
  margin-bottom: 0.7em;
  padding-left: 0.5em;
  border-left: 1.25em solid black;
}
.legend em {
  font-style: normal;
}
.legend span {
  float: right;
}

  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

 <?php include_once"header.php";?>

  <?php include_once"navbar.php";?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
  
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $val[0]; ?></h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $val2; ?><sup style="font-size: 20px">%</sup></h3>

              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $val3[0]; ?></h3>

              <p>Clients Registered</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $val4[0]."Rs"; ?></h3>

              <p>Turnover of <?php echo date('M') ?></p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.first row -->


      <!-- Main row -->
      
    
          <div class="row">
        <div class="col-md-6 box-body">
          
          <!-- BAR CHART -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Turn Over Chart Of Year <?php echo "".date('Y'); ?></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="bar-chart" style="height: 300px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
            <!-- /.box -->
        </div>          

      <div class="col-md-6 box-body box-body">  
           <!-- BAR CHART -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">GST Collection Chart Of Year <?php echo "".date('Y'); ?></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="bar-chart2" style="height: 300px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
  </div>
      
        <!-- /.col (RIGHT) -->
      </div>
      <!-- /.row (main row) -->
<?php 
  $any=mysqli_query($con,"select char_length(gst) 'Type', count(char_length(gst)) 'Count' from client group by char_length(gst)");

  while($row=mysqli_fetch_array($any))
  {
    if($row['Type'] == 15)
    {
      $gst=$row['Count'];
    }
    else if($row['Type'] == 12)
    {
      $adhaar=$row['Count'];
    }
    else
    {
      $pan=$row['Count'];
    }
  }

?>

        <div class="row">
        
        <div class="col-md-6">
          
          <!-- BAR CHART -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Client Type &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h3>

              <div class="pieID pie">

               </div>

    <ul class="pieID legend">
      <li>
        <em>GST</em>
        <span><?php echo $gst; ?></span>
      </li>
      <li>
        <em>Adhaar </em>
        <span><?php echo $adhaar; ?></span>
      </li>
      
 
      <li>
        <em>Pan</em>
        <span><?php echo $pan; ?></span>
      </li>
    </ul>

            </div>
          </div>

</div>
<?php

$val=mysqli_query($con,"SELECT item_name, COUNT(item_name) 'sold' FROM invtest GROUP BY item_name order by sold desc limit 6") or die("Error".mysqli_error($con));

 ?>

<div class="col-md-6">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Max Items Sold</h3>
            </div>
            <!-- /.box-header -->
           
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Task</th>
                  <th>Progress</th>
                  <th style="width: 40px">Label</th>
                </tr>
<?php 
$cnt=0;
while($row=mysqli_fetch_array($val))
{
  $cnt++;
?>

                <tr>
                  <td><?php echo $cnt; ?></td>
                  <td><?php echo $row['item_name']; ?></td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-<?php 
                      if($cnt == 1){
                        echo "yellow";
                      }
                      else if($cnt == 2){
                        echo "primary";
                      }
                      else if($cnt == 3)
                      {
                        echo "info";
                      }
                      else if($cnt == 4)
                      {
                        echo "danger";
                      }
                      else if($cnt == 5)
                      {
                        echo "success";
                      }
                      else{
                        echo "warning";
                      }
                       ?>" style="width: <?php echo $row['sold']."%"; ?>"></div>
                      }
                      }
                      }
                      }
                      
                    </div>
                  </td>
                  <td><span class="badge bg-<?php 
                  if($cnt == 1){
                        echo "yellow";
                      }
                      else if($cnt == 2){
                        echo "primary";
                      }
                      else if($cnt == 3)
                      {
                        echo "light-blue";
                      }
                      else if($cnt == 4)
                      {
                        echo "red";
                      }
                      else if($cnt == 5)
                      {
                        echo "green";
                      }
                      else{
                        echo "orange";
                      }

                  ?>"><?php echo $row['sold']; ?></span></td>
                </tr>
              <?php } ?>
                
                
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>
          <!-- /.box -->
</div>
</div>



    </section>
    <!-- /.content -->
  </div>
  <?php include_once"footer.php";?>

 <?php include_once"settings.php"; ?>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../bower_components/raphael/raphael.min.js"></script>
<script src="../bower_components/morris.js/morris.min.js"></script>


<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="../../dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>


<?php

//header('Content-Type: application/json');

$con = mysqli_connect("127.0.0.1","root","","loginsystem");

// Check connection
if (mysqli_connect_errno($con))
{
    echo "Failed to connect to DataBase: " . mysqli_connect_error();
}else
{
    $data_points = array();
    
    $result = mysqli_query($con, "select date_format(created,'%b') 'Months',sum(totalamount) 'Turnover' from invtest2 WHERE YEAR(created) = YEAR(CURDATE()) group by year(created),month(created) order by year(created),month(created)") or die("Error:".mysqli_error($con));
    
    while($row = mysqli_fetch_array($result))
    {        
        $point = array("y" => $row['Months'] , "a" => $row['Turnover']);
        
        array_push($data_points, $point);        
    }
    
   // echo json_encode($data_points, JSON_NUMERIC_CHECK);
}
mysqli_close($con);

?>

<script>
  $(function () {
    "use strict";

 $.post("index1.php",
                function (data)
                {
                    console.log(data);
                     var item_name = [];
                    var sold = [];

                    for (var i in data) {
                        item_name.push(data[i].months);
                        sold.push(data[i].turnover);
                    }



    //BAR CHART
    var bar = new Morris.Bar({
      element: 'bar-chart',
      resize: true,
      data:JSON.parse('<?php echo json_encode($data_points, JSON_NUMERIC_CHECK); ?>'), 
      barColors: ['#00a65a', '#f56954'],
      xkey: 'y',
      ykeys: ['a'],
      labels: ['Turnover'],
      hideHover: 'auto',
      xLabelAngle: 60,
      gridTextWeight:'Bold'
    });
  });

});
</script>

<?php

//header('Content-Type: application/json');

$con = mysqli_connect("127.0.0.1","root","","loginsystem");

// Check connection
if (mysqli_connect_errno($con))
{
    echo "Failed to connect to DataBase: " . mysqli_connect_error();
}else
{
    $data_points = array();
    
    $result = mysqli_query($con, "select date_format(created,'%b') 'Months',sum(taxamount) 'Tax Collected' from invtest2 WHERE YEAR(created) = YEAR(CURDATE()) group by year(created),month(created) order by year(created),month(created) ");
    
    while($row = mysqli_fetch_array($result))
    {        
        $point = array("y" => $row['Months'] , "a" => $row['Tax Collected']);
        
        array_push($data_points, $point);        
    }
    
    //echo json_encode($data_points, JSON_NUMERIC_CHECK);
}
mysqli_close($con);

?>
<script>
  $(function () {
    "use strict";

 $.post("index1.php",
                function (data)
                {
                    console.log(data);
                     var item_name = [];
                    var sold = [];

                    for (var i in data) {
                        item_name.push(data[i].months);
                        sold.push(data[i].taxamount);
                    }



    //BAR CHART
    var bar = new Morris.Bar({
      element: 'bar-chart2',
      resize: true,
      data:JSON.parse('<?php echo json_encode($data_points, JSON_NUMERIC_CHECK); ?>'), 
      barColors: ['#f39c12'],
      xkey: 'y',
      ykeys: ['a'],
      labels: ['Tax Amount'],
      hideHover: 'auto',
      xLabelAngle: 60,
      //gridTextSize: '14px',
      gridTextWeight:'Bold'
    });
  });

});
</script>

<script>
  function sliceSize(dataNum, dataTotal) {
  return (dataNum / dataTotal) * 360;
}
function addSlice(sliceSize, pieElement, offset, sliceID, color) {
  $(pieElement).append("<div class='slice "+sliceID+"'><span></span></div>");
  var offset = offset - 1;
  var sizeRotation = -179 + sliceSize;
  $("."+sliceID).css({
    "transform": "rotate("+offset+"deg) translate3d(0,0,0)"
  });
  $("."+sliceID+" span").css({
    "transform"       : "rotate("+sizeRotation+"deg) translate3d(0,0,0)",
    "background-color": color
  });
}
function iterateSlices(sliceSize, pieElement, offset, dataCount, sliceCount, color) {
  var sliceID = "s"+dataCount+"-"+sliceCount;
  var maxSize = 179;
  if(sliceSize<=maxSize) {
    addSlice(sliceSize, pieElement, offset, sliceID, color);
  } else {
    addSlice(maxSize, pieElement, offset, sliceID, color);
    iterateSlices(sliceSize-maxSize, pieElement, offset+maxSize, dataCount, sliceCount+1, color);
  }
}
function createPie(dataElement, pieElement) {
  var listData = [];
  $(dataElement+" span").each(function() {
    listData.push(Number($(this).html()));
  });
  var listTotal = 0;
  for(var i=0; i<listData.length; i++) {
    listTotal += listData[i];
  }
  var offset = 0;
  var color = [
    "cornflowerblue", 
    "olivedrab", 
    "orange", 
    "tomato", 
    "crimson", 
    "purple", 
    "turquoise", 
    "forestgreen", 
    "navy", 
    "gray"
  ];
  for(var i=0; i<listData.length; i++) {
    var size = sliceSize(listData[i], listTotal);
    iterateSlices(size, pieElement, offset, i, 0, color[i]);
    $(dataElement+" li:nth-child("+(i+1)+")").css("border-color", color[i]);
    offset += size;
  }
}
createPie(".pieID.legend", ".pieID.pie");

</script>

</body>
</html>
