<?php
include("conn.php");
if(isset($_POST["submit"])){
    $firstname = isset ($_POST['fname']) ? $_POST['fname'] : '';
    $lastname = isset ($_POST['lname']) ? $_POST['lname'] : '';
    $email = isset ($_POST['email']) ? $_POST['email']:'';
    $password = isset ($_POST['password']) ? $_POST['password'] :'';
    $confirmpassword = isset ($_POST['confirm_password']) ? $_POST['confirm_password'] : '';
     
    $emailExistQuery = "SELECT email FROM users WHERE email='".$email."';";
    $result = $conn->query($emailExistQuery);
    if($result->num_rows){ ?>
<div class="alert alert-danger text-center mt-2" role="alert">
    This email is alreay exists!
</div>

<?php } else{
                if ($firstname != '' && $lastname != '' && $email != '' && $password != '' && $confirmpassword != '')
                {
                    $password = md5($_POST['password']);
                    $confirmpassword = md5($_POST['confirm_password']);
                    $sql = "INSERT INTO users (firstname,lastname, email, password, confirmpassword)
                    VALUES ('$firstname','$lastname', '$email','$password', '$confirmpassword')";
                }
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
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <header class="text-center">
            <h2 class="mt-4 bg-light">Register User </h2>
        </header>
    </div>
    <section class="container w-50 bg-light mt-4">
        <form method="POST" enctype="multipart/form-data">
            <div class="col-text-center">
                <label for="inputfname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="inputfname" placeholder="First Name" name="fname">
            </div>
            <div class="col-text-center">
                <label for="inputlname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="inputlname" placeholder="Last Name" name="lname">
            </div>
            <div class="col-text-center">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email">
            </div>
            <div class="col-text-center">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password">
            </div>
            <div class="col-text-center">
                <label for="inputPassword14" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="inputPassword14" placeholder="Confirm Password"
                    name="confirm_password">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary mt-4 w-100" name="submit">Register</button>
            </div>
            <div class="link mt-2 text-center">
                <a href="login.php">Have an account? Go to login</a>
                <p class="mt-2"><a href="index.php" class="login">Back to Home</a></p>
            </div>
        </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>