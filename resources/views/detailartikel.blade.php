@extends('layouts.head')

@section('title', 'Detail Artikel')

@section('konten')

<div class="container py-5">
    @if ($data->status_artikel != 'Menunggu' && $data->status_artikel != 'Disetujui')
        <div class="mb-3">
            <a href="{{ url()->previous() }}" class="btn btn-outline-danger fw-bold me-2">Kembali</a>
            <a href="{{ url('./ubahtulisan/'.$data->id) }}" class="btn btn-info text-white me-2">Ubah Artikel</a>
            <a href="" class="btn btn-success">Submit Artikel</a>
        </div>
    @endif

    <img src="{{ asset('./storage/posts/'.$data->gambar_artikel) }}" class="card mb-3 w-100" alt="...">

    <div class="">
        <h1 class="fw-bold">{{ $data->judul }}</h1>
        <div class="col-12 mb-3">
            <span class="opacity-50">{{ \Carbon\Carbon::parse($data->tgl_artikel)->translatedFormat('l, d F Y') }}</span>
            -
            <span class="">Oleh {{ $data->name }}</span>
        </div>
        <span>{!! $data->isi_artikel !!}</span>
    </div>
</div>

@endsection