<?php
//Open UP A Connection

$C=$GLOBALS["C"];

$mysqli = new mysqli($C["sql"]["server"], $C["sql"]["username"], $C["sql"]["password"], $C["sql"]["database"], $C["sql"]["port"]);
if ($mysqli->connect_error) {
if ($_GET["against"]=="true" and URI=="install") {
unlink(CONFIG);
header("Location: http://".DOMAIN."/install");
}
    die("ERROR Accessing MySQL database  <a href=\"http://".DOMAIN."/install?against=true\">Reconfigure</a>");
} else {
$GLOBALS["C"]["sql"]["i"]=$mysqli;
}

//Executes MySQL Queries
function domy($input) {
return $GLOBALS["C"]["sql"]["i"]->query($input,MYSQLI_USE_RESULT);
}

//TODO: Add better entry adding/removing/updating
?>
