<?php
	
	include_once "../ApplicationManager Sub-system/CurrentBasicData.php";
    
    $account = $_POST["ID"];
    $UserName = $_POST["Name"];
    $password = $_POST["password"];
    $school = $_POST["school"];
    $department = $_POST["department"];
    $email = $_POST["email"];
    $other = $_POST["other"];

	$register = new RegisterAccount();
	$register->RegistNewAccount($account,$password,$email,$UserName,$school,$department,$other);
	class RegisterAccount
	{
		function __construct() 
		{
     		 //$this->NewAccount = new CurrentBasicData();
   		}
		Public function RegistNewAccount($account,$password,$email,$UserName,$school,$department,$other)
		{
			$this->SetAccount($account);
			$this->SetPassword($password);
			$this->SetEmail($email);
			$this->SetName($UserName);
			$this->SetSchool($school);
			$this->SetDepartment($department);
			//NewAccount.saveToDB();
			
			$query = "INSERT INTO `account_data` ( `account`, `pass` , `Email` , `UserName` , `School`, `Department`,`Other`,`IsAdministator`,`IsUsed` ) VALUES ( '" . $account  . "', '" . $password . "', '" . $email . "', '" . $UserName . "', '" . $school . "', '" . $department . "', '" . $other . "', '0', '0' )"  ;    
			if ( !( $database = mysql_connect( "localhost", "se", "se" ) ) )
			die( "Could not connect to database </body></html>" );
			if ( !mysql_select_db( "se2", $database ) )
			die( "Could not open products database </body></html>" );
			if ( !( $result = mysql_query( $query, $database ) ) )
			{
				print( "<p>Could not execute query!</p>" );
				die( mysql_error() . "</body></html>" );
			}
			mysql_close( $database );
					
		}
		Private function SetAccount($account)
		{
			//$this->NewAccount.SetAccount(account);
		}
		Private function SetPassword($password)
		{
			//$this->NewAccount.SetPassword($password);
		}
		Private function SetEmail($email)
		{
			//$this->NewAccount.SetEmail($email);
		}
		Private function SetName($UserName)
		{
			//$this->NewAccount.SetName($UserName);
		}
		Private function SetSchool($school)
		{
			//$this->NewAccount.SetSchool($school);
		}
		Private function SetDepartment($department)
		{
			//$this->NewAccount.Department($department);
		}
	}
?>