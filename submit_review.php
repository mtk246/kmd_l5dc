<?php
session_start();
require_once("./ErrorHandler/error.php");
require_once("./Controller/Review.php");
require_once("./Controller/constants.php");

$user_id = $_SESSION['user_id'];
$camping_id = $_POST['camping_id'];
$message = $_POST['message'];

if (!isset($camping_id)) {
    $redirectUrl = CONST_BASE_URL . '/one_camping.php';
    header("Location: $redirectUrl");
    exit();
}

$review = new Review();
$reviewData = $review->createReview($camping_id, $user_id, $message);

if ($reviewData['success'] === true) {
    $redirectUrl = CONST_BASE_URL . '/one_camping.php?review=success&camping_id=' . $camping_id;
    header("Location: $redirectUrl");
    exit();
}
?>