@extends('layouts.head')

@section('title', 'Info Akun')

@section('konten')

<div style="min-height: 70vh">
    <div class="jumbotron bg-info">
        <div class="container text-center">
            <div class="row align-items-center">
                <div class="col-md-4 my-5">
                    @if ( empty(Auth::user()->profile) )
                        <h1 class=""><i class="fa-regular fa-user bg-white shadow rounded-circle p-5"></i></h1>
                    @else
                        <img src="{{ asset('./storage/profile/'. Auth::user()->profile ) }}" alt="Profil {{ Auth::user()->name }}" style="width: 150px; height: 150px; background-size: cover" class="rounded-circle shadow my-5">
                    @endif
                </div>
                <div class="col-md-8 text-lg-start text-center pb-5 text-white">
                    <h1 class="fw-bold">{{ Auth::user()->name }}</h1>
                    <span>Publish {{ $publish }} artikel</span>
                    <br>
                    <span>{{ $jumlah_artikel }} kali tayang</span>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            @forelse ($artikel as $artikels)
                <div class="col-md-6 mb-4">
                    <div class="card border border-2 p-5" style="width: 100%;">
                        <div class="row align-items-start">
                            <div class="col-md-4 text-center d-flex justify-content-center">
                                <img src="{{ asset('./storage/posts/'.$artikels->gambar_artikel) }}" class="img-fluid mt-3" alt="Gambar {{ $artikels->judul }}" style="height: 150px;">
                            </div>
                            <div class="col-md-8">
                                <h2 class="ms-2 mt-3">{{ $artikels->judul }}</h2>
                                <p class="ms-2 card-text fw-light mt-2">{{ \Carbon\Carbon::parse($artikels->tgl_artikel)->translatedFormat('l, d F Y') }} - {{ $artikels->tayangan }} tayang</p>
                                <p class="ms-2">{!! Str::limit($artikels->isi_artikel, 200) !!}</p>
                                <a class="text-decoration-none" href="/detailartikel/{{ $artikels->id }}">baca selengkapnya...</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="card mb-3 border-1 p-5">
                        <h3 class="text-center">Belum ada artikel yang disetujui</h3>
                    </div>
                </div>
            @endforelse
            
        </div>
    </div>
</div>


@endsection