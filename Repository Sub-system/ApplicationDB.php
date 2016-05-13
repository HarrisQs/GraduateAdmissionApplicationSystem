<?php
	include_once "ConnectDB.php";
	class ApplicationDB
	{
		private $DataBase;

		function __construct()
		{
			$this->DataBase = new ConnectDB();
		}
		function __destruct()
		{

		}
		public function SaveBasicData($basicData, $account)
		{				
			$json_Result = json_decode($basicData); //parse json
			$command = "insert into application_data (account, Email, Name, School, Department)
						VALUES ('$account', 
								'$json_Result->Email', 
								'$json_Result->Name', 
								'$json_Result->School', 
								'$json_Result->Department'
								);";
			$this->DataBase->DB_Insert($command);
		}
		public function SaveTransrcipts($transcripts, $account)
		{

		}
		public function SaveTeacherEmail($TeacherEmail, $account)
		{

		}
		public function SaveRecommendationLetter($fileName, $account)
		{

		}
		public function SaveSOP($SOP, $account)
		{

		}
		public function SaveProgramSelection ($programSelection, $account)
		{

		}
		public function SaveCV($CV, $account)
		{

		}
		public function SaveState($state, $account)
		{

		}
		public function GetLastHistory($account)
		{

		}
		public function GetApplcation($school)
		{

		}
	}

?>