<?php
require_once("../../ErrorHandler/error.php");
require_once("../../Controller/Camping.php");

$submit = $_POST['delete_camping'];

if (isset($submit)) {
    $camping_id = $_POST['delete_camping_id'];
} else {
    $redirectUrl = CONST_BASE_URL. '/pages/admin/camping.php';
    header("Location: $redirectUrl");
    exit();
}

$campingController = new Camping();
$deleteCamping = $campingController->deleteCamping($camping_id);

if ($deleteCamping['success'] === true) {
    $redirectUrl = CONST_BASE_URL . '/pages/admin/camping.php?delete=1';
    header("Location: $redirectUrl");
    exit();
} else {
    echo 'hello';
}
?>