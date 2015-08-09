<?php
function addHref($name,$href) {
getDoc()->addHref($name,$href);
}

function setTitle($title) {
getDoc()->setTitle($title);
}

function fromHTML($where,$type,$file) {
return getDoc()->fromHTML($where,$type,$file);
}

function addTab($title,$id,$value="",$file=false) {
return getDoc()->addTab($title,$id,$value,$file);
}

function infoBox($where,$title,$text) {
getDoc()->infoBox($where,$title,$text);
}
?>
