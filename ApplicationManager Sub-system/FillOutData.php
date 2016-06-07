<?php
$url = "http://google.com";
//2016
//Coding by Rita
//分配進來的資料到不同Class做處理
	include_once "CurrentBasicData.php"; 		//基本資料
	include_once "CurrentCV.php";				//自傳
	include_once "CurrentProgramSelection.php";	//選擇系所
	include_once "CurrentTranscripts.php";		//上傳成績單
	include_once "CurrentSOP.php";				//動機簡述
	include_once "CurrentTeacherEmail.php";		//推薦教授信箱
	include_once "../Repository Sub-system/ApplicationDB.php";//申請書資料的DATABASE

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

		public $FileName;
		public $Filetype;
		public $Filesize;
		public $Filetmp;
		public $Fileerr;


		private $Database;

		private $CurrentBasicData;
		private $CurrentCV;
		private $CurrentProgramSelection;
		private $CurrentSOP;
		private $CurrentTeacherEmail;
		private $CurrentTranscripts;


		function __construct()
		{
			$NAME = $_POST["name"];//姓名 FROM HTML
			$EMAIL = $_POST["email"];//信箱 FROM 
			$SCHOOL = $_POST["school"];//就讀學校 FROM HTML
			$DEPARTMENT = $_POST["department"];//系所 FROM HTML
			$TEACHEREMAIL = $_POST["teacheremail"];//推薦教授信箱 FROM HTML
			$SOP = $_POST["sop"];//動機簡述 FROM HTML
			$CV = $_POST["cv"];//履歷 FROM HTML
			$PROMGRAMSELECTION = $_POST["programselection"];//選擇申請系所 FROM HTML
			//@$TRANSCRIPT = $_POST["transcripts"];//成績單 FROM HTML
			$FileName = $_FILES["transcripts"]["name"];
			$Filetype = $_FILES["transcripts"]["type"];
			$Filesize = $_FILES["transcripts"]["size"];
			$Filetmp = $_FILES["transcripts"]["tmp_name"];
			$Fileerr = $_FILES["transcripts"]["error"];


			$this->SetAccount();
			$this->CurrentBasicData = new CurrentBasicData();
			$this->CurrentCV = new CurrentCV();
			$this->CurrentProgramSelection = new CurrentProgramSelection();
			$this->CurrentSOP = new CurrentSOP();
			$this->CurrentTeacherEmail = new CurrentTeacherEmail();
			$this->CurrentTranscripts = new CurrentTranscripts();

			$this->FillApplicationData($NAME,$EMAIL,$SCHOOL,$DEPARTMENT,$FileName,$Filetype,$Filesize,$Filetmp,$Fileerr,$TEACHEREMAIL,$SOP,$PROMGRAMSELECTION,$CV);
			$this->Database = new ApplicationDB();
			// $this->Database->GetLastHistory($this->currentaccount);
		}
		public function FillApplicationData($Name,$Email,$School,$Department,$Fn,$Ft,$Fs,$Ftm,$Fe,
														$Teacheremail, $Sop, $Programselection, $Cv)
		{
			$this->SetName($Name,$this->currentaccount);
			$this->SetEmail($Email,$this->currentaccount);
			$this->SetSchool($School,$this->currentaccount);
			$this->SetDepartment($Department,$this->currentaccount);
			$this->SetTranscripts($Fn,$Ft,$Fs,$Ftm,$Fe,$this->currentaccount);
			$this->SetTeacherEmail($Teacheremail,$this->currentaccount);
			$this->SetSOP($Sop,$this->currentaccount);
			$this->SetProgramSelection($Programselection,$this->currentaccount);
			$this->SetCV($Cv,$this->currentaccount);

			$this->CurrentBasicData->SaveToDB();
			$this->CurrentCV->SaveToDB();
			$this->CurrentProgramSelection->SaveToDB();
			$this->CurrentSOP->SaveToDB();
			$this->CurrentTeacherEmail->SaveToDB();
			$this->CurrentTranscripts->Upload();

			header("Location: ../ApplicationManager Sub-system/StaticPage.php");
		}


		private function SetName($n,$currentAccount) //name,account
		{
			$this->CurrentBasicData->SetName($n,$currentAccount);
		}

		private function SetEmail($e,$currentAccount)//email,account
		{
			$this->CurrentBasicData->SetEmail($e,$this->currentaccount);
		}

		private function SetSchool($s,$currentAccount)//school,account
		{
			$this->CurrentBasicData->SetSchool($s,$this->currentaccount);
		}

		private function SetDepartment($d,$currentAccount)//department,account
		{
			$this->CurrentBasicData->SetDepartment($d,$this->currentaccount);
		}

		private function SetTranscripts($Fname,$Ftype,$Fsize,$Ftmp,$Ferr, $currentAccount)//name,type,size,tmp,err,account
		{
			echo '<script type="text/javascript">
					alert("上傳失敗!");
					location.href="StaticPage.php";
				</script>';
			$this->CurrentTranscripts->SetTranscripts($Fname,$Ftype,$Fsize,$Ftmp,$Ferr,$this->currentaccount);
		}

		private function SetTeacherEmail($teacher, $currentAccount)//teacherEmail,account
		{
			$this->CurrentTeacherEmail->SetTeacherEmail($teacher,$this->currentaccount);
		}

		private function SetSOP($S, $currentAccount)//SOP,account
		{
			$this->CurrentSOP->SetSOP($S,$this->currentaccount);
		}

		private function SetProgramSelection($p, $currentAccount)//programselection,account
		{
			$this->CurrentProgramSelection->SetProgramSelection($p,$this->currentaccount);
		}

		private function SetCV($c, $currentAccount)//CV,account
		{
			$this->CurrentCV->SetCV($c,$this->currentaccount);
		}

		private function GetLastHistory($account)//讀取歷史資料
		{
			$this->Database->GetLastHistory($account);
		}

		public function SetAccount()
		{
			session_start();
			//echo $_SESSION['currentAccount'];
			@$this->currentaccount = $_SESSION['currentAccount'];
		}
	}


?>