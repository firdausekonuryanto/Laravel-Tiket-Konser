@extends('layouts_userlogin.main')
@section('container')

<h3 class="mt-4">{{ $title }}</h3>
<hr>
<center>
    <br><br>
    <img src="/img/tiket.jpg">
    <h1 class="mt-xxl-5">Selamat Datang di <blink_me>Barbarticket.com</blink_me>
    </h1>
    <h4> Pemesanan Tiket Konser Online</h4>
    Dont Have an Account Register Here
    <a href="/penonton/create">Register</a> |
    <a href="/login">Login</a>
</center>

@endsection