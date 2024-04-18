// Fonction pour récupérer les données de l'utilisateur depuis le fichier PHP et remplir les champs de formulaire
function remplirFormulaireAvecDonneesUtilisateur(userId) {
    // Effectuer une requête Ajax pour récupérer les données JSON de l'utilisateur depuis le fichier PHP
    $.ajax({
        url: 'GETUSER.php?id=' + userId, // Spécifiez le chemin de votre fichier PHP avec l'ID de l'utilisateur
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            // Remplir les champs de formulaire avec les données JSON récupérées
            $('#nom').val(data.nom);
        },
        error: function(xhr, status, error) {
            console.error("Une erreur s'est produite lors de la récupération des données de l'utilisateur.");
        }
    });
}
// Appeler la fonction pour remplir le formulaire lorsque la page est chargée
$(document).ready(function() {
    // Spécifiez l'ID de l'utilisateur que vous souhaitez récupérer
    var userId = 93; // Vous pouvez remplacer 1 par l'ID de l'utilisateur souhaité
    remplirFormulaireAvecDonneesUtilisateur(userId);
});
