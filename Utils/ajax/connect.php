<?php
$con = mysql_connect("localhost","root","nsxr");

if (!$con)
{
	die('Could not connect: ' . mysql_error());
}



mysql_select_db("sf", $con);

?>