<?php
//Load all the Plugins

function pluginInfo($pdir,$ddir) {
$dir=PLUGINDIR.$ddir.DS.$pdir.DS;
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
return $data;
}

function getPlugin($pdir,$ddir) {
$dir=PLUGINDIR.$ddir.DS.$pdir.DS;
if (is_dir($dir) and file_exists($dir."plugin.info") and pluginEnabled($pdir,$ddir)) {
$name=$pdir;

$data=pluginInfo($pdir,$ddir);

$GLOBALS["plugins"][$name]=$dir;
require_once($dir."data".DS."index".ENDING);

$pclass=$data["ID"];
$GLOBALS["pluginBaseClass"][$name]=$pclass;
if ($data["arg"] == "HTML") {
/*$doc=new DOMDocument("1.0");
$div=$doc->createElement("div");
$pc=new $pclass($div);*/
$pc="";
} else {
$pc=new $pclass("first");
}
$GLOBALS["pluginClass"][$name]=$pc;
}
}

function pluginEnabled($pdir,$ddir) {
$dir=PLUGINDIR.$ddir.DS.$pdir.DS;
if (file_exists($dir."enabled") or $ddir == "base") {
return true;
} else {
return false;
}
}

function loadPlugin($name) {
foreach(scandir(PLUGINDIR) as $ddir) {
if ($ddir != "." and $ddir != ".." and $ddir != "!--TEMPLATES--!") {
foreach(scandir(PLUGINDIR.$ddir) as $pdir) {
if ($pdir == $name) {
getPlugin($pdir,$ddir);
}
}}}
}

define("PLUGINDIR",str_replace("sys/","plugins/",HERE));

inc("plugins".DS."base");
inc("plugins".DS."dom");
inc("plugins".DS."html");

$GLOBALS["plugins"]=array();
$GLOBALS["pluginClass"]=array();
$GLOBALS["pluginBaseClass"]=array();
$GLOBALS["htmlElements"]=array();

foreach(scandir(PLUGINDIR) as $ddir) {
if ($ddir != "." and $ddir != ".." and $ddir != "!--TEMPLATES--!") {
foreach(scandir(PLUGINDIR.$ddir) as $pdir) {
if ($pdir != "." and $pdir != ".." and pluginEnabled($pdir,$ddir)) {
$dir=PLUGINDIR.$ddir.DS.$pdir.DS;
loadPlugin($pdir);
}
}
}
}

$GLOBALS["C"]["doc"]=$GLOBALS["pluginClass"]["alpha-page"];
?>
