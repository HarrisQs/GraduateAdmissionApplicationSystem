<?php
	include_once "../Repository Sub-system/ApplicationDB.php";
	class CurrentApplication
	{
		private $State;

		public function __construct()
		{

		}

		public function GetTeacherEmail()
		{

		}

		public function SetState($account,$state)
		{
			$this->State = $state;
			$this->SaveToDB($account);

		}

		public function SaveToDB($account)
		{
			$applicationDB = new ApplicationDB();
			if($applicationDB->SaveState($this->State, $account) == true)
				echo "更改成功";
			else 
				echo "更改失敗，請再試一次";
			echo "<br>此頁面將於五秒後跳轉至首頁。";
		}
	}
?>


<html>   
<head> 
<meta http-equiv="refresh" content="5;url=<?php echo 'ReviewIndex.php'; ?>">   
</head>   

</html>
