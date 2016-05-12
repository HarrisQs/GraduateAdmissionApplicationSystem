<?php
	class ConnectDB //連接資料庫
	{
		private $db  = "repository sub-system";
		private $server="127.0.0.1";
		private $stduser="root";
		private $stdpass= "software";

		public function DBConnect($SQL)//資料庫連接
		{
			if(($this->server != "") && ($this->stduser != "") && ($this->stdpass != ""))
				$DBlink = @mysql_connect($this->server, $this->stduser, $this->stdpass)
							or  $this->CatchError("無法連接資料庫,請檢查連線資訊!");

			mysql_query("SET NAMES 'utf8'");//處理編碼問題
			mysql_select_db($this->db);

       		$rs = @mysql_db_query($SQL) or $this->CatchError("資料庫名稱或指令敘述錯誤!");

			//return mysql_insert_id();
				$this->DBClose($DBlink);

		}
		private function CatchError($Error)//處裡連接資料庫發生的錯誤
		{
			echo '<script type="text/javascript">
					alert("'.$Error.'");
				  </script>';
			exit;//結束PHP的程式
		}
		private function DBClose($DBlink)//處裡斷開與資料庫的連接
		{
				mysql_close($DBlink);
		}
	}
?>