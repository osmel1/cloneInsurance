<?php
// Check if the form is submitted
session_start();
if (isset($_POST['submit'])) {
    // Retrieve form data
    $raisonSociale = $_POST['raisonSociale'];
    $marqueVehicule = $_POST['marqueVehicule'];
    $vehiculeAssure = $_POST['VEHICULEASSURE'];
    $assuranceRes = $_POST['assuranceRes'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $numTel = $_POST['numTel'];
    $email = $_POST['email'];
    $check = isset($_POST['check']) ? 1 : 0;

    // Create a database connection
    $host = 'localhost:3307'; // Change to your host
    $username = 'root'; // Change to your username
    $password = ''; // Change to your password
    $database = 'taxi'; // Change to your database name

    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the database
    $sql = "INSERT INTO formulaire (raisonSociale, marqueVehicule, VEHICULEASSURE, assuranceRes, nom, prenom, numTel, email, check_box)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssis", $raisonSociale, $marqueVehicule, $vehiculeAssure, $assuranceRes, $nom, $prenom, $numTel, $email, $check);

    if ($stmt->execute()) {
        $_SESSION['nom'] = $nom;
        $_SESSION["form_filled"] = true;
        header("Location: thank-you.php");

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
