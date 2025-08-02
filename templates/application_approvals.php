<?php
session_start();

require_once 'dbconnect.php';


if ($_SESSION['role_id'] != 30) {
   
    header('Location: unauthorized.php');
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['approve'])) {
  
    $applicationID = $_POST['application_id'];

    $sql = "UPDATE internshipapplications SET Status = 'Approved' WHERE ApplicationID = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param('i', $applicationID);

        if ($stmt->execute()) {
          
            echo "Application approved successfully!";
        } else {
          
            echo "Error: " . $conn->error;
        }

        $stmt->close();
    } else {
        
        echo "Error: " . $conn->error;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reject'])) {
 
    $applicationID = $_POST['application_id'];

  
    $sql = "UPDATE internshipapplications SET Status = 'Rejected' WHERE ApplicationID = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param('i', $applicationID);

        if ($stmt->execute()) {
          
            echo "Application rejected successfully!";
        } else {
           
            echo "Error: " . $conn->error;
        }

        $stmt->close();
    } else {
       
        echo "Error: " . $conn->error;
    }
}


$sql = "SELECT a.ApplicationID, s.FirstName AS StudentFirstName, s.LastName AS StudentLastName, s.IndexNumber, c.Name AS CompanyName
        FROM internshipapplications a
        JOIN student s ON a.app_StudentID = s.StudentID
        JOIN company c ON a.app_CompanyID = c.CompanyID
        WHERE a.Status = 'Pending'";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Approvals</title>
    <link rel="stylesheet" type="text/css" href="../styles/admin_dash.css">
</head>
<body>
<header>
   
    <div class="img-div"><img class="img" src="../assets/Logo-SUSL.png"></div>
    <div class="h"><h1>Sabaragamuwa University of Sri Lanka<br>Internship Management System(IMS)</h1></div>
    <div class="list">
        <div class="home"><a href="../index.php">&#8962 Home</a></div>
    </div>
</header>

<nav>
   
</nav>


<main>
    <h2>Pending Internship Applications</h2>
    <table>
        <thead>
            <tr>
                <th>Application ID</th>
                <th>Student Name</th>
                <th>Index Number</th>
                <th>Company Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['ApplicationID'] . "</td>";
                echo "<td>" . $row['StudentFirstName'] . ' ' . $row['StudentLastName'] . "</td>";
                echo "<td>" . $row['IndexNumber'] . "</td>";
                echo "<td>" . $row['CompanyName'] . "</td>";
                echo "<td>
                        <form method='post'>
                            <input type='hidden' name='application_id' value='" . $row['ApplicationID'] . "'>
                            <button type='submit' name='approve'>Approve</button>
                            <button type='submit' name='reject'>Reject</button>
                        </form>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</main>

<footer>
    <p>&copy; 2024 University Internship Management System SUSL. All rights reserved.</p>
</footer>
</body>
</html>
