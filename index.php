<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmashArena - Booking Lapangan Badminton</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <nav class="navbar">
        <a href="#" class="logo">SmashArena</a>
        <ul class="nav-links">
            <li><a href="#home" class="active">Home</a></li>
            <li><a href="#lapangan">Lapangan</a></li>
            <li id="nav-booking-link" style="display: none;"><a href="#booking-saya">Booking Saya</a></li>
            <li><a href="#kontak">Kontak</a></li>
        </ul>
        <div class="btn-auth" id="auth-buttons-group">
            <button class="btn btn-outline" onclick="openModal('modalDaftar')">Daftar</button>
            <button class="btn btn-white" onclick="openModal('modalMasuk')">Masuk</button>
        </div>
        <div class="user-logged-box" id="user-logged-group" style="display: none;">
            <span id="logged-user-name">Halo, Pemain!</span>
            <button class="btn btn-outline" onclick="handleLogout()">Keluar</button>
        </div>
    </nav>

    <section class="hero-section" id="home">
    <div class="hero-content">
        <h1>Saatnya Smash Bebas<br>Hambatan!</h1>
        <p>SmashArena hadir dengan fasilitas lapangan berkualitas, reservasi instan, tanpa perlu konfirmasi manual yang lama.</p>
        
        <button class="btn-cta" onclick="document.getElementById('lapangan').scrollIntoView({ behavior: 'smooth' });">Cari Lapangan &rsaquo;</button>
    </div>
