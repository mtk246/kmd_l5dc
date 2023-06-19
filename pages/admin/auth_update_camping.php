<?php
require_once("../../ErrorHandler/error.php");
require_once("../../Controller/Camping.php");

$submit = $_POST['submit'];

if (isset($submit)) {
    $id = $_POST['camping_id'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $description = $_POST['description'];
} else {
    $redirectUrl = '/pages/admin/user.php';
    header("Location: $redirectUrl");
    exit();
}

$campingController = new Camping();
$updateCampingInfos = $campingController->updateCampingData($id, $name, $location, $description);

if ($updateCampingInfos['success'] === true) {
    $redirectUrl = CONST_BASE_URL . '/pages/admin/camping.php?update=1';
    header("Location: $redirectUrl");
    exit();
} else {
    echo 'hello';
}
?>