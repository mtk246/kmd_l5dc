<?php
require_once("Query.php");

class User{
    private array $user;
    private string $id;
    private $query;

    function __construct() {
        $this->query = new Query();
    }

    function getUserData() {
        $sql = "SELECT * FROM users";
        $this->user = $this->query->executeQuery($sql);

        return json_encode($this->user);
    }

    function getCurrentUserData($id) {
        $this->id = $id;

        $sql = "SELECT * FROM users WHERE id = '$this->id'";
        $this->user = $this->query->executeQuery($sql);

        return json_encode($this->user);
    }
}
?>