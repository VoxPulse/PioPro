document.addEventListener('DOMContentLoaded', function() {
    // Sélection des éléments du formulaire
    var nomInput = document.getElementById('nom');
    var prenomInput = document.getElementById('prenom');
    var cinInput = document.getElementById('cin');
    var telInput = document.getElementById('telephone');
    var mailInput = document.getElementById('email');
    var roleInput = document.getElementById('role');
    var MDPInput = document.getElementById('motdepasse');
    var CMDPInput = document.getElementById('confirmationmdp');
    var DDNPInput = document.getElementById('ddn');
    var etablissementInput = document.getElementById('etablissement');
    // Sélection des éléments d'erreur
    var nomError = document.getElementById('nomError');
    var prenomError = document.getElementById('prenomError');
    var cinError = document.getElementById('cinError');
    var telError = document.getElementById('telephoneError');
    var mailError = document.getElementById('emailError');
    var roleError = document.getElementById('roleError');
    var MDPError = document.getElementById('motdepasseError');
    var CMDPError = document.getElementById('confirmationmdpError');
    var DDNError = document.getElementById('ddnError');
    var etablissementError = document.getElementById('etablissementError');
    //Etbalissement 
    etablissementInput.addEventListener('input', function() {
        if (!validateEtablissement(etablissementInput.value)) {
            etablissementError.style.display = 'block';
        } else {
            etablissementError.style.display = 'none';
        }
    });
    // Date de naissance 
    // Événement pour le champ Date de naissance
    DDNPInput.addEventListener('input', function() {
    if (!validateAge(DDNPInput.value)) {
        DDNError.style.display = 'block';
    } else {
        DDNError.style.display = 'none';
    }
});

    // CMDP
    CMDPInput.addEventListener('input', function() {
    if (!validateMotDePasse2(MDPInput.value, CMDPInput.value)) {
        CMDPError.style.display = 'block';
    } else {
        CMDPError.style.display = 'none';
    }
    });

    // MDP 
    MDPInput.addEventListener('input', function() {
        if (!validateMotDePasse(MDPInput.value)) {
            MDPError.style.display = 'block';
        } else {
            MDPError.style.display = 'none';
        }
    });
    // role 
    roleInput.addEventListener('change', function() {
        if (!validateRole(roleInput.value)) {
            roleError.style.display = 'block';
        } else {
            roleError.style.display = 'none';
        }
    });
    // Événement pour le champ Nom
    nomInput.addEventListener('input', function() {
        if (!validateNom(nomInput.value)) {
            nomError.style.display = 'block';
        } else {
            nomError.style.display = 'none';
        }
    });

    // Événement pour le champ Prénom
    prenomInput.addEventListener('input', function() {
        if (!validatePrenom(prenomInput.value)) {
            prenomError.style.display = 'block';
        } else {
            prenomError.style.display = 'none';
        }
    });

    // Événement pour le champ CIN
    cinInput.addEventListener('input', function() {
        if (!validateCIN(cinInput.value)) {
            cinError.style.display = 'block';
        } else {
            cinError.style.display = 'none';
        }
    });

    // Événement pour le champ Téléphone
    telInput.addEventListener('input', function() {
        if (!validateTel(telInput.value)) {
            telError.style.display = 'block';
        } else {
            telError.style.display = 'none';
        }
    });

    // Événement pour le champ Email
    mailInput.addEventListener('input', function() {
        if (!validateEmail(mailInput.value)) {
            mailError.style.display = 'block';
        } else {
            mailError.style.display = 'none';
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
        return prenom.length > 4 && prenomRegex.test(prenom);
    }

    // Validation de la CIN
    function validateCIN(cin) {
        var cinRegex = /^[0-9]*$/;
        return cin.length === 8 && cinRegex.test(cin);
    }

    // Validation du téléphone
    function validateTel(tel) {
        var telRegex = /^[0-9]*$/;
        return tel.length === 8 && telRegex.test(tel);
    }

    // Validation de l'email
    function validateEmail(email) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
    function validateRole(role) {
        // Vérifier si une option a été sélectionnée
        return role !== "";
    }
    function validateMotDePasse(motDePasse) {
        // Expression régulière pour vérifier si le mot de passe contient au moins un caractère spécial, un chiffre et une lettre
        var regex = /^(?=.*[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?])(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]{8,}$/;
        return regex.test(motDePasse);
    }
    function validateMotDePasse2(motDePasse, motDePasse2) {
        return motDePasse === motDePasse2;
    }
    function validateAge(date) {
        // Convertir la chaîne de date en objet Date
        var birthDate = new Date(date);
        
        // Obtenir la date actuelle
        var today = new Date();
        
        // Calculer la date il y a 18 ans
        var eighteenYearsAgo = new Date(today.getFullYear() - 18, today.getMonth(), today.getDate());
        
        // Comparer les dates
        return birthDate <= eighteenYearsAgo;
    }
    
    function validateEtablissement(etablissement) {
        // Expression régulière pour valider l'établissement (que des caractères alphabétiques)
        var etablissementRegex = /^[a-zA-Z\s]+$/;
        return etablissementRegex.test(etablissement);
    }
});
