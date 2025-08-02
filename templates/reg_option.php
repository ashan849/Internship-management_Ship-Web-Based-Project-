<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create Account</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            position: relative; 
        }
        /* header {
            background-color: #520103;
            color: #fff;
            padding: 10px;
            text-align: center;
            height: 50px;
            top: 0;
            
        } */
        #login-options {
            margin: 20px;
            text-align: center;
        }
        /* .login-button {
           
        } */
        /* footer {
            background-color:#520103;
            color: #fff;
            padding: 10px;
            text-align: center;
            bottom: 0;
            position: fixed;
            width: 100%;
            height: 60px;
        } */
        .parent-container {
            position: relative; 
        }
      
        .button-set {
            display: block;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            margin-top: 200px;
            
            
        }
        .login-button:hover{
            opacity: 0.8;
        }
        .login-button1,.login-button2,.login-button3{
            display: block;
            background-color:#520103;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            margin: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            width: 250px;
            transition: background-color 0.5s, color 0.5s;
            
            
        }
        .login-button1:hover,.login-button2:hover,.login-button3:hover{
            opacity: 0.8;
            background-color:white ;
					color:#520103;
                    border-color: #520103;
                    border-style: solid;
            
        }
        .login-button2{
            margin-top: 50px;
        }
        .login-button3{
            margin-top: 50px;
        }
        a{
            text-decoration: none;
        }
        .name{
            margin-top: 10px;
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
    
    
    .home{
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
    .home:hover{
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
       width: 100px;
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
        font-size:15px;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
       
       
       
    }
    h2{
        text-align: center;
        font-family: 'Times New Roman', Times, serif;
        margin-top: 30px;
        color: #520103;
        
       
    }
    #home{
        text-align: center;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        height: 700px;
        display:block;
    }
    
    
    
    .h{
        display:inline-block;
       
    }
    .img-box{
    background-image: url("../IMS/assets/header.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    width: auto;
    height: 600px;
    margin-top: 100px;
    }
    body {
    display: flex;
    flex-direction: column;
    min-height: 100vh; 
    margin: 0;
    padding: 0;
    background-color: #ecf0f1;
    }
    footer {
    margin-top: auto; 
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
   <h2>Create Account</h2>
    <main>
        <div class="parent-container">
 
            <div class="button-set">
                <!-- <a href="../intro-to-html/admin.html" target="_blank"> <button class="login-button1" onclick="loginAs('university-admin')">Login as University Admin</button></a> -->
                <a href="../templates/company_reg.php">
                    <button class="login-button2" onclick="loginAs('company')">Company</button>
                </a>
                <a href="../templates/student_reg.php">

                    <button class="login-button3" onclick="loginAs('student')">Student</button>
                </a>
            </div>
        </div>
    </main>
    <footer>
        
    <p>&copy; 2024 University Internship Management System SUSL. All rights reserved.</p>
    </footer>
</body>
</html>
