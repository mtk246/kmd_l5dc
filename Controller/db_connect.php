<?php
  $server_name = "127.0.0.1";
  $username = "root";
  $password = "";
  $database = "mtk_camping";
  $port = "3306";

  // Create connection
  $conn = mysqli_connect($server_name, $username, $password, $database, $port);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
?>