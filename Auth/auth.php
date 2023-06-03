<?php
require_once("../Controller/Login.php");
require_once("../ErrorHandler/error.php");
require_once("../Controller/constants.php");
session_start();

if ($_POST['submit']) {
    $username = $_POST['username'];
    $password = $_POST['password'];
}

$auth = new Login();
$isLoggedInData = $auth->AuthLogin($username, $password);
$decodeData = json_decode($isLoggedInData, true);

if (count($decodeData) > 0) {
    foreach($decodeData as $data) {
        $user_id = $data['id'];
        $user_role = $data['role'];
        $_SESSION['user_id'] = $user_id;
    }

    if ($user_role === CONST_ADMIN_ROLE) {
        $redirectUrl = '/' . CONST_PROJECT_FOLDER . '/pages/admin/index.php';
    } elseif ($user_role === CONST_USER_ROLE || $user_role === CONST_GUEST_ROLE) {
        $redirectUrl = '/' . CONST_PROJECT_FOLDER . '/index.php';
    }

    header("Location: $redirectUrl");
    exit();
}
?>