<?php
require_once("Query.php");
require_once(__DIR__ . "/constants.php");

class User{
    private array $user;
    private string $id;
    private query $query;
    private string $name;
    private string $username;
    private string $password;
    private string $role;
    private array $response;

    function __construct() {
        $this->query = new Query();
    }

    function getUserData() {
        $sql = "SELECT * FROM users";
        $this->user = $this->query->executeQuery($sql, CONST_GET);

        return json_encode($this->user);
    }

    function getCurrentUserData($id) {
        $this->id = $id;

        $sql = "SELECT * FROM users WHERE id = '$this->id'";
        $this->user = $this->query->executeQuery($sql, CONST_GET);

        return json_encode($this->user);
    }

    function updateUserData($id, $name, $username, $password, $role) {
        $this->id = $id;
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
        $this->role = $role === '1' ? 'admin' : 'user';

        $sql = "UPDATE users SET name = '$this->name', username = '$this->username', password = '$this->password', role = '$this->role' WHERE id = '$this->id'";

        $this->response = $this->query->executeQuery($sql, CONST_PUT);

        return $this->response;
    }
}
?>