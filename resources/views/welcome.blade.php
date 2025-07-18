<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Full Masked Video</title>
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
        mask-size: 30%;
      }

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
        filter: grayscale(100%) brightness(0.7) blur(0);
        transform: scale(1);
        transition: all 0.5s ease;
      }

      .group:hover .card-image {
        filter: grayscale(0%) brightness(1) blur(5px);
        transform: scale(1.1);
      }

      .card-text {
        opacity: 1;
        filter: grayscale(100%) brightness(0.7) blur(5px);
        transform: scale(0.9);
        transition: all 0.5s ease;
      }

      .group:hover .card-text {
        opacity: 1;
        filter: grayscale(0%) brightness(1) blur(0);
        transform: scale(1);
        letter-spacing: 0.1vw
      }

      #logoHoverArea {
        cursor: none;
      }

      #customCursor {
        transition: transform 0.1s ease;
      }

      .box-shadow-css {
        box-shadow: inset 0 0 10px #f8a100;
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
      
      <section class="h-screen text-white bg-black flex items-center justify-center b">
        <div class="w-full h-full grid grid-cols-4 grid-rows-1 gap-1 rounded-xl p-2 card1">

          <!-- Card 1: CREATIVE (split into CREA & TIVE) -->
          <div class="group card relative overflow-hidden shadow-lg over:scale-105 shadow-black-800 box-shadow-css">
            <div class="line absolute top-0 left-0 h-[2px] bg-white w-full" style="width: 0%; visibility: hidden;"></div>
            <img src="/images/photo1.jpg" alt="Card 1" class="w-full h-full object-cover card-image" />
            <div class="absolute inset-0 pointer-events-none z-10">
              <div class="absolute right-0 top-0 h-full w-10 bg-gradient-to-l from-black/40 to-transparent group-hover:from-transparent group-hover:to-transparent transition-all duration-300"></div>
            </div>
            <div class="absolute inset-0 flex flex-col justify-center items-center">
              <p class="card-text font-bebas text-[8vw] leading-[0.75] tracking-tight">CREA</p>
              <p class="card-text font-bebas text-[8vw] leading-[0.75] tracking-tight translate-x-[10%]">TIVE</p>
            </div>
          </div>

          <!-- Card 2: UI/UX -->
          <div class="group card relative overflow-hidden shadow-lg over:scale-105">
            <div class="line absolute top-0 left-0 h-[2px] bg-white w-full" style="width: 0%; visibility: hidden;"></div>
            <img src="/images/photo2.jpg" alt="Card 1" class="w-full h-full object-cover card-image box-shadow-css" />
            <div class="absolute inset-0 pointer-events-none z-10">
              <div class="absolute right-0 top-0 h-full w-10 bg-gradient-to-l from-black/40 to-transparent group-hover:from-transparent group-hover:to-transparent transition-all duration-300"></div>
            </div>
            <div class="absolute inset-0 flex flex-col justify-center items-center">
              <p class="card-text font-bebas text-[8vw] leading-[0.75] tracking-tight">UI?</p>
              <p class="card-text font-bebas text-[8vw] leading-[0.75] tracking-tight translate-x-[10%]">UX</p>
            </div>
          </div>

          <!-- Card 3: AUDIOPOST -->
          <div class="group card relative overflow-hidden shadow-lg over:scale-105 ">
            <div class="line absolute top-0 left-0 h-[2px] bg-white w-full" style="width: 0%; visibility: hidden;"></div>
            <img src="/images/photo3.jpg" alt="Card 1" class="w-full h-full object-cover card-image" />
            <div class="absolute inset-0 pointer-events-none z-10">
              <div class="absolute right-0 top-0 h-full w-10 bg-gradient-to-l from-black/40 to-transparent group-hover:from-transparent group-hover:to-transparent transition-all duration-1000"></div>
            </div>
            <div class="absolute inset-0 flex flex-col justify-center items-center">
              <p class="card-text font-bebas text-[8vw] leading-[0.75] tracking-tight">AUDIO</p>
              <p class="card-text font-bebas text-[8vw] leading-[0.75] tracking-tight translate-x-[10%]">POST</p>
            </div>
          </div>

          <!-- Card 4: UI/UX -->
          <div class="group card relative overflow-hidden shadow-lg over:scale-105 ">
            <div class="line absolute top-0 left-0 h-[2px] bg-white w-full" style="width: 0%; visibility: hidden;"></div>
            <img src="/images/photo4.jpg" alt="Card 1" class="w-full h-full object-cover card-image" />
            <div class="absolute inset-0 pointer-events-none z-10">
              <div class="absolute right-0 top-0 h-full w-10 bg-gradient-to-l from-black/40 to-transparent group-hover:from-transparent group-hover:to-transparent transition-all duration-300"></div>
            </div>
            <div class="absolute inset-0 flex flex-col justify-center items-center">
              <p class="card-text font-bebas text-[8vw] leading-[0.75] tracking-tight">UI/</p>
              <p class="card-text font-bebas text-[8vw] leading-[0.75] tracking-tight translate-x-[10%]">UX</p>
            </div>
          </div>

        </div>
      </section>


      <footer class="bg-gray-900 text-white text-center text-lg py-12">
        <p>&copy; 2025 Nama Kamu. Semua Hak Dilindungi.</p>
      </footer>
    </div>

    <!-- Custom Cursor -->
    <div id="customCursor" class="hidden fixed w-12 h-12 rounded-full bg-white/100 border border-white pointer-events-none z-50"></div>

    <!-- Script -->
    <script>

      // loading
      window.addEventListener('load', () => {
        const preloader = document.getElementById('preloader');
        const landing = document.getElementById('landingSection');
        const main = document.getElementById('mainContent');

        // Tambahkan delay loading selama 3 detik (3000 ms)
        setTimeout(() => {
          preloader.classList.add('opacity-0', 'pointer-events-none');

          // Setelah animasi selesai (misalnya 500ms), baru hilangkan preloader
          setTimeout(() => {
            preloader.style.display = 'none';
            landing.classList.remove('hidden');
            // main.classList.remove('hidden');
            document.body.classList.remove('overflow-hidden');
          }, 500); // durasi transisi fade out
        }, 4000); // delay waktu loading
      });


      const HOVER_ANIMATION_DURATION = 400;
      const TRANSITION_IN_DURATION = 2500;
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
        }, TRANSITION_IN_DURATION);
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
