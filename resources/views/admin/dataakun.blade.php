@extends('admin.layout')

@section('title', 'Data Akun')

@section('judul', 'Data Akun')

@section('konten_admin')

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

    <div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
        <div class="d-flex justify-content-between mb-3">
            <h5 class="fw-bold">Data Akun {{ $status }}</h5>
            <a href="/createakun" class="text-decoration-none btn btn-success">Tambah <i class="fa-solid fa-plus"></i></a>
        </div>
        <table class="table table-bordered" style="background-color: red !important">
            <thead>
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $datas)
                    <tr>
                        <th scope="col" class="text-center">{{ $loop->iteration }}</th>
                        <td scope="col">
                            <a type="button" class="fw-bold text-decoration-none" data-bs-toggle="modal" data-bs-target="#detailAkun{{ $datas->id }}">{{ $datas->name }}</a>
                        </td>
                        <td scope="col">{{ $datas->email }}</td>
                        <td scope="col" class="text-center">
                            <a href="/editakun/{{ $datas->id }}"><span class="text-dark"><i class="fa-regular fa-pen-to-square"></i></span></a>
                            <a href="/hapusakun/{{ $datas->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="text-danger ms-lg-3"><i class="fa-regular fa-trash-can"></i></span></a>
                        </td>
                    </tr>
                    
                    <!-- Modal Catatan -->
                    <div class="modal fade" id="detailAkun{{ $datas->id }}" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Profile Akun Author</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center mb-5">
                                        @if ( empty($datas->profile) )
                                            <h1><i class="fa-regular fa-user bg-white shadow-sm rounded-circle p-5"></i></h1>
                                        @else
                                            <img src="{{ asset('./storage/profile/'. $datas->profile ) }}" alt="Profil {{ $datas->name }}" style="width: 150px; height: 150px; background-size: cover" class="rounded-circle shadow my-5">
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-5 col-md-4 label fw-bold mb-3">Nama Lengkap</div>
                                        <div class="col-6">{{ $datas->name }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5 col-md-4 label fw-bold mb-3">Email</div>
                                        <div class="col-6">{{ $datas->email }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Batas Modal --}}

                @endforeach
            </tbody>
        </table>
    </div>
@endsection