<?php
//Open UP A Connection

$C=$GLOBALS["C"];

$mysqli = new mysqli($C["sql"]["server"], $C["sql"]["username"], $C["sql"]["password"], $C["sql"]["database"], $C["sql"]["port"]);
if ($mysqli->connect_error) {
if ($_GET["against"]=="true" and URI=="install") {
unlink(CONFIG);
header("Location: http://".DOMAIN."/install");
}
    if ($C["sql"]["password"] != "") {
    $ispw="Yes";
    } else {
    $ispw="No";
    }
    die("<b>ERROR</b> Accessing MySQL database ".$C["sql"]["username"]."@".$C["sql"]["server"].":".$C["sql"]["port"]."/".$C["sql"]["database"]." (Using Password: ".$ispw.")  <a href=\"http://".DOMAIN."/install?against=true\">Reset Config & Reconfigure</a>");
} else {
$GLOBALS["C"]["sql"]["i"]=$mysqli;
}

//Executes MySQL Queries
function domy($query) {
$link=$GLOBALS["C"]["sql"]["i"];

$data=array();

if (mysqli_multi_query($link, $query)) {
    do {
        /* store first result set */
        if ($result = mysqli_use_result($link)) {
            while ($row = mysqli_fetch_row($result)) {
                $data[] = $row;
            }
            mysqli_free_result($result);
        }
        /* print divider 
        if (mysqli_more_results($link)) {
            printf("-----------------\n");
        }*/
    } while (mysqli_next_result($link));
}
return $data;
}

//TODO: Add better entry adding/removing/updating
?>
