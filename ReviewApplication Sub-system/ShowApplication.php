<?php
	session_start();
	$index = $_GET['index'];
	$currentApplication = $_SESSION["application_list"];
	unset($_SESSION['application_list']);
?>
<html>
	<body>
	<?php 
		echo "學校: ";print_r($currentApplication[$index][3]);
		echo "<br>系所: ";print_r($currentApplication[$index][4]);
		echo "<br>姓名: ";print_r($currentApplication[$index][2]);
		echo "<br>CV: ";print_r($currentApplication[$index][5]);
		echo "<br>SOP: ";print_r($currentApplication[$index][6]);
		echo "<br>Program Selection:";print_r($currentApplication[$index][8]);
	?>
	<br>
	<a target='_blank' href='mailto:<?php print_r($currentApplication[$index][7]);?>'>寄信給推薦教授</a>
	</body>
	<?php 
		echo "<br>申請書狀態: ";print_r($currentApplication[$index][8]);	
	?>

	<form name="status" action="Review.php" method="post">
        <select name = "action">
          <option>請選擇審查結果</option>
          <option value="Success">通過</option>
          <option value="Fail">不通過</option>
          <option value="NotReview">尚未審查</option>
        </select>
      <input type="submit" >
    </form>

</html>