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
					if(mail("miranda84315@gmail.com","change password","please to click this:","from:s1021752@mail.yzu.edu.tw"))
						echo "信件已經發送成功。";//寄信成功就會顯示的提示訊息
					else
						echo "信件發送失敗！";//寄信失敗顯示的錯誤訊息
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