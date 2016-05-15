<?php
    $ID = $_POST["ID"];
    $Name = $_POST["Name"];
    $Password = $_POST["password"];
    $School = $_POST["school"];
    $Department = $_POST["department"];
    $email = $_POST["email"];
    
	$query = "INSERT INTO `accountdata` ( `Account`, `Password` , `Email` , `Name` , `School`, `Department` ) VALUES ( '" . $ID  . "', '" . $Password . "', '" . $email . "', '" . $Name . "', '" . $School . "', '" . $Department . "' )"  ;    
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
?>