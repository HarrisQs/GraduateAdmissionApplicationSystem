<?php
	include_once"../Repository Sub-system/ConnectDB.php";
	include_once"../Repository Sub-system/ApplicationDB.php";

    $DoReview = new Review;
    $DoReview->Review();
	
	class Review
	{
		private $currentApplication;
		public function __construct()
		{
			$connectDB = new ConnectDB();
			$teacherID = $_POST['TeacherID'];

			$jsonResult = $connectDB->DB_SelectString("select School from account_data where account='$teacherID' ");
			foreach($jsonResult as $key => $Value) //將json型態的array轉為php可用的array
			{
	    		$jsonResult[$key] = json_decode($Value, true); 
			}
			$teacherschool =  $jsonResult[0]["School"];

			$jsonResult = $connectDB->DB_SelectString("select * from application_data where School='$teacherschool' ");
			foreach($jsonResult as $key => $Value) //將json型態的array轉為php可用的array
			{
		    	$jsonResult[$key] = json_decode($Value, true); 
			}
			$this->currentApplication = $jsonResult;			
		}
		public function Review()
		{
			$alias = serialize($this->currentApplication);
			$_SESSION['application_list'] = $alias;
			setcookie('application_list',$alias);
			switch ($_POST['action']) 
   				{
				    case 'Show_All':
				        Review::ShowAllApplication();				        
				        break;
				    case 'Show_Failed':
				        Review::ShowReviewFailed();
				        break;
				    case 'Show_NotReview':
				        Review::ShowNotReview();
				        break;
				    case 'Show_Success':
				    	Review::ShowReviewSuccess();
				    	break;

   				}
		}

		private function ShowThisApplication($index)
		{

		}

		private function ShowAllApplication()
		{
			session_start();
			$alias = serialize($this->currentApplication);
			$_SESSION['application_list'] = $alias;
			for($index = 0; $index < count($this->currentApplication); $index++)
			{
				echo $this->currentApplication[$index]["School"];//學校
				echo " ";
				echo $this->currentApplication[$index]["Department"];//系所
				echo " <a href='ShowApplication.php?index=$index'>";
				echo $this->currentApplication[$index]["Name"];
				echo "</a>";//顯示學生名字及連結;
				echo "<br>";
			}
		}

		private function ShowReviewFailed()//顯示沒通過審查的申請書
		{
			session_start();
			$alias = serialize($this->currentApplication);
			$_SESSION['application_list'] = $alias;
			for($index = 0; $index < count($this->currentApplication); $index++)
			{

				if($this->currentApplication[$index]["Status"] == 3)//3代表沒通過
				{
					echo $this->currentApplication[$index]["School"];//學校
					echo " ";
					echo $this->currentApplication[$index]["Department"];//系所
					echo " <a href='ShowApplication.php?index=$index'>";
					echo $this->currentApplication[$index]["Name"];
					echo "</a>";//顯示學生名字及連結;
					echo "<br>";
				}
			}
		}

		private function ShowNotReview()//顯示尚未審查的申請書
		{
			session_start();
			$alias = serialize($this->currentApplication);
			$_SESSION['application_list'] = $alias;
			for($index = 0; $index < count($this->currentApplication); $index++)
			{
				if($this->currentApplication[$index]["Status"] == 1)//1代表尚未審查
				{
					echo $this->currentApplication[$index]["School"];//學校
					echo " ";
					echo $this->currentApplication[$index]["Department"];//系所
					echo " <a href='ShowApplication.php?index=$index'>";
					echo $this->currentApplication[$index]["Name"];
					echo "</a>";//顯示學生名字及連結;
					echo "<br>";
				}
			}
		}

		private function ShowReviewSuccess()//顯示通過審查的申請書
		{
			session_start();
			$alias = serialize($this->currentApplication);
			$_SESSION['application_list'] = $alias;
			for($index = 0; $index < count($this->currentApplication); $index++)
			{
				if($this->currentApplication[$index]["Status"] == 2)//2代表通過
				{
					echo $this->currentApplication[$index]["School"];//學校
					echo " ";
					echo $this->currentApplication[$index]["Department"];//系所
					echo " <a href='ShowApplication.php?index=$index'>";
					echo $this->currentApplication[$index]["Name"];
					echo "</a>";//顯示學生名字及連結;
					echo "<br>";
				}
			}
		}

		private function ChangeApplicationState($state)//改變狀態
		{
			switch ($state) 
			{
				case 1:
					$this->Status=1;
					break;
				case 2:
					$this->Status=2;
					break;
				case 3:
					$this->Status=3;
					break;
			}
		}

		private function SendEmailToTeacher($Email)//顯示寄信給推薦教授的連結，用新分頁開啟
		{

		}
		public function GetApplication($School)
		{

			
		}
	}
?>

