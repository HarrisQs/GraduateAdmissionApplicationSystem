<?php
	include_once "CurrentApplication.php";
	session_start();
	$currentApplication = $_SESSION['application_list'];
	$index = $_SESSION['index'];
	$currentApplication = unserialize($currentApplication);	
	$currentApplicationclass = new CurrentApplication;
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
                        <li><a href="../AccountManager-Sub-system/LogOut.php">sign out</a></li>
                        <li class="active"><a href="Reviewindex.php">Teacher</a></li>
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
                                <h2>for student</h2>
                                <span class="byline">
                                	<?php
                                			switch ($_POST['action']) 
											{
												case 'Change_Status_Success':
													$currentApplication[$index]["Status"] = 2;
													$currentApplicationclass->SetState($currentApplication[$index]["account"],$currentApplication[$index]["Status"]);
													break;
												case 'Change_Stautus_Fail':
													$currentApplication[$index]["Status"] = 3;
													$currentApplicationclass->SetState($currentApplication[$index]["account"],$currentApplication[$index]["Status"]);
													break;
												case 'Change_status_NotReview': 
													$currentApplication[$index]["Status"] = 1;
													$currentApplicationclass->SetState($currentApplication[$index]["account"],$currentApplication[$index]["Status"]);
													break;
											}
                                	 ?>
                                </span>
                            </header>
                            <p></p>
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