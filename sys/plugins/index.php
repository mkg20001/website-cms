<?php
//Load all the Plugins

define("PLUGINDIR",str_replace("sys/","plugins/",HERE));

$plugins=array();
$pluginClass=array();
$pluginBaseClass=array();

foreach(scandir(PLUGINDIR) as $ddir) {
if ($ddir != "." and $ddir != ".." and $ddir != "!--TEMPLATES--!") {
foreach(scandir(PLUGINDIR.$ddir) as $pdir) {
if ($pdir != "." and $pdir != "..") {
$dir=PLUGINDIR.$ddir.DS.$pdir.DS;
if (is_dir($dir) and file_exists($dir."plugin.info") and (file_exists($dir."enabled") or $ddir == "base")) {
$name=$pdir;
$plugins[$name]=$dir;
include($dir."data".DS."base".ENDING);
$pluginBaseClass[$name]=$pdir;
$pluginClass[$name]=new $pdir("first");
}
}
}
}
}
?>
