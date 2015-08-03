<?php
//TODO: Add Definitions
define("DS","/");
define("HERE",dirname(__FILE__).DS);
define("ENDING",".php");
define("Version","0.0.0-alpha");
//define("C",array());
$GLOBALS["C"]=array();
$C=$GLOBALS["C"];

//Justin, we´ve got a problem C["KEY"] is only avaible in PHP7
//Using $GLOBALS["C"]["KEY"] instead

$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
if (!file_exists(HERE."locale".DS.$lang.ENDING)) {
$lang="en";
}

define("LANG",$lang);

define("CONFIG",substr(HERE,0,-4)."conf.config");

//For Config array again
$C["version"]=VERSION;
$C["locale"]=LANG;
$C["lang"]=LANG;

$uri=explode("?",$_SERVER['PHP_SELF'])[0];
if ($uri[strlen($uri)-1] == "/") {
$uri=substr($uri,0,-1);
}

define("URI",str_replace(array("/index.php/","/index.php"),array("","home"),$uri));
define("DOMAIN",$_SERVER['HTTP_HOST']);

//A Shorter include Command
function inc($file) {
include(HERE.$file.ENDING);
}

//TODO: Locale Load and Set Up
inc("locale");

//Configuration?
if (file_exists(CONFIG)) {
$installed=true;
} else {
$installed=false;
}
define("INSTALLED",$installed);
$C["installed"]=$installed;

if (!$installed) {
echo file_get_contents(HERE."install-header.html");
}

if ($installed) {

//TODO: Real Init
inc("boot");

} else if (URI == "install") {
inc("install");
} else {
inc("must-install");
}
?>
