<?php

require_once "./conn.php";

echo "<pre>";

$sql = "SELECT * FROM users";
$query = mysqli_query($conn, $sql);

