<?php
//First Using old Table Code
inc("old-table");

//Init doc with Standart Template
$GLOBALS["C"]["doc"]=new DOMDocument('1.0');
$doc = $GLOBALS["C"]["doc"];
$doc->loadHTMLFile(HERE."template.html");

?>
