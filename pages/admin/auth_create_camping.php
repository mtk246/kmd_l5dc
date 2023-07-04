<?php
require_once("../../ErrorHandler/error.php");
require_once("../../Controller/Camping.php");
require_once("../../Controller/constants.php");

$submit = $_POST['submit'];

if (isset($submit)) {
    $camping_site_name = $_POST['camping_site_name'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $feature_name = $_POST['feature_name'];
    $attraction_name = $_POST['attraction_name'];
    $contact_name = $_POST['contact_name'];
    $contact_email = $_POST['contact_email'];
    $contact_phone = $_POST['contact_phone'];

    if(isset($_FILES['imageToUpload'])){
        move_uploaded_file($_FILES['imageToUpload']['tmp_name'], "../../assets/images/". $_FILES['imageToUpload']['name']);
        $image_path = $_FILES['imageToUpload']['name'];
    }
} else {
    $redirectUrl = CONST_BASE_URL . '/pages/admin/camping.php';
    header("Location: $redirectUrl");
    exit();
}

$campingController = new Camping();
$createCamping = $campingController->createCampingData($camping_site_name, $location, $description, $feature_name, $attraction_name, $contact_name, $contact_email, $contact_phone, $image_path);

if (isset($createCamping['success']) && $createCamping['success'] === true) {
    $redirectUrl = CONST_BASE_URL . '/pages/admin/camping.php?success=1';
    header("Location: $redirectUrl");
    exit();
}
?>