<?php
session_start();
require_once("./ErrorHandler/error.php");
require_once("./Controller/Booking.php");
require_once("./Controller/constants.php");

$user_id = $_SESSION['user_id'];
$booking_id = $_POST['booking_id'];
$camping_id = $_POST['camping_id'];
$delete_booking = $_POST['delete_booking'];

if (!isset($delete_booking)) {
    $redirectUrl = CONST_BASE_URL . '/booking.php';
    header("Location: $redirectUrl");
    exit();
}

$booking = new Booking();
$bookingData = $booking->deleteBooking($booking_id);


if ($bookingData['success'] === true) {
    $redirectUrl = CONST_BASE_URL . '/one_camping.php?delete=success&camping_id=' . $camping_id;
    header("Location: $redirectUrl");
    exit();
}

if ($bookingData['success'] === false) {
    $redirectUrl = CONST_BASE_URL . '/one_camping.php?delete=failed&camping_id=' . $camping_id;
    header("Location: $redirectUrl");
    exit();
}
?>