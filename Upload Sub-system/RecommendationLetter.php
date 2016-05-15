<?php
//2016/05/12
//Programmer：張弘瑜
//推薦信存到資料庫的部分
	include_once"../Respository Sub-system/CennectDB.php"
	class RecommendationLetter
	{
		private $DBLink;
		private $FileName;
		private $FileAddress;
		function __construct()
		{
			$this->DBLink = new ConnectDB();
		}
		function __destruct()
		{

		}
		public function SaveRecommendationLetter($fileName)//把參數設定好 並且呼叫儲存的
		{
			$this->FileName = $fileName;
			$this->FileAddress = "";
			while(!$this->SaveToDB()){}//直到成功存入DB為止
		}
		public function SaveToDB()//負責來存進資料庫的
		{
			if($this->DBLink->SaveRecommendationLetter($this->FileName, $account))
				return true;
			else
				return false;
		}

	}

?>