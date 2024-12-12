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

            $sqlCreateTableRegister = "CREATE TABLE IF NOT EXISTS registration(
                register_id INT(100) AUTO_INCREMENT PRIMARY KEY,
                register_name VARCHAR(255) NOT NULL,
                register_email VARCHAR(255) NOT NULL,
                register_phone VARCHAR(255) NOT NULL,
                register_gender VARCHAR(255) NOT NULL
                )";

            if (mysqli_query($conn, $sqlCreateTableRegister)) {
                echo "Table 'register' created successfully";
            } else {
                echo "Error creating table: " . mysqli_error($conn);
            }

            if(isset($_POST['submit'])){
                $regName = $_POST['username'];
                $regEmail = $_POST['email'];
                $regPhone = $_POST['phonenumber'];
                $regGender = $_POST['gender'];

                $sql = "INSERT INTO registration (register_name, register_email, register_phone, register_gender)
                VALUES ('$regName', '$regEmail','$regPhone','$regGender')";

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