<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Partenaire</title>
    <link rel="stylesheet" href="../css/dashbordPartenaire.css">
</head>
<body>
    <div class="dashboard-container">
        <nav class="sidebar">
            <h2>Partenaire Dashboard</h2>
            <ul>
                <li><a href="#home">Accueil</a></li>
                <li><a href="#ajout-produit">Ajouter un produit</a></li>
                <li><a href="#gerer-commandes">Gérer les commandes</a></li>
            </ul>
        </nav>

        <main class="main-content">
            <section id="home" class="section">
                <h1>Bienvenue, Partenaire</h1>
                <div class="dashboard-cards">
                    <div class="card">
                        <h2>Total des Produits</h2>
                        <p id="total-produits">10</p>
                    </div>
                    <div class="card">
                        <h2>Commandes en cours</h2>
                        <p id="commandes-en-cours">5</p>
                    </div>
                </div>
            </section>

            <section id="ajout-produit" class="section">
                <h2>Ajouter un produit</h2>
                <form class="product-form">
                    <label for="product-name">Nom du produit</label>
                    <input type="text" id="product-name" name="product-name" required>

                    <label for="product-description">Description</label>
                    <textarea id="product-description" name="product-description" required></textarea>

                    <label for="product-price">Prix</label>
                    <input type="number" id="product-price" name="product-price" required>

                    <label for="product-image">Image du produit</label>
                    <input type="file" id="product-image" name="product-image" accept="image/*" required>

                    <button type="submit" class="btn-primary">Ajouter le produit</button>
                </form>
            </section>

            <!-- Section pour gérer les commandes -->
            <section id="gerer-commandes" class="section">
                <h2>Gérer les Commandes</h2>
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>ID Commande</th>
                            <th>Produit</th>
                            <th>Quantité</th>
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="commande-list">
                        <!-- Commandes ajoutées dynamiquement ici -->
                    </tbody>
                </table>
            </section>
        </main>
    </div>

    <script>
        // Pour afficher les commandes existantes (en simulant des données)
        function loadCommandes() {
            const commandes = [
                {id: 1, produit: 'Produit A', quantite: 2, statut: 'En attente'},
                {id: 2, produit: 'Produit B', quantite: 1, statut: 'Validé'},
                {id: 3, produit: 'Produit C', quantite: 3, statut: 'En livraison'}
            ];

            let commandeList = document.getElementById('commande-list');
            commandeList.innerHTML = '';

            commandes.forEach(commande => {
                let actionButtons = '';

                if (commande.statut === 'En attente') {
                    actionButtons = `
                        <button class="btn-primary" onclick="validerCommande(${commande.id})">Valider</button>
                        <button class="btn-danger" onclick="rejeterCommande(${commande.id})">Rejeter</button>
                    `;
                } else if (commande.statut === 'En livraison') {
                    actionButtons = `
                        <button class="btn-primary" onclick="livrerCommande(${commande.id})">Marquer comme livré</button>
                    `;
                } else {
                    actionButtons = `Aucune action disponible`;
                }

                let row = `
                    <tr>
                        <td>${commande.id}</td>
                        <td>${commande.produit}</td>
                        <td>${commande.quantite}</td>
                        <td>${commande.statut}</td>
                        <td>${actionButtons}</td>
                    </tr>
                `;
                commandeList.innerHTML += row;
            });
        }

        function validerCommande(id) {
            alert('Commande validée avec ID ' + id);
            // Mettre à jour le statut dans la base de données
        }

        function rejeterCommande(id) {
            alert('Commande rejetée avec ID ' + id);
            // Mettre à jour le statut dans la base de données
        }

        function livrerCommande(id) {
            alert('Commande marquée comme livrée avec ID ' + id);
            // Mettre à jour le statut dans la base de données
        }

        document.addEventListener('DOMContentLoaded', loadCommandes);
    </script>
</body>
</html>
