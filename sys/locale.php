<?php
$lc=file_get_contents(HERE."locale".DS.LANG.ENDING);
$lc=explode("
",$lc);

$lang=array();

foreach($lc as $l) {
$lg=explode("=",$l);
$lang[$lg[0]]=$lg[1];
}

$GLOBALS["C"]["langdata"]=$lang;

function L($l,$t=false) {
$LANGDATA=$GLOBALS["C"]["langdata"];
if ($t) {
return $LANGDATA[$l];
} else {
echo $LANGDATA[$l];
}
}

?>
