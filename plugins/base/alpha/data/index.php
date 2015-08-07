<?php
//alpha plugin for connecting with page elements while using PluginBase parents

class alpha extends PluginBase {
   function __construct($id) {
       parent::__construct(dirname(__FILE__),$id);
       //Construct
   }

   function __destruct() {
       parent::__destruct();
       //Destruct
   }
}
?>
