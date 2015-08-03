<?php
//Load Config
$configdata = file_get_contents(CONFIG);
$GLOBALS["C"]["sql"] = unserialize($configdata);

//TODO: Add Config Loading Scripts

//TODO: Add MySQL Connecting/Commands
inc("mysql");

//TODO: Add Easier HTML DOM Managment
inc("dom-manage");
?>
