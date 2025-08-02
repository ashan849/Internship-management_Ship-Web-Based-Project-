<?php
session_start();

// Check if the user is logged in
// if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
//     // Log the user out by destroying the session
//     session_destroy();

//     // Redirect to the login page or any other appropriate page
//     header('Location: login.php'); // Replace 'login.php' with your login page URL
//     exit();
// }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Internship Management System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" >
    

    
    
    

 <style> 

body{
    width: 100%;
    margin:0;
    padding: 0;
}
header {
background-color: #520103;
color: white;

height: 50px;

/* display: block; */
background-position: center top;
padding-top: 0%;

}
footer{
    text-align: center;
    background-color: #520103;
    height: 100px;
    padding-top: 25px;
    color: white;
}


.home,.about,.login{
display: inline-block;
margin-right: 50px;
}


.list{
display: block;
float: right;
margin-top: 10px;
font-size: 20px;
display: inline-block;
margin-right:0px;

font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;



}
.home:hover,.login:hover{
opacity: 0.5;


}
a {
color:white;
text-decoration: none;
-webkit-text-stroke-color: 5px #520103;
}
p{
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}
.img{
   width: 150px;
   margin-left: 20px;
   display:inline-block; 
}
.img-div{
    float: left;
    margin-top: 20px;
    display:inline-block;
    margin: left 50px; 
    object-fit:contain;
}
h1{
    display: inline-block;
    color:#520103;
    margin-top:50px;
    Margin-left:5px;
    font-size:35px;
    font-family: 'Times New Roman', Times, serif;
   
}
h2{
    text-align: center;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; 
}
#home{
    text-align: center;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    height: 700px;
    display:block;
}


.topic{
    display:block;
    margin-top:0px;
    padding-top:0%;
    background-color: white;
    margin-bottom:0px;
}
.h{
    display:inline-block;
}


.descr{
    text-align: center;
    vertical-align:top;
}




#home,#about{
    text-align: center;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    height: 50px;
}

   

#students{
    color: rgb(0, 0, 0);
    display: inline-block;
    padding-left:50px;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    text-align: center;
    vertical-align:top;
    width: 350px;
    height: 400px;
    
}
#companies
{
    display: inline-block;
    vertical-align:top;
    text-align: center;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    width: 400px;
    height: 400px;
    padding-left:50px;
}
#admin{
    display: inline-block;
    text-align: center;
    padding-left:50px;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    width: 350px;
    height: 400px;
}
.contact{
    float:left;
    display: inline-block;
    margin-left:50px;

}
 .video-box {
            width: 100%;
            height: 600px;
            overflow: hidden;
            
        }

        video {
            width: 100%;
            height: 100%;
            object-fit: cover;
           
            }
           
</style>  



</head>
<body>
    <header >
       
        <!-- Navigation Bar -->
      <div class="img-div"> <img class="img" src="../IMS/assets/Logo-SUSL.png"></div>
     <div class="h"> <h1>Sabaragamuwa University of Sri Lanka<br>Internship Management System(IMS)</h1></div>
    
   
               <div class="list"><div class ="home"> <a href="#home">&#8962 Home</a></div>
                <!-- <div class="about"><a href="../IMS/templates/aboutus.php">About</a></div>
                <div class="contact"><a href="../IMS/templates/contactus.php">Contact</a></div> -->
                <div class="login"><a href="../IMS/templates/login.php">Login</a></div></div>
            
                
    </header>
    <main>
    <div class="video-box">
            <!-- Provide the correct path to your video file -->
            <video autoplay muted loop>
                <source src="../IMS/assets/header.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>

        <h2>Welcome to the Sabaragamuwa University Internship Management System</h2>
        <div class="descr"><p>Connecting students with opportunities</p></div>
        <section id="home">
        
       
        </section>

        <section id="about">
        <!-- Detailed Information about the System -->
        <h2>About the System</h2>
        
    </section>

    <!-- Separate Sections for Students, Companies, and Admin -->
   <div class="descr"> <section id="students">
        <h3>For Students</h3>
        <p style="text-align:justify;">The Web-Based Internship Management System (IMS) provides several benefits to students. Firstly, it allows students to create profiles, update resumes, and browse internship opportunities. This makes it easier for them to find relevant internships and apply for them. Additionally, the system enables students to track the status of their applications and manage their internship-related documents, evaluations, and feedback through a user-friendly dashboard. Overall, the system streamlines the internship process for students, making it more efficient and convenient.</p>
    </section>

     <section id="admin">
        <h3>For University Administration</h3>
        <p style="text-align:justify;">The Web-Based Internship Management System benefits the university administrators as well. It enables them to manage and approve internship opportunities, ensuring that the internships offered align with the university's standards and requirements. The system also facilitates communication between students, employers, and university coordinators, making it easier to coordinate and oversee the internship process. Additionally, the system provides reporting and analytics features that allow university administrators to assess the impact of the internship program and make data-driven decisions for improvement.</p>
    </section>

    <section id="companies">
        <h3>For Companies</h3>
        <p style="text-align:justify;">The IMS also offers various advantages to companies. Employers can post detailed descriptions of internship opportunities, review student applications, schedule interviews, and provide feedback through the system. This simplifies the hiring process for companies and allows them to efficiently manage and evaluate potential interns. Furthermore, the system provides a portal for employers to evaluate intern performance and submit internship completion reports. This helps companies assess the effectiveness of their internship programs and make informed decisions regarding future hiring.</p>
    </section>

   </div>
   
<!--
    <section id="contact">
        Contact Form or Information -->
        <!-- <h2>Contact Us</h2> -->
        <!-- <p>Get in touch with us for more information.</p> -->
    <!-- </section>--> 
    </main>
    <footer>
      <div class="contact">Contact US<br>ims19ges@gmail.com<br>+94123456789</div>
      <div style="display:inline-block; margin-right:100px;" > &copy; 2024 University Internship Management System SUSL. All rights reserved.</div>
    </footer>

    <!-- JavaScript files linked here -->
    <!-- <script src="scripts/menu.js"></script>
<script src="scripts/formHandler.js"></script>
<script src="scripts/profileLoader.js"></script> -->

</body>
</html>


