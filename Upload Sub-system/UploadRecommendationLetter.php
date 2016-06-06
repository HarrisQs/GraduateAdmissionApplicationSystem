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
		public function Upload()//1.把檔名 和學生帳號往後傳 2.檔案存好
		{
			$Saccount=$_POST["Student_Account"];
			$Fname=iconv('utf-8','big5',$_FILES["fileToUpload"]["name"]);//檔名中文轉碼
			if($_FILES["fileToUpload"]["error"])//判斷是否有上傳錯誤
			{
				echo '<script type="text/javascript">
						alert("上傳失敗!");
						location.href="UploadUI.html";
					</script>';
			}
			else
			{
				move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"Upload File/".$Fname);
				$this->RecommendationLink->SaveRecommendationLetter($_FILES["fileToUpload"]["name"], $Saccount);
				
				echo '<script type="text/javascript">
						alert("上傳成功!");
						location.href="https://www.google.com.tw/";
					</script>';
			}
		}
	}
?>