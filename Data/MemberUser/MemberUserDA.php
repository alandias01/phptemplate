<?php 

include("MemberUserObject.php");

class MemberUserDA
{
	private $conn="mysql:host=127.0.0.1;dbname=alantest;port=3307";
	private $user="root";
	private $pw="nsxr";
	
	private $table="MemberUser";
	
	function CreateTable()
	{
		$sql="create table MemberUser(
			      Email varchar(100) not null primary key
				 ,Password varchar(100)
				 ,FirstName varchar(100)
				 ,LastName varchar(100)
				 ,Gender varchar(10)
				 ,Address varchar(100)
				 ,State varchar(100)
				 ,ZipCode varchar(100)
				 ,School varchar(100)
				 ,Relationship varchar(100)
				 ,Birthday varchar(100)
				 ,AboutMe varchar(300)
					);";
		
		try
		{
			$dbh=new PDO($this->conn ,$this->user, $this->pw);
			$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	
			$sth=$dbh->prepare($sql);
			$sth->execute();
		}		
		catch (PDOException $ex)
		{
			LogMe::LogMsg($ex->getMessage());
			echo $ex->getMessage();
		}
	
	}
	
	function LoadAll()
	{
		try
		{
			$dbh=new PDO($this->conn ,$this->user, $this->pw);
			$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				
			$sth=$dbh->prepare("select * from $this->table");
			$sth->execute();
				
			while ($row=$sth->fetch(PDO::FETCH_ASSOC))
			{
				$results[]=new MemberUserObject($row);
			}
				
			return $results;
		
		}
		catch (PDOException $ex)
		{
			//LogMe::LogMsg($ex->getMessage());
			echo $ex->getMessage();
		}
	
	}
	
	
	function LoadByEmailPW($email, $pw)
	{		
		try
		{
			$dbh=new PDO($this->conn ,$this->user, $this->pw);
			$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				
			$sth=$dbh->prepare("select * from $this->table where Email=? and Password=?");
			$sth->execute(array($email,$pw));
				
			while ($row=$sth->fetch(PDO::FETCH_ASSOC))
			{
				$results[]=new MemberUserObject($row);
			}
				
			return $results;
	
		}
		catch (PDOException $ex)
		{
			LogMe::LogMsg($ex->getMessage());
			echo $ex->getMessage();
		}
	}
	
	function LoadByEmail($email)
	{
		try
		{
			$dbh=new PDO($this->conn ,$this->user, $this->pw);
			$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				
			$sth=$dbh->prepare("select * from $this->table where Email=?");
			$sth->execute(array($email));
				
			while ($row=$sth->fetch(PDO::FETCH_ASSOC))
			{
				$results[]=new MemberUserObject($row);
			}
				
			return $results;
	
		}
		catch (PDOException $ex)
		{
			LogMe::LogMsg($ex->getMessage());
			echo $ex->getMessage();
		}
		
	}
	
	
	function Insert($obj)
	{
		try
		{
			$dbh=new PDO($this->conn ,$this->user, $this->pw);
			$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
			$sth=$dbh->prepare("insert into $this->table (Email,Password, FirstName,LastName,Gender,Address,State,ZipCode,School,Relationship,Birthday,AboutMe) values (:Email,:Password, :FirstName,:LastName,:Gender,:Address,:State,:ZipCode,:School,:Relationship,:Birthday,:AboutMe)");
			$sth->execute((array)$obj);
		}
		
		catch (PDOException $ex)
		{
			LogMe::LogMsg($ex->getMessage());
			echo $ex->getMessage();
		}
			
	}
	
	function Update($obj)
	{	
		try
		{
			$dbh=new PDO($this->conn ,$this->user, $this->pw);
			$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
			$sth=$dbh->prepare("Update $this->table set Password=?, FirstName=?,LastName=?,Gender=?,Address=?,State=?,ZipCode=?,School=?,Relationship=?,Birthday=?,AboutMe=? where Email=?");
														
			$sth->execute(array($obj->Password,$obj->FirstName, $obj->LastName, $obj->Gender, $obj->Address, $obj->State, $obj->ZipCode, $obj->School, $obj->Relationship, $obj->Birthday, $obj->AboutMe, $obj->Email));
		}
		
		catch (PDOException $ex)
		{
			LogMe::LogMsg($ex->getMessage());
			echo $ex->getMessage();
		}
		
	}

		
	function Delete($email)
	{
		try
		{
			$dbh=new PDO($this->conn ,$this->user, $this->pw);
			$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
			$sth=$dbh->prepare("Delete from $this->table where Email=?");		
			$sth->execute(array($email));			
		}
		
		catch (PDOException $ex)
		{
			LogMe::LogMsg($ex->getMessage());
			echo $ex->getMessage();
		}	
	}
	
	
	
}


?>