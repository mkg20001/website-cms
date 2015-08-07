<?php
$user="root";
$pass="test";
$serv="localhost";
$port="3306";
$data="websiteCMS";

$mysqli = new mysqli($serv, $user, $pass, "", $port);
if ($mysqli->connect_error) {
    die("ERROR Setup MySQL");
} else {
//Let´s Setup
$mysql=array();
$mysql["username"]=$user;
$mysql["password"]=$pass;
$mysql["database"]=$data;
$mysql["server"]=$serv;
$mysql["port"]=$port;
$str=serialize($mysql);
file_put_contents(CONFIG, $str);
$pwq=base64_encode($pass);
$mystr=str_replace(array('{DATABASE}','{rootpw}'),array($data,$pwq),file_get_contents(HERE."sql".DS."install.sql"));
$mystr=explode(";",$mystr);
foreach($mystr as $query) {
mysqli_query($mysqli,$query);
}
echo "OK";
?>
