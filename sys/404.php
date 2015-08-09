<?php
/*<h2><?php ; ?></h2>
<a href="http://<?php echo DOMAIN; ?>/"><p><?php L("to.home") ?></p></a>*/
$tab=addTab(L("404"),"404");
infoBox($tab,L("404"),L("to.home"));
addHref(l("to.home"),"http://".DOMAIN."/");
?>
