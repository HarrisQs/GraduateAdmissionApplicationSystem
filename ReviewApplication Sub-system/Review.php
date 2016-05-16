<?php
	include_once "../Respository Sub-system/ConnectDB.php";
	include_once "../Respository Sub-system/ApplicationDB.php";
    $DoReview = new Review();
    $DoReview->Review();

	class Review
	{
		private $currentApplication;
		public function __construct()
		{
			$connectDB = new ConnectDB();
			$teacherID = $_POST['TeacherID'];
			$School = $connectDB("select School from account_data where account='$teacherID' ");
			$jsonResult = Review::GetApplication($School);//還沒解碼
		}
		public function Review()
		{
			switch ($_POST['action']) 
   				{
				    case 'All':
				        Review::ShowAllApplication();				        
				        break;
				    case 'Failed':
				        Review::ShowReviewFailed();
				        break;
				    case 'NotReview':
				        Review::ShowReviewFailed();
				        break;
				    case 'Success':
				    	Review::ShowReviewSuccess();
				    	break;
				    case 'Test':
				        Review::test();
				        break;
   				}
		}

		public function ShowThisApplication()
		{

			Review::SendEmailToTeacher($currentApplication[$index]->TeacherEmail);
		}

		private function ShowAllApplication()
		{
			for($index = 0; $index < count($currentApplication); $index++)
			{
				print("$currentApplication[$index].School $currentApplication[$index].Department <a href='這個學生的資料頁面'>$currentApplication[$index].Name</a><br>");
			}
		}

		private function ShowReviewFailed()//顯示沒通過審查的申請書
		{
			for($index = 0; index < count($currentApplication); $index++)
			{
				if($currentApplication.State == 2)//2代表沒通過
				{
					print("$currentApplication[$index].School $currentApplication[$index].Department <a href='這個學生的資料頁面'>$currentApplication[$index].Name</a><br>");
				}
			}
		}

		private function ShowNotReview()//顯示尚未審查的申請書
		{
			for($index = 0; index < count($currentApplication); $index++)
			{
				if($currentApplication.State == 0)//0代表還沒審查
				{
					print("$currentApplication[$index].School $currentApplication[$index].Department <a href='這個學生的資料頁面'>$currentApplication[$index].Name</a><br>");
				}
			}
		}

		private function ShowReviewSuccess()//顯示通過審查的申請書
		{
			for($index = 0; index < count($currentApplication); $index++)
			{
				if($currentApplication.State == 1)//1代表通過
				{
					print("$currentApplication[$index].School $currentApplication[$index].Department <a href='這個學生的資料頁面'>$currentApplication[$index].Name</a><br>");
					
				}
			}
		}

		private function ChangeApplicationState($state)//改變狀態
		{
			$this->State = $state;
		}

		private function SendEmailToTeacher($Email)//顯示寄信給推薦教授的連結，用新分頁開啟
		{
			print("<a target='_blank' href='mailto:$Email'>寄信給推薦教授</a>");
		}
		
		public function GetApplication($School)
		{

			$currentApplication = ApplicationDB::GetApplication($School);
		}

		public function test()
		{

		}

	}
?>

