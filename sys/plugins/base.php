<?php
class PluginBase {
   
   public $name;
   public $author;
   public $version;
   public $website;
   public $depends=array();
   
   private $pluginBaseDir;
   private $pluginDir;
   private $pluginInfo=array();
   
   function __construct($dir) {
       $this->$pluginBaseDir=str_replace("/data/","",$dir);
       $this->$pluginDir=str_replace(str_replace("sys/","",HERE),"",$this->$pluginBaseDir);
       getPluginInfo(getFile("plugin.info"));
       //Construct
   }

   function __destruct() {
       //Destruct
   }
   
   function getFile($file) {
       return $this->$pluginBaseDir.$file;
   }
   
   
   function getPluginInfo($file) {
     $text=file_get_contents($file);
     $ar=explode("
",$text);
     $data=array();
     foreach ($ar as $line) {
     $a=explode(": ",$line);
     $data[$a[0]]=$a[1];
     }
     return $data;
   }
}
?>
