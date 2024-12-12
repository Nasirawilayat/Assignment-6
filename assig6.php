<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Registration Form</title>
</head>
<body>
<h2>Student Registration Form</h2>
<form method="POST" action="">
    First Name: <input type="text" name="first_name" required><br><br>
    Last Name: <input type="text" name="last_name" required><br><br>
    Date of Birth: <input type="date" name="dob" required><br><br>
    Address: <textarea name="address" required></textarea><br><br>
    Mobile Number: <input type="text" name="mobile" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    <button type="submit">Submit </button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
    $dob = filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_STRING);
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $mobile = filter_input(INPUT_POST, 'mobile', FILTER_SANITIZE_NUMBER_INT);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    $errors = [];
    
    if (!preg_match("/^[a-zA-Z ]*$/", $first_name)) {
        $errors[] = "First name can only contain letters and spaces.";
    }
    if (!preg_match("/^[a-zA-Z ]*$/", $last_name)) {
        $errors[] = "Last name can only contain letters and spaces.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (!preg_match("/^[0-10]{11}$/", $mobile)) {
        
    }
    
    if (empty($errors)) {
        echo "<h3>Submitted Data</h3>";
        echo "<table border='1'>";
        echo "<tr><th>First Name</th><td>" . htmlspecialchars($first_name) . "</td></tr>";
        echo "<tr><th>Last Name</th><td>" . htmlspecialchars($last_name) . "</td></tr>";
        echo "<tr><th>Date of Birth</th><td>" . htmlspecialchars($dob) . "</td></tr>";
        echo "<tr><th>Address</th><td>" . nl2br(htmlspecialchars($address)) . "</td></tr>";
        echo "<tr><th>Mobile Number</th><td>" . htmlspecialchars($mobile) . "</td></tr>";
        echo "<tr><th>Email</th><td>" . htmlspecialchars($email) . "</td></tr>";
        echo "</table>";
    } else {
        
        echo "<ul style='color: red;'>";
        foreach ($errors as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>";
    }
}
?>

</body>
</html>
