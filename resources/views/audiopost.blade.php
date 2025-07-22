<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/audiopost.js'])

  <style>
    .line {
      overflow: hidden;
      display: block;
    }

    #container {
      width: 100%;
      min-height: 100vh;
      position: relative;
      top: 0;
      left: 0;
      overflow: hidden;
    }

    .panel {
      position: absolute;
      will-change: transform;
    }

    .collapsible {
      height: 0;
      overflow: hidden;
      opacity: 0;
      transition: height 0.4s ease, opacity 0.3s ease;
    }

    .collapsible.is-open {
      opacity: 1;
    }
  </style>
  <title>Document</title>
</head>
<body class="overflow-x-hidden invisible">
  <x-navbar />

  <div id="container">
    <!-- FIRST SECTION -->
    <div id="first-section" class="h-screen w-full bg-[#121212] flex items-center justify-center">
      <div class="h-[440px] w-[970px] flex items-center">
        <img src="/Audiopost/Jelita.png" id="img-1" class="w-[345px] h-[345px] z-10 mr-[-80px]">
        <img src="/Audiopost/Jelita.png" id="img-2" class="w-[440px] h-[440px] z-20">
        <img src="/Audiopost/Jelita.png" id="img-3" class="w-[345px] h-[345px] z-10 ml-[-80px]">
      </div>
    </div>

    <!-- Hidden SECOND SECTION (used later) -->
    <template id="second-section">
      <div id="halaman-pertama" class="panel halaman-pertama h-screen w-full bg-[#121212]  items-center justify-between overflow-x-hidden flex">
        <div id="left-photo" class="w-[435px] h-[435px] rotate-[25deg] ml-[-180px] mt-[-150px] opacity-0">
          <img src="/Audiopost/Jelita.png" alt="">
        </div>
        <div class="h-[515px] w-[400px] flex flex-col items-center justify-center text-center">
          <p id="sonar" class="split text-[100px] font-bold text-white mb-[-100px] tracking-tighter">SONAR</p>
          <p id="audio" class="split text-[190px] font-bold text-white tracking-tighter">AUDIO</p>
          <p id="post" class="split text-[100px] font-bold text-white mt-[-90px] tracking-tighter">POST</p>
        </div>
        <div id="right-photo" class="w-[435px] h-[435px] rotate-[-20deg] mr-[-180px] mb-[-150px] opacity-0">
          <img src="/Audiopost/Jelita.png" alt="">
        </div>
      </div>

      <div id="halaman-kedua" class="panel halaman-kedua h-screen w-full bg-[#202020] items-center overflow-x-hidden flex justify-center">
        <div class="h-[600px] w-[475px] text-center flex flex-col justify-center">
          <p id="line1" class="text-[#727070] font-semibold text-[100px] tracking-tighter leading-none">We strive</p>
          <div class="flex items-center justify-center">
            <p id="line2a" class="text-[#727070] font-semibold text-[100px] tracking-tighter leading-none mr-5">to</p>
            <p id="line2b" class="text-white font-semibold text-[100px] tracking-tighter leading-none">create</p>
          </div>
          <div class="flex items-center justify-center">
            <p id="line3a" class="text-[#727070] font-semibold text-[100px] tracking-tighter leading-none mr-5">sounds</p>
            <p id="line3b" class="text-white font-semibold text-[100px] tracking-tighter leading-none">with</p>
          </div>
          <p id="line4" class="text-white font-semibold text-[100px] tracking-tighter leading-none">a purpose.</p>
        </div>
      </div>

          <div id="halaman-kelima" class="panel h-screen w-full bg-[black] overflow-x-hidden p-5">
    </div>

      <div id="halaman-keempat" class="min-h-screen w-full bg-[#d0d0d0] overflow-x-hidden p-5">
        <div id="container-3" class="flex justify-end pt-40 pr-70">
          <div class="min-h-[300px] w-[700px] flex flex-col space-y-4" 
              x-data="{
                items: [
                  { id: 1, title: 'Jingle Production', desc: 'Jingle Production adalah proses pembuatan musik pendek yang digunakan untuk branding, iklan, atau identitas audio perusahaan.', open: false },
                  { id: 2, title: 'Audio Branding', desc: 'Audio Branding adalah strategi menggunakan suara untuk memperkuat identitas merek secara konsisten di berbagai media.', open: false },
                  { id: 3, title: 'Automated Dialog Replacement', desc: 'Penyesuaian suara ulang untuk sinkronisasi dengan gambar.' , open: false },
                  { id: 4, title: 'Foley / SFX (Digital & Film)', desc: 'Efek suara yang dibuat untuk film atau media digital.', open: false },
                  { id: 5, title: 'Mixing', desc: 'Menggabungkan elemen audio untuk menciptakan hasil akhir yang harmonis.', open: false },
                  { id: 6, title: 'Scoring (Digital & Film)', desc: 'Pembuatan musik latar untuk memperkuat narasi visual.', open: false },
                  { id: 7, title: x'Voice Over (VO)', desc: 'Rekaman narasi untuk video atau media audio visual.', open: false },
                  { id: 8, title: 'Offline Video Editing Suite', desc: 'Fasilitas editing video sebelum proses finalisasi.', open: false }
                ]
              }"
          >
            <template x-for="(item, index) in items" :key="item.id">
              <div>
                <!-- Trigger -->
                <div 
                  @click="item.open = !item.open"
                  class="h-[60px] border-b-2 border-[#121212] flex items-center cursor-pointer"
                >
                  <p class="text-[40px] text-[#727070] font-semibold mr-10 tracking-tighter" x-text="String(index + 1).padStart(2, '0')"></p>
                  <p class="text-[40px] text-[#121212] font-semibold tracking-tighter mr-auto" x-text="item.title"></p>
                  <p class="text-[30px] text-[#121212] font-semibold" x-text="item.open ? '×' : '+'"></p>
                </div>

                <!-- Collapsible Content -->
                <div
                  class="collapsible px-4 text-[#333]"
                  :class="item.open && 'is-open'"
                  :style="item.open && { height: $el.scrollHeight + 'px' }"
                  @transitionend="if (!item.open) $el.style.height = null"
                >
                  <p class="py-3" x-text="item.desc"></p>
                </div>
              </div>
            </template>
          </div>
        </div>
    </div>


    </template>
  </div>
</body>
</html>
