<?php include('includes/db.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Nilai</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <header>
            <h1><i class="fas fa-graduation-cap"></i> Data Nilai Mahasiswa</h1>
        </header>

        <div class="actions-and-pagination" style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
            <div class="actions">
                <a href="tambah_nilai.php" class="btn btn-add"><i class="fas fa-plus"></i> Tambah Nilai</a>
            </div>

            <div class="pagination">
                <label for="show-data">Tampilkan:</label>
                <select id="show-data" onchange="updateData()">
                    <option value="5">5</option>
                    <option value="10" selected>10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                </select>
            </div>
        </div>

        <table class="styled-table">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Kode MK</th>
                    <th>Kehadiran</th>
                    <th>Tugas</th>
                    <th>UTS</th>
                    <th>UAS</th>
                    <th>Nilai Akhir</th>
                    <th>Mutu</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="data-table">
                <!-- Data akan diisi dengan JavaScript -->
            </tbody>
        </table>

        <div class="actions-and-pagination" style="display: flex; justify-content: space-between; align-items: center;">
            <div class="actions">
                <a href="index.php" class="btn btn-back"><i class="fas fa-home"></i> Kembali ke Dashboard</a>
            </div>

            <div class="pagination-buttons">
                <button id="prev" class="btn" onclick="prevPage()" disabled><i class="fas fa-arrow-left"></i> Sebelumnya</button>
                <button id="next" class="btn" onclick="nextPage()">Selanjutnya <i class="fas fa-arrow-right"></i></button>
            </div>
        </div>
    </div>

    <script>
        let currentPage = 1;
        let rowsPerPage = 10;
        const data = <?php 
            $stmt = $conn->prepare("SELECT * FROM nilai");
            $stmt->execute();
            $result = $stmt->get_result();
            $rows = [];
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            echo json_encode($rows); 
        ?>;

        function updateData() {
            rowsPerPage = document.getElementById('show-data').value;
            currentPage = 1;
            displayData();
        }

        function displayData() {
            const table = document.getElementById('data-table');
            table.innerHTML = '';
            const start = (currentPage - 1) * rowsPerPage;
            const end = start + parseInt(rowsPerPage);
            const paginatedData = data.slice(start, end);

            paginatedData.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = ` 
                    <td>${row.nim}</td>
                    <td>${row.nama}</td>
                    <td>${row.kodemk}</td>
                    <td>${row.nilai_kehadiran}</td>
                    <td>${row.nilai_tugas}</td>
                    <td>${row.nilai_uts}</td>
                    <td>${row.nilai_uas}</td>
                    <td>${row.nilai_akhir}</td>
                    <td>${row.mutu}</td>
                    <td>
                        <a href='edit_nilai.php?id=${row.id}' class='btn btn-edit'><i class="fas fa-edit"></i> Edit</a> |
                        <a href='hapus_nilai.php?id=${row.id}' class='btn btn-danger' onclick="return confirm('Anda yakin ingin menghapus data ini?');"><i class="fas fa-trash"></i> Hapus</a>
                    </td>`;
                tr.style.cursor = 'pointer';
                table.appendChild(tr);
            });

            document.getElementById('prev').disabled = currentPage === 1;
            document.getElementById('next').disabled = end >= data.length;
        }

        function prevPage() {
            if (currentPage > 1) {
                currentPage--;
                displayData();
            }
        }

        function nextPage() {
            if ((currentPage * rowsPerPage) < data.length) {
                currentPage++;
                displayData();
            }
        }

        displayData();
    </script>
</body>
</html>
