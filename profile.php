<?php
include "header.php";
include "footer.php";
include ("conn.php");


$sql = "SELECT * FROM users where id =" . $_SESSION['id'];
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();
$firstname = $row['firstname'];
$lastname = $row['lastname'];
$email = $row['email'];


if (isset ($_POST['submit'])) {
    $firstname = isset($_POST['fname']) ? $_POST['fname']:'';
    $lastname = $_POST['lname'] ? $_POST['lname']:'';
    $email = $_POST['email'] ? $_POST['email']:'';

    $sql = "UPDATE `users` set firstname ='$firstname',lastname = '$lastname',email = '$email' WHERE id=" . $_SESSION['id'];
    $data = $conn->query($sql);
    if ($data) {?>
        <div class="alert alert-success text-center mt-2" role="alert">
            Your are successfully Update!
        </div>
    <?php } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .alert {
        width: 20%;
        height: 8%; 
      margin-left: 565px;         

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
        <form method="POST" enctype="multipart/form-data" action="profile.php">
            <div class="col-text-center">
                <label for="inputfname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="inputfname" placeholder="First Name" name="fname"
                value="<?php echo $firstname;?>">
            </div>
            <div class="col-text-center">
                <label for="inputlname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="inputlname" placeholder="Last Name" name="lname"
                value="<?php echo $lastname;?>">
            </div>
            <div class="col-text-center">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email"
                value="<?php echo $email;?>">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary mt-4 w-100" name="submit">Update</button>
            </div>
        </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>