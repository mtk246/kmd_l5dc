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
        $_SESSION['user_id'] = $user_id;
    }

    $redirectUrl = '/' . CONST_PROJECT_FOLDER . '/pages/superadmin/index.php';

    header("Location: $redirectUrl");
    exit();
}
?>