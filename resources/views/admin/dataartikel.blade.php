@extends('admin.layout')

@section('title', 'Data Artikel')

@section('judul', 'Data Artikel')

@section('konten_admin')

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

    <div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
        <h5 class="col-12 col-lg-6 fw-bold">Data Artikel {{ $status }}</h5>
        <div class="mb-3">
            @if ($status == 'Menunggu')
                <form action="/dataartikel/search" method="get" class="col-8 me-2 w-100">
                    <input class="form-control" type="text" name="cari" value="{{ old('cari') }}"  placeholder="Cari artikel ..." aria-label="Search">
                </form>
            @elseif ($status == 'Disetujui')
                <form action="/dataartikel_menunggu/search" method="get" class="col-8 me-2 w-100">
                    <input class="form-control" type="text" name="cari" value="{{ old('cari') }}"  placeholder="Cari artikel ..." aria-label="Search">
                </form>
            @else
                <form action="/dataartikel_disetujui/search" method="get" class="col-8 me-2 w-100">
                    <input class="form-control" type="text" name="cari" value="{{ old('cari') }}"  placeholder="Cari artikel ..." aria-label="Search">
                </form>
            @endif
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($artikel as $datas)
                    @if($datas->status_artikel == 'Disetujui' || $datas->status_artikel == 'Menunggu' )
                    <tr>
                        <th scope="col" class="text-center">{{ $no++ }}</th>
                        <td scope="col">
                            <a href="/detailartikel_admin/{{ $datas->id }}" type="button" class="fw-bold">{{ $datas->judul }}</a>
                        </td>
                        <td scope="col">
                        @if ($datas->status_artikel == 'Menunggu')
                            <span class="btn btn-warning text-white" style="cursor: default">{{ $datas->status_artikel }}</span>
                        @elseif ($datas->status_artikel == 'Disetujui')
                            <span class="btn btn-success" style="cursor: default">{{ $datas->status_artikel }}</span>
                        @elseif ($datas->status_artikel == 'Ditolak')
                            <span class="btn btn-danger" style="cursor: default">{{ $datas->status_artikel }}</span>
                            <br>
                            <span class="text-danger">*<a type="button" class="text-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Catatan</a></span>
                        @elseif ($datas->status_artikel == 'Disimpan')
                            <span class="">Draft</span>
                        @endif
                        </td>
                        <td scope="col" class="text-center">
                            {{-- <a href=""><span class="text-dark"><i class="fa-regular fa-pen-to-square"></i></span></a> --}}
                            <a href="/hapus_artikel/{{ $datas->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus artikel ini?')"><span class="text-danger ms-lg-0"><i class="fa-regular fa-trash-can"></i></span></a>
                        </td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection