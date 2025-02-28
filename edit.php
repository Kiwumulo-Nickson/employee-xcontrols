<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $conn->real_escape_string($_POST['id']);
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $position = $conn->real_escape_string($_POST['position']);
    $salary = $conn->real_escape_string($_POST['salary']);

    $stmt = $conn->prepare("UPDATE employees SET name=?, email=?, position=?, salary=? WHERE id=?");
    $stmt->bind_param("sssdi", $name, $email, $position, $salary, $id);
    
    if ($stmt->execute()) {
        $_SESSION['message'] = "Employee updated successfully!";
    } else {
        $_SESSION['message'] = "Error updating employee: " . $stmt->error;
    }
    
    $stmt->close();
    header("Location: index.php");
    exit();
}
?>