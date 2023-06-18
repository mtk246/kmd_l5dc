<?php
require_once("Query.php");
require_once("../ErrorHandler/error.php");

class Login{
    private string $username;
    private string $password;
    private $user;
    private $query;

    function __construct() {
        $this->query = new Query();
    }

    function authLogin($username, $password) {
        $this->username = $username;
        $this->password = $password;

        $sql = "SELECT * FROM users WHERE username = '$this->username' AND password = '$this->password'";

        $this->user = $this->query->executeQuery($sql, CONST_GET);

        return json_encode($this->user);
    }
}
?>