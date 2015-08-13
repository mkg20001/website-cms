<?php
$GLOBALS["login"]=false;
if (isset($_COOKIE["LWHOAMI"]) and isset($_COOKIE["LAUTHDATABASE"])) {
$token=$_COOKIE["LAUTHDATABASE"];
$token=base64_decode($token);
$user=$_COOKIE["LWHOAMI"];
$user=base64_decode($user);
$device=$_COOKIE["LAUTHPEOPLE"];
$device=base64_decode($device);
$row=domy("SELECT * FROM users WHERE username LIKE '$user'")[0];
$sessions=unserialize($row[5]);
$devices=serialize($row[6]);

if (!is_null($devices[$device]) and $devices[$device]=$token and !is_null($sessions[$token]) and $sessions[$token]=$_SERVER['HTTP_USER_AGENT']) {
$GLOBALS["login"]=true;
$GLOBALS["user"]=array(name => $user,perm => "");
}
}

function loginUser($name,$pw) {
$user=$name;
$row=domy("SELECT * FROM users WHERE username LIKE '$user'")[0];
$sessions=unserialize($row[5]);
$devices=unserialize($row[6]);
$device=$_COOKIE["LAUTHPEOPLE"];
$device=base64_decode($device);

$token=uniqid().uniqid();

if (base64_encode($pw)==$row[3]) {
$devices[$device]=$token;
$sessions[$token]=$_SERVER['HTTP_USER_AGENT'];

$devices=serialize($devices);
$sessions=serialize($sessions);
setCookie("LWHOAMI",base64_encode($user),time()+2592000,"/");
setCookie("LAUTHDATABASE",base64_encode($token),time()+2592000,"/");
domy("UPDATE `websiteCMS`.`users` SET `sessions` = '$sessions', `devices` = '$devices' WHERE `users`.`username` = '$user'");
}
}
?>
