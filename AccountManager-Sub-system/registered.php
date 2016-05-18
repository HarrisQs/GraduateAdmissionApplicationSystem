<?php
    $account = $_POST["ID"];
    $name = $_POST["Name"];
    $password = $_POST["password"];
    $school = $_POST["school"];
    $department = $_POST["department"];
    $email = $_POST["email"];
    

	$register = new RegisterAccount();
	$register->RegistNewAccount($account,$password,$email,$name,$school,$department);
	class RegisterAccount
	{
		Public function RegistNewAccount($account,$password,$email,$name,$school,$department)
		{
			$this->SetAccount($account);
			$this->SetPassword($password);
			$this->SetEmail($email);
			$this->SetName($name);
			$this->SetSchool($school);
			$this->SetDepartment($department);
			$this->SendVerificationLetter($email);
			//NewAccount.saveToDB();
			
			$query = "INSERT INTO `accountdata` ( `Account`, `Password` , `Email` , `Name` , `School`, `Department` ) VALUES ( '" . $account  . "', '" . $password . "', '" . $email . "', '" . $name . "', '" . $school . "', '" . $department . "' )"  ;    
			if ( !( $database = mysql_connect( "localhost", "se", "se" ) ) )
			die( "Could not connect to database </body></html>" );
			if ( !mysql_select_db( "se", $database ) )
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
			//NewAccount.SetAccount(account);
		}
		Private function SetPassword($password)
		{
			//NewAccount.SetAccount(account);
		}
		Private function SetEmail($email)
		{
			//NewAccount.SetAccount(account);
		}
		Private function SetName($name)
		{
			//NewAccount.SetAccount(account);
		}
		Private function SetSchool($school)
		{
			//NewAccount.SetAccount(account);
		}
		Private function SetDepartment($department)
		{
			//NewAccount.SetAccount(account);
		}
		Private function SendVerificationLetter($email)
		{
			//NewAccount.SetAccount(account);
		}
	}
?>