@extends('layouts.head')

@section('title', 'Info Akun')

@section('konten')

<div class="bg-primary text-center">
    <span>{{ Auth::user()->name }}</span>
    <br>
    <span>publish 12 artikel</span>
    <br>
    <span>200 kali tayang</span>
</div>

@endsection