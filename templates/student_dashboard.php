<?php 

session_start();


// if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
// 
//     session_destroy();

//  
//     header('Location:  login.php'); 
//     exit();
// }


require_once 'dbconnect.php';


if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != 10) {

    header('Location: access_denied.php'); 
    exit();
}


$role_id = $_SESSION['role_id']; 
$user_id = $_SESSION['user_id'];





$sql = "SELECT c.*, u.Email AS CompanyEmail 
        FROM company c
        JOIN user u ON c.UserID = u.UserID
        WHERE u.Approveid = 2";

$result = $conn->query($sql);

$companyDetails = []; 

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $companyDetails[] = $row;
    }
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../styles/login.css"> 

    <style>
        .apply-button{
           
            color:#520103;
            
            
          
           
        }
        .apply-button:hover{
            
            color:red;
            font-size:30px;
          
           
            
            
        }
        .company-card{
           
            background-color:white;
            opacity: 0.2px;
            display:block;
            text-align:center;
            padding-bottom:100px;
            border-color:black;
            height:auto;
            padding-left:100px;
            padding-right:100px;
            border-style:solid;
            vertical-align:top;
            transition: width 0.3s, height 0.3s;
            margin-top:50px;
           
        
            
           
            
            
         


        }
       .company-list{
        /* display: block; */
        margin-top:50px;
        margin-bottom:100px;
        text-align:center;
        
       }
       .company-card:hover{
  
        background-color:#fff;
        
        
       

        
       }
       .apply-button{
        color:black;
       }
       .app:hover{
        opacity:0.5px;
       }
       
     
    </style>
</head>
<body>
<header >
       
    
     <div class="img-div"> <img class="img" src="../assets/Logo-SUSL.png"></div>
    <div class="h"> <h1>Sabaragamuwa University of Sri Lanka<br>Internship Management System(IMS)</h1></div>
    
   
   
              <div class="list"><div class ="home"> <a href="../index.php">&#8962 Home </a></div><div  style="display:inline-block; margin-left:100px; margin-right:10px;"><button><a class="app" href="../templates/s_applications.php?user_id=<?php echo $user_id; ?>">My Applications &#62</a></button></div> 
               </div>
            
           
               
   </header>

        <h2 style="margin-left:150px;">Welcome to Student Dashboard!</h2>
    

    <nav>
      
    </nav>

  
    <main>
        <h2 style="color:black; margin-top:10px; margin-left:150px;">Company Details</h2>
        <div class="company-list" style="height:auto;">
            <?php foreach ($companyDetails as $company) : ?>
                <div class="company-card">
                    <h3><?php echo $company['Name']; ?></h3>
                    <p>Industry: <?php echo $company['Industry']; ?></p>
                    <p>Email: <?php echo $company['CompanyEmail']; ?></p>
                    <p>Address: <?php echo $company['Address']; ?></p>   
                    
                    <p style="text-align:justify;"><?php echo $company['Description']; ?></p>
                    

                    <a href="apply_internship.php?user_id=<?php echo $_SESSION['id']; ?>&company_id=<?php echo $company['CompanyID']; ?>" class="apply-button">Apply</a>
                    
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer>
    <p>&copy; 2024 University Internship Management System SUSL. All rights reserved.</p>
    </footer>
</body>
</html>
