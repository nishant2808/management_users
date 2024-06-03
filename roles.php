<?php
include "header.php";
include "footer.php";
include "conn.php";
if(isset($_POST['submit'])){
  $role = isset ($_POST['role']) ? $_POST['role'] : '';
  if($role != ''){
  $sql="INSERT INTO `role`(role) VALUES('$role') ";

  if ($conn->query($sql) === TRUE) {?>
<div class="alert alert-success" role="alert">
    Your are successfully role save!
</div>

<?php 
      } else {?>
<div class="alert alert-danger" role="alert">
    This role is already exists!
</div>
<?php }
  }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>roles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    .user_button {
        float: right;
        margin-top: 20px;
        margin-right: 10px;
    }

    .container {
        width: 940px;
    }
    .alert {
        width: 20%;
        height: 8%;
        margin-left: 500px;
        margin-top: 10px;
    }
    </style>
</head>

<body>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success user_button" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Create Role
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Role</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="adduser" method="POST">
                        <div class="form-group">
                            <label for="completerole">Role</label>
                            <input type="text" class="form-control" id="completefname" placeholder="role" name="role">
                        </div>
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

    <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Roles</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                $sql = "SELECT * FROM `role`";
                $result = mysqli_query($conn, $sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { 
                        ?>
                <tr>

                    <td>
                        <?php echo $i; ?>
                    </td>
                    <td>
                        <?php echo $row['role']; ?>
                    </td>
                    <td>
                        <a href="role_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                        <a href="role_delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('what do you call deleting a role')"
                            class="btn btn-danger">Delete</a>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>