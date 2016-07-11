<?php

class CodeGen
{
	private $dbname;
	private $ipaddr;
	private $dbuser;
	private $dbpass;	
	private $ClassName;
	private $Columns=array();
	
	private $Folder;		
	private $FullPathToFileDA;
	private $FullPathToFileObject;
	
	
	function CodeGen($dbname, $ipaddr, $dbuser, $dbpass,$tbname, &$colarr)
	{
		$this->dbname=$dbname;
		$this->ipaddr=$ipaddr;
		$this->dbuser=$dbuser;
		$this->dbpass=$dbpass;		
		$this->ClassName=$tbname;
		$this->Columns=&$colarr;
		
		//$this->Folder="Data";
		$this->Folder=$this->dbname."BizObjects/".$this->ClassName;		
		$this->FullPathToFileDA=$this->Folder."/".$this->ClassName."DA.php";
		$this->FullPathToFileObject=$this->Folder."/".$this->ClassName."Object.php";
		
	}
	
		
	function  CreateObjectFile()
	{				
		if(file_exists($this->FullPathToFileObject))
		{
			die("File already exists");
		}
		
		mkdir(dirname($this->FullPathToFileObject), 0777, true);
		$file=fopen($this->FullPathToFileObject,'a') or die ('no');
		
		$str="<?php\r\n";
		$str.="class $this->ClassName"."Object\r\n";
		$str.="{\r\n";		
		foreach($this->Columns as $col)
		{
			$str.="    public \$$col->CName;\r\n";			
		}		
		$str.="    \r\n";
		
		$str.="    function __construct(\$row)\r\n";
		$str.="    {\r\n";
		foreach($this->Columns as $col)
		{
			//$str.="    public \$$col->CName;\r\n";
			$str.="        \$this->$col->CName=\$row['$col->CName'];\r\n";
		}
		$str.="    }\r\n";
		
		$str.="}\r\n\r\n";
		$str.="?>\r\n";
		
		fwrite($file, $str);
		fclose($file);
	}

	
	function CreateDA()
	{
		if(file_exists($this->FullPathToFileDA))
		{
			die("File already exists");
		}
		
		mkdir(dirname($this->FullPathToFileDA), 0777, true);
		
		$file=fopen($this->FullPathToFileDA,'a') or die ('no'); 	
				
		fwrite($file, $this->CreateBeginningOfClass());
		fwrite($file, $this->CreateCreateTable());
		fwrite($file, $this->CreateLoadAll());
		fwrite($file, $this->CreateEndOfClass());
				
		fclose($file);
	}
	
	
	private function CreateBeginningOfClass()
	{
		$str="<?php \r\n\r\n";
		$str.="include(\"$this->ClassName"."Object.php\");\r\n\r\n";
		$str.="class $this->ClassName"."DA\r\n";		
		$str.="{\r\n";
		
		$str.="    private \$conn=\"mysql:host=$this->ipaddr;dbname=$this->dbname;\";    \r\n";
		$str.="    private \$user=\"$this->dbuser\";\r\n";
		$str.="    private \$pw=\"$this->dbpass\";\r\n";
		$str.="    private \$table=\"$this->ClassName\";\r\n\r\n";
			
		return $str;
	}
	
	private function CreateEndOfClass()
	{
		$str="}\r\n";
		$str.="?>\r\n";
		return  $str;		
	}
	
	private function CreateCreateTable()
	{
		$str="    function CreateTable()\r\n";
		$str.="    {\r\n";
		
		$str.="        \$sql=\"CREATE TABLE $this->ClassName (";
		
		$arrsize=count($this->Columns);
		
		for($i=0;$i<$arrsize;$i++)
		{
			if($i==$arrsize-1)
			{
				$str.= $this->Columns[$i]->CreateCol();
			}
			else
			{
				$str.=$this->Columns[$i]->CreateCol().", ";
			}
		}
		
		$str.=");\";\r\n";
		
		$str.="        try\r\n";
		$str.="        {\r\n";
		
		$str.="            \$dbh=new PDO(\$this->conn ,\$this->user, \$this->pw);\r\n";
		$str.="            \$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);\r\n";
		$str.="            \$sth=\$dbh->prepare(\$sql);\r\n";
		$str.="            \$sth->execute();\r\n\r\n";
				
		
		$str.="        }\r\n";
		
		$str.="        catch (PDOException \$ex)\r\n";
		$str.="        {\r\n";
		$str.="            LogMe::LogMsg(\$ex->getMessage());\r\n";
		$str.="            echo \$ex->getMessage();\r\n";
		$str.="        }\r\n";
		
		
		
		$str.="    }\r\n\r\n";
		return $str;		
	}
	
	private function CreateLoadAll()
	{
		$str="    function LoadAll()\r\n";
		$str.="    {\r\n";
		$str.="        try\r\n";
		$str.="        {\r\n";		
		
		$str.="            \$dbh=new PDO(\$this->conn ,\$this->user, \$this->pw);\r\n";
		$str.="            \$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);\r\n";		
		$str.="            \$sth=\$dbh->prepare(\"select * from \$this->table\");\r\n";
		$str.="            \$sth->execute();\r\n\r\n";
		
		
		$str.="            while (\$row=\$sth->fetch(PDO::FETCH_ASSOC))\r\n";
		$str.="            {\r\n";
		$str.="                \$results[]=new $this->ClassName"."Object(\$row);\r\n";
		$str.="            }\r\n\r\n";
		
		$str.="            return \$results;\r\n";
		
		
		
		$str.="        }\r\n";
		
		$str.="        catch (PDOException \$ex)\r\n";
		$str.="        {\r\n";
		$str.="            LogMe::LogMsg(\$ex->getMessage());\r\n";
		$str.="            echo \$ex->getMessage();\r\n";
		$str.="        }\r\n";
		
		$str.="    }\r\n\r\n";
		
		return $str;
	}
}

?>
















