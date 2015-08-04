<?php
if (isset($_POST["name"]) and isset($_POST["pw"])) {
loginUser($_POST["user"],$_POST["pw"]);
}

addNav("home","home");

//addHTML(getMain(),"p","test",true);
?>
