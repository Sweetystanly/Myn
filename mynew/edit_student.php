<?php
include ("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $student_id = $_GET["id"];

    // Fetch student details from the database
    $sql = "SELECT * FROM students WHERE id='$student_id'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $name = $row["name"];
        $date_of_birth = $row["date_of_birth"];
        $contact_info = $row["contact_info"];
    } else {
        echo "Student not found";
        exit;
    }
} else {
    echo "Invalid request";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>
    <h2>Edit Student</h2>
    <form action="update_student.php" method="post">
        <input type="hidden" name="id" value="<?php echo $student_id; ?>">
        <input type="text" name="name" value="<?php echo $name; ?>" required><br>
        <input type="date" name="date_of_birth" value="<?php echo $date_of_birth; ?>" required><br>
        <input type="email" name="contact_info" value="<?php echo $contact_info; ?>" required><br>
        <button type="submit">Update Student</button>
    </form>
</body>
</html>
