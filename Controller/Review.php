<?php
require_once("Query.php");
require_once(__DIR__ . "/constants.php");
require_once("UUID.php");

class Review{
    private array $camping;
    private string $review_id;
    private query $query;
    private string $camping_site_id;
    private string $user_id;
    private string $message;
    private array $response;
    private bool $result;

    function __construct() {
        $this->query = new Query();
    }

    // function getOneBookingData($user_id, $camping_id) {
    //     $this->user_id = $user_id;
    //     $this->camping_site_id = $camping_id;

    //     $sql = "SELECT * FROM bookings WHERE user_id = '$this->user_id' AND camping_site_id = '$this->camping_site_id'";
    //     $this->camping = $this->query->executeQuery($sql, CONST_GET);

    //     return json_encode($this->camping);
    // }

    // function getOneBookingDataById($booking_id) {
    //     $this->booking_id = $booking_id;

    //     $sql = "SELECT * FROM bookings WHERE id = '$this->booking_id'";
    //     $this->camping = $this->query->executeQuery($sql, CONST_GET);

    //     return json_encode($this->camping);
    // }

    // function editBooking($start_date, $end_date, $booking_id) {
    //     $this->start_date = $start_date;
    //     $this->end_date = $end_date;
    //     $this->booking_id = $booking_id;

    //     $sql = "UPDATE bookings SET start_date = '$this->start_date', end_date = '$this->end_date' WHERE id = '$this->booking_id'";
    //     $this->response = $this->query->executeQuery($sql, CONST_PUT);

    //     return $this->response;
    // }

    function createReview($camping_site_id, $user_id, $message) {
        $uuid_value= new UUID();
        $this->review_id = $uuid_value->generate();
        $this->camping_site_id = $camping_site_id;
        $this->user_id = $user_id;
        $this->message = $message;

        $createReview = "INSERT INTO reviews (id, camping_site_id, user_id, comment) VALUES ('$this->review_id', '$this->camping_site_id', '$this->user_id', '$this->message')";
        $this->response = $this->query->executeQuery($createReview, CONST_POST);

        return $this->response;
    }

    // function deleteBooking($booking_id) {
    //     $this->booking_id = $booking_id;

    //     $sql = "DELETE FROM bookings WHERE id = '$this->booking_id'";
    //     $this->response = $this->query->executeQuery($sql, CONST_DELETE);

    //     return $this->response;
    // }
}
?>