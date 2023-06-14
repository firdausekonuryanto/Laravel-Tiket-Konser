@extends('layouts.main')
@section('container')
<style>
.slider {
    width: 100%;
    position: relative;
    overflow: hidden;
}

.slider-container {
    display: flex;
    transition: transform 0.5s ease;
}

.slider {
    width: 100%;
    position: relative;
    overflow: hidden;
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.5);
    /* Memberikan efek bayangan */
}

.slide img {
    width: 100%;
    border-radius: 10px;
}

.prev,
.next {
    text-decoration: none;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    font-size: 30px;
    color: white;
    cursor: pointer;
    padding: 10px;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 2;
}

.prev {
    left: 0;
}

.next {
    right: 0;
}
</style>

<center>
    <br><br>



    <div class="slider">
        <div class="slider-container">
            <div class="slide">
                <img src="/img/gambar1.webp" alt="Gambar 1">
            </div>
            <div class="slide">
                <img src="/img/gambar2.webp" alt="Gambar 2">
            </div>
            <div class="slide">
                <img src="/img/gambar3.jpg" alt="Gambar 3">
            </div>
        </div>
        <a class="prev" onclick="prevSlide()">&#10094;</a>
        <a class="next" onclick="nextSlide()">&#10095;</a>
    </div>
    <h1 class="mt-xxl-5">Selamat Datang di <blink_me>Barbarticket.com</blink_me>
    </h1>
    <h4> Pemesanan Tiket Konser Online</h4>
    Dont Have an Account Register Here
    <a href="/penonton/create">Register</a> |
    <a href="/login">Login</a>
</center>

<script>
var slideIndex = 0;
var slides = document.getElementsByClassName("slide");

function showSlide() {
    for (var i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex].style.display = "block";
}

function prevSlide() {
    if (slideIndex === 0) {
        slideIndex = slides.length - 1;
    } else {
        slideIndex--;
    }
    showSlide();
}

function nextSlide() {
    if (slideIndex === slides.length - 1) {
        slideIndex = 0;
    } else {
        slideIndex++;
    }
    showSlide();
}

// Fungsi slide secara otomatis setiap 3 detik
function autoSlide() {
    nextSlide();
}

showSlide();

// Jalankan fungsi autoSlide setiap 3 detik
setInterval(autoSlide, 3000);
</script>
@endsection