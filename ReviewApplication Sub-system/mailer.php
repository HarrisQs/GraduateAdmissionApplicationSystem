<?php 
					include ("PHPMailer/PHPMailerAutoload.php");
					session_start();
					mb_internal_encoding('UTF-8');  
					$TeacherEmail = $_SESSION['TeacherEmail'];
					$Subject = $_POST['Subject'];
					$Content = $_POST['Content'];
					$Name = $_POST['Name'];
					$mail= new PHPMailer(); //建立新物件   
					
?>

<!DOCTYPE HTML>
<!--
  Ex Machina by TEMPLATED
 templated.co @templatedco
 Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
 -->
<html>
    <head>
        <title>Software Engineering</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link rel='stylesheet' type='text/css'>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
            <script src="js/skel.min.js"></script>
            <script src="js/skel-panels.min.js"></script>
            <script src="js/init.js"></script>
            <noscript>
                <link rel="stylesheet" href="css/skel-noscript.css" />
                <link rel="stylesheet" href="css/style.css" />
                <link rel="stylesheet" href="css/style-desktop.css" />
            </noscript>
            </head>
    <body class="no-sidebar">
        
        <!-- Header -->
        <div id="header">
            <div class="container">
                
                <!-- Logo -->
                <div id="logo" style="font-size:11px;">
                    <h1><a href="#">Web-based graduate <br>admission application system</a></h1>
                </div>
                
                <!-- Nav -->
                <nav id="nav">
                    <ul>
                   
                    </ul>
                </nav>
                
            </div>
        </div>
        <!-- Header -->
        
        <!-- Banner -->
        <div id="banner">
            <div class="container">
            </div>
        </div>
        <!-- /Banner -->
        
        <!-- Main -->
        <div id="page">
            
            <!-- Main -->
            <div id="main" class="container">
                <div class="row">
                    <div class="12u">
                        <section>
                            <header>
                                <h2>Send Email</h2>
                                <span class="byline">
<?php
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
					echo "<br><br><div style=\"width:300px;height:20px;margin:0 auto;\">訊息已寄出，可以關閉此頁面了!";   
					}

?>
                                </span>
                            </header>
                            <p>....</p>
                        </section>
                    </div>
                    
                </div>
            </div>
            <!-- Main -->
            
        </div>
        <!-- /Main -->
        
        <!-- Copyright -->
        <div id="copyright" class="container">
            Design: <a href="http://templated.co">TEMPLATED</a> Images: <a href="http://unsplash.com">Unsplash</a> (<a href="http://unsplash.com/cc0">CC0</a>)
        </div>
        
        
    </body>
</html>


