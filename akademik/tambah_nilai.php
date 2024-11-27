<?php
include('includes/db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Nilai</title>
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
            <h1><i class="fas fa-file-alt"></i> Tambah Nilai</h1>
            <form method="POST">
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM:</label>
                    <input type="text" id="nim" name="nim" class="form-control" placeholder="Masukkan NIM mahasiswa" required>
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama:</label>
                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan nama mahasiswa" required>
                </div>

                <div class="mb-3">
                    <label for="kodemk" class="form-label">Kode MK:</label>
                    <select id="kodemk" name="kodemk" class="form-control" required>
                        <option value="" disabled selected>Pilih Kode MK</option>
                        <?php
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

                <div class="mb-3">
                    <label for="nilai_kehadiran" class="form-label">Nilai Kehadiran:</label>
                    <input type="number" step="0.01" id="nilai_kehadiran" name="nilai_kehadiran" class="form-control" placeholder="Masukkan nilai kehadiran" required>
                </div>

                <div class="mb-3">
                    <label for="nilai_tugas" class="form-label">Nilai Tugas:</label>
                    <input type="number" step="0.01" id="nilai_tugas" name="nilai_tugas" class="form-control" placeholder="Masukkan nilai tugas" required>
                </div>

                <div class="mb-3">
                    <label for="nilai_uts" class="form-label">Nilai UTS:</label>
                    <input type="number" step="0.01" id="nilai_uts" name="nilai_uts" class="form-control" placeholder="Masukkan nilai UTS" required>
                </div>

                <div class="mb-3">
                    <label for="nilai_uas" class="form-label">Nilai UAS:</label>
                    <input type="number" step="0.01" id="nilai_uas" name="nilai_uas" class="form-control" placeholder="Masukkan nilai UAS" required>
                </div>

                <div class="mb-3">
                    <label for="mutu" class="form-label">Mutu:</label>
                    <input type="text" id="mutu" name="mutu" class="form-control" placeholder="Masukkan nilai mutu" required>
                </div>

                <button type="submit" name="submit" class="btn-submit"><i class="fas fa-plus-circle"></i>Tambah Nilai</button>
            </form>
            <?php
            if (isset($_POST['submit'])) {
                $nim = $_POST['nim'];
                $nama = $_POST['nama'];
                $kodemk = $_POST['kodemk'];
                $nilai_kehadiran = $_POST['nilai_kehadiran'];
                $nilai_tugas = $_POST['nilai_tugas'];
                $nilai_uts = $_POST['nilai_uts'];
                $nilai_uas = $_POST['nilai_uas'];
                $mutu = $_POST['mutu'];

                $query = "INSERT INTO nilai (nim, nama, kodemk, nilai_kehadiran, nilai_tugas, nilai_uts, nilai_uas, mutu) 
                          VALUES ('$nim', '$nama', '$kodemk', '$nilai_kehadiran', '$nilai_tugas', '$nilai_uts', '$nilai_uas', '$mutu')";

                if ($conn->query($query) === TRUE) {
                    echo "<script>
                        alert('Data berhasil ditambahkan!');
                        window.location.href = 'nilai.php';
                    </script>";
                } else {
                    echo "<div class='alert alert-danger'>Terjadi kesalahan: " . $conn->error . "</div>";
                }
            }
            ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
