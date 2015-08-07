<?php
class plugin.name extends PluginBase {
   function __construct() {
       parent::__construct(dirname(__FILE__));
       //Construct
   }

   function __destruct() {
       parent::__destruct();
       //Destruct
   }
   
   function elementInfo() {
     $type=//html or extend or unique
     $arg=//array contains for ex. : 
     return array($type);
   }
}
?>
