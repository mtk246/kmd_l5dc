<?php
require_once("Query.php");
require_once(__DIR__ . "/constants.php");
require_once("UUID.php");
require_once(CONST_BASE_PATH . "/db_connect.php");

class Camping{
    private string $camping_site_id;
    private query $query;
    private string $camping_site_name;
    private string $location;
    private string $description;
    private string $feature_name;
    private string $attraction_name;
    private string $contact_name;
    private string $contact_email;
    private string $contact_phone;
    private array $camping; 
    private array $response;
    private $conn;

    function __construct() {
        global $conn;
        $this->conn = $conn;
        $this->query = new Query();
    }

    function getCampingData() {
        $sql = "SELECT * FROM camping_sites";
        $this->camping = $this->query->executeQuery($sql, CONST_GET);

        return json_encode($this->camping);
    }

    function getOneCampingData($id) {
        $sql = "SELECT * FROM camping_sites WHERE id = '$id'";
        $this->camping = $this->query->executeQuery($sql, CONST_GET);

        return json_encode($this->camping);
    }

    function getCurrentCampingData($id) {
        $this->camping_site_id = $id;

        $sql = "SELECT * FROM camping_sites WHERE id = '$this->camping_site_id'";
        $this->camping = $this->query->executeQuery($sql, CONST_GET);

        return json_encode($this->camping);
    }

    function updateCampingData($id, $name, $location, $description) {
        $this->camping_site_id = $id;
        $this->camping_site_name = $name;
        $this->location = $location;
        $this->description = $description;

        $sql = "UPDATE camping_sites SET name = '$this->camping_site_name', location = '$this->location', description = '$this->description' WHERE id = '$this->camping_site_id'";

        $this->response = $this->query->executeQuery($sql, CONST_PUT);

        return $this->response;
    }

    function createCampingData($camping_site_name, $location, $description, $feature_name, $attraction_name, $contact_name, $contact_email, $contact_phone) {
        $uuid_value= new UUID();
        $this->camping_site_id = $uuid_value->generate();
        $this->camping_site_name = $camping_site_name;
        $this->location = $location;
        $this->description = $description;
        $this->feature_name = $feature_name;
        $this->attraction_name = $attraction_name;
        $this->contact_name = $contact_name;
        $this->contact_email = $contact_email;
        $this->contact_phone = $contact_phone;

        $campingQuery = "INSERT INTO camping_sites (id, name, location, description) VALUES ('$this->camping_site_id', '$this->camping_site_name', '$this->location', '$this->description')";
        $this->query->executeQuery($campingQuery, CONST_POST);

        $featureQuery = "INSERT INTO features (id, camping_site_id, feature_name) VALUES ('$this->camping_site_id', '$this->camping_site_id', '$this->feature_name')";
        $this->query->executeQuery($featureQuery, CONST_POST);

        $attractionQuery = "INSERT INTO local_attractions (id, camping_site_id, attraction_name) VALUES ('$this->camping_site_id', '$this->camping_site_id', '$this->attraction_name')";
        $this->query->executeQuery($attractionQuery, CONST_POST);

        $contactQuery = "INSERT INTO contacts (id, camping_site_id, contact_name, contact_email, contact_phone) VALUES ('$this->camping_site_id', '$this->camping_site_id', '$this->contact_name', '$this->contact_email', '$this->contact_phone')";
        $this->response = $this->query->executeQuery($contactQuery, CONST_POST);

        return $this->response;
    }
}
?>