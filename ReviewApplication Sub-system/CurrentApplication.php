<?php
	include_once "../Repository Sub-system/ApplicationDB.php";
	class CurrentApplication
	{
		private $State;

		public function __construct()
		{

		}

		public function GetTeacherEmail()
		{

		}

		public function SetState($account,$state)
		{
			echo $account." ".$state;
			$this->State = $state;
			$this->SaveToDB($account);

		}

		public function SaveToDB($account)
		{
			$applicationDB = new ApplicationDB();
			echo $applicationDB->SaveState($this->State, $account);
		}
	}
?>