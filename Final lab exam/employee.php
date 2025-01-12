<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    // Register Employee
    if ($action === 'register') {
        $name = $_POST['name'];
        $contact_no = $_POST['contact_no'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if (empty($name) || empty($contact_no) || empty($username) || empty($password)) {
            echo "All fields are required.";
        } else {
            $stmt = $conn->prepare("INSERT INTO employees (name, contact_no, username, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $contact_no, $username, $password);
            if ($stmt->execute()) {
                echo "Employee registered successfully.";
            } else {
                echo "Error: " . $stmt->error;
            }
        }
    }

    // Update Employee
    if ($action === 'update') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $contact_no = $_POST['contact_no'];

        if (empty($name) || empty($contact_no)) {
            echo "Name and Contact No are required.";
        } else {
            $stmt = $conn->prepare("UPDATE employees SET name=?, contact_no=? WHERE id=?");
            $stmt->bind_param("ssi", $name, $contact_no, $id);
            if ($stmt->execute()) {
                echo "Employee updated successfully.";
            } else {
                echo "Error: " . $stmt->error;
            }
        }
    }

    // Delete Employee
    if ($action === 'delete') {
        $id = $_POST['id'];

        $stmt = $conn->prepare("DELETE FROM employees WHERE id=?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo "Employee deleted successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    // Search Employee
    if ($action === 'search') {
        $keyword = $_POST['keyword'];

        $stmt = $conn->prepare("SELECT * FROM employees WHERE name LIKE ? OR contact_no LIKE ?");
        $search = "%$keyword%";
        $stmt->bind_param("ss", $search, $search);
        $stmt->execute();
        $result = $stmt->get_result();
        $employees = $result->fetch_all(MYSQLI_ASSOC);

        echo json_encode($employees);
    }
}
?>
