<?php

$servername = "cristyjean";
$username = "student";
$password = "";
$dbname = "students";

// Create a connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the form data
    $firstname = $_POST['firstname'];
    $middle = $_POST['middle'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $course_section = $_POST['course_section'];

    // Prepare the SQL query to insert the data
    $sql = "INSERT INTO students (firstname, middle, lastname, age, address, course_section)
            VALUES ('$firstname', '$middle', '$lastname', '$age', '$address', '$course_section')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
