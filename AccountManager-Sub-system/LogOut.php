<?php
	include_once "../Repository Sub-system/AccountDB.php";
	include_once "../Repository Sub-system/ConnectDB.php";
	include_once "../Repository Sub-system/LogDB.php";
    $account = $_POST["ID"];
	
	$logout = new LogOut();
	$logout->LoginSystem($account);
	
	
	class LogOut
	{
		private $DataBase;
		private $Accountdata;
		private $logdata;
		Public Function LogoutSystem($account)
		{
			
			if(SaveLogoutLog($account))
			{
				echo '<script language="javascript">';
				echo 'alert("登出成功")';
				echo '</script>';	
				
				usleep(1000000);
				echo '<meta http-equiv="refresh" content="2;url=../index.html" />';
			}
			else
				echo "fail";
			
			$this->Accountdata = new AccountDB();
		}
		Private function SaveLogoutLog($account)
		{
			Return $this->logdata->SaveLogOutLog($ID);
		}
	}
?>