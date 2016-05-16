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


if($error_msg){
?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script language="javascript">
		alert('上傳失敗!');
		location.href="student_homework.php";
	</script>
<?php
} else {
	//檔案上傳成功
	// echo "已經收到上傳的檔案,檔名是 -> ".$fname."<br>";
	// echo "伺服器中暫存的位置和檔名 -> ".$tmpname."<br>";
	// echo "上傳檔案的大小 -> ".$fsize."<br>";
	// echo "上傳檔案的檔案類型 -> ".$ftype."<br>";

	//檔案名稱 = 學生id+作業名
	$uploadhw = $hw.$student_id.".txt";

	// echo "XXX"."$uploadhw";
	//將檔案另存到指定的位置
	// $success=copy($tmpname,$uploadhw);
	move_uploaded_file($_FILES["ufile"]["tmp_name"],"upload/".$uploadhw);


	// echo "檔案已經複製成功!<br>";
	// echo "新的路徑和檔名如下:<br>";
	// echo realpath($uploadhw)."<p>";
	//刪除暫存器中的檔案
	unlink($tmpname);

	$sql_insert = "insert into student_hw(student_id,hw_id,upload_day) values('$student_id','$hw_id','$upload_date')";
	$objDB->Execute($sql_insert);


	?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script language="javascript">
		alert('上傳成功囉!');
		location.href="student_homework.php";
	</script>

















		}
	}

?>