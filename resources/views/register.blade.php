<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Register</title>
</head>
<body>
    @include('layouts.navbar')
    <div class="container py-5">
        <div class="w-50 center border rounded px-3 py-3 mx-auto">
            <h1>Register</h1>
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
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" value="{{ old('name') }}" name="name" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            Nama wajib diisi!
                        </div>                
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" value="{{ old('email') }}" name="email" class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            Email wajib diisi!
                        </div>                
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            Password wajib diisi!
                        </div>                
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                    @error('password_confirmation')
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            Konfirmasi password wajib diisi!
                        </div>                
                    @enderror
                </div>
                <div class="mb-3 d-grid">
                    <button name="submit" type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
            <div class="w-100 text-center">
                <a class="" href="{{ '/login' }}">Login</a>
            </div>
        </div> 
    </div>
</body>
</html>