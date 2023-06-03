<?php
require_once("../../constants.php");
require_once(CONST_BASE_PATH . "/db_connect.php");

class Query {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function executeQuery($sql) {
        $result = mysqli_query($this->conn, $sql);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

        mysqli_close($this->conn);

        return $data;
    }
}
?>
