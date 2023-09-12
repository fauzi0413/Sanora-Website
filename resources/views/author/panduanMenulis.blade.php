@extends('layouts.head')

@section('title', 'Panduan Menulis')

@section('konten')

<div class="container py-5">
    <a href="/karyatulis" class="btn btn-outline-danger fw-bold mb-3">Kembali</a>
    <h4 class="fw-bold">Panduan Menulis</h4>
    <span>Sanora merupakan Platform Media Informasi yang memberikan akses bagi pembaca untuk menulis artikel. Di Platform ini penulis bisa membuat akun, memberikan like, serta bisa menautkan link profile penulis untuk dijadikan portfolio.</span>

    <span>Tema Tulisan yang diunggah mencakup tentang Kesehatan karena sanora berfokus pada promosi kesehatan, sebelum mulai menulis, penulis bisa mendaftarkan akun terlebih dahulu dengan mengisi Nama Lengkap, Email dan Kata Sandi, nantinya tulisan yang diunggah menjadi tanggung jawab pengunggah sepenuhnya.</span>

    <br>
    <br>

    <span>Saran untuk isi dari artikel : </span>
    <ol>
        <li>Pilih Topik Relevan : Tulis artikel yang berkaitan dengan kesehatan, penyakit, gizi, gaya hidup sehat, perkembangan medis, atau isu-isu terkini dalam dunia kesehatan.</li>
        <li>Penelitian Mendalam : Pastikan artikel Anda didukung oleh informasi yang akurat dan terkini. Selalu lakukan penelitian mendalam sebelum menulis.</li>
        <li>Tulisan Menarik : Buatlah judul yang menarik dan deskripsi singkat yang mengundang minat pembaca. Gunakan gaya penulisan yang jelas, ringkas, dan mudah dipahami.</li>
        <li>Sumber Terpercaya : Sertakan sumber yang valid dan terpercaya untuk setiap informasi yang Anda berikan dalam artikel.</li>
        <li>Struktur Artikel yang Jelas : Gunakan paragraf pendek, subjudul, dan poin-poin yang memudahkan pembaca memahami isi artikel.</li>
        <li>Tulis dengan Nilai Tambah : Fokuslah pada memberikan informasi bermanfaat, solusi, tips, atau panduan yang dapat membantu pembaca meningkatkan pemahaman tentang kesehatan mereka.</li>
        <li>Kreatif dan Orisinal : Berikan sudut pandang baru atau pendekatan kreatif terhadap topik yang umum. Buatlah artikel Anda menonjol dari yang lain.</li>
        <li>Tulisan Tidak Bias : Hindari menulis opini pribadi yang tidak didukung oleh fakta atau sumber yang sah. Pastikan artikel Anda tidak memuat hal yang berbau sara, diskriminatif, ataupun kontroversial.</li>
        <li>Tingkatkan Dampak dengan Visual : Sertakan gambar atau ilustrasi yang mendukung isi artikel. Visual dapat membantu memahamkan dan menjadikan artikel lebih menarik.</li>
    </ol>

    <span>Cara Menulis di Sanora : </span>
    <ol>
        <li>Pertama-tama, penulis perlu membuat akun terlebih dahulu.</li>
        <li>Lalu buka gmail dengan email yang sama dengan yang didaftarkan sebelumnya untuk melakukan verifikasi akun, lalu klik tombol verifikasi dan menuju kembali ke website.</li>
        <li>Setelah terverifikasi, lakukan proses login menggunakan akun Sanora yang sudah dibuat sebelumnya.</li>
        <li>Buat konten, penulis bisa memilih menu “Karya Tulis” yang ada di pojok kanan atas, klik dahulu akun pada bagian atas kanan navbar.</li>
        <li>Pilih menu “Karya Tulis” pada navbar, lalu pilih submenu Mulai Menulis.</li>
        <li>Author bisa memulai menulis dengan mengisi judul, gambar dan isi artikel.</li>
        <li>Jika sudah diisi semua, author bisa mengklik "Simpan” apabila artikel ingin disimpan dan masih bisa diedit nantinya.</li>
        <li>Atau author bisa mengklik "Submit” apabila artikel ingin kirim untuk dicek dan divalidasi untuk diterbitkan oleh admin.</li>
    </ol>

    <span>Dalam menulis konten, pengguna perlu memerhatikan beberapa hal agar tulisannya bisa dimuat atau diterbitkan di Sanora. Setidaknya ada tiga hal yang dicek oleh mederator yaitu substansi, penulisan, dan foto. Berikut penjelasannya :</span>
    <ol>
        <li>Penulisan</li>
        <ul>
            <li>Berpedoman pada EYD (Ejaan yang Disempurnakan). Tulis huruf kapital dan pengguna baca yang benar.</li>
            <li>Hindari kesalahan dalam pengetikan isi artikel agar tulisan bisa lulus dimoderasi.</li>
            <li>Lakukan pembacaan kembali pada tulisan untuk meminimalisir kesalahan.</li>
        </ul>
        <li>Ilustrasi</li>
        <ul>
            <li>Unggah foto yang orisinal atau hasil jepretan sendiri.</li>
            <li>Untuk ukuran ilustrasi disarankan untuk menggunakan gambar dengan skala 16:9 agar ilustrasi bisa diterima.</li>
        </ul>
    </ol>

    <div class="col-12 text-center">
        <a href="/menulis" class="btn btn-primary mt-3 fw-bold">Mulai Menulis</a>
    </div>
</div>

@endsection