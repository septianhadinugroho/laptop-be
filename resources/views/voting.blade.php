<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Judul -->
    <title>Voting | Laporan Terintegrasi Online Platform</title>

    <!-- Icon Web -->
    <link rel="shortcut icon" href="images/iconlaptop.ico" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- CSS Eksternal -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/voting.css">
</head>

<body>

    <!-- Awal Header -->
    <header class="text-align p-2">
        <div class="welcome-banner">
            <h1>Selamat datang, <span class="username">{{ $user->name }}</span></h1>
        </div>
    </header>
    <!-- Akhir Header -->

    <!-- Awal Pelaporan -->
    <div class="container">
        <div class="form-container">
            <h2 class="text-center">Voting</h2>
            <h2 class="text-center">Kategori Berat</h2>
            <div id="postContainer">
                <!-- Postingan kategori berat akan diisi oleh JavaScript -->
            </div>
        </div>
    </div>
    <!-- Akhir Pelaporan -->

    <!-- Notifikasi -->
    <div id="notification" class="notification"></div>

   <!-- Awal Footer -->
    <footer class="fixed-bottom bg-light px-2" id="mainFooter">
        <nav class="d-flex justify-content-around" id="footerNav">
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
            <!-- Fitur lapor akan dimunculkan nanti -->
            <div class="nav-item text-center p-2 lapor hidden">
                <a href="/lapor" class="text-dark text-decoration-none">
                    <i class="fas fa-bullhorn"></i><br />Lapor
                </a>
            </div>
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
    <!-- Akhir Footer -->


    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- JS Eksternal -->
    <script src="js/script.js"></script>

    <!-- Awal JS Pelaporan  -->
    <script>
        // Dummy data laporan kategori berat dengan detail tambahan
        const laporanBerat = [
            {
                id: 1,
                judul: "Lampu Tangga Lantai 4 Mati",
                tanggal: "2024-10-12",
                lokasi: "Lantai 4",
                deskripsi: "Lampu tangga mati, jadi gelap banget.",
                media: "lampu-tangga.jpg", // Path gambar
                likeCount: 30,
                userVotes: { up: new Set(), down: new Set() }
            },
            {
                id: 2,
                judul: "AC Rusak di Ruang Lab",
                tanggal: "2024-10-10",
                lokasi: "Lab DC 1",
                deskripsi: "AC di ruang lab mengalami kerusakan dan mengeluarkan suara bising.",
                media: "ac-rusak.mp4", // Path video
                likeCount: 15,
                userVotes: { up: new Set(), down: new Set() }
            },
            {
                id: 3,
                judul: "Colokan Lab Tidak Berfungsi",
                tanggal: "2024-10-11",
                lokasi: "Lab AI 2",
                deskripsi: "Colokan belakang lab mati.",
                media: "colokan.jpg", // Path gambar
                likeCount: 14,
                userVotes: { up: new Set(), down: new Set() }
            },
            {
                id: 4,
                judul: "Pencahayaan Ruang Kelas Tidak Berfungsi",
                tanggal: "2024-10-09",
                lokasi: "Ruang 4.11",
                deskripsi: "Lampu di ruang kelas 411 mati dan perlu segera diperbaiki.",
                media: "lampu-mati.jpg", // Path gambar
                likeCount: 30,
                userVotes: { up: new Set(), down: new Set() }
            },
            {
                id: 5,
                judul: "Kerusakan Kursi di Ruang Kelas",
                tanggal: "2024-10-08",
                lokasi: "Ruang 4.01",
                deskripsi: "Kursi di ruang 401 mengalami kerusakan dan perlu diganti.",
                media: "kursi-rusak.jpg", // Path gambar
                likeCount: 14,
                userVotes: { up: new Set(), down: new Set() }
            }
        ];

        // Variabel untuk menyimpan posisi scroll sebelumnya
        let lastScrollTop = 0;

        // Fungsi untuk menampilkan notifikasi
        function showNotification(message) {
            const notification = document.getElementById('notification');
            notification.innerText = message;
            notification.classList.add('show');

            // Menghilangkan notifikasi setelah 5 detik
            setTimeout(() => {
                notification.classList.remove('show');
            }, 5000);
        }

        // Fungsi untuk render laporan dengan limit 10
        function renderLaporan() {
            const postContainer = document.getElementById('postContainer');
            postContainer.innerHTML = ''; // Kosongkan container sebelum mengisi ulang

            laporanBerat
                .sort((a, b) => b.likeCount - a.likeCount) // Urutkan berdasarkan like terbanyak
                .slice(0, 10) // Batasi jumlah laporan maksimal 10
                .forEach(laporan => {
                    const post = document.createElement('div');
                    post.classList.add('post-container');

                    const mediaContent = laporan.media.endsWith('.mp4') ?
                        `<video class="post-image" controls><source src="images/${laporan.media}" type="video/mp4">Your browser does not support video.</video>` :
                        `<img src="images/${laporan.media}" class="post-image" alt="${laporan.judul}">`;

                    post.innerHTML = `
                        <h3>${laporan.judul}</h3>
                        <p><strong>Tanggal:</strong> ${laporan.tanggal}</p>
                        <p><strong>Lokasi:</strong> ${laporan.lokasi}</p>
                        <p><strong>Deskripsi:</strong> ${laporan.deskripsi}</p>
                        ${mediaContent}
                        <div class="vote-container">
                            <button class="vote-btn" onclick="votePost(${laporan.id}, 1)">
                                <i class="fas fa-arrow-up"></i>
                            </button>
                            <span class="vote-count" id="vote-count-${laporan.id}">${laporan.likeCount}</span>
                            <button class="vote-btn" onclick="votePost(${laporan.id}, -1)">
                                <i class="fas fa-arrow-down"></i>
                            </button>
                        </div>
                    `;
                    postContainer.appendChild(post);
                });
        }

        // Fungsi untuk menambah atau mengurangi vote
        function votePost(id, change) {
            const laporan = laporanBerat.find(laporan => laporan.id === id);
            const userId = 1; // Simulasi ID pengguna, ganti dengan ID pengguna yang sebenarnya

            if (change === 1) {
                if (laporan.userVotes.up.has(userId)) {
                    showNotification('Anda sudah memberikan suara untuk upvote pada postingan ini!');
                    return;
                } else if (laporan.userVotes.down.has(userId)) {
                    showNotification('Anda sudah memberikan suara untuk downvote pada postingan ini, suara anda akan diubah menjadi upvote.');
                    laporan.userVotes.down.delete(userId);
                    laporan.likeCount += 1;
                } else {
                    laporan.likeCount += 1;
                    showNotification('Terima kasih! Anda telah memberikan suara upvote.');
                }
                laporan.userVotes.up.add(userId);
            } else if (change === -1) {
                if (laporan.userVotes.down.has(userId)) {
                    showNotification('Anda sudah memberikan suara untuk downvote pada postingan ini!');
                    return;
                } else if (laporan.userVotes.up.has(userId)) {
                    showNotification('Anda sudah memberikan suara untuk upvote pada postingan ini, suara anda akan diubah menjadi downvote.');
                    laporan.userVotes.up.delete(userId);
                    laporan.likeCount -= 1;
                } else {
                    laporan.likeCount -= 1;
                    showNotification('Terima kasih! Anda telah memberikan suara downvote.');
                }
                laporan.userVotes.down.add(userId);
            }

            document.getElementById(`vote-count-${id}`).innerText = laporan.likeCount;

            // Rerender laporan untuk mengurutkan ulang berdasarkan jumlah like
            renderLaporan();
        }

        // Fungsi untuk mendeteksi scroll ke bagian bawah halaman
        function checkScroll() {
            const postContainer = document.getElementById('postContainer');
            const footerNav = document.querySelector('.lapor');
            const currentScroll = window.scrollY;

            // Jika pengguna scroll ke bawah dan mencapai akhir postingan, munculkan fitur "Lapor"
            if (currentScroll > lastScrollTop && window.innerHeight + currentScroll >= postContainer.offsetHeight + postContainer.offsetTop) {
                footerNav.classList.remove('hidden');
                footerNav.classList.add('show');
            } 
            // Jika pengguna scroll ke atas, sembunyikan fitur "Lapor"
            else if (currentScroll < lastScrollTop) {
                footerNav.classList.remove('show');
                footerNav.classList.add('hidden');
            }

            // Update posisi scroll terakhir
            lastScrollTop = currentScroll;
        }

        // Tambahkan event listener pada scroll
        window.addEventListener('scroll', checkScroll);

        // Render laporan saat halaman dimuat
        document.addEventListener('DOMContentLoaded', renderLaporan);
    </script>
    <!-- Akhir JS Pelaporan  -->

</body>
</html>