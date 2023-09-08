@extends('layouts.head')

@section('title', 'Data Akun')

@section('konten')

<style>
    footer{
        display: none;
    }
</style>

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

    <div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
        <div class="row justify-content-between mb-3">
            <h5 class="col-12 col-lg-6 fw-bold">Data Akun {{ $status }}</h5>
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
@endsection