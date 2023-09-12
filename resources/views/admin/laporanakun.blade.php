<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sanora - @yield('title')</title>
    <link rel="icon" href="{{ asset('logosaja.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- Icon Fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Icon Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    {{-- @include('layouts.navbar') --}}
    <div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
        <div class="row justify-content-between mb-3">
            <h5 class="col-12 col-lg-6 fw-bold">Data Akun {{ $status }} - {{ now() }}</h5>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    @if ($status == '')
                        <th scope="col">Role</th>
                    @endif
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
                        @if ($status == '')
                        <td scope="col">
                            @if ($datas->role == 'author')
                                <span class="text-primary fw-bold">{{ $datas->role }}</span>
                            @else
                                <span class="text-danger fw-bold">{{ $datas->role }}</span>
                            @endif
                        </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>