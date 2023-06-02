<?php
require_once("db_connect.php");

class User{
    private $user;

    function __construct() {
        global $conn;

        $sql = "SELECT * FROM users";
        $result = mysqli_query($conn, $sql);
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $this->user = $users;

        mysqli_close($conn);
    }

    function getUserData() {
        return json_encode($this->user);
    }
}
?>