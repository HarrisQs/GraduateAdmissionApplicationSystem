<?php
	include_once "../Repository Sub-system/ApplicationDB.php";
	class CurrentTranscripts
	{
		private $Transcripts;
		private $Account;

		//檔案基本資訊
		private $FILENAME;	//檔案名稱
		private $FILETYPE;	//檔案類型
		private $FILESIZE;	//檔案大小
		private $FILETMP;	//檔案暫存資料夾路徑
		private $FILEERR;	//檔案上傳成功/失敗(boolean)

		private $Database;

		function __construct()//連接資料庫
		{
			$this->Database = new ApplicationDB();
		}

		public function SetTranscripts($filename,$filetype,$filesize,$filetmp,$fileerr,$currentAccount)//Set帳號及檔案
		{
			$this->Account = $currentAccount;
			$this->FILENAME = $filename;
			$this->FILETYPE = $filetype;
			$this->FILESIZE = $filesize;
			$this->FILETMP = $filetmp;
			$this->FILEERR = $fileerr;
			$this->Upload($this->Transcripts);
		}

		public function Upload($file)//上傳檔案，檢查是否錯誤以及檔案大小(>2MB不給船傳)
		{
			$FileName=iconv('utf-8','big5',$_FILES[$this->Transcripts]["name"]);
			if($_FILES[$file]["error"])
			{
				echo '<script type="text/javascript">
						alert("Upload Fail!");
						location.href="interface.html";
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