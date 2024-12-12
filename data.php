
<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "onlinegrocery";
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully <p>";

// Insert data from html form
if(isset($_POST['submit'])){ 
    $id = $_POST['product_id'];
    $name = $_POST['product_name'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    $sql = "INSERT INTO products (product_id, product_name, price, category) 
    VALUES ('$id', '$name', '$price', '$category')";

    if(mysqli_query($conn, $sql)){
        echo "Records added successfully.<p>";
    } else {
        echo "ERROR: Could not able to execute $sql." . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>



