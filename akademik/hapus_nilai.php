<?php
include('includes/db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query to delete data from the 'nilai' table
    $query = "DELETE FROM nilai WHERE id = $id";

    if ($conn->query($query) === TRUE) {
        // If delete is successful, display success alert and redirect
        echo "<script>
            alert('Data berhasil dihapus!');
            window.location.href = 'nilai.php';
        </script>";
    } else {
        // If error occurs, display the error message
        echo "<script>
            alert('Error: " . $conn->error . "');
        </script>";
    }
}
?>