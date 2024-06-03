<?php
include "header.php";
include "footer.php";
include "conn.php";
if (isset ($_POST['submit'])) {
    $firstname = isset ($_POST['fname']) ? $_POST['fname'] : '';
    $lastname = isset ($_POST['lname']) ? $_POST['lname'] : '';
    $email = isset ($_POST["email"]) ? $_POST['email'] : '';
    $roleId = isset ($_POST["role"]) ? $_POST['role'] : '';

    $emailExistQuery = "SELECT email FROM users WHERE email='".$email."';";
    $result = $conn->query($emailExistQuery);
    if($result->num_rows){?>
            <div class="alert alert-danger text-center mt-2" role="alert">
            This email is alreay exists!
            </div>

<?php }else{
    
        if ($firstname != '' && $lastname != '' && $email != '') {
            $sql = "INSERT INTO users (firstname,lastname, email, role_id)
            VALUES ('$firstname','$lastname', '$email','$roleId')";
            if ($conn->query($sql) === TRUE) {?>
                    <div class="alert alert-success text-center mt-2" role="alert">
                    Your are successfully Register!
                    </div>

<?php 
        } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
    }

$sql = "SELECT * FROM `role`";
$result = mysqli_query($conn, $sql); 
$roles =  $result->fetch_all(MYSQLI_ASSOC);?>




<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .user_button {
        float: right;
        margin-top: 20px;
        margin-right: 10px;
    }

    .alert {
        width: 20%;
        height: 8%; 
      margin-left: 565px;         
    }

    .image {
        height: 100px;
        width: 60px;
    }
    </style>
</head>
<body>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success user_button" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Create User
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="adduser" method="POST">
                        <div class="form-group">
                            <label for="completefname">First Name</label>
                            <input type="text" class="form-control" id="completefname" placeholder="First Name"
                                name="fname">
                        </div>
                        <div class="form-group mt-3">
                            <label for="completelname">Last Name</label>
                            <input type="text" class="form-control" id="completelname" placeholder="Last Name"
                                name="lname">
                        </div>
                        <div class="form-group mt-3">
                            <label for="completemail">Email</label>
                            <input type="email" class="form-control" id="completemail" placeholder="email" name="email">
                        </div>
                        <select class="form-control mt-3" name="role">
                            <option selected> Select Your Role</option>
                            <?php foreach($roles as $role){?>
                            <option value="<?php echo $role['id']; ?>"><?php echo $role['role']; ?></option>
                            <?php } ?>
                        </select>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="container">
        <table class="table mt-5 table-hover">
            <thead>
                <tr>
                    <th scope="col">S.no</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $current_id= isset($_SESSION['id']) ? $_SESSION['id'] : 0;
                $i = 1;
                $sql = "SELECT users.*, role.role FROM `users` left join role on users.role_id = role.id";
                $result = mysqli_query($conn, $sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { 
                        ?>
                <tr>
                    <td>
                        <?php echo $i; ?>
                    </td>
                    <td>
                        <?php echo $row['firstname']; ?>
                    </td>
                    <td>
                        <?php echo $row['lastname']; ?>
                    </td>
                    <td>
                        <?php echo $row['email']; ?>
                    </td>
                    <td>
                        <?php echo $row['role']; ?>
                    </td>
                    <td>
                        <a href="user_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary ">Edit</a>
                        <?php if($current_id != $row['id']){ ?>
                        <a href="user_delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('are you sure')"
                            class="btn btn-danger">Delete</a>
                        <?php } ?>
                    </td>
                </tr>
                <?php 
                $i++;
                }
                } else {
                    echo "0 results";
                } ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>