<?php
require_once("../../ErrorHandler/error.php");
require_once("../../Controller/Rss.php");
require_once("../../Controller/constants.php");

$submit = $_POST['submit'];

if (isset($submit)) {
    $title = $_POST['title'];
    $description = $_POST['description'];
} else {
    $redirectUrl = CONST_BASE_URL . '/pages/admin/rss.php';
    header("Location: $redirectUrl");
    exit();
}

$rssController = new RSS();
$createRss = $rssController->createRssData($title, $description);

if (isset($createRss['success']) && $createRss['success'] === true) {
    $redirectUrl = CONST_BASE_URL . '/pages/admin/rss.php?success=1';
    header("Location: $redirectUrl");
    exit();
}
?>