<?php
class LogMe
{	 
	static function LogMsg($msg)
	{
		$TimeStamp=date("m/d/Y H:i:s");
		$IpOfUser=$_SERVER['REMOTE_ADDR'];
		
		$msg=$TimeStamp." From ".$IpOfUser.": ".$msg."\r\n";
		$LogFile="log.txt";
		$fh = fopen($LogFile, 'a') or die ('no');
		fwrite($fh, $msg);		
		fclose($fh);		
	}	
}

?>