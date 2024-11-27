<?php
include('includes/db.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Menghindari SQL Injection
    $query = "SELECT * FROM absensi WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    
    if (!$row) {
        echo "<div class='alert alert-danger mt-3'>Data tidak ditemukan!</div>";
        exit();
    }
}

// Fetch daftar Kode MK dari tabel jadwal
$kodeMKQuery = "SELECT kodemk, matakuliah FROM jadwal";
$kodeMKResult = $conn->query($kodeMKQuery);

if (isset($_POST['submit'])) {
    $kodemk = $_POST['kodemk'];
    $pertemuanke = intval($_POST['pertemuanke']);
    $topik = $_POST['topik'];

    $updateQuery = "UPDATE absensi SET kodemk = ?, pertemuanke = ?, topik = ? WHERE id = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("sisi", $kodemk, $pertemuanke, $topik, $id);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success mt-3'>Data berhasil diperbarui!</div>";
        header("Location: absensi.php");
        exit();
    } else {
        echo "<div class='alert alert-danger mt-3'>Error: " . $conn->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Absensi</title>
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
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h1><i class="fas fa-edit"></i> Edit Absensi</h1>
            <form method="POST">
                <div class="mb-3">
                    <label for="kodemk" class="form-label">Kode MK:</label>
                    <select id="kodemk" name="kodemk" class="form-control" required>
                        <option value="" disabled selected>Pilih Kode MK</option>
                        <?php
                        if ($kodeMKResult && $kodeMKResult->num_rows > 0) {
                            while ($kodeMKRow = $kodeMKResult->fetch_assoc()) {
                                $selected = ($row['kodemk'] == $kodeMKRow['kodemk']) ? 'selected' : '';
                                echo "<option value='{$kodeMKRow['kodemk']}' $selected>{$kodeMKRow['kodemk']} - {$kodeMKRow['matakuliah']}</option>";
                            }
                        } else {
                            echo "<option value='' disabled>Data tidak tersedia</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="pertemuanke" class="form-label">Pertemuan Ke:</label>
                    <input type="number" id="pertemuanke" name="pertemuanke" class="form-control" 
                           value="<?php echo htmlspecialchars($row['pertemuanke']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="topik" class="form-label">Topik:</label>
                    <input type="text" id="topik" name="topik" class="form-control" 
                           value="<?php echo htmlspecialchars($row['topik']); ?>" required>
                </div>

                <button type="submit" name="submit" class="btn btn-primary w-100">
                    <i class="fas fa-save"></i> Perbarui Absensi
                </button>
            </form>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
