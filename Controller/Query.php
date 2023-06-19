<?php
require_once(__DIR__ . "/constants.php");
require_once(CONST_BASE_PATH . "/db_connect.php");

class Query {
    private $conn;
    private string $method;
    private array $response = [];

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function executeQuery($sql, $method) {
        $this->method = $method;
    
        if ($this->method === CONST_PUT) {
            $result = mysqli_query($this->conn, $sql);
    
            if ($result) {
                $this->response = [
                    'success' => true,
                    'message' => 'Updated successfully.'
                ];
            } else {
                $this->response = [
                    'success' => false,
                    'message' => 'Something went wrong.'
                ];
            }
    
            return $this->response;
        } else if ($this->method === CONST_GET) {
            $result = mysqli_query($this->conn, $sql);
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
            return $data;
        } else if ($this->method === CONST_POST) {
            $result = mysqli_query($this->conn, $sql);
            if ($result) {
                $this->response = [
                    'success' => true,
                    'message' => 'Created successfully.'
                ];
            } else {
                $this->response = [
                    'success' => false,
                    'message' => 'Something went wrong.'
                ];
            }
    
            return $this->response;
        } else if ($this->method === CONST_DELETE) {
            $result = mysqli_query($this->conn, $sql);
    
            if ($result) {
                $this->response = [
                    'success' => true,
                    'message' => 'Deleted successfully.'
                ];
            } else {
                $this->response = [
                    'success' => false,
                    'message' => 'Something went wrong.'
                ];
            }
    
            return $this->response;
        }
    }    
}
?>
