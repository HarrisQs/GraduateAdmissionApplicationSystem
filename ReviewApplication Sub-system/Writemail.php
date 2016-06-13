<?php
session_start();
$account = $_SESSION['account'];
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
                    <h1><a href="#">graduate admission application system</a></h1>
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
                                <br>
                                    
	<form action="mailer.php" method="post" style="text-align: center;">
      姓名：<input type="text" name="Name"><br><br>
主旨：<input type="text" name="Subject"><br><br>
內容：<textarea rows="8" cols="30" name="Content">學生的帳號是：<?php echo $account; ?>

請由此網址上傳: http://steven558877.ddns.net/GraduateAdmissionApplicationSystem/Upload%20Sub-system/UploadUI.html</textarea><br><br>
　                      
	　<input class="button" type="submit" value="送出信件">
	</form>
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














<html>

<html>

