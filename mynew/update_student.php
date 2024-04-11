<?php
include ("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST["id"];
    $name = $_POST["name"];
    $date_of_birth = $_POST["date_of_birth"];
    $contact_info = $_POST["contact_info"];

    // Update student details in the database
    $sql = "UPDATE students SET name='$name', date_of_birth='$date_of_birth', contact_info='$contact_info' WHERE id='$student_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Student updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
