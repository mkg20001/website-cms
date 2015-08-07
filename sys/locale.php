<?php

if (LANG != "en") {
loadLocale(HERE."locale".DS."en".ENDING);
}
loadLocale(HERE."locale".DS.LANG.ENDING);

function loadLocale($file) {
$lc=file_get_contents($file);
$lc=explode("
",$lc);

if (!isset($GLOBALS["C"]["langdata"])) {
$lang=array();
} else {
$lang=$GLOBALS["C"]["langdata"];
}

foreach($lc as $l) {
if ($l != "") {
$lg=explode("=",$l);
$lang[$lg[0]]=$lg[1];
}
}

$GLOBALS["C"]["langdata"]=$lang;

}

function L($l,$t=LOCALEMODE) {
$LANGDATA=$GLOBALS["C"]["langdata"];
if ($t) {
return $LANGDATA[$l];
} else {
echo $LANGDATA[$l];
}
}

?>
