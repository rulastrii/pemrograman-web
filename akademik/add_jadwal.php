<?php include('includes/db.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jadwal</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
            <h1><i class="fas fa-calendar-plus"></i> Tambah Jadwal</h1>
            <form method="POST">
                <div class="mb-3">
                    <label for="kodemk" class="form-label">Kode MK:</label>
                    <input type="text" id="kodemk" name="kodemk" class="form-control" placeholder="Masukkan kode mata kuliah" required>
                </div>

                <div class="mb-3">
                    <label for="matakuliah" class="form-label">Mata Kuliah:</label>
                    <input type="text" id="matakuliah" name="matakuliah" class="form-control" placeholder="Masukkan nama mata kuliah" required>
                </div>

                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas:</label>
                    <input type="text" id="kelas" name="kelas" class="form-control" placeholder="Masukkan nama kelas" required>
                </div>

                <div class="mb-3">
                    <label for="hari" class="form-label">Hari:</label>
                    <input type="text" id="hari" name="hari" class="form-control" placeholder="Masukkan hari" required>
                </div>

                <div class="mb-3">
                    <label for="waktu" class="form-label">Waktu:</label>
                    <input type="time" id="waktu" name="waktu" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="ruangan" class="form-label">Ruangan:</label>
                    <input type="text" id="ruangan" name="ruangan" class="form-control" placeholder="Masukkan nama ruangan" required>
                </div>

                <div class="mb-3">
                    <label for="dosen" class="form-label">Dosen:</label>
                    <input type="text" id="dosen" name="dosen" class="form-control" placeholder="Masukkan nama dosen" required>
                </div>

                <button type="submit" name="submit" class="btn-submit"><i class="fas fa-plus-circle"></i>Tambah Jadwal</button>
            </form>

            <?php
            if (isset($_POST['submit'])) {
                $kodemk = $_POST['kodemk'];
                $matakuliah = $_POST['matakuliah'];
                $kelas = $_POST['kelas'];
                $hari = $_POST['hari'];
                $waktu = $_POST['waktu'];
                $ruangan = $_POST['ruangan'];
                $dosen = $_POST['dosen'];

                $query = "INSERT INTO jadwal (kodemk, matakuliah, kelas, hari, waktu, ruangan, dosen) 
                          VALUES ('$kodemk', '$matakuliah', '$kelas', '$hari', '$waktu', '$ruangan', '$dosen')";

                if ($conn->query($query) === TRUE) {
                    // Redirect to jadwal.php after successful insertion
                    echo "<script>
                        alert('Jadwal berhasil ditambahkan!');
                        window.location.href = 'jadwal.php';
                    </script>";
                } else {
                    // Display warning if there's an error
                    echo "<div class='alert alert-danger mt-3'>Terjadi kesalahan: " . $conn->error . "</div>";
                }
            }
            ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
