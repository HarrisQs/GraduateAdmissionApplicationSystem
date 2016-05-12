<?php
	class ConnectDB //連接資料庫
	{
		private $db  = "repository sub-system";
		private $server="127.0.0.1";
		private $stduser="root";
		private $stdpass= "sofsdsdtware";
		//private $stdpass= "software";

		public function Connect()
		{
			if(($this->server != "") && ($this->stduser != "") && ($this->stdpass != ""))
			{
				$DBlink = @mysqli_connect($this->server, $this->stduser, $this->stdpass)
							or  $this->CatchError("無法連接資料庫,請檢查連線資訊!<BR>");;
			}
		}
		private function CatchError($Error)
		{
			echo $Error;
		}
	}
?>