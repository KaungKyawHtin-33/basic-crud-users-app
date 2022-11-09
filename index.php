<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic CRUD Testing</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        table {
            font-size: 18px;
        }
        .image {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            border: 1px solid gray;
        }
    </style>
</head>
<body>
    
    <div class="container p-5">
        <div class="row">
            <div class="col-12 col-lg-4">
                <h3 class="text-center text-primary text-decoration-underline mb-3">User Registeration Form</h3>
                <!-- Form Registeration -->
                <form class="shadow mt-5 p-3 rounded" action="./create.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3 form-floating">
                        <input type="text" name="user_name" id="name" class="form-control" placeholder="Enter Your Name" required>
                        <label for="name" class="form-label">Enter Your Name</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="email" name="user_email" id="email" class="form-control" placeholder="Enter Your Email" required>
                        <label for="email" class="form-label">Enter Your Email</label>
                    </div>
                    <div class="mb-3">
                        <input type="file" name="photo" id="photo" class="form-control" required>
                    </div>
                    <button class="btn px-4 btn-success mb-3" name="btnSubmit">Submit</button>
                </form>
            </div>
            <div class="col-12 col-lg-8 mt-5 mt-lg-0">
                <h3 class="text-center text-primary text-decoration-underline  mb-3">Users Table</h3>
                <!-- Table -->
                <?php include_once "./read.php"; ?>

                <table class="table table-striped table-bordered mt-3 border rounded table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Profile</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Setting</th>
                    </thead>
                    <tbody>
                        <?php 
                            while($data = mysqli_fetch_assoc($query)){
                        ?>
                            <tr>
                                <td><?= $data['id'] ?></td>
                                <td class="text-center"><img src="<?= $data['photo'] ?>" class="image" alt=""></td>
                                <td><?= $data['name'] ?></td>
                                <td><?= $data['email'] ?></td>
                                <td><a href="./delete.php?id=<?= $data['id'] ?>&photo=<?= $data['photo'] ?>">Delete</a> | <a href="./update.php?id=<?= $data['id'] ?>">Update</a></td> 
                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>

</body>
</html>