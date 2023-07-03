<?php
require_once("../../ErrorHandler/error.php");
require_once("../../Controller/Camping.php");

$submit = $_POST['submit'];

if (isset($submit)) {
    if(isset($_FILES['imageToUpload'])){
        move_uploaded_file($_FILES['imageToUpload']['tmp_name'], "../../assets/images/". $_FILES['imageToUpload']['name']);
        $image_path = $_FILES['imageToUpload']['name'];
    }

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
$updateCampingInfos = $campingController->updateCampingData($id, $name, $location, $description, $image_path);

if ($updateCampingInfos['success'] === true) {
    $redirectUrl = CONST_BASE_URL . '/pages/admin/camping.php?update=1';
    header("Location: $redirectUrl");
    exit();
} else {
    echo 'hello';
}
?>