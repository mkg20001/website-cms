<?php
//Load Config
$configdata = file_get_contents(CONFIG);
$GLOBALS["C"]["sql"] = unserialize($configdata);

//MySQL Connecting/Commands
inc("mysql");

//TODO: Add Easier HTML DOM Managment
inc("dom-manage");


//Show the Page
echo $GLOBALS["C"]["doc"]->saveHTML();
?>
