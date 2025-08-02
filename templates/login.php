<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Interface</title>
    <link rel="stylesheet" type="text/css" href="../styles/login.css">
</head>
<body>
<header>
    <!-- Navigation Bar -->
    <div class="img-div"> <img class="img" src="../assets/Logo-SUSL.png"></div>
    <div class="h"> <h1>Sabaragamuwa University of Sri Lanka<br>Internship Management System(IMS)</h1></div>

    <div class="list"><div class="home"> <a href="../index.php">&#8962 Home</a></div></div>
</header>

<main>
    <section id="content">
        <div class="login-box">
            <form action="login.php" method="post" autocomplete="off">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Login</button>
            </form>

            <a href="../templates/reg_option.php" class="create-account-link">Create Account</a>
            <a href="#" class="forgot-password-link">Forgot Password?</a>
        </div>
    </section>
</main>
<footer>
    <p>&copy; 2024 University Internship Management System SUSL. All rights reserved.</p>
</footer>

<script>
    window.onload = function() {
        document.getElementById('email').value = '';
        document.getElementById('password').value = '';
    };
</script>
</body>
</html>

<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

session_start();

require_once 'dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = 'SELECT UserID, Password, RoleID, ApproveID FROM User WHERE Email = ?';

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param('s', $_POST['email']);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $hashedPassword, $roleID, $approveID);
            $stmt->fetch();

            if ($roleID == 30) {
                if (password_verify($_POST['password'], $hashedPassword) && $_POST['email'] == $_POST['email']) {
                    session_regenerate_id();
                    $_SESSION['loggedin'] = TRUE;
                    $_SESSION['email'] = $_POST['email'];
                    $_SESSION['id'] = $id;
                    $_SESSION['role_id'] = $roleID;

                    $_SESSION['user_id'] = $id;

                    header('Location: admin_dashboard.php');
                    exit();
                } else {
                    echo 'Incorrect email or password.';
                    exit();
                }
            } else {
                if ($approveID == 2) {
                    if (password_verify($_POST['password'], $hashedPassword)) {
                        session_regenerate_id();
                        $_SESSION['loggedin'] = TRUE;
                        $_SESSION['email'] = $_POST['email'];
                        $_SESSION['id'] = $id;
                        $_SESSION['role_id'] = $roleID;

                        $_SESSION['user_id'] = $id;

                        if ($roleID == 10) {
                            header('Location: student_dashboard.php?user_id=' . $id);
                        } elseif ($roleID == 20) {
                            header('Location: company_dashboard.php');
                        }
                        exit();
                    } else {
                        echo 'Incorrect email and/or password.';
                        exit();
                    }
                } else {
                    echo 'Your account is not yet approved.';
                    exit();
                }
            }
        } else {
            echo 'Incorrect email and/or password.';
        }

        $stmt->close();
    }

    $conn->close();
}
?>
