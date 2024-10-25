<?php
// Inclure le fichier de connexion à la base de données
require 'C:/xampp/htdocs/markgros/bd/connexionDB.php';

// Démarrer la session
session_start();

// Vérifier si l'admin est connecté
if (!isset($_SESSION['admin_id'])) {
    // Rediriger vers la page de connexion si non connecté
    header("Location: admin.php");
    exit();
}

// Gestion de la déconnexion
if (isset($_POST['logout'])) {
    session_destroy(); // Détruire la session
    header("Location: admin.php"); // Rediriger vers la page de connexion
    exit();
}

// Requête pour récupérer les utilisateurs dans la base de données
$sql = "SELECT idUtilisateur, nomUtilisateur, prenomUtilisateur, emailUtilisateur, telUtilisateur FROM utilisateur";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
    <link rel="stylesheet" href="../css/dashboard-admin.css">
    <script src="https://cdn.jsdelivr.net/npm/lucide@latest/dist/umd/lucide.min.js"></script>
    <style>
        /* Styles pour les modales */
        .modal {
            display: none; /* Masquer les modales par défaut */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }


        .modal {
    display: none; /* Masquer les modales par défaut */
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5); /* Fond semi-transparent */
}

.modal-content {
    background-color: #fefefe; /* Couleur de fond de la modale */
    margin: 15% auto; /* Espacement de la modale */
    padding: 20px; /* Espacement interne */
    border: 1px solid #888; /* Bordure de la modale */
    width: 80%; /* Largeur de la modale */
    max-width: 500px; /* Largeur maximale */
}

.close {
    color: #aaa; /* Couleur de la croix de fermeture */
    float: right; /* Positionnement à droite */
    font-size: 28px; /* Taille de la croix */
    font-weight: bold; /* Poids de la croix */
}

.close:hover,
.close:focus {
    color: black; /* Couleur au survol ou au focus */
    text-decoration: none; /* Aucune décoration */
    cursor: pointer; /* Curseur pointer */
}

    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">
            <img src="../img/logoMarkgros.png" alt="logo">
        </div>
        <form method="post" class="logout-form">
            <button type="submit" name="logout" class="btn-logout">Se déconnecter</button>
        </form>
    </nav>

    <!-- Main content -->
    <main>
        <!-- Section 1 : Boutons création -->
        <section class="create-section">
            <button class="btn-action" id="openPartnerModal">Créer un partenaire</button>
            <button class="btn-action" id="openCreditModal">Créer un gestionnaire de crédit</button>
        </section>

        <!-- Section 2 : Liste des utilisateurs -->
        <section class="list-section">
            <h2>Liste des utilisateurs</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Boucle pour afficher les utilisateurs
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['nomUtilisateur'] . "</td>";
                            echo "<td>" . $row['prenomUtilisateur'] . "</td>";
                            echo "<td>" . $row['emailUtilisateur'] . "</td>";
                            echo "<td>" . $row['telUtilisateur'] . "</td>";
                            echo "<td>
                                    <form method='post' action='supprimer-utilisateur.php' style='display:inline;'>
                                        <input type='hidden' name='idUtilisateur' value='" . $row['idUtilisateur'] . "'>
                                        <button type='submit' class='btn-delete'>
                                            <i data-lucide='trash-2'></i>
                                        </button>
                                    </form>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Aucun utilisateur trouvé</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>

    <!-- Modal pour créer un partenaire -->
    <div id="partnerModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('partnerModal')">&times;</span>
            <h2>Créer un partenaire</h2>
            <form action="creer-partenaire.php" method="POST">
                <div class="form-group">
                    <label for="nomPartenaire">Nom :</label>
                    <input type="text" id="nomPartenaire" name="nomPartenaire" required>
                </div>
                <div class="form-group">
                    <label for="prenomPartenaire">Prénom :</label>
                    <input type="text" id="prenomPartenaire" name="prenomPartenaire" required>
                </div>
                <div class="form-group">
                    <label for="emailPartenaire">Email :</label>
                    <input type="email" id="emailPartenaire" name="emailPartenaire" required>
                </div>
                <div class="form-group">
                    <label for="passwordPartenaire">Mot de passe :</label>
                    <input type="password" id="passwordPartenaire" name="passwordPartenaire" required>
                </div>
                <button type="submit" class="btn-submit">Créer</button>
            </form>
        </div>
    </div>

<!-- Modal pour créer un gestionnaire de crédit -->
    <!-- Modal pour créer un gestionnaire de crédit -->
    <div id="modal-gestionnaire" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modal-gestionnaire')">&times;</span>
            <h2>Créer un Gestionnaire de Crédit</h2>
            <form action="creer-gestionnaire.php" method="POST">
                <div class="form-group">
                    <label for="nomGestCredit">Nom :</label>
                    <input type="text" id="nomGestCredit" name="nomGestCredit" required>
                </div>
                
                <div class="form-group">
                    <label for="prenomGestCredit">Prénom :</label>
                    <input type="text" id="prenomGestCredit" name="prenomGestCredit" required>
                </div>
                
                <div class="form-group">
                    <label for="emailGestCredit">Email :</label>
                    <input type="email" id="emailGestCredit" name="emailGestCredit" required>
                </div>
                
                <div class="form-group">
                    <label for="passwordGestCredit">Mot de passe :</label>
                    <input type="password" id="passwordGestCredit" name="passwordGestCredit" required>
                </div>
                
                <div class="form-group">
                    <label for="telGestCredit">Téléphone :</label>
                    <input type="text" id="telGestCredit" name="telGestCredit" required>
                </div>
                
                <button type="submit" class="btn-submit">Créer</button>
            </form>
        </div>
    </div>                

    <script>
        // Fonction pour ouvrir une modal
        function openModal(modalId) {
            var modal = document.getElementById(modalId);
            modal.style.display = "block";
        }

        // Fonction pour fermer une modal
        function closeModal(modalId) {
            var modal = document.getElementById(modalId);
            modal.style.display = "none";
        }

        // Gestion des événements de clic pour ouvrir les modales
        document.getElementById("openPartnerModal").onclick = function() {
            openModal('partnerModal');
        }

        document.getElementById("openCreditModal").onclick = function() {
            openModal('modal-gestionnaire');
        }

        // Fermer les modales en cliquant sur (x) ou à l'extérieur
        var closeButtons = document.getElementsByClassName("close");
        for (let i = 0; i < closeButtons.length; i++) {
            closeButtons[i].onclick = function() {
                this.parentElement.parentElement.style.display = "none";
            }
        }

        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = "none";
            }
        }
    </script>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
