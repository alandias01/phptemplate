<html>
<head>
<link rel="stylesheet" type="text/css" href="c.css" />
<script src="j.js"></script> 
<script src="ajax.js"></script> 
</head>
<body></body></html>



<?php

// Fill up array with names
include("connect.php");
$result = mysql_query("SELECT * FROM ss_nak");      //1. Pick your table 
$ii=0;
while($row = mysql_fetch_array($result))
{
	
	$a[$ii]=$row['nak_code']; //2. Pick which row you want to autocomplete
	//$b[$ii]=$row['nak_message'];
	$ii++;
}
mysql_close($con);



//get the q parameter from URL
$q=$_POST["q"];
//lookup all hints from array if length of q>0


if (strlen($q) > 0)
{
$hint="";
for($i=0; $i<count($a); $i++)
  {
  if (strtolower($q)==strtolower(substr($a[$i],0,strlen($q))))
    {
    if ($hint=="")
      {
      $hint="<a href=# onClick=document.getElementById('txt1').value='$a[$i]'>$a[$i]</a>";
      }
    else
      {
    	//$hint=$hint."<br>".$a[$i];
    	$hint=$hint."<br>". "<a href=# onClick=document.getElementById('txt1').value='$a[$i]'>$a[$i]</a>";
      }
    }
  }
}


//Use inside <tr> class='off' onmouseover=this.className='on' onmouseout=this.className='off'


//Set output to "no suggestion" if no hint were found
//or to the correct values
if ($hint == "")
{
$response="no suggestion";
}
else
{
$response=$hint;
}

//output the response
echo $response;

?>
