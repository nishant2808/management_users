<?php
include "conn.php";
if (isset ($_GET["id"])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM `users` WHERE id=" . $id;

    $result = $conn->query($sql);

    if ($result == 1) {
        header("Location:user.php ");
    } else {
        echo "delete failed";
    }
}


?>