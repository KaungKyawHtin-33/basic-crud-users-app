<?php

require_once "./conn.php";

if(isset($_POST['btnSubmit']))
{   
    $userName = $_POST['user_name'];
    $userEmail = $_POST['user_email'];

    $tmp_file = $_FILES['photo']['tmp_name'];
    $photo_name = $_FILES['photo']['name'];
    $dir = "store/";
    $userPhoto = $dir.uniqid()."_".$photo_name;

    move_uploaded_file($tmp_file, $userPhoto);
    $sql = "INSERT INTO users (name,email,photo) VALUES ('$userName','$userEmail','$userPhoto')";

    if(mysqli_query($conn, $sql))
    {
        header("location:index.php");   
    } 
    else 
    {
        echo "Query Fail!!!";
    }
}


