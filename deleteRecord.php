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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    $sql = "DELETE FROM registration WHERE register_id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>
