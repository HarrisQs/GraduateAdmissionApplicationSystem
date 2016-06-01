<!DOCTYPE HTML>
<?php
	session_start();
	$currentaccount = $_SESSION['currentAccount'];
	include_once "../Repository Sub-system/ApplicationDB.php";
	$Database = new ApplicationDB();
	$ConnDB = new ConnectDB();



	//$DE = $Database->GetLastHistory("Rita1234");

	if($Database->GetLastHistory($currentaccount)=="You don’t have last history")
		header("Location: ../ApplicationManager Sub-system/interface_FillForm.html");
	else
	{
		$jsonResult = $ConnDB->DB_SelectString("select * from application_data where account= '$currentaccount' ");
		foreach($jsonResult as $key => $Value) //將json型態的array轉為php可用的array
		{

		    $jsonResult[$key] = json_decode($Value, true); 
		}	
		$userSchool = $jsonResult[0]["School"];
		$userEmail = $jsonResult[0]["Email"];
		$userName = $jsonResult[0]["Name"];
		$userDepartment = $jsonResult[0]["Department"];
		$userCV = $jsonResult[0]["CV"];
		$userSOP = $jsonResult[0]["SOP"];
		$userTeacher = $jsonResult[0]["TeacherEmail"];
		$userProgramSelection = $jsonResult[0]["ProgramSelection"];
		$userTranscript = $jsonResult[0]["Transcipts"];
		$userReLetter = $jsonResult[0]["RecommendationLetter"];
		$userStatus = $jsonResult[0]["Status"];

		switch ($userStatus) 
	{
		case '0':
			$userStatus = '未送出';
			break;
		case '1':
			$userStatus = '代批閱';
			break;
		case '2':
			$userStatus = '審核通過';
			break;
		case '3':
			$userStatus = '審核未通過';	
			break;	
		default:
			# code...
			break;
	}
	}
?>
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
                        <li class="active"><a href="student.html">Student</a></li>
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
                                <h2 align='center'>Application Form</h2>&nbsp;
                                <!-- <span class="byline"> -->
                                    <FORM name="basicData" method="POST" action="FillOutData.php" enctype="multipart/form-data">

                                    <CENTER>
                                    <TABLE width='600' align='center' border='10' style="border:3px #FFD382 dashed;" cellpadding="10">
                
                                        <!-- <TR bgcolor='#7700FF' valign='center'> -->
                                            <!-- <H3 bgcolor='#B088FF' >基本資料填寫</H3> -->
                                        <!-- </TR> -->

                                        <TR bgcolor='#0044BB' valign='center'>
                                            <TD align='center' height='32' width='100'></TD>
                                            <TD align='center'></TD>  
                                        </TR>

                                        <TR>
                                            <TD bgcolor='#5555FF' valign='center' align='center' height='32'>
                                            <font color="#DDDDDD">學生姓名</font></TD>
                                            <TD bgcolor='#009FCC' align='center'><?php echo $userName?>
                                        </TR>


                                        <TR bgcolor='#5555FF' valign='center'>
                                            <TD align='center' height='32'>
                                            <font color="#DDDDDD">電子信箱</font>
                                            </TD >
                                            <TD bgcolor='#009FCC' align='center'><?php echo $userEmail?>
                                        </TR>

                                        <TR bgcolor='#5555FF' valign='center'>
                                                <TD align='center' height='32'>
                                                <font color="#DDDDDD">學校</font>
                                                </TD>
                                                <TD bgcolor='#009FCC' align='center'><?php echo $userSchool?>
                                               
                                        </TR>

                                        <TR bgcolor='#5555FF' valign='center'>
                                                <TD align='center' height='32'>
                                                <font color="#DDDDDD">系所</font>
                                                </TD>
                                                <TD bgcolor='#009FCC' align='center'><?php echo $userDepartment?>
                                        </TR>


                                        <TR bgcolor='#0044BB' valign='center'>
                                            <TD>
                                            <TD>
                                            <font color="#DDDDDD">＋＋＋＋＋＋＋＋＋＋＋申請資料填寫＋＋＋＋＋＋＋＋＋＋＋</font>
                                            </TD>
                                            </TD>
                                        </TR>

                                        <TR bgcolor='#5555FF' valign='center'>
                                            <TD align='center' height='32' width='100'></TD>
                                            <TD align='center'><font color="#DDDDDD"></font>
                                            </TD>  
                                        </TR>

                                        <TR bgcolor='#5555FF' valign='center'>
                                            <TD align='center' height='32'>
                                            <font color="#DDDDDD">教授電子信箱</font>
                                            </TD>
                                            <TD bgcolor='#009FCC' align='center'><?php echo $userTeacher?>
                                        </TR>


                                        <TR bgcolor='#5555FF' valign='center'>
                                            <TD align='center' height='32'>
                                            <font color="#DDDDDD">動機簡述</font>
                                            </TD>
                                            <TD bgcolor='#009FCC' align='center'><?php echo $userSOP?>
                                        </TR>

                                        <TR bgcolor='#5555FF' valign='center'>
                                            <TD align='center' height='32'>
                                            <font color="#DDDDDD">申請系所</font>
                                            </TD>
                                            <TD bgcolor='#009FCC' align='center'><?php echo $userProgramSelection?>
                                        </TR>

                                        <TR bgcolor='#5555FF' >
                                            <TD align='center' height='10'>
                                            <font color="#DDDDDD">自傳</font>
                                            </TD>
                                            <TD bgcolor='#009FCC' align='center'><?php echo $userCV?>
                                        </TR>

                                        <TR bgcolor='#5555FF' valign='center'>
                                            <TD align='center' height='32'>
                                            <font color="#DDDDDD">上傳成績單</font>
                                            </TD>
                                            <TD bgcolor='#009FCC' align='center'><?php echo $userTranscript?>
                                        </TR>

                                        <TR bgcolor='#5555FF' valign='center'>
                                            <TD align='center' height='32'>
                                            <font color="#DDDDDD">審查狀態</font>
                                            </TD>
                                            <TD bgcolor='#009FCC' align='center'><?php echo $userStatus?>
                                        </TR>

                                    </TABLE>
                                    </CENTER>
                                    
                                </FORM>
                                <!-- </span> -->
                            </header>
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
