<?php
//Open UP A Connection

$MYCON=mysql_connect(C["sql"]["server"],C["sql"]["username"],C["sql"]["password"]);
mysql_query("SET CHARACTER SET 'utf8'");
mysql_query("USE ".C["sql"]["database"].";");

//Executes MySQL Queries
function domy($input,$db="") {
if ($db == "") {
$db=C["sql"]["database"];
}
mysql_query("SET CHARACTER SET 'utf8'");
mysql_query("USE $db;");
return mysql_query($input);
}

//TODO: Add better entry adding/removing/updating
?>
