@extends('layouts.head')

@section('title', 'Draft')

@section('konten')
    
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="container py-5">
    <div class="d-flex justify-content-between mb-3">
        <a href="/karyatulis" class="btn btn-outline-danger fw-bold">Kembali</a>
        <form action="/draft/search" method="get" class="w-50">
            <input class="form-control" style="background-color: rgba(0, 0, 0, 0.1)" type="text" name="cari" value="{{ old('cari') }}"  placeholder="Cari artikel ..." aria-label="Search">
        </form>
    </div>
    <h3 class="fw-bold pb-3">Draft</h3>
    <div class="row">
        @forelse ($draft as $item)
            <div class="col-lg-4 col-12 mb-3">
                <div class="card" style="min-height: 100px">
                    <img src="{{ asset('./storage/posts/'.$item->gambar_artikel) }}" class="card-img-top" style="height: 200px" alt="{{ $item->judul }}">
                    <div class="card-body">
                        <h4 class="card-title fw-bold"><a href="{{ url('./detailartikel/'.$item->id) }}" class="text-decoration-none text-dark">{{ $item->judul }}</a></h4>
                        <p class="card-text">{!! Str::limit($item->isi_artikel, 100) !!}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="card p-5">
                    <h3 class="text-center">Belum ada artikel yang berada didalam draft</h3>
                </div>
            </div>
        @endforelse
    </div>
</div>

@endsection