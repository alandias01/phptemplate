<?php
session_start();
include ("Data/MemberUser/Membership.php");
include ("Data/MemberUser/MemberUserDA.php");
include("Utils/LogMe.php");
?>

<!DOCTYPE html>
<html>
	<head>	
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<title>Alan Book</title>					
		
		<!-- <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> -->
  		
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
   		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js" type="text/javascript"></script>
  		
		<!--  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />  -->
		
		<!--Wijmo Theme  -->
	    <link href="http://cdn.wijmo.com/themes/metro/jquery-wijmo.css" rel="stylesheet" type="text/css" title="rocket-jqueryui" />
	
	    <!--Wijmo Widgets CSS -->
	    <link href="http://cdn.wijmo.com/jquery.wijmo-complete.all.2.1.0.min.css" rel="stylesheet" type="text/css" /> 
	
	    <!--Wijmo Widgets JavaScript-->
	    <script src="http://cdn.wijmo.com/jquery.wijmo-open.all.2.1.0.min.js" type="text/javascript"></script> 
	    <script src="http://cdn.wijmo.com/jquery.wijmo-complete.all.2.1.0.min.js" type="text/javascript"></script>

	    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.11/angular.min.js"></script>
	    
		<!-- <link rel="stylesheet" type="text/css" href="css_j/global.css" /> -->
		
	<link rel="stylesheet" type="text/css" href="css_j/menutop.css" />
		<title>Test page</title>
	</head>
<body>

	

<?php

// include("jquery.php");

$user = new Membership();
#$user->login("abc@c.com", "abc");
#$user->logout();

if (isset($_GET['logout'])) {
	$user->logout();
	include ("visitorpage.php");
}
else if (isset ($_SESSION['email']) || isset($_GET['login'])) {
	include ("memberpage.php");
} 

else {
	include ("visitorpage.php");
}
?>
	
</body>

</html>

























