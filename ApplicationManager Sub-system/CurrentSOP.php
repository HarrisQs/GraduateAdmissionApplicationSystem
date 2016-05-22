<?php
	include_once "../Repository Sub-system/ApplicationDB.php";
	class CurrentSOP
	{
		private $SOP;
		private $Account;

		private $Database;

		function __construct()
		{
			$this->Database = new ApplicationDB();
		}

		public function SetSOP($sop,$currentAccount)
		{
			$this->Account = $currentAccount;
			$this->SOP = $sop;
		}

		public function SaveToDB()
		{
			$this->Database->SaveSOP($this->SOP,$this->Account);
		}
	}
?>