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

// SQL query to fetch records
$sql = "SELECT e1.id, e1.first_name, e1.last_name, CONCAT(e2.first_name, ' ', e2.last_name) as supervisor, e1.email, e1.employee_code
FROM employees as e1 
JOIN  employees as e2 ON e1.supervisor = e2.id";
$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee List</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <style>
    .employee-list {
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Employee List</h2>
    <input type="text" id="search" class="form-control mb-3" placeholder="Search...">
    <table class="table table-striped employee-list">
      <thead>
        <tr>
          <th>Name</th>
          <th>Supervisor</th>
          <th>Email</th>
          <th>Employee code</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Fetch employee data from database or any source
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['first_name']} {$row['last_name']}</td>";
                echo "<td>{$row['supervisor']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "<td>{$row['employee_code']}</td>";
            }
        }
        
        ?>
      </tbody>
    </table>
  </div>

  <script>
    $(document).ready(function(){
      $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".employee-list tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>
</body>
</html>
