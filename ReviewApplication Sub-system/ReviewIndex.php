<html>
<?php 
  /*include_once"../AccountManager-Sub-system/LogIn.php";
  $login = new LogIn;
	$TeacherID = $login->getaccount();
  */
  $TeacherID = "adminsteven";
?>
<body>
<form name="action" action="Review.php" method="post">
    <select name = "action">
    <option>請選擇要執行的項目</option>
    <option value="Show_All">顯示全部申請書</option>
    <option value="Show_NotReview">顯示尚未審查的申請書</option>
    <option value="Show_Success">顯示通過的申請書</option>
    <option value="Show_Failed">顯示未通過的申請書</option>
  </select>
  <input type="hidden" name="TeacherID" value =<?php echo $TeacherID ?> >
  <input type="submit">
</form>
