<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>/* footer-styles.css */
/* Reset pour garantir une base cohérente */
/* * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
} */

/* Styles pour garantir que le footer reste en bas */
html {
    height: 100%;
}

body {
    min-height: 100%;
    display: flex;
    flex-direction: column;
}

main {
    flex: 1 0 auto;
}

/* Styles du footer */
.footer {
    flex-shrink: 0;
    background-color: #494177;
    color: white;
    padding: 2rem 1rem;
    font-family: Arial, sans-serif;
    margin-top: 150px; /* Pousse le footer vers le bas */
    width: 100%;
}

.footer-content {
    max-width: 1200px;
    margin: 0 auto;
}

/* Section contact */
.contact-section {
    margin-bottom: 2rem;
}

.contact-section h2 {
    font-size: 1.2rem;
    margin-bottom: 1rem;
}

.contact-info {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.contact-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

/* Section newsletter */
.newsletter-section {
    margin-bottom: 2rem;
}

.newsletter-section h2 {
    font-size: 1.2rem;
    margin-bottom: 1rem;
}

.newsletter-form {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.newsletter-form input {
    padding: 0.8rem;
    border: none;
    border-radius: 4px;
}

.newsletter-form button {
    padding: 0.8rem;
    background-color: #00c853;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.newsletter-form button:hover {
    background-color: #009624;
}

/* Section réseaux sociaux */
.social-section {
    text-align: center;
    margin-bottom: 2rem;
}

.social-section h2 {
    font-size: 1.2rem;
    margin-bottom: 1rem;
}

.social-links {
    display: flex;
    justify-content: center;
    gap: 1.5rem;
}

.social-icon {
    width: 2rem;
    height: 2rem;
    background-color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: transform 0.3s ease;
}

.social-icon:hover {
    transform: scale(1.1);
}

/* Copyright */
.copyright {
    text-align: center;
    font-size: 0.9rem;
}

/* Media queries */
@media (min-width: 768px) {
    .footer-content {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 2rem;
    }

    .social-section {
        grid-column: 1 / -1;
    }

    .copyright {
        grid-column: 1 / -1;
    }
}

@media (min-width: 1024px) {
    .newsletter-form {
        flex-direction: row;
    }

    .newsletter-form input {
        flex: 1;
    }
}</style>
</head>
<body>
<!-- footer.php -->
<?php
// Vérifier si la constante est définie pour éviter l'accès direct au fichier
// defined('ALLOW_ACCESS') or die('Accès direct au fichier non autorisé');
?>

<footer class="footer">
    <div class="footer-content">
        <section class="contact-section">
            <h2>Contactez-nous !</h2>
            <div class="contact-info">
                <div class="contact-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" viewBox="0 0 24 24">
                        <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                    </svg>
                    <span>MarkGros@gmail.com</span>
                </div>
                <div class="contact-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" viewBox="0 0 24 24">
                        <path d="M6.62 10.79c1.44 2.83 3.76 5.15 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                    </svg>
                    <div>
                        <div>27 234 455 45</div>
                        <div>05 6575 8723</div>
                    </div>
                </div>
            </div>
        </section>

        <section class="newsletter-section">
            <h2>Restez informer des actualités</h2>
            <form class="newsletter-form">
                <input type="email" placeholder="Votre email" required>
                <button type="submit">S'abonner à la newsletter</button>
            </form>
        </section>

        <section class="social-section">
            <h2>Suivez-nous</h2>
            <div class="social-links">
                <a href="#" class="social-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#494177" viewBox="0 0 24 24">
                        <path d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z"/>
                    </svg>
                </a>
                <a href="#" class="social-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#494177" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                </a>
                <a href="#" class="social-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#494177" viewBox="0 0 24 24">
                        <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/>
                    </svg>
                </a>
            </div>
        </section>

        <div class="copyright">
            @Copyright 2024 Tout droits réservés
        </div>
    </div>
</footer>
</body>
</html>