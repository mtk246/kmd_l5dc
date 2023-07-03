<?php
require_once("Query.php");
require_once(__DIR__ . "/constants.php");

class VisitorCount{
    private array $data;
    private query $query;
    private string $ip_address;
    private array $response;

    function __construct() {
        $this->query = new Query();
    }

    function getOneVisitCount($ip_address) {
        $this->ip_address = $ip_address;

        $sql = "SELECT * FROM visit_counter WHERE ip_address = '$this->ip_address'";
        $this->data = $this->query->executeQuery($sql, CONST_GET);

        return json_encode($this->data);
    }

    function postVisitCount($ip_address) {
        $this->ip_address = $ip_address;

        $sql = "INSERT INTO visit_counter (ip_address) VALUES ('$this->ip_address')";

        $this->response = $this->query->executeQuery($sql, CONST_POST);

        return $this->response;
    }
}
?>