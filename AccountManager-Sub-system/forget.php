<?php
    $account = $_POST["ID"];
    $Email = $_POST["email"];
	
	
	$forgetpw = new ForgetPassword();
	$forgetpw->ResetPassword($account,$Email);
	
	class ForgetPassword
	{
		Public function ResetPassword($account, $Email)
		{
			if ( !( $database = mysql_connect( "localhost", "se", "se" ) ) )
			die( "Could not connect to database </body></html>" );
			if ( !mysql_select_db( "se", $database ) )
			die( "Could not open products database </body></html>" );

			$sql="SELECT `Email` FROM `accountdata` WHERE `Account`='".$account."'";	
			$result=mysql_query($sql);	
			$row_result=mysql_fetch_assoc($result);
			if(isset($account))
			{
				//將讀取出來的資料取出欄位名稱為username的資料，並且存在$admin
				$admin=$row_result["Email"];
				if($Email==$admin)
				{
					echo "vaildent success! we will email to you!";
					return true;
				}
				else
				{
					echo "ID and Email not match! fail!";
					return false;
				}
			}
			mysql_close( $database );
		}
		Private function SaveResetPasswordLog($account)	//	SAVE THE NEW PASSWORD
		{
			//LogDB::SaveResetPasswordLog($account)
		}
		Private function SendEmail($Email)
		{
			//send email
		}
	}
?>