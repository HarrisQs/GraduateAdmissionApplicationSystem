<html>
<?php 
	$TeacherID=20;
?>
<body>
<form name="action" action="Review.php" method="post">
    <select name = "action">
    <option>請選擇要執行的項目</option>
    <option value="All">顯示全部申請書</option>
    <option value="Failed">顯示不通過的申請書</option>
    <option value="NotReview">顯示尚未審查的申請書</option>
    <option value="Success">顯示通過的申請書</option>
    <option value="NotReview">顯示尚未審審查的申請書</option>
    <option value="Test">Shit</option>
  </select>
  <input type="hidden" name="aaa" value =<?php echo $TeacherID ?> >
  <input type="submit">
</form>
