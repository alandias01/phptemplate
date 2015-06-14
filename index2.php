<?php
session_start();
include ("Data/MemberUser/Membership.php");
include ("Data/MemberUser/MemberUserDA.php");
include 'Data/VocabListDA.php';
include("Utils/LogMe.php");
include 'Data/CodeGen.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>	
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<title>Alan Book</title>					
				  		
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
	    		
		<script type="text/javascript" src="css_j/jq.js"></script>
		<!-- <link rel="stylesheet" type="text/css" href="css_j/global.css" /> -->
		
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.11/angular.min.js"></script>
		
	<link rel="stylesheet" type="text/css" href="css_j/menutop.css" />
		
	</head>
<body>

<?php
//  $f=new CodeGen();

// $f->CreateObjectFile();
// $f->CreateDA();


// $m=new membership();
// $u=new  MemberUserObject();


#Register user
// $u->Email="b@b.com"; $u->Password="b"; $u->FirstName="barry"; $m->register($u);
// $u->Email="c@c.com"; $u->Password="c"; $u->FirstName="Carry"; $m->register($u);

#Login User
// $m->Login("c@c.com", "d"); echo $m->member->FirstName." Logged In<br>";
// $m->Login("c@c.com", "c"); echo $m->member->FirstName." Logged In<br>";

#Update User
// $pw="d"; $m->member->LastName="Dias"; echo $m->member->Email." Member Email<br>"; $m->Update($m->member,$pw);

//Delete User
// $m->DeleteByEmail("c@c.com");

#checks if user is logged in



echo $_SESSION['email']." Session ID<br>";

//!isset($_SESSION['email'])


?>
	
</body>

</html>


