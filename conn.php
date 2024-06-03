<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "mangement_user";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";

// $sql = "CREATE TABLE users (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     firstname VARCHAR(255) NOT NULL,
//     lastname VARCHAR(255) NOT NULL,
//     email VARCHAR(255) NOT NULL,
//     password VARCHAR (255) NOT NULL,
//     confirmpassword VARCHAR (255) NOT NULL,
//     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
//     )";
    
//     if ($conn->query($sql) === TRUE) {
//       echo "Table MyGuests created successfully";
//     } else {
//       echo "Error creating table: " . $conn->error;
//     }
// $sql = "CREATE TABLE role(
//     id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     role VARCHAR(255) NOT NULL UNIQUE,
//     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )";

// $result = $conn->query($sql);
// if ($result == 1) {
//     echo "successfully";
// } else {
//     echo "error";
// }
    
   


?>