<?php
    $account = $_POST["ID"];
    $password = $_POST["password"];
    include_once "../Repository Sub-system/ConnectDB.php";

	$setnewpassword = new ForgetPassword();
	$setnewpassword->ResetPassword($account,$password);
	class ForgetPassword
	{
		private $DataBase;
		Public function ResetPassword($account,$password)
		{
			
			$query ="UPDATE `account_data` SET `pass`= '" .$password. "' WHERE `account`= '" .$account. "'";
			$this->DataBase = new ConnectDB();
			$this->DataBase->DB_Update($query);
			
			
					echo '<script language="javascript">';
					echo 'alert("更改成功!請等3秒後跳轉頁面")';
					echo '</script>';	
				
					usleep(1000000);
					echo '<meta http-equiv="refresh" content="2;url=../index.html" />';
			
			/*
			if ( !( $database = mysql_connect( "localhost", "se", "se" ) ) )
			die( "Could not connect to database </body></html>" );
			if ( !mysql_select_db( "se2", $database ) )
			die( "Could not open products database </body></html>" );
			if ( !( $result = mysql_query( $query, $database ) ) )
			{
				print( "<p>Could not execute query!</p>" );
				die( mysql_error() . "</body></html>" );
			}
			mysql_close( $database );*/
			
					
		}
		Private function SaveResetPasswordLog($account)
		{
			//LogDB::SaveResetPasswordLog(account);
		}
	}
?>