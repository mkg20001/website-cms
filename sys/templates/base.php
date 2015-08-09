<?php
class TemplateBase {
   
   public $name;
   public $author;
   public $version;
   public $website;
   public $type;
   public $templateBaseType;
   
   private $templateBaseDir;
   private $templateDir;
   private $templateInfo=array();
   
   private $id;
   
   function __construct($dir,$id) {
       $this->templateBaseDir=str_replace("/data/","",$dir.DS.DS);
       $this->templateDir=str_replace(str_replace("sys/","",HERE),"",$this->templateBaseDir);
       $this->templateInfo=$this->getTemplateInfo($this->getFile("template.info"));
       $info=$this->templateInfo;
       
       $this->name=$info["Name"];
       $this->author=$info["Author"];
       /*$this->version=$info["Version"];*/
       $this->website=$info["Website"];
       $this->type=$info["Type"];
       
       $this->templateBaseType=explode("/",$this->templateBaseDir)[1];
       $this->id=$id;
   }
   
   function getFile($file) {
       return $this->templateBaseDir.$file;
   }
   
   
   function getTemplateInfo($file) {
     $text=file_get_contents($file);
     $ar=explode("
",$text);
     $data=array();
     foreach ($ar as $line) {
     if ($line != "") {
     $a=explode(": ",$line);
     $data[$a[0]]=$a[1];
     }
     }
     return $data;
   }
   
   
   
   function __destruct() {
       //Destruct
   }
}
?>
