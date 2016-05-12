<?php
	include "ConnectDB.php"
	class LogDB
	{
		private $DataBase;

		function __construct()//建構子
		{
			$this->DataBase = new ConnectDB();
		}
		function __destruct()//解構子
		{

		}
		public function SaveLogInLog($account)
		{

		}
		public function SaveLogOutLog($account)
		{


		}
		public function SaveResetPasswordLog($account)
		{

		}
		private function GetNowTime()
		{

		}



	}

?>