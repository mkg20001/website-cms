<?php
class pluginName extends HTMLElement {
   
   private $me;
   
   public function getme() {
   return $this->me;
   }
   
   function __construct($where,$args=array()) {
       parent::__construct(dirname(__FILE__),uniqid());
       $this->me=parent::addHTML($where,"TYPE");
       //Construct
   }
   
   function __destruct() {
       parent::__destruct();
       //Destruct
   }
}
?>
