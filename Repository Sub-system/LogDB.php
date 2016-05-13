<?php
//2016/05/12
//Programmer：張弘瑜
//負責管理日誌資料庫的部分
	include_once "ConnectDB.php";
	class LogDB
	{
		private $DataBase;

		function __construct()//建構子
		{
			$this->DataBase = new ConnectDB();
			date_default_timezone_set('Asia/Taipei');//設定台北的時區
		}
		function __destruct()//解構子
		{

		}
		public function SaveLogInLog($account)//記錄登入的紀錄
		{
			$Nowtime = $this -> GetNowTime();
			$command = "insert INTO log_data (account, HappenedTime, State)
						VALUES ('$account', '$Nowtime', 'LogIn');";
			$this->DataBase->DB_Insert($command);
		}
		public function SaveLogOutLog($account)//記錄登出的紀錄
		{
			$Nowtime = $this -> GetNowTime();
			$command = "insert INTO log_data (account, HappenedTime, State)
						VALUES ('$account', '$Nowtime', 'LogOut');";
			$this->DataBase->DB_Insert($command);
			return true;
		}
		public function SaveResetPasswordLog($account)//記錄重設密碼的紀錄
		{
			$Nowtime = $this -> GetNowTime();
			$command = "insert INTO log_data (account, HappenedTime, State)
						VALUES ('$account', '$Nowtime', 'ResetPassword');";
			$this->DataBase->DB_Insert($command);
		}
		private function GetNowTime()
		{
			return date("Y/m/d H:i:s");//取得年份/月/日 時:分:秒
			/*Y：代表西元(4位數)。
			m：代表月份。
			d ：代表日期。
			H：代表時(24小時制)。
			i  ：代表分。
			s ：代表秒。*/
		}
	}

?>