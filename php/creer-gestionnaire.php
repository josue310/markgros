<?php
// Inclure le fichier de connexion à la base de données
require 'C:/xampp/htdocs/markgros/bd/connexionDB.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nomGestCredit = trim($_POST['nomGestCredit']);
    $prenomGestCredit = trim($_POST['prenomGestCredit']);
    $emailGestCredit = trim($_POST['emailGestCredit']);
    $passwordGestCredit = trim($_POST['passwordGestCredit']);
    $telGestCredit = trim($_POST['telGestCredit']);

    // Validation des champs
    if (empty($nomGestCredit) || empty($prenomGestCredit) || 
        empty($emailGestCredit) || empty($passwordGestCredit) ||
        empty($telGestCredit)) {
        header("Location: dashboard-admin.php?error=empty_fields");
        exit();
    }

    // Vérifier si l'email est valide
    if (!filter_var($emailGestCredit, FILTER_VALIDATE_EMAIL)) {
        header("Location: dashboard-admin.php?error=invalid_email");
        exit();
    }

    // Vérifier si le numéro de téléphone est valide (format français)
    if (!preg_match("/^[0-9]{10}$/", $telGestCredit)) {
        header("Location: dashboard-admin.php?error=invalid_phone");
        exit();
    }

    // Vérifier si l'email existe déjà
    $checkEmail = $conn->prepare("SELECT idGestCredit FROM gestcredit WHERE emailGestCredit = ?");
    $checkEmail->bind_param("s", $emailGestCredit);
    $checkEmail->execute();
    $checkEmail->store_result();
    
    if ($checkEmail->num_rows > 0) {
        header("Location: dashboard-admin.php?error=email_exists");
        exit();
    }
    $checkEmail->close();

    // Hasher le mot de passe
    $hashedPassword = password_hash($passwordGestCredit, PASSWORD_DEFAULT);

    // Insérer le gestionnaire de crédit dans la base de données
    $stmt = $conn->prepare("INSERT INTO gestcredit (
        nomGestCredit, 
        prenomGestCredit, 
        emailGestCredit, 
        passwordGestCredit,
        telGestCredit
    ) VALUES (?, ?, ?, ?, ?)");

    $stmt->bind_param("sssss", 
        $nomGestCredit, 
        $prenomGestCredit, 
        $emailGestCredit, 
        $hashedPassword,
        $telGestCredit
    );

    if ($stmt->execute()) {
        header("Location: dashboard-admin.php?success=gestcredit_created");
    } else {
        header("Location: dashboard-admin.php?error=failed_to_create");
    }

    // Fermer la déclaration et la connexion
    $stmt->close();
    $conn->close();
} else {
    // Si l'accès n'est pas via POST, rediriger vers le dashboard
    header("Location: dashboard-admin.php");
    exit();
}
?>