<?php
	// echo $_POST["email"];
	// $basicdata = $_POST[];  Question
	$transcripts = $_POST[transcript];
	$TeacherEmail = $_POST[teacherEmail];
	$SOP = $_POST[sOP];
	$programSelection = $_POST[programselection];
	$CV = $_POST[cV];



	class FillOutData
	{
		public function FillApplicationData($basicdata, $transcripts, $TeacherEmail, $SOP, $progranmSelection, $CV)
		{

		}

		private function SetBasicData($basicData, $currentAccount)
		{

		}

		private function SetTranscripts($transcripts, $currentAccount)
		{

		}

		private function SetTeacherEmail($TeacherEmail, $currentAccount)
		{

		}

		private function SetSOP($SOP, $currentAccount)
		{

		}

		private function SetProgramSelection($programselection, $currentAccount)
		{

		}

		private function SetCV($CV, $currentAccount)
		{

		}

		private function GetLastHistory($account)
		{

		}

		public function SetAccount($account)
		{

		}
	}

	class currentBasicData
	{
		private $Account;
		private $Email;
		private $Name;
		private $School;
		private $Department;

		public function SetAccount($account, $currrentAccount)
		{

		}

		public function SetEmail($email, $currrentAccount)
		{

		}

		public function SetName($name, $currentAccount)
		{

		}

		public function SetSchool($school, $currentAccount)
		{

		}

		public function SetDepartment($department, $currentAccount)
		{

		}

		public SaveToDB()
		{

		}
	}

	class currentTranscript
	{
		private $Transcripts; //File name
		private $Account;

		public function SetTranscripts($transcripts, $currentAccount)
		{

		}

		public function Upload($fileName)
		{

		}

		public SaveToDB()
		{

		}
	}

	class currentTeacherEmail
	{
		private $TeacherEmail ;//= $_POST[teacherEmail];
		private $Account;

		public function SetTeacherEmail($teacherEmail, $currentAccount)
		{

		}

		public SaveToDB()
		{

		}
	}

	class currentSOP
	{
		private $SOP ;//= $_POST[sOP];
		private $Account;

		public function SetSOP($SOP, $currentAccount)
		{

		}

		public SaveToDB()
		{

		}
	}

	class currentProgramSelection
	{
		private $ProgramSelection;// = $_POST[programselection];
		private $Account;

		public function SetProgramSelection($programselection, $currentAccount)
		{

		}

		public SaveToDB()
		{

		}
	}

	class currentCV
	{
		private $CV;// = $_POST[cV];
		private $Account;

		public function SetCV($CV, $currentAccount)
		{

		}

		public SaveToDB()
		{

		}
	}
?>