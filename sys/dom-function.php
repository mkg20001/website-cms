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
FIRSTHREF=false;
}
$node2=addHTML($node,"a",$name,true);
setAtr($node2,"data-toggle","tab");
setAtr($node2,"href","#".$id);
}

function fromHTML($where,$type,$file) {
addHTML($where,$type,file_get_contents(HERE.$file));
}

function addTab($title,$value,$file=false) {

}
?>
