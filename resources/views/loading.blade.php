<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  @vite(['resources/css/app.css', 'resources/js/audiopost2.js'])
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

    .stock-ticker {
        font-size: 64px;
        padding-block: 8px;
        overflow: hidden;
        user-select: none;

        --gap: 20px;
        display: flex;
        gap: var(--gap);
        }

    .stock-ticker ul {
    list-style: none;
    flex-shrink: 0;
    min-width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: var(--gap);


    animation: scroll 20s linear infinite;
    }

    .stock-ticker:hover ul {
    animation-play-state: paused;
    }

    @keyframes scroll {
    to {
        transform: translateX(calc(-100% - var(--gap)));
    }
    }
    
    .stock-ticker .company,
    .stock-ticker .price {
    font-weight: bold;
    }
  </style>
</head>
<body>
  <x-navbar />
  <div class="min-h-screen">

  </div>
<div id="halaman-keempat" class="min-h-screen w-full bg-[#d0d0d0] overflow-x-hidden px-5 py-30 flex justify-between">
                <div class=" min-h-[300px] w-[700px] ml-auto">
                    <div class="stock-ticker">
                    <ul>
                        <li>
                        <span class="company">OUR</span>
                        <span class="company">©</span>
                        <span class="company">SERVICES</span>
                        <span class="company">©</span>
                        </li>
                        <li>
                        <span class="company">OUR</span>
                        <span class="company">©</span>
                        <span class="company">SERVICES</span>
                        <span class="company">©</span>
                        </li>
                        <li>
                        <span class="company">OUR</span>
                        <span class="company">©</span>
                        <span class="company">SERVICES</span>
                        <span class="company">©</span>
                        </li>
                        <li>
                        <span class="company">OUR</span>
                        <span class="company">©</span>
                        <span class="company">SERVICES</span>
                        <span class="company">©</span>
                        </li>
                        <li>
                        <span class="company">OUR</span>
                        <span class="company">©</span>
                        <span class="company">SERVICES</span>
                        <span class="company">©</span>
                        </li>
                        <li>
                        <span class="company">OUR</span>
                        <span class="company">©</span>
                        <span class="company">SERVICES</span>
                        <span class="company">©</span>
                        </li>
                        <li>
                        <span class="company">OUR</span>
                        <span class="company">©</span>
                        <span class="company">SERVICES</span>
                        <span class="company">©</span>
                        </li>
                        <li>
                        <span class="company">OUR</span>
                        <span class="company">©</span>
                        <span class="company">SERVICES</span>
                        <span class="company">©</span>
                        </li>
                    </ul>

                    <ul aria-hidden="true">
                        <li>
                        <span class="company">OUR</span>
                        <span class="company">©</span>
                        <span class="company">SERVICES</span>
                        <span class="company">©</span>
                        </li>
                        <li>
                        <span class="company">OUR</span>
                        <span class="company">©</span>
                        <span class="company">SERVICES</span>
                        <span class="company">©</span>
                        </li>
                        <li>
                        <span class="company">OUR</span>
                        <span class="company">©</span>
                        <span class="company">SERVICES</span>
                        <span class="company">©</span>
                        </li>
                        <li>
                        <span class="company">OUR</span>
                        <span class="company">©</span>
                        <span class="company">SERVICES</span>
                        <span class="company">©</span>
                        </li>
                        <li>
                        <span class="company">OUR</span>
                        <span class="company">©</span>
                        <span class="company">SERVICES</span>
                        <span class="company">©</span>
                        </li>
                        <li>
                        <span class="company">OUR</span>
                        <span class="company">©</span>
                        <span class="company">SERVICES</span>
                        <span class="company">©</span>
                        </li>
                        <li>
                        <span class="company">OUR</span>
                        <span class="company">©</span>
                        <span class="company">SERVICES</span>
                        <span class="company">©</span>
                        </li>
                        <li>
                        <span class="company">OUR</span>
                        <span class="company">©</span>
                        <span class="company">SERVICES</span>
                        <span class="company">©</span>
                        </li>
                    </ul>
                    </div>

                    <div id="logo-sonar" class="w-[500px] h-[500px] mx-auto flex flex-col items-center justify-center">
                      <!-- Baris pertama: S O N -->
                      <div class="flex mb-[-70px]">
                        <div class="w-[164px] h-[380px] mr-[-75px]">
                          <img src="/Audiopost/SONAR ILLUS - S.png" alt="" class="letter-s">
                        </div>
                        <div class="w-[120px] h-[180px] ml-[40px] mr-[-67px] mt-[170px]">
                          <img src="/Audiopost/SONAR ILLUS - O.png" alt="" class="letter-o">
                        </div>
                        <div class="w-[186px] h-[280px] mt-30">
                          <img src="/Audiopost/SONAR ILLUS - N.png" alt="" class="letter-n">
                        </div>
                      </div>
                      
                      <!-- Baris kedua: A R -->
                      <div class="flex mt-[-70px]">
                        <div  class="w-[158px] h-[242px]">
                          <img src="/Audiopost/SONAR ILLUS - A.png" alt="" class="letter-a">
                        </div>
                        <div class="w-[182px] h-[300px] ml-[-45px] mt-[20px]">
                          <img src="/Audiopost/SONAR ILLUS - R.png" alt="" class="letter-r">
                        </div>
                      </div>
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
</body>
</html>
