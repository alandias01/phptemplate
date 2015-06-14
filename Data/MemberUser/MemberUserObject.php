<?php
class MemberUserObject
{
	public $Email;
	public $Password;
	public $FirstName;
	public $LastName;
	public $Gender;
	public $Address;
	public $State;
	public $ZipCode;
	public $School;		
	public $Relationship;
	public $Birthday;	
	public $AboutMe;
	
	function __construct($row)
	{		
		$this->Email=$row['Email'];
		$this->Password=$row['Password'];
		$this->FirstName=$row['FirstName'];
		$this->LastName=$row['LastName'];		
		$this->Gender=$row['Gender'];
		$this->Address=$row['Address'];
		$this->State=$row['State'];
		$this->ZipCode=$row['Zipcode'];
		$this->School=$row['School'];		
		$this->Relationship=$row['Relationship'];		
		
		$bday_tmp=explode(" ",$row['Birthday']); //The bday value has date and time so we just take first part
		$this->Birthday=$bday_tmp[0];
		
		$this->AboutMe=$row['AboutMe'];
	}	
}




?>