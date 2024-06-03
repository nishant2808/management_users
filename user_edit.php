<?php
include "conn.php";
include "header.php";
include "footer.php";

if (isset ($_GET["id"])) {
    $id = $_GET['id'];
    if (isset ($_POST['submit'])) {
        $firstname = isset($_POST['fname'])?$_POST['fname']:'';
        $lastname = isset($_POST['lname'])?$_POST['lname']:'';
        $email = isset($_POST['email'])?$_POST['email']:'';
        $role = isset($_POST['role'])?$_POST['role']:'';

        $sql = "UPDATE `users` set firstname ='$firstname',lastname = '$lastname',email = '$email', 
        role_id ='$role'  WHERE id=" . $id;

        if ($conn->query($sql)===TRUE) {
            echo "<script> location.href='http://localhost/register/user.php'; </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }
 } 
// else {
//      echo "0 result";
 
//  }
    $sql_role = "SELECT * FROM `role`";
    $result_role = mysqli_query($conn, $sql_role); 
    $all_roles =  $result_role->fetch_all(MYSQLI_ASSOC);

    $sql = "SELECT * FROM `users` where id=" . $id;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); 
    }
    // else{
    //     echo "no data";
    // }
        
        
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .alert {
        width: 20%;
        height: 8%;
        margin-left: 500px;
        margin-top: 10px;
    }
    </style>
</head>
<body>
    <div class="container">
        <header class="text-center">
            <h2 class="mt-4">Update User </h2>
        </header>
    </div>
    <section class="container w-50 bg-light mt-4">
        <form method="POST" enctype="multipart/form-data">
            <div class="col-text-center">
                <label for="inputfname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="inputfname" placeholder="First Name" name="fname"
                value="<?php echo $row['firstname'];?>">
            </div>
            <div class="col-text-center">
                <label for="inputlname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="inputlname" placeholder="Last Name" name="lname"
                value="<?php echo $row['lastname'];?>">
            </div>
            <div class="col-text-center">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email"
                value="<?php echo $row['email'];?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Role</label>
                <select class="form-control" id="exampleFormControlSelect2" name="role">
                    <option selected>Select Your Role</option>
                    <?php foreach ($all_roles as $role){?>
                        <option value="<?php echo $role['id'];?>"<?php
                        if($row['role_id']== $role['id']){
                            echo 'selected="selected"';
                        }
                        ?>>
                        <?php echo $role['role'];?>
                        </option>
                        <?php }?> 
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary mt-4 w-100" name="submit">Update</button>
            </div>
        </form>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
