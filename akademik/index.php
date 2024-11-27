<?php include('includes/db.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Akademik</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome -->
</head>
<body>
    <div class="dashboard">
        <h1>Dashboard Akademik</h1>
        <div class="card-container">
            <!-- Card Jadwal -->
            <div class="card">
                <i class="fas fa-calendar-alt card-icon"></i>
                <h2>Jadwal</h2>
                <a href="jadwal.php" class="btn btn-card">
                    <i class="fas fa-arrow-right"></i> Lihat
                </a>
            </div>

            <!-- Card Nilai -->
            <div class="card">
                <i class="fas fa-clipboard-list card-icon"></i>
                <h2>Nilai</h2>
                <a href="nilai.php" class="btn btn-card">
                    <i class="fas fa-arrow-right"></i> Lihat
                </a>
            </div>

            <!-- Card Absensi -->
            <div class="card">
                <i class="fas fa-check-square card-icon"></i>
                <h2>Absensi</h2>
                <a href="absensi.php" class="btn btn-card">
                    <i class="fas fa-arrow-right"></i> Lihat
                </a>
            </div>
        </div>
    </div>
</body>
</html>
