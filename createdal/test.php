<?php
include("./test1BizObjects/tb1/tb1DA.php");
echo "hi";
$d=new tb1DA();
//$d->CreateTable();

$data=$d->LoadAll();

foreach($data as $t)
{
	echo $t->word."<br>";
}

?>