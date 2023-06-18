<?php
require_once("Query.php");
require_once(__DIR__ . "/constants.php");
require_once("UUID.php");

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

    function __construct() {
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

    // function getCurrentUserData($id) {
    //     $this->id = $id;

    //     $sql = "SELECT * FROM users WHERE id = '$this->id'";
    //     $this->user = $this->query->executeQuery($sql, CONST_GET);

    //     return json_encode($this->user);
    // }

    // function updateUserData($id, $name, $username, $password, $role) {
    //     $this->id = $id;
    //     $this->name = $name;
    //     $this->username = $username;
    //     $this->password = $password;
    //     $this->role = $role === '1' ? 'admin' : 'user';

    //     $sql = "UPDATE users SET name = '$this->name', username = '$this->username', password = '$this->password', role = '$this->role' WHERE id = '$this->id'";

    //     $this->response = $this->query->executeQuery($sql, CONST_PUT);

    //     return $this->response;
    // }

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