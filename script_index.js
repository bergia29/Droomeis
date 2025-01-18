document.getElementById('toggle-btn').addEventListener('click', function() {
    const sidebar = document.getElementById('sidebar');
    const dashboard = document.querySelector('.dashboard-container');
    
    sidebar.classList.toggle('collapsed');
    dashboard.classList.toggle('collapsed');
});

// Fonction pour basculer l'affichage des sous-menus
function toggleSubMenu(submenuId) {
    const submenu = document.getElementById(submenuId);
    
    // Si le sous-menu est déjà affiché, on le cache
    if (submenu.style.display === "block") {
        submenu.style.display = "none";
    } else {
        // Sinon, on l'affiche
        submenu.style.display = "block";
    }
}

// Gestion de l'ouverture et fermeture du menu (sidebar) pour les petits écrans
document.getElementById('toggle-btn').addEventListener('click', function() {
    document.getElementById('sidebar').classList.toggle('open');
});

function loadContent(url) {
    const dynamicContent = document.getElementById('dynamic-content');
    dynamicContent.innerHTML = '<p>Chargement en cours...</p>'; // Message temporaire

    fetch(url) // Charge le contenu de l'URL
        .then(response => response.text()) // Lit le contenu comme du texte
        .then(html => {
            dynamicContent.innerHTML = html; // Insère le contenu dans la zone dynamique
        })
        .catch(error => {
            dynamicContent.innerHTML = '<p>Erreur lors du chargement.</p>';
        });
}

