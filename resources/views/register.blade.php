@extends('layouts.head')

@section('title', 'Daftar Akun')

@section('konten')

<div class="container py-5">
    <div class="w-50 center border rounded px-3 py-3 mx-auto">
        <h1 class="fw-bold">Daftar Akun</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/register" method="POST">
            @csrf
            <div class="mb-3">
                {{-- <label for="name" class="form-label">Nama Lengkap</label> --}}
                <input type="text" value="{{ old('name') }}" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap">
                @error('name')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        Nama lengkap wajib diisi!
                    </div>                
                @enderror
            </div>
            <div class="mb-3">
                {{-- <label for="email" class="form-label">Email</label> --}}
                <input type="email" value="{{ old('email') }}" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Alamat Email">
                @error('email')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        Email wajib diisi!
                    </div>                
                @enderror
            </div>
            <div class="mb-3">
                {{-- <label for="password" class="form-label">Password</label> --}}
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Kata Sandi">
                @error('password')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        Kata Sandi wajib diisi!
                    </div>                
                @enderror
            </div>
            <div class="mb-3">
                {{-- <label for="password_confirmation" class="form-label">Konfirmasi Password</label> --}}
                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Ulangi Kata Sandi">
                @error('password_confirmation')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        Konfirmasi kata sandi wajib diisi!
                    </div>                
                @enderror
            </div>
            <div class="mb-3 d-grid">
                <button name="submit" type="submit" class="btn btn-info text-white rounded-5 fw-bold">Daftar</button>
            </div>
        </form>
        <div class="w-100 text-center">
            <span>Sudah Punya Akun? <a class="text-decoration-none text-info" href="{{ '/login' }}">Masuk</a></span>
        </div>
    </div> 
</div>

@endsection