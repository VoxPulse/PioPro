document.addEventListener('DOMContentLoaded', function() {
    // Cibler le formulaire
    const form = document.getElementById('votre-formulaire-id');

    // Ajouter un gestionnaire d'événement pour l'événement de soumission du formulaire
    form.addEventListener('submit', function(event) {
        // Récupérer tous les champs du formulaire
        const inputs = form.querySelectorAll('input, select, textarea');

        // Parcourir tous les champs pour vérifier s'ils sont vides
        let isValid = true;
        inputs.forEach(input => {
            if (input.required && input.value.trim() === '') {
                isValid = false;
            }
        });

        // Si au moins un champ est vide, empêcher la soumission du formulaire
        if (!isValid) {
            event.preventDefault(); // Empêcher l'envoi du formulaire
            alert('Veuillez remplir tous les champs.'); // Afficher un message d'alerte
        }
    });
});
