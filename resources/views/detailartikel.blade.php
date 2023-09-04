@extends('layouts.head')

@section('title', 'Detail Artikel')

@section('konten')

<div class="container py-5">
    @foreach ($data as $item)

    @if ($item->status_artikel != 'Menunggu' && $item->status_artikel != 'Disetujui')
        <div class="mb-3 d-flex">
            <a href="{{ url()->previous() }}" class="btn btn-outline-danger fw-bold me-2">Kembali</a>
            <a href="{{ url('./ubahtulisan/'.$item->id) }}" class="btn btn-info text-white me-2">Ubah Artikel</a>
            <form action="/submitartikel/{{ $item->id }}" method="POST">
                @csrf
                <input type="hidden" name="id_artikel" value="{{ $item->id }}">
                <button type="submit" name="submit" class="btn btn-success" onclick="return confirm('Apakah anda yakin ingin mensubmit artikel anda?')">Submit Artikel</button>
            </form>
        </div>
    @elseif ($item->status_artikel == 'Disetujui')
        <div class="mb-3">
            {{-- <a href="/" class="btn btn-outline-danger fw-bold me-2">Kembali</a> --}}
            <a href="{{ url()->previous() }}" class="btn btn-outline-danger fw-bold me-2">Kembali</a>
        </div>
    @endif
    
        
    <div class="col-12 d-flex justify-content-center mb-3">
        <img src="{{ asset('./storage/posts/'.$item->gambar_artikel) }}" class="" alt="Gambar {{ $item->judul }}">
    </div>

    <div class="">
        <h1 class="fw-bold">{{ $item->judul }}</h1>
        <div class="col-12 mb-3">
            <span class="opacity-50">{{ \Carbon\Carbon::parse($item->tgl_artikel)->translatedFormat('l, d F Y') }}</span>
            -
            <span class="">Oleh {{ $item->name }}</span>
        </div>
        <span>{!! $item->isi_artikel !!}</span>
    </div>

    @endforeach
</div>

@endsection