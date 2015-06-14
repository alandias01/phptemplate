<?php
include("Data/MemberUser/MemberUserDA");


class Membership 
{		
	public $member;	
	public $UserDA;
		
	
	function __construct()
	{		
		$this->UserDA=new MemberUserDA();			
	}
	
	
	function Login($email, $password)
	{
		$email=($this->validate_email($email))?$email :die("Email is not in right format (login)");  //checks to make sure email is in proper format
		
		$password=md5($password); //encrypts the password
		
		$usr = $this->UserDA->LoadByEmailPW($email, $password);
		
		if(sizeof($usr)==1)
		{
			$this->member =$usr[0];	
			$_SESSION['email']=$email;			
			//header('Location: ../');
		}
		
		else 
		{
			echo "Incorrect User/Password";
		}
	}
	
	function LoadUserWithOutPW($email)
	{
		$email=($this->validate_email($email))?$email :die("Email is not in right format (loaduser)");  //checks to make sure email is in proper format
				
		$usr = $this->UserDA->LoadByEmail($email);
		
		if(sizeof($usr)==1)
		{
			$this->member =$usr[0];	
			$_SESSION['email']=$email;
			//header('Location: ../');
		}
	}
		
		
	function LogOut()
	{			
		$_SESSION = array();
		session_destroy();
		//header('location: ../index.php?status=logged.out');			
	}
				
	function Register($obj)
	{
		$email=($this->validate_email($obj->Email))?$email :die("Email is not in right format");
				
		$usr = $this->UserDA->LoadByEmail($email);
		
		if(sizeof($usr)>0)
		{
			die("User is taken");
		}		
		
		$obj->Password=md5($obj->Password);
		
		$this->UserDA->Insert($obj); 
						
		//header('Location: ../index.php?status=user.has.successfully.registered');	
	}
		
	function Update($obj, $password=NULL)
	{			
		$obj->Email=($this->validate_email($obj->Email))?$obj->Email :die("Email is not in right format");
		
		//If user doesn't update password, just store the current one
		if (is_null($password)) 
		{
			//$obj->Password=$this->member->Password;
		}	
		else 
		{
			$obj->Password=md5($password);			
		}

		
		$this->UserDA->Update($obj);
			
		//header('Location: ../index.php?status=user.has.successfully.registered');
	}
	
	function DeleteByEmail($email)
	{
		$this->UserDA->Delete($email);
		$this->logout();					
	}
	
	function validate_email($input_email)
	{
		$email_pattern = '/^[^@\s<&>]+@([-a-z0-9]+\.)+[a-z]{2,}$/i';
		if (preg_match($email_pattern, $input_email)) { return true;}
		else{return false;}
	}
		
	function MemberCheck()
	{		
		if(!isset($_SESSION['email']))
			{header('Location: index.php?reason=illegal.attempt.to.login');}
	}
	
	function DisplayAllUsers()  
	{
		echo "<select name=user style=width:300px;>";
					
		$AllUsers=$this->UserDA->LoadAll();
					
		foreach($AllUsers as $EachUser)
		{
			echo "<option value=".$EachUser->Email.">".$EachUser->FirstName."</option>";
		}
					
		echo "</select>";
	}
	
}


?>