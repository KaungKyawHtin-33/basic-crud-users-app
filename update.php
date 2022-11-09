<?php 

require_once "./conn.php";

$id = $_REQUEST['id']; // $_GET ka error tat lox Form yae post method nae nyi p
$sql = "SELECT * FROM users WHERE id=$id";
$query = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($query);

echo "<pre>";   

print_r($row);  

if(isset($_POST['updateBtn']))
{
    $userName = $_POST['user_name'];
    $userEmail = $_POST['user_email'];
    $userId = $_POST['id'];

    $tmpFile = $_FILES['user_photo']['tmp_name'];
    $photoName = $_FILES['user_photo']['name'];
    $dir = "store/";
    $updatePhoto = $dir.uniqid()."_".$photoName;

    unlink($row['photo']);

    move_uploaded_file($tmpFile, $updatePhoto);

    $sql = "UPDATE users SET name='$userName',email='$userEmail',photo='$updatePhoto' WHERE id=$userId";
    if(mysqli_query($conn, $sql))
    {
        header("location:index.php");
    }
    else
    {
        echo "Update Fail!!!";
    }

}

?>

<form action="update.php" method="post" enctype="multipart/form-data">
    <input type="hidden" value="<?= $row['id'] ?>" name="id"><br>
    <input type="text" name="user_name" value="<?= $row['name'] ?>"><br>
    <input type="email" name="user_email" value="<?= $row['email'] ?>"><br>
    <input type="file" name="user_photo" required><br>
    <button name="updateBtn">Update</button>
</form>

