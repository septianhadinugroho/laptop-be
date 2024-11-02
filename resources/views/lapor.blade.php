<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Judul -->
    <title>Lapor | Laporan Terintegrasi Online Platform</title>

    <!-- Icon Web -->
    <link rel="shortcut icon" href="images/iconlaptop.ico" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- CSS Eksternal -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/lapor.css">
</head>

<body>
    <!-- Notifikasi -->
   <div id="notification" class="notification"></div>
   @if (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                showNotification('{{ session('error') }}', 'error');
            });
        </script>
    @endif
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let errors = '';
                @foreach ($errors->all() as $error)
                    errors += '{{ $error }}\n';
                @endforeach
                showNotification(errors, 'error');
            });
        </script>
    @endif
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                showNotification('{{ session('success') }}', 'success');
            });
        </script>
    @endif
    
    <!-- Awal Lapor -->
    <div class="container">
        <div class="form-container">
            <button class="btn back-btn" onclick="window.history.back()">
                <i class="fas fa-arrow-left"></i>
            </button>
            <div id="notif" class="alert alert-success" role="alert" style="display: none;">
                <span class="checkmark">&#10003;</span> Laporan berhasil dikirim!
            </div>
            <h2>Formulir Laporan</h2>
            <button type="button" class="btn-aturan" data-bs-toggle="modal" data-bs-target="#aturanModal">
                Aturan Pelaporan
            </button>

            <!-- Formulir Laporan -->
            <form id="laporanForm" action="{{ route('lapor.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama_pelapor" class="form-label">Nama Pelapor</label>
                    <input type="text" class="form-control" id="nama_pelapor" value="{{ Auth::user()->name }}" required readonly>
                </div>
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" name="judul" id="judul" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" name="tanggal_laporan" id="tanggal" required>
                </div>
                <div class="mb-3">
                    <label for="jenis" class="form-label">Jenis</label>
                    <select class="form-select" name="jenis_id" id="jenis" required>
                        <option value="" disabled selected>Pilih laporan</option>
                        @foreach ($jenisList as $jenis)
                            <option value="{{ $jenis->id }}" data-kategori="{{ $jenis->kategori->name }}">
                                {{ $jenis->name_jenis }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <input type="text" class="form-control" name="kategori_id" id="kategori" required readonly>
                </div>
                <div class="mb-3">
                    <label for="media" class="form-label">Gambar/Video</label>
                    <input type="file" class="form-control" name="media[]" id="media" accept="image/*,video/*" multiple>
                </div>
                <div class="mb-3">
                    <label for="lokasi" class="form-label">Lokasi</label>
                    <input type="text" class="form-control" name="lokasi" id="lokasi" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" required></textarea>
                </div>
                <button type="submit" hr class="btn btn-lapor w-100">Lapor</button>
            </form>
        </div>
    </div>    
    <!-- Akhir Lapor -->

    <!-- Awal Modal Aturan Pelaporan -->
    <div class="modal fade" id="aturanModal" tabindex="-1" aria-labelledby="aturanModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header justify-content-center"> <!-- Tambahkan justify-content-center -->
                    <h5 class="modal-title" id="aturanModalLabel">Aturan Pelaporan</h5>
                </div>
                <div class="modal-body text-center"> 
                    <p><strong>Pelaporan kategori berat hanya dapat dilaporkan setiap hari Kamis.</strong></p>
                    <p class="text-start"><strong>Kategori berat terdiri dari:</strong></p> 
                    <ol class="text-start">
                        <li>Kabel LAN</li>
                        <li>AC Tidak Dingin</li>
                        <li>Keramik Lantai</li>
                        <li>Pintu Rusak</li>
                        <li>Kursi Rusak</li>
                        <li>Gorden Rusak</li>
                        <li>Colokan Tidak Berfungsi</li>
                        <li>Keran Kamar Mandi Tidak Berfungsi</li>
                        <li>Internet Tidak Lancar</li>
                        <li>Air Wastafel Kamar Mandi Tidak Berfungsi</li>
                        <li>Gantungan Kamar Mandi</li>
                        <li>Refill Galon</li>
                    </ol>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal Aturan Pelaporan -->


    <!-- Awal Ringkasan Laporan -->
    <div class="modal fade" id="laporanModal" tabindex="-1" aria-labelledby="laporanModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="laporanModalLabel">Ringkasan Laporan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Nama Pelapor:</strong> <span id="modalNamaPelapor"></span></p>
                    <p><strong>Judul:</strong> <span id="modalJudul"></span></p>
                    <p><strong>Tanggal:</strong> <span id="modalTanggal"></span></p>
                    <p><strong>Jenis:</strong> <span id="modalJenis"></span></p>
                    <p><strong>Kategori:</strong> <span id="modalKategori"></span></p>
                    <p><strong>Lokasi:</strong> <span id="modalLokasi"></span></p>
                    <p><strong>Deskripsi:</strong> <span id="modalDeskripsi"></span></p>
                    <p><strong>File Media:</strong> <span id="modalMedia"></span></p>
                </div>
                <div class="modal-footer">
                    <a id="downloadLink" class="btn btn-primary" href="#" target="_blank">Download History</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Ringkasan Laporan -->

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- Awal JS Lapor -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const jenisSelect = document.getElementById('jenis');
            const kategoriInput = document.getElementById('kategori');
            const tanggalInput = document.getElementById('tanggal');
            const form = document.getElementById('laporanForm');
            const notif = document.getElementById('notif');
            const checkmark = document.querySelector('.checkmark');
    
            // Fungsi untuk mengatur kategori otomatis berdasarkan pilihan "Jenis"
            jenisSelect.addEventListener('change', function() {
                const selectedOption = jenisSelect.options[jenisSelect.selectedIndex];
                const kategori = selectedOption.getAttribute('data-kategori');
                kategoriInput.value = kategori;
            });
        
            // Fungsi untuk menampilkan hanya kategori Berat pada hari Kamis
            function cekHariKamis() {
                const tanggal = new Date(tanggalInput.value); // Mengambil tanggal yang dipilih
                const dayOfWeek = tanggal.getDay(); // 0 = Minggu, 1 = Senin, dst.
                const options = jenisSelect.options;
        
                for (let i = 0; i < options.length; i++) {
                    if (options[i].getAttribute('data-kategori') === 'Berat') {
                        options[i].style.display = dayOfWeek === 4 ? 'block' : 'none'; // 4 adalah hari Kamis
                    }
                }
            }
        
            // Fungsi untuk menampilkan hanya laporan kategori Ringan pada awalnya
            function tampilkanKategoriRingan() {
                const options = jenisSelect.options;
                for (let i = 0; i < options.length; i++) {
                    if (options[i].getAttribute('data-kategori') === 'Berat') {
                        options[i].style.display = 'none'; // Sembunyikan kategori Berat
                    } else {
                        options[i].style.display = 'block'; // Tampilkan kategori Ringan
                    }
                }
            }
        
            // Memeriksa saat pengguna memilih tanggal
            tanggalInput.addEventListener('change', cekHariKamis);
        
            // Panggil fungsi untuk menampilkan laporan kategori Ringan saat halaman dimuat
            tampilkanKategoriRingan();
    
            // Ubah event listener untuk form
            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Mencegah pengiriman formulir
    
                // Tampilkan notifikasi
                notif.style.display = 'block';
                checkmark.classList.add('show-checkmark');
    
                // Ambil nilai dari formulir
                const judul = document.getElementById('judul').value;
                const tanggal = document.getElementById('tanggal').value;
                const jenis = document.getElementById('jenis').value;
                const kategori = kategoriInput.value;
                const lokasi = document.getElementById('lokasi').value;
                const deskripsi = document.getElementById('deskripsi').value;
                const media = document.getElementById('media').files[0];
                const namaPelapor = document.getElementById('nama_pelapor').value; // Ambil nama pelapor
    
               // Atur modal dengan ringkasan laporan
                document.getElementById('modalJudul').innerText = judul;
                document.getElementById('modalTanggal').innerText = tanggal;
                document.getElementById('modalJenis').innerText = jenis;
                document.getElementById('modalKategori').innerText = kategori;
                document.getElementById('modalLokasi').innerText = lokasi;
                document.getElementById('modalDeskripsi').innerText = deskripsi;
                document.getElementById('modalMedia').innerText = media ? media.name : 'Tidak ada file';
                document.getElementById('modalNamaPelapor').innerText = namaPelapor; // Tambahkan nama pelapor
    
                // Buat tautan untuk mendownload history (hanya contoh)
                document.getElementById('downloadLink').href = 'history.txt'; // Ganti dengan URL file history yang sesuai
    
                // Tampilkan modal
                const laporanModal = new bootstrap.Modal(document.getElementById('laporanModal'));
                laporanModal.show();
    
                // Menyembunyikan notifikasi dan checkmark setelah 2 detik
                setTimeout(function() {
                    notif.style.display = 'none';
                    checkmark.classList.remove('show-checkmark');
                    form.reset(); // Reset formulir
                }, 2000);
            });
        });
    </script>    
    <!-- Akhir JS Lapor -->

</body>
</html>