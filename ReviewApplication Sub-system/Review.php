<?php
	include_once"../Repository Sub-system/ConnectDB.php";
	include_once"../Repository Sub-system/ApplicationDB.php";

	
	class Review
	{
		private $currentApplication;
		public function __construct()
		{
			$connectDB = new ConnectDB();
			$teacherID = $_POST['TeacherID'];
			$jsonResult = $connectDB->DB_SelectString("select School from account_data where account='$teacherID' ");
			foreach($jsonResult as $key => $Value) //將json型態的array轉為php可用的array
			{
	    		$jsonResult[$key] = json_decode($Value, true); 
			}
			$teacherschool =  $jsonResult[0]["School"];

			$jsonResult = $connectDB->DB_SelectString("select * from application_data where School='$teacherschool' ");
			foreach($jsonResult as $key => $Value) //將json型態的array轉為php可用的array
			{
		    	$jsonResult[$key] = json_decode($Value, true); 
			}
			$this->currentApplication = $jsonResult;


		}
		public function Review()
		{

			switch ($_POST['action']) 
   				{
				    case 'Show_All':
				        Review::ShowAllApplication();				        
				        break;
				    case 'Show_Failed':
				        Review::ShowReviewFailed();
				        break;
				    case 'Show_NotReview':
				        Review::ShowNotReview();
				        break;
				    case 'Show_Success':
				    	Review::ShowReviewSuccess();
				    	break;

   				}
		}

		private function ShowThisApplication($index)
		{

		}

		private function ShowAllApplication()
		{
			session_start();
			$alias = serialize($this->currentApplication);
			$doreview = serialize($this);
			$_SESSION['application_list'] = $alias;
			$_SESSION['DoReview'] = $doreview;
			$piccount = 1;
			$rowcount = 1;
			echo"<div id=\"extra\">
					<div class=\"container\">
						<div class=\"row no-collapse-1\">";
			for($index = 0; $index < count($this->currentApplication); $index++)
			{
				$connectDB = new ConnectDB();
				$jsonResult = $connectDB->DB_SelectString("select School from account_data where account='".$this->currentApplication[$index]["account"]."'");
				$jsonResult = json_decode($jsonResult[0]);

				echo "<section class=\"4u\"> <img style=\"border-radius:10px\" src=\"images/pic0".$piccount.".jpg\" alt=\"\">
									<div class=\"box\" style =\"text-align: center\">
										<p><div style=\"margin:0 auto;\">";
				echo $jsonResult->School."&nbsp;&nbsp;&nbsp;&nbsp;";
				//echo $this->currentApplication[$index]["School"];//學校

				$jsonResult = $connectDB->DB_SelectString("select Department from account_data where account='".$this->currentApplication[$index]["account"]."'");
				$jsonResult = json_decode($jsonResult[0]);
				echo $jsonResult->Department."</div><br>";
				echo $this->currentApplication[$index]["Name"]."</p>";
				echo"<div style=\"width:300px;height:20px;margin:0 auto;\">";
				echo "<a href=\"ShowApplication.php?index=$index\" class=\"button\">Read More";
				echo "</div>";
				echo "</a></section>";
				$rowcount += 1;
				$piccount += 1;
				if($piccount>6)
				{
					$piccount-=6;
				}
				if($rowcount>3)
				{
					echo "</div>
							<div class=\"row no-collapse-1\"><br><br>";
					$rowcount = 1;
				}
			}
		}

		private function ShowReviewFailed()//顯示沒通過審查的申請書
		{
			session_start();
			$alias = serialize($this->currentApplication);
			$_SESSION['application_list'] = $alias;
			$piccount = 1;
			$rowcount = 1;
			echo"<div id=\"extra\">
					<div class=\"container\">
						<div class=\"row no-collapse-1\">";

			for($index = 0; $index < count($this->currentApplication); $index++)
			{
				if($this->currentApplication[$index]["Status"] == 3)
				{
					$connectDB = new ConnectDB();
					$jsonResult = $connectDB->DB_SelectString("select School from account_data where account='".$this->currentApplication[$index]["account"]."'");
					$jsonResult = json_decode($jsonResult[0]);

					echo "<section class=\"4u\"> <img style=\"border-radius:10px\" src=\"images/pic0".$piccount.".jpg\" alt=\"\">
										<div class=\"box\" style =\"text-align: center\">
											<p><div style=\"margin:0 auto;\">";
					echo $jsonResult->School."&nbsp;&nbsp;&nbsp;&nbsp;";
					//echo $this->currentApplication[$index]["School"];//學校

					$jsonResult = $connectDB->DB_SelectString("select Department from account_data where account='".$this->currentApplication[$index]["account"]."'");
					$jsonResult = json_decode($jsonResult[0]);
					echo $jsonResult->Department."</div><br>";
					echo $this->currentApplication[$index]["Name"]."</p>";
					echo"<div style=\"width:300px;height:20px;margin:0 auto;\">";
					echo "<a href=\"ShowApplication.php?index=$index\" class=\"button\">Read More";
					echo "</div>";
					echo "</a></section>";
					$rowcount += 1;
					$piccount += 1;
					if($piccount>6)
					{
						$piccount-=6;
					}
					if($rowcount>3)
					{
						echo "</div>
								<div class=\"row no-collapse-1\"><br><br>";
						$rowcount = 1;
					}
				}
			}

		}

		private function ShowNotReview()//顯示尚未審查的申請書
		{
			session_start();
			$alias = serialize($this->currentApplication);
			$_SESSION['application_list'] = $alias;
			$piccount = 1;
			$rowcount = 1;
			echo"<div id=\"extra\">
					<div class=\"container\">
						<div class=\"row no-collapse-1\">";
			for($index = 0; $index < count($this->currentApplication); $index++)
			{
				if($this->currentApplication[$index]["Status"] == 1)
				{
					$connectDB = new ConnectDB();
					$jsonResult = $connectDB->DB_SelectString("select School from account_data where account='".$this->currentApplication[$index]["account"]."'");
					$jsonResult = json_decode($jsonResult[0]);

					echo "<section class=\"4u\"> <img style=\"border-radius:10px\" src=\"images/pic0".$piccount.".jpg\" alt=\"\">
										<div class=\"box\" style =\"text-align: center\">
											<p><div style=\"margin:0 auto;\">";
					echo $jsonResult->School."&nbsp;&nbsp;&nbsp;&nbsp;";
					//echo $this->currentApplication[$index]["School"];//學校

					$jsonResult = $connectDB->DB_SelectString("select Department from account_data where account='".$this->currentApplication[$index]["account"]."'");
					$jsonResult = json_decode($jsonResult[0]);
					echo $jsonResult->Department."</div><br>";
					echo $this->currentApplication[$index]["Name"]."</p>";
					echo"<div style=\"width:300px;height:20px;margin:0 auto;\">";
					echo "<a href=\"ShowApplication.php?index=$index\" class=\"button\">Read More";
					echo "</div>";
					echo "</a></section>";
					$rowcount += 1;
					$piccount += 1;
					if($piccount>6)
					{
						$piccount-=6;
					}
					if($rowcount>3)
					{
						echo "</div>
								<div class=\"row no-collapse-1\"><br><br>";
						$rowcount = 1;
					}
			

				}
			}

		}

		private function ShowReviewSuccess()//顯示通過審查的申請書
		{
			session_start();
			$alias = serialize($this->currentApplication);
			$_SESSION['application_list'] = $alias;
			$piccount = 1;
			$rowcount = 1;
			echo"<div id=\"extra\">
					<div class=\"container\">
						<div class=\"row no-collapse-1\">";

			for($index = 0; $index < count($this->currentApplication); $index++)
			{
				if($this->currentApplication[$index]["Status"] == 2)
				{
					$connectDB = new ConnectDB();
					$jsonResult = $connectDB->DB_SelectString("select School from account_data where account='".$this->currentApplication[$index]["account"]."'");
					$jsonResult = json_decode($jsonResult[0]);

					echo "<section class=\"4u\"> <img style=\"border-radius:10px\" src=\"images/pic0".$piccount.".jpg\" alt=\"\">
										<div class=\"box\" style =\"text-align: center\">
											<p><div style=\"margin:0 auto;\">";
					echo $jsonResult->School."&nbsp;&nbsp;&nbsp;&nbsp;";
					//echo $this->currentApplication[$index]["School"];//學校

					$jsonResult = $connectDB->DB_SelectString("select Department from account_data where account='".$this->currentApplication[$index]["account"]."'");
					$jsonResult = json_decode($jsonResult[0]);
					echo $jsonResult->Department."</div><br>";
					echo $this->currentApplication[$index]["Name"]."</p>";
					echo"<div style=\"width:300px;height:20px;margin:0 auto;\">";
					echo "<a href=\"ShowApplication.php?index=$index\" class=\"button\">Read More";
					echo "</div>";
					echo "</a></section>";
					$rowcount += 1;
					$piccount += 1;
					if($piccount>6)
					{
						$piccount-=6;
					}
					if($rowcount>3)
					{
						echo "</div>
								<div class=\"row no-collapse-1\"><br><br>";
						$rowcount = 1;
					}
			

				}
			}
		}
		private function ChangeApplicationState($state)//改變狀態
		{
			switch ($state) 
			{
				case 1:
					$this->Status=1;
					break;
				case 2:
					$this->Status=2;
					break;
				case 3:
					$this->Status=3;
					break;
			}
		}
		public function SetState()
		{
			echo "fuck";
		}

		private function SendEmailToTeacher($Email)//顯示寄信給推薦教授的連結，用新分頁開啟
		{

		}
		public function GetApplication($School)
		{

			
		}
	}
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
            <script src="js/jquery.min.js"></script>
			<script src="js/jquery.dropotron.min.js"></script>
			<script src="js/skel-layers.min.js"></script>
            <noscript>
            	<link rel="stylesheet" href="css/skel.css" />
				<link rel="stylesheet" href="css/style-wide.css" />

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
                                <h2>for teacher</h2>
                                <br>
                                <span class="byline">
                                <?php
							    $DoReview = new Review;
							    $DoReview->Review();
                                ?>

                                </span>
                            </header>
                            <p>
                            	<div style="text-align:center;">
　									<div style="margin:0 auto;">
										<a class="button" href = "ReviewIndex.php">回到首頁</a>
									</div>
								</div>

                            </p>
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






