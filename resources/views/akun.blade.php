<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Judul -->
    <title>Akun | Laporan Terintegrasi Online Platform</title>

    <!-- Icon Web -->
    <link rel="shortcut icon" href="images/iconlaptop.ico" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- CSS Eksternal -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/akun.css">
</head>

<body>
    <!-- Awal Akun-->
    <div class="container">
        <div class="form-container">
            <button class="btn back-btn" onclick="window.history.back()">
                <i class="fas fa-arrow-left"></i>
            </button>
            <h2>Akun Pengguna</h2>
            <div class="user-info">
                <p><strong>Nama :</strong> <span>{{ $user->name }}</span></p>
                <p><strong>Email :</strong> <span>{{ $user->email }}</span></p>
            </div>
            <div class="text-center">
                <form id="logout-form" action="/logout" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-btn">Log Out</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Akhir Akun-->

    <!-- Awal Footer -->
    <footer class="fixed-bottom bg-light px-2">
        <nav class="d-flex justify-content-around">
            <div class="nav-item text-center p-2">
                <a href="/voting" class="text-dark text-decoration-none">
                    <i class="fas fa-up-down"></i><br />Voting
                </a>
            </div>
            <div class="nav-item text-center p-2">
                <a href="/history" class="text-dark text-decoration-none">
                    <i class="fas fa-history"></i><br />History
                </a>
            </div>
            <!-- <div class="nav-item text-center p-2 lapor">
                <a href="lapor.html" class="text-dark text-decoration-none">
                    <i class="fas fa-bullhorn"></i><span>Lapor</span>
                </a>
            </div> -->
            <div class="nav-item text-center p-2">
                <a href="/about" class="text-dark text-decoration-none">
                    <i class="fas fa-info"></i><br />About
                </a>
            </div>
            <div class="nav-item text-center p-2">
                <a href="/akun" class="text-dark text-decoration-none">
                    <i class="fas fa-user"></i><br />Akun
                </a>
            </div>
        </nav>
    </footer>
    <!-- Akhir Footer-->

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- JS Eksternal-->
    <script src="js/script.js"></script>
</body>
</html>