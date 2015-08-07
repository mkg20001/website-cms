<?php
if (isset($_POST["name"]) and isset($_POST["pw"])) {
loginUser($_POST["user"],$_POST["pw"]);
}

addNav(L("word.login"),"login");

?>
