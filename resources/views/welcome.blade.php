<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Sonar Inc.</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
      #page2Heading, #backButton {
        transition: transform 0.3s ease, opacity 0.3s ease;
        will-change: transform, opacity;
      }
      
      .mask-logo {
        -webkit-mask-image: url('/logo.svg');
        -webkit-mask-repeat: no-repeat;
        -webkit-mask-position: center;
        -webkit-mask-size: 60%;
        mask-image: url('/Sonar/Sonar Logo Sep.svg');
        mask-repeat: no-repeat;
        mask-position: center;
        mask-size: 245px;
      }

      @media(min-width:768px){
        .mask-logo{mask-size: 576px;}
      }

      /* @media(min-width:1024px){
        .mask-logo{mask-size: 55%;}
      } */

      /* @media(min-width:1280px){
        .mask-logo{mask-size: 30%;}
      } */

      .mask-logo.hovered {
        -webkit-mask-size: 100%;
        mask-size: 40%;
      }

      .mask-fullscreen {
        -webkit-mask-image: none;
        mask-image: none;
      }

      #overlay {
        background: rgba(0, 0, 0, 0.6);
      }

      #overlay.full-black {
        background: black !important;
      }

      .fade-in {
        animation: fadeInUp 1s ease forwards;
      }

      .fade-out {
        animation: fadeOutDown 0.3s ease forwards;
      }

      @keyframes fadeInUp {
        0% {
          opacity: 0;
          transform: translateY(20px);
        }
        100% {
          opacity: 1;
          transform: translateY(0);
        }
      }

      @keyframes fadeOutDown {
        0% {
          opacity: 1;
          transform: translateY(0);
        }
        100% {
          opacity: 0;
          transform: translateY(20px);
        }
      }

    .card-image {
      /* Default untuk mobile: tanpa efek abu-abu dan langsung dalam bentuk akhir */
      filter: grayscale(0%) brightness(1) blur(5px);
      transform: scale(1.1);
    }

    .card-text {
      /* Langsung versi akhir juga */
      opacity: 1;
      filter: grayscale(0%) brightness(1) blur(0);
      transform: scale(1);
      letter-spacing: 0.1vw;
    }

    /* Aktifkan transisi dan efek hover hanya di layar besar */
    @media (min-width: 1024px) {
      .card-image {
        filter: grayscale(100%) brightness(0.7) blur(0);
        transform: scale(1);
        transition: all 0.5s ease;
      }

      .group:hover .card-image {
        filter: grayscale(0%) brightness(1) blur(5px);
        transform: scale(1.1);
      }

      .card-text {
        filter: grayscale(100%) brightness(0.7) blur(5px);
        transform: scale(0.9);
        transition: all 0.5s ease;
        opacity: 1;
      }

      .group:hover .card-text {
        filter: grayscale(0%) brightness(1) blur(0);
        transform: scale(1);
        letter-spacing: 0.1vw;
      }
      .invert {
        filter: invert(1);
      }
    }


      #logoHoverArea {
        cursor: none;
      }

      #customCursor {
        transition: transform 0.1s ease;
      }

      .bg-noise {
      background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 700 700"><defs><filter id="nnnoise-filter" x="-20%" y="-20%" width="140%" height="140%"><feTurbulence type="fractalNoise" baseFrequency="0.063" numOctaves="4" seed="15" stitchTiles="stitch" result="turbulence"/><feSpecularLighting surfaceScale="15" specularConstant="0.75" specularExponent="20" lighting-color="%23474747" in="turbulence" result="specularLighting"><feDistantLight azimuth="3" elevation="100"/></feSpecularLighting></filter></defs><rect width="700" height="700" fill="%23202020"/><rect width="700" height="700" fill="%23474747" filter="url(%23nnnoise-filter)"/></svg>');
      background-size: cover;
      background-repeat: no-repeat;
    }

        .bg-noise2 {
  background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 700 700"><defs><filter id="nnnoise-filter" x="-20%" y="-20%" width="140%" height="140%"><feTurbulence type="fractalNoise" baseFrequency="0.063" numOctaves="4" seed="15" stitchTiles="stitch" result="turbulence"/><feSpecularLighting surfaceScale="15" specularConstant="0.75" specularExponent="20" lighting-color="%23b6b6b6" in="turbulence" result="specularLighting"><feDistantLight azimuth="3" elevation="100"/></feSpecularLighting></filter></defs><rect width="700" height="700" fill="%23d0d0d0"/><rect width="700" height="700" fill="%23b6b6b6" filter="url(%23nnnoise-filter)"/></svg>');
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}

