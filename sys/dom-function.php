<?php
/*<li class="urlactive active"><a data-toggle="tab" href="#home"><img src=""/>iGoogle</a></li>
<li class="urlactive "><a data-toggle="tab" href="#login"><img src=""/>Login</a></li>
<li class="urlactive "><a data-toggle="tab" href="#reg"><img src=""/>Registrieren</a></li>
    <li class="active"><a href="#">Home</a></li>
    <li><a href="#">HTML</a></li>
    <li><a href="#">CSS</a></li>
    <li><a href="#">About</a></li>*/
define("FIRSTHREF",true);
define("FIRSTTAB",true);

function addHref($name,$href) {
$node=addHTML(getNav(),"li");
$node2=addHTML($node,"a",$name,true);
setAtr($node2,"href",$href);
}

function setTitle($title) {
addHTML(getHead(),"title",$title,true);
}

function addNav($name,$id) {
$node=addHTML(getNav(),"li");
if (FIRSTHREF) {
setAtr($node,"class","active");
define("FIRSTHREF",false);
}
$node2=addHTML($node,"a",$name,true);
setAtr($node2,"data-toggle","tab");
setAtr($node2,"href","#".$id);
}

function fromHTML($where,$type,$file) {
return addHTML($where,$type,file_get_contents(HERE.$file));
}

function addTab($title,$id,$value="",$file=false) {
if ($value != "") {
if ($file) {
$value=file_get_contents($value);
}
$node=addHTML(getMain(),"div",$value);
} else {
$node=addHTML(getMain(),"div");
}
setAtr($node,"id",$id);
setAtr($node,"class","tab-pane fade");
if (FIRSTTAB) {
setAtr($node,"class","tab-pane fade in active");
}

addNav($title,$id);

return $node;
}

function infoBox($where,$title,$text) {
$box=addHTML($where,"div");
setAtr($box,"class","jumbotron");
addHTML($box,"h2",$title,true);
addHTML($box,"p",$text,true);
}
?>
