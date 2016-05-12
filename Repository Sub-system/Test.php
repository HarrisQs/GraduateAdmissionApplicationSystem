<?php


//use include to insert the external file into script
include "ConnectDB.php";

//Declare to create a new copy of object to work into
//The new copy is stored in the $carPart variable
//產生了一個叫做 $carPart 的Car 類別的物件
$carPart = new ConnectDB;


//Call the function with the "->" operator
//This time with the argument "Black Color"
$carPart -> DBConnect("123");

?>