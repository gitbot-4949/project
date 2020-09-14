<?php

session_start();


/*******EDIT LINES 3-8*******/
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'loginsystem');

$filename = "Sales ".date('m-Y');

$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

$file_ending = "xls";

//echo $_GET['query'];

$sql =$_GET['query2'];

//echo $sql;

$result = mysqli_query($con,$sql) or die("Couldn't execute query:<br>" . mysqli_error($con). "<br>" . mysqli_errno($con));    



//header info for browser
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=$filename.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");
/*******Start of Formatting for Excel*******/   
//define separator (defines columns in excel & tabs in word)
$sep = "\t"; //tabbed character
//start of printing column names as names of MySQL fields
while ($property = mysqli_fetch_field($result)) {
    echo $property->name."\t";
}
print("\n");    
//end of printing column names  
//start while loop to get data
//echo mysqli_num_rows($result);


    while($row = mysqli_fetch_array($result))
    {
        $schema_insert = "";
        for($j=0; $j<mysqli_num_fields($result);$j++)
        {
            if(!isset($row[$j]))
                $schema_insert .= "".$sep;
            elseif ($row[$j] != "")
                $schema_insert .= "$row[$j]".$sep;
            else
                $schema_insert .= "".$sep;
        }
        $schema_insert = str_replace($sep."$", "", $schema_insert);
        $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
        $schema_insert .= "\t";
        print(trim($schema_insert));
        print "\n";
    } 



unset($_SESSION['query2']);


?>