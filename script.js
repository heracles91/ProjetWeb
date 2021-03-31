
// script qui permet l'apparition d'un pop-up pour la liste des réservations

var btnPopup = document.getElementById('btnPopup');
var overlay = document.getElementById('overlay');
btnPopup.addEventListener('click',openMoadl);
function openMoadl() {
overlay.style.display='block';
}

var btnClose = document.getElementById('btnClose');
btnClose.addEventListener('click',closeModal);

function closeModal() {
    overlay.style.display='none';
    }