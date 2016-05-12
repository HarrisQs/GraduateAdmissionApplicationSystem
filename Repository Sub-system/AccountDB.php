<?php
	include_once "ConnectDB.php";
	include_once "LogDB.php";
	class AccountDB
	{
		private $DataBase;
		private $LogDataBase;

		function __construct() //建構子 用來連接資料庫
		{
     		 $this->DataBase = new ConnectDB();
     		 $this->LogDataBase = new LogDB();
   		}
   		function __destruct()
		{

		}	
		public function AddNewAccount($account)//註冊帳號
		{
			if($this -> IsRepeat($account)) //帳號重複了
			{
				return false;
			}
			else//帳號可以使用 新增帳號可能要再登入那邊做 因為這邊沒有全部的參數
			{
				//$command = "INSERT INTO account_data (ID, UserName, Password, Email)VALUES ('900', 'Los Angeles', '10', 'Jan-10-1999');";
				return true;		
			}
		}
		public function ValidateAccount($account, $password)//驗證帳號密碼
		{
			$command = "select * from account_data where account='$account' And pass='$password'";
			if($this->DataBase->DB_Select($command))
			{
				$this->LogDataBase->SaveLogInLog($account);
				return true;
			}
			else
				return false;
		}
		public function SetNewPassword($account, $password)//更新密碼
		{
			$command = "update account_data SET pass='$password' WHERE  account='$account'";
			$this->DataBase->DB_Update($command);
		}
		private function IsRepeat($account)//判斷帳號是否重複
		{
			$command = "select * from account_data where account='$account'";
			return $this->DataBase->DB_Select($command);
		}

	}

?>