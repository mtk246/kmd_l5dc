<?php
require_once("../Controller/Login.php");
require_once("../Controller/Register.php");
require_once("../ErrorHandler/error.php");
require_once("../Controller/constants.php");
session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $auth = new Login();
    $isLoggedInData = $auth->authLogin($username, $password);
    $decodeData = json_decode($isLoggedInData, true);

    if (count($decodeData) > 0) {
        foreach($decodeData as $data) {
            $user_id = $data['id'];
            $user_role = $data['role'];
            $_SESSION['user_id'] = $user_id;
        }

        if ($user_role === CONST_ADMIN_ROLE) {
            $redirectUrl =  CONST_BASE_URL . '/pages/admin/index.php';
            header("Location: $redirectUrl");
            exit();
        } elseif ($user_role === CONST_USER_ROLE || $user_role === CONST_GUEST_ROLE) {
            $redirectUrl = CONST_BASE_URL . '/index.php';
            header("Location: $redirectUrl");
            exit();
        }
    } else {
        $redirectUrl = CONST_BASE_URL . '/login.php?error=true';
        if (isset($_SESSION['login_error_attempt'])) {
            $_SESSION['login_error_attempt'] += 1;
        } else {
            $_SESSION['login_error_attempt'] = 1;
        }

        header("Location: $redirectUrl");
        exit();
    }

}

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $username = $_POST['user_name'];
    $password = $_POST['password'];

    $auth = new Register();
    $isUserExisted = $auth->registerUser($name, $username, $password);

    if ($isUserExisted === 'true') {
        $redirectUrl = CONST_BASE_URL . '/login.php?success=true';
        header("Location: $redirectUrl");
        exit();
    } else {
        $redirectUrl = CONST_BASE_URL . '/login.php?success=false';
        header("Location: $redirectUrl");
        exit();
    }
}
?>