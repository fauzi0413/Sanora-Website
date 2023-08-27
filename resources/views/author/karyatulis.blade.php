@extends('layouts.head')

@section('title', 'Karya Tulis')

@section('konten')

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="container py-5">
    <div class="row">
        <div class="col-4">
            <div class="text-center">
                <span class="text-info">Author</span>
                <br>
                <span>{{ Auth::user()->name }}</span>
                <br>
                <a href="" class="btn btn-outline-info">Lihat Akun</a>
            </div>
            <div class="">
                <ul class="list-unstyled">
                    <li><a href="{{ '/panduan-menulis' }}" class="text-decoration-none">Panduan Menulis</a></li>
                    <li><a href="{{ '/menulis' }}" class="text-decoration-none">Mulai Menulis</a></li>
                    <li><a href="{{ '/draft' }}" class="text-decoration-none">Draft</a></li>
                    <li><a href="{{ '/status' }}" class="text-decoration-none">Status</a></li>
                    <li><a href="{{ '/pointku' }}" class="text-decoration-none">Poinku</a></li>
                </ul>
            </div>
        </div>
        <div class="col-8">
            @foreach ($artikel as $post)
                <div class="card mb-3 border-1 p-3">
                    <div class=""><h3 class="fw-bold m-0">{{ $post->judul }}</h3></div>
                    <div class=""><span class="opacity-50">{{ \Carbon\Carbon::parse($post->tgl_artikel)->translatedFormat('l, d F Y') }} - 200 Kali Tayang</span></div>
                    <div class=""><h5>{{ $post->cuplikan }}</h5></div>
                    <a href="" class="text-decoration-none">baca selengkapnya...</a>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection