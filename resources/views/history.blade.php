<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Judul -->
    <title>Laporan Terintegrasi Online Platform</title>

    <!-- Icon Web -->
    <link rel="shortcut icon" href="images/iconlaptop.ico" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- CSS Eksternal -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/history.css">
</head>

<body>
    <!-- Awal History -->
    <div class="container">
        <div class="form-container">
            <button class="btn back-btn" onclick="window.history.back()">
                <i class="fas fa-arrow-left"></i>
            </button>
            <h2>Riwayat Laporan</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">File Media</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody id="historyTableBody">
                        <!-- Data akan diisi oleh JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Akhir History -->

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- Awal JS History -->
    <script>
        // Dummy data untuk riwayat laporan
        const historyData = [
            {
                judul: "Remote TV",
                tanggal: "2024-10-01",
                jenis: "Remote TV",
                kategori: "Ringan",
                lokasi: "Ruang Kelas 1",
                deskripsi: "Remote TV tidak berfungsi.",
                media: "remote-tv.jpg",
                status: "dalam antrian" // Status dalam dalam antrian
            },
            {
                judul: "AC Tidak Dingin",
                tanggal: "2024-10-02",
                jenis: "AC Tidak Dingin",
                kategori: "Berat",
                lokasi: "Ruang Rapat",
                deskripsi: "AC perlu diperbaiki.",
                media: "ac.jpg",
                status: "sedang diproses" // Status sedang diproses
            },
            {
                judul: "Lampu Padam",
                tanggal: "2024-10-03",
                jenis: "Lampu Padam",
                kategori: "Ringan",
                lokasi: "Ruang Kelas 2",
                deskripsi: "Lampu tidak menyala.",
                media: "lampu.jpg",
                status: "selesai" // Status selesai
            }
        ];

        // Mengisi tabel dengan data riwayat laporan
        const historyTableBody = document.getElementById('historyTableBody');

        historyData.forEach((laporan, index) => {
            const row = document.createElement('tr');
            const statusClass = laporan.status === "dalam antrian" ? "bg-danger" :
                                laporan.status === "sedang diproses" ? "bg-success" :
                                "bg-primary"; // Menentukan kelas berdasarkan status
            row.innerHTML = `
                <th scope="row">${index + 1}</th>
                <td>${laporan.judul}</td>
                <td>${laporan.tanggal}</td>
                <td>${laporan.jenis}</td>
                <td>${laporan.kategori}</td>
                <td>${laporan.lokasi}</td>
                <td>${laporan.deskripsi}</td>
                <td>${laporan.media ? `<a href="images/${laporan.media}" target="_blank">Lihat File</a>` : 'Tidak ada file'}</td>
                <td class="text-white text-center ${statusClass}">${laporan.status.charAt(0).toUpperCase() + laporan.status.slice(1)}</td> <!-- Menambahkan status ke tabel -->
            `;
            historyTableBody.appendChild(row);
        });        
    </script>
    <!-- Akhir JS History -->

</body>
</html>