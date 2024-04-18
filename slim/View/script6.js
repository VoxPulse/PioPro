document.addEventListener('DOMContentLoaded', function() {
    // Sélection des éléments du formulaire
    var nomInput = document.getElementById('NN');

    // Sélection des éléments d'erreur
    var nomError = document.getElementById('NE');
    
    // Événement pour le champ Nom
    nomInput.addEventListener('input', function() {
        if (!validateNom(nomInput.value)) {
            nomError.style.display = 'block';
        } else {
            nomError.style.display = 'none';
        }
    });
    // Validation du nom
    function validateNom(nom) {
        var nomRegex = /^[a-zA-Z\s]+$/;
        return nom.length > 3 && nomRegex.test(nom);
    }
});
