<?php
session_start();


// Check if the session variable is not set (i.e., the form hasn't been filled)
if (!isset($_SESSION["form_filled"]) || $_SESSION["form_filled"] !== true) {
    // Redirect the user back to the form page
    header("Location: index.html");
    exit(); // Make sure to exit the script after redirection to avoid further execution
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link rel="stylesheet" href="../styles/style_thankyou.css">
</head>
<body>
    <div class="thankYouContainer">
        <div class="thankYouMessage">
          <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="#35A29F" class="bi bi-check-circle" viewBox="0 0 16 16">
                <path d="M14.354 3.354a.5.5 0 0 1 0 .708L7.707 11.5a.5.5 0 0 1-.708 0L3.646 8.854a.5.5 0 0 1 .708-.708l2.646 2.647 6.646-6.647a.5.5 0 0 1 .708 0zM8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zm0 14A6 6 0 1 1 8 2a6 6 0 0 1 0 12z"/>
            </svg>
            <h1>Merci a vous!</h1>
            <p>
            <?php   
            echo "Merci ".$_SESSION['nom'];
            ?>    
            Vos réponses ont été reçues avec succès.</p>
        </div>
    </div>
</body>
</html>
