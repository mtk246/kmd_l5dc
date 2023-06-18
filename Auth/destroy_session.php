<?php
require_once("../ErrorHandler/error.php");
require_once("../Controller/constants.php");

session_start();
session_destroy();

$redirectUrl = CONST_BASE_URL . '/';
header("Location: $redirectUrl");
exit();
?>