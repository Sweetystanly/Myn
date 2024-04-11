
<?php
    session_start();
    if(isset($_SESSION['username'])){
        header("Location:add_student.php.php");
    }
?>
<!-- add_student_process.php -->
<?php
// Database connection code (include or define here)

// Retrieve form data
$name = $_POST['name'];
$date_of_birth = $_POST['date_of_birth'];
$contact_info = $_POST['contact_info'];

// Insert student record into the database
$sql = "INSERT INTO students (name, date_of_birth, contact_info) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $date_of_birth, $contact_info);
$stmt->execute();
$stmt->close();

// Redirect to view students page or display success message
?>
