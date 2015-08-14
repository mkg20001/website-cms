<?php
//alpha plugin for connecting with page elements while using PluginBase parents

class dom extends DOMPlugin {

   public $doc;
   
   private $firstHREF=true;
   private $firstNAV=true;
   
   function __construct($id) {
       parent::__construct(dirname(__FILE__),$id);
       $this->doc=new DOMDocument('1.0');
       $this->doc->loadHTMLFile(HERE."template.html");
       parent::saveDoc($this->doc);
       $GLOBALS["doc"]=$this->doc;
   }
   
   function __construct2($template,$isnav=false,$istab=false) {
       parent::__construct(dirname(__FILE__),"1");
       $this->doc=new DOMDocument('1.0');
       $this->template=new template($this->doc,$template,$isnav,$istab);
       parent::saveDoc($this->doc);
       $GLOBALS["doc"]=$this->doc;
   }
   
public function saveHTML() {
return $this->doc->saveHTML();
}

   function __destruct() {
       parent::__destruct();
       //Destruct
   }
   
   
}
?>
