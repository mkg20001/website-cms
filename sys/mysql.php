<?php
//Open UP A Connection

$C=$GLOBALS["C"];

//$MYCON=mysqli_connect(C["sql"]["server"],C["sql"]["username"],C["sql"]["password"]);
$mysqli = new mysqli($C["sql"]["server"], $C["sql"]["username"], $C["sql"]["password"], $C["sql"]["database"], $C["sql"]["port"]);
if ($mysqli->connect_error) {
if ($_GET["against"]=="true" and URI=="install") {
unlink(CONFIG);
header("Location: http://".DOMAIN."/install");
}

    die("ERROR Accessing MySQL database  <a href=\"http://".DOMAIN."/install?against=true\">Reconfigure</a>");

} else {
//mysqli_query("SET CHARACTER SET 'utf8'");
//mysqli_query("USE ".$C["sql"]["database"].";");
$GLOBALS["C"]["sql"]["i"]=$mysqli;
}
//Executes MySQL Queries
function domy($input,$db="") {
if ($db == "") {
$db=$C["sql"]["database"];
}
//mysqli_query("SET CHARACTER SET 'utf8'");
//mysqli_query("USE $db;");
return mysqli_query($GLOBALS["C"]["sql"]["i"],$input);
}

//TODO: Add better entry adding/removing/updating
?>
