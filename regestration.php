<?php
    include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Status</title>
    <link rel="stylesheet" href="style.css">
    </head>
<body>
    <?php
       $NAME = $_POST["name"];
       $AGE = $_POST["age"];
      
       $stmt = $conn->prepare("INSERT INTO info(Name, Age, Status) VALUES(?, ?, 0)"); 
       $stmt->bind_param("si", $NAME, $AGE);
       $execval = $stmt->execute();
       
       $message = "";
       if ($execval) {
           $message = "Registration successful!";
       } else {
           $message = "Error during registration: " . $stmt->error;
       }
       
       $stmt->close();
       $conn->close();
    ?>

    <div id="form" style="text-align: center; padding: 50px; max-width: 600px;">
        <h2><?php echo $message; ?></h2>
        <br>
        <a href="index.php" class="button-30" style="text-decoration: none; display: inline-block;">Go Back Home</a>
    </div>

    
</body>
</html>