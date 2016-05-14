<?php 
	include_once "CurrentApplication.php"
	class Review
	{
		private $currentApplication;
		public function __construct($currentApplication)
		{
			$this->currentApplication = $currentApplication;
		}
		public function Review()
		{
			print("你想要做什麼\n");
			print("<a herf='顯示所有申請書的頁面'>顯示所有申請書</a>");
			print("<a herf='顯示尚未審查的申請書的頁面'>顯示尚未審查的申請書</a>");
			print("<a herf='顯示通過審查的申請書的頁面'>顯示通過審查的申請書</a>");
			print("<a herf='顯示未通過審查的申請書的頁面'>顯示沒通過審查的申請書</a>");
		}

		private function ShowAllApplication()
		{
			reset($currentApplication);
			for($index = 0; $index < count($currentApplication); $index++)
			{
				print("$currentApplication.School $currentApplication.Department <a href='這個學生的資料頁面'>$currentApplication.Name</a> \n");
			}
		}

		private function ShowReviewFailed()//顯示沒通過審查的申請書
		{
			reset($currentApplication);
			for($index = 0; index < count($currentApplication); $index++)
			{
				if($currentApplication.State == 2)//2代表沒通過
				{
					print("$currentApplication.School $currentApplication.Department <a href='這個學生的資料頁面'>$currentApplication.Name</a>\n");
				}
			}
		}

		private function ShowNotReview()//顯示尚未審查的申請書
		{
			reset($currentApplication);
			for($index = 0; index < count($currentApplication); $index++)
			{
				if($currentApplication.State == 0)//0代表還沒審查
				{
					print("$currentApplication.School $currentApplication.Department <a href='這個學生的資料頁面'>$currentApplication.Name</a>\n");
				}
			}
		}

		private function ShowReviewSuccess()//顯示通過審查的申請書
		{
			reset($currentApplication);
			for($index = 0; index < count($currentApplication); $index++)
			{
				if($currentApplication.State == 1)//1代表通過
				{
					print("$currentApplication.School $currentApplication.Department <a href='這個學生的資料頁面'>$currentApplication.Name</a>\n");
				}
			}
		}

		private function ChangeApplicationState($state)//改變狀態
		{
			$currentApplication.State = $state;
		}

		private function SendEmailToTeacher($Email)//顯示寄信給推薦教授的連結，用新分頁開啟
		{
			<a target="_blank" href="mailto:$Email">寄信給推薦教授</a>
		}
	}
?>

