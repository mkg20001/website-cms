<?php
class EUCookieInfo extends HTMLElement {
   
   private $me;
   
   public function getme() {
   return $this->me;
   }
   
   function __construct($where,$args=array()) {
       parent::__construct(dirname(__FILE__),uniqid());
       $this->me=parent::addHTML($where,"div",L("cookie.info"));
       setAtr(EUCookieInfo::getme(),"id","cookieinfo");
       setAtr(parent::addHTML(EUCookieInfo::getme(),"a",L("cookie.more")),"href","http://".DOMAIN.DS."EUCookieInfo");
       $btn=parent::addHTML(EUCookieInfo::getme(),"button",L("word.ok"));
       setAtr($btn,"class","btn btn-primary");
       setAtr($btn,"onclick","var xmlHttp = new XMLHttpRequest();xmlHttp.open( 'GET', '"."http://".DOMAIN.DS."?RMEU=true"."', false );xmlHttp.send( null );
       document.getElementById('cookieinfo').style.display='none'");
       //Construct
   }
   
   function __destruct() {
       parent::__destruct();
       //Destruct
   }
}
?>
