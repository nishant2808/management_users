<?php 
error_reporting(0);
    session_start();
    
   
    if (!isset ($_SESSION["id"]) && !$_SESSION["id"]) {
        
        header("location: login.php");
        exit;
    }
    
        include "conn.php";
        $sql = "SELECT * FROM users where id =" . $_SESSION['id'];
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        // $firstname = $row['firstname'];
        $firstname = isset ($row['firstname'])? $row['firstname']:null;


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>side menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
    .user {
        background-color: black;
        color: white;
        display: flex;
    }
    .navbar{
        height: 50px;
        position: fixed;
    }
    i#btn {
    margin-top: -22px;
    position: fixed;
}

i#cancel {
    margin-top: -15px;
    margin-left: 55px;
    position: fixed;
}
a.nav-link.dropdown-toggle {
    font-size: x-large;
    margin-top: -8px;
}

i.fas.fa-house-user {
    color: #fff;
    font-size: 40px;
    margin-right: 25px;
    margin-top: 16px;

}
section {
    /* background: url(bg.jpeg) no-repeat; */
    /* background-position: center;
    background-size: cover;
    height: 100vh;
    transition: all .5s; */
}
form.d-flex.text-white.me-4 {
    margin-top: 8px;
}
a.house-icon {
    color: white;
    text-decoration: none;
}
    </style>
</head>

<body>
    <nav class="navbar bg-dark ">
        <div class="container-fluid ">
            <a class="navbar-brand">

            </a>
            <form class="d-flex text-white me-4" role="search">
            <i class='fas fa-user-alt' style='font-size:20px'></i>&nbsp;&nbsp;<?php echo $firstname;?>
            <div class="nav-item dropstart ps-2 mb-4">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="profile.php">Edit Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </form>
        </div>
    </nav>
    <input type="checkbox" id="check">
    <label for="check">
        <i class="fas fa-bars" id="btn"></i>
        <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
    <header><a href="index.php" class="house-icon"><i class="fas fa-house-user"></i>Side menu</a></header>
        <ul>
            <li><a href="dashboard.php"><i class="fas fa-user-cog"></i>Dashboard</a></li>
            <li><a href="roles.php"><i class="fas fa-cog"></i>Roles</a></li>
            <li><a href="user.php"><i class="fas fa-users"></i>Users</a></li>
            <li><a href="profile.php"><i class="fas fa-user-alt"></i>Profile</a></li>
            <li><a href="profile.php"><i class="fas fa-user-edit"></i>Edit Profile</a></li>
            <li><a href="logout.php"><i class="fas fa-power-off"></i>Log Out</a></li>
            <!-- <li><a href="#"><i class="far fa-envelope"></i>Contact</a></li> -->
            <i class="fa-solid fa-user-pen"></i>
        </ul>
    </div>
    <section></section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>