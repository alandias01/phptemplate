<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js" type="text/javascript"></script>

<style type="text/css">
	h1, h2, h3{font-family: Papyrus;}
	#cdal-topbanner	{	background-color: gray;	color:white;	width:100%;	height:4em;	}
	body{font-family:segoe ui;}	
	
	.cdal-form-txtbx{font-family: segoe ui; width: 15em; }
	.cdal-form-dropdown{font-family: segoe ui; width: 8em; height: 24px;}
	.cdal-form-checkbx	{vertical-align: bottom; width: 22px; height:22px;}
</style>

<script type="text/javascript">
var ctr=2;
$(function(){

	//Adds new column when button is pressed
	$('#cdal-form-btn-addcol').click(function(){
		$('#cdal-form-addcol').append('<br><br><input  class="cdal-form-txtbx" type="text" name="form-colname[]"> <select name="form-coltype[]" class="cdal-form-dropdown"><option value="varchar(100)">varchar(100)</option><option value="int">int</option></select>');
				
	});
	
	//Allows you to use enter key to add new column
	$("#cdal-form-addcol").keypress(function(event){
		
		if(event.which==13)
		{
			event.preventDefault();
			$("#cdal-form-btn-addcol").click();
			
			//When you press enter, cursor focuses on last textbox
			$('input:text').last().focus();
		}
	});
	
	//If Auto Increment is checked, column data type changes to int
	$("input[name='form-ispkeyautoincrement']").change(function(){
				
		if(this.checked)
		{
			$("#firstcolumn").val("int");			
		}
		
	});	
	
});


</script>

</head>
<body>
<div id="cdal-topbanner"><h1>Data access layer</h1></div>



<form action="" method="post">
	<table>
		<tr>
			<td>Name of Database</td><td><input type="text" name="form-dbname" value="mypage"></td>
		</tr>
		<tr>
			<td>IP Address</td><td><input type="text" name="form-ipaddr" value="127.0.0.1"></td>
		</tr>
		<tr>
			<td>Database username</td><td><input type="text" name="form-dbuser" value="root"></td>
		</tr>
		<tr>
			<td>Database Password</td><td><input type="password" name="form-dbpass"></td>
		</tr>
		<tr>
			<td>Table Name</td><td><input type="text" name="form-tbname"></td>
		</tr>
	
	
	</table>
		
	<div><br><button type="button" id="cdal-form-btn-addcol">Add Column</button> <span style="font-size:10px;">You can also press enter</span> </div>
	<div id="cdal-form-addcol">
	<br>
	
		<input  class="cdal-form-txtbx" type="text" name="form-colname[]" value="Id"> 
		<select id="firstcolumn" name="form-coltype[]" class="cdal-form-dropdown">
		<option value="int">int</option>
		<option value="varchar(100)">varchar(100)</option>
		
		</select>
		----Is Primary key<input class="cdal-form-checkbx" name="form-ispkey" type="checkbox" checked> 
		----auto increment<input class="cdal-form-checkbx" name="form-ispkeyautoincrement" type="checkbox" checked >
	
	
	</div>
	

	<br>	
	<input  type="submit" value="Go" name="form-submit">
</form>


</body>
</html>


<?php 
include 'ColumnObject.php';
include 'CodeGen.php';

if (isset($_POST['form-submit']))
{
	$i=1;
	foreach($_POST['form-colname'] as $colname)
	{
		if ($i==1)
		{
			$colobjlist[]=new ColumnObject($colname, "", $_POST['form-ispkey'], $_POST['form-ispkeyautoincrement']);
			$i++;
			
		}
		else 
		{
			$colobjlist[]=new ColumnObject($colname, "", null, null);
		}
	}
	
	$i=0;
	foreach ($_POST['form-coltype'] as $coltype)
	{
		$colobjlist[$i]->CType=$coltype;
		$i++;		
	}
	
	foreach ($colobjlist as $cc)
	{
		echo  $cc->CName." ".$cc->CType." ".$cc->isPKey." <br>";
	}
	
// 	echo "Database: ".$_POST['form-dbname']."<br>";
// 	echo "IP Address: ".$_POST['form-ipaddr']."<br>";
// 	echo "User: ".$_POST['form-dbuser']."<br>";
// 	echo "PW: ".$_POST['form-dbpass']."<br>";
// 	echo "Table: ".$_POST['form-tbname']."<br>";
	
	$cg=new CodeGen($_POST['form-dbname'], $_POST['form-ipaddr'], $_POST['form-dbuser'], $_POST['form-dbpass'], $_POST['form-tbname'], $colobjlist);
			
	$cg->CreateObjectFile();
	$cg->CreateDA();
	
 	
	
	
	
}




?>














