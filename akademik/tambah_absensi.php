<?php
include('includes/db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Absensi</title>
    <!-- Include Bootstrap and FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            position: relative;
        }

        .form-group .form-control {
            padding-left: 40px;
        }

        .form-group i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }

        .btn-submit {
            display: block;
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .btn-submit:hover {
            background: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h1><i class="fas fa-calendar-check"></i> Tambah Absensi</h1>
            <form method="POST">
                <div class="mb-3 form-group">
                    <label for="kodemk" class="form-label">Kode MK:</label>
                    <select id="kodemk" name="kodemk" class="form-control" required>
                        <option value="" disabled selected>Pilih Kode MK</option>
                        <?php
                        // Query untuk mengambil kode mata kuliah dan nama mata kuliah dari tabel jadwal
                        $result = $conn->query("SELECT kodemk, matakuliah FROM jadwal");
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='{$row['kodemk']}'>{$row['kodemk']} - {$row['matakuliah']}</option>";
                            }
                        } else {
                            echo "<option value='' disabled>Data tidak tersedia</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3 form-group">
                    <label for="pertemuanke" class="form-label">Pertemuan Ke:</label>
                    <input type="number" id="pertemuanke" name="pertemuanke" class="form-control" placeholder="Masukkan pertemuan ke-" required>
                </div>

                <div class="mb-3 form-group">
                    <label for="topik" class="form-label">Topik:</label>
                    <input type="text" id="topik" name="topik" class="form-control" placeholder="Masukkan topik" required>
                </div>

                <button type="submit" name="submit" class="btn-submit"><i class="fas fa-plus-circle"></i> Tambah Absensi</button>
            </form>
            <?php
            if (isset($_POST['submit'])) {
                $kodemk = $_POST['kodemk'];
                $pertemuanke = $_POST['pertemuanke'];
                $topik = $_POST['topik'];
            
                // Query untuk menyimpan data absensi ke database
                $query = "INSERT INTO absensi (kodemk, pertemuanke, topik) 
                          VALUES ('$kodemk', '$pertemuanke', '$topik')";
            
                if ($conn->query($query) === TRUE) {
                    echo "<div class='alert alert-success mt-3'>Data berhasil ditambahkan!</div>";
                    header("Location: absensi.php");
                    exit();
                } else {
                    echo "<div class='alert alert-danger mt-3'>Error: " . $conn->error . "</div>";
                }
            }
            ?>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
