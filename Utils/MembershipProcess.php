<?php
session_start();
include("object.php");
$user=new membership;

if(isset($_GET['login']))
	{
		if ( ($_POST['email']=="") || ($_POST['pass']==""))
		header('Location: ../index.php?reject=no.email.or.password');
		
		if($_GET['login']=="y")
		{
			$email=$_POST['email']; $pass=$_POST['pass']; $pass=mysql_real_escape_string($pass, $user->mydb->connection());
			$user->login($email,$pass );
		}
	}

	
if(isset($_GET['logout']))
	{
		if($_GET['logout']=="y")
		{			
			$user->logout();
		}
	}

if(isset($_GET['register']))
	{
		if($_GET['register']=="y")
		{			
			
			$email=$_POST['email'];
			$password=$_POST['password'];$password=mysql_real_escape_string($password, $user->mydb->connection());
			$fname=$_POST['fname'];
			$lname=$_POST['lname'];
			$school=$_POST['school'];
			$state=$_POST['state'];
			$user->register($email,$password,$fname,$lname,$school,$state);
			
			
		}
	}

	if(isset($_GET['update']))
	{
		if($_GET['update']=="account")
		{			
			
			$email=$_POST['email'];
			$password=$_POST['password'];
			$fname=$_POST['fname'];
			$lname=$_POST['lname'];
			$gender=$_POST['gender'];
			$relationship=$_POST['relationship'];
			$birthday=($_POST['birthday']=="")? "0-0-0":$_POST['birthday'];
			$school=$_POST['school'];
			$state=$_POST['state'];
			$user->update($email,$password,$fname,$lname,$gender,$relationship,$birthday,$school,$state); 
			
			
		}
	}	
	
	
	
	if(isset($_GET['remove']))
	{
		//include("index.php");
		if($_GET['remove']=="user")
		{
			$user->del_account($user->email);  //put users email here
		}
		
	}



?>