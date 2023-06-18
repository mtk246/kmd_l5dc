<?php
require_once("Query.php");
require_once("../ErrorHandler/error.php");
require_once("../Controller/constants.php");

class Register{
    private string $name;
    private string $username;
    private string $password;
    private $user;
    private $query;
    private $role;

    function __construct() {
        $this->query = new Query();
    }

    function registerUser($name, $username, $password) {
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
        $this->role = CONST_USER_ROLE;

        $sql = "SELECT * FROM users WHERE username = '$this->username'";

        $this->user = $this->query->executeQuery($sql, CONST_GET);

        $isUserExisted = count($this->user);

        if ($isUserExisted > 0) {
            return json_encode(false);
        } else {
            $sql = "INSERT INTO users (name, username, password, role) VALUES ('$this->name', '$this->username', '$this->password', '$this->role')";

            $this->user = $this->query->executeQuery($sql, CONST_POST);

            return json_encode(true);
        }
    }
}
?>