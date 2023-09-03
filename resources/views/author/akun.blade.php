@extends('layouts.head')

@section('title', 'Info Akun')

@section('konten')

<div style="min-height: 70vh">
    <div class="jumbotron bg-info">
        <div class="container text-center">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <img src="{{ asset('./storage/profile/'. Auth::user()->profile ) }}" alt="Profil {{ Auth::user()->name }}" style="width: 150px; height: 150px; background-size: cover" class="rounded-circle my-5">
                </div>
                <div class="col-md-8 text-start text-white">
                    <h1 class="fw-bold">{{ Auth::user()->name }}</h1>
                    <span>publish 12 artikel</span>
                    <br>
                    <span>200 kali tayang</span>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card border border-2 border-right-0" style="width: 100%;">
                    <div class="row align-items-start">
                        <div class="col-md-4 text-center d-flex justify-content-center">
                            <img src="img/akuncard1.png" class="img-fluid mt-3" alt="..." style="height: 100px;">
                        </div>
                        <div class="col-md-8">
                            <h2 class="ms-2 mt-3">Kesehatan Mental di Era Digital Menjaga Keseimbangan Penggunaan Teknologi</h2>
                            <p class="ms-2 card-text fw-light mt-2">Rabu 23 Agustus 2023 oleh Intan</p>
                            <p class="ms-2 mb-3 me-5">Peningkatan penggunaan teknologi dapat berdampak pada kesehatan mental, termasuk gejala kecemasan dan depresi. Artikel ini 
                            <a class="link-offset-2 link-underline link-underline-opacity-0" href="#">baca selengkapnya...</a></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-4">
                <div class="card border border-2 border-right-0" style="width: 100%;">
                    <div class="row align-items-start">
                        <div class="col-md-4 text-center d-flex justify-content-center">
                            <img src="img/akuncard1.png" class="img-fluid mt-3" alt="..." style="height: 100px;">
                        </div>
                        <div class="col-md-8">
                            <h2 class="ms-2 mt-3">Kesehatan Mental di Era Digital Menjaga Keseimbangan Penggunaan Teknologi</h2>
                            <p class="ms-2 card-text fw-light mt-2">Rabu 23 Agustus 2023 oleh Intan</p>
                            <p class="ms-2 mb-3 me-5">Peningkatan penggunaan teknologi dapat berdampak pada kesehatan mental, termasuk gejala kecemasan dan depresi. Artikel ini 
                            <a class="link-offset-2 link-underline link-underline-opacity-0" href="#">baca selengkapnya...</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card border border-2 border-right-0" style="width: 100%;">
                    <div class="row align-items-start">
                        <div class="col-md-4 text-center d-flex justify-content-center">
                            <img src="img/akuncard1.png" class="img-fluid mt-3" alt="..." style="height: 100px;">
                        </div>
                        <div class="col-md-8">
                            <h2 class="ms-2 mt-3">Kesehatan Mental di Era Digital Menjaga Keseimbangan Penggunaan Teknologi</h2>
                            <p class="ms-2 card-text fw-light mt-2">Rabu 23 Agustus 2023 oleh Intan</p>
                            <p class="ms-2 mb-3 me-5">Peningkatan penggunaan teknologi dapat berdampak pada kesehatan mental, termasuk gejala kecemasan dan depresi. Artikel ini 
                            <a class="link-offset-2 link-underline link-underline-opacity-0" href="#">baca selengkapnya...</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card border border-2 border-right-0" style="width: 100%;">
                    <div class="row align-items-start">
                        <div class="col-md-4 text-center d-flex justify-content-center">
                            <img src="img/akuncard1.png" class="img-fluid mt-3" alt="..." style="height: 100px;">
                        </div>
                        <div class="col-md-8">
                            <h2 class="ms-2 mt-3">Kesehatan Mental di Era Digital Menjaga Keseimbangan Penggunaan Teknologi</h2>
                            <p class="ms-2 card-text fw-light mt-2">Rabu 23 Agustus 2023 oleh Intan</p>
                            <p class="ms-2 mb-3 me-5">Peningkatan penggunaan teknologi dapat berdampak pada kesehatan mental, termasuk gejala kecemasan dan depresi. Artikel ini 
                            <a class="link-offset-2 link-underline link-underline-opacity-0" href="#">baca selengkapnya...</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection