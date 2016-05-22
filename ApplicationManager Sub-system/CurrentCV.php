<?php
	include_once "../Repository Sub-system/ApplicationDB.php";
	class CurrentCV
	{
		private $CV;
		private $Account;

		private $Database;

		function __construct()
		{
			$this->Database = new ApplicationDB();
		}

		public function SetCV($cV,$currentAccount)
		{
			$Account = $currentAccount;
			$this->CV = $cV;
		}

		public function SaveToDB()
		{
			$this->Database->SaveCV($this->CV,$this->Account);
		}
	}
?>