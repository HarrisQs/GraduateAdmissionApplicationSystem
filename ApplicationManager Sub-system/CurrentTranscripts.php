<?php
	include_once "../Repository Sub-system/ApplicationDB.php";
	class CurrentTranscripts
	{
		//private $Transcripts;
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
			$this->Upload();
		}

		public function Upload()//檔名、類型、大小、路徑、上傳成功或失敗，判斷上傳檔案大小符合(<2MB才上傳)
		{
			//$FileName=iconv('utf-8','big5',$_FILES[$this->Transcripts]["name"]);
			if($this->FILEERR)
			{
				echo '<script type="text/javascript">
						alert("Upload Fail!");
						location.href="interface.html";
					</script>';
					return false;
			}
			if($this->FILESIZE/1024 > 2000)	//File size can't big than 2MB
			{
				echo "File too big, Pleaes trh another file or modify it.";
				return false;
			}

			move_uploaded_file($this->FILETMP, "UploadFile/".$this->FILENAME); 
			$this->Database->SaveTransrcipts($this->FILENAME,$this->Account);
			return true;
		}
	}
?>