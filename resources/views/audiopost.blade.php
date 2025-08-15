<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['resources/css/app.css', 'resources/js/audiopost.js'])
    <script src="./node_modules/preline/dist/preline.js"></script>
    <title>Layered Scroll</title>
    <style>
      #container {
        position: relative;
        width: 100%;
        height: 100vh;
        overflow: hidden;
      }

      .panel {
        width: 100%;
        height: 100vh;
        position: absolute;
        will-change: transform;
        display: flex;
        align-items: center;
      }

      section.content {
        position: relative;
      }

      .collapsible {
        height: 0;
        overflow: hidden;
        transition: height 0.4s ease, opacity 0.3s ease;
      }

      .collapsible.is-open {
        opacity: 1;
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
 
  .anton-outline {
  -webkit-text-stroke: 2px #ffffff;
  color: transparent;
  transition: all 0.8s ease;
} 

.anton-solid {
  -webkit-text-stroke: 0px transparent;
  color: #ffffff;
}



    </style>
    <script src="https://www.youtube.com/iframe_api"></script>
  </head>
  <body class="overflow-x-hidden invisible bg-noise">
    <x-navbar />

    <div id="first-section" class="overflow-hidden">
      <div class="h-screen w-full bg-noise flex items-center justify-center">
        <div class="h-[440px] w-[970px] flex items-center">
          <img src="/Audioposts/Audiopost-1.jpg" id="img-1" class="w-[345px] h-[345px] z-10 mr-[-80px]" />
          <img src="/Audioposts/Audiopost-2.jpg" id="img-2" class="w-[440px] h-[440px] z-20" />
          <img src="/Audioposts/Audiopost-3.jpg" id="img-3" class="w-[345px] h-[345px] z-10 ml-[-80px]" />
        </div>
      </div>
    </div>

    <div id="second-section" class="bg-[#121212] hidden">
      <section id="container">
        <!-- HALAMAN PERTAMA -->
        <div class="panel">
          <div id="halaman-pertama" class="halaman-pertama h-screen w-full bg-[#121212] items-center justify-center overflow-x-hidden flex">
            <img src="/Audioposts/Background 2.png" alt="Background" id="img-background"
              class="absolute inset-0 w-full h-full object-cover z-0 opacity-25 brightness-50" />
            <div class="flex flex-col items-center justify-center text-center">
              <p id="sonar" class="split text-[100px] font-bold text-white tracking-tighter mb-[-100px]">SONAR</p>
              <p id="audio" class="split text-[190px] font-bold text-white tracking-tighter">AUDIO</p>
              <p id="post" class="split text-[100px] font-bold text-white tracking-tighter mt-[-90px]">POST</p>
            </div>
          </div>
        </div>

        <!-- HALAMAN KEDUA -->
        <div class="panel">
          <div id="halaman-kedua" class="halaman-kedua relative h-screen w-full overflow-x-hidden flex flex-col justify-center items-center bg-noise">
            <div class="relative z-10 h-[600px] w-[475px] text-center flex flex-col justify-center">
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
        </div>
      </section>

      <!-- HALAMAN KETIGA -->
      <section class="content">
        <div id="halaman-ketiga" class="min-h-screen w-full bg-noise2 overflow-x-hidden px-5 py-30 flex justify-between">
          <div class="h-[670px] w-[700px] ml-auto flex flex-col items-end justify-end pb-[9px] fade-section space-y-2" data-speed="2">
            <div class="overflow-hidden mb-[-100px]">
              <p class="font-anton text-[160px] text-[#121212] fade-item">OUR</p>
            </div>
            <div class="overflow-hidden">
              <p class="font-anton text-[160px] text-[#121212] fade-item">SERVICES</p>
            </div>
          </div>

          <div id="container-3" class="flex pt-5 mx-auto">
            <div class="min-h-[300px] w-[700px] flex flex-col space-y-4"
              x-data="{
                items: [
                  { id: 1, title: 'Jingle Production', desc: 'Catchy tunes that stick in your head—and sell your brand. We make your product sing (literally).', open: false },
                  { id: 2, title: 'Audio Branding', desc: 'Your brand\'s sound identity. Signature sounds that say you without saying a word.', open: false },
                  { id: 3, title: 'Automated Dialog Replacement', desc: 'Fixing messy dialogue in post. We re-record voices so they sound crystal-clear and perfectly synced.' , open: false },
                  { id: 4, title: 'Foley / SFX (Digital & Film)', desc: 'Boom! Crash! Whoosh! We design sound effects that make your visuals come alive.', open: false },
                  { id: 5, title: 'Mixing', desc: 'We balance every sound and boost it to perfection—so your audio is ready for any speaker, screen, or stage.', open: false },
                  { id: 6, title: 'Scoring (Digital & Film)', desc: 'Original music that fits your story like a glove. Emotion, tension, drama—we\'ve got the feels.', open: false },
                  { id: 7, title: 'Voice Over (VO)', desc: 'We cast, direct, and record the perfect voice for your ads, videos, or animated characters.', open: false },
                  { id: 8, title: 'Offline Video Editing Suite', desc: 'Before color and polish, we shape your story. Cutting clips, adding rhythm, telling it right.', open: false }
                ],
                toggleOpen(index) {
                  this.items[index].open = !this.items[index].open;
                }
              }">
              <template x-for="(item, index) in items" :key="item.id">
                <div>
                  <!-- Bungkus untuk masking -->
                  <div class="overflow-hidden ">
                    <!-- Trigger -->
                    <div @click="toggleOpen(index)" class="h-[60px] flex items-center cursor-pointer border-b-2 border-[#121212]">
                      <p class="text-[40px] text-[#727070] font-semibold mr-10 tracking-tighter"
                        x-text="String(index + 1).padStart(2, '0')"></p>
                      <p class="text-[40px] text-[#121212] font-semibold tracking-tighter mr-auto"
                        x-text="item.title"></p>
                      <p class="text-[30px] text-[#121212] font-semibold"
                        x-text="item.open ? '×' : '+'"></p>
                    </div>
                  </div>

                  <!-- Collapsible Content -->
                  <div
                    class="collapsible text-[#333]"
                    :class="item.open && 'is-open'"
                    :style="item.open && { height: $el.scrollHeight + 'px' }"
                    @transitionend="if (!item.open) $el.style.height = null">
                    <p class="py-3 text-[20px] text-[#727070] font-semibold tracking-tight leading-6"
                      x-text="item.desc"></p>
                  </div>
                </div>
              </template>

            </div>
          </div>
        </div>


        <!-- HALAMAN KEEMPAT -->
        <div id="halaman-keempat" class="min-h-screen w-full bg-black overflow-hidden group">
          <!-- Slider -->
          <div data-hs-carousel='{"loadingClasses": "opacity-0"}' class="relative">

            <div class="hs-carousel relative overflow-hidden w-full h-screen bg-black rounded-none">

              <!-- Slides -->
              <div class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-100">
                {{-- @forelse($audioposts as $index => $post)
                  <div class="hs-carousel-slide w-screen h-screen flex flex-col items-center justify-center bg-black relative">
                    <div class="relative w-full h-full">
                      <iframe
                        id="player-{{ $index }}"
                        class="w-full h-full object-cover"
                        src="{{ $post->link }}?rel=0&modestbranding=1&iv_load_policy=3&controls=0&enablejsapi=1"
                        title="{{ $post->nama_projek }}"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                      ></iframe>
                    </div>
                  </div>
                
                  @empty
                  <div class="hs-carousel-slide w-screen h-screen flex items-center justify-center bg-black text-white text-2xl">
                    Belum ada project yang tersedia.
                  </div>
                @endforelse --}}

                @forelse($audioposts as $index => $post)
                  <div class="hs-carousel-slide w-screen h-screen flex flex-col items-center justify-center bg-black relative">
                    <div class="relative w-full h-full">

                      <!-- Overlay judul -->
                      {{-- <div 
                        id="overlay-title-{{ $index }}" 
                        class=" absolute bottom-[110px] px-4 py-2 rounded-lg text-lg transition-opacity duration-300 z-50 w-screen flex justify-center"
                      >
                        <p class="font-anton anton-outline tracking-wider text-2xl">{{ $post->nama_projek }}</p>
                      </div> --}}
                      <div 
                        id="overlay-title-{{ $index }}" 
                        class="absolute bottom-[110px] px-4 py-2 rounded-lg text-lg transition-opacity duration-300 z-50 w-screen flex justify-center opacity-0"
                      >
                        <p class="font-anton text-6xl project-title tracking-wider text-white uppercase">
                          {{ $post->nama_projek }}
                        </p>
                      </div>

                      <iframe
                        id="player-{{ $index }}"
                        class="w-full h-full object-cover"
                        src="{{ $post->link }}?rel=0&modestbranding=1&iv_load_policy=3&controls=0&enablejsapi=1"
                        title="{{ $post->nama_projek }}"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                      ></iframe>
                    </div>
                  </div>
                @empty
                  <div class="hs-carousel-slide w-screen h-screen flex items-center justify-center bg-black text-white text-2xl">
                    Belum ada project yang tersedia.
                  </div>
                @endforelse
              </div>

              <!-- Pagination di bawah tanpa background -->
              <div
                id="container-4"
                class="hs-carousel-pagination absolute bottom-0 left-0 w-full flex justify-center items-center overflow-x-auto scrollbar-hide opacity-0 group-hover:opacity-100 transition-opacity duration-300"
              >
                @forelse($audioposts as $post)
                  <div class="hs-carousel-pagination-item transition-transform duration-300 ease-out">
                    <img
                      src="{{ $post->thumbnail ? asset('storage/' . $post->thumbnail) : asset('default-thumbnail.jpg') }}"
                      class="thumbnail-img w-[200px] aspect-video object-cover opacity-60 hover:opacity-100 cursor-pointer hs-carousel-active:opacity-100"
                    />
                  </div>
                @empty
                  <div class="flex-shrink-0 snap-center">
                    <img
                      src="/Audiopost/placeholder.png"
                      class="w-[200px] aspect-video object-cover rounded-md opacity-40 border-2 border-dashed border-gray-400"
                      title="Tidak ada project"
                    />
                  </div>
                @endforelse
              </div>

              <!-- overlay jduul -->
              <div>
                <!-- mengambil judul dari database dengan nama kolom "nama_projek" -->
              </div>

              <!-- Navigasi -->
              <button
                type="button"
                class="hs-carousel-prev hs-carousel-disabled:opacity-50 absolute inset-y-0 start-0 inline-flex justify-center items-center w-11.5 h-full text-white hover:bg-gray-800/10"
              >
                <svg class="size-5" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="m15 18-6-6 6-6"></path>
                </svg>
              </button>

              <button
                type="button"
                class="hs-carousel-next hs-carousel-disabled:opacity-50 absolute inset-y-0 end-0 inline-flex justify-center items-center w-11.5 h-full text-white hover:bg-gray-800/10"
              >
                <svg class="size-5" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="m9 18 6-6-6-6"></path>
                </svg>
              </button>

            </div>
          </div>
        </div>



        <div class="h-screen w-full bg-noise px-5 py-20 flex justify-center items-start">
          <div class="backdrop-blur-md  shadow-xl p-6 w-full max-w-5xl ">
            
            <!-- Header Navigasi -->
            <div class="flex justify-between items-center mb-4">
              <button id="prevMonth" class="text-white font-bold text-xl hover:scale-110 transition">&larr;</button>
              <h2 id="monthYear" class="text-2xl font-extrabold text-white tracking-wide"></h2>
              <button id="nextMonth" class="text-white font-bold text-xl hover:scale-110 transition">&rarr;</button>
            </div>

            <!-- Header Hari -->
            <div class="grid grid-cols-7 grid-rows-1 h-[100px] text-center font-semibold text-white border-b border-white/30 text-sm">
              <div class=" flex items-center justify-center border border-white/10">Sun</div>
              <div class=" flex items-center justify-center border border-white/10">Mon</div>
              <div class=" flex items-center justify-center border border-white/10">Tue</div>
              <div class=" flex items-center justify-center border border-white/10">Wed</div>
              <div class=" flex items-center justify-center border border-white/10">Thu</div>
              <div class=" flex items-center justify-center border border-white/10">Fri</div>
              <div class=" flex items-center justify-center border border-white/10">Sat</div>
            </div>


            <!-- Grid Kalender -->
            <div id="calendarDays" class="grid grid-cols-7 text-center text-white"></div>
          </div>
        </div>

      </section>
    </div>
