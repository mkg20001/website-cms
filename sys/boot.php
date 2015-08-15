<?php
//Load Config
$configdata = file_get_contents(CONFIG);
$GLOBALS["C"]["sql"] = unserialize($configdata);

//MySQL Connecting/Commands
inc("mysql");
inc("ip");

$GLOBALS["Pages"]=array();
$GLOBALS["PageClass"]=array();

//Plugins, Template and so on
inc("templates".DS."index");
inc("plugins".DS."index");

//Device ID Setup
if (!isset($_COOKIE["LAUTHPEOPLE"])) {
$pla=base64_encode(uniqid().uniqid().uniqid());
setCookie("LAUTHPEOPLE",$pla,time()+31536000,"/");
if (ip_info("Visitor", "Location")["continent_code"] == "EU") {
setCookie("EU","1",time()+31536000,"/");
}
header("Location: ".'http://'.DOMAIN.DS.URI);
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
$w=false;
foreach ($GLOBALS["Pages"] as $page) {
if (explode("/",URI)[0]==$page) {
$pages=new $GLOBALS["PageClass"][$page]("internal");
$w=true;
$pages->runme(str_replace(array("$page/","$page"),"",URI));
}
}
if (!$w) {
	setTitle(L("404",true));
	inc("404");
}
break;

}


//If EU add the Cookie Info
if (isset($_COOKIE["EU"])) {
new EUCookieInfo($GLOBALS["C"]["doc"]->getByTag("body"));
if (isset($_GET["RMEU"])) {
setCookie("EU","",0);
}
}

//Show the Page
echo $GLOBALS["C"]["doc"]->saveHTML();
?>
