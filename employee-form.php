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
$sql = "SELECT * FROM employees";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>User Form</title>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">Employee Form</h3>
                </div>
                
                <div class="card-body">
                    <div id="successMessage" class="alert alert-success" style="display: none;">
                        Registration successful!
                    </div>
                    <form method="post" action="add_employee.php" onsubmit="showSuccessMessage()">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="firstname">First Name:</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastname">Last Name:</label>
                                <input type="lastname" class="form-control" id="lastname" name="lastname" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="supervisor">Supervisor:</label>
                                <select id="supervisor" class="form-control">
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) { ?>
                                            <option value="<?php echo $row["id"]; ?>"><?php echo $row["first_name"]." ".$row["last_name"]; ?></option>
                                    <?php
                                        }
                                    } ?>
                                </select>
                                </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="employeeCode">Employee code:</label>
                                <input type="employeeCode" class="form-control" id="employeeCode" name="employeeCode" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function showSuccessMessage(){
        document.getElementById('successMessage').style.display = 'block';
    }
</script>
</body>
</html>
