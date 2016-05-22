<?php
//2016/05/12
//Programmer：張弘瑜
//負責與資料庫連接的部分
	class ConnectDB //連接資料庫
	{
		private $db  = "err";
		private $server="127.0.0.1";
		private $stduser="root";
		private $stdpass= "software";
		private $DBlink;

		function __construct()//資料庫連接 建構子
		{
			$this->DBlink = @mysql_connect($this->server, $this->stduser, $this->stdpass)
							or  $this->CatchError("無法連接資料庫,請檢查連線資訊!");
			mysql_select_db($this->db);
			mysql_query('set names utf8');//處理編碼問題
		}
		function __destruct()//解構子
		{
      		$this->DBClose();
   		}
		public function DB_SelectBool($SQL)//DB Select command
		{		
       		$result = @mysql_db_query($this->db, $SQL) or $this->CatchError("資料庫名稱或指令敘述錯誤!");
       		if(mysql_num_rows($result) == 0)//有沒有找到資料
       			return false;
       		else
       			return true;

		}
		public function DB_SelectString($SQL)//DB Select command
		{		
       		$result = @mysql_db_query($this->db, $SQL) or $this->CatchError("資料庫名稱或指令敘述錯誤!");
       		$answer;
       		while ($row = mysql_fetch_assoc($result))
       			$answer[] = json_encode($row);
       		return $answer;
		}
		public function DB_SelectAdministrator($SQL)//DB Select Administrator
		{		
       		$result = @mysql_db_query($this->db, $SQL) or $this->CatchError("資料庫名稱或指令敘述錯誤!");
       		$answer = array();
       		$counter = 0;
       		while ($row = mysql_fetch_assoc($result))
       		{
       			$answer = $row;
       			//print $answer['IsAdministator'];印出是否為管理者
       		}
       		return $answer['IsAdministator'];
		}
		public function DB_Update($SQL)//DB Update command
		{		
       		@mysql_db_query($this->db, $SQL) or $this->CatchError("資料庫名稱或指令敘述錯誤!");
		}
		public function DB_Insert($SQL)//DB Update command
		{	echo $SQL;
       		@mysql_db_query($this->db, $SQL) or $this->CatchError("資料庫名稱或指令敘述錯誤!");
		}
		private function CatchError($Error)//處裡連接資料庫發生的錯誤
		{
			echo '<script type="text/javascript">
					alert("'.$Error.'");
				  </script>';
			exit;//結束PHP的程式
		}
		private function DBClose()//處裡斷開與資料庫的連接
		{	
			@mysql_close($this->DBlink);
		}

	}
?>