@extends('layouts.head')

@section('title', 'Beranda')

@section('konten')
    <div class="container py-5">
        <div class="">
            <form action="/search" method="get" class="d-flex mb-4">
                <input class="form-control" type="text" name="cari" value="{{ old('cari') }}"  placeholder="Cari artikel ..." aria-label="Search">
                <button type="submit" class="btn btn-info text-white">Cari</button>
            </form>
        </div>

        <div id="carouselExampleAutoplaying" class="carousel slide mb-4" data-bs-ride="carousel">
            <div class="d-none d-lg-block">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
            </div>
            
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/BANNER1.png') }}" class="d-block w-100 rounded-2" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/BANNER2.png') }}" class="d-block w-100 rounded-2" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/BANNER3.png') }}" class="d-block w-100 rounded-2" alt="...">
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
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
            @forelse ($recomendation as $data)
                <div class="col">
                    <div class="card border border-2">
                    <img src="{{ asset('./storage/posts/'.$data->gambar_artikel) }}" class="card-img-top" alt="{{ $data->judul }}" style="height: 200px">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $data->judul }}</h5>
                        <p class="card-text m-0">{!! Str::limit($data->isi_artikel, 200) !!}</p>
                        <span><a href="/artikel/{{ $data->id }}" class="text-decoration-none">baca selengkapnya...</a></span>
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

            @forelse ($news as $artikel)
                
            <div class="card border border-2 mb-3">
                <div class="row g-0">
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('./storage/posts/'.$artikel->gambar_artikel) }}" class="img-fluid" alt="{{ $artikel->judul }}">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $artikel->judul }}</h5>
                            <p class="card-text fw-light opacity-50">{{ \Carbon\Carbon::parse($artikel->tgl_artikel)->translatedFormat('l, d F Y') }} Oleh {{ $artikel->name }}</p>
                            <p class="card-text">{!! Str::limit($artikel->isi_artikel, 500) !!}</p>
                            <br>
                            <span><a href="/artikel/{{ $artikel->id }}" class="text-decoration-none">baca selengkapnya...</a></span>
                        </div>
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
        <div class="col-12 text-center">
            <span class="">{{ $news->links() }}</span>
        </div>
    </div>

@endsection