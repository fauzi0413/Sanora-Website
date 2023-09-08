@extends('admin.layout')

@section('title', 'Detail Artikel')

@section('judul', 'Detail Artikel')

@section('konten_admin')

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

    @foreach ($data as $datas)
        <div class="mb-3 d-flex">
            @if ($datas->status_artikel == 'Menunggu')
                <a href="/dataartikel_menunggu" class="btn btn-sm btn-outline-danger fw-bold me-2">Kembali</a>
            @else
                <a href="/dataartikel_disetujui" class="btn btn-sm btn-outline-danger fw-bold me-2">Kembali</a>
            @endif
            @if($datas->status_artikel == 'Menunggu')
                <button type="button" class="btn btn-sm btn-info text-white me-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Berikan Catatan Artikel
                </button>              
                {{-- <a href="" class="btn btn-sm btn-info text-white me-2">Berikan Catatan Artikel</a> --}}
                <form action="/submitartikel_admin/{{ $datas->id }}" method="POST">
                    @csrf
                    <button type="submit" name="submit" class="btn btn-sm btn-success" onclick="return confirm('Apakah anda yakin ingin publish artikel tersebut?')">Publish Artikel</button>
                </form>
            @endif
        </div>

        <div class="col-12 d-flex justify-content-center mb-3">
            <img src="{{ asset('./storage/posts/'.$datas->gambar_artikel) }}" class="" alt="Gambar {{ $datas->judul }}">
        </div>
        <div class="">
            <h1 class="fw-bold">{{ $datas->judul }}</h1>
            <div class="col-12 mb-3">
                <span class="opacity-50">{{ \Carbon\Carbon::parse($datas->tgl_artikel)->translatedFormat('l, d F Y') }}</span>
                -
                <span class="">Oleh {{ $datas->name }}</span>
            </div>
            <span>{!! $datas->isi_artikel !!}</span>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Catatan Artikel</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/kirimcatatan/{{ $datas->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            {{-- <label for="catatan" class="form-label fw-bold">Masukkan Catatan</label> --}}
                            <textarea name="catatan" id="catatan" cols="30" rows="10" class="form-control" placeholder="Masukkan catatan artikel">{{ $datas->catatan }}</textarea>
                        </div>
                        <div class="text-end">
                            <button type="submit" name="submit" value="simpan" class="btn btn-outline-info">Simpan Catatan</button>
                            <button type="submit" name="submit" value="submit" class="btn btn-info text-white" onclick="return confirm('Apakah anda yakin ingin memberikan catatan tersebut?')">Berikan Catatan Artikel</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>

    @endforeach
@endsection