<?php
	include_once "../Repository Sub-system/AccountDB.php";
    $ID = $_POST["ID"];
    $password = $_POST["password"];
	
	$login = new LogIn();
	$login->LoginSystem($ID,$password);
	
	class LogIn
	{
		function __construct() 
		{
     		 //$this->AccountDB = new AccountDB();
   		}
		Public Function LoginSystem($ID,$password)
		{
			/*
			if($this->AccountDB->ValidateAccount($iD, $password))
				echo "welcome ~";
			else
				echo "LogIn fail!";*/
			
			if ( !( $database = mysql_connect( "localhost", "se", "se" ) ) )
			die( "Could not connect to database " );
			if ( !mysql_select_db( "se2", $database ) )
			die( "Could not open products database " );
		
			$sql="SELECT `pass` FROM `account_data` WHERE `account`='".$ID."'";	
			$result=mysql_query($sql);	
			$row_result=mysql_fetch_assoc($result);
			if(isset($ID))
			{
						//將讀取出來的資料取出欄位名稱為username的資料，並且存在$admin
				$admin=$row_result["pass"];
				if($password==$admin)
					echo "welcome ~";
				else
					echo "LogIn fail!";
				
			}
			mysql_close( $database );
			
		}
	}
?>