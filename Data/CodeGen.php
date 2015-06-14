<?php

class ColumnObject
{
	public $CName;
	public $CType;
	public $isPKey;
	public $CRow;
	
	function ColumnObject($cname, $ctype, $ispkey)
	{
		$this->CName=$cname;
		$this->CType=$ctype;
		$this->isPKey=$ispkey;
	}
	
	function CreateCol()
	{
		$this->CRow="$this->CName $this->CType";
		
		if ($this->isPKey) 
		{
			$this->CRow.=" not null primary key";
		}
		
		return  $this->CRow;
	}
	
}

class CodeGen
{
	private $ClassName="VocabList";
	private $Folder="Data";
		
	private $FullPathToFile;
	public  $Columns=array();
	
	
	function __construct()
	{
		$this->FullPathToFile=$this->Folder."/".$this->ClassName."DA.php";
		
		$this->Columns[]=new ColumnObject("Word", "varchar(100)", true);
		$this->Columns[]=new ColumnObject("Definition", "varchar(400)", false);
		$this->Columns[]=new ColumnObject("Type", "varchar(10)", false);
	}
	
	function  CreateObjectFile()
	{
		$fileloc=$this->Folder."/".$this->ClassName."Object.php";
		
		if(file_exists($fileloc))
		{
			die("File already exists");
		}
		
		$file=fopen($fileloc,'a') or die ('no');
		
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
		if(file_exists($this->FullPathToFile))
		{
			die("File already exists");
		}
		
		$file=fopen($this->FullPathToFile,'a') or die ('no'); 	
				
		fwrite($file, $this->CreateBeginningOfClass());
		fwrite($file, $this->CreateCreateTable());
		fwrite($file, $this->CreateLoadAll());
		fwrite($file, $this->CreateEndOfClass());
				
		fclose($file);
	}
	
	
	function CreateBeginningOfClass()
	{
		$str="<?php \r\n\r\n";
		$str.="include(\"$this->ClassName"."Object.php\");\r\n\r\n";
		$str.="class $this->ClassName"."DA\r\n";		
		$str.="{\r\n";
		
		$str.="    private \$conn=\"mysql:host=127.0.0.1;dbname=alantest;port=3307\";    \r\n";
		$str.="    private \$user=\"root\";\r\n";
		$str.="    private \$pw=\"nsxr\";\r\n";
		$str.="    private \$table=\"$this->ClassName\";\r\n\r\n";
			
		return $str;
	}
	
	function CreateEndOfClass()
	{
		$str="}\r\n";
		$str.="?>\r\n";
		return  $str;		
	}
	
	function CreateCreateTable()
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
	
	function CreateLoadAll()
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
















