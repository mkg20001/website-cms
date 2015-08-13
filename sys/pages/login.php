<?php
if (!$GLOBALS["login"]) {
if (isset($_POST["username"]) and isset($_POST["password"])) {
loginUser($_POST["username"],$_POST["password"]);
}

$tab=addTab(L("word.login"),"login");
$form=new htmlform($tab);
$form->baseText(L("word.login"),L("info.login"));
$form->addEntry(L("word.username"),"username","text",L("word.username"));
$form->addEntry(L("word.password"),"password","password",L("word.password"));
$form->submitButton(L("word.login")." »");
} else {
header("Location: ../");
}
?>
