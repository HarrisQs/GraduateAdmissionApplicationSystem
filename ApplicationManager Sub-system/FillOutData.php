<?php
//2016
//Coding by Rita
//分配進來的資料到不同Class做處理
	include_once "CurrentBasicData.php"; 		//基本資料
	include_once "CurrentCV.php";				//自傳
	include_once "CurrentProgramSelection.php";	//選擇系所
	include_once "CurrentTranscripts.php";		//上傳成績單
	include_once "CurrentSOP.php";				//動機簡述
	include_once "CurrentTeacherEmail.php";		//推薦教授信箱

	new FillOutData();
	class FillOutData
	{
		public $NAME;
		public $EMAIL;
		public $SCHOOL;
		public $DEPARTMENT;
		public $TEACHEREMAIL;
		public $SOP;
		public $CV;
		public $PROMGRAMSELECTION;
		public $TRANSCRIPT;
		public $currentaccount;

		private $currentBasicData;
		function __construct()
		{
			$NAME = $_POST["name"];
			$EMAIL = $_POST["email"];
			$SCHOOL = $_POST["school"];
			$DEPARTMENT = $_POST["department"];
			$TEACHEREMAIL = $_POST["teacheremail"];
			$SOP = $_POST["sop"];
			$CV = $_POST["cv"];
			$PROMGRAMSELECTION = $_POST["programselection"];
			$TRANSCRIPT = $_POST["transcript"];
			$this->currentBasicData = new currentBasicData();
			$this->FillApplicationData($NAME,$EMAIL,$SCHOOL,$DEPARTMENT,$TRANSCRIPT,$TEACHEREMAIL,$SOP,$PROMGRAMSELECTION,$CV);
		}
		public function FillApplicationData($Name,$Email,$School,$Department,$Transcripts, $Teacheremail, $Sop, $Programselection, $Cv)
		{
			$this->SetName($Name,$this->currentaccount);
			$this->SetEmail($Email,$this->currentaccount);
			$this->SetSchool($School,$this->currentaccount);
			$this->SetDepartment($Department,$this->currentaccount);
			$this->SetTranscripts($Transcripts,$this->currentaccount);
			$this->SetTeacherEmail($Teacheremail,$this->currentaccount);
			$this->SetSOP($Sop,$this->currentaccount);
			$this->SetProgramSelection($Programselection,$this->currentaccount);
			$this->SetCV($Cv,$this->currentaccount);
		}


		private function SetName($n,$currentAccount) //name,account
		{
			$this->currentBasicData->SetName($n,$currentAccount);
		}

		private function SetEmail($e,$currentAccount)//email,account
		{
			$this->currentBasicData->SetEmail($e,$currentaccount);
		}

		private function SetSchool($s,$currentAccount)//school,account
		{
			$this->currentBasicData->SetSchool($s,$currentaccount);
		}

		private function SetDepartment($d,$currentAccount)//department,account
		{
			$this->currentBasicData->SetDepartment($d,$currentaccount);
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
			$this->currentaccount = $account;
		}
	}


?>