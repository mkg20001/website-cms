<?php
class PageBase extends DOMPlugin {
   
   function __construct($dir,$id,$page,$class) {
       parent::__construct($dir,$id);
       parent::saveDoc($GLOBALS["doc"]);
       //$info=parent::getPluginInfo(parent::getFile("plugin.info"));
       
       if ($id=="first") {
       $GLOBALS["Pages"][]=$page;
       $GLOBALS["PageClass"][$page]=$class;
       }

       //Construct
   }



   function __destruct() {
       parent::__destruct();
       //Destruct
   }
}
?>
