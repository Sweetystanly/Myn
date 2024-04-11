<?php
include ("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $date_of_birth = $_POST["date_of_birth"];
    $contact_info = $_POST["contact_info"];

    // Insert new student into the database
    $sql = "INSERT INTO students (name, date_of_birth, contact_info) VALUES ('$name', '$date_of_birth', '$contact_info')";

    if ($conn->query($sql) === TRUE) {
        echo "New student added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?> <!-- Display existing students -->
<h3>Existing Students</h3>
   <table border="1">
       <tr>
           <th>Name</th>
           <th>Date of Birth</th>
           <th>Contact Information</th>
           <th>Action</th>
       </tr>
       <?php
       // Include database connection code
       include ("connection.php");

       // Retrieve existing students from the database
       $sql = "SELECT * FROM students";
       $result = $conn->query($sql);

       if ($result->num_rows > 0) {
           while($row = $result->fetch_assoc()) {
               echo "<tr>";
               echo "<td>".$row["name"]."</td>";
               echo "<td>".$row["date_of_birth"]."</td>";
               echo "<td>".$row["contact_info"]."</td>";
               echo "<td><a href='edit_student.php?id=".$row["id"]."'>Edit</a></td>";
               echo "</tr>";
           }
       } else {
           echo "<tr><td colspan='4'>No students found</td></tr>";
       }
       ?>
   </table>
</body>
</html>