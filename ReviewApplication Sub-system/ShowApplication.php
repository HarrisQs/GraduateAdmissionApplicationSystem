<?php
	session_start();
	$index = $_GET['index'];
	$currentApplication = $_SESSION['application_list'];
	$_SESSION['index'] = $index;
	$currentApplication = unserialize($currentApplication);
	setcookie('Transcipts_name',$currentApplication[$index]["Transcipts"]);
	setcookie('Letter_name',$currentApplication[$index]["RecommendationLetter"]);
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
                        <li><a href="../AccountManager-Sub-system/index.html">sign out</a></li>
                        <li class="active"><a href="teacher.html">Teacher</a></li>
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
		echo "學校: ";print_r($currentApplication[$index]["School"]);
		echo "<br>系所: ";print_r($currentApplication[$index]["Department"]);
		echo "<br>姓名: ";print_r($currentApplication[$index]["Name"]);
		echo "<br>CV: ";print_r($currentApplication[$index]["CV"]);
		echo "<br>SOP: ";print_r($currentApplication[$index]["SOP"]);
		echo "<br>Program Selection:";print_r($currentApplication[$index]["ProgramSelection"]);
	?>
	<br>
	<a target='_blank' href='mailto:<?php print_r($currentApplication[$index]["TeacherEmail"]);?>'>寄信給推薦教授</a><br>
	<a href='Download.php?object=1'>下載成績單</a><br>
	<a href='Download.php?object=2'>下載推薦信</a>
	</body>
	<?php 
		echo "<br>申請書狀態: ";
		switch($currentApplication[$index]["Status"])
		{
			case '0':
				echo "未送出";
				break;
			case '1':
				echo "尚未審查";
				break;
			case '2':
				echo "通過";
				break;
			case '3':
				echo "未通過";
				break;
		}	
	?>
	<br><br>
	<form name="action" action="SetState.php" method="post">
        <select name = "action">
          <option>請選擇審查結果</option>
          <option value="Change_Status_Success">通過</option>
          <option value="Change_Stautus_Fail">不通過</option>
          <option value="Change_status_NotReview">尚未審查</option>
        </select>
      <input type="submit" >
    </form>
	<a href = "ReviewIndex.php">回到首頁</a>
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
