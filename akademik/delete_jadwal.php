<?php 
include('includes/db.php');

// Memeriksa apakah ID ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data jadwal berdasarkan ID
    $deleteQuery = "DELETE FROM jadwal WHERE id = $id";

    if ($conn->query($deleteQuery) === TRUE) {
        // Menampilkan alert berhasil dihapus dan kemudian melakukan redirect
        echo "<script>
            alert('Jadwal berhasil dihapus!');
            window.location.href = 'jadwal.php'; // Redirect ke halaman jadwal setelah berhasil dihapus
        </script>";
    } else {
        // Menampilkan error jika gagal menghapus
        echo "<script>
            alert('Error: " . $conn->error . "');
        </script>";
    }
} else {
    echo "<script>
            alert('ID tidak ditemukan.');
        </script>";
}
?>
