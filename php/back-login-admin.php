<?php
// Inclure le fichier de configuration pour la connexion à la base de données
require 'C:/xampp/htdocs/markgros/bd/connexionDB.php';

// Démarrer la session
session_start();

// Vérifier si la requête est une méthode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    
    // Vérifier si les champs ne sont pas vides
    if (!empty($email) && !empty($password)) {
        // Préparer la requête SQL pour vérifier si l'admin existe dans la base de données
        $sql = "SELECT idAdmin, emailAdmin, passwordAdmin FROM admin WHERE emailAdmin = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email); // Lier l'email comme paramètre
        $stmt->execute();
        $stmt->store_result();

        // Vérifier si un admin avec cet email existe
        if ($stmt->num_rows > 0) {
            // L'email existe, on récupère les informations
            $stmt->bind_result($idAdmin, $emailAdmin, $passwordAdmin);
            $stmt->fetch();

            // Comparer le mot de passe sans hash
            if ($password === $passwordAdmin) {
                // Connexion réussie, enregistrer les informations dans la session
                $_SESSION['admin_id'] = $idAdmin;
                $_SESSION['admin_email'] = $emailAdmin;

                // Rediriger vers le tableau de bord de l'admin
                header("Location: dashboard-admin.php");
                exit();
            } else {
                // Mot de passe incorrect
                $error = "Mot de passe incorrect.";
            }
        } else {
            // Aucun admin trouvé avec cet email
            $error = "Aucun compte administrateur trouvé avec cet email.";
        }

        // Fermer la requête préparée
        $stmt->close();
    } else {
        $error = "Veuillez remplir tous les champs.";
    }
}

// En cas d'erreur, rediriger vers la page de connexion avec un message d'erreur
if (isset($error)) {
    header("Location: admin-login.php?error=" . urlencode($error));
    exit();
}
?>
