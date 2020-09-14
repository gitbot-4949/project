<?php

header('Content-Type: application/json');

$con = mysqli_connect("127.0.0.1","root","","loginsystem");

// Check connection
if (mysqli_connect_errno($con))
{
    echo "Failed to connect to DataBase: " . mysqli_connect_error();
}else
{
    $data_points = array();
    
    $result = mysqli_query($con, "select date_format(created,'%M') 'Months',sum(totalamount) 'Turnover' from invtest2 group by year(created),month(created) order by year(created),month(created)");
    
    while($row = mysqli_fetch_array($result))
    {        
        $point = array("y" => $row['Months'] , "a" => $row['Turnover']);
        
        array_push($data_points, $point);        
    }
    
    echo json_encode($data_points, JSON_NUMERIC_CHECK);
}
mysqli_close($con);

?>

