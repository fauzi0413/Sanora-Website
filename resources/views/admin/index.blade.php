@extends('admin.layout')

@section('title', 'Dashboard Admin')

@section('judul', 'Dashboard')

@section('konten_admin')
    <div class="row p-3">
        <div class="col-lg-4 col-12 mb-4">
            <a href="/dataauthor" class="nav-link">
                <div class="card shadow h-100 py-2 bg-white border-0" style="border-left: red 5px solid !important; ">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1 fw-bold">
                                    Data Author
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $author }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x opacity-50"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-12 mb-4">
            <a href="/dataadmin" class="nav-link">
                <div class="card shadow h-100 py-2 bg-white border-0" style="border-left: blue 5px solid !important; ">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 fw-bold">
                                    Data Admin
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $admin }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-regular fa-user fa-2x opacity-50"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-12 mb-4">
            <a href="/dataartikel_disetujui" class="nav-link">
                <div class="card shadow h-100 py-2 bg-white border-0" style="border-left: green 5px solid !important; ">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1 fw-bold">
                                    Data Artikel Disetujui
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $artikel_confirm }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-newspaper fa-2x opacity-50"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-lg-4 col-12 mb-4">
            <a href="/dataartikel_menunggu" class="nav-link">
                <div class="card shadow h-100 py-2 bg-white border-0" style="border-left: rgb(248, 248, 25) 5px solid !important; ">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1 fw-bold">
                                    Data Artikel Menunggu
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $artikel_waiting }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-regular fa-newspaper fa-2x opacity-50"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>

    <div class="p-3">
        <h3 class="fw-bold">Data Tayangan Artikel Teratas</h3>
        <div>
            <canvas id="myChart"></canvas>
        </div>
        <table class="table table-bordered">
            <thead class="table-info">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Tanggal Artikel</th>
                    <th>Tayangan</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($tayangan_artikel as $tayangan)
                    <tr>
                        <th>{{ $no++ }}</th>
                        <td>{{ $tayangan->judul }}</td>
                        <td>{{ \Carbon\Carbon::parse($tayangan->created_at)->translatedFormat('l, d F Y') }}</td>
                        <td>{{ $tayangan->tayangan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
        labels: ['1', '2', '3'],
        datasets: [{
            label: 'Data tayangan artikel',
            data: [
                @foreach ($tayangan_artikel as $data)
                    {{ $data->tayangan }},
                @endforeach
            ],
            borderWidth: 1
        }]
        },
        options: {
        scales: {
            y: {
            beginAtZero: true
            }
        }
        }
    });
    </script>
@endsection