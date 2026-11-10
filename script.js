let isUserLoggedIn = false;
let currentUserNama = "";
let currentUserWa = "";

let selectedLapanganNama = "01";
let selectedHargaPerJam = 80000;
let selectedTanggal = "Rabu, 30 September 2026";
let selectedTanggalHari = "30";
let selectedSlotWaktu = "06:00";

let daftarBooking = [];

function openModal(id) {
    document.getElementById(id).style.display = "flex";
}

function closeModal(id) {
    document.getElementById(id).style.display = "none";
}

function toggleDetailLapangan() {
    let section = document.getElementById('detail-lapangan');
    if (section.style.display === 'none' || section.style.display === '') {
        section.style.display = 'flex';
        section.scrollIntoView({ behavior: 'smooth' });
    } else {
        section.style.display = 'none';
    }
}

function handleReservasiClick(lapanganNama, harga) {
    if (!lapanganNama && !harga) {
        document.getElementById('lapangan').scrollIntoView({ behavior: 'smooth' });
        return;
    }

    if (lapanganNama && harga) {
        let num = lapanganNama.replace('Lapangan ', '');
        let targetOpt = document.getElementById(`opt-lap-${num}`);
        if (targetOpt) {
            selectLapangan(targetOpt, lapanganNama, harga);
        }
    }

    if (!isUserLoggedIn) {
        alert("Silakan Masuk (Login) atau Buat Akun terlebih dahulu untuk melakukan reservasi lapangan.");
        openModal('modalMasuk');
    } else {
        document.getElementById('reservasi').style.display = 'block';
        document.getElementById('reservasi').scrollIntoView({ behavior: 'smooth' });
    }
}

function handleAuthSuccess(event, modalLama, modalBaru) {
    event.preventDefault();
    
    if (modalLama === 'modalDaftar') {
        currentUserNama = document.getElementById('regNama').value;
        currentUserWa = document.getElementById('regWa').value;
    } else {
        let inputVal = document.getElementById('loginUser').value;
        currentUserNama = inputVal.includes('@') ? inputVal.split('@')[0] : inputVal;
        currentUserWa = "0821-5555-6666";
    }

    isUserLoggedIn = true;
    closeModal(modalLama);
    openModal(modalBaru);
}

function selesaiAuthDanBukaReservasi(modalId) {
    closeModal(modalId);
 
    document.getElementById('auth-buttons-group').style.display = 'none';
    document.getElementById('user-logged-group').style.display = 'flex';
    document.getElementById('logged-user-name').innerText = `Halo, ${currentUserNama}!`;

    document.getElementById('reservasi').style.display = 'block';
    
    if (currentUserNama) document.getElementById('bookingNama').value = currentUserNama;
    if (currentUserWa) document.getElementById('bookingWa').value = currentUserWa;

    document.getElementById('reservasi').scrollIntoView({ behavior: 'smooth' });
}

function handleLogout() {
    isUserLoggedIn = false;
    currentUserNama = "";
    currentUserWa = "";
    
    document.getElementById('user-logged-group').style.display = 'none';
    document.getElementById('auth-buttons-group').style.display = 'flex';
    document.getElementById('reservasi').style.display = 'none';
    document.getElementById('booking-saya').style.display = 'none';
    document.getElementById('nav-booking-link').style.display = 'none';
    
    alert("Anda telah keluar dari akun.");
}

function selectLapangan(element, nama, harga) {
    document.querySelectorAll('.lapangan-opt').forEach(opt => opt.classList.remove('active'));
    element.classList.add('active');
    selectedLapanganNama = nama.replace('Lapangan ', '');
    selectedHargaPerJam = harga;
}

function selectTanggal(element, tanggal, angkaHari) {
    document.querySelectorAll('.tgl-pill').forEach(btn => btn.classList.remove('active'));
    element.classList.add('active');
    selectedTanggal = tanggal;
    selectedTanggalHari = angkaHari;
}

function openRingkasanBooking() {
    let slotVal = document.getElementById('slotJamSelect').value;
    selectedSlotWaktu = slotVal.split(' ')[0];
    let durasiJam = 3; 
    let totalRupiah = selectedHargaPerJam * durasiJam;

    document.getElementById('sumLapangan').innerText = selectedLapanganNama;
    document.getElementById('sumTanggal').innerText = selectedTanggal;
    document.getElementById('sumWaktu').innerText = selectedSlotWaktu;
    document.getElementById('sumTotal').innerText = `Rp ${totalRupiah / 1000} Rb`;

    openModal('modalRingkasan');
}

function konfirmasiBooking(event) {
    event.preventDefault();
    let nama = document.getElementById('bookingNama').value;
    let wa = document.getElementById('bookingWa').value;
    let totalRupiah = selectedHargaPerJam * 3;

    closeModal('modalRingkasan');

    let dataBaru = {
        hari: selectedTanggalHari,
        lapangan: selectedLapanganNama,
        waktu: selectedSlotWaktu,
        tanggal: selectedTanggal,
        total: totalRupiah / 1000,
        wa: wa
    };
    daftarBooking.push(dataBaru);

    document.getElementById('nav-booking-link').style.display = 'inline-block';
    document.getElementById('booking-saya').style.display = 'block';

    tampilkanBookingItem(dataBaru);
    document.getElementById('inputNoWa').value = wa;

    alert(`Pembayaran Berhasil!\n\nReservasi Lapangan ${selectedLapanganNama} telah terkonfirmasi.`);
    document.getElementById('booking-saya').scrollIntoView({ behavior: 'smooth' });
}

function tampilkanBookingItem(item) {
    let container = document.getElementById('bookingResultArea');
    
    let htmlCard = `
        <div class="booking-card-item">
            <div class="date-box-square">${item.hari}</div>
            <div class="booking-info">
                <h4>Lapangan ${item.lapangan} – ${item.waktu} – 09:00</h4>
                <p>${item.tanggal} 3 jam Rp ${item.total} Rb</p>
            </div>
            <span class="badge-terkonfirmasi">Terkonfirmasi</span>
        </div>
    `;
    
    container.innerHTML = htmlCard + container.innerHTML;
}

function cekBookingWA() {
    let wa = document.getElementById('inputNoWa').value.trim();
    let container = document.getElementById('bookingResultArea');
    
    if (!wa) {
        alert("Silakan masukkan nomor WhatsApp!");
        return;
    }

    let hasil = daftarBooking.filter(b => b.wa === wa);

    if (hasil.length === 0) {
        container.innerHTML = `<p style="color: #a3c7f7; margin-top: 1rem;">Tidak ditemukan data booking terkonfirmasi untuk WA: <strong>${wa}</strong></p>`;
    } else {
        container.innerHTML = "";
        hasil.forEach(item => tampilkanBookingItem(item));
    }
}