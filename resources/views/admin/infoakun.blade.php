@extends('admin.layout')

@section('title', 'Info Akun')

@section('judul', 'Info Akun')

@section('konten_admin')

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

    <div class="card bg-white border-0 shadow p-5" style="min-height: 70vh">
        <div class="col-12 text-center mb-3">
            @if ( empty(Auth::user()->profile) )
                <h1 class=""><i class="fa-regular fa-user bg-white shadow opacity-75 rounded-circle p-5"></i></h1>
            @else
                <img src="{{ asset('./storage/profile/'. Auth::user()->profile ) }}" alt="Profil {{ Auth::user()->name }}" style="width: 300px; height: 300px; background-size: cover" class="rounded-circle shadow mb-2">
            @endif
        </div>

        <form action="/editpengaturan_admin" method="POST" enctype="multipart/form-data">
            @csrf
            @method("put")
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Nama Lengkap</label>
                <input type="text" value="{{ Auth::user()->name }}" name="name" class="form-control @error('name') is-invalid @enderror" readonly>
                @error('name')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>                
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email</label>
                <input type="email" value="{{ Auth::user()->email }}" name="email" class="form-control" readonly>
            </div>
            <div class="mb-3">
                <a href="/pengaturan-admin" class="btn btn-info text-white">Pengaturan Akun</a>
            </div>
        </form>
    </div>
@endsection