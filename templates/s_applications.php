<?php
session_start();

require_once 'dbconnect.php';


if ($_SESSION['role_id'] != 10) {
    header('Location: access_denied.php'); 
    exit();
}


$userId = $_SESSION['user_id'];




$sql = "SELECT ia.ApplicationID, c.Name, ia.Status
        FROM internshipapplications ia
        JOIN student s ON ia.app_StudentID = s.StudentID
        JOIN company c ON ia.app_CompanyID = c.CompanyID
        WHERE s.UserID = ?";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param('i', $userId);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $applications = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $applications = []; 
    }

    $stmt->close();
}


$conn->close();
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../styles/login.css">
    <style>
        th{
            background-color:black;
            color:#fff;
            text-align:center;
            height:50px;
           
        }
        td{
            text-align:center;
            background-color:#dbdbdb;
            height:30px;
        }
        #student-applications{
            text-align:center;
        }
        table{
            text-align:center;
            width:100%;
            
        }
        h2{
            padding-right:0px;
        }
    </style>
</head>

<body>
    <header>
       
        <div class="img-div"><img class="img" src="../assets/Logo-SUSL.png"></div>
        <div class="h">
            <h1>Sabaragamuwa University of Sri Lanka<br>Internship Management System(IMS)</h1>
        </div>
        <div class="list">
            <div class="home"><a href="../index.php">&#8962 Home</a></div>
        </div>
    </header>

    <h2>My Applications</h2>
    <div id="student-applications">
        <table >
            <thead>
                <tr>
                    <th style="width:33.3%;">Application ID</th>
                    <th style="width:33.3%;" >Company Name</th>
                    <th style="width:33.3%;">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($applications as $application) : ?>
                    <tr>
                        <td><?php echo $application['ApplicationID']; ?></td>
                        <td><?php echo $application['Name']; ?></td>
                        <td><?php echo $application['Status']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
