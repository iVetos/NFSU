<?php
// Security
define('__CONST_INCLUDES', true);

// Include configs
require_once('../includes/functions.inc.php');
echo encodeString(replaceSpaces(stripSym($_POST['name'])));
?>