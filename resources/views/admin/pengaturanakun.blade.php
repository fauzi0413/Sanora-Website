@extends('admin.layout')

@section('title', 'Pengaturan Akun')

@section('judul', 'Pengaturan Akun')

@section('konten_admin')

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="">
    <div class="card bg-white border-0 shadow p-5">
        <div class="col-12 text-center">
            @if ( empty(Auth::user()->profile) )
                <h1 class=""><i class="fa-regular fa-user bg-white shadow opacity-75 rounded-circle p-5"></i></h1>
            @else
                <img src="{{ asset('./storage/profile/'. Auth::user()->profile ) }}" alt="Profil {{ Auth::user()->name }}" style="width: 300px; height: 300px; background-size: cover" class="rounded-circle shadow mb-2">
            @endif
            <br>
            <button type="button" class="btn btn-sm btn-info text-white fw-bold" data-bs-toggle="modal" data-bs-target="#modalprofile">Edit Profil</button>
        </div>

        <form action="/editpengaturan_admin" method="POST" enctype="multipart/form-data">
            @csrf
            @method("put")
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Nama Lengkap</label>
                <input type="text" value="{{ Auth::user()->name }}" name="name" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>                
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email</label>
                <input type="email" value="{{ Auth::user()->email }}" name="email" class="form-control" disabled style="cursor: not-allowed">
            </div>
            <div class="mb-3">
                <button name="submit" type="submit" class="btn btn-info text-white" onclick="return confirm('Apakah anda yakin ingin mengubah data tersebut?')">Simpan Perubahan</button>
                <a href="/pengaturan-katasandi-admin" class="text-decoration-none text-info ms-3">Ubah Kata Sandi</a>
            </div>
        </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalprofile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Edit Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/editprofile" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("put")
                        <div class="mb-3">
                            <label for="profile" class="form-label">Masukkan Foto</label>
                            <input type="file" name="profile" class="form-control">
                        </div>
                        <button type="submit" name="simpan" class="btn btn-info text-white">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection