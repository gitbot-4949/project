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
    
    $result = mysqli_query($con, "SELECT char_length(gst) 'Type Users', count(char_length(gst)) 'Count' from client group by char_length(gst)");
    
    while($row = mysqli_fetch_array($result))
    {        
    	if($row['Type Users'] == 10)
    	{
    		$do='PAN';
    	}
    	else if ($row['Type Users'] == 12)
    	{
    		$do='Adhaar';
    	}
    	else
    	{
    		$do = 'GST';
    	}

        $point = array("label" => $do , "a" => $row['Count']);
        
        array_push($data_points, $point);        
    }
    
    echo json_encode($data_points, JSON_NUMERIC_CHECK);
}
mysqli_close($con);

?>

