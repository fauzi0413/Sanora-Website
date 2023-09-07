@extends('layouts.head')

@section('title', 'Menulis')

@section('konten')

<div class="container py-5">
    <div class="mb-3">
        <a href="{{ url()->previous() }}" class="btn btn-outline-danger fw-bold me-2">Kembali</a>
        <a href="/panduan-menulis" class="btn btn-primary fw-bold">Panduan Menulis</a>
    </div>
    <div class="card shadow-lg rounded-3 border-0">
        <form action="/kirimtulisan" method="POST" class="p-5" enctype="multipart/form-data">
            @csrf
            <div class="d-flex justify-content-end mb-3">
                <button class="btn text-info fw-bold" type="submit" name="submit" value="simpan" onclick="return confirm('Apakah anda yakin ingin menyimpan artikel?')">Simpan</button>
                <button class="btn btn-info text-white fw-bold" type="submit" name="submit" value="submit" onclick="return confirm('Apakah anda yakin ingin mensubmit artikel?')">Submit</button>
            </div>
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Artikel</label>
                <input type="text" value="{{ old('judul') }}" name="judul" class="form-control @error('judul') is-invalid @enderror" placeholder="Tulis judul kamu disini...">
                @error('judul')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>                
                @enderror
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Masukkan Gambar untuk Artikel</label>
                <input type="file" value="{{ old('gambar') }}" name="gambar" class="form-control @error('gambar') is-invalid @enderror">
            </div>
            <div class="mb-3">
                <label for="isi" class="form-label">Isi Artikel</label>
                <textarea  value="{{ old('isi') }}" name="isi" class="form-control @error('isi') is-invalid @enderror" placeholder="Mulai menulis cerita..." style="height: 100px">{{ old('isi') }}</textarea>
                {{-- <label for="floatingTextarea2">Comments</label> --}}
                @error('isi')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>                
                @enderror
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'isi' );
</script>
@endsection