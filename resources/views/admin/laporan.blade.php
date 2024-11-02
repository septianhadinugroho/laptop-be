<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LAPTOP | DashBoard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/admin/layout.css">
</head>
<body>
    <div class="main d-flex flex-column justify-content-between">
        <nav class="navbar navbar-dark navbar-expand-lg">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" aria-label="Toggle navigation" onclick="toggleSidebar()">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand ms-5" href="#">LAPTOP</a>
            </div>
        </nav>

        <div class="body-content h-100 mt-5">
            <div class="sidebar d-lg-block" id="sidebarMenu">
                <ul>
                    <li><a href="dashboard" @if (request()->route()->uri == 'dashboard')
                        class='active'
                    @endif>Dashboard</a></li>
                    <li><a href="pengguna" @if (request()->route()->uri == 'pengguna')
                        class='active'
                    @endif>Pengguna</a></li>
                    <li><a href="jenis" @if (request()->route()->uri == 'jenis')
                        class='active'
                    @endif>Jenis</a></li>
                    <li><a href="laporan" @if (request()->route()->uri == 'laporan')
                        class='active'
                    @endif>Laporan</a></li>
                    <li><a href="historylaporan" @if (request()->route()->uri == 'historylaporan')
                        class='active'
                    @endif>History Laporan</a></li>
                    <li><a href="profile" @if (request()->route()->uri == 'profile')
                        class='active'
                    @endif>Profile</a></li>
                    <li><a href="logout">Log Out</a></li>
                </ul>
            </div>
            <div class="content p-5">
                <h1>ini halaman laporan</h1>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script>
        function toggleSidebar() {
            const main = document.querySelector('.main');
            main.classList.toggle('show-sidebar');
        }

        // Hapus class show-sidebar ketika ukuran layar diperbesar
        window.addEventListener('resize', () => {
            const main = document.querySelector('.main');
            if (window.innerWidth >= 992) {
                main.classList.remove('show-sidebar');
            }
        });
    </script>
</body>
</html>
