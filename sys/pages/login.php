<?php
if (isset($_POST["name"]) and isset($_POST["pw"])) {
loginUser($_POST["user"],$_POST["pw"]);
}

$tab=addTab(L("word.login"),"login","<form method=\"POST\">
<h2><?php L(\"word.login\"); ?></h2>
<p>".L("info.login")."</p>
    <div class=\"form-group\">
      <label for=\"username\"><?php L(\"word.username\"); ?></label>
      <input name=\"username\" type=\"text\" class=\"form-control\" id=\"username\" placeholder=\"<?php L(\"word.username\"); ?>\">
    </div>
    <div class=\"form-group\">
      <label for=\"password\"><?php L(\"word.password\"); ?></label>
      <input name=\"password\" type=\"password\" class=\"form-control\" id=\"password\" placeholder=\"<?php L(\"word.password\"); ?>\">
    </div>
<button class=\"btn btn-primary\"><?php L(\"word.login\").\" »\"; ?></button>
</form>");
addHTML($tab,"form")
?>
