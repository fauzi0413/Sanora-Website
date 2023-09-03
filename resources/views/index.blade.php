@extends('layouts.head')

@section('title', 'Beranda')

@section('konten')
    <div class="container py-5">
        <div class="px-5">
            <form class="d-flex mb-5" role="search">
                <input class="form-control" type="search" placeholder="Cari" aria-label="Search">
            </form>
        </div>

        <div class="card mb-5 border border-2" style="max-width: 70rem;">
            <div class="row">
                <div class="col-md-4 ms-md-5">
                    <img src="img/grafis.png" class="img-fluid" alt="...">
                </div>
                <div class="col-md-4 offset-md-2 mt-5">
                    <h2 class="ms-2 fw-bold">Gabung Bersama Kami untuk Merayakan Hidup Sehat!</h2>
                    <p class="ms-2">Bersama Kita, Setiap Hari Adalah Kesempatan untuk Meningkatkan Kesehatan</p>
                    <div class="col-12 text-center text-lg-start pt-2 pb-5">
                        <a href="/iklan" class="btn btn-info text-white px-5">Lihat Lainnya</a>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="mb-3 fw-bold">Rekomendasi</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
            @forelse ($artikel as $data)
                <div class="col">
                    <div class="card border border-2">
                    <img src="{{ asset('./storage/posts/'.$data->gambar_artikel) }}" class="card-img-top" alt="{{ $data->judul }}" style="height: 200px">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $data->judul }}</h5>
                        <p class="card-text m-0">{{ $data->cuplikan }}</p>
                        <span><a href="/detailartikel/{{ $data->id }}" class="text-decoration-none">baca selengkapnya...</a></span>
                    </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center w-100">
                    <div class="card border border-2 p-5">
                        <h3 class="">Belum Ada Artikel</h3>
                    </div>
                </div>
            @endforelse
        </div>

        <h2 class="mb-3 fw-bold">Berita Terkini</h2>
        <div class="mb-5">
            <div class="card border border-2 mb-3">
                <div class="row g-0">
                    <div class="col-md-2 ms-md-5">
                        <img src="img/beritaterkini1.png" class="img-fluid" alt="...">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                        <h5 class="card-title fw-bold">Ciri-ciri Hipertensi, Penyakit Darah Tinggi yang Bisa Menyerang Usia Muda</h5>
                        <p class="card-text">Hipertensi atau tekanan darah tinggi hanya bisa terjadi pada orang usia lanjut. Padahal, kondisi ini juga sangat rentan dialami oleh kelompok usia muda...</p>
                        <p class="card-text fw-light">Rabu 23 Agustus 2023 oleh Intan</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card border border-2 mb-3">
                <div class="row g-0">
                    <div class="col-md-2 ms-md-5">
                        <img src="img/beritaterkini1.png" class="img-fluid" alt="...">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                        <h5 class="card-title fw-bold">Ciri-ciri Hipertensi, Penyakit Darah Tinggi yang Bisa Menyerang Usia Muda</h5>
                        <p class="card-text">Hipertensi atau tekanan darah tinggi hanya bisa terjadi pada orang usia lanjut. Padahal, kondisi ini juga sangat rentan dialami oleh kelompok usia muda...</p>
                        <p class="card-text fw-light">Rabu 23 Agustus 2023 oleh Intan</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border border-2 mb-3">
                <div class="row g-0">
                    <div class="col-md-2 ms-md-5">
                        <img src="img/beritaterkini1.png" class="img-fluid" alt="...">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                        <h5 class="card-title fw-bold">Ciri-ciri Hipertensi, Penyakit Darah Tinggi yang Bisa Menyerang Usia Muda</h5>
                        <p class="card-text">Hipertensi atau tekanan darah tinggi hanya bisa terjadi pada orang usia lanjut. Padahal, kondisi ini juga sangat rentan dialami oleh kelompok usia muda...</p>
                        <p class="card-text fw-light">Rabu 23 Agustus 2023 oleh Intan</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
            </ul>
        </nav>
    </div>

@endsection