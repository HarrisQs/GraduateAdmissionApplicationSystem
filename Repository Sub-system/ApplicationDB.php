<?php
//2016/05/13
//Programmer：張弘瑜
//負責管理申請書資料庫的部分
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
		public function SaveBasicData($Email,$Name,$School,$Department, $account)//儲存基本資料
		{				
			//$json_Result = json_decode($basicData); //parse json
			$command = "insert into application_data (account, Email, Name, School, Department)
						VALUES ('$account', 
								'$Email', 
								'$Name', 
								'$School', 
								'$Department'
								);";
			$this->DataBase->DB_Insert($command);
			return true;
		}
		public function SaveTransrcipts($transcripts, $account)//儲存成績單
		{
			$command = "UPDATE application_data
						SET Transcipts = '$transcripts'
						WHERE account = '$account';";
			$this->DataBase->DB_Insert($command);
			return true;
		}
		public function SaveTeacherEmail($TeacherEmail, $account)//儲存老師信箱
		{
			$command = "UPDATE application_data
						SET TeacherEmail = '$TeacherEmail'
						WHERE account = '$account';";
			$this->DataBase->DB_Insert($command);
			return true;
		}
		public function SaveRecommendationLetter($fileName, $account)//儲存推薦信
		{
			$command = "UPDATE application_data
						SET RecommendationLetter = '$fileName'
						WHERE account = '$account';";
			$this->DataBase->DB_Insert($command);
			return true;
		}
		public function SaveSOP($SOP, $account)//儲存SOP
		{
			$command = "UPDATE application_data
						SET SOP = '$SOP'
						WHERE account = '$account';";
			$this->DataBase->DB_Insert($command);
			return true;
		}
		public function SaveProgramSelection ($programSelection, $account)//儲存選擇的科系
		{
			$command = "UPDATE application_data
						SET ProgramSelection = '$programSelection'
						WHERE account = '$account';";
			$this->DataBase->DB_Insert($command);
			return true;
		}
		public function SaveCV($CV, $account)//儲存自傳
		{
			$command = "UPDATE application_data
						SET CV = '$CV'
						WHERE account = '$account';";
			$this->DataBase->DB_Insert($command);
			return true;
		}
		public function SaveState($state, $account)//儲存狀態
		{
			$command = "UPDATE application_data
						SET Status = '$state'
						WHERE account = '$account';";
			$this->DataBase->DB_Insert($command);
			return true;
		}
		public function GetLastHistory($account)//有解碼過了取得上一次的編輯歷史
		{
			$command = "Select * from application_data where account='$account'";
			$result = $this->DataBase->DB_SelectString($command);
			if($result == "")
				return "You don’t have last history";
			else 
				return json_encode($result);
		}
		public function GetApplcation($school)//傳json 陣列回去取得申請書
		{
			$command = "Select * from application_data where School='$school'";
			$result = $this->DataBase->DB_SelectString($command);
			if($result == "")
				return "Not Find Applcation";
			else 
				return $result;
		}
	}

?>