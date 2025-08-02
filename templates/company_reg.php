<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Account Creation</title>
    <link rel="stylesheet" type="text/css" href="../styles/company_reg.css">
</head>

<body>






<header >
       
       
     <div class="img-div"> <img class="img" src="../assets/Logo-SUSL.png"></div>
    <div class="h"> <h1>Sabaragamuwa University of Sri Lanka<br>Internship Management System(IMS)</h1></div>
    
   
  
              <div class="list"><div class ="home"> <a href="../index.php">	&#8962 Home</a></div>
               </div>
            
           
               
   </header>
   <h2>Company Registration</h2>
  <div style="text-align:center; color:#7CFC00;"> <?php
session_start();

require_once 'dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $companyName = mysqli_real_escape_string($conn, $_POST['companyName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); 
    $industry = mysqli_real_escape_string($conn, $_POST['industry']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $companyDescription = mysqli_real_escape_string($conn, $_POST['companyDescription']);

    // Upload company logo
    $logoPath = null;
    if (isset($_FILES['companyLogo']) && $_FILES['companyLogo']['error'] === UPLOAD_ERR_OK) {
        $logoName = $_FILES['companyLogo']['name'];
        $logoTmpName = $_FILES['companyLogo']['tmp_name'];
        $logoPath = 'uploads/' . $logoName;

        if (move_uploaded_file($logoTmpName, $logoPath)) {
            
        } else {
            echo 'Error uploading company logo.';
        }
    }

    // SQL query to insert the data into the "user" table
    $userSql = "INSERT INTO user (Email, Password, RoleID) VALUES (?, ?, ?)";
    if ($userStmt = $conn->prepare($userSql)) {
        
        $roleID = 20; 
        $userStmt->bind_param('ssi', $email, $password, $roleID);

        if ($userStmt->execute()) {
          
            $userID = $userStmt->insert_id;

           
            $companySql = "INSERT INTO company (Name, Address, Description, Industry, LogoPath, UserID) VALUES (?, ?, ?, ?, ?, ?)";
            if ($companyStmt = $conn->prepare($companySql)) {
                
                $companyStmt->bind_param('sssssi', $companyName, $address, $companyDescription, $industry, $logoPath, $userID);

                if ($companyStmt->execute()) {
                   
                    echo 'Company registration successful.';
                } else {
                    echo 'Error registering the company: ' . $companyStmt->error;
                }

                $companyStmt->close();
            } else {
                echo 'Error preparing the company SQL statement: ' . $conn->error;
            }
        } else {
            echo 'Error registering the user: ' . $userStmt->error;
        }

        $userStmt->close();
    } else {
        echo 'Error preparing the user SQL statement: ' . $conn->error;
    }


    $conn->close();
}
?></div>

<form action="company_reg.php" method="post" autocomplete="off">
    <label for="companyName">Company Name:</label>
    <input type="text" id="companyName" name="companyName" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <label for="confirmPassword">Confirm Password:</label>
    <input type="password" id="confirmPassword" name="confirmPassword" required>

    <label for="companyLogo">Company Logo (Upload):</label>
    <input type="file" id="companyLogo" name="companyLogo" accept="image/*">

    <label for="industry">Industry:</label>
    <select id="industry" name="industry" required>
        <option value="Construction">Construction</option>
        <option value="Technology">Technology</option>
        <option value="Finance">Finance</option>
        <option value="Agriculture">Agriculture</option>
        <option value="Other">Other</option>
       
    </select>

    <label for="address">Address(type address in a single Raw):</label>
    <textarea id="address" name="address" rows="4" required></textarea>

    <label for="companyDescription">Company Description:</label>
    <textarea id="companyDescription" name="companyDescription" rows="6" required></textarea>

    <button type="submit">Create Account</button>
</form>

<div class="footer-inf">
    <footer>
        <p>&copy; 2024 University Name | Questions? Email: info@example.com</p>
    </footer>
</div>



</body>

</html>
