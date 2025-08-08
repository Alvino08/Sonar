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
    </style>
  </head>
  <body class="overflow-x-hidden invisible bg-[#121212]">
    <x-navbar />

    <div id="first-section" class="overflow-hidden">
      <div class="h-screen w-full bg-[#121212] flex items-center justify-center">
        <div class="h-[440px] w-[970px] flex items-center">
          <img src="/Audiopost/Audiopost-1.jpg" id="img-1" class="w-[345px] h-[345px] z-10 mr-[-80px]" />
          <img src="/Audiopost/Audiopost-2.jpg" id="img-2" class="w-[440px] h-[440px] z-20" />
          <img src="/Audiopost/Audiopost-3.jpg" id="img-3" class="w-[345px] h-[345px] z-10 ml-[-80px]" />
        </div>
      </div>
    </div>

    <div id="second-section" class="bg-[#121212] hidden">
      <section id="container">
        <!-- HALAMAN PERTAMA -->
        <div class="panel">
          <div id="halaman-pertama" class="halaman-pertama h-screen w-full bg-[#121212] items-center justify-center overflow-x-hidden flex">
            <img src="/Audiopost/Background 2.png" alt="Background" id="img-background"
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
          <div id="halaman-kedua" class="halaman-kedua relative h-screen w-full overflow-x-hidden flex flex-col justify-center items-center bg-[#202020]">
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
        <div id="halaman-ketiga" class="min-h-screen w-full bg-[#d0d0d0] overflow-x-hidden px-5 py-30 flex justify-between">
          <div class="h-[670px] w-[700px] ml-auto flex flex-col items-end justify-end pb-[9px] fade-section space-y-2">
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
        <div id="halaman-keempat" class="min-h-screen w-full bg-black overflow-hidden">
          <!-- Slider -->
          <div data-hs-carousel='{"loadingClasses": "opacity-0"}' class="relative">
            <div class="hs-carousel relative overflow-hidden w-full h-screen bg-black rounded-none">
              <!-- Slides -->
              <div class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-100">
                <!-- Slide 1 -->
                <div class="hs-carousel-slide w-screen h-screen flex items-center justify-center bg-black">
                  <iframe
                    class="w-full h-full object-cover"
                    src="https://www.youtube.com/embed/wv9zWCm6Ui4"
                    title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                  ></iframe>
                </div>
                <!-- Slide 2 -->
                <div class="hs-carousel-slide w-screen h-screen flex items-center justify-center bg-black">
                  <video class="w-full h-full object-cover" controls preload="metadata">
                    <source src="/video/SONAR.mp4" type="video/mp4" />
                    Browser kamu tidak mendukung video.
                  </video>
                </div>
                <!-- Slide 3 -->
                <div class="hs-carousel-slide w-screen h-screen flex items-center justify-center bg-black">
                  <video class="w-full h-full object-cover" controls preload="metadata">
                    <source src="/video/SONAR.mp4" type="video/mp4" />
                    Browser kamu tidak mendukung video.
                  </video>
                </div>
              </div>

              <!-- Pagination -->
              <div id="container-4" class="hs-carousel-pagination absolute h-full gap-y-10 px-5 z-10 flex flex-col justify-center">
                  <img src="/Audiopost/Background 2.png" class="hs-carousel-pagination-item w-30 h-18 object-cover rounded-md opacity-60 hover:opacity-100 cursor-pointer hs-carousel-active:opacity-100 border-2 border-white fade-item-service overflow-hidden transition-opacity" />
                  <img src="/Audiopost/Background 2.png" class="hs-carousel-pagination-item w-30 h-18 object-cover rounded-md opacity-60 hover:opacity-100 cursor-pointer hs-carousel-active:opacity-100 border-2 border-white fade-item-service overflow-hidden transition-opacity" />
                  <img src="/Audiopost/Background 2.png" class="hs-carousel-pagination-item w-30 h-18 object-cover rounded-md opacity-60 hover:opacity-100 cursor-pointer hs-carousel-active:opacity-100 border-2 border-white fade-item-service overflow-hidden transition-opacity" />
                <a href="/project" class=" bg-white text-black rounded-md text-sm font-medium hover:bg-gray-200 shadow-lg w-30 h-18 flex justify-center items-center text-center opacity-30 hover:opacity-100 fade-item-service overflow-hidden transition-opacity">
                  View More Projects
                </a>
              </div>

            </div>
          </div>
          <!-- End Slider -->

                    
        </div>

        <div class="h-screen w-full bg-gradient-to-br from-[#d0d0d0] to-[#202020] px-5 py-20 flex justify-center items-start">
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
  </body>
</html>


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
</script>



