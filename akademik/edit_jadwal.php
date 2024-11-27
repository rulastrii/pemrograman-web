<?php
include('includes/db.php');

// Memeriksa apakah ID ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Mengambil data jadwal berdasarkan ID
    $query = "SELECT * FROM jadwal WHERE id = $id";
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "<div class='alert alert-danger mt-3'>Jadwal tidak ditemukan.</div>";
        exit();
    }
} else {
    echo "<div class='alert alert-danger mt-3'>ID tidak ditemukan.</div>";
    exit();
}

if (isset($_POST['submit'])) {
    // Mendapatkan data dari form
    $kodemk = $_POST['kodemk'];
    $matakuliah = $_POST['matakuliah'];
    $kelas = $_POST['kelas'];
    $hari = $_POST['hari'];
    $waktu = $_POST['waktu'];
    $ruangan = $_POST['ruangan'];
    $dosen = $_POST['dosen'];

    // Query untuk mengupdate data jadwal
    $updateQuery = "UPDATE jadwal 
                    SET kodemk='$kodemk', matakuliah='$matakuliah', kelas='$kelas', hari='$hari', 
                        waktu='$waktu', ruangan='$ruangan', dosen='$dosen'
                    WHERE id=$id";

if ($conn->query($updateQuery) === TRUE) {
          echo "<script>
              alert('Data berhasil diperbarui!');
              window.location.href = 'jadwal.php';
          </script>";
      } else {
          echo "<div class='alert alert-danger'>Terjadi kesalahan: " . $conn->error . "</div>";
      }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jadwal</title>
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
            <h1><i class="fas fa-edit"></i> Edit Jadwal Kuliah</h1>
            <form method="POST">
                <div class="mb-3 form-group">
                    <label for="kodemk" class="form-label">Kode MK:</label>
                    <input type="text" id="kodemk" name="kodemk" class="form-control"
                           value="<?php echo htmlspecialchars($row['kodemk']); ?>" required>
                </div>
                <div class="mb-3 form-group">
                    <label for="matakuliah" class="form-label">Mata Kuliah:</label>
                    <input type="text" id="matakuliah" name="matakuliah" class="form-control"
                           value="<?php echo htmlspecialchars($row['matakuliah']); ?>" required>
                </div>
                <div class="mb-3 form-group">
                    <label for="kelas" class="form-label">Kelas:</label>
                    <input type="text" id="kelas" name="kelas" class="form-control"
                           value="<?php echo htmlspecialchars($row['kelas']); ?>" required>
                </div>
                <div class="mb-3 form-group">
                    <label for="hari" class="form-label">Hari:</label>
                    <input type="text" id="hari" name="hari" class="form-control"
                           value="<?php echo htmlspecialchars($row['hari']); ?>" required>
                </div>
                <div class="mb-3 form-group">
                    <label for="waktu" class="form-label">Waktu:</label>
                    <input type="time" id="waktu" name="waktu" class="form-control"
                           value="<?php echo htmlspecialchars($row['waktu']); ?>" required>
                </div>
                <div class="mb-3 form-group">
                    <label for="ruangan" class="form-label">Ruangan:</label>
                    <input type="text" id="ruangan" name="ruangan" class="form-control"
                           value="<?php echo htmlspecialchars($row['ruangan']); ?>" required>
                </div>
                <div class="mb-3 form-group">
                    <label for="dosen" class="form-label">Dosen:</label>
                    <input type="text" id="dosen" name="dosen" class="form-control"
                           value="<?php echo htmlspecialchars($row['dosen']); ?>" required>
                </div>
                <button type="submit" name="submit" class="btn-submit"><i class="fas fa-save"></i> Perbarui Jadwal</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
