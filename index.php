<?php
require_once("./ErrorHandler/error.php");
require_once("./Controller/User.php");

$userObj = new User();
$userData = json_decode($userObj->getUserData(), true);

foreach($userData as $user){
    echo $user['id'];
}
?>
hello
