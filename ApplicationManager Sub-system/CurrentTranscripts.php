<?php
	include_once "../Repository Sub-system/ApplicationDB.php";
	class CurrentTranscripts
	{
		private $Transcripts;
		private $Account;

		private $Database;

		function __construct()
		{
			$this->Database = new ApplicationDB();
		}

		public function SetTranscripts($tra,$currentAccount)
		{
			$Account = $currentAccount;
			$Transcripts = $tra;
			$Transcripts=iconv('utf-8','big5',$_FILES["fileToUpload"]["name"]);//檔名中文轉碼
			$this->Upload($Transcripts);
		}

		public function Upload($fileName)
		{

		}

		public function SaveToDB()
		{
			$this->Database->SaveSOP($SOP,$Account);
		}
	}
?>