</section>

    <section class="katalog-section" id="lapangan">
        <div class="section-header">
            <h2>Pilih Lapangan Favoritmu</h2>
            <p>Amankan lapangan di SmashArena dalam hitungan detik. Slot real-time, konfirmasi instan, langsung siap main.</p>
        </div>

        <div class="grid-cards">
            <div class="card">
                <div class="card-img-wrapper">
                    <img src="img/lapangan11.png" alt="Lapangan 01" class="card-img">
                </div>
                <div class="card-content">
                    <div class="card-title-price">
                        <h3>Lapangan 01</h3>
                        <span class="price">Rp 80 rb /Jam</span>
                    </div>
                    <span class="sub-type">Vynil Standard</span>
                    <button class="btn-reservasi" onclick="handleReservasiClick('Lapangan 01', 80000)">Reservasi</button>
                </div>
            </div>

            <div class="card">
                <div class="card-img-wrapper">
                    <img src="img/lapangan22.png" alt="Lapangan 02" class="card-img">
                </div>
                <div class="card-content">
                    <div class="card-title-price">
                        <h3>Lapangan 02</h3>
                        <span class="price">Rp 90 rb /Jam</span>
                    </div>
                    <span class="sub-type">Wooden Classic</span>
                    <ul class="features">
                        <li>Lantai Kayu Parquet Spesial (Menyerap Benturan)</li>
                        <li>Pencahayaan Warm LED Eksklusif</li>
                        <li>Standar Lapangan Turnamen Klasik</li>
                    </ul>
                    <button class="btn-reservasi" onclick="handleReservasiClick('Lapangan 02', 90000)">Reservasi</button>
                </div>
            </div>

            <div class="card">
                <div class="card-img-wrapper">
                    <img src="img/lapangan33.png" alt="Lapangan 03" class="card-img">
                </div>
                <div class="card-content">
                    <div class="card-title-price">
                        <h3>Lapangan 03</h3>
                        <span class="price">Rp 110 rb /Jam</span>
                    </div>
                    <span class="sub-type">Vynil Pro Arena</span>
                    <ul class="features">
                        <li>Karpet Vynil Biru Standar BWF</li>
                        <li>Pencahayaan Sorot LED Anti-Silau</li>
                        <li>Tribun Penonton & Karpet Samping Luas</li>
                    </ul>
                    <button class="btn-reservasi" onclick="handleReservasiClick('Lapangan 03', 110000)">Reservasi</button>
                </div>
            </div>
        </div>

        <div style="text-align: center; margin-top: 2rem;">
            <button class="btn-detail" onclick="toggleDetailLapangan()">Lihat Detail</button>
        </div>
    </section>

    <section class="detail-lapangan-wrapper" id="detail-lapangan" style="display: none;">
        <div class="detail-banner lap1">
            <div class="detail-content">
                <h2>LAPANGAN 01</h2>
                <h3>Vynil Standard</h3>
                <p>Lapangan ideal untuk kamu yang ingin main santai bareng teman atau rutin latihan harian. Menggunakan karpet vinil empuk yang menjaga pijakan tetap stabil dan aman dari risiko terpeleset.</p>
                <strong>List Fasilitas (Poin):</strong>
                <ul>
                    <li>Karpet Vinil Hijau Anti-Slip (Aman untuk pergelangan kaki)</li>
                    <li>Pencahayaan Lampu Gantung Terang & Merata</li>
                    <li>Dilengkapi Kursi Wasit & Area Tunggu Nyaman</li>
                </ul>
                <button class="btn-reservasi-pill" onclick="handleReservasiClick('Lapangan 01', 80000)">Reservasi</button>
            </div>
        </div>

        <div class="detail-banner lap2">
            <div class="detail-content">
                <h2>LAPANGAN 02</h2>
                <h3>Wooden Classic</h3>
                <p>Rasakan pengalaman bertanding layaknya di turnamen klasik. Lantai kayu parquet khusus dirancang untuk menyerap benturan keras pada lutut, memberikan pantulan shuttlecock yang presisi, serta suasana lapangan yang lebih hangat dan elegan.</p>
                <strong>List Fasilitas (Poin):</strong>
                <ul>
                    <li>Lantai Kayu Parquet Spesial (Sistem shock-absorption/penyerap benturan)</li>
                    <li>Pencahayaan Warm LED Eksklusif (Tidak menusuk di mata)</li>
                    <li>Standar Lapangan Turnamen Klasik</li>
                </ul>
                <button class="btn-reservasi-pill" onclick="handleReservasiClick('Lapangan 02', 90000)">Reservasi</button>
            </div>
        </div>

        <div class="detail-banner lap3">
            <div class="detail-content">
                <h2>LAPANGAN 03</h2>
                <h3>Vynil Pro Arena</h3>
                <p>Lapangan paling favorit di SmashArena! Dilengkapi karpet vinil biru standar federasi dunia (BWF) dan lampu sorot anti-silau. Sangat cocok untuk kamu yang ingin merasakan atmosfer pertandingan profesional atau menggelar mini turnamen.</p>
                <strong>List Fasilitas (Poin):</strong>
                <ul>
                    <li>Karpet Vinil Biru Standar BWF (Grip maksimal & empuk)</li>
                    <li>Pencahayaan Sorot LED Anti-Silau (Tatap shuttlecock tinggi tanpa silau)</li>
                    <li>Area Luas & Dilengkapi Tribun Penonton</li>
                </ul>
                <button class="btn-reservasi-pill" onclick="handleReservasiClick('Lapangan 03', 110000)">Reservasi</button>
            </div>
        </div>
    </section>

    <section class="reservasi-page-section" id="reservasi" style="display: none;">
        <div class="section-header white">
            <h2>Reservasi</h2>
            <p>Lengkapi data pemesanan dan lakukan pembayaran untuk mengamankan slot jam yang telah Anda pilih.</p>
        </div>

        <div class="glass-reservasi-card">
            <div class="res-col">
                <label class="res-label">Pilih Lapangan</label>
                <div class="lapangan-options">
                    <div class="lapangan-opt active" id="opt-lap-01" onclick="selectLapangan(this, 'Lapangan 01', 80000)">
                        <div>
                            <strong>Lapangan 01</strong>
                            <p>Vynil Standard . Kursi Wasit . Area Tunggu</p>
                        </div>
                        <span class="opt-price-badge">Rp 80 rb /Jam</span>
                    </div>
                    <div class="lapangan-opt" id="opt-lap-02" onclick="selectLapangan(this, 'Lapangan 02', 90000)">
                        <div>
                            <strong>Lapangan 02</strong>
                            <p>Wooden Classic . LED Eksklusif . Menyerap Benturan</p>
                        </div>
                        <span class="opt-price-badge">Rp 90 rb /Jam</span>
                    </div>
                    <div class="lapangan-opt" id="opt-lap-03" onclick="selectLapangan(this, 'Lapangan 03', 110000)">
                        <div>
                            <strong>Lapangan 03</strong>
                            <p>Vynil Pro Arena . Tribun . Karpet Samping Luas</p>
                        </div>
                        <span class="opt-price-badge">Rp 110 rb /Jam</span>
                    </div>
                </div>
            </div>

            <div class="res-col">
                <label class="res-label">Pilih Tanggal</label>
                <div class="tanggal-grid-pill">
                    <button class="tgl-pill active" onclick="selectTanggal(this, 'Rabu, 30 September 2026', '30')">Rabu 30</button>
                    <button class="tgl-pill" onclick="selectTanggal(this, 'Kamis, 1 Oktober 2026', '1')">Kamis 1</button>
                    <button class="tgl-pill" onclick="selectTanggal(this, 'Jum\'at, 2 Oktober 2026', '2')">Jum'at 2</button>
                    <button class="tgl-pill" onclick="selectTanggal(this, 'Sabtu, 3 Oktober 2026', '3')">Sabtu 3</button>
                    <button class="tgl-pill" onclick="selectTanggal(this, 'Minggu, 4 Oktober 2026', '4')">Minggu 4</button>
                    <button class="tgl-pill" onclick="selectTanggal(this, 'Senin, 5 Oktober 2026', '5')">Senin 5</button>
                    <button class="tgl-pill" onclick="selectTanggal(this, 'Selasa, 6 Oktober 2026', '6')">Selasa 6</button>
                </div>

                <label class="res-label" style="margin-top: 1.5rem;">Pilih Slot Jam</label>
                <div class="select-time-wrapper">
                    <span class="clock-icon"></span>
                    <select id="slotJamSelect" class="styled-select-white">
                        <option value="06:00 - 09:00 (3 Jam)">06:00</option>
                        <option value="09:00 - 12:00 (3 Jam)">09:00</option>
                        <option value="14:00 - 17:00 (3 Jam)">14:00</option>
                        <option value="19:00 - 22:00 (3 Jam)">19:00</option>
                    </select>
                </div>

                <button class="btn-booking-blue" onclick="openRingkasanBooking()">Booking</button>
            </div>
        </div>
    </section>

    <section class="booking-saya-section" id="booking-saya" style="display: none;">
        <div class="section-header white">
            <h2>Booking Saya</h2>
            <p>Masukkan nomor WhatsApp yang kamu pakai saat reservasi untuk melihat daftar booking.</p>
        </div>
        
        <div class="search-booking-bar">
            <input type="text" placeholder="Masukkan Nomor WA" id="inputNoWa">
            <button onclick="cekBookingWA()">Cek Booking</button>
        </div>

        <div class="booking-list-container" id="bookingResultArea"></div>
    </section>

    <section class="contact-section" id="kontak">
        <div class="section-header white">
            <h2>Hubungi Kami</h2>
            <p>Punya pertanyaan seputar reservasi, event, atau kerja sama? Tim SmashArena siap membantu Anda.</p>
        </div>

        <div class="contact-container">
            <div class="contact-info">
                <div class="info-pill"><span class="pill-icon"></span><div><strong>Call Us</strong><p>0821-5555-6666</p></div></div>
                <div class="info-pill"><span class="pill-icon"></span><div><strong>GOR Operating Hours</strong><p>Senin - Minggu: 07.00 - 23.00 WIB</p></div></div>
                <div class="info-pill"><span class="pill-icon"></span><div><strong>Email Us</strong><p>SmashArena@gmail.com</p></div></div>
                <div class="info-pill"><span class="pill-icon"></span><div><strong>Our Location</strong><p>Jl. Pemuda No. 123, Gubeng, Surabaya</p></div></div>
            </div>

            <div class="contact-form-card">
                <div style="text-align: center; margin-bottom: 1.2rem;">
                    <span style="font-size: 0.85rem; font-weight: 700; color: #0b1836;">🏸 SmashArena</span>
                    <h3 style="color: #0b1836;">Kirim Pesan ke Admin</h3>
                </div>
                <form onsubmit="event.preventDefault(); alert('Pesan Anda berhasil dikirim ke Admin!');">
                    <div class="form-group"><label>Nama Lengkap</label><input type="text" placeholder="Masukkan Nama Lengkap" required></div>
                    <div class="form-group"><label>No Telepon</label><input type="text" placeholder="Masukkan No Telepon" required></div>
                    <div class="form-group"><label>Email</label><input type="email" placeholder="Masukkan Alamat Email" required></div>
                    <div class="form-group"><label>Pertanyaan</label><textarea placeholder="Tuliskan Pesan Anda" rows="3" required></textarea></div>
                    <button type="submit" class="btn-submit">Submit</button>
                </form>
            </div>
        </div>
    </section>

    <div class="modal-overlay" id="modalDaftar">
        <div class="modal-card auth-card">
            <span class="close-btn" onclick="closeModal('modalDaftar')">&times;</span>
            <div class="modal-header-brand"><span class="brand-text"> SmashArena</span><h3>Buat Akun Baru</h3></div>
            <form onsubmit="handleAuthSuccess(event, 'modalDaftar', 'modalAkunBerhasil')">
                <div class="form-group"><label>Nama Lengkap</label><input type="text" id="regNama" placeholder="Masukkan Nama Lengkap" required></div>
                <div class="form-group"><label>No. Telepon</label><input type="text" id="regWa" placeholder="Masukkan No Telepon" required></div>
                <div class="form-group"><label>Email</label><input type="email" placeholder="Alamat Email" required></div>
                <div class="form-group"><label>Kata sandi</label><input type="password" placeholder="Masukkan Kata Sandi" required></div>
                <div class="form-group"><label>Konfirmasi kata sandi</label><input type="password" placeholder="Masukkan ulang Kata Sandi" required></div>
                <button type="submit" class="btn-submit">Daftar Akun Sekarang</button>
            </form>
        </div>
    </div>

    <div class="modal-overlay" id="modalAkunBerhasil">
        <div class="modal-card auth-card text-center">
            <div class="brand-text"> SmashArena</div><h3 style="margin-bottom: 1.5rem;">Buat Akun Baru</h3>
            <div class="blue-icon-banner"><div class="circle-check-icon">&#10004;</div><h2>Akun Berhasil Dibuat!</h2></div>
            <p class="modal-desc-text">Selamat datang di SmashArena! Akun Anda telah aktif.</p>
            <button class="btn-submit" onclick="selesaiAuthDanBukaReservasi('modalAkunBerhasil')">Mulai Booking Lapangan</button>
        </div>
    </div>

    <div class="modal-overlay" id="modalMasuk">
        <div class="modal-card auth-card">
            <span class="close-btn" onclick="closeModal('modalMasuk')">&times;</span>
            <div class="modal-header-brand"><span class="brand-text"> SmashArena</span><h3>Masuk</h3></div>
            <form onsubmit="handleAuthSuccess(event, 'modalMasuk', 'modalBerhasilMasuk')">
                <div class="form-group"><label>Email / No. Telepon</label><input type="text" id="loginUser" placeholder="Masukkan Email / No. Telepon" required></div>
                <div class="form-group"><label>Kata Sandi</label><input type="password" placeholder="Masukkan Kata Sandi" required></div>
                <button type="submit" class="btn-submit">Masuk</button>
            </form>
        </div>
    </div>

    <div class="modal-overlay" id="modalBerhasilMasuk">
        <div class="modal-card auth-card text-center">
            <div class="brand-text"> SmashArena</div><h3 style="margin-bottom: 1.5rem;">Masuk</h3>
            <div class="blue-icon-banner"><div class="circle-check-icon">&#10004;</div><h2>Berhasil Masuk!</h2></div>
            <p class="modal-desc-text">Selamat datang kembali! Yuk amankan jadwal lapangan favoritmu!</p>
            <button class="btn-submit" onclick="selesaiAuthDanBukaReservasi('modalBerhasilMasuk')">Mulai Booking Lapangan</button>
        </div>
    </div>

   <div class="modal-overlay" id="modalRingkasan">
        <div class="modal-card booking-modal-card">
            <span class="close-btn" onclick="closeModal('modalRingkasan')">&times;</span>
            <div class="modal-header-brand"><span class="brand-text"> SmashArena</span><h3 style="font-size: 1.2rem; color: #0b1836;">Ringkasan Booking</h3></div>
            <div class="summary-grid">
                <div class="sum-row"><span>Lapangan</span><strong id="sumLapangan">01</strong></div>
                <div class="sum-row"><span>Tanggal</span><strong id="sumTanggal">Rabu, 30 September 2026</strong></div>
                <div class="sum-row"><span>Waktu</span><strong id="sumWaktu">06:00</strong></div>
                <div class="sum-row"><span>Durasi</span><strong id="sumDurasi">3 Jam</strong></div>
            </div>
            <form onsubmit="konfirmasiBooking(event)">
                <div class="form-group-gray"><label>Nama Lengkap</label><input type="text" id="bookingNama" placeholder="Nama Pemesan" required></div>
                <div class="form-group-gray"><label>No Telepon</label><input type="text" id="bookingWa" placeholder="Masukkan Nomor Telepon" required></div>
               
                <label class="pay-label">Pilih Metode Pembayaran</label>
                <div class="payment-options">
                    <label class="pay-option">
                     <img src="img/qris.png" alt="QRIS" class="qris-img-only">
                        <input type="radio" name="payment_method" value="qris" checked>
                    </label>
                    <label class="pay-option">
                        <span class="pay-text">Cash</span>
                        <input type="radio" name="payment_method" value="cash">
                    </label>
                </div>

                <div class="sum-total-row"><span>Total</span><strong id="sumTotal">Rp 240 Rb</strong></div>
                <button type="submit" class="btn-blue-submit-large">Konfirmasi Booking</button>
                <p class="pay-footnote">Bayar di tempat (cash/QRIS) • Batal gratis H-1</p>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>