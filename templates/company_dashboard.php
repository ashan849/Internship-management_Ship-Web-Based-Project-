

<?php
session_start();


// if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
//    
//     session_destroy();

//    
//     header('Location: login.php'); // Replace 'login.php' with your login page URL
//     exit();
// }


require_once 'dbconnect.php';

if ($_SESSION['role_id'] != 20) {
    header('Location: access_denied.php'); 
    exit();
}


$userId = $_SESSION['user_id'];

// my database connection code here

$sql = "SELECT CompanyID FROM company WHERE UserID = ?";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param('i', $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $companyId = $row['CompanyID'];
    } else {
        $companyId = null; // No company found for this user
    }

    $stmt->close();
}


$sql = "SELECT ia.ApplicationID, u.Email, s.FirstName, s.LastName, s.Faculty, s.Course, s.IndexNumber, ia.ApplicationDate, s.CV
        FROM internshipapplications ia
        JOIN student s ON ia.app_StudentID = s.StudentID
        JOIN user u ON s.UserID = u.UserID
        WHERE ia.app_CompanyID = ? AND ia.Status = 'approved'";


if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param('i', $companyId);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $applications = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $applications = []; // No applications found
    }

    $stmt->close();
}


$conn->close();
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Webpage</title>
    <link rel="stylesheet" type="text/css" href="../styles/comdash.css">
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

    <h2>Welcome to company Dashboard!</h2>

<div id="internship-applications">
    <table>
        <thead>
            <tr>
                <th>Application ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Faculty</th>
                <th>Course</th>
                <th>Index</th>
                <th>CV</th>
                <th>Application Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($applications as $application) : ?>
                <tr>
                    <td><?php echo $application['ApplicationID']; ?></td>
                    <td><?php echo $application['FirstName'] . ' ' . $application['LastName']; ?></td>
                    <td><?php echo $application['Email']; ?></td>
                    <td><?php echo $application['Faculty']; ?></td>
                    <td><?php echo $application['Course']; ?></td>
                    <td><?php echo $application['IndexNumber']; ?></td>
                    <td>
    <?php
    
    $cvLocation = $application['CV'];
    if (!empty($cvLocation)) {
        echo '<a href="view_cv.php?cv=' . urlencode($cvLocation) . '" target="_blank" style="color: red;">View CV</a>';
    } else {
        echo 'CV not available';
    }
    ?>
</td>



                    <td><?php echo $application['ApplicationDate']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


</body>
</html>