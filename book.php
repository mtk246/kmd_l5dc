<?php
session_start();
require_once("./ErrorHandler/error.php");
require_once("./Controller/Booking.php");
require_once("./Controller/constants.php");

$user_id = $_SESSION['user_id'];
$camping_id = $_POST['camping_id'];

if (!isset($user_id) && !isset($camping_id)) {
    $redirectUrl = CONST_BASE_URL . '/login.php';
    header("Location: $redirectUrl");
    exit();
}

$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];

$booking = new Booking();
$bookingData = $booking->createBooking($camping_id, $user_id, $start_date, $end_date);
var_dump($bookingData);

if ($bookingData['success'] === true) {
    $redirectUrl = CONST_BASE_URL . '/one_camping.php?book=success&camping_id=' . $camping_id;
    header("Location: $redirectUrl");
    exit();
}

if ($bookingData['success'] === false) {
    $redirectUrl = CONST_BASE_URL . '/one_camping.php?book=failed&camping_id=' . $camping_id;
    header("Location: $redirectUrl");
    exit();
}
?>