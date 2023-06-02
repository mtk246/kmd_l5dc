<?php
require_once("../Controller/Login.php");
require_once("../ErrorHandler/error.php");

if ($_POST['submit']) {
    $username = $_POST['username'];
    $password = $_POST['password'];
}


echo $username;
?>