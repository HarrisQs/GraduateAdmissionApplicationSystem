<?php
include_once "ApplicationDB.php";

$carPart = new ApplicationDB();

//$carPart -> AddNewAccount("11112");
$carPart -> SaveBasicData('{"account": "12345", "Email":"eee@322.3352", 
					"Name":"55", "School":"YZU", "Department":"Computer"}', "1ddd11");

//Call the function with the "->" operator
//This time with the argument "Black Color"
//$carPart -> DBCommand("132");

?>