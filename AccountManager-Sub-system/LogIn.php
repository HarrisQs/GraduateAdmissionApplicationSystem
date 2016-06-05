<?php
	include_once "../Repository Sub-system/AccountDB.php";
	include_once "../Repository Sub-system/ConnectDB.php";
	include_once "../Repository Sub-system/LogDB.php";
    //$ID = $_GET["ID"];
    //$password = $_GET["password"];
	setcookie("ID",$_GET["ID"],time()+3600,"../");
	setcookie("password",$_GET["password"],time()+3600);
	
	$ID = $_COOKIE["ID"];
	$password = $_COOKIE["password"];
	$login = new LogIn();
	$login->LoginSystem($ID,$password);
	
	class LogIn
	{
		private $DataBase;
		private $Accountdata;
		private $logdata;
		function __construct() 
		{
     		 //$this->AccountDB = new AccountDB();
   		}
		Public Function LoginSystem($ID,$password)
		{
			$sql="SELECT `pass` FROM `account_data` WHERE `account`='".$ID."'";	
			
			$this->Accountdata = new AccountDB();
			$this->DataBase = new ConnectDB();
			$this->logdata = new LogDB();
			
			
			
			$result = $this->Accountdata->ValidateAccount($ID,$password);
			if($result)
			{
				echo "YES";
				$this->logdata->SaveLogInLog($account);
			}
			else
				echo '<script language="javascript">';
					echo 'alert("登入失敗!請重新登入")';
					echo '</script>';	
				
					usleep(100000);
					echo '<meta http-equiv="refresh" content="2;url=../index.html" />';
			
		}
		Public Function getaccount()
        {
             return $ID;
        }
	}
?>