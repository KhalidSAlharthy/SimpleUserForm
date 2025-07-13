<?php
include("connection.php");

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $stmt = $conn->prepare("SELECT Status FROM info WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $currentStatus = $row['Status'];
    $stmt->close();
    $newStatus = ($currentStatus == 0) ? 1 : 0;
    $stmt = $conn->prepare("UPDATE info SET Status = ? WHERE id = ?");
    $stmt->bind_param("ii", $newStatus, $id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "No ID provided.";
}
?>