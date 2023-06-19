<?php
require_once("Query.php");
require_once(__DIR__ . "/constants.php");
require_once("UUID.php");

class Booking{
    private array $camping;
    private string $booking_id;
    private query $query;
    private string $camping_site_id;
    private string $user_id;
    private string $start_date;
    private string $end_date;
    private array $response;

    function __construct() {
        $this->query = new Query();
    }

    // function getCampingData() {
    //     $sql = "SELECT * FROM camping_sites";
    //     $this->camping = $this->query->executeQuery($sql, CONST_GET);

    //     return json_encode($this->camping);
    // }

    function getOneBookingData($user_id, $camping_id) {
        $this->user_id = $user_id;
        $this->camping_site_id = $camping_id;

        $sql = "SELECT * FROM bookings WHERE user_id = '$this->user_id' AND camping_site_id = '$this->camping_site_id'";
        $this->camping = $this->query->executeQuery($sql, CONST_GET);

        return json_encode($this->camping);
    }

    function getOneBookingDataById($booking_id) {
        $this->booking_id = $booking_id;

        $sql = "SELECT * FROM bookings WHERE id = '$this->booking_id'";
        $this->camping = $this->query->executeQuery($sql, CONST_GET);

        return json_encode($this->camping);
    }

    function editBooking($start_date, $end_date, $booking_id) {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->booking_id = $booking_id;

        $sql = "UPDATE bookings SET start_date = '$this->start_date', end_date = '$this->end_date' WHERE id = '$this->booking_id'";
        $this->response = $this->query->executeQuery($sql, CONST_PUT);

        return $this->response;
    }

    function createBooking($camping_site_id, $user_id, $start_date, $end_date) {
        $uuid_value= new UUID();
        $this->booking_id = $uuid_value->generate();
        $this->camping_site_id = $camping_site_id;
        $this->user_id = $user_id;
        $this->start_date = $start_date;
        $this->end_date = $end_date;

        $campingQuery = "INSERT INTO bookings (id, camping_site_id, user_id, start_date, end_date) VALUES ('$this->booking_id', '$this->camping_site_id', '$this->user_id', '$this->start_date', '$this->end_date')";
        $this->response = $this->query->executeQuery($campingQuery, CONST_POST);

        return $this->response;
    }

    function deleteBooking($booking_id) {
        $this->booking_id = $booking_id;

        $sql = "DELETE FROM bookings WHERE id = '$this->booking_id'";
        $this->response = $this->query->executeQuery($sql, CONST_DELETE);

        return $this->response;
    }
}
?>