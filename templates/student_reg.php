

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Student</title>
    <link rel="stylesheet" type="text/css" href="../styles/student_reg.css">
</head>

<body>

<header >
       
      
     <div class="img-div"> <img class="img" src="../assets/Logo-SUSL.png"></div>
    <div class="h"> <h1>Sabaragamuwa University of Sri Lanka<br>Internship Management System(IMS)</h1></div>
    
   
  
              <div class="list"><div class ="home"> <a href="../index.php">&#8962 Home</a></div>
               </div>
            
           
               
   </header>
   <h2>Student Registration</h2>

  
</div style="text-align:center; color:#7CFC00;">  <?php

include('dbconnect.php');


$firstName = $lastName = $faculty = $course = $index = $studentEmail = $password = $profilePhoto = $cv = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $faculty = mysqli_real_escape_string($conn, $_POST['faculty']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);
    $index = mysqli_real_escape_string($conn, $_POST['index']);
    $studentEmail = mysqli_real_escape_string($conn, $_POST['email']); 
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

   
    if (isset($_FILES['profilePhoto']) && $_FILES['profilePhoto']['error'] == 0) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES['profilePhoto']['name']);
        if (move_uploaded_file($_FILES['profilePhoto']['tmp_name'], $targetFile)) {
            $profilePhoto = $targetFile;
        } else {
            echo "Error uploading profile photo.";
            exit();
        }
    }

    // File upload handling for CV
    if (isset($_FILES['cv']) && $_FILES['cv']['error'] == 0) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES['cv']['name']);
        if (move_uploaded_file($_FILES['cv']['tmp_name'], $targetFile)) {
            $cv = $targetFile;
        } else {
            echo "Error uploading CV.";
            exit(); 
        }
    }

    // Start a transaction
    mysqli_begin_transaction($conn);

    // Insert data into the 'user' table to create a user account
    $userInsertQuery = "INSERT INTO user (Email, Password, RoleID, ApproveID)
                        VALUES ('$studentEmail', '$hashedPassword', 10, 1)"; 

    if (mysqli_query($conn, $userInsertQuery)) {
       
        $userID = mysqli_insert_id($conn);

       
        $studentInsertQuery = "INSERT INTO student (FirstName, LastName, Faculty, Course, IndexNumber, ProfilePhoto, CV, UserID)
                               VALUES ('$firstName', '$lastName', '$faculty', '$course', '$index', '$profilePhoto', '$cv', $userID)";

        if (mysqli_query($conn, $studentInsertQuery)) {
            
            mysqli_commit($conn);
            echo "Student registration successful!";
        } else {
           
            mysqli_rollback($conn);
            echo "Error: " . mysqli_error($conn);
        }
    } else {
       
        mysqli_rollback($conn);
        echo "Error creating user account: " . mysqli_error($conn);
    }
}
?></div>




<div class="form1">
    <form enctype="multipart/form-data" method="post">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required>

        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required>

        

        

        <label for="faculty">Faculty:</label>
        <select id="faculty" name="faculty" required>
            <option value="Geomatics">Geomatics</option>
            <option value="Technology">Technology</option>
            <option value="Social Sciences and languages">Social Sciences and languages</option>
            <option value="Mangement">Mangement</option>
            <option value="Computing">Computing</option>
            <option value="agri">agri</option>
            <option value="Applied Sciences<">Applied Sciences</option>
            
           
        </select>

        <label for="course">Course:</label>
        <input type="text" id="course" name="course" required>

        <label for="index">Index:</label>
        <input type="text" id="index" name="index" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">password:</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm password">Confirm password:</label>
        <input type="password" id="confirm password" name="confirm password" required>

        

        

        <label for="profilePhoto">Upload Profile Photo (JPG/PNG):</label>
        <input type="file" id="profilePhoto" name="profilePhoto" accept=".jpg, .jpeg, .png">

        <label for="cv">Upload CV (PDF):</label>
        <input type="file" id="cv" name="cv" accept=".pdf">

        <button type="submit">Create Account</button>
    </form>
</div>

   <div class="footer-inf"><footer>
   <p>&copy; 2024 University Internship Management System SUSL. All rights reserved.</p>
    </footer></div> 

</body>

</html>

