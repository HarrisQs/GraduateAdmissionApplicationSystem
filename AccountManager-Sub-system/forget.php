<?php
    $ID = $_POST["ID"];
    $email = $_POST["email"];

	if ( !( $database = mysql_connect( "localhost", "se", "se" ) ) )
    die( "Could not connect to database </body></html>" );
    if ( !mysql_select_db( "se", $database ) )
    die( "Could not open products database </body></html>" );

	$sql="SELECT `Email` FROM `accountdata` WHERE `Account`='".$ID."'";	
	$result=mysql_query($sql);	
	$row_result=mysql_fetch_assoc($result);
	if(isset($ID))
{
    //將讀取出來的資料取出欄位名稱為username的資料，並且存在$admin
    $admin=$row_result["Email"];
    if($email==$admin)
    {
        echo "vaildent success! we will email to you!";
    }
	else
		echo "ID and Email not match! fail!";
}
    mysql_close( $database );
?>