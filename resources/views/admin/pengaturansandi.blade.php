@extends('admin.layout')

@section('title', 'Pengaturan Kata Sandi')

@section('judul', 'Pengaturan Kata Sandi')

@section('konten_admin')


@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="">
    <div class="card bg-white border-0 shadow p-5">
        <form action="/editpassword_admin" method="POST" enctype="multipart/form-data">
            @csrf
            @method("put")
            <div class="mb-3">
                <label for="current_password" class="form-label fw-bold">Kata Sandi</label>
                <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" placeholder="Kata Sandi Anda">
                @error('current_password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label fw-bold">Kata Sandi Baru</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Kata Sandi Baru">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label fw-bold">Konfirmasi Kata Sandi Baru</label>
                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Ulangi Kata Sandi Baru">
                @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <button name="submit" type="submit" class="btn btn-info text-white" onclick="return confirm('Apakah anda yakin ingin mengubah data tersebut?')">Simpan Perubahan</button>
                <a href="/pengaturan-admin" class="text-decoration-none text-info ms-3">Ubah Profil</a>
            </div>
        </form>
    </div>
</div>

@endsection