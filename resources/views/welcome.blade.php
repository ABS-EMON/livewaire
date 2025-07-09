<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Welcome</title>

    <!-- Favicon -->
    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Carousel Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const slides = document.querySelectorAll(".carousel-item");
            let currentIndex = 0;

            function showSlide(index) {
                slides.forEach((slide, i) => {
                    slide.classList.add("hidden");
                    slide.classList.remove("opacity-100");
                });
                slides[index].classList.remove("hidden");
                slides[index].classList.add("opacity-100");
            }

            function nextSlide() {
                currentIndex = (currentIndex + 1) % slides.length;
                showSlide(currentIndex);
            }

            showSlide(currentIndex);
            setInterval(nextSlide, 3000); // Change slide every 3 seconds
        });
    </script>
</head>

<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex flex-col items-center justify-center min-h-screen p-6 lg:p-8">

    <!-- Auth Buttons Header -->
    <header class="absolute top-6 right-6 text-sm z-10">
        @if (Route::has('login'))
            <nav class="flex items-center justify-end gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="inline-block px-5 py-1.5 border text-[#1b1b18] dark:text-[#EDEDEC] border-[#19140035] dark:border-[#3E3E3A] hover:border-[#1915014a] dark:hover:border-[#62605b] rounded-sm text-sm">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="inline-block px-6 py-2 border text-[#1b1b18] dark:text-[#EDEDEC] border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="inline-block px-6 py-2 border text-[#1b1b18] dark:text-[#EDEDEC] border-[#19140035] dark:border-[#3E3E3A] hover:border-[#1915014a] dark:hover:border-[#62605b] rounded-sm text-sm">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <!-- Welcome Title -->
    <h1 class="text-3xl font-semibold mb-6 dark:text-white text-center">Welcome to Laravel Todo List App</h1>

    <!-- Carousel -->
    <!-- Carousel (Larger Version) -->
<div class="relative w-full max-w-6xl h-[600px] overflow-hidden rounded-xl shadow-xl">
    <div class="carousel-item absolute inset-0 transition-opacity duration-700 ease-in-out">
        <img src="{{ asset('image/img1.jpg') }}" alt="Slide 1" class="w-full h-[600px] object-cover rounded-xl">
        <div class="absolute bottom-6 left-6 bg-black bg-opacity-50 text-white px-6 py-4 rounded-lg">
            <h5 class="text-2xl font-bold">First Slide</h5>
            <p class="text-base">This is the first carousel slide caption.</p>
        </div>
    </div>
    <div class="carousel-item absolute inset-0 transition-opacity duration-700 ease-in-out hidden">
        <img src="{{ asset('image/img2.jpg') }}" alt="Slide 2" class="w-full h-[600px] object-cover rounded-xl">
        <div class="absolute bottom-6 left-6 bg-black bg-opacity-50 text-white px-6 py-4 rounded-lg">
            <h5 class="text-2xl font-bold">Second Slide</h5>
            <p class="text-base">This is the second carousel slide caption.</p>
        </div>
    </div>
    <div class="carousel-item absolute inset-0 transition-opacity duration-700 ease-in-out hidden">
        <img src="{{ asset('image/imag3.jpg') }}" alt="Slide 3" class="w-full h-[600px] object-cover rounded-xl">
        <div class="absolute bottom-6 left-6 bg-black bg-opacity-50 text-white px-6 py-4 rounded-lg">
            <h5 class="text-2xl font-bold">Third Slide</h5>
            <p class="text-base">This is the third carousel slide caption.</p>
        </div>
    </div>

     <div class="carousel-item absolute inset-0 transition-opacity duration-700 ease-in-out hidden">
        <img src="{{ asset('image/Picture1.png') }}" alt="Slide 3" class="w-full h-[600px] object-cover rounded-xl">
        <div class="absolute bottom-6 left-6 bg-black bg-opacity-50 text-white px-6 py-4 rounded-lg">
            <h5 class="text-2xl font-bold">Fourth Slide</h5>
            <p class="text-base">This is the fourth carousel slide caption.</p>
        </div>
    </div>

</div>


</body>
</html>
