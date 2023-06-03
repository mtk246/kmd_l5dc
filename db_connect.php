<?php
  $server_name = "127.0.0.1";
  $username = "root";
  $password = "";
  $database = "mtk_camping";

  // Create connection
  $conn = mysqli_connect($server_name, $username, $password, $database);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  } else {
    echo "Connected successfully";
  }
?>