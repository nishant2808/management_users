<?php
include "header.php";
include "footer.php";
include "conn.php";


if (isset ($_GET["id"])) {
    $id = $_GET['id'];
    if (isset ($_POST['submit'])) {
        $role = isset($_POST['role']) ? $_POST['role'] : '';

        $sql = "UPDATE `role` set role ='$role'WHERE id=" . $id;
        if ($conn->query($sql) === TRUE) {
            echo "<script> location.href='http://localhost/register/roles.php'; </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    
    $sql = "SELECT * FROM `role` where id=" . $id;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); 
        
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Roles edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container">
        <header class="text-center">
            <h2 class="mt-4"> Users Role </h2>
        </header>
    </div>
    <section class="container w-50 bg-light mt-4">
        <form method="POST" enctype="multipart/form-data">
            <div class="col-text-center">
                <label for="inputrole" class="form-label">Role</label>
                <input type="text" class="form-control" id="inputrole" placeholder="Role" name="role" value="<?php echo $row['role']; ?>">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary mt-4 w-100" name="submit">Save</button>
            </div>
        </form>
    </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
    }

} else {
   echo "0 result";

} ?>