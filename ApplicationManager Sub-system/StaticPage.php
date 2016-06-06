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
			$userStatus = '代批閱';
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
  <meta charset="utf-8">
  <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> -->
  <title>Software Engineering</title>
  <!-- <meta http-equiv="content-type" content="text/html; charset=utf-8" /> -->
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="js/skel.min.js"></script>
  <script src="js/skel-panels.min.js"></script>
  <script src="js/init.js"></script>
  <link rel="stylesheet" href="css_2/style.css">
  <link rel="stylesheet" href="css/skel-noscript.css" />
  <link rel="stylesheet" href="css/style.css" /> 
  <link rel="stylesheet" href="css/style-desktop.css" />
  <link rel="stylesheet" type="text/css" href="css_3/demo.css" />
  <link rel="stylesheet" type="text/css" href="css_3/style.css" />
  <!-- [if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif] -->
</head>
<body>
        <div id="header">
        <div class="container">
        <div id="logo" style="font-size:11px;">
          <h1><a href="#">graduate admission application system</a></h1>
        </div>
        <nav id="nav">
           <ul>
              <li><a href="../AccountManager-Sub-system/index.html">sign out</a></li>
              <li class="active"><a href="student.html">Student</a></li>
           </ul>
        </nav>
                
        </div>
        </div>


        <div id="banner">
            <div class="container">
            </div>
        </div>
        <!-- <div id="container_demo"> -->
        <!-- <div id="page" > -->

    <br><br><br>
    <header><h2 align="center">Application Form</h2></header>

    <!-- <div id="login" class="animate form"> -->
    <!-- <div id="animate form"> -->
    <!-- <div id="wrapper"> -->
    <!-- <div id="page"></div> -->
    <div id="wrapper">
    <FORM name="basicData" method="POST" action="FillOutData.php" enctype="multipart/form-data" >

    <h1 >基本資料填寫</h1>


    <font class="about">學生姓名　</font>　　　<?php echo $userName?><br><br>

    <font class="about">電子信箱　</font>　　　<?php echo $userEmail?><br><br>

    <font class="about">就讀學校　</font>　　　<?php echo $userSchool?><br><br>

    <font class="about">　系　所　</font>　　　<?php echo $userDepartment?><br><br>



    <h1>申請資料填寫</h1>

    <font class="about">教授信箱　</font>　　　<?php echo $userTeacher?><br><br>

    <font class="about">　動　機　</font>　　　<?php echo $userSOP?><br><br>

    <font class="about">申請系所　</font>　　　<?php echo $userProgramSelection?><br><br>

    <font class="about">　自　傳　</font>　　　
    <?php echo $userCV?><br><br>

    <font class="about">上傳成績單</font>　　　<?php echo $userTranscript?><br><br>

    <font class="about">審核狀態　</font>　　　<?php echo $userStatus?><br><br>

  </form>
  </div>

</body>
</html>
