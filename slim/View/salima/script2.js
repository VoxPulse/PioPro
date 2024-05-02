
document.addEventListener('DOMContentLoaded', function() {
    // Sélection des éléments du formulaire
    var titreInput = document.getElementById('tit');
    var descriptionInput = document.getElementById('desc');
    var dateInput = document.getElementById('date');
    var lieuInput = document.getElementById('lieu');
    var lieuInput = document.getElementById('lieu');
    var coutInput = document.getElementById('cout');
    var nbPlacesInput = document.getElementById('nbp');

    // Sélection des éléments d'erreur
    var titreError = document.getElementById('titreError');
    var descriptionError = document.getElementById('descriptionError');
    var coutError = document.getElementById('coutError');
    var dateError = document.getElementById('dateError');
    var lieuError = document.getElementById('lieuError');
    var statutError = document.getElementById('statutError');
    var nbPlacesError = document.getElementById('nb_placesError');

    // Événement pour le champ Titre
    titreInput.addEventListener('input', function() {
        if (!validateTitre(titreInput.value)) {
            titreError.style.display = 'block';
        } else {
            titreError.style.display = 'none';
        }
    });

    // Événement pour le champ Description
    descriptionInput.addEventListener('input', function() {
        if (!validateDescription(descriptionInput.value)) {
            descriptionError.style.display = 'block';
        } else {
            descriptionError.style.display = 'none';
        }
    });

    // Événement pour le champ Coût
coutInput.addEventListener('input', function() {
    if (!validateCout(coutInput.value)) {
        coutError.style.display = 'block';
    } else {
        coutError.style.display = 'none';
    }
});


    // Événement pour le champ Date
    dateInput.addEventListener('input', function() {
        if (!validateDate(dateInput.value)) {
            dateError.style.display = 'block';
        } else {
            dateError.style.display = 'none';
        }
    });

    // Événement pour le champ Lieu
    lieuInput.addEventListener('input', function() {
        if (!validateLieu(lieuInput.value)) {
            lieuError.style.display = 'block';
        } else {
            lieuError.style.display = 'none';
        }
    });

    // Événement pour le champ Statut
    statutInput.addEventListener('input', function() {
        if (!validateStatut(statutInput.value)) {
            statutError.style.display = 'block';
        } else {
            statutError.style.display = 'none';
        }
    });

    // Événement pour le champ Nombre de places
    nbPlacesInput.addEventListener('input', function() {
        if (!validateNbPlaces(nbPlacesInput.value)) {
            nbPlacesError.style.display = 'block';
        } else {
            nbPlacesError.style.display = 'none';
        }
    });

    // Validation du Titre
    function validateTitre(titre) {
        // Expression régulière pour valider le titre (que des lettres)
        var titreRegex = /^[a-zA-Z\s]+$/;
        return titreRegex.test(titre);
    }

    // Validation de la Description
    function validateDescription(description) {
        // Expression régulière pour valider la description (que des lettres)
        var descriptionRegex = /^[a-zA-Z\s]+$/;
        return descriptionRegex.test(description);
    }

    // Validation de la Date
    function validateDate(date) {
        // Expression régulière pour valider la date (format YYYY-MM-DD)
        var dateRegex = /^\d{4}-\d{2}-\d{2}$/;
        return dateRegex.test(date);
    }

   // Validation du Lieu
function validateLieu(lieu) {
    // Expression régulière pour valider le lieu (lettres uniquement)
    var lieuRegex = /^[a-zA-Z]+$/;
    
    // Vérification de la chaîne vide et des lettres uniquement
    return lieu.trim() !== '' && lieuRegex.test(lieu);
}


    // Validation du Statut
    function validateStatut(statut) {
        // Expression régulière pour valider le statut (que des lettres)
        var statutRegex = /^[a-zA-Z\s]+$/;
        return statutRegex.test(statut);
    }


  // Validation du Coût
  function validateCout(cout) {
    // Expression régulière pour valider uniquement des chiffres
    var coutRegex = /^[0-9]+$/;
    return coutRegex.test(cout);
}

   // Validation du Nombre de places
   function validateNbPlaces(nbPlaces) {
    // Vérifier si le nombre de places est un nombre entier et inférieur ou égal à 400
    var nbPlacesInt = parseInt(nbPlaces);
    return !isNaN(nbPlacesInt) && /^[0-9]+$/.test(nbPlaces);
}
});
