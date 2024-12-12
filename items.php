<!DOCTYPE html>
<html>
    <body>
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

            $sqlCreateTableItems = "CREATE TABLE IF NOT EXISTS items (
                item_id INT(100) AUTO_INCREMENT PRIMARY KEY,
                item_image_link VARCHAR(255) NOT NULL,
                item_name VARCHAR(50) NOT NULL,
                item_price DECIMAL(20, 2) NOT NULL,
                item_category VARCHAR(255) NOT NULL
                )";

            if (mysqli_query($conn, $sqlCreateTableItems)) {
                echo "Table 'items' created successfully";
            } else {
                echo "Error creating table: " . mysqli_error($conn);
            }

            if(isset($_POST['submit'])){
                $itemImage = $_POST['item_image'];
                $itemName = $_POST['item_name'];
                $itemPrice = $_POST['item_price'];
                $itemCategory = $_POST['item_category'];

                $sql = "INSERT INTO items (item_image_link, item_name, item_price, item_category)
                VALUES ('$itemImage', '$itemName','$itemPrice','$itemCategory')";

                if(mysqli_query($conn, $sql)){
                    echo "Successfully registered. <br>";
                }else{
                    echo "ERROR: Could not ablt to execute $sql.".mysqli_error($conn);
                }
            }
            mysqli_close($conn);
        ?>
    </body>
</html>