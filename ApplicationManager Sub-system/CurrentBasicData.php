<?php
	//基本資料處理
	new currentBasicData();
	class currentBasicData
	{
		private $Account;
		$Email;
		private $Name;
		private $School;
		private $Department;

		function __construct()
		{
			echo "hrhrhr";
			$Email = "abc";
			echo $Email;
		}

		/*public function SetAccount($account, $currrentAccount)
		{
			$account = $currentAccount;
		}

		public function SetEmail($email, $currrentAccount)
		{
			$account = $currentAccount;
			$Email = $email;
		}

		public function SetName($name, $currentAccount)
		{
			$account = $currentAccount;
			$Name = $name;
		}

		public function SetSchool($school, $currentAccount)
		{
			$account = $currentAccount;
			$School = $school;
		}

		public function SetDepartment($department, $currentAccount)
		{
			$account = $currentAccount;
			$Department = $department;
		}

		public function SaveToDB()
		{
			echo "Test";
		}*/
	}
?>