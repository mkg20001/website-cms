<?php
//TODO: Add Definitions
define("DS","/");
define("HERE",dirname(__FILE__).DS);
define("ENDING",".php");
define("Version","0.0.0-alpha");

$uri=$_SERVER['PHP_SELF'];
if ($uri[strlen($uri)-1] == "/") {
$uri=substr($uri,0,-1);
}

define("URI",str_replace(array("/index.php/","/index.php"),array("","home"),$uri));
define("DOMAIN",$_SERVER['HTTP_HOST']);

//A Shorter include Command
function inc($file) {
include(HERE.$file.ENDING);
}

//Configuration?
if (file_exists(HERE."config/config".ENDING)) {
$installed=true;
} else {
$installed=false;
}
define("INSTALLED",$installed);

if ($installed) {

//TODO: Add Config Loading Scripts

//TODO: Add MySQL Connecting/Commands
inc("myslq");

//TODO: Add Easier HTML DOM Managment
inc("dom-manage");

} else if (URI == "install") {
inc("install");
} else {
inc("must-install");
}
?>
