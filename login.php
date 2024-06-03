<?php
session_start();
if (isset ($_SESSION["id"]) && $_SESSION["id"]) {
    header("location: dashboard.php");
    exit;
}
include ("conn.php");
if (isset ($_POST['submit'])) {
    $email = isset ($_POST['email']) ? $_POST['email'] : '';
    $password = isset ($_POST['password']) ? $_POST['password'] : '';

    if ($email != "" && $password != "") {
        $password = md5($password);
        $sql = "SELECT * FROM users WHERE email='$email' AND password = '$password' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION["id"] = $row["id"];
            header("location:dashboard.php");
        }else{ ?>
<div class="alert alert-danger text-center mt-2" role="alert">
    Invalid Email or Password!
</div>
<?php 
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <header class="text-center">
            <h2 class="mt-4 bg-light">User Login</h2>
        </header>
    </div>
    <section class="container w-50 bg-light mt-4">
        <form method="POST" enctype="multipart/form-data">
            <div class="col-text-center">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email">
            </div>
            <div class="col-text-center">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary mt-4 w-100" name="submit">Register</button>
            </div>
            <div class="link mt-2 text-center">
                <a href="register.php">Need an account? Sign Up!</a>
                <p class="mt-2"><a href="index.php" class="login">Back to Home</a></p>
            </div>
        </form>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>