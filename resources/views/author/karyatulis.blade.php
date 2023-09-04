@extends('layouts.head')

@section('title', 'Karya Tulis')

@section('konten')

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="container py-5" style="min-height: 70vh">
    <div class="row">
        <div class="col-4">
            <div class="card border border-2 p-2 py-5" style="width: 100%;">
                <div class="text-center">
                    @if ( empty(Auth::user()->profile) )
                        <h1 class=""><i class="fa-regular fa-user bg-white shadow opacity-75 rounded-circle p-5"></i></h1>
                    @else
                        <img src="{{ asset('./storage/profile/'. Auth::user()->profile ) }}" alt="Profil {{ Auth::user()->name }}" style="width: 200px; height: 200px; background-size: cover" class="rounded-circle shadow mb-2">
                    @endif

                    <div class="">
                        <h6 class="text-info fw-bold">Author</h6>
                        <h5 class="fw-normal">{{ Auth::user()->name }}</h5>
                        <a href="/infoakun" class="btn btn-outline-info">Lihat Akun</a>
                        <div class="mt-3">
                            <ul class="list-group">
                                <li class="list-group-item text-start"><a href="{{ '/panduan-menulis' }}" class="text-decoration-none text-dark">Panduan Menulis</a></li>
                                <li class="list-group-item text-start"><a href="{{ '/menulis' }}" class="text-decoration-none text-dark">Mulai Menulis</a></li>
                                <li class="list-group-item text-start"><a href="{{ '/draft' }}" class="text-decoration-none text-dark">Draft</a></li>
                                <li class="list-group-item text-start"><a href="{{ '/status' }}" class="text-decoration-none text-dark">Status</a></li>
                                <li class="list-group-item text-start"><a href="{{ '/pointku' }}" class="text-decoration-none text-dark">Poinku</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-8">
            @forelse ($artikel as $post)
                <div class="card mb-3 border-1 p-3">
                    <div class=""><h3 class="fw-bold m-0">{{ $post->judul }}</h3></div>
                    <div class=""><span class="opacity-50">{{ \Carbon\Carbon::parse($post->tgl_artikel)->translatedFormat('l, d F Y') }} - {{ $post->tayangan }} Kali Tayang</span></div>
                    <div class=""><h5>{{ $post->cuplikan }}</h5></div>
                    <a href="/detailartikel/{{ $post->id }}" class="text-decoration-none">baca selengkapnya...</a>
                </div>
            @empty
                <div class="card mb-3 border-1 p-5">
                    <h3 class="text-center">Belum ada artikel yang disetujui</h3>
                </div>
            @endforelse
        </div>
    </div>
</div>

@endsection