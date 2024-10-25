<?php
// Inclure le fichier de connexion à la base de données
require 'C:/xampp/htdocs/markgros/bd/connexionDB.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Récupérer les données du formulaire
    $nomPartenaire = trim($_POST['nomPartenaire']);
    $prenomPartenaire = trim($_POST['prenomPartenaire']);
    $emailPartenaire = trim($_POST['emailPartenaire']);
    $passwordPartenaire = trim($_POST['passwordPartenaire']);

    // Validation des champs
    if (empty($nomPartenaire) || empty($prenomPartenaire) || empty($emailPartenaire) || empty($passwordPartenaire)) {
        // Si l'un des champs est vide, rediriger avec un message d'erreur
        header("Location: dashboard-admin.php?error=empty_fields");
        exit();
    }

    // Vérifier si l'email est valide
    if (!filter_var($emailPartenaire, FILTER_VALIDATE_EMAIL)) {
        header("Location: dashboard-admin.php?error=invalid_email");
        exit();
    }

    // Vérifier si l'email du partenaire existe déjà
    $checkEmail = $conn->prepare("SELECT idPartenaire FROM partenaire WHERE emailPartenaire = ?");
    $checkEmail->bind_param("s", $emailPartenaire);
    $checkEmail->execute();
    $checkEmail->store_result();

    if ($checkEmail->num_rows > 0) {
        // Si l'email existe déjà, rediriger avec un message d'erreur
        header("Location: dashboard-admin.php?error=email_exists");
        exit();
    }

    // Hasher le mot de passe avant de l'insérer
    $hashedPassword = password_hash($passwordPartenaire, PASSWORD_DEFAULT);

    // Insérer le partenaire dans la base de données
    $stmt = $conn->prepare("INSERT INTO partenaire (nomPartenaire, prenomPartenaire, emailPartenaire, passwordPartenaire) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nomPartenaire, $prenomPartenaire, $emailPartenaire, $hashedPassword);

    if ($stmt->execute()) {
        // Si l'insertion réussit, rediriger avec un message de succès
        header("Location: dashboard-admin.php?success=partenaire_created");
    } else {
        // Sinon, rediriger avec un message d'erreur
        header("Location: dashboard-admin.php?error=failed_to_create");
    }

    // Fermer la déclaration et la connexion
    $stmt->close();
    $conn->close();
} else {
    // Si l'accès à cette page n'est pas via POST, rediriger vers le dashboard
    header("Location: dashboard-admin.php");
    exit();
}
?>
