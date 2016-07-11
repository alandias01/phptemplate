<?php 
class ColumnObject
{
	public $CName;
	public $CType;
	public $isPKey;
	public $pkeyautoinc;
	public $CRow;
	

	function ColumnObject($cname, $ctype, $ispkey, $pkautoinc)
	{
		$this->CName=$cname;
		$this->CType=$ctype;
		$this->isPKey=$ispkey;
		$this->pkeyautoinc=$pkautoinc;
	}

	function CreateCol()
	{
		$this->CRow=$this->CName." ".$this->CType;

		if ($this->isPKey)
		{
			$this->CRow.=" not null primary key";
			if ($this->pkeyautoinc)
			{
				$this->CRow.=" auto_increment";
			}
		}

		return  $this->CRow;
	}

}
?>