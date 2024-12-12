<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
            table{
                border-spacing:0px;
                border:1px solid black;
                width:80%;
            }

            th, td{
                border:1px solid black;
                padding:10px;
            }
        </style>
    </head>

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
            
                $selectedTable = $_POST["registration"];
                $sql = "SELECT * FROM $selectedTable";
                $result = $conn->query($sql);
            
                if ($result->num_rows > 0) {
                    echo "<table border='1'>
                    <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Gender</th>
                    <th>Action</th>
                    </tr>";
            
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["register_id"] . "</td>";
                        echo "<td>" . $row["register_name"] . "</td>";
                        echo "<td>" . $row["register_email"] . "</td>";
                        echo "<td>" . $row["register_phone"] . "</td>";
                        echo "<td>" . $row["register_gender"] . "</td>";
                        echo "<td>
                        <button onclick='updateRecord(" . $row["register_id"] . ")'>Update</button>
                        <button onclick='deleteRecord(" . $row["register_id"] . ")'>Delete</button>
                        </td>";
                        echo "</tr>";
                    }
            
                    echo "</table>";
                } else {
                    echo "No records found in the selected table.";
                }
                mysqli_close($conn);
        ?>
    </body>
</html>
