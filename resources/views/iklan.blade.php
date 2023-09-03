@extends('layouts.head')

@section('title', 'Iklan Layanan Masyarakat')

@section('konten')
  
  <div class="container py-5">
    <a href="/" class="btn btn-outline-danger mb-2">Kembali</a>

    <h2 class="fw-bold">Iklan Layanan Masyarakat</h2>

    <div class="card mt-4 border border-2" style="max-width: 70rem;">
      <div class="row">
        <div class="col-md-4 ms-md-5">
          <img src="img/iklan1.png" class="img-fluid mt-5" alt="...">
        </div>
        <div class="col-md-4 offset-md-2 mt-5">
          <h2 class="ms-2">Rajinlah Cuci Tangan, Hindari Penyebaran Penyakit!</h2>
          <p class="ms-2 mb-5">Dengan mencuci tangan secara teratur, Anda dapat melindungi diri dan orang di sekitar Anda dari virus dan bakteri berbahaya. Cuci tangan adalah langkah sederhana untuk menjaga kesehatan.</p>
        </div>
      </div>
    </div>

    <div class="card mt-4 border border-2" style="max-width: 70rem;">
      <div class="row">
        <div class="col-md-4 offset-md-2 mt-5">
          <h2 class="ms-2">GImunisasi: Cintai Anak Anda dengan Melindungi Mereka!</h2>
          <p class="ms-2">Jadwalkan imunisasi rutin untuk anak-anak Anda. Ini adalah cara efektif untuk mencegah penyakit berbahaya dan melindungi generasi masa depan.</p>
        </div>
        <div class="col-md-4 ms-md-5">
          <img src="img/iklan2.png" class="img-fluid mt-3 mb-3" alt="...">
        </div>
      </div>
    </div>

    <div class="card mt-4 border border-2" style="max-width: 70rem;">
      <div class="row">
        <div class="col-md-4 ms-md-5">
          <img src="img/iklan3.png" class="img-fluid" alt="...">
        </div>
        <div class="col-md-4 offset-md-2 mt-5">
          <h2 class="ms-2">Pentingnya Aktivitas Fisik: Bergeraklah untuk Kesehatan yang Lebih Baik!</h2>
          <p class="ms-2">Tetap aktif dengan berolahraga secara teratur. Aktivitas fisik membantu menjaga berat badan ideal dan mengurangi risiko penyakit jantung serta diabetes.</p>
        </div>
      </div>
    </div>

    <div class="card mt-4 border border-2 mb-4" style="max-width: 70rem;">
      <div class="row">
        <div class="col-md-4 offset-md-2 mt-5">
          <h2 class="ms-2">Sayangi Paru-paru Anda dengan Stop Merokok!</h2>
          <p class="ms-2">Berhenti merokok adalah langkah terbaik untuk meningkatkan kesehatan paru-paru dan mengurangi risiko kanker serta penyakit pernapasan lainnya.</p>
        </div>
        <div class="col-md-4 ms-md-5">
          <img src="img/iklan4.png" class="img-fluid mt-3 mb-3" alt="...">
        </div>
      </div>
    </div>
  </div>
  
@endsection