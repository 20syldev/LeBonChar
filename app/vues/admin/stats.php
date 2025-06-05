<!DOCTYPE html>
<html lang="fr" data-theme="light" data-mode="auto">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Admin - Statistiques - LeBonChar</title>
    <link rel="stylesheet" href="/css/main.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>
<body>
    <div class="container">

        <!-- En-tête de la page -->
        <h1 class="page-title">Statistiques des ventes et réservations</h1>

        <!-- Navigation -->
        <div class="nav">
            <div class="nav-left">
                <a href="/dashboard" class="btn btn-back">
                    <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                        <path
                            d="M19 12H5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path
                            d="M12 19L5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Tableau de bord
                </a>
                <a href="/" class="btn btn-home">
                    <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                        <path
                            d="M12.2796 3.71579C12.097 3.66261 11.903 3.66261 11.7203 3.71579C11.6678 3.7311 11.5754 3.7694 11.3789 3.91817C11.1723 4.07463 10.9193 4.29855 10.5251 4.64896L5.28544 9.3064C4.64309 9.87739 4.46099 10.0496 4.33439 10.24C4.21261 10.4232 4.12189 10.6252 4.06588 10.8379C4.00765 11.0591 3.99995 11.3095 3.99995 12.169V17.17C3.99995 18.041 4.00076 18.6331 4.03874 19.0905C4.07573 19.536 4.14275 19.7634 4.22513 19.9219C4.41488 20.2872 4.71272 20.5851 5.07801 20.7748C5.23658 20.8572 5.46397 20.9242 5.90941 20.9612C6.36681 20.9992 6.95893 21 7.82995 21H7.99995V18C7.99995 15.7909 9.79081 14 12 14C14.2091 14 16 15.7909 16 18V21H16.17C17.041 21 17.6331 20.9992 18.0905 20.9612C18.5359 20.9242 18.7633 20.8572 18.9219 20.7748C19.2872 20.5851 19.585 20.2872 19.7748 19.9219C19.8572 19.7634 19.9242 19.536 19.9612 19.0905C19.9991 18.6331 20 18.041 20 17.17V12.169C20 11.3095 19.9923 11.0591 19.934 10.8379C19.878 10.6252 19.7873 10.4232 19.6655 10.24C19.5389 10.0496 19.3568 9.87739 18.7145 9.3064L13.4748 4.64896C13.0806 4.29855 12.8276 4.07463 12.621 3.91817C12.4245 3.7694 12.3321 3.7311 12.2796 3.71579Z"
                            fill="currentColor"/>
                    </svg>
                    Accueil
                </a>
            </div>
        </div>

        <!-- Formulaire de sélection de date -->
        <form method="GET" class="form">
            <div class="form-group">
                <label for="start_date">Date de début :</label>
                <input type="text" id="start_date" name="start_date" class="form-control" value="<?= htmlspecialchars($stats['start_date']); ?>" />
            </div>
            <div class="form-group">
                <label for="end_date">Date de fin :</label>
                <input type="text" id="end_date" name="end_date" class="form-control" value="<?= htmlspecialchars($stats['end_date']); ?>" />
            </div>
            <button type="submit" class="btn btn-primary">Afficher</button>
        </form>

        <!-- Affichage des statistiques -->
        <div class="card mt-lg">
            <div class="card-content">
                <canvas id="statsChart"></canvas>
            </div>
        </div>

    </div>

    <script>
        flatpickr("#start_date", { dateFormat: "Y-m-d" });
        flatpickr("#end_date", { dateFormat: "Y-m-d" });

        const ctx = document.getElementById('statsChart').getContext('2d');
        const statsChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Ventes', 'Réservations'],
                datasets: [{
                    label: 'Statistiques',
                    data: [<?= $stats['sales']; ?>, <?= $stats['reservations']; ?>],
                    backgroundColor: ['#4CAF50', '#FF9800'],
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>