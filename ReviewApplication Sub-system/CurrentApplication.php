<?php
	include_once "../Respository Sub-system/ApplicationDB.php";
	class CurrentApplication
	{
		private $TeacherEmail;
		private $State;
		public function __construct($TeacherEmail,$State)
		{
			$this->TeacherEmail = $TeacherEmail;
			$this->State = $State;
		}

		public function GetTeacherEmail()
		{
			return $this->TeacherEmail;
		}

		public function SetState($state)
		{
			$this->State = $state;
		}

		public function SaveToDB()
		{
			
		}
	}
?>