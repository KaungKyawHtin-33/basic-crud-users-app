<?php 

require_once "./conn.php";

$id = $_GET['id'];
$photo = $_GET['photo'];

unlink($photo); // delete photo inside local storage
$sql = "DELETE FROM users WHERE id=$id"; 

if(mysqli_query($conn, $sql))
{
    header("location:index.php");
} 
else 
{
    echo "Delete Fail!!!";
}