@extends('layouts.head')

@section('title', 'Panduan Menulis')

@section('konten')

<div class="container py-5">
    <a href="/karyatulis" class="btn btn-outline-danger fw-bold mb-3">Kembali</a>
    <h4 class="fw-bold">Panduan Menulis</h4>
    <ol>
        <li>Pilih Topik Relevan: Tulis artikel yang berkaitan dengan kesehatan, penyakit, gizi, gaya hidup sehat, perkembangan medis, atau isu-isu terkini dalam dunia kesehatan.</li>
        <li>Penelitian Mendalam: Pastikan artikel Anda didukung oleh informasi yang akurat dan terkini. Selalu lakukan penelitian mendalam sebelum menulis.</li>
        <li>Tulisan Menarik: Buatlah judul yang menarik dan deskripsi singkat yang mengundang minat pembaca. Gunakan gaya penulisan yang jelas, ringkas, dan mudah dipahami.</li>
        <li>Sumber Terpercaya: Sertakan sumber yang valid dan terpercaya untuk setiap informasi yang Anda berikan dalam artikel.</li>
        <li>Struktur Artikel yang Jelas: Gunakan paragraf pendek, subjudul, dan poin-poin yang memudahkan pembaca memahami isi artikel.</li>
        <li>Tulis dengan Nilai Tambah: Fokuslah pada memberikan informasi bermanfaat, solusi, tips, atau panduan yang dapat membantu pembaca meningkatkan pemahaman tentang kesehatan mereka.</li>
        <li>Kreatif dan Orisinal: Berikan sudut pandang baru atau pendekatan kreatif terhadap topik yang umum. Buatlah artikel Anda menonjol dari yang lain.</li>
        <li>Tulisan Tidak Bias: Hindari menulis opini pribadi yang tidak didukung oleh fakta atau sumber yang sah. Pastikan artikel Anda tidak diskriminatif atau kontroversial.</li>
        <li>Tingkatkan Dampak dengan Visual: Sertakan gambar atau ilustrasi yang mendukung isi artikel. Visual dapat membantu memahamkan dan menjadikan artikel lebih menarik.</li>
    </ol>

    <span>Sistem Pemberian Poin : </span>
    <ol>
        <li>Pendaftaran dan Verifikasi: Memungkinkan pengguna mendaftar sebagai kontributor dengan mengisi informasi pribadi dan verifikasi identitas.</li>
        <li>Penilaian dan Review: Tim editorial akan menilai setiap artikel yang diajukan. Poin diberikan berdasarkan kualitas, keaslian, dan relevansi artikel.</li>
        <li>Poin yang Dapat Ditukar: Setiap artikel yang disetujui akan mendapatkan poin tertentu. Pengguna dapat mengumpulkan poin dari artikel yang diterbitkan.</li>
        <li>Konversi Poin ke Uang: Tentukan rasio konversi poin ke mata uang (misalnya, 100 poin = $1). Pengguna dapat menukarkan poin mereka dengan uang atau hadiah lainnya.</li>
        <li>Transparansi dan Pelacakan Poin: Sediakan panel pengguna yang memungkinkan kontributor melacak jumlah poin yang mereka miliki dan riwayat poin yang diperoleh.</li>
    </ol>

    <span>Feedback dan Peringatan : </span>
    <ol>
        <li>Pendekatan Konstruktif: Berikan umpan balik yang konstruktif kepada kontributor, baik itu dalam bentuk persetujuan artikel, perbaikan, atau penolakan.</li>
        <li>Pentingnya Kualitas: Tekankan bahwa kualitas artikel lebih diutamakan daripada jumlah. Artikel yang informatif dan berkualitas tinggi akan mendapatkan poin lebih banyak.</li>
        <li>Peringatan Pelanggaran Etika: Jelaskan dengan jelas bahwa melanggar etika, menyebarkan informasi palsu, atau menjiplak akan mengakibatkan penalti atau penangguhan.</li>
    </ol>

    <span>Pastikan untuk memiliki kebijakan dan aturan yang jelas mengenai pemberian poin, serta berkomunikasi secara transparan dengan kontributor mengenai bagaimana sistem ini berjalan.</span>
</div>

@endsection