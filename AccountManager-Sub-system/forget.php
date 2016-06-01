<?php
    $account = $_POST["ID"];
    $Email = $_POST["email"];
	
    include_once "../Repository Sub-system/ConnectDB.php";
	
	$forgetpw = new ForgetPassword();
	$forgetpw->ResetPassword($account,$Email);
	
	class ForgetPassword
	{
		private $DataBase;
		Public function ResetPassword($account, $Email)
		{
			/*
			if ( !( $database = mysql_connect( "localhost", "se", "se" ) ) )
			die( "Could not connect to database </body></html>" );
			if ( !mysql_select_db( "se2", $database ) )
			die( "Could not open products database </body></html>" );
			*/
			$this->DataBase = new ConnectDB();

			$sql="SELECT `Email` FROM `account_data` WHERE `account`='".$account."'";	
			$result=mysql_query($sql);	
			$row_result=mysql_fetch_assoc($result);
			if(isset($account))
			{
				//將讀取出來的資料取出欄位名稱為username的資料，並且存在$admin
				$admin=$row_result["Email"];
				if($Email==$admin)
				{
					echo "vaildent success! we will email to you!";
					/*if(mail("miranda84315@gmail.com","change password","please to click this:","from:s1021752@mail.yzu.edu.tw"))
						echo "信件已經發送成功。";//寄信成功就會顯示的提示訊息
					else
						echo "信件發送失敗！";//寄信失敗顯示的錯誤訊息
					return true;*/
										
					require("../phpmailer/class.phpmailer.php");
					 mb_internal_encoding('UTF-8');   
					$mail = new PHPMailer();
					$mail->IsSMTP();
					$mail->SMTPAuth = true; // turn on SMTP authentication
					//這幾行是必須的

					$mail->Username = "miranda84315@gmail.com";
					$mail->Password = "ab1c2d3e45fg";
					//這邊是你的gmail帳號和密碼

					$mail->FromName = "se";
					// 寄件者名稱(你自己要顯示的名稱)
					$webmaster_email = "miranda84315@gmail.com"; 
					//回覆信件至此信箱


					$email="$Email";
					// 收件者信箱
					$name="$account";
					// 收件者的名稱or暱稱
					$mail->From = $webmaster_email;


					$mail->AddAddress($email,$name);
					$mail->AddReplyTo($webmaster_email,"Squall.f");
					//這不用改

					$mail->WordWrap = 50;
					//每50行斷一次行

					//$mail->AddAttachment("/XXX.rar");
					// 附加檔案可以用這種語法(記得把上一行的//去掉)

					$mail->IsHTML(true); // send as HTML

					$mail->Subject = "Change New Password!"; 
					// 信件標題
					$mail->Body = "Hi ".$account.", please click this web to change your new password :http://10.211.55.3:8000/GA/AccountManager-Sub-system/newpassword.html ";
					//信件內容(html版，就是可以有html標籤的如粗體、斜體之類)
					$mail->AltBody = "信件內容"; 
					//信件內容(純文字版)

					if(!$mail->Send()){
					echo "寄信發生錯誤：" . $mail->ErrorInfo;
					//如果有錯誤會印出原因
					}
					else{ 
					
					echo '<script language="javascript">';
					echo 'alert("寄信成功!請至信箱收信更改密碼")';
					echo '</script>';	
				
					usleep(1000000);
					echo '<meta http-equiv="refresh" content="2;url=../index.html" />';
					}


					
				}
				else
				{
					echo '<script language="javascript">';
					echo 'alert("失敗!帳號跟信箱不符合")';
					echo '</script>';	
				
					usleep(1000000);
					echo '<meta http-equiv="refresh" content="2;url=../AccountManager-Sub-system/forget.html" />';
					
					return false;
				}
			}
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