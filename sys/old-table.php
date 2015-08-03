<?php
function table($text,$arg="") {
return "<table $arg>$text</table>";
}
function tr($text,$arg="") {
return "<tr $arg>$text</tr>";
}
function td($text,$arg="") {
return "<td $arg>$text</td>";
}
function h1($text,$arg="") {
return "<h1 $arg>$text</td>";
}
function h2($text,$arg="") {
return "<h2 $arg>$text</td>";
}
function h3($text,$arg="") {
return "<h3 $arg>$text</td>";
}
function p($text,$arg="") {
return "<p $arg>$text</td>";
}
function href($text,$url,$arg="") {
return "<a href=\"$url\" $arg>$text</a>";
}
?>
