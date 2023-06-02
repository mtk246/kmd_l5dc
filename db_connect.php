<?php
  $server_name = "db";
  $username = "root";
  $password = "my_secret_password";
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