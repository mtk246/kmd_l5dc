<?php
require_once("../../ErrorHandler/error.php");
require_once("../../Controller/User.php");

$submit = $_POST['submit'];

if (isset($submit)) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $username = $_POST['user_name'];
    $password = $_POST['password'];
    $role = $_POST['role'];
} else {
    $redirectUrl = '/pages/admin/user.php';
    header("Location: $redirectUrl");
    exit();
}

$userController = new User();
$updateUserInfo = $userController->updateUserData($id, $name, $username, $password, $role);

if ($updateUserInfo['success'] === true) {
    $redirectUrl = CONST_BASE_URL . '/pages/admin/user.php?success=1';
    header("Location: $redirectUrl");
    exit();
}
?>