<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">Employee Management System</h1>
        
        <!-- Add Employee Button -->
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
            Add Employee
        </button>

        <!-- Employees Table -->
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Position</th>
                    <th>Salary</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM employees";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['position']}</td>
                                <td>\${$row['salary']}</td>
                                <td>
                                    <button class='btn btn-sm btn-warning edit-btn' 
                                            data-id='{$row['id']}'
                                            data-name='{$row['name']}'
                                            data-email='{$row['email']}'
                                            data-position='{$row['position']}'
                                            data-salary='{$row['salary']}'
                                            data-bs-toggle='modal' 
                                            data-bs-target='#editModal'>
                                        Edit
                                    </button>
                                    <button class='btn btn-sm btn-danger delete-btn' 
                                            data-id='{$row['id']}'
                                            data-bs-toggle='modal' 
                                            data-bs-target='#deleteModal'>
                                        Delete
                                    </button>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No employees found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modals -->
    <?php include('modals.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>