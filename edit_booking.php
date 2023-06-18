<?php
session_start();
require_once("./ErrorHandler/error.php");
require_once("./Controller/Booking.php");
require_once("./Controller/constants.php");

$user_id = $_SESSION['user_id'];
$booking_id = $_POST['booking_id'];

if (!isset($user_id) && !isset($booking_id)) {
    $redirectUrl = CONST_BASE_URL . '/login.php';
    header("Location: $redirectUrl");
    exit();
}

$booking = new Booking();
$bookingData = $booking->editBooking($booking_id);
var_dump($bookingData);

// if ($bookingData['success'] === true) {
//     $redirectUrl = CONST_BASE_URL . '/one_camping.php?book=success&camping_id=' . $camping_id;
//     header("Location: $redirectUrl");
//     exit();
// }

// if ($bookingData['success'] === false) {
//     $redirectUrl = CONST_BASE_URL . '/one_camping.php?book=failed&camping_id=' . $camping_id;
//     header("Location: $redirectUrl");
//     exit();
// }
?>