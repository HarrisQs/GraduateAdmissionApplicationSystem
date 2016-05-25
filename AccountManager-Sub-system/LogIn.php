<?php
	include_once "../Repository Sub-system/AccountDB.php";
	include_once "../Repository Sub-system/ConnectDB.php";
	include_once "../Repository Sub-system/LogDB.php";
    $ID = $_POST["ID"];
    $password = $_POST["password"];
	
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
				echo "no";
			
		}
	}
?>