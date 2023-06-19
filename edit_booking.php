<?php
session_start();
require_once("./ErrorHandler/error.php");
require_once("./Controller/Booking.php");
require_once("./Controller/constants.php");

$user_id = $_SESSION['user_id'];
$booking_id = $_POST['booking_id'];
$camping_id = $_POST['camping_id'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];

echo $start_date;

if (!isset($booking_id)) {
    $redirectUrl = CONST_BASE_URL . '/one_camping.php';
    header("Location: $redirectUrl");
    exit();
}

$booking = new Booking();
$bookingData = $booking->editBooking($start_date, $end_date, $booking_id);


if ($bookingData['success'] === true) {
    $redirectUrl = CONST_BASE_URL . '/one_camping.php?update=success&camping_id=' . $camping_id;
    header("Location: $redirectUrl");
    exit();
}

if ($bookingData['success'] === false) {
    $redirectUrl = CONST_BASE_URL . '/one_camping.php?update=failed&camping_id=' . $camping_id;
    header("Location: $redirectUrl");
    exit();
}
?>