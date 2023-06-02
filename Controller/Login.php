<?php
require_once("db_connect.php");
require_once("../ErrorHandler/error.php");

class Login{
    private $username;
    private $password;
    private $user;

    function __construct() {
        global $conn;
    }

    function AuthLogin(string $username, string $password) {
        global $conn;
        $sql = "SELECT * FROM users";
        $result = mysqli_query($conn, $sql);
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $this->user = $users;

        mysqli_close($conn);
        return json_encode($this->user);
    }
}
?>