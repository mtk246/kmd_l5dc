<?php
require_once("../../ErrorHandler/error.php");
require_once("../../Controller/RSS.php");
require_once("../../Controller/constants.php");

$submit = $_POST['submit'];

if (isset($submit)) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    echo $id . $title. $description;
} else {
    $redirectUrl = CONST_BASE_URL . '/pages/admin/rss.php';
    header("Location: $redirectUrl");
    exit();
}

$rssController = new RSS();
$rssUpdateInfo = $rssController->updateRssData($id, $title, $description);

if ($rssUpdateInfo['success'] === true) {
    $redirectUrl = CONST_BASE_URL . '/pages/admin/rss.php?success=1';
    header("Location: $redirectUrl");
    exit();
}
?>