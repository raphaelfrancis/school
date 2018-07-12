<html>
<head><h1><center>VIEW DATA</center></h1></head>
<body>
<?php
$student=array(array("name"=>"alex","age"=>20),array("address"=>"thrissur","state"=>"state"));
print_r($student);
$cars = array(
    array("Honda Accord", "V6", 30000),
    array("Toyota Camry", "LE", 24000),
    array("Nissan Altima", "V1"),
);

for($i=0;$i<=count($cars);$i++)
{
    for($j=0;$j<count($cars[$i]);$j++)
    {
		echo $cars[$i][$j] . "<br>";
	}
	echo "<br>";
}
$newdata = array("name"=>'alex',"age"=>30,"address"=>"cochin");

$newdata["results"]["marks"] = 30;
$newdata["results"]["rank"] = 3;

print_r($newdata);
?>
</body>
</html>