.neon-border {

}


    </style>
  </head>

  <body class="overflow-hidden">

    <x-preloader/>

    <!-- Background Video -->
    <div class="fixed top-0 left-0 w-full h-full z-0">
      <video id="videoBackground" autoplay muted loop playsinline class="w-full h-full object-cover">
        <source src="{{ asset('video/SONAR.mp4') }}" type="video/mp4">
      </video>
      <div id="overlay" class="absolute inset-0 bg-black/60 pointer-events-none"></div>
    </div>

    <!-- Mask Layer -->
    <div id="maskLayer" class="fixed inset-0 pointer-events-none mask-logo z-10">
      <video autoplay muted loop playsinline class="w-full h-full object-cover">
        <source src="{{ asset('video/SONAR.mp4') }}" type="video/mp4">
      </video>
    </div>

    <!-- Landing Section -->
    <div id="landingSection" class="relative z-20 text-white">
      <div class="min-h-screen flex items-center justify-center">
        <div id="logoHoverArea" class="w-[700px] h-[700px]"></div>
      </div>
    </div>

    <!-- Main Content -->
    <div id="mainContent" class="hidden relative z-30 text-white text-4xl">
      
      <!-- Include Navbar Component -->
      <x-navbar />

      <!-- Tambahkan di dalam <section> Halaman 2 -->
      <section class="min-h-screen flex items-center justify-center text-center overflow-hidden">
        <div id="page2Container">
          <h1 class="font-extrabold text-2xl md:text-4xl lg:text-5xl c">Discover design, sound, and</h1>
          <h1 class="font-extrabold text-2xl md:text-4xl lg:text-5xl d">vision — reimagined by Sonar.</h1>
          {{-- <p class="font-semibold text-base md:text-xl pt-2 d">We shape emotion through sound, design, and vision.</p>
          <p class="font-semibold text-base md:text-xl d">Your story resonates beyond the screen.</p> --}}
          {{-- <button id="backButton" class="mt-6 px-6 py-2 bg-white text-black rounded hover:bg-gray-200 transition">
            Kembali
          </button> --}}
        </div>
      </section>
      
      <section class="h-screen text-white bg-black flex flex-col items-center justify-center overflow-hidden b">

        <div class="w-full h-full grid grid-cols-1 grid-rows-4 lg:grid-cols-4 lg:grid-rows-1 gap-1 rounded-xl p-2 card1">

          <!-- Card 1: CREATIVE (split into CREA & TIVE) -->
          <div class="group card relative overflow-hidden shadow-lg over:scale-105 shadow-black-800 box-shadow-css">
            <div class="line absolute top-0 left-0 h-[2px] bg-white w-full" style="width: 0%; visibility: hidden;"></div>
            <img src="/images/photo1.jpg" alt="Card 1" class="w-full h-full object-cover card-image" />
            <div class="absolute inset-0 pointer-events-none z-10">
              <div class="absolute right-0 top-0 h-full w-10 bg-gradient-to-l  group-hover:from-transparent group-hover:to-transparent transition-all duration-300"></div>
            </div>
            <div class="absolute inset-0 flex flex-col justify-center items-center">
              <p class="card-text font-bebas text-[8vw] leading-[0.75] tracking-tight">CREA</p>
              <p class="card-text font-bebas text-[8vw] leading-[0.75] tracking-tight translate-x-[10%]">TIVE</p>
            </div>
          </div>

          <!-- Card 2: UI/UX -->
          <a class="group card relative overflow-hidden shadow-lg over:scale-105" href="{{ route('label') }}">
            <div class="line absolute top-0 left-0 h-[2px] bg-white w-full" style="width: 0%; visibility: hidden;"></div>
            <img src="/images/photo2.jpg" alt="Card 1" class="w-full h-full object-cover card-image " />
            <div class="absolute inset-0 pointer-events-none z-10">
              <div class="absolute right-0 top-0 h-full w-10 bg-gradient-to-l  group-hover:from-transparent group-hover:to-transparent transition-all duration-1000"></div>
            </div>
            <div class="absolute inset-0 flex flex-col justify-center items-center">
              <p class="card-text font-bebas text-[8vw] leading-[0.75] tracking-tight">LABEL</p>
              {{-- <p class="card-text font-bebas text-[8vw] leading-[0.75] tracking-tight translate-x-[10%]">UX</p> --}}
            </div>
          </a>

          <!-- Card 3: AUDIOPOST -->
          <a class="group card relative overflow-hidden shadow-lg over:scale-105" href="{{ route('audiopost') }}">
            <div class="line absolute top-0 left-0 h-[2px] bg-white w-full" style="width: 0%; visibility: hidden;"></div>
            <img src="/images/photo3.jpg" alt="Card 1" class="w-full h-full object-cover card-image" />
            <div class="absolute inset-0 pointer-events-none z-10">
              <div class="absolute right-0 top-0 h-full w-10 bg-gradient-to-l  group-hover:from-transparent group-hover:to-transparent transition-all duration-1000"></div>
            </div>
            <div class="absolute inset-0 flex flex-col justify-center items-center">
              <p class="card-text font-bebas text-[8vw] leading-[0.75] tracking-tight">AUDIO</p>
              <p class="card-text font-bebas text-[8vw] leading-[0.75] tracking-tight translate-x-[10%]">POST</p>
            </div>
          </a>

          <!-- Card 4: UI/UX -->
          <div class="group card relative overflow-hidden shadow-lg over:scale-105 ">
            <div class="line absolute top-0 left-0 h-[2px] bg-white w-full" style="width: 0%; visibility: hidden;"></div>
            <img src="/images/photo4.jpg" alt="Card 1" class="w-full h-full object-cover card-image" />
            <div class="absolute inset-0 pointer-events-none z-10">
              <div class="absolute right-0 top-0 h-full w-10 bg-gradient-to-l  group-hover:from-transparent group-hover:to-transparent transition-all duration-300"></div>
            </div>
            <div class="absolute inset-0 flex flex-col justify-center items-center">
              <p class="card-text font-bebas text-[8vw] leading-[0.75] tracking-tight">UI/</p>
              <p class="card-text font-bebas text-[8vw] leading-[0.75] tracking-tight translate-x-[10%]">UX</p>
            </div>
          </div>

        </div> 
        
      </section>

        <div class="w-full min-h-screen flex-col bg-noise">

          {{-- <div class="w-[full] h-[50rem] mx-auto">
                    <div id="logo-sonar" class="w-[500px] h-[500px] mx-auto flex flex-col items-center justify-center invert">
                      <!-- Baris pertama: S O N -->
                      <div class="flex mb-[-70px]">
                        <div class="w-[164px] h-[380px] mr-[-75px]">
                          <img src="/Audioposts/SONAR ILLUS - S.png" alt="" class="letter-s">
                        </div>
                        <div class="w-[120px] h-[180px] ml-[40px] mr-[-67px] mt-[170px]">
                          <img src="/Audioposts/SONAR ILLUS - O.png" alt="" class="letter-o">
                        </div>
                        <div class="w-[186px] h-[280px] mt-30">
                          <img src="/Audioposts/SONAR ILLUS - N.png" alt="" class="letter-n">
                        </div>
                      </div>
                      
                      <!-- Baris kedua: A R -->
                      <div class="flex mt-[-70px]">
                        <div  class="w-[158px] h-[242px]">
                          <img src="/Audioposts/SONAR ILLUS - A.png" alt="" class="letter-a">
                        </div>
                        <div class="w-[182px] h-[300px] ml-[-45px] mt-[20px]">
                          <img src="/Audioposts/SONAR ILLUS - R.png" alt="" class="letter-r">
                        </div>
                      </div>
                    </div>
                    <div class="container flex items-center justify-center text-center w-[1000px] mx-auto mt-10 " style="opacity:0;">
                      <p class="animate-me tracking-[5px] leading-15 text-[40px]">
                        Sonar Inc is a Jakarta-based creative company founded in 2017 by two individuals driven by a shared passion for music, art, and storytelling. We work across TV, digital, film, events, and multimedia, blending imagination with craft to create experiences that inspire, engage, and connect.
                      </p>
                    </div>

          </div> --}}

          <div class="w-full h-auto mx-auto">
            <div id="logo-sonar" class="w-[300px] h-[300px] sm:w-[400px] sm:h-[400px] md:w-[500px] md:h-[500px] mx-auto flex flex-col items-center justify-center invert">
              
              <!-- Baris pertama: S O N -->
              <div class="flex mb-[-40px] sm:mb-[-50px] md:mb-[-70px]">
                <div class="w-[100px] h-[230px] sm:w-[130px] sm:h-[300px] md:w-[164px] md:h-[380px] mr-[-40px] sm:mr-[-55px] md:mr-[-75px]">
                  <img src="/Audioposts/SONAR ILLUS - S.png" alt="" class="letter-s w-full h-full object-contain">
                </div>
                <div class="w-[80px] h-[110px] sm:w-[100px] sm:h-[140px] md:w-[120px] md:h-[180px] ml-[20px] sm:ml-[30px] md:ml-[40px] mr-[-40px] sm:mr-[-50px] md:mr-[-67px] mt-[90px] sm:mt-[130px] md:mt-[170px]">
                  <img src="/Audioposts/SONAR ILLUS - O.png" alt="" class="letter-o w-full h-full object-contain">
                </div>
                <div class="w-[120px] h-[180px] sm:w-[150px] sm:h-[230px] md:w-[186px] md:h-[280px] mt-[50px] mb-[-10px] md:mt-[120px]">
                  <img src="/Audioposts/SONAR ILLUS - N.png" alt="" class="letter-n w-full h-full object-contain">
                </div>
              </div>

              <!-- Baris kedua: A R -->
              <div class="flex mt-[-40px] sm:mt-[-50px] md:mt-[-70px]">
                <div class="w-[100px] h-[150px] sm:w-[130px] sm:h-[200px] md:w-[158px] md:h-[242px]">
                  <img src="/Audioposts/SONAR ILLUS - A.png" alt="" class="letter-a w-full h-full object-contain">
                </div>
                <div class="w-[120px] h-[190px] sm:w-[150px] sm:h-[230px] md:w-[182px] md:h-[300px] ml-[-25px] sm:ml-[-35px] md:ml-[-45px] mt-[10px] sm:mt-[15px] md:mt-[20px]">
                  <img src="/Audioposts/SONAR ILLUS - R.png" alt="" class="letter-r w-full h-full object-contain">
                </div>
              </div>
            </div>

            <!-- Deskripsi -->
            <div class="container flex items-center justify-center text-center max-w-[90%] sm:max-w-[700px] md:max-w-[1000px] mx-auto mt-6 sm:mt-8 md:mt-10 px-10" style="opacity:0;">
              <p class="animate-me tracking-[2px] sm:tracking-[4px] md:tracking-[5px] leading-7 sm:leading-9 md:leading-[3.75rem] text-[16px] sm:text-[24px] md:text-[40px]">
                Sonar Inc is a Jakarta-based creative company founded in 2017 by two individuals driven by a shared passion for music, art, and storytelling. We work across TV, digital, film, events, and multimedia, blending imagination with craft to create experiences that inspire, engage, and connect.
              </p>
            </div>
          </div>


          {{-- <div class="lg:flex justify-center items-center h-screen">
  
            <!-- Card 1 -->
            <div class="w-[600px] h-[400px] flex group overflow-hidden relative">
              <div class="w-[400px] h-[400px] bg-white flex flex-col justify-end z-10 fade-section">
                <p class="font-anton text-red-600 text-[70px] mb-[-10px] fade-item">Hudi</p>
                <p class="font-anton text-red-600 text-[70px] mb-[-10px] fade-item">Ardianto</p>
              </div>
              <div class="text-justify tracking-[0.025em] w-[200px] h-[400px] text-[20px] absolute duration-400 opacity-0 group-hover:opacity-100 transition-all z-0 right-[100%] group-hover:right-[0%] px-3 py-3">
                <p>
                  An established Music Producer and Musician in Jakarta electronic music scene.
                </p>
                <br>
                <p>
                  Life and wholeness of it becomes his inspiration in creating a unique sound.
                  This view liberates his music and enables him to see and hear everything as instruments and sounds.
                </p>
              </div>
            </div>

            <!-- Card 2 -->
            <div class="w-[600px] h-[400px] flex justify-end overflow-hidden relative group">
              <div class="w-[400px] h-[400px] bg-white flex flex-col justify-end items-end fade-section">
                <p class="font-anton text-red-600 text-[70px] mb-[-10px] fade-item">Ibam</p>
                <p class="font-anton text-red-600 text-[70px] mb-[-10px] fade-item">Adam</p>
              </div>
              <div class="text-justify tracking-[0.1em] w-[200px] h-[400px] text-[20px] absolute duration-400 opacity-0 group-hover:opacity-100 transition-all z-0 left-[100%] group-hover:left-[0%] px-3 py-3">
                <p>
                  As an electronic music industry veteran, Ibam has set an industry standard
                  and helped to revolutionize the electronic music scene in Indonesia.
                </p>
                <br>
                <p>
                  A Paranoia awards winner and part of Tantra Music Group.
                </p>
              </div>
            </div>

          </div> --}}

          {{-- <div class="flex flex-col lg:flex-row justify-center items-center min-h-screen gap-6 px-4">
  
            <!-- Card 1 -->
            <div class="w-full sm:w-[450px] lg:w-[600px] h-[300px] sm:h-[350px] lg:h-[400px] flex group overflow-hidden relative">
              <div class="w-[60%] sm:w-[400px] h-full bg-white flex flex-col justify-end z-10 fade-section p-2">
                <p class="font-anton text-red-600 text-[40px] sm:text-[55px] lg:text-[70px] mb-[-6px] fade-item">Hudi</p>
                <p class="font-anton text-red-600 text-[40px] sm:text-[55px] lg:text-[70px] mb-[-6px] fade-item">Ardianto</p>
              </div>
              <div class="text-justify tracking-[0.02em] w-[40%] sm:w-[200px] h-full text-[14px] sm:text-[16px] lg:text-[20px] absolute duration-400 opacity-0 group-hover:opacity-100 transition-all z-0 right-[100%] group-hover:right-[0%] px-2 sm:px-3 py-2 sm:py-3">
                <p>
                  An established Music Producer and Musician in Jakarta electronic music scene.
                </p>
                <br>
                <p>
                  Life and wholeness of it becomes his inspiration in creating a unique sound.
                  This view liberates his music and enables him to see and hear everything as instruments and sounds.
                </p>
              </div>
            </div>

            <!-- Card 2 -->
            <div class="w-full sm:w-[450px] lg:w-[600px] h-[300px] sm:h-[350px] lg:h-[400px] flex justify-end overflow-hidden relative group">
              <div class="w-[60%] sm:w-[400px] h-full bg-white flex flex-col justify-end items-end fade-section p-2">
                <p class="font-anton text-red-600 text-[40px] sm:text-[55px] lg:text-[70px] mb-[-6px] fade-item">Ibam</p>
                <p class="font-anton text-red-600 text-[40px] sm:text-[55px] lg:text-[70px] mb-[-6px] fade-item">Adam</p>
              </div>
              <div class="text-justify tracking-[0.05em] w-[40%] sm:w-[200px] h-full text-[14px] sm:text-[16px] lg:text-[20px] absolute duration-400 opacity-0 group-hover:opacity-100 transition-all z-0 left-[100%] group-hover:left-[0%] px-2 sm:px-3 py-2 sm:py-3">
                <p>
                  As an electronic music industry veteran, Ibam has set an industry standard
                  and helped to revolutionize the electronic music scene in Indonesia.
                </p>
                <br>
                <p>
                  A Paranoia awards winner and part of Tantra Music Group.
                </p>
              </div>
            </div>

          </div> --}}

          <div class="flex flex-col lg:flex-row justify-center items-center min-h-screen gap-6 px-4 lg:gap-0 xl:gap-6">
  
            <!-- Card 1 -->
            <div 
              x-data="{ open: false }" 
              @click="open = !open" 
              class="w-full sm:w-[450px] md:w-[500px] lg:w-[600px] h-[300px] sm:h-[350px] lg:h-[400px] flex relative cursor-pointer overflow-hidden bg-amber-500"
            >
              <div class="w-[60%] md:w-[300px] lg:w-[300px] h-[100%] flex flex-col justify-end z-10 fade-section p-2 bg-cover bg-center border-solid border-gray-500 border-[1px]"
                  style="background-image: url('/images/Hudi About Us.png');">
                <p class="font-anton text-white text-[40px] sm:text-[55px] lg:text-[70px] mb-[-6px] fade-item">Hudi</p>
                <p class="font-anton text-white text-[40px] sm:text-[55px] lg:text-[70px] mb-[-6px] fade-item">Ardianto</p>
              </div>

              <div 
                class="text-justify tracking-[0.02em] w-[40%] sm:w-[200px] h-full text-[12px] sm:text-[16px] lg:text-[18px] xl:text-[20px] absolute duration-400 transition-all z-0 px-2 sm:px-3 py-2 sm:py-3"
                :class="{
                  'opacity-100 xl:right-[17%] md:right-[0%%] right-[0%]': open, 
                  'opacity-0 right-[70%]': !open
                }"
              >
                <p>
                  An established Music Producer and Musician in Jakarta electronic music scene.
                </p>
                <br>
                <p>
                  Life and wholeness of it becomes his inspiration in creating a unique sound.
                  This view liberates his music and enables him to see and hear everything as instruments and sounds.
                </p>
              </div>
            </div>

            <!-- Card 2 -->
            <div 
              x-data="{ open: false }" 
              @click="open = !open" 
              class="w-full sm:w-[450px] md:w-[500px] lg:w-[600px] h-[300px] sm:h-[350px] lg:h-[400px] flex justify-end relative cursor-pointer overflow-hidden bg-amber-400"
            >
              <div class="w-[60%] lg:w-[300px] h-full bg-white flex flex-col justify-end items-end fade-section p-2 bg-cover bg-center border-solid border-gray-500 border-[1px] z-10"
              style="background-image: url('/images/Ibam About Us.png');">
                <p class="font-anton text-white text-[40px] sm:text-[55px] lg:text-[70px] mb-[-6px] fade-item">Ibam</p>
                <p class="font-anton text-white text-[40px] sm:text-[55px] lg:text-[70px] mb-[-6px] fade-item">Adam</p>
              </div>
              <div 
                class="text-justify tracking-[0.05em] w-[40%] sm:w-[200px] h-full text-[12px] sm:text-[16px] lg:text-[18px] xl:text-[20px] absolute duration-400 transition-all z-0 px-2 sm:px-3 py-2 sm:py-3"
                :class="{
                  'opacity-100 xl:left-[17%] md:left-[0%%] left-[0%]': open, 
                  'opacity-0 left-[70%]': !open
                }"
              >
                <p>
                  As an electronic music industry veteran, Ibam has set an industry standard
                  and helped to revolutionize the electronic music scene in Indonesia.
                </p>
                <br>
                <p>
                  A Paranoia awards winner and part of Tantra Music Group.
                </p>
              </div>
            </div>

          </div>



        </div>

      <x-footer/>
      
    </div>

    <!-- Custom Cursor -->
    <div id="customCursor" class="hidden fixed w-12 h-12 rounded-full bg-white/100 border border-white pointer-events-none z-50"></div>

    <!-- Script -->
    <script>

      // loading
      // window.addEventListener('load', () => {
      //   const preloader = document.getElementById('preloader');
      //   const landing = document.getElementById('landingSection');
      //   const main = document.getElementById('mainContent');

      //   // Tambahkan delay loading selama 3 detik (3000 ms)
      //   setTimeout(() => {
      //     preloader.classList.add('opacity-0', 'pointer-events-none');

      //     // Setelah animasi selesai (misalnya 500ms), baru hilangkan preloader
      //     setTimeout(() => {
      //       preloader.style.display = 'none';
      //       landing.classList.remove('hidden');
      //       // main.classList.remove('hidden');
      //       document.body.classList.remove('overflow-hidden');
      //     }, 500); // durasi transisi fade out
      //   }, 4000); // delay waktu loading
      // });

      window.addEventListener('load', () => {
        // const hasVisited = sessionStorage.getItem('myApp_hasVisitedMain');  // key unik
        const preloader = document.getElementById('preloader');
        const landing = document.getElementById('landingSection');
        const main = document.getElementById('mainContent');

        // if (hasVisited === 'true') {
        //   preloader.style.display = 'none';
        //   landing.classList.add('hidden');
        //   main.classList.remove('hidden');
        //   document.body.classList.remove('overflow-hidden');
        //   maskLayer.classList.remove('mask-logo');
        //   maskLayer.classList.add('mask-fullscreen');
        //   overlay.classList.remove('full-black');
        //   window.initScrollAnimations();
        //   window.cardScrollAnimations();
        //   window.fadeInOnScroll();
        //   window.setupScrollTrigger2();
        //   window.textBlur();
        //   return;
        // }

        setTimeout(() => {
          preloader.classList.add('opacity-0', 'pointer-events-none');
          setTimeout(() => {
            preloader.style.display = 'none';
            landing.classList.remove('hidden');
            document.body.classList.remove('overflow-hidden');
            sessionStorage.setItem('myApp_hasVisitedMain', 'true'); // set key unik
          }, 500);
        }, 4000);
      });



      const HOVER_ANIMATION_DURATION = 400;
      const TRANSITION_IN_DURATION = 10000;
      const TRANSITION_OUT_DURATION = 1500;

      const logoHoverArea = document.getElementById('logoHoverArea');
      const overlay = document.getElementById('overlay');
      const maskLayer = document.getElementById('maskLayer');
      const mainContent = document.getElementById('mainContent');
      const backButton = document.getElementById('backButton');
      const landingSection = document.getElementById('landingSection');
      const page2Container = document.getElementById('page2Container');
      const customCursor = document.getElementById('customCursor');

      function setTransitionStyle(element, props, duration) {
        const style = props.map(p => `${p} ${duration}ms ease`).join(', ');
        element.style.transition = style;
      }

      function hoverMask() {
        setTransitionStyle(overlay, ['background', 'opacity'], HOVER_ANIMATION_DURATION);
        setTransitionStyle(maskLayer, ['mask-size', '-webkit-mask-size'], HOVER_ANIMATION_DURATION);
        overlay.style.background = 'rgba(0, 0, 0, 1)';
        customCursor.classList.remove('hidden');
        maskLayer.classList.add('hovered');
      }

      function unhoverMask() {
        setTransitionStyle(overlay, ['background', 'opacity'], HOVER_ANIMATION_DURATION);
        setTransitionStyle(maskLayer, ['mask-size', '-webkit-mask-size'], HOVER_ANIMATION_DURATION);
        overlay.style.background = 'rgba(0, 0, 0, 0.6)';
        customCursor.classList.add('hidden');
        maskLayer.classList.remove('hovered');
      }

      function goToPage2() {
        overlay.classList.add('full-black');
        overlay.style.opacity = '1';

        setTransitionStyle(maskLayer, ['mask-size', '-webkit-mask-size'], TRANSITION_IN_DURATION);
        maskLayer.style.webkitMaskSize = '5000%';
        maskLayer.style.maskSize = '5000%';
        logoHoverArea.style.display = 'none';

        setTimeout(() => {
          maskLayer.classList.remove('mask-logo');
          maskLayer.classList.add('mask-fullscreen');
          overlay.style.opacity = '0';
        }, TRANSITION_IN_DURATION * 0.66);

        setTimeout(() => {
          landingSection.classList.add('hidden');
          document.body.classList.remove('overflow-hidden');
          mainContent.classList.remove('hidden');
          overlay.classList.remove('full-black');
          page2Container.classList.remove('fade-out');
          void page2Container.offsetWidth;
          page2Container.classList.add('fade-in');
          window.initScrollAnimations();
          window.cardScrollAnimations();
          window.fadeInOnScroll();
          window.setupScrollTrigger2();
          window.textBlur();
          sessionStorage.setItem('hasVisitedMain', 'true');
        }, 2500);
      }

      // function backToPage1() {
      //   page2Container.classList.remove('fade-in');
      //   void page2Container.offsetWidth;
      //   page2Container.classList.add('fade-out');

      //   setTimeout(() => {
      //     maskLayer.classList.remove('mask-fullscreen', 'hovered');
      //     maskLayer.classList.add('mask-logo');
      //     void maskLayer.offsetWidth;

      //     setTransitionStyle(maskLayer, ['mask-size', '-webkit-mask-size'], TRANSITION_OUT_DURATION);
      //     maskLayer.style.webkitMaskSize = '40%';
      //     maskLayer.style.maskSize = '60%';

      //     setTransitionStyle(overlay, ['background', 'opacity'], TRANSITION_OUT_DURATION);
      //     overlay.style.opacity = '1';
      //     overlay.style.background = 'rgba(0, 0, 0, 1)';
      //   }, TRANSITION_OUT_DURATION * 0.33);

      //   setTimeout(() => {
      //     mainContent.classList.add('hidden');
      //     document.body.classList.add('overflow-hidden');
      //     landingSection.classList.remove('hidden');
      //     logoHoverArea.style.display = 'block';
      //     maskLayer.classList.remove('mask-fullscreen');
      //     maskLayer.classList.add('mask-logo');
      //     overlay.style.background = 'rgba(0, 0, 0, 0.6)';
      //     page2Container.classList.remove('fade-out');
      //     maskLayer.style.webkitMaskSize = '';
      //     maskLayer.style.maskSize = '';
      //   }, TRANSITION_OUT_DURATION);
      // }

      logoHoverArea.addEventListener('mouseenter', hoverMask);
      logoHoverArea.addEventListener('mouseleave', unhoverMask);

      logoHoverArea.addEventListener('mousemove', (e) => {
        customCursor.style.left = `${e.clientX - 24}px`;
        customCursor.style.top = `${e.clientY - 24}px`;
      });

      logoHoverArea.addEventListener('click', goToPage2);
      // backButton.addEventListener('click', backToPage1);

      let previousProgress = 0;

      window.addEventListener('scroll', () => {
        const heading = document.getElementById('page2Heading');
        // const button = document.getElementById('backButton');
        const page2 = document.getElementById('page2Container');

        const scrollY = window.scrollY;
        const page2Top = page2.offsetTop;
        const page2Height = page2.offsetHeight;
        const windowHeight = window.innerHeight;

        const animationStart = page2Top + page2Height / 2 - windowHeight;
        const animationEnd = page2Top + page2Height / 2;

        const rawProgress = (scrollY - animationStart) / (animationEnd - animationStart);
        const progress = Math.min(Math.max(rawProgress, 0), 1);
      });

    </script>
  </body>
</html>
