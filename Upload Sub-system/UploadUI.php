<!-- 
2016/05/15
Programmer：張弘瑜
推薦信上傳介面的部分 
-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>
			Upload Recommendation Letter 
		</title>
	</head>
	<body>
		<form name="Upload_Form" method="post" action="UploadRecommendationLetter.php">
			Student Name : <input type="text" name="Student_Name">
			<br>
			Upload File : <input type="file" name="UFile">
			<br>
			<input type="submit" name="Submit" value="Ok">
			<input type="reset" name="Reset" value="Reset">
		</form>
	</body>
</html>