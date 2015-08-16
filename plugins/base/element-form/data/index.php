<?php
class htmlform extends HTMLElement {
   
   private $me;
   public $entrys=array();
   
   public function getme() {
   return $this->me;
   }
   
   public function setMethod($method="POST") {
   setAtr(htmlform::getme(),"method",$method);
   }
   
   function __construct($where) {
       parent::__construct(dirname(__FILE__),uniqid());
       $this->me=parent::addHTML($where,"form");
       htmlform::setMethod();
       //Construct
   }
   
   public function baseText($h2,$p) {
   addHTML(htmlform::getme(),"h2",$h2);
   addHTML(htmlform::getme(),"p",$p);
   }
   
   public function submitButton($label,$primary=true) {
   $bt=addHTML(htmlform::getme(),"button",$label);
   setAtr($bt,"type","submit");
   if ($primary) {
   $class="btn btn-primary";
   } else {
   $class="btn";
   }
   setAtr($bt,"class",$class);
   }
   
   public function addEntry($label,$id,$type="text",$placeholder="",$value="") {
   /*    <div class="form-group">
      <label for="server"><?php L("word.server"); ?></label>
      <input name="server" type="text" value="localhost" class="form-control" id="server" placeholder="<?php L("word.server"); ?>">
    </div>*/
   $div=addHTML(htmlform::getme(),"div");
   $this->entrys[]=$div;
   setAtr(addHTML($div,"label",$label),"for",$id);
   $in=addHTML($div,"input");
   setAtr($in,"name",$id);
   setAtr($in,"type",$type);
   setAtr($in,"value",$value);
   setAtr($in,"placeholder",$placeholder);
   setAtr($in,"id",$id);
   setAtr($in,"class","form-control");
   setAtr($div,"class","form-group");
   return $div;
   }

   function __destruct() {
       parent::__destruct();
       //Destruct
   }
}
?>
