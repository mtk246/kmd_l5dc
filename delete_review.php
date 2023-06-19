<?php
session_start();
require_once("./ErrorHandler/error.php");
require_once("./Controller/Review.php");
require_once("./Controller/constants.php");

$user_id = $_SESSION['user_id'];
$review_id = $_POST['review_id'];
$camping_id = $_POST['camping_id'];

if (!isset($review_id)) {
    $redirectUrl = CONST_BASE_URL . '/one_camping.php';
    header("Location: $redirectUrl");
    exit();
}

$review = new Review();
$reviewData = $review->deleteReview($review_id);

if ($reviewData['success'] === true) {
    $redirectUrl = CONST_BASE_URL . '/one_camping.php?review_delete=success&camping_id=' . $camping_id;
    header("Location: $redirectUrl");
    exit();
}

if ($reviewData['success'] === false) {
    $redirectUrl = CONST_BASE_URL . '/one_camping.php?review_delete=failed&camping_id=' . $camping_id;
    header("Location: $redirectUrl");
    exit();
}
?>