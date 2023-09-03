@extends('layouts.head')

@section('title', 'Masuk')

@section('konten')

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    <div class="container py-5" style="min-height: 70vh">
        <div class="w-50 center border rounded px-3 py-3 mx-auto">
            <h1 class="fw-bold">Masuk</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    {{-- <label for="email" class="form-label">Email</label> --}}
                    <input type="email" value="{{ old('email') }}" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
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
                        Kata sandi wajib diisi!
                    </div>                
                @enderror
                </div>
                <div class="mb-3 d-grid">
                    <button name="submit" type="submit" class="btn btn-info fw-bold rounded-5 text-white">Masuk</button>
                </div>
            </form>
            <div class="w-100 text-center">
                <span>Belum Punya Akun? <a class="text-decoration-none text-info" href="{{ '/register' }}">Daftar</a></span>
            </div>
        </div> 
    </div>

@endsection
