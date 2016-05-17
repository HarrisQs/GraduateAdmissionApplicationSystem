<?php
	include_once"../Repository Sub-system/ConnectDB.php";// 不能有空白啊柏宏
	//include_once "../Respository Sub-system/ConnectDB.php";
    $DoReview = new Review;
    $DoReview->Review();
	
	class Review
	{
		private $currentApplication;
		public function __construct()
		{
			$connectDB = new ConnectDB();
			$teacherID = $_POST['TeacherID'];
			$jsonResult = $connectDB("select School from account_data where account='$teacherID' ");
			//還沒解碼
		}
		public function Review()
		{
			setcookie('application_list',$currentApplication);
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

		private function ShowThisApplication($index)
		{

		}

		private function ShowAllApplication()
		{
			session_start();
			$_SESSION['application_list'] = $currentApplication;
			for($index = 0; $index < count($currentApplication); $index++)
			{
				print_r($currentApplication[$index][3]);//學校
				echo " ";print_r($currentApplication[$index][4]);//系所
				echo " <a href='ShowApplication.php?index=$index'>";
				print_r($currentApplication[$index][2]);
				echo "</a>";//顯示學生名字及連結;
			}
		}

		private function ShowReviewFailed()//顯示沒通過審查的申請書
		{
			session_start();
			$_SESSION['application_list'] = $currentApplication;
			for($index = 0; index < count($currentApplication); $index++)
			{
				if($currentApplication[$index][11]== 2)//2代表沒通過
				{
					print_r($currentApplication[$index][3]);//學校
					echo " ";print_r($currentApplication[$index][4]);//系所
					echo " <a href='ShowApplication.php?index=$index'>";
					print_r($currentApplication[$index][2]);
					echo "</a>";//顯示學生名字及連結;
				}
			}
		}

		private function ShowNotReview()//顯示尚未審查的申請書
		{
			session_start();
			$_SESSION['application_list'] = $currentApplication;
			for($index = 0; index < count($currentApplication); $index++)
			{
				if($currentApplication[$index][11]== 0)//0代表還沒審查
				{
					print_r($currentApplication[$index][3]);//學校
					echo " ";print_r($currentApplication[$index][4]);//系所
					echo " <a href='ShowApplication.php?index=$index'>";
					print_r($currentApplication[$index][2]);
					echo "</a>";//顯示學生名字及連結;
				}
			}
		}

		private function ShowReviewSuccess()//顯示通過審查的申請書
		{
			session_start();
			$_SESSION['application_list'] = $currentApplication;
			for($index = 0; index < count($currentApplication); $index++)
			{
				if($currentApplication[$index][11]== 1)//1代表通過
				{
					print_r($currentApplication[$index][3]);//學校
					echo " ";print_r($currentApplication[$index][4]);//系所
					echo " <a href='ShowApplication.php?index=$index'>";
					print_r($currentApplication[$index][2]);
					echo "</a>";//顯示學生名字及連結;
				}
			}
		}

		private function ChangeApplicationState($state)//改變狀態
		{
			$currentApplication->State = $state;
		}

		private function SendEmailToTeacher($Email)//顯示寄信給推薦教授的連結，用新分頁開啟
		{

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

