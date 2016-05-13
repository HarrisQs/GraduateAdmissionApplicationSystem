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
			return true;
		}
		public function SaveTransrcipts($transcripts, $account)
		{
			$command = "UPDATE application_data
						SET Transcipts = '$transcripts'
						WHERE account = '$account';";
			$this->DataBase->DB_Insert($command);
			return true;
		}
		public function SaveTeacherEmail($TeacherEmail, $account)
		{
			$command = "UPDATE application_data
						SET TeacherEmail = '$TeacherEmail'
						WHERE account = '$account';";
			$this->DataBase->DB_Insert($command);
			return true;
		}
		public function SaveRecommendationLetter($fileName, $account)
		{
			$command = "UPDATE application_data
						SET RecommendationLetter = '$fileName'
						WHERE account = '$account';";
			$this->DataBase->DB_Insert($command);
			return true;
		}
		public function SaveSOP($SOP, $account)
		{
			$command = "UPDATE application_data
						SET SOP = '$SOP'
						WHERE account = '$account';";
			$this->DataBase->DB_Insert($command);
			return true;
		}
		public function SaveProgramSelection ($programSelection, $account)
		{
			$command = "UPDATE application_data
						SET ProgramSelection = '$programSelection'
						WHERE account = '$account';";
			$this->DataBase->DB_Insert($command);
			return true;
		}
		public function SaveCV($CV, $account)
		{
			$command = "UPDATE application_data
						SET CV = '$CV'
						WHERE account = '$account';";
			$this->DataBase->DB_Insert($command);
			return true;
		}
		public function SaveState($state, $account)
		{
			$command = "UPDATE application_data
						SET Status = '$state'
						WHERE account = '$account';";
			$this->DataBase->DB_Insert($command);
			return true;
		}
		public function GetLastHistory($account)
		{

		}
		public function GetApplcation($school)
		{

		}
	}

?>