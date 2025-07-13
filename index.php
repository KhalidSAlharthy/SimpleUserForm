<?php
    include("connection.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    
    <div id="form">
        <form name="form" method="POST" action="regestration.php">

            <br>
            <div>
                <label for="name">Name:</label>
                <br>
                <input type="text" id="name" name="name" required>
            </div>
            <br>
            <div>
                <label for="age">Age:</label>
                <br>
                <input type="number" id="age" name="age" required>
            </div>
            <br>
            <div>
                <input type="submit" id="btn" class="button-30" value="Submit" name="submit">
            </div>
        </form>
    </div>
     
 
    <div id="tabble">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT id, Name, Age, Status FROM info"; 
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"]. "</td>";
                    echo "<td>" . $row["Name"]. "</td>";
                    echo "<td>" . $row["Age"]. "</td>";
                    echo "<td>" . $row["Status"]. "</td>";
                  
                    echo "<td><form action='toggle_status.php' method='POST'><input type='hidden' name='id' value='" . $row["id"] . "'><button type='submit'>Toggle</button></form></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No users found</td></tr>";
            }
            $conn->close(); 
            ?>
        </tbody>
    </table>
    </div>
    
</body>
</html>