<?php
include_once "AccountDB.php";

$carPart = new AccountDB();

//$carPart -> AddNewAccount("11112");
echo $carPart ->ValidateAccount('11112','1ddd11');

//Call the function with the "->" operator
//This time with the argument "Black Color"
//$carPart -> DBCommand("132");

?>