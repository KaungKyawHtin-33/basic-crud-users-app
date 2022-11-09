<?php

$conn = mysqli_connect("localhost", "root", "", "user_db");

if(!$conn) {
    echo "Connection Error : ".mysqli_connect_error();
}