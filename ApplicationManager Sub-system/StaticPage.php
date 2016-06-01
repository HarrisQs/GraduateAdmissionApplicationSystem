<!DOCTYPE HTML>
<?php
	$currentAccount = "Rita1234";
	include_once "../Repository Sub-system/ApplicationDB.php";
	$Database = new ApplicationDB();
	$DE;
	//$DE = json_decode('{"foo":"bar"}',true);
	//echo $DE['foo'];
	//$DE = (json_decode($Database->GetLastHistory("Rita1234"),true));
	$DE = $Database->GetLastHistory("Rita1234");
	$decode=json_decode($DE,true);
	echo $decode['account'];
	//echo $Database->GetLastHistory("Rita1234");
	//echo $DE[0];
	if($Database->GetLastHistory("currentAccount")=="You don’t have last history")
		echo "Test OK";
	else
?>
