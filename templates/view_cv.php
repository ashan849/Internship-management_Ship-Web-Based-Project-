<?php

require_once 'dbconnect.php';


if (isset($_GET['cv'])) {
    
    $cvPath = $_GET['cv'];

    appropriate content type for the CV (e.g., PDF)
    header('Content-Type: application/pdf');

    // Output the CV file
    readfile($cvPath);
} else {
    echo 'CV file path not provided in the URL';
}


$conn->close();
?>
