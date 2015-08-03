<?php
//First Using old Table Code
inc("dom-table");

//Init doc with Standart Template
$GLOBALS["C"]["doc"]=new DOMDocument('1.0');
$doc = $GLOBALS["C"]["doc"];
$doc->loadHTMLFile(HERE."template.html");

function getDoc() {
return $GLOBALS["C"]["doc"];
}

function getByTag($tag,$first=true) {
if ($first) {
return getDoc()->getElementsByTagName($tag)->item(0);
} else {
return getDoc()->getElementsByTagName($tag);
}}

function getBody() {
return getByTag("body");
}

function getHead() {
return getByTag("head");
}

function setTitle($title) {
addHTML(getHead(),"title",$title,true);
}

function getByID($id,$first=false) {
if ($first) {
return getDoc()->getElementById($id)->item(0);
}
return getDoc()->getElementById($id);
}

function cHTML($what,$value="") {
return getDoc()->createElement($what,$value);
}

function cText($node,$value) {
$node2=getDoc()->createTextNode($value);
$node->appendChild($node2);
return $node;
}

function addHTML($where,$what,$value="",$text=false) {
if ($text) {
$node=cHTML($what);
$node=cText($node,$value);
} else {
$node=cHTML($what,$value);
}
$where->appendChild($node);
}

?>
