<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $position = $conn->real_escape_string($_POST['position']);
    $salary = $conn->real_escape_string($_POST['salary']);

    $stmt = $conn->prepare("INSERT INTO employees (name, email, position, salary) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssd", $name, $email, $position, $salary);
    
    if ($stmt->execute()) {
        $_SESSION['message'] = "Employee added successfully!";
    } else {
        $_SESSION['message'] = "Error adding employee: " . $stmt->error;
    }
    
    $stmt->close();
    header("Location: index.php");
    exit();
}
?>