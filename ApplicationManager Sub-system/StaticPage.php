<!DOCTYPE HTML>
<?php
	$currentAccount = "Rita1234";
	include_once "../Repository Sub-system/ApplicationDB.php";
	$Database = new ApplicationDB();
	$DE;
	//var_dump(json_decode('{"foo":"bar","aaa":"bbb"}'));
	//echo $DE['foo'];
	$DE = $Database->GetLastHistory("Rita1234");
	//echo $DE;
	//echo $DE;
	$DE = str_replace(']', '', $DE);
	$DE = str_replace('[', '', $DE);
	$DE = str_replace('\"', '"', $DE);
	$DE[0]='\'';
	$DE[256]='\'';
	echo $DE;
	var_dump(json_decode($DE));
	//echo $DE[0];
	//echo $Database->GetLastHistory("Rita1234");
	//echo $DE[0];
	if($Database->GetLastHistory($currentAccount)=="You don’t have last history")
		echo "Test OK";
	else
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
                        <li><a href="index.html">sign out</a></li>
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
                                            <?php echo "asmdklajskdj"?>
                                            <TD bgcolor='#009FCC' align='center'><?php echo "asmdklajskdj"?>;
                                        </TR>


                                        <TR bgcolor='#5555FF' valign='center'>
                                            <TD align='center' height='32'>
                                            <font color="#DDDDDD">電子信箱</font>
                                            </TD >
                                            <TD  bgcolor='#009FCC' align='center'>&nbsp;
                                            <INPUT name='email' type='text' size='20'></TD>
                                        </TR>

                                        <TR bgcolor='#5555FF' valign='center'>
                                                <TD align='center' height='32'>
                                                <font color="#DDDDDD">學校</font>
                                                </TD>
                                                <TD bgcolor='#009FCC' align='center'>&nbsp;
                                                <INPUT name='school' type='text' size='20'></TD>
                                        </TR>

                                        <TR bgcolor='#5555FF' valign='center'>
                                                <TD align='center' height='32'>
                                                <font color="#DDDDDD">系所</font>
                                                </TD>
                                                <TD bgcolor='#009FCC' align='center'>&nbsp;
                                                <INPUT name='department' type='text' size='20'></TD>
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
                                            <TD  bgcolor='#009FCC' align='center'>&nbsp;
                                            <INPUT name='teacheremail' type='text' size='20'></TD>
                                        </TR>


                                        <TR bgcolor='#5555FF' valign='center'>
                                            <TD align='center' height='32'>
                                            <font color="#DDDDDD">動機簡述</font>
                                            </TD>
                                            <TD bgcolor='#009FCC' align='center'>&nbsp;
                                            <textarea cols="50" rows="2" INPUT name='sop'></textarea></TD>
                                        </TR>

                                        <TR bgcolor='#5555FF' valign='center'>
                                            <TD align='center' height='32'>
                                            <font color="#DDDDDD">申請系所</font>
                                            </TD>
                                            <TD  bgcolor='#009FCC' align='center'>&nbsp;
                                            <INPUT name='programselection' type='text' size='20'></TD>
                                        </TR>

                                        <TR bgcolor='#5555FF' >
                                            <TD align='center' height='10'>
                                            <font color="#DDDDDD">自傳</font>
                                            </TD>
                                            <TD bgcolor='#009FCC' align='center'>
                                            <textarea cols="50" rows="5" INPUT name='cv' type='text' size='20'></textarea></TD>
                                        </TR>

                                        <TR bgcolor='#5555FF' valign='center'>
                                            <TD align='center' height='32'>
                                            <font color="#DDDDDD">上傳成績單</font>
                                            </TD>
                                            <TD  bgcolor='#009FCC' align='center' >&nbsp;
                                            <input type="file" name="transcripts"/>
                                        </TR>

                                    </TABLE>
                                    </CENTER>
                                    
                                        <CENTER><INPUT name='btnOK' class="button" type='submit' value='送出'></CENTER>
                                    
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
