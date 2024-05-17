const calendar = document.getElementById('calendar');
const selectMonth = document.getElementById('select-month');
const inputYear = document.getElementById('input-year');

// Fonction pour mettre à jour le calendrier avec le mois et l'année spécifiés
function updateCalendar(year, month) {
    const firstDayOfMonth = new Date(year, month, 1);
    const lastDayOfMonth = new Date(year, month + 1, 0);
    const daysInMonth = lastDayOfMonth.getDate();
    const startingDayOfWeek = firstDayOfMonth.getDay(); // 0 pour dimanche, 1 pour lundi, etc.

    // Effacer le contenu actuel du calendrier
    calendar.innerHTML = '';

    // Créer une table pour afficher les jours du mois
    const table = document.createElement('table');
    const tbody = document.createElement('tbody');

    // Ajouter une ligne pour les noms des jours de la semaine
    const daysOfWeek = ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'];
    const headerRow = document.createElement('tr');
    daysOfWeek.forEach(day => {
        const th = document.createElement('th');
        th.textContent = day;
        headerRow.appendChild(th);
    });
    tbody.appendChild(headerRow);

    // Ajouter des cellules pour chaque jour du mois
    let dayCount = 1;
    for (let i = 0; i < 6; i++) { // 6 lignes pour s'assurer que tous les mois s'affichent correctement
        const row = document.createElement('tr');
        for (let j = 0; j < 7; j++) {
            if ((i === 0 && j < startingDayOfWeek) || dayCount > daysInMonth) {
                const td = document.createElement('td');
                row.appendChild(td);
            } else {
                const td = document.createElement('td');
                td.textContent = dayCount;
                row.appendChild(td);
                dayCount++;
            }
        }
        tbody.appendChild(row);
    }

    table.appendChild(tbody);
    calendar.appendChild(table);

    // Récupérer et afficher les événements pour ce mois et cette année
    fetchEventsFromDatabase(year, month);
}

// Fonction pour récupérer les événements depuis la base de données
// Fonction pour récupérer les événements depuis la base de données
function fetchEventsFromDatabase(year, month) {
    fetch(`C:/wamp64/www/PROJET/VoxPulse/View/salima/get_events.php?year=${year}&month=${month}`)
        .then(response => response.json())
        .then(events => {
            events.forEach(event => {
                const eventDate = new Date(event.date);
                const eventCell = document.querySelector(`#calendar tbody td:nth-child(${eventDate.getDate() + startingDayOfWeek})`);
                if (eventCell) {
                    eventCell.classList.add('has-event'); // Ajouter une classe pour indiquer qu'il y a un événement ce jour-là

                    // Créer un élément span pour afficher le titre de l'événement dans la cellule
                    const titleSpan = document.createElement('span');
                    titleSpan.textContent = event.title; // Titre de l'événement
                    eventCell.appendChild(titleSpan);
                }
            });
        })
        .catch(error => {
            console.error('Erreur lors de la récupération des événements :', error);
        });
}


// Gérer le changement de mois ou d'année
selectMonth.addEventListener('change', () => {
    const selectedYear = parseInt(inputYear.value);
    const selectedMonth = parseInt(selectMonth.value);
    updateCalendar(selectedYear, selectedMonth);
});

inputYear.addEventListener('input', () => {
    const selectedYear = parseInt(inputYear.value);
    const selectedMonth = parseInt(selectMonth.value);
    updateCalendar(selectedYear, selectedMonth);
});

// Appeler updateCalendar au chargement de la page pour afficher le mois et l'année actuels
const currentDate = new Date();
const currentYear = currentDate.getFullYear();
const currentMonth = currentDate.getMonth();
updateCalendar(currentYear, currentMonth);
