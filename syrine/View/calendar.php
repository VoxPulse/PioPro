<?php
include 'C:\wamp64\www\VoxPulse4\Controller\offre_emploiC.php';


$offre_emploiC = new Offre_emploiC();
$ex = $excur->listexcur();

$fullCalendarOffre_emploi = [];
foreach ($ex as $event) {
	$start_date = date("Y-m-d", strtotime($offre_emploi['date_fin'])); 
    $end_date = date("Y-m-d", strtotime($offre_emploi['date_fin']. ' +1 day')); 
    $fullCalendarOffre_emploi = [
        'id' => $offre_emploi['id'],
        'titre_p' => $offre_emploi['titre_p'],
        'description' => $start_date,
        'end' => $end_date,
		'deb' => $start_date,
        'fin' => $end_date,
        'guide' => $offre_emploi['id_guide'],
        'date_fin' => $offre_emploi['date_fin'],
        'salaire' => $offre_emploi['salaire'],
        'categorie' => $offre_emploi['categorie'],
    ];

    // Ajoutez cet événement converti au tableau des événements FullCalendar
    $fullCalendarOffre_emploi[] = $fullCalendarOffre_emploi;
}
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src='index.global.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@5.10.0/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@5.10.0/main.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core@5.10.0/main.css" rel="stylesheet" />

    <style>
        #calendar {
            max-width: 1100px;
            margin: 0 auto;
        }

        .popup-container {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 9999;
            width: 320px;
            max-width: 90%;
            text-align: left; /* alignement du texte à gauche */
        }

        .popup-container h2 {
            margin-top: 0;
            color: #333;
            font-size: 20px;
            margin-bottom: 15px;
        }

        .popup-content p {
            color: #666;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .popup-close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            color: #999;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        .popup-close:hover {
            color: #333;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title'
                },
                initialDate: '2024-05-01',
                navLinks: true,
                businessHours: true,
                editable: true,
                selectable: true,
                eventClick: function(info) {
                    var offre_emploiDetails = info.event.extendedProps;
                    $('#popupTitle').text(offre_emploiDetails.title);
                    $('#popupDetails').html(
                        `<p><strong>ID :</strong> ${offre_emploiDetails.id}</p>` +
                        `<p><strong>titre_p :</strong> ${offre_emploiDetails.titre_p}</p>` +
                        `<p><strong>Deescription :</strong> ${offre_emploiDetails.description}</p>` +
                        `<p><strong>Date fin :</strong> ${offre_emploiDetails.date_fin}</p>` +
                        `<p><strong>Salaire :</strong> ${offre_emploiDetails.salaire}</p>` +
                        `<p><strong>Categorire :</strong> ${offre_emploiDetails.capacite}</p>` +
                        `<p><strong>Activité :</strong> ${offre_emploiDetails.activite}</p>`
                    );
                    $('.popup-container').show();
                },
                events: <?php echo json_encode($fullCalendarEvents); ?>
            });

            calendar.render();
        });

        function closePopup() {
            $('.popup-container').hide();
        }
    </script>
</head>

<body>

    <div id='calendar'></div>

    <div class="popup-container">
        <span class="popup-close" onclick="closePopup()">X</span>
        <h2 id="popupTitle"></h2>
        <div id="popupDetails" class="popup-content"></div>
    </div>

</body>

</html>
