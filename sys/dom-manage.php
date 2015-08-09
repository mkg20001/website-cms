<?php
function getDoc() {
return $GLOBALS["C"]["doc"];
}

function setAtr($where,$what,$value) {
getDoc()->setAtr($where,$what,$value);
}

function addHTML($where,$what,$value="",$text=false) {
return getDoc()->addHTML($where,$what,$value,$text);
}

inc("dom-function");
?>
