document.addEventListener('DOMContentLoaded', function() {
    var slimOverlay = document.querySelector('.slim');
    var modal = document.querySelector('.custom-modal');

    //Ajout
    var slim2Overlay = document.querySelector('.slim2');
    var modal2 = document.querySelector('.custom-modal2');

    //ajout 
    var modifierButtons = document.querySelectorAll('.btn-primary');
    modifierButtons.forEach(function(button) {
        button.addEventListener('click', function() {

            var userId = button.getAttribute('data-id');
            // Effectuer une requête GET vers le fichier PHP avec l'ID de l'utilisateur dans l'URL
        fetch('GETUSER.php?id=' + userId, {
        method: 'GET'
            })
            //
            slimOverlay.style.display = 'flex';
            modal.style.display = 'block';
            slimOverlay.classList.add('blurred');
            var row = button.closest('tr');
            // Le reste de votre logique pour le bouton "Modifier"
        });
    });

    //Ajouter
    var Ajouter = document.querySelectorAll('.btn-primary1');
    Ajouter.forEach(function(button) {
        button.addEventListener('click', function() {
            slim2Overlay.style.display = 'flex';
            modal2.style.display = 'block';
            slim2Overlay.classList.add('blurred');
            var row = button.closest('tr');
            
        });
    });
    //Supprimer
  
    var supprimerButtons = document.querySelectorAll('.btn-supprimer');
    supprimerButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var eventId = button.getAttribute('data-id');
            fetch('deleteEvent.php?id=' + eventId, {
                method: 'DELETE'
            })
            .then(function(response) {
                location.reload();
            })
            .catch(function(error) {
                console.error('Une erreur s\'est produite:', error);
            });
        });
    });
});




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
//ESEAI
<script>

</script>