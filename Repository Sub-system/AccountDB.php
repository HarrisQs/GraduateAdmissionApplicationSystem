<?php
	include "ConnectDB.php";
	class AccountDB
	{
		private $DataBase;

		function AccountDB() //建構子 用來連接資料庫
		{
     		 $this->DataBase = new ConnectDB();
   		}	

		public function AddNewAccount($account)
		{
			if($this -> IsRepeat("111sss12"))//$account)) //帳號重複了
			{
				return false;
			}
			else//帳號可以使用
			{
				//$command = "INSERT INTO account_data (ID, UserName, Password, Email)VALUES ('900', 'Los Angeles', '10', 'Jan-10-1999');";
				return true;		
			}
		}
		public function ValidateAccount($account, $password)
		{

		}
		public function SetNewPassword($account, $password)
		{

		}
		private function IsRepeat($account)
		{
			$command = "select * from account_data where ID='$account'";
			return $this->DataBase->DBCommand($command);
		}

	}

?>