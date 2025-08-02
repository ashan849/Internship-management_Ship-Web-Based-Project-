<?php
session_start();

require_once 'dbconnect.php';


if ($_SESSION['role_id'] != 30) {
    header('Location: access_denied.php'); 
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    var_dump($_POST);  //check the form data
    $email = $_POST['email'];

    
    $sql = "UPDATE User u
            JOIN Company c ON u.UserID = c.UserID
            SET u.ApproveID = 2
            WHERE u.Email = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param('s', $email);

        if ($stmt->execute()) {
            
            header('Location: company_approvals.php'); 
            exit();
        } else {
            echo 'Error approving the company: ' . $stmt->error;
        }

        $stmt->close();
    } else {
        echo 'Error preparing the SQL statement: ' . $conn->error;
    }
}


$sql = "SELECT c.CompanyID, c.Name, u.Email
        FROM Company c
        JOIN User u ON c.UserID = u.UserID
        WHERE u.ApproveID = 1"; 

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $pendingCompanies = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $pendingCompanies = []; // No pending companies found
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Registration Approvals</title>
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

    
    <main><div class="tbl">
        <table>
            <thead>
                <tr>
                    <th>Company Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pendingCompanies as $company) : ?>
                    <tr>
                        <td><?php echo $company['Name']; ?></td>
                        <td><?php echo $company['Email']; ?></td>
                        <td>
                            <form action="company_approvals.php" method="post">
                                <input type="hidden" name="email" value="<?php echo $company['Email']; ?>">
                                <button type="submit">Approve</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table></div>
    </main>

    <footer>
        <p>&copy; 2024 University Internship Management System SUSL. All rights reserved.</p>
    </footer>

</body>

</html>
