<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "onlinegrocery";
    $conn = mysqli_connect($servername, $username, $password, $database);

    if(!$conn){
        die("connection failed".mysqli_connect_error());
    }else{
        echo "Connected successfully <br>";
    }

    $sqlCreateDatabase = "CREATE DATABASE IF NOT EXISTS $database";

    if (mysqli_query($conn, $sqlCreateDatabase)) {
        echo "Database created successfully<br>";
    } else {
        echo "Error creating database: " . mysqli_error($conn) . "<br>";
    }
    
    mysqli_select_db($conn, $database);

    $sqlCreateTableLogin = "CREATE TABLE IF NOT EXISTS logintable(
        login_id INT(100) AUTO_INCREMENT PRIMARY KEY,
        login_email VARCHAR(255) NOT NULL,
        login_password VARCHAR(255) NOT NULL
        )";

    if (mysqli_query($conn, $sqlCreateTableLogin)) {
        echo "Table 'login' created successfully <br>";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }

    if(isset($_POST['submit'])){
        $logEmail = $_POST['email'];
        $logPassword = $_POST['password'];

        $sql = "INSERT INTO logintable (login_email, login_password)
        VALUES ('$logEmail', '$logPassword')";

        if(mysqli_query($conn, $sql)){
            echo "Successfully login. <br>";
        }else{
            echo "ERROR: Could not ablt to execute $sql.".mysqli_error($conn);
        }
    }
    mysqli_close($conn);


?>
