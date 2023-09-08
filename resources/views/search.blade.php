@extends('layouts.head')

@section('title', 'Beranda')

@section('konten')
    <div class="container py-5">
        <div class="px-5">
            <form action="/search" method="get" class="d-flex mb-5">
                <input class="form-control" type="text" name="cari" value="{{ $cari }}" placeholder="Cari artikel ..." aria-label="Search">
            </form>
        </div>

        <h2 class="mb-3">Hasil Pencarian <span class="fw-bold">{{ $cari }}</span></h2>
        <div class="mb-5">

            @forelse ($news as $artikel)
                
            <div class="card border border-2 mb-3">
                <div class="row g-0">
                    <div class="col-md-4 my-auto text-center">
                        <img src="{{ asset('./storage/posts/'.$artikel->gambar_artikel) }}" class="img-fluid" alt="{{ $artikel->judul }}" style="height: 300px">
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