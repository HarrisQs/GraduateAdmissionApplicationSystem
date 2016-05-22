<?php
	include_once "../Repository Sub-system/ApplicationDB.php";
	class CurrentTranscripts
	{
		private $Transcripts;
		private $Account;

		private $Database;

		function __construct()//連接資料庫
		{
			$this->Database = new ApplicationDB();
		}

		public function SetTranscripts($tra,$currentAccount)//Set帳號及檔案
		{
			$Account = $currentAccount;
			$Transcripts = $tra;
			$this->Upload($Transcripts);
		}

		public function Upload($file)//上傳檔案，檢查是否錯誤以及檔案大小(>2MB不給船傳)
		{
			$FileName=iconv('utf-8','big5',$_FILES[$this->Transcripts]["name"]);
			if($_FILES[$file]["error"])
			{
				echo '<script type="text/javascript">
						alert("上傳失敗!");
						location.href="UploadUI.html";
					</script>';
					return false;
			}
			if($_FILES[$file]["size"]/1024 > 2000)
			{
				echo "File too big";
				return false;
			}

			move_uploaded_file($_FILES[$file]["tmp_name"], "UploadFile/".$FileName); 
			$this->Database->SaveTransrcipts($FileName,$this->Account);
			return true;
		}
	}
?>