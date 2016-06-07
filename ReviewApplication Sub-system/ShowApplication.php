<?php
    include_once"../Repository Sub-system/ConnectDB.php";
	session_start();
    $connectDB = new ConnectDB();
	$index = $_GET['index'];
	$currentApplication = $_SESSION['application_list'];
	$_SESSION['index'] = $index;
	$currentApplication = unserialize($currentApplication);
    $_SESSION['TeacherEmail'] = $currentApplication[$index]["TeacherEmail"];
    $_SESSION['account'] = $currentApplication[$index]["account"];
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
             <style type="text/css">
             body {
                  margin: 0;
                  padding: 0 0 1em 0;
                  font-size: 1em;
                  line-height: 1.5em;
                  color: #414142;
                  font-family: Arial;
                  background-color: #ededed;
                }

                .elem {
                  border: solid  #6AC5AC 3px;
                  position: relative;
                }

                .elem p {
                  padding: 0 1em;
                }

                .elem-inline .label, .elem-inline .endlabel {
                  position: static;
                }

                .label, .endlabel {
                  position: absolute;
                  background-color: #e95d3c;
                  color: #414142;
                  line-height: 1em;
                }

                .label {
                  top: 0;
                  left: 0;
                  padding: 0 10px 10px 0;
                  border-bottom-right-radius:10px;
                }


                .elem-green {
                  border: solid #FDC72F 3px;
                }
                .elem-green > .label, .elem-green > .endlabel{
                  background-color: #FDC72F;
                }

                .elem-red {
                  border: solid #D64078 3px;
                }
                .elem-red > .label, .elem-red > .endlabel{
                  color: white;
                  background-color: #D64078;
                }

                .elem-orange {
                  border: solid #96C02E 3px;
                }
                .elem-orange > .label, .elem-orange > .endlabel{
                  background-color: #96C02E;
                }

                    .simple {
                    width: 500px;
                    margin: 20px auto;
                    -webkit-box-sizing: border-box;
                       -moz-box-sizing: border-box;
                            box-sizing: border-box;
                  }

                  .fancy {
                    margin: 20px auto;
                    border: solid #e95d3c 10px;
                    -webkit-box-sizing: border-box;
                       -moz-box-sizing: border-box;
                            box-sizing: border-box;
                    border-radius:10px;
                    padding-top:10px;
                    word-wrap:break-word;
                  }

                 
                   </style>

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
                                <br><br>
                                <span class="byline">
                                <div id="extra">
                                    <div class="container">
                                         <div class="row no-collapse-1" style="text-align:center;">
                                            <section class="4u">
                                                <div class="fancy elem">
                                                    <span class="label">
                                                        <font style="color:white;">學校</font></span>
                                                        <p><br>
                                                         <?php 
                                                        $jsonResult = $connectDB->DB_SelectString("select School from account_data where account='".$currentApplication[$index]["account"]."'");
                                                        $jsonResult = json_decode($jsonResult[0]);?>
                                                        <?php echo $jsonResult->School ?>
                                                        </p>
                                                </div>
                                             </section>
                                             <section class="4u">
                                                <div class="fancy elem">
                                                    <span class="label">
                                                        <font style="color:white;">系所</font></span>
                                                        <p><br>
                                                         <?php 
                                                         $jsonResult = $connectDB->DB_SelectString("select Department from account_data where account='".$currentApplication[$index]["account"]."'");
                                                         $jsonResult = json_decode($jsonResult[0]);?>
                                                        <?php echo $jsonResult->Department ?></p>
                                                 </div>
                                             </section>
                                            <section class="4u">
                                                <div class="fancy elem">
                                                    <span class="label">
                                                        <font style="color:white;">名字</font></span>
                                                        <p><br><?php print_r($currentApplication[$index]["Name"]); ?></p>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row no-collapse-1" style="text-align:center;">
                                            <section class="4u">
                                                <div class="fancy elem">
                                                    <span class="label">
                                                        <font style="color:white;">CV</font></span>
                                                        <p><br><?php print_r($currentApplication[$index]["CV"]); ?></p>
                                                </div>
                                            </section>
                                            <section class="4u">
                                                <div class="fancy elem">
                                                    <span class="label">
                                                        <font style="color:white;">SOP</font></span>
                                                        <p><br><?php print_r($currentApplication[$index]["SOP"]); ?></p>
                                                </div>
                                            </section>
                                            <section class="4u">
                                                <div class="fancy elem">
                                                    <span class="label">
                                                        <font style="color:white;">ProgramSelection</font></span>
                                                        <p><br><?php print_r($currentApplication[$index]["ProgramSelection"]); ?></p>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row no-collapse-1" style="text-align:center;">
                                            <section class="4u">
                                                <div class="box" style="margin:0 auto;">
                                                    <p><br><a class="button" target='_blank' href='Writemail.php'>寄信給推薦教授</a></p>
                                                </div>
                                            </section>   
                                            <section class="4u">
                                                <div class="box" style="margin:0 auto;">
                                                    <p><br><a class="button" href='Download.php?object=1'>下載成績單</a></p>
                                                </div>
                                            </section>  
                                            <section class="4u">
                                                <div class="box" style="margin:0 auto;">
                                                    <p><br><a class="button" href='Download.php?object=2'>下載推薦信</a></p>
                                                </div>
                                            </section>                                                                                      
                                        </div>

                                        <div style="text-align:center;font-size: 35px;">
　                                           <div style="margin:0 auto;">申請書狀態：
                                        	<?php 
                                        		switch($currentApplication[$index]["Status"])
                                        		{
                                        			case '0':
                                        				echo "尚未審查";
                                        				break;
                                        			case '1':
                                        				echo "尚未審查";
                                        				break;
                                        			case '2':
                                        				echo "通過";
                                        				break;
                                        			case '3':
                                        				echo "不通過";
                                        				break;
                                        		}	
                                        	?>
                                            </div>
                                        </div>
                                        <div style="text-align:center;">
　                                           <div style="margin:0 auto;">
	<form name="action" action="SetState.php" method="post">
        <select name = "action">
          <option>請選擇審查結果</option>
          <option value="Change_Status_Success">通過</option>
          <option value="Change_Stautus_Fail">不通過</option>
          <option value="Change_status_NotReview">尚未審查</option>
        </select>
        <br>
      <input class="button" type="submit" >
    </form>
    </div>
    </div>

                                <br><br><div style="text-align:center;">
　                                   <div style="margin:0 auto;">
                                        <a class="button" href = "ReviewIndex.php">回到首頁</a>
                                    </div>
                                </div>

                                </span>
                            </header>
                            <p></p>
                        </section>
                    </div>
                    
                </div>
            </div>
        </body>
            <!-- Main -->
            
        </div>
        <!-- /Main -->
        
        <!-- Copyright -->
        <div id="copyright" class="container">
            Design: <a href="http://templated.co">TEMPLATED</a> Images: <a href="http://unsplash.com">Unsplash</a> (<a href="http://unsplash.com/cc0">CC0</a>)
        </div>
        
        
    </body>
</html>
