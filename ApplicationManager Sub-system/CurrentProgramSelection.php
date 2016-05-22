<?php
	include_once "../Repository Sub-system/ApplicationDB.php";
	class CurrentProgramSelection
	{
		private $ProgramSelection;
		private $Account;

		private $Database;

		function __construct()
		{
			$this->Database = new ApplicationDB();
		}

		public function SetProgramSelection($programselectioon,$currentAccount)
		{
			$Account = $currentAccount;
			$this->ProgramSelection = $programselectioon;
		}

		public function SaveToDB()
		{
			$this->Database->SaveProgramSelection($this->ProgramSelection,$this->Account);
		}
	}
?>