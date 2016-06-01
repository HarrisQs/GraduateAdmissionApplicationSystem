<!DOCTYPE HTML>
<?php
	$currentAccount = "Rita1234";
	include_once "../Repository Sub-system/ApplicationDB.php";
	$Database = new ApplicationDB();
	$DE;
	//var_dump(json_decode('{"foo":"bar","aaa":"bbb"}'));
	//echo $DE['foo'];
	$DE = $Database->GetLastHistory("Rita1234");
	//echo $DE;
	//echo $DE;
	$DE = str_replace(']', '', $DE);
	$DE = str_replace('[', '', $DE);
	$DE = str_replace('\"', '"', $DE);
	$DE[0]='\'';
	$DE[256]='\'';
	echo $DE;
	var_dump(json_decode($DE));
	//echo $DE[0];
	//echo $Database->GetLastHistory("Rita1234");
	//echo $DE[0];
	if($Database->GetLastHistory($currentAccount)=="You don’t have last history")
		echo "Test OK";
	else
?>
