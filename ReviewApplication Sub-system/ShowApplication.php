<?php
	session_start();
	$index = $_GET['index'];
	$currentApplication = $_SESSION["application_list"];
	$currentApplication = unserialize($currentApplication);
	unset($_SESSION['application_list']);
?>
<html>
	<body>
	<?php 
		echo "學校: ";print_r($currentApplication[$index]["School"]);
		echo "<br>系所: ";print_r($currentApplication[$index]["Department"]);
		echo "<br>姓名: ";print_r($currentApplication[$index]["Name"]);
		echo "<br>CV: ";print_r($currentApplication[$index]["CV"]);
		echo "<br>SOP: ";print_r($currentApplication[$index]["SOP"]);
		echo "<br>Program Selection:";print_r($currentApplication[$index]["ProgramSelection"]);
	?>
	<br>
	<a target='_blank' href='mailto:<?php print_r($currentApplication[$index]["TeacherEmail"]);?>'>寄信給推薦教授</a>
	</body>
	<?php 
		echo "<br>申請書狀態: ";
		switch($currentApplication[$index]["Status"])
		{
			case '0':
				echo "未送出";
				break;
			case '1':
				echo "尚未審查";
				break;
			case '2':
				echo "通過";
				break;
			case '3':
				echo "未通過";
				break;
		}	
	?>

	<form name="action" action="SetState.php" method="post">
        <select name = "action">
          <option>請選擇審查結果</option>
          <option value="Change_Status_Success">通過</option>
          <option value="Change_Stautus_Fail">不通過</option>
          <option value="Change_status_NotReview">尚未審查</option>
        </select>
      <input type="submit" >
    </form>

</html>