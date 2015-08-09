<?php
//Load all the Plugins

define("PLUGINDIR",str_replace("sys/","plugins/",HERE));

inc("plugins".DS."base");

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
require_once($dir."data".DS."index".ENDING);
     $text=file_get_contents($dir."plugin.info");
     $ar=explode("
",$text);
     $data=array();
     foreach ($ar as $line) {
     if ($line != "") {
     $a=explode(": ",$line);
     $data[$a[0]]=$a[1];
     }
     }
$pclass=$data["ID"];
$pluginBaseClass[$name]=$pclass;
$pluginClass[$name]=new $pclass("first");
}
}
}
}
}

$GLOBALS["C"]["doc"]=$pluginClass["alpha-page"];
?>
