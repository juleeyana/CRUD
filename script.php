<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "students";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $age = $_POST["age"];
    
    $sql = "INSERT INTO student_info (name, age) VALUES ('$name', $age)";
    
    if ($conn->query($sql) === TRUE) {
        echo "Student added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM student_info";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . $row["name"] . " (Age: " . $row["age"] . ")</li>";
    }
} else {
    echo "No students found";
}

$conn->close();
?>