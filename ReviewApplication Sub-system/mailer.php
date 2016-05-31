<?php 
					include ("PHPMailer/PHPMailerAutoload.php");
					session_start();
					mb_internal_encoding('UTF-8');  
					$TeacherEmail = $_SESSION['TeacherEmail'];
					$Subject = $_POST['Subject'];
					$Content = $_POST['Content'];
					$Name = $_POST['Name'];
					$mail= new PHPMailer(); //建立新物件   
					$mail->IsSMTP(); //設定使用SMTP方式寄信   
					$mail->SMTPAuth = true; //設定SMTP需要驗證 
					$mail->SMTPSecure = "ssl";  
					$mail->Host = "smtp.gmail.com"; //設定SMTP主機   
					$mail->Port = 465; //設定SMTP埠位，預設為25埠  
					$mail->CharSet = "big5"; //設定郵件編碼  
					 
					$mail->Username = "steven55887@gmail.com"; //設定驗證帳號   
					$mail->Password = "A20992589"; //設定驗證密碼   
					 
					$mail->From = $TeacherEmail; //設定寄件者信箱   
					$mail->FromName = mb_encode_mimeheader($Name , "UTF-8"); //設定寄件者姓名   
					 
					$mail->Subject = mb_encode_mimeheader($Subject, "UTF-8"); //設定郵件標題   
					$mail->Body = $Content; //設定郵件內容 
					$mail->IsHTML(true); //設定郵件內容為HTML   
					$mail->AddAddress("steven558877@gmail.com", "安安"); //設定收件者郵件及名稱   
					if(!$mail->Send()) {   
					echo "Mailer Error: " . $mail->ErrorInfo;   
					} else {   
					echo "訊息已寄出，可以關掉視窗了!";   
					}

?>