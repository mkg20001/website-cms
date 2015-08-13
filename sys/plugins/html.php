<?php
class HTMLElement extends DOMPlugin {
   
   function __construct($dir,$id) {
       parent::__construct($dir,$id);
       $info=parent::getPluginInfo(parent::getFile("plugin.info"));
       if ($id=="first") {
       //TODO: Add this Thing to a selection menu
       $GLOBALS["htmlElements"][$info["Name"]]=$info["ID"];
       }
       
       /*if (EDITMODE) {
       //TODO:Editor Mode
       }*/
       //Construct
   }



   function __destruct() {
       parent::__destruct();
       //Destruct
   }
}
?>
