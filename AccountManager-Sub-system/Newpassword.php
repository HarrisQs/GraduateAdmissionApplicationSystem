<?php
    $account = $_POST["ID"];
    $password = $_POST["password"];
    

	$setnewpassword = new ForgetPassword();
	$setnewpassword->ResetPassword($account,$password);
	class ForgetPassword
	{
		Public function ResetPassword($account,$password)
		{
			
			$query ="UPDATE `accountdata` SET `Password`= '" .$password. "' WHERE `Account`= '" .$account. "'";
			
			if ( !( $database = mysql_connect( "localhost", "se", "se" ) ) )
			die( "Could not connect to database </body></html>" );
			if ( !mysql_select_db( "se", $database ) )
			die( "Could not open products database </body></html>" );
			if ( !( $result = mysql_query( $query, $database ) ) )
			{
				print( "<p>Could not execute query!</p>" );
				die( mysql_error() . "</body></html>" );
			}
			mysql_close( $database );
					
		}
		Private function SaveResetPasswordLog($account)
		{
			//LogDB::SaveResetPasswordLog(account);
		}
	}
?>