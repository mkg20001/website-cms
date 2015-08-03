<?php
if (!INSTALLED and isset($_POST["username"])) {
$user=$_POST["username"];
$pass=$_POST["password"];
$serv=$_POST["server"];
$port=$_POST["port"];
$data=$_POST["database"];

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
file_put_contents(HERE."tmp.sql", str_replace('{DATABASE}',$data,file_get_contents(HERE."sql".DS."install.sql")));
mysqli_query($mysqli,"LOAD DATA LOCAL INFILE '".HERE."tmp.sql"."' INTO TABLE mytable");
unlink(HERE."tmp.sql");
echo "OK";
header("Location: http://".DOMAIN);
}


} else if (!INSTALLED) {

//TODO: Add installation Setup
$step=$_COOKIE["step"];
?><div class="container"><div class="jumbotron">
<form method="POST">
<h2><?php L("install.welcome"); ?></h2>
<p><?php L("install.mysql"); ?></p>
    <div class="form-group">
      <label for="server"><?php L("word.server"); ?></label>
      <input name="server" type="text" value="localhost" class="form-control" id="server" placeholder="<?php L("word.server"); ?>">
    </div>
    <div class="form-group">
      <label for="port"><?php L("word.port"); ?></label>
      <input name="port" type="text" value="3306" class="form-control" id="port" placeholder="<?php L("word.port"); ?>">
    </div>
    <div class="form-group">
      <label for="database"><?php L("word.database"); ?></label>
      <input name="database" type="text" value="websiteCMS" class="form-control" id="database" placeholder="<?php L("word.database"); ?>">
    </div>
    <div class="form-group">
      <label for="username"><?php L("word.username"); ?></label>
      <input name="username" type="text" class="form-control" id="username" placeholder="<?php L("word.username"); ?>">
    </div>
    <div class="form-group">
      <label for="password"><?php L("word.password"); ?></label>
      <input name="password" type="password" class="form-control" id="password" placeholder="<?php L("word.password"); ?>">
    </div>
<button class="btn btn-primary"><?php L("next.button"); ?></button>
</form>
</div></div><?php
}
?>
