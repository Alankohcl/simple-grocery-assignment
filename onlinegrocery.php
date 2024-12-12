<html lang="en">
    <body>
        <?php
        $host = "localhost";
        $username = "root";
        $password = "";

        // Create connection
        $conn = mysqli_connect($host, $username, $password);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Create database
        $databaseName = "OnlineGrocery";
        $sqlCreateDatabase = "CREATE DATABASE IF NOT EXISTS $databaseName";

        if (mysqli_query($conn, $sqlCreateDatabase)) {
            echo "Database created successfully<br>";
        } else {
            echo "Error creating database: " . mysqli_error($conn) . "<br>";
        }

        mysqli_select_db($conn, $databaseName);

        $sqlCreateTable = "CREATE TABLE IF NOT EXISTS products (
            id INT AUTO_INCREMENT PRIMARY KEY,
            product_id INT NOT NULL,
            product_name VARCHAR(255) NOT NULL,
            price DECIMAL(10, 2) NOT NULL,
            category VARCHAR(50) NOT NULL
            )";
        if (mysqli_query($conn, $sqlCreateTable)) {
            echo "Table 'products' created successfully";
        } else {
            echo "Error creating table: " . mysqli_error($conn);
        }
        mysqli_close($conn);

        ?>
    </body>
</html>



