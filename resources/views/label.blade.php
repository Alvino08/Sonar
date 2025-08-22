<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/label.js'])
    <script src="https://unpkg.com/split-type"></script>
    <title>Document</title>
    <style>
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

    .bg-noise3 {
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 700 700"><defs><filter id="nnnoise-filter" x="-20%" y="-20%" width="140%" height="140%" filterUnits="objectBoundingBox" primitiveUnits="userSpaceOnUse" color-interpolation-filters="linearRGB"><feTurbulence type="fractalNoise" baseFrequency="0.102" numOctaves="4" seed="15" stitchTiles="stitch" x="0%" y="0%" width="100%" height="100%" result="turbulence"/><feSpecularLighting surfaceScale="15" specularConstant="0.75" specularExponent="20" lighting-color="%237e7e7e" x="0%" y="0%" width="100%" height="100%" in="turbulence" result="specularLighting"><feDistantLight azimuth="3" elevation="100"/></feSpecularLighting></filter></defs><rect width="700" height="700" fill="%23121212"/><rect width="700" height="700" fill="%237e7e7e" filter="url(%23nnnoise-filter)"/></svg>');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }

    .dark-bg {
        background-image: url('/Kelana/BG SUBMIT DEMO.png');
        background-size: cover;
        background-position: center;
        /* filter: brightness(10); makin kecil makin gelap */
        }
        
        .stock-ticker {
        font-size: clamp(24px, 8vw, 96px); /* min 24px, naik sesuai layar, max 96px */
        padding-block: 8px;
        overflow: hidden;
        user-select: none;
        color: white;

        --gap: 0.75em;
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
        animation: scroll 100s linear infinite;
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

        .invert {
            filter: invert(1);
        }

        /* Posisi overlay transisi */
        #transisi-enter {
            position: fixed;
            inset: 0;
            z-index: 9999;
            pointer-events: none; /* Supaya ga ganggu interaksi */
            opacity: 1;
            transition: opacity 1.5s ease; /* efek memudar */
        }

        /* Class untuk mulai fade-out */
        #transisi-enter.fade-out {
            opacity: 0;
        }

        .scroll-video {
            display: block;
            pointer-events: none;
            z-index: 0; 
        }

        
    </style>
