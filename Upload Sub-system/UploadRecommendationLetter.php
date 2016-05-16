<?php
//2016/05/15
//Programmer：張弘瑜
//推薦信上傳的部分
	include_once"RecommendationLetter.php";
	new UploadRecommendationLetter();
	class UploadRecommendationLetter
	{
		private $RecommendationLink;
		function __construct()
		{
			date_default_timezone_set('Asia/Taipei');//規定時區
			$this->RecommendationLink = new RecommendationLetter();
			$this->Upload();
		}
		function __destruct()
		{

		}
		public function Upload()
		{
			$fnaddme=$_POST["Student_Name"];
			$error_msg=$_FILES["fileToUpload"]["error"];
			$fname=iconv('utf-8','big5',$_FILES["fileToUpload"]["name"]);
			$tmpname=iconv('utf-8','big5',$_FILES["fileToUpload"]["tmp_name"]); //路徑
			$fsize=$_FILES["fileToUpload"]["size"];
			$ftype=$_FILES["fileToUpload"]["type"];
			echo "已經收到上傳的檔案,檔名是 -> ".$fname."<br>";
			echo "伺服器中暫存的位置和檔名 -> ".$tmpname."<br>";
			echo "上傳檔案的大小 -> ".$fsize."<br>";
			echo "上傳檔案的檔案類型 -> ".$ftype."<br>";
			echo "錯誤訊息 ->".$error_msg."<br>";
			echo $fnaddme;
		}
	}

?>