<?php
//Load Config
$configdata = file_get_contents(CONFIG);
$GLOBALS["C"]["sql"] = unserialize($configdata);

//MySQL Connecting/Commands
inc("mysql");

//Login
inc("login");

//HTML DOM Managment

$type="none";

if (substr(URI,0,5) == "Admin") {
$type="Admin";
}

define("PAGETYPE",$type);
$GLOBALS["C"]["pagetype"]=$type;

inc("dom-manage");

switch ($type) {
case "Admin":
	$uri=substr(URI,4);
	if ($uri=="") {
	$uri="index.php";
	}
	if (file_exists(HERE."admin".DS.$uri)) {
	inc("admin".DS.$uri);
	} else {
	inc("admin".DS."404");
	}
break;

case "none":
	setTitle(L("404",true));
	inc("404");
break;

}


//Show the Page
echo $GLOBALS["C"]["doc"]->saveHTML();
?>
