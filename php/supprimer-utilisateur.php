<?php
require 'C:/xampp/htdocs/markgros/bd/connexionDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idUtilisateur = $_POST['idUtilisateur'];

    // Requête pour supprimer l'utilisateur
    $sql = "DELETE FROM utilisateur WHERE idUtilisateur = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idUtilisateur);

    if ($stmt->execute()) {
        header("Location: dashboard-admin.php?message=Utilisateur supprimé avec succès");
        exit();
    } else {
        echo "Erreur lors de la suppression.";
    }

    $stmt->close();
}
?>
