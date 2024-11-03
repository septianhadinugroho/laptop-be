<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LAPTOP | Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Icon Web -->
    <link rel="shortcut icon" href="images/iconlaptop.ico" type="image/x-icon">

    <!-- CSS Eksternal -->
    <link rel="stylesheet" href="css/admin/main.css">
    <link rel="stylesheet" href="css/admin/laporan.css">
</head>

<body>
    <div class="sidebar" id="sidebarMenu">
        <div class="p-3 text-center border-bottom">
            <h4>LAPTOP</h4>
        </div>
        <ul>
            <li><a href="/dashboard"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
            <li><a href="/pengguna"><i class="bi bi-people"></i> Pengguna</a></li>
            <li><a href="/jenis"><i class="bi bi-list-ul"></i> Jenis</a></li>
            <li><a href="/laporan" class="active"><i class="bi bi-file-earmark-text"></i> Laporan</a></li>
            <li><a href="/historylaporan"><i class="bi bi-clock-history"></i> History Laporan</a></li>
            <li><a href="/profile"><i class="bi bi-person-circle"></i> Profile</a></li>
            <li><a href="/logout"><i class="bi bi-box-arrow-right"></i> Log Out</a></li>
        </ul>
    </div>

    <div class="main">
        <nav class="navbar navbar-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" aria-label="Toggle navigation" onclick="toggleSidebar()">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand">Laporan</a>
                <ul class="navbar-nav ms-auto d-flex flex-row align-items-center">
                    <li class="nav-item mx-2">
                        <a href="#" class="nav-link text-dark">
                            <i class="bi bi-bell"></i> Notifications
                        </a>
                    </li>
                    <li class="nav-item mx-2">
                        <a href="/profile" class="nav-link text-dark">
                            <i class="bi bi-person-circle"></i> Profile
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="content p-4">
            <h4 class="text-center mb-4">Daftar Laporan</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th>Update Status</th>
                            <th>Hapus Laporan</th>
                        </tr>
                    </thead>
                    <tbody id="laporanTable">
                        <tr>
                            <td>1</td>
                            <td>Laporan Kehilangan Laptop</td>
                            <td>Laptop hilang di kampus</td>
                            <td><span class="badge bg-danger">Dalam Antrian</span></td>
                            <td>
                                <button class="btn btn-info btn-sm" onclick="updateStatus(this)">Update</button>
                            </td>
                            <td>
                                <button class="btn btn-danger btn-sm" onclick="hapusLaporan(this)">Hapus</button>
                            </td>
                        </tr>
                        <!-- Tambahkan baris lain sesuai kebutuhan -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebarMenu');
            const main = document.querySelector('.main');
            sidebar.classList.toggle('show');
            main.classList.toggle('show-sidebar');
        }

        function updateStatus(button) {
            const statusCell = button.parentElement.previousElementSibling;
            const currentStatus = statusCell.textContent.trim();

            if (currentStatus === 'Dalam Antrian') {
                statusCell.innerHTML = '<span class="badge bg-primary">Sedang Diproses</span>';
            } else if (currentStatus === 'Sedang Diproses') {
                statusCell.innerHTML = '<span class="badge bg-success">Selesai</span>';
            } else if (currentStatus === 'Selesai') {
                statusCell.innerHTML = '<span class="badge bg-danger">Dalam Antrian</span>';
            }
        }

        function hapusLaporan(button) {
            const row = button.closest('tr');
            row.remove();
            alert('Laporan berhasil dihapus.');
        }
    </script>
</body>
</html>