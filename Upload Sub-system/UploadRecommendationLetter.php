<?php
//2016/05/15
//Programmer：張弘瑜
//推薦信上傳的部分
	include_once"../Respository Sub-system/CennectDB.php"
	class UploadRecommendationLetter
	{
		private $RecommendationLink;
		function __construct()
		{
			$this->RecommendationLink = new RecommendationLetter();
		}
		function __destruct()
		{

		}
		public function Upload()//判斷是否上傳成功
		{
			$fname=$_FILES["ufile"]["name"];
		}
	}

?>