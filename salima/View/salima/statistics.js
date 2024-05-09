// Récupérer les données des ventes depuis le backend (via AJAX ou autre méthode)
const salesData = [150, 200, 180, 250, 300, 200, 350]; // Exemple de données

// Configuration du graphique en courbes
const ctx = document.getElementById('lineChart').getContext('2d');
const lineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Semaine 1', 'Semaine 2', 'Semaine 3', 'Semaine 4', 'Semaine 5', 'Semaine 6', 'Semaine 7'],
        datasets: [{
            label: 'Ventes',
            data: salesData,
            fill: false,
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
