<?php
    $account = $_POST["ID"];
	
	$logout = new LogOut();
	$logout->LoginSystem($account);
	
	class LogOut
	{
		Public Function LogoutSystem($account)
		{
			if(SaveLogoutLog($account))
				echo "登出成功";
			else
				echo "fail";
		}
		Private function SaveLogoutLog($account)
		{
			Return LogDB::SaveLogOutLog(account);	回傳到別人的資料庫的這裡
		}
	}
?>