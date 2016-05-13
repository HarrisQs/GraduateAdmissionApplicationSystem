<?php
include_once "ApplicationDB.php";

$carPart = new ApplicationDB();

//$carPart -> AddNewAccount("11112");
echo $carPart ->GetLastHistory('1ddd11');

//Call the function with the "->" operator
//This time with the argument "Black Color"
//$carPart -> DBCommand("132");

?>