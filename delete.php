<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $conn->real_escape_string($_POST['id']);

    $stmt = $conn->prepare("DELETE FROM employees WHERE id=?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        $_SESSION['message'] = "Employee deleted successfully!";
    } else {
        $_SESSION['message'] = "Error deleting employee: " . $stmt->error;
    }
    
    $stmt->close();
    header("Location: index.php");
    exit();
}
?>