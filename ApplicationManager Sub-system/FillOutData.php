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

	class FillOutData
	{
		private $currentBasicData;
		function __construct()
		{
			$this->currentBasicData = new currentBasicData();
		}


		/*public function FillApplicationData($basicdata, $transcripts, $TeacherEmail, $SOP, $programSelection, $CV)
		{
			//SetBasicData($basicdata)
			SetTranscripts($transcripts);
			SetTeacherEmail($TeacherEmail);
			SetSOP($sOP);
			SetProgramSelection($programSelection);
			SetCV($CV);

			//currentBasicData.SaveToDB();
			currentTranscript.SaveToDB();
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
		}*/
	}


?>