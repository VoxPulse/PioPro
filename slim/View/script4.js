document.addEventListener('DOMContentLoaded', function() {
    // Sélection des éléments du formulaire
    var myForm = document.getElementById('myForm');
    
    var nomInput = document.getElementById('nom');
    var prenomInput = document.getElementById('prenom');
    // Sélection des éléments d'erreur
    var nomError = document.getElementById('nomError');
    var prenomError = document.getElementById('prenomError');

    // Événement pour la soumission du formulaire
    myForm.addEventListener('submit', function(event) {
        // Initialisation du compteur d'erreurs
        var errorCount = 0;

        // Validation du champ Nom
        if (!validateNom(nomInput.value)) {
            nomError.style.display = 'block';
            errorCount++;
        } else {
            nomError.style.display = 'none';
        }

        // Validation du champ Prénom
        if (!validatePrenom(prenomInput.value)) {
            prenomError.style.display = 'block';
            errorCount++;
        } else {
            prenomError.style.display = 'none';
        }

        // Si le compteur d'erreurs est supérieur à 0, empêcher l'envoi du formulaire
        if (errorCount > 0) {
            event.preventDefault();
            alert('Le formulaire contient des erreurs, veuillez les corriger.');
        }
    });

    // Validation du nom
    function validateNom(nom) {
        var nomRegex = /^[a-zA-Z\s]+$/;
        return nom.length > 3 && nomRegex.test(nom);
    }

    // Validation du prénom
    function validatePrenom(prenom) {
        var prenomRegex = /^[a-zA-Z\s]+$/;
        return prenom.length > 0 && prenomRegex.test(prenom);
    }
});