<x-footer/>


  </body>
</html>

{{-- <script src="https://www.youtube.com/iframe_api"></script> --}}
<script>
  const tanggalTerisi = @json($tanggalTerisi);
  const calendarDays = document.getElementById('calendarDays');
  const monthYear = document.getElementById('monthYear');
  const prevMonth = document.getElementById('prevMonth');
  const nextMonth = document.getElementById('nextMonth');

  let currentDate = new Date();
  const today = new Date();

  function renderCalendar() {
    const year = currentDate.getFullYear();
    const month = currentDate.getMonth();
    const firstDay = new Date(year, month, 1).getDay();
    const lastDate = new Date(year, month + 1, 0).getDate();

    // Set judul bulan & tahun
    monthYear.textContent = currentDate.toLocaleString('default', {
      month: 'long',
      year: 'numeric',
    });

    calendarDays.innerHTML = '';

    // Cek apakah bulan yang sedang dilihat adalah bulan lampau
    const isPast =
      year < today.getFullYear() ||
      (year === today.getFullYear() && month < today.getMonth());

    prevMonth.disabled = isPast;
    prevMonth.classList.toggle('opacity-30', isPast);
    prevMonth.classList.toggle('cursor-not-allowed', isPast);

    // Slot kosong sebelum tanggal 1
    for (let i = 0; i < firstDay; i++) {
      const emptyCell = document.createElement('div');
      emptyCell.className = 'border border-white/10 h-[100px]';
      calendarDays.appendChild(emptyCell);
    }

    for (let day = 1; day <= lastDate; day++) {
      const date = new Date(year, month, day);
      const dateString = date.getFullYear() + '-' +
                  String(date.getMonth() + 1).padStart(2, '0') + '-' +
                  String(date.getDate()).padStart(2, '0');

      const isToday =
        date.getFullYear() === today.getFullYear() &&
        date.getMonth() === today.getMonth() &&
        date.getDate() === today.getDate();

      const isPastDate = date < new Date(today.getFullYear(), today.getMonth(), today.getDate());
      const isBooked = tanggalTerisi.includes(dateString);

      const dayBox = document.createElement('div');
      dayBox.textContent = day;

      dayBox.className = `
        flex items-center justify-center border border-white/10 h-[100px]
        ${isPastDate && !isToday ? 'text-white/40' : ''}
        ${!isPastDate && !isBooked ? 'hover:bg-white/10 cursor-pointer transition' : ''}
        ${isBooked ? 'bg-[#8a0606] text-white font-extrabold' : ''}
      `;

      // Kalau tanggal belum terisi dan belum lewat → klik menuju WhatsApp
      if (!isPastDate && !isBooked) {
        dayBox.addEventListener('click', () => {
          const waNumber = "6281586246031"; // ganti dengan nomor WhatsApp tujuan (format internasional tanpa +)
          const message = `Halo, saya ingin memesan untuk tanggal ${dateString}`;
          const waLink = `https://wa.me/${waNumber}?text=${encodeURIComponent(message)}`;
          window.open(waLink, '_blank');
        });
      }

      calendarDays.appendChild(dayBox);
    }

        // ${isToday ? 'bg-[#8a0606] text-white font-extrabold' : ''}

  }

  prevMonth.addEventListener('click', () => {
    const tempDate = new Date(currentDate);
    tempDate.setMonth(tempDate.getMonth() - 1);

    if (
      tempDate.getFullYear() > today.getFullYear() ||
      (tempDate.getFullYear() === today.getFullYear() &&
        tempDate.getMonth() >= today.getMonth())
    ) {
      currentDate = tempDate;
      renderCalendar();
    }
  });

  nextMonth.addEventListener('click', () => {
    currentDate.setMonth(currentDate.getMonth() + 1);
    renderCalendar();
  });

  renderCalendar();

