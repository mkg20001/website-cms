<?php
//alpha plugin for connecting with page elements while using PluginBase parents

class DOMPlugin extends PluginBase {

   public $doc;
   
   private $firstHREF=true;
   private $firstNAV=true;
   
   function __construct($dir,$id) {
       parent::__construct($dir,$id);
   }
   
   function __construct2($dir,$id,$doc) {
       parent::__construct($dir,$id);
       saveDoc($doc);
   }
   
public function saveHTML() {
return $this->doc->saveHTML();
}

public function saveDoc($doc) {
$this->doc=$doc;
}

//GET Base

public function getByTag($tag,$first=true) {
if ($first) {
return $this->doc->getElementsByTagName($tag)->item(0);
} else {
return $this->doc->getElementsByTagName($tag);
}}

public function getByID($id,$first=false) {
if ($first) {
return $this->doc->getElementById($id)->item(0);
}
return $this->doc->getElementById($id);
}

//Elements (shortcuts)

public function getBody() {
return $this->getByTag("body");
}

public function getHead() {
return $this->getByTag("head");
}

public function getMain() {
return $this->getById("main");
}

public function getNav() {
return $this->getById("nav");
}

public function setAtr($where,$what,$value) {
$where->setAttributeNode(new DOMAttr($what, $value));
}

//Creating & Stuff

public function cHTML($what,$value="") {
return $this->doc->createElement($what,$value);
}

public function cText($node,$value) {
$node2=$this->doc->createTextNode($value);
$node->appendChild($node2);
return $node;
}

public function addHTML($where,$what,$value="",$text=false) {
if ($text) {
$node=$this->cHTML($what);
$node=$this->cText($node,$value);
} else {
$node=$this->cHTML($what,$value);
}
$where->appendChild($node);
return $node;
}

public function putHTML($where,$node) {
$where->appendChild($node);
}

//Some HTML

function addHref($name,$href) {
$node=$this->addHTML($this->getNav(),"li");
$node2=$this->addHTML($node,"a",$name,true);
$this->setAtr($node2,"href",$href);
}

function setTitle($title) {
$this->addHTML($this->getHead(),"title",$title,true);
}

function addNav($name,$id) {
$node=$this->addHTML($this->getNav(),"li");
if ($this->firstHREF) {
$this->setAtr($node,"class","active");
$this->firstHREF=false;
}
$node2=$this->addHTML($node,"a",$name,true);
$this->setAtr($node2,"data-toggle","tab");
$this->setAtr($node2,"href","#".$id);
}

function fromHTML($where,$type,$file) {
return $this->addHTML($where,$type,file_get_contents(HERE.$file));
}

function addTab($title,$id,$value="",$file=false) {
if ($value != "") {
if ($file) {
$value=file_get_contents($value);
}
$node=$this->addHTML($this->getMain(),"div",$value);
} else {
$node=$this->addHTML($this->getMain(),"div");
}
$this->setAtr($node,"id",$id);
$this->setAtr($node,"class","tab-pane fade");
if ($this->firstNAV) {
$this->setAtr($node,"class","tab-pane fade in active");
}

$this->addNav($title,$id);

return $node;
}

function infoBox($where,$title,$text) {
$box=$this->addHTML($where,"div");
$this->setAtr($box,"class","jumbotron");
$this->addHTML($box,"h2",$title,true);
$this->addHTML($box,"p",$text,true);
return $box;
}

   function __destruct() {
       parent::__destruct();
       //Destruct
   }
   
   
}
?>
