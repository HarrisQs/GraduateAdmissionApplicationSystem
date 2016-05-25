<?php
	include_once "../Repository Sub-system/AccountDB.php";
	include_once "../Repository Sub-system/ConnectDB.php";
    $ID = $_POST["ID"];
    $password = $_POST["password"];
	
	$login = new LogIn();
	$login->LoginSystem($ID,$password);
	
	class LogIn
	{
		private $DataBase;
		private $Accountdata;
		function __construct() 
		{
     		 //$this->AccountDB = new AccountDB();
   		}
		Public Function LoginSystem($ID,$password)
		{
			$sql="SELECT `pass` FROM `account_data` WHERE `account`='".$ID."'";	
			
			$this->Accountdata = new AccountDB();
			$this->DataBase = new ConnectDB();
			
			$result = $this->Accountdata->ValidateAccount($ID,$password);
			if($result)
				echo "YES";
			else
				echo "no";
			
		}
	}
?>