const players = [];
let hasUserStarted = false;
let isInViewport = false;  // status apakah carousel/slide terlihat di viewport

function onYouTubeIframeAPIReady() {
  console.log("YouTube API ready, initializing players...");
  document.querySelectorAll('iframe[id^="player-"]').forEach((iframe, index) => {
    players[index] = new YT.Player(iframe.id, {
      events: {
        'onReady': (event) => {
          console.log(`Player ${index} ready`);
        },
        // 'onStateChange': (event) => {
        //   console.log(`Player ${index} state changed to: `, event.data);

        //   if (!hasUserStarted && event.data === YT.PlayerState.PLAYING) {
        //     console.log("User started video playback for the first time");
        //     hasUserStarted = true;
        //   }

        //   // Jika video berakhir
        //   if (event.data === YT.PlayerState.ENDED) {
        //     goToNextSlide(index);
        //   }
        // }
        'onStateChange': (event) => {
          console.log(`Player ${index} state changed to: `, event.data);

          const overlay = document.getElementById(`overlay-title-${index}`);

          // Tampilkan overlay ketika video diputar
          if (event.data === YT.PlayerState.PLAYING) {
            // overlay.classList.remove("opacity-0");
            // overlay.classList.add("opacity-100");
            // window.textBlur();
            hasUserStarted = true;
            titleOverlay(index); // Jalankan animasi GSAP
          } else {
            // Sembunyikan overlay saat pause, buffering, atau selesai
            overlay.classList.remove("opacity-100");
            overlay.classList.add("opacity-0");
          }

          // Auto ke slide berikutnya kalau selesai
          if (event.data === YT.PlayerState.ENDED) {
            goToNextSlide(index);
          }
        }
      }
    });
  });
  observeActiveSlide();
  observeViewportVisibility();
}

