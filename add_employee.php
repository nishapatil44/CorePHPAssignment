<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "php_test";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO employees (first_name, last_name, supervisor, email, employee_code) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssiss", $firstName, $lastName, $supervisor, $email, $employeeCode);

// Set parameters and execute
$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];
$supervisor = $_POST['supervisor']; // Assuming supervisor is an integer ID
$email = $_POST['email'];
$employeeCode = $_POST['employeeCode'];

$stmt->execute();

echo "New record inserted successfully";


// Redirect back to the form with a success message
header("Location: employee-form.php");
exit();
?>
