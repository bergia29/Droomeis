document.addEventListener("DOMContentLoaded", () => {
    const openPopupButton = document.getElementById("openPopup");

    openPopupButton.addEventListener("click", () => {
        // Ouvre la page `popup/popup.html` dans une fenêtre popup
        const popupWidth = 400; // Largeur du popup
        const popupHeight = 600; // Hauteur du popup

        const left = (window.innerWidth - popupWidth) / 2; // Centrer horizontalement
        const top = (window.innerHeight - popupHeight) / 2; // Centrer verticalement

        window.open(
            "popup/popup.html", // Lien vers la page du popup
            "PopupConnexion", // Nom de la fenêtre
            `width=${popupWidth},height=${popupHeight},top=${top},left=${left},resizable=no,scrollbars=yes`
        );
    });
});

// Récupérer l'élément modal et les boutons
var modal = document.getElementById("myModal");
var openModalBtn = document.getElementById("openModalBtn");
var closeModalBtn = document.getElementById("closeModalBtn");

// Lorsque l'utilisateur clique sur le bouton, ouvrir le modal
openModalBtn.onclick = function() {
    modal.style.display = "block";
}

// Lorsque l'utilisateur clique sur le bouton de fermeture, fermer le modal
closeModalBtn.onclick = function() {
    modal.style.display = "none";
}

// Lorsque l'utilisateur clique en dehors du modal, le fermer
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
