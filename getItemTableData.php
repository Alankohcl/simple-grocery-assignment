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

            td img{
                max-width: 100px;
                max-height:100px;
                height: auto;
                margin-bottom: 10px;
                text-align:center;
                display:block;
                margin:0 auto;
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
            
                $selectedTable = $_POST["items"];
                //select database
                $sql = "SELECT * FROM $selectedTable";
                $result = $conn->query($sql);
            
                if ($result->num_rows > 0) {
                    echo "<table border='1'>
                    <tr>
                    <th class='id'>ID</th>
                    <th class='img'>Image</th>
                    <th class='name'>Name</th>
                    <th class='price'>Price (RM)</th>
                    <th class='cat'>Category</th>
                    </tr>";
            
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["item_id"] . "</td>";
                        echo "<td><img src=' " . $row["item_image_link"] . " ' alt='image'</td>";
                        echo "<td>" . $row["item_name"] . "</td>";
                        echo "<td> RM" . $row["item_price"] . "</td>";
                        echo "<td>" . $row["item_category"] . "</td>";   
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
