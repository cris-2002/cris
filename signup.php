<?php
// Database connection settings
$servername = "localhost";
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "test_db"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables and error messages
$firstname = $lastname = $middlename = $course_section = $username = $email = $password = "";
$firstnameErr = $lastnameErr = $middlenameErr = $course_sectionErr = $usernameErr = $emailErr = $passwordErr = "";

// Form handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    if (empty($_POST["firstname"])) {
        $firstnameErr = "First name is required";
    } else {
        $firstname = test_input($_POST["firstname"]);
    }

    if (empty($_POST["lastname"])) {
        $lastnameErr = "Last name is required";
    } else {
        $lastname = test_input($_POST["lastname"]);
    }

    $middlename = test_input($_POST["middlename"]); // Middlename is optional

    if (empty($_POST["course_section"])) {
        $course_sectionErr = "Course & Section is required";
    } else {
        $course_section = test_input($_POST["course_section"]);
    }

    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
    } else {
        $username = test_input($_POST["username"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
        $password = password_hash($password, PASSWORD_DEFAULT); // Hash the password
    }

    // If no errors, insert into database
    if (empty($firstnameErr) && empty($lastnameErr) && empty($course_sectionErr) && empty($usernameErr) && empty($emailErr) && empty($passwordErr)) {
        $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, middlename, course_section, username, email, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $firstname, $lastname, $middlename, $course_section, $username, $email, $password);

        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();

// Function to sanitize input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>
<body>
    <h2>Signup Form</h2>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <!-- First Name -->
        <label for="firstname">First Name:</label>
        <input type="text" name="firstname" id="firstname" value="<?php echo $firstname; ?>">
        <span><?php echo $firstnameErr; ?></span><br><br>

        <!-- Last Name -->
        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" id="lastname" value="<?php echo $lastname; ?>">
        <span><?php echo $lastnameErr; ?></span><br><br>

        <!-- Middle Name (Optional) -->
        <label for="middlename">Middle Name:</label>
        <input type="text" name="middlename" id="middlename" value="<?php echo $middlename; ?>"><br><br>

        <!-- Course & Section -->
        <label for="course_section">Course & Section:</label>
        <input type="text" name="course_section" id="course_section" value="<?php echo $course_section; ?>">
        <span><?php echo $course_sectionErr; ?></span><br><br>

        <!-- Username -->
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="<?php echo $username; ?>">
        <span><?php echo $usernameErr; ?></span><br><br>

        <!-- Email -->
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo $email; ?>">
        <span><?php echo $emailErr; ?></span><br><br>

        <!-- Password -->
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <span><?php echo $passwordErr; ?></span><br><br>

        <button type="submit">Register</button>
    </form>
</body>
</html>
