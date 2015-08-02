<?php
//TODO: Add Definitions
define("HERE",dirname(__FILE__));
define("ENDING",".php");
define("Version","0.0.0-alpha");

//A Shorter include Command
function include($file) {
include(HERE.$file.ENDING);
}

//Configuration?
if (file_exists(HERE."config".ENDING)) {
$installed=true;
} else {
$installed=false;
}

if ($installed) {

//TODO: Add Config Loading Scripts

//TODO: Add MySQL Connecting/Commands
inc("myslq");

//TODO: Add Easier HTML DOM Managment
inc("dom-manage");

} else {
inc("must-install");
}
?>
