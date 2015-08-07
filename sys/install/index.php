<?php

echo file_get_contents(HERE."install".DS."install-header.html");

if (URI == "install") {
inc("install".DS."install");
} else {
inc("install".DS."must-install");
}
?>
