<?php
if (isset($_COOKIE["token"]) and isset($_COOKIE["user"])) {
$token=$_COOKIE["token"];
$user=$_COOKIE["user"];
$row=domy("SELECT * FROM users WHERE username LIKE '$user'");
var_dump($row);
}
?>
