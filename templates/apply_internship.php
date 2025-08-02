<?php
session_start();

require_once 'dbconnect.php';


$user_id = $_GET['user_id']; 
$company_id = $_GET['company_id']; 


$sql = "SELECT s.StudentID, s.FirstName AS StudentFirstName, s.LastName AS StudentLastName, s.IndexNumber, c.Name AS CompanyName
        FROM student s
        JOIN company c ON c.CompanyID = ?
        WHERE s.UserID = ?";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param('ii', $company_id, $user_id);
    if ($stmt->execute()) {
        $stmt->bind_result($studentID, $studentFirstName, $studentLastName, $indexNumber, $companyName);
        $stmt->fetch();
    } else {
     
        echo "Error: " . $conn->error;
    }
    $stmt->close();
} else {
   
    echo "Error: " . $conn->error;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $applicationDate = date("Y-m-d H:i:s");

    $status = "Pending";

   
    $sql = "INSERT INTO internshipapplications (app_StudentID, app_CompanyID, ApplicationDate, Status)
            VALUES (?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param('iiss', $studentID, $company_id, $applicationDate, $status);

        if ($stmt->execute()) {
          
            echo "Application submitted successfully!";
        } else {
           
            echo "Error: " . $conn->error;
        }

        $stmt->close();
    } else {
        
        echo "Error: " . $conn->error;
    }
}


$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for Internship</title>
    <link rel="stylesheet" type="text/css" href="../styles/login.css">
</head>
<body>
    <header>
    
       
     
     <div class="img-div"> <img class="img" src="../assets/Logo-SUSL.png"></div>
    <div class="h"> <h1>Sabaragamuwa University of Sri Lanka<br>Internship Management System(IMS)</h1></div>
    
   
  
              <div class="list"><div class ="home"> <a href="../index.php">&#8962 Home</a></div>
               </div>
            
    </header><br>
    <br>
    <br>
    <br>
    
    <h1 style="text-align:center; color:black; ">Apply for Internship</h1>

    
    <main>
        <div class="application-info" style="text-align:center;">
            <p>Student Name: <?php echo $studentFirstName . ' ' . $studentLastName; ?></p>
            <p>Index Number: <?php echo $indexNumber; ?></p>
            <p>Company Name: <?php echo $companyName; ?></p>
        </div>

        <div class="application-form">
            <form method="post">
              <div style="text-align:center;"><button type="submit" style="width:200px; text-align:center; ">Submit Application</button></div>   
            </form>
           
        </div>
       
    </main>

    <footer>
        <p>&copy; 2024 University Internship Management System SUSL. All rights reserved.</p>
    </footer>
</body>
</html>
