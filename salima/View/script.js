document.addEventListener('DOMContentLoaded', function() {
    var slimOverlay = document.querySelector('.slim');
    var modal = document.querySelector('.custom-modal');

    // Ajout
    var slim2Overlay = document.querySelector('.slim2');
    var modal2 = document.querySelector('.custom-modal2');
    
    // Suppression
    var salimOverlay = document.querySelector('.salim');
    var modal3 = document.querySelector('.custom-modal');

    // Ajouter
    var AjouterButtons = document.querySelectorAll('.btn-primary1');
    AjouterButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            slim2Overlay.style.display = 'flex';
            modal2.style.display = 'block';
            slim2Overlay.classList.add('blurred');
        });
    });

    // Modifier
    var modifierButtons = document.querySelectorAll('.btn-primary');
    modifierButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var userId = button.getAttribute('data-id');
            // Effectuer une requête GET vers le fichier PHP avec l'ID de l'utilisateur dans l'URL
            fetch('GETUSER.php?id=' + userId, {
                method: 'GET'
            }).then(function(response) {
                // Traitez la réponse ici si nécessaire
            }).catch(function(error) {
                console.error('Erreur lors de la requête fetch :', error);
            });
            slimOverlay.style.display = 'flex';
            modal.style.display = 'block';
            slimOverlay.classList.add('blurred');
        });
    });

    // Supprimer
    var supprimerButtons = document.querySelectorAll('.btn-supprimer');
    supprimerButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var userId = button.getAttribute('data-id');
            // Afficher une boîte de dialogue de confirmation
            var confirmation = prompt("Voulez-vous vraiment supprimer cet utilisateur ? Répondez par 'oui' ou 'non'.");
            if (confirmation !== null) {
                var confirmationLowerCase = confirmation.toLowerCase();
                if (confirmationLowerCase === "oui") {
                    fetch('../delete_user.php?id=' + userId, {
                        method: 'DELETE'
                    })
                    .then(function(response) {
                        location.reload(); // Recharger la page après suppression
                    })
                    .catch(function(error) {
                        console.error('Une erreur s\'est produite:', error);
                    });
                } else if (confirmationLowerCase === "non") {
                    console.log("Suppression annulée.");
                } else {
                    alert("Réponse invalide. Veuillez répondre par 'oui' ou 'non'.");
                }
            } else {
                console.log("Boîte de dialogue fermée.");
            }
        });
    });

    // Bloquer
    var BlockButtons = document.querySelectorAll('.btn-Mod');
    BlockButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var userId = button.getAttribute('data-id');
            console.log('WEYYY');
            fetch('BLOCK.php?id=' + userId, {
                method: 'POST'
            }).then(function(response) {
                if (response.ok) {
                    console.log('L\'utilisateur a été bloqué avec succès.');
                } else {
                    console.error('Erreur lors du blocage de l\'utilisateur.');
                }
            }).catch(function(error) {
                console.error('Erreur lors de la requête fetch :', error);
            });
        });
    });

    // Fonction pour activer les champs
    function activerChamps() {
        var inputs = document.querySelectorAll('input');
        var selects = document.querySelectorAll('select');
        
        inputs.forEach(function(input) {
            input.removeAttribute('disabled');
        });

        selects.forEach(function(select) {
            select.removeAttribute('disabled');
        });
    }
});
