<?php

// MySQL server information
$servername = "localhost"; // Typically 'localhost' for a local server
$username = "ims_admin"; // Your MySQL username
$password = "123#ims"; // Your MySQL password
$dbname = "ims"; // Your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";


// $adminEmail = 'ims_admin@ims.com';
// $adminPassword = 'ims@123'; // Replace with the desired password
// $hashedPassword = password_hash($adminPassword, PASSWORD_DEFAULT);
// $roleId = 30; // Role ID for admin

// $stmt = $conn->prepare("INSERT INTO User (Email, Password, RoleID) VALUES (?, ?, ?)");
// $stmt->bind_param("ssi", $adminEmail, $hashedPassword, $roleId);
// $stmt->execute();

// echo "admin added successfully";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Student</title>
    <link rel="stylesheet" type="text/css" href="../styles/student_reg.css">
</head>

<body>

    <header>
        <h1>Student Account Creation</h1>
    </header>

    <?php
    // Include the database connection file
    include('dbconnect.php');

    // Define variables to store form data
    $firstName = $lastName = $faculty = $course = $index = $email = $password = $profilePhoto = $cv = "";

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize and store form data
        $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
        $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
        $faculty = mysqli_real_escape_string($conn, $_POST['faculty']);
        $course = mysqli_real_escape_string($conn, $_POST['course']);
        $index = mysqli_real_escape_string($conn, $_POST['index']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        
        // Hash the password for security (you should use a better hashing method)
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // File upload handling for profile photo
        if (isset($_FILES['profilePhoto']) && $_FILES['profilePhoto']['error'] == 0) {
            $targetDir = "uploads/"; // Define the target directory for uploaded files
            $targetFile = $targetDir . basename($_FILES['profilePhoto']['name']);
            if (move_uploaded_file($_FILES['profilePhoto']['tmp_name'], $targetFile)) {
                $profilePhoto = $targetFile;
            } else {
                echo "Error uploading profile photo.";
            }
        }

        // File upload handling for CV
        if (isset($_FILES['cv']) && $_FILES['cv']['error'] == 0) {
            $targetDir = "uploads/"; // Define the target directory for uploaded files
            $targetFile = $targetDir . basename($_FILES['cv']['name']);
            if (move_uploaded_file($_FILES['cv']['tmp_name'], $targetFile)) {
                $cv = $targetFile;
            } else {
                echo "Error uploading CV.";
            }
        }

        // Insert data into the database
        $sql = "INSERT INTO student (FirstName, LastName, Faculty, Course, IndexNumber, Email, Password, ProfilePhoto, CV, ApproveID)
                VALUES ('$firstName', '$lastName', '$faculty', '$course', '$index', '$email', '$hashedPassword', '$profilePhoto', '$cv', 1)";

        if (mysqli_query($conn, $sql)) {
            echo "Student registration successful!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    ?>

    <form enctype="multipart/form-data" method="post">
        <!-- Your form inputs as shown in the original code -->

        <!-- Add a submit button -->
        <input type="submit" value="Create Account">
    </form>

   <div class="footer-inf"><footer>
        <p>&copy; 2024 University Name | Questions? Email: info@example.com</p>
    </footer></div> 

</body>

</html>
