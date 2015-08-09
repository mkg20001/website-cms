<?php
//Load Config
$configdata = file_get_contents(CONFIG);
$GLOBALS["C"]["sql"] = unserialize($configdata);

//MySQL Connecting/Commands
inc("mysql");

//Plugins, Template and so on
inc("templates".DS."index");
inc("plugins".DS."index");

//Device ID Setup
if (!isset($_COOKIE["LAUTHPEOPLE"])) {
$pla=base64_encode(uniqid().uniqid().uniqid());
setCookie("LAUTHPEOPLE",$pla,time()+31536000,"/");
header("Location: ".'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
}

//Login
inc("login");

//HTML DOM Managment

$type="none";

switch (explode("/",URI)[0]) {
case "Admin":
	$type="Admin";
break;
case "Login":
	$type="Login";
break;
}

define("PAGETYPE",$type);
$GLOBALS["C"]["pagetype"]=$type;

inc("dom-manage");

switch ($type) {
case "Admin":
	explode("/",$uri)[1];
	if ($uri=="") {
	$uri="index.php";
	}
	if (file_exists(HERE."admin".DS.$uri)) {
	inc("admin".DS.$uri);
	} else {
	inc("admin".DS."404");
	}
break;

case "Login":
	inc("pages".DS."login");
break;

case "none":
	setTitle(L("404",true));
	inc("404");
break;

}


//Show the Page
echo $GLOBALS["C"]["doc"]->saveHTML();
?>
