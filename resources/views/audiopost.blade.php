<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  @vite(['resources/css/app.css', 'resources/js/audiopost.js'])
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
      /* opacity: 0; */
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
        <div id="first-section" class="h-screen w-full bg-[#121212] flex items-center justify-center">
            <div class="h-[440px] w-[970px] flex items-center">
                <img src="/Audiopost/Audiopost-1.jpg" id="img-1" class="w-[345px] h-[345px] z-10 mr-[-80px]">
                <img src="/Audiopost/Audiopost-2.jpg" id="img-2" class="w-[440px] h-[440px] z-20">
                <img src="/Audiopost/Audiopost-3.jpg" id="img-3" class="w-[345px] h-[345px] z-10 ml-[-80px]">
            </div>
        </div>
    </div>

    <div id="second-section" class="bg-[#121212] hidden"> 
        <section id="container"> 
            <div class="panel">
                <div id="halaman-pertama" class="halaman-pertama h-screen w-full bg-[#121212] items-center justify-center overflow-x-hidden flex">
                  <img src="/Audiopost/Background 2.png" alt="Background" id="img-background"
                      class="absolute inset-0 w-full h-full object-cover z-0 opacity-25 brightness-50" />
                    {{-- <div id="left-img" class="rotate-[25deg] w-[435px] h-[435px] -left-20 -top-20 relative opacity-0">
                        <img src="/Audiopost/Jelita.png" alt="">
                    </div> --}}
                    <div class=" flex flex-col items-center justify-center text-center">
                        <p id="sonar" class="split text-[100px] font-bold text-white tracking-tighter mb-[-100px]">SONAR</p>
                        <p id="audio" class="split text-[190px] font-bold text-white tracking-tighter">AUDIO</p>
                        <p id="post" class="split text-[100px] font-bold text-white tracking-tighter mt-[-90px]">POST</p>
                    </div>
                    {{-- <div id="right-img" class="rotate-[-20deg] w-[435px] h-[435px] -right-20 -bottom-20 relative opacity-0">
                        <img src="/Audiopost/Jelita.png" alt="">
                    </div> --}}
                </div>
            </div>

            <div class="panel">
                {{-- <div id="halaman-kedua" class="halaman-kedua h-screen w-full items-center overflow-x-hidden flex flex-col justify-center">
                  <div class="w-screen h-screen">
                    <img src="/Audiopost/Background 2.png" alt="" class="w-screen h-screen">
                  </div> 
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
                </div> --}}

                <div id="halaman-kedua" class="halaman-kedua relative h-screen w-full overflow-x-hidden flex flex-col justify-center items-center bg-[#202020]">
                  <!-- Background Image as Absolute -->
                  {{-- <img src="/Audiopost/Background 2.png" alt="Background" 
                      class="absolute inset-0 w-full h-full object-cover z-0 opacity-25 brightness-50" /> --}}

                  <!-- Text Content (on top of the image) -->
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

        <section class="content">
            <div id="halaman-keempat" class="min-h-screen w-full bg-[#d0d0d0] overflow-x-hidden px-5 py-30 flex justify-between">
                {{-- <div class="min-h-[300px] w-[700px] ml-auto flex flex-col items-end justify-end pb-[9px] fade-section">
                  <p class="font-anton text-[160px] text-[#121212] leading-12 fade-item">OUR</p>
                  <p class="font-anton text-[160px] text-[#121212] fade-item">SERVICES</p>
                </div> --}}
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
                    }"
                    >
                        <template x-for="(item, index) in items" :key="item.id">
                            <div>
                            <!-- Trigger -->
                                <div 
                                    @click="toggleOpen(index)"
                                    class="h-[60px] border-b-2 border-[#121212] flex items-center cursor-pointer"
                                >
                                    <p class="text-[40px] text-[#727070] font-semibold mr-10 tracking-tighter" 
                                    x-text="String(index + 1).padStart(2, '0')"></p>
                                    <p class="text-[40px] text-[#121212] font-semibold tracking-tighter mr-auto" 
                                    x-text="item.title"></p>
                                    <p class="text-[30px] text-[#121212] font-semibold" 
                                    x-text="item.open ? '×' : '+'"></p>
                                </div>

                                <!-- Collapsible Content -->
                                <div
                                        class="collapsible text-[#333]"
                                        :class="item.open && 'is-open'"
                                        :style="item.open && { height: $el.scrollHeight + 'px' }"
                                        @transitionend="if (!item.open) $el.style.height = null"
                                        >
                                    <p class="py-3 text-[20px] text-[#727070] font-semibold tracking-tight leading-6" x-text="item.desc"></p>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>


        </section>
    </div>


</body>
</html>
