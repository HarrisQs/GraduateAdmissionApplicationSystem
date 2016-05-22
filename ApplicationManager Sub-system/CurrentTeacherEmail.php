<?php
	include_once "../Repository Sub-system/ApplicationDB.php";
	class CurrentTeacherEmail
	{
		private $TeacherEmail;
		private $Account;

		private $Database;

		function __construct()
		{
			$this->Database = new ApplicationDB();
		}

		public function SetTeacherEmail($teacheremail,$currentAccount)
		{
			$this->Account = $currentAccount;
			$this->TeacherEmail = $teacheremail;
		}

		public function SaveToDB()
		{
			$this->Database->SaveTeacherEmail($this->TeacherEmail,$this->Account);
		}
	}
?>