</head>
<body id="body" class="bg-black overflow-y-hidden">
    <x-navbar/>

    <div id="transisi-enter" class="fixed inset-0">
        <video autoplay muted playsinline
            src="{{ asset('/Kelana/KELANA_MUSIK_LOADING_FIXED.mp4') }}"
            class="w-full h-full object-cover bg-black"></video>
    </div>

    <section id="second-section" class="hidden">
        <div class="h-screen">
            <video autoplay muted loop playsinline
            src="{{ asset('video/SONAR.mp4') }}" class="w-full h-full object-cover"></video>
        </div>

        <!-- HTML -->
        {{-- <div class="h-screen w-full bg-black xl:py-40 xl:px-30 py-10 px-8 md:px-15 md:py-20 flex flex-col justify-center xl:flex-row xl:justify-between overflow-y-hidden">
        <!-- Text -->
            <div class="font-anton text-white text-[15px] md:text-[20px] xl:text-[32px] tracking-wide container w-screen xl:w-[800px] mb-10 xl:mb-0">
                <p class="animate-me font-workSans xl:w-[800px] text-justify">
                    Kelana Musik is a Jakarta-based music label dedicated to crafting chill-out and ambient electronic sounds infused with the rich colors and textures of Indonesia. We blend modern electronic production with local influences — capturing the rhythm of the city, the calm of nature, and the warmth of our culture. Our mission is simple: to create music that lets you wander, drift, and discover new emotional landscapes, wherever you are in the world.
                </p>
            </div>

            <!-- Video -->
            <div class="md:flex hidden w-full xl:w-[300px] flex-col mx-auto xl:mx-30 justify-end items-center scroll-this">
                <div class="aspect-square">
                    <video
                        class="scroll-video xl:w-full xl:h-full w-[50px] md:w-[100px] object-cover"
                        playsinline
                        webkit-playsinline
                        preload="auto"
                        muted
                        src="{{ asset('/Kelana/output_square.mp4') }}">
                    </video>
                </div>
            </div>
        </div> --}}

        <div class="h-screen w-full bg-black xl:py-40 xl:px-30 py-10 px-8 md:px-15 md:py-20 flex flex-col justify-center xl:flex-row xl:justify-between overflow-x-hidden">
            <!-- Text -->
            <div class="font-anton text-white text-[15px] md:text-[20px] xl:text-[32px] tracking-wide container xl:w-[800px] mb-10 xl:mb-0">
                <p class="animate-me font-workSans text-justify">
                    Kelana Musik is a Jakarta-based music label dedicated to crafting chill-out and ambient electronic sounds infused with the rich colors and textures of Indonesia. We blend modern electronic production with local influences — capturing the rhythm of the city, the calm of nature, and the warmth of our culture. Our mission is simple: to create music that lets you wander, drift, and discover new emotional landscapes, wherever you are in the world.
                </p>
            </div>

            <!-- Video -->
            <div class="md:flex hidden w-full xl:w-[300px] flex-col mx-auto xl:mx-30 justify-end items-center scroll-this">
                <div class="aspect-square">
                    <video
                        class="scroll-video xl:w-full xl:h-full w-[50px] md:w-[100px] object-cover"
                        playsinline
                        webkit-playsinline
                        preload="auto"
                        muted
                        src="{{ asset('/Kelana/output_square.mp4') }}">
                    </video>
                </div>
            </div>
        </div>



        {{-- <div id="scroll-area" style="height: 400vh;"></div> --}}


        <div class="min-h-screen w-full bg-noise overflow-hidden">
            <div class="stock-ticker bg-noise2 font-anton tracking-[0.75em]">
                <ul>
                    <li>
                        <span class="company">RELEASES</span>
                        <span class="company">•</span>
                        <span class="company">RELEASES</span>
                        <span class="company">•</span>
                    </li>
                    <li>
                        <span class="company">RELEASES</span>
                        <span class="company">•</span>
                        <span class="company">RELEASES</span>
                        <span class="company">•</span>
                    </li>
                    <li>
                        <span class="company">RELEASES</span>
                        <span class="company">•</span>
                        <span class="company">RELEASES</span>
                        <span class="company">•</span>
                    </li>
                    <li>
                        <span class="company">RELEASES</span>
                        <span class="company">•</span>
                        <span class="company">RELEASES</span>
                        <span class="company">•</span>
                    </li>
                    <li>
                        <span class="company">RELEASES</span>
                        <span class="company">•</span>
                        <span class="company">RELEASES</span>
                        <span class="company">•</span>
                    </li>
                    <li>
                        <span class="company">RELEASES</span>
                        <span class="company">•</span>
                        <span class="company">RELEASES</span>
                        <span class="company">•</span>
                    </li>
                    <li>
                        <span class="company">RELEASES</span>
                        <span class="company">•</span>
                        <span class="company">RELEASES</span>
                        <span class="company">•</span>
                    </li>
                    <li>
                        <span class="company">RELEASES</span>
                        <span class="company">•</span>
                        <span class="company">RELEASES</span>
                        <span class="company">•</span>
                    </li>
                </ul>

                <ul aria-hidden="true">
                    <li>
                        <span class="company">RELEASES</span>
                        <span class="company">•</span>
                        <span class="company">RELEASES</span>
                        <span class="company">•</span>
                    </li>
                    <li>
                        <span class="company">RELEASES</span>
                        <span class="company">•</span>
                        <span class="company">RELEASES</span>
                        <span class="company">•</span>
                    </li>
                    <li>
                        <span class="company">RELEASES</span>
                        <span class="company">•</span>
                        <span class="company">RELEASES</span>
                        <span class="company">•</span>
                    </li>
                    <li>
                        <span class="company">RELEASES</span>
                        <span class="company">•</span>
                        <span class="company">RELEASES</span>
                        <span class="company">•</span>
                    </li>
                    <li>
                        <span class="company">RELEASES</span>
                        <span class="company">•</span>
                        <span class="company">RELEASES</span>
                        <span class="company">•</span>
                    </li>
                    <li>
                        <span class="company">RELEASES</span>
                        <span class="company">•</span>
                        <span class="company">RELEASES</span>
                        <span class="company">•</span>
                    </li>
                    <li>
                        <span class="company">RELEASES</span>
                        <span class="company">•</span>
                        <span class="company">RELEASES</span>
                        <span class="company">•</span>
                    </li>
                    <li>
                        <span class="company">RELEASES</span>
                        <span class="company">•</span>
                        <span class="company">RELEASES</span>
                        <span class="company">•</span>
                    </li>
                </ul>
            </div>

            
            <!-- versi desktop -->
            <div class="w-full min-h-screen xl:grid grid-cols-2 py-40 px-40 hidden">
                <div class="grid grid-rows-3 gap-y-20 text-white ">
                    <div data-speed="2.5">
                        <div class="flex justify-start overflow-hidden relative">
                            <div class="w-[300px] h-[300px] group relative flex justify-start">
                                <a href="https://open.spotify.com/intl-id/album/6Pg8Z4ntwzgeTnayMK5KHm" target="_blank" rel="noopener noreferrer" class="w-[300px] h-[300px] flex flex-col justify-end items-end z-10">
                                    <img src="/kelana/Raga EP_album_cover.jpg" alt="Raga EP album cover">
                                </a>
                                <div class="w-[500px] h-[300px] text-[20px] absolute duration-400 opacity-0 
                                            group-hover:opacity-100 transition-all z-0 right-[100%] group-hover:right-[-167%] 
                                            flex flex-col justify-end">
                                    <p class="font-anton text-8xl m-0">RAGA</p>
                                    <p class="font-worksans text-6xl mt-[-8px]">Suara Kelana</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end" data-speed="3">
                        <div class="w-[600px] h-[300px] flex justify-end overflow-hidden relative">
                            <div class="w-[300px] h-[300px] group relative flex justify-start">
                                <a href="https://open.spotify.com/intl-id/album/0aypoE04vvsjevivecNvZd" target="_blank" rel="noopener noreferrer" class="w-[300px] h-[300px] flex flex-col justify-end items-end z-10">
                                    <img src="/kelana/ToFly_album_cover.jpg" alt="To Fly album cover">
                                </a>
                                <div class="w-[300px] h-[300px] text-[20px] absolute duration-400 opacity-0 
                                            group-hover:opacity-100 transition-all z-0 left-[100%] group-hover:left-[-100%] 
                                            flex flex-col justify-end text-end">
                                    <p class=" font-anton text-8xl m-0">TO FLY</p>
                                    <p class=" font-worksans text-6xl mt-[-8px]">RZL</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div data-speed="2">
                        <div class="flex justify-start overflow-hidden relative">
                            <div class="w-[300px] h-[300px] group relative flex justify-start">
                                <a href="https://open.spotify.com/intl-id/album/7hOGZg4X8RwyqTmAcyv3qO" target="_blank" rel="noopener noreferrer" class="w-[300px] h-[300px] flex flex-col justify-end items-end z-10">
                                    <img src="/kelana/Taiyo_album_cover.jpg" alt="Taiyo album cover">
                                </a>
                                <div class="w-[300px] h-[300px] text-[20px] absolute duration-400 opacity-0 
                                            group-hover:opacity-100 transition-all z-0 right-[100%] group-hover:right-[-100%] 
                                            flex flex-col justify-end">
                                    <p class="font-anton text-8xl m-0">TAIYO</p>
                                    <p class="font-workSans text-6xl mt-[-8px]">LANKEI</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-rows-3 gap-y-20 text-white">
                    <div data-speed="3">
                        <div class="flex justify-start overflow-hidden relative">
                            <div class="w-[300px] h-[300px] group relative flex justify-start">
                                <a href="https://open.spotify.com/intl-id/album/4heYvtQLU9gvefmOgQHN9a" target="_blank" rel="noopener noreferrer" class="w-[300px] h-[300px] flex flex-col justify-end items-end z-10">
                                    <img src="/kelana/Ruang Ilusi_album_cover.jpg" alt="Ruang Ilusi album cover">
                                </a>
                                <div class="w-[500px] h-[300px] text-[20px] absolute duration-400 opacity-0 
                                            group-hover:opacity-100 transition-all z-0 right-[100%] group-hover:right-[-167%] 
                                            flex flex-col justify-end">
                                    <p class="font-anton text-8xl m-0">RUANG ILUSI</p>
                                    <p class="font-worksans text-6xl mt-[-8px]">Suara Kelana</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end" data-speed="2">
                        <div class="w-[700px] h-[300px] flex justify-end overflow-hidden relative">
                            <div class="w-[300px] h-[300px] group relative flex justify-start">
                                <a href="https://open.spotify.com/intl-id/album/0JzMjZOyLoRs5eaSg7wCzu" target="_blank" rel="noopener noreferrer" class="w-[300px] h-[300px] flex flex-col justify-end items-end z-10">
                                    <img src="/kelana/Fana_album_cover.jpg" alt="Fana album cover">
                                </a>
                                <div class="w-[500px] h-[300px] text-[20px] absolute duration-400 opacity-0 
                                            group-hover:opacity-100 transition-all z-0 left-[100%] group-hover:left-[-167%] 
                                            flex flex-col justify-end text-end">
                                    <p class="font-anton text-8xl m-0">FANA</p>
                                    <p class="font-workSans text-6xl mt-[-8px]">Ibam Adam</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div data-speed="2.5">
                        <div class="flex justify-start overflow-hidden relative">
                            <div class="w-[300px] h-[300px] group relative flex justify-start">
                                <a href="https://open.spotify.com/intl-id/album/3w55hVVh2rwwPD6ptFlnZn" target="_blank" rel="noopener noreferrer" class="w-[300px] h-[300px] flex flex-col justify-end items-end z-10">
                                    <img src="/kelana/Kembali_album_cover.jpg" alt="Kembali album cover">
                                </a>
                                <div class="w-[300px] h-[300px] text-[20px] absolute duration-400 opacity-0 
                                            group-hover:opacity-100 transition-all z-0 right-[100%] group-hover:right-[-100%] 
                                            flex flex-col justify-end">
                                    <p class="font-anton text-8xl m-0">KEMBALI</p>
                                    <p class="font-workSans text-6xl mt-[-8px]">LANKEI</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 

            <!-- Versi mobile/tablet -->
            <section class="xl:hidden block">
                <div class="w-full min-h-screen grid grid-cols-1 md:grid-cols-2 items-center gap-y-16 py-20 px-6 text-white">
                    
                    <!-- Item 1 -->
                    <div class="flex flex-col items-center text-center " data-speed="2.5">
                        <a href="https://open.spotify.com/intl-id/album/6Pg8Z4ntwzgeTnayMK5KHm" target="_blank" rel="noopener noreferrer">
                            <img src="/kelana/Raga EP_album_cover.jpg" alt="Raga EP album cover" class="w-[250px] h-[250px] object-cover">
                        </a>
                        <div class="mt-4">
                            <p class="font-anton text-5xl">RAGA</p>
                            <p class="font-worksans text-2xl">Suara Kelana</p>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="flex flex-col items-center text-center" data-speed="3">
                        <a href="https://open.spotify.com/intl-id/album/0aypoE04vvsjevivecNvZd" target="_blank" rel="noopener noreferrer">
                            <img src="/kelana/ToFly_album_cover.jpg" alt="To Fly album cover" class="w-[250px] h-[250px] object-cover">
                        </a>
                        <div class="mt-4">
                            <p class="font-anton text-5xl">TO FLY</p>
                            <p class="font-worksans text-2xl">RZL</p>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="flex flex-col items-center text-center" data-speed="2">
                        <a href="https://open.spotify.com/intl-id/album/7hOGZg4X8RwyqTmAcyv3qO" target="_blank" rel="noopener noreferrer">
                            <img src="/kelana/Taiyo_album_cover.jpg" alt="Taiyo album cover" class="w-[250px] h-[250px] object-cover">
                        </a>
                        <div class="mt-4">
                            <p class="font-anton text-5xl">TAIYO</p>
                            <p class="font-worksans text-2xl">LANKEI</p>
                        </div>
                    </div>

                    <!-- Item 4 -->
                    <div class="flex flex-col items-center text-center" data-speed="3">
                        <a href="https://open.spotify.com/intl-id/album/4heYvtQLU9gvefmOgQHN9a" target="_blank" rel="noopener noreferrer">
                            <img src="/kelana/Ruang Ilusi_album_cover.jpg" alt="Ruang Ilusi album cover" class="w-[250px] h-[250px] object-cover">
                        </a>
                        <div class="mt-4">
                            <p class="font-anton text-5xl">RUANG ILUSI</p>
                            <p class="font-worksans text-2xl">Suara Kelana</p>
                        </div>
                    </div>

                    <!-- Item 5 -->
                    <div class="flex flex-col items-center text-center" data-speed="2">
                        <a href="https://open.spotify.com/intl-id/album/0JzMjZOyLoRs5eaSg7wCzu" target="_blank" rel="noopener noreferrer">
                            <img src="/kelana/Fana_album_cover.jpg" alt="Fana album cover" class="w-[250px] h-[250px] object-cover">
                        </a>
                        <div class="mt-4">
                            <p class="font-anton text-5xl">FANA</p>
                            <p class="font-worksans text-2xl">Ibam Adam</p>
                        </div>
                    </div>

                    <!-- Item 6 -->
                    <div class="flex flex-col items-center text-center" data-speed="2.5">
                        <a href="https://open.spotify.com/intl-id/album/3w55hVVh2rwwPD6ptFlnZn" target="_blank" rel="noopener noreferrer">
                            <img src="/kelana/Kembali_album_cover.jpg" alt="Kembali album cover" class="w-[250px] h-[250px] object-cover">
                        </a>
                        <div class="mt-4">
                            <p class="font-anton text-5xl">KEMBALI</p>
                            <p class="font-worksans text-2xl">LANKEI</p>
                        </div>
                    </div>
                </div>
            </section>
            

            
        </div>

        <!-- section desktop -->
        <section class="hidden xl:block">
            <div class="h-screen w-full bg-[#3a3a3a] py-5 px-20 overflow-hidden">
                <div class="w-full font-anton text-[#f8f8f8] text-[128px] tracking-tight">
                    <p>ARTIST</p>
                </div>

                <div class="w-full flex flex-col text-[40pt] font-worksans font-bold mt-10 text-[#f8f8f8]">
                    <div class="w-[500px] hover:text-[75pt] hover:w-[800px] duration-500 mb-5 flex group relative">
                        <a class="hover:h-[150px]" href="https://open.spotify.com/intl-id/artist/0djfXKhDl6BI58Whv32kea" target="_blank" rel="noopener noreferrer">SUARA KELANA</a>

                        <!-- Foto muncul di tengah layar -->
                        <img src="/Kelana/Spotify Avatar OPT 1.png" 
                            alt="To Fly album cover"
                            class="opacity-0 group-hover:opacity-100 absolute left-200 w-[300px] h-[300px] object-cover duration-500 group-hover:top-8 transition-all z-0 top-10 pointer-events-none group-hover:pointer-events-auto">
                    </div>

                    <div class="w-[500px] hover:text-[75pt] hover:w-[800px] hover:h-[150px] duration-500 mb-5 group relative">
                        <a href="https://open.spotify.com/intl-id/artist/0EoJdO68QocXlLBO8B50Av" target="_blank" rel="noopener noreferrer">IBAM ADAM</a>
                        <img src="/Kelana/P1040444.jpg" 
                            alt="To Fly album cover"
                            class="opacity-0 group-hover:opacity-100 absolute left-160 w-[300px] h-[300px] object-cover duration-500 transition-all group-hover:top-8 z-0 top-10 pointer-events-none group-hover:pointer-events-auto">
                    </div>
                    <div class="w-[300px] hover:text-[75pt] hover:w-[600px] hover:h-[150px] duration-500 mb-5 group relative">
                        <a href="https://open.spotify.com/intl-id/artist/4IAohotRVmqywseyr3HBYK" target="_blank" rel="noopener noreferrer">LANKEI</a>
                        <img src="/Kelana/P1040503.jpg" 
                            alt="To Fly album cover"
                            class="opacity-0 group-hover:opacity-100 absolute left-100 w-[300px] h-[300px] object-cover duration-500 transition-all group-hover:top-8 z-0 top-10 pointer-events-none group-hover:pointer-events-auto">
                    </div>
                    <div class="w-[300px] hover:text-[75pt] hover:w-[600px] hover:h-[150px] duration-500 mb-5 group relative">
                        <a href="https://open.spotify.com/intl-id/artist/1ObjWAMyImOytrPADQgtni" target="_blank" rel="noopener noreferrer">RZL</a>
                        <img src="/Kelana/P1040532.jpg" 
                            alt="To Fly album cover"
                            class="opacity-0 group-hover:opacity-100 absolute left-50 w-[300px] h-[300px] object-cover duration-500 transition-all group-hover:top-8 z-0 top-10 pointer-events-none group-hover:pointer-events-auto">
                    </div>
                </div>

            </div>
        </section>

        <!-- section mobile & tablet -->
        <section class="block xl:hidden">
            <div class="w-full bg-[#3a3a3a] py-20 px-6 flex flex-col items-center gap-y-12">
                
                <div class="text-center w-full font-anton text-[#f8f8f8] text-6xl tracking-tight mb-6">
                    <p>ARTIST</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 w-full bg-[#3a3a3a] py-10 px-6 items-center gap-y-12">
                    <!-- SUARA KELANA -->
                    <div class="flex flex-col items-center text-center text-white">
                        <a href="https://open.spotify.com/intl-id/artist/0djfXKhDl6BI58Whv32kea" target="_blank" rel="noopener noreferrer">
                            <img src="/Kelana/Spotify Avatar OPT 1.png" alt="Suara Kelana" class="w-[250px] h-[250px] object-cover rounded-xl shadow-lg">
                        </a>
                        <p class="font-worksans text-2xl font-bold mt-4">SUARA KELANA</p>
                    </div>

                    <!-- IBAM ADAM -->
                    <div class="flex flex-col items-center text-center text-white">
                        <a href="https://open.spotify.com/intl-id/artist/0EoJdO68QocXlLBO8B50Av" target="_blank" rel="noopener noreferrer">
                            <img src="/Kelana/P1040444.jpg" alt="Ibam Adam" class="w-[250px] h-[250px] object-cover rounded-xl shadow-lg">
                        </a>
                        <p class="font-worksans text-2xl font-bold mt-4">IBAM ADAM</p>
                    </div>

                    <!-- LANKEI -->
                    <div class="flex flex-col items-center text-center text-white">
                        <a href="https://open.spotify.com/intl-id/artist/4IAohotRVmqywseyr3HBYK" target="_blank" rel="noopener noreferrer">
                            <img src="/Kelana/P1040503.jpg" alt="Lankei" class="w-[250px] h-[250px] object-cover rounded-xl shadow-lg">
                        </a>
                        <p class="font-worksans text-2xl font-bold mt-4">LANKEI</p>
                    </div>

                    <!-- RZL -->
                    <div class="flex flex-col items-center text-center text-white">
                        <a href="https://open.spotify.com/intl-id/artist/1ObjWAMyImOytrPADQgtni" target="_blank" rel="noopener noreferrer">
                            <img src="/Kelana/P1040532.jpg" alt="RZL" class="w-[250px] h-[250px] object-cover rounded-xl shadow-lg">
                        </a>
                        <p class="font-worksans text-2xl font-bold mt-4">RZL</p>
                    </div>
                </div>
            </div>
        </section>


        <!-- section desktop -->
        <section class="hidden xl:block">
            <div class="min-h-screen w-full px-30 py-20 bg-center bg-cover dark-bg">
                <div class="font-anton text-[156px] text-white mb-10 animate-submit overflow-hidden">
                    <p>SUBMIT DEMO</p>
                </div>

                <div class=" text-white mt-10 w-full flex justify-end ">
                    <div class=" w-[75%] h-[100%] p-5 font-worksans text-white text-[40px] text-justify leading-10 pb-20 animate-teks">
                        <p class="mb-10">Submit your demo submissions to <b>kelanamusik@gmail.com</b> and be sure to follow <b>@kelanamusik</b> to stay up to date on new music and artist signings.</p>
                        <br>
                        <p class="mb-10">We listen to all demos that are submitted to us, but please respect that we might take time to respond, due to many artists sending demos to us.</p>
                        <br>
                        <p>Your demo doesn't need to be perfect yet. We are listening to your potential, not the studio quality. If you have a work in progress and are really talented, then we will help you shape the edges.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- section mobile & tablet -->
        <section class="block xl:hidden">
        <div class="min-h-screen w-full px-6 py-16 bg-center bg-cover dark-bg flex flex-col items-center">
            
            <!-- Judul -->
            <div class="font-anton text-5xl md:text-7xl text-white mb-10 text-center animate-submit overflow-hidden">
            <p>SUBMIT DEMO</p>
            </div>

            <!-- Konten -->
            <div class="text-white font-worksans text-lg md:text-2xl leading-relaxed text-justify space-y-6 animate-teks">
            <p>
                Submit your demo submissions to 
                <b>kelanamusik@gmail.com</b> and be sure to follow 
                <b>@kelanamusik</b> to stay up to date on new music and artist signings.
            </p>

            <p>
                We listen to all demos that are submitted to us, but please respect that we might take time to respond, due to many artists sending demos to us.
            </p>

            <p>
                Your demo doesn't need to be perfect yet. We are listening to your potential, not the studio quality. If you have a work in progress and are really talented, then we will help you shape the edges.
            </p>
            </div>
            
        </div>
        </section>

        


        <x-footer/>
    </section>
    
</body>
</html>
{{-- 
<script src="https://unpkg.com/split-type"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script> --}}

{{-- <script>
let typeSplit = new SplitType('[animate]', {
  types: 'lines, words, chars',
  tagName: 'span'
})

gsap.from('[animate] .word', {
  y: '100%',
  opacity: 1,
  duration: 0.5,
  ease: 'power1.out',
  stagger: 0.25,
  
  scrollTrigger: {
    trigger: '[animate]',
    start: 'top center',
    
  }
})
</script> --}}