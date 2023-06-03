<?php
session_start();
require_once("../../Controller/User.php");
require_once("../../Components/header.php");

$id = $_SESSION['user_id'];

$userController = new User();
$userData = $userController->getCurrentUserData($id);
$decodeUserData = json_decode($userData, true);

echo $decodeUserData[0]['username'];
?>


<?php
require_once("../../Components/footer.php");
?>