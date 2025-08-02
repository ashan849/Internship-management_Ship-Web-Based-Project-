<?php
session_start();

require_once 'dbconnect.php';


if ($_SESSION['role_id'] != 30) {
    header('Location: access_denied.php'); 
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = $_POST['email'];

   
    $sql = "UPDATE user
            SET ApproveID = 2
            WHERE Email = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param('s', $email);

        if ($stmt->execute()) {
           
            header('Location: student_approvals.php'); 
            exit();
        } else {
            echo 'Error approving the student: ' . $stmt->error;
        }

        $stmt->close();
    } else {
        echo 'Error preparing the SQL statement: ' . $conn->error;
    }
}


$sql = "SELECT s.StudentID, CONCAT(s.FirstName, ' ', s.LastName) AS StudentName, s.IndexNumber, u.Email
        FROM student s
        JOIN user u ON s.UserID = u.UserID
        WHERE u.ApproveID = 1"; 

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $pendingStudents = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $pendingStudents = []; 
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Approvals</title>
    <link rel="stylesheet" type="text/css" href="../styles/admin_dash.css">

    <style>
        .tbl{
            margin-top:100px;
        }
    </style>
</head>

<body>
<header >
       
       
     <div class="img-div"> <img class="img" src="../assets/Logo-SUSL.png"></div>
    <div class="h"> <h1>Sabaragamuwa University of Sri Lanka<br>Internship Management System(IMS)</h1></div>
    
   
  
              <div class="list"><div class ="home"> <a href="../index.php">&#8962 Home</a></div>
               </div>
            
           
               
   </header>
    <nav>
        
    </nav>


    <main>
        <div class="tbl">
        <table>
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Index Number</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pendingStudents as $student) : ?>
                    <tr>
                        <td><?php echo $student['StudentName']; ?></td>
                        <td><?php echo $student['IndexNumber']; ?></td>
                        <td><?php echo $student['Email']; ?></td>
                        <td>
                            <form action="student_approvals.php" method="post">
                                <input type="hidden" name="email" value="<?php echo $student['Email']; ?>">
                                <button type="submit">Approve</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
                </div>
    </main>

    <footer>
    <p>&copy; 2024 University Internship Management System SUSL. All rights reserved.</p>
    </footer>

</body>

</html>
