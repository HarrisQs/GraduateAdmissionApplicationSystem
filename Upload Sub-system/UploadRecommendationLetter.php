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
			$this->RecommendationLink = new RecommendationLetter();
			$this->Upload();
		}
		function __destruct()
		{

		}
		public function Upload()
		{
			$fname=$_POST["Student_Name"];
			$error_msg=$_FILES["fileToUpload"]["name"];
			echo "string";
			echo $error_msg;
			echo $fname;
		}
	}

?>