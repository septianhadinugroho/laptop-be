<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LAPTOP | Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Icon Web -->
    <link rel="shortcut icon" href="images/iconlaptop.ico" type="image/x-icon">

    <!-- CSS Eksternal -->
    <link rel="stylesheet" href="css/admin/main.css">
    <link rel="stylesheet" href="css/admin/pengguna.css">
</head>

<body>
    <div class="sidebar" id="sidebarMenu">
        <div class="p-3 text-center border-bottom">
            <h4>LAPTOP</h4>
        </div>
        <ul>
            <li><a href="/dashboard"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
            <li><a href="/pengguna" class="active"><i class="bi bi-people"></i> Pengguna</a></li>
            <li><a href="/jenis"><i class="bi bi-list-ul"></i> Jenis</a></li>
            <li><a href="/laporan"><i class="bi bi-file-earmark-text"></i> Laporan</a></li>
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
                <a class="navbar-brand">Pengguna</a>
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
            <div class="d-flex justify-content-between mb-3">
                <button class="btn btn-primary" onclick="tambahAkun()">Tambah Akun</button>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover tabel-pengguna" style="background-color: #e3f2fd;">
                    <thead class="table-primary">
                        <tr>
                            <th class="id-akun">ID Akun</th>
                            <th class="nama">Nama</th>
                            <th class="email">Email</th>
                            <th class="password">Password</th>
                            <th class="aksi">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tabelPengguna">
                        <tr>
                            <td class="id-akun">1</td>
                            <td class="nama">John Doe</td>
                            <td class="email">johndoe@example.com</td>
                            <td class="password">password123</td>
                            <td class="aksi">
                                <button class="btn btn-danger btn-sm" onclick="hapusAkun(this)">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="id-akun">2</td>
                            <td class="nama">Jane Smith</td>
                            <td class="email">janesmith@example.com</td>
                            <td class="password">securepass</td>
                            <td class="aksi">
                                <button class="btn btn-danger btn-sm" onclick="hapusAkun(this)">Hapus</button>
                            </td>
                        </tr>
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

        function tambahAkun() {
            const idBaru = prompt("Masukkan ID Akun:");
            const namaBaru = prompt("Masukkan Nama:");
            const emailBaru = prompt("Masukkan Email:");
            const passwordBaru = prompt("Masukkan Password:");

            if (idBaru && namaBaru && emailBaru && passwordBaru) {
                const tabel = document.getElementById('tabelPengguna');
                const row = tabel.insertRow();
                
                row.innerHTML = `
                    <td class="id-akun">${idBaru}</td>
                    <td class="nama">${namaBaru}</td>
                    <td class="email">${emailBaru}</td>
                    <td class="password">${passwordBaru}</td>
                    <td class="aksi">
                        <button class="btn btn-danger btn-sm" onclick="hapusAkun(this)">Hapus</button>
                    </td>
                `;
            } else {
                alert("Semua kolom harus diisi untuk menambah akun!");
            }
        }

        function hapusAkun(button) {
            if (confirm("Apakah Anda yakin ingin menghapus akun ini?")) {
                const row = button.parentNode.parentNode;
                row.parentNode.removeChild(row);
            }
        }
    </script>
</body>
</html>