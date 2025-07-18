<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Document</title>
  @vite(['resources/css/app.css', 'resources/js/audiopost.js'])
  <style>
    .box-shadow-css {
    box-shadow: inset -20px 0px 5px rgba(0, 0, 0, 0.2);
    }
      /* .images-card {
    width: 300px;
    height: 200px;
    overflow: hidden;
    box-shadow: inset -10px -10px 20px rgba(0, 0, 0, 0.5);
  } */

  .images-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  </style>
</head>
<body>
  <div class="min-h-screen">
    <section class="min-h-screen flex items-center justify-center text-center">
      <div id="page2Container">
        <h1 class="font-extrabold text-[40px] c">Discover design, sound, and</h1>
        <h1 class="font-extrabold text-[40px] c">vision — reimagined by Sonar.</h1>
        <p class="font-semibold text-[20px] pt-2 d">We shape emotion through sound, design, and vision.</p>
        <p class="font-semibold text-[20px] d">Your story resonates beyond the screen.</p>
          {{-- <button id="backButton" class="mt-6 px-6 py-2 bg-white text-black rounded hover:bg-gray-200 transition">
            Kembali
          </button> --}}
      </div>
    </section>
  </div>

  <section class="h-screen text-white bg-black flex items-center justify-center b">
    <div class="w-full h-full grid grid-cols-4 grid-rows-1 gap-1 rounded-xl p-2 card1">
      <!-- Card 1: CREATIVE (split into CREA & TIVE) -->
      <div class="group card relative overflow-hidden shadow-lg hover:scale-105 transition-transform duration-300">
        <!-- Gambar -->
        <img src="/images/photo1.jpg" alt="Card 1" class="w-full h-full object-cover" />

        <!-- Overlay transparan + shadow -->
        <div class="absolute inset-0 box-shadow-css pointer-events-none z-10"></div>

        <!-- Teks -->
        <div class="absolute inset-0 flex flex-col justify-center items-center z-20">
          <p class="card-text font-bebas text-[8vw] leading-[0.75] tracking-tight">CREA</p>
          <p class="card-text font-bebas text-[8vw] leading-[0.75] tracking-tight translate-x-[10%]">TIVE</p>
        </div>
      </div>

        <!-- Card 2: UI/UX -->
        <div class="group card relative overflow-hidden shadow-lg over:scale-105">
          <div class="line absolute top-0 left-0 h-[2px] bg-white w-full" style="width: 0%; visibility: hidden;"></div>
          <img src="/images/photo2.jpg" alt="Card 1" class="w-full h-full object-cover " />
          <div class="absolute inset-0 flex flex-col justify-center items-center">
            <p class="card-text font-bebas text-[8vw] leading-[0.75] tracking-tight">UI?</p>
            <p class="card-text font-bebas text-[8vw] leading-[0.75] tracking-tight translate-x-[10%]">UX</p>
          </div>
        </div>

        <div class="group card relative overflow-hidden shadow-lg over:scale-105">
          <div class="line absolute top-0 left-0 h-[2px] bg-white w-full" style="width: 0%; visibility: hidden;"></div>
          <img src="/images/photo3.jpg" alt="Card 1" class="w-full h-full object-cover" />
          <div class="absolute inset-0 flex flex-col justify-center items-center">
            <p class="card-text font-bebas text-[8vw] leading-[0.75] tracking-tight">AUDIO</p>
            <p class="card-text font-bebas text-[8vw] leading-[0.75] tracking-tight translate-x-[10%]">POST</p>
          </div>
        </div>

        <!-- Card 4: UI/UX -->
        <div class="group card relative overflow-hidden shadow-lg over:scale-105 box-shadow-css">
          <div class="line absolute top-0 left-0 h-[2px] bg-white w-full" style="width: 0%; visibility: hidden;"></div>
          <img src="/images/photo4.jpg" alt="Card 1" class="w-full h-full object-cover images-card" />
          <div class="absolute inset-0 flex flex-col justify-center items-center">
            <p class="card-text font-bebas text-[8vw] leading-[0.75] tracking-tight">UI/</p>
            <p class="card-text font-bebas text-[8vw] leading-[0.75] tracking-tight translate-x-[10%]">UX</p>
          </div>
        </div>
    </div>
  </section>

  <div class="min-h-screen">
    <div class="w-[100px] h-[100px] bg-transparent box-shadow-css"> a</div>
    
    <div class="images-card">
      <img src="/images/photo1.jpg" alt="Card Image">
    </div>
  </div>

  <style>
  
</style>




</body>
</html>
