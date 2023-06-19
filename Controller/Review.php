<?php
require_once("Query.php");
require_once(__DIR__ . "/constants.php");
require_once("UUID.php");

class Review{
    private array $review;
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

    function getReviews() {
        $sql = "SELECT * FROM reviews INNER JOIN users u ON u.id = reviews.user_id";
        $this->review = $this->query->executeQuery($sql, CONST_GET);

        return json_encode($this->review);
    }

    function getMyReview($user_id, $camping_id) {
        $this->user_id = $user_id;
        $this->camping_site_id = $camping_id;

        $sql = "SELECT * FROM reviews WHERE user_id = '$this->user_id' AND camping_site_id = '$this->camping_site_id'";
        $this->review = $this->query->executeQuery($sql, CONST_GET);

        return json_encode($this->review);
    }

    function getOneReviewDataById($review_id) {
        $this->review_id = $review_id;

        $sql = "SELECT * FROM reviews WHERE id = '$this->review_id'";
        $this->review = $this->query->executeQuery($sql, CONST_GET);

        return json_encode($this->review);
    }

    function editReview ($review_id, $message) {
        $this->review_id = $review_id;
        $this->message = $message;

        $sql = "UPDATE reviews SET comment = '$this->message' WHERE id = '$this->review_id'";
        $this->response = $this->query->executeQuery($sql, CONST_PUT);

        return $this->response;
    }

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

    function deleteReview($review_id) {
        $this->review_id = $review_id;

        $sql = "DELETE FROM reviews WHERE id = '$this->review_id'";
        $this->response = $this->query->executeQuery($sql, CONST_DELETE);

        return $this->response;
    }
}
?>