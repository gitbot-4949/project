<?php


   $x = 40;
$longString = ' A 4/1 Suryanagar Soc., Jawahar chowk, 
  Maninagar, Ahmedabad- 380008';
  
$lines = explode("\n", wordwrap($longString, $x));

echo count($lines);

//var_dump($lines);

for($num = 0; $num < count($lines); $num += 1){ 
    echo  $lines[$num]. "\n <br>";

     $data[$num]=$lines[$num];
} 


for($num=0;$num<count($lines);$num++)
{
	echo $data[$num]."<br>";
}

if($data[0] != null)
{
	echo $data[0];
}

?>