function goToNextSlide(currentIndex) {
  const slides = Array.from(document.querySelectorAll('.hs-carousel-slide'));
  let nextIndex = currentIndex + 1;

  if (nextIndex >= slides.length) {
    nextIndex = 0;
  }

  // Selalu pakai tombol navigasi bawaan
  if (nextIndex === 0) {
    // Trik: klik prev beberapa kali atau langsung pakai pagination item pertama
    document.querySelectorAll('.hs-carousel-pagination-item')[0]?.click();
  } else {
    document.querySelector('.hs-carousel-next')?.click();
  }

  // Mainkan video di slide berikutnya
  setTimeout(() => {
    pauseAllExcept(nextIndex);
  }, 600); // beri jeda sesuai durasi transisi carousel
}



function pauseAllExcept(activeIndex) {
  console.log(`pauseAllExcept called with activeIndex: ${activeIndex}, isInViewport: ${isInViewport}`);
  players.forEach((player, i) => {
    if (player && player.pauseVideo) {
      if (i === activeIndex && hasUserStarted && isInViewport) {
        console.log(`Autoplay enabled, playing player ${i}`);
        player.playVideo();
      } else {
        console.log(`Pausing player ${i}`);
        player.pauseVideo();
      }
    } else {
      console.log(`Player ${i} not ready yet`);
    }
  });
}

function observeActiveSlide() {
  const carouselBody = document.querySelector('.hs-carousel-body');
  if (!carouselBody) {
    console.warn("carouselBody element not found");
    return;
  }
  console.log("Observing active slide changes...");

  let lastActiveIndex = -1;

  const observer = new MutationObserver(() => {
    const slides = carouselBody.querySelectorAll('.hs-carousel-slide');
    let activeIndex = -1;

    slides.forEach((slide, i) => {
      if (slide.classList.contains('active')) {
        activeIndex = i;
      }
    });

    if (activeIndex !== -1 && activeIndex !== lastActiveIndex) {
      console.log(`Active slide changed to ${activeIndex}`);
      lastActiveIndex = activeIndex;
      pauseAllExcept(activeIndex);
    }
  });

  observer.observe(carouselBody, {
    attributes: true,
    subtree: true,
    attributeFilter: ['class']
  });

  setTimeout(() => {
    const slides = carouselBody.querySelectorAll('.hs-carousel-slide');
    let activeIndex = -1;
    slides.forEach((slide, i) => {
      if (slide.classList.contains('active')) {
        activeIndex = i;
      }
    });
    console.log(`Initial active slide index: ${activeIndex}`);
    pauseAllExcept(activeIndex);
  }, 1000);
}

function observeViewportVisibility() {
  const carousel = document.querySelector('#halaman-keempat');
  if (!carousel) {
    console.warn("Carousel element not found for viewport observer");
    return;
  }

  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        console.log("Carousel entered viewport");
        isInViewport = true;
      } else {
        console.log("Carousel left viewport");
        isInViewport = false;
        // Jika carousel keluar viewport, pause semua video
        players.forEach(player => {
          if (player && player.pauseVideo) {
            player.pauseVideo();
          }
        });
      }
      // Update play/pause state dengan kondisi baru
      // Cek slide aktif agar tetap sinkron
      const activeSlide = document.querySelector('.hs-carousel-slide.active');
      if (activeSlide) {
        const slides = Array.from(document.querySelectorAll('.hs-carousel-slide'));
        const activeIndex = slides.indexOf(activeSlide);
        pauseAllExcept(activeIndex);
      }
    });
  }, {
    threshold: 0.1  // trigger jika minimal 10% elemen terlihat
  });

  observer.observe(carousel);
}


</script>



