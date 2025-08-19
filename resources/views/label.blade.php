<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/label.js'])
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


        .stock-ticker {
            font-size: 96px;
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
}

        
    </style>
</head>
<body>
    <x-navbar/>

    {{-- <div id="transisi-enter">
        <video autoplay muted playsinline
            src="{{ asset('/Kelana/KELANA_MUSIK_LOADING_FIXED.mp4') }}"
            class="w-full h-full object-cover"></video>
    </div> --}}


    <div class="h-screen">
        <video autoplay muted loop playsinline
        src="{{ asset('video/SONAR.mp4') }}" class="w-full h-full object-cover"></video>
    </div>

    {{-- <div class="h-screen w-full bg-noise3 py-40 px-30 flex">
        <div class="font-anton text-white w-[135vh] text-5xl tracking-wide text-justify container">
            <p  class="animate-me">Kelana Musik is a Jakarta-based music label dedicated to crafting chill-out and ambient electronic sounds infused with the rich colors and textures of Indonesia. We blend modern electronic production with local influences—capturing the rhythm of the city, the calm of nature, and the warmth of our culture. Our mission is simple: to create music that lets you wander, drift, and discover new emotional landscapes, wherever you are in the world.</p>
        </div>

        <div class="w-[300px] flex flex-col mx-30 bg-amber-300 justify-end">
            <div class="aspect-square bg-amber-600">
                <video autoplay muted loop playsinline
                src="{{ asset('/Kelana/Kelana Musik Page 2.mp4') }}" class="w-full h-full object-cover scroll-video"></video>
            </div>
        </div>
    </div> --}}

    <!-- HTML -->
    <div class="h-screen w-full bg-noise3 py-40 px-30 flex">
    <div class="font-anton text-white w-[135vh] text-5xl tracking-wide text-justify container">
        <p class="animate-me">
        Kelana Musik is a Jakarta-based music label dedicated to crafting chill-out and ambient electronic sounds infused with the rich colors and textures of Indonesia. We blend modern electronic production with local influences—capturing the rhythm of the city, the calm of nature, and the warmth of our culture. Our mission is simple: to create music that lets you wander, drift, and discover new emotional landscapes, wherever you are in the world.
        </p>
    </div>

    <div class="w-[300px] flex flex-col mx-30 justify-end">
        <div class="aspect-square">
        <video
            class="scroll-video w-full h-full object-cover"
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


    <div class="min-h-screen w-full bg-noise">
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

        <div class="w-full min-h-screen grid grid-cols-2 py-40 px-40">
            <div class="grid grid-rows-3 gap-y-20 text-white ">
                <div data-speed="2.5">
                    <div class="flex justify-start overflow-hidden relative">
                        <div class="w-[300px] h-[300px] group relative flex justify-start">
                            <div class="w-[300px] h-[300px] flex flex-col justify-end items-end z-10">
                                <img src="/kelana/Raga EP_album_cover.jpg" alt="Raga EP album cover">
                            </div>
                            <div class="w-[500px] h-[300px] text-[20px] absolute duration-400 opacity-0 
                                        group-hover:opacity-100 transition-all z-0 right-[100%] group-hover:right-[-167%] 
                                        font-anton flex flex-col justify-end">
                                <p class="text-8xl m-0">RAGA</p>
                                <p class="text-6xl mt-[-8px]">Suara Kelana</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end" data-speed="3">
                    <div class="w-[600px] h-[300px] flex justify-end overflow-hidden relative">
                        <div class="w-[300px] h-[300px] group relative flex justify-start">
                            <div class="w-[300px] h-[300px] flex flex-col justify-end items-end z-10">
                                <img src="/kelana/ToFly_album_cover.jpg" alt="To Fly album cover">
                            </div>
                            <div class="w-[300px] h-[300px] text-[20px] absolute duration-400 opacity-0 
                                        group-hover:opacity-100 transition-all z-0 left-[100%] group-hover:left-[-100%] 
                                        font-anton flex flex-col justify-end text-end">
                                <p class="text-8xl m-0">TO FLY</p>
                                <p class="text-6xl mt-[-8px]">RZL</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div data-speed="2">
                    <div class="flex justify-start overflow-hidden relative">
                        <div class="w-[300px] h-[300px] group relative flex justify-start">
                            <div class="w-[300px] h-[300px] flex flex-col justify-end items-end z-10">
                                <img src="/kelana/Taiyo_album_cover.jpg" alt="Taiyo album cover">
                            </div>
                            <div class="w-[300px] h-[300px] text-[20px] absolute duration-400 opacity-0 
                                        group-hover:opacity-100 transition-all z-0 right-[100%] group-hover:right-[-100%] 
                                        font-anton flex flex-col justify-end">
                                <p class="text-8xl m-0">TAIYO</p>
                                <p class="text-6xl mt-[-8px]">LANKEI</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-rows-3 gap-y-20 text-white">
                <div data-speed="3">
                    <div class="flex justify-start overflow-hidden relative">
                        <div class="w-[300px] h-[300px] group relative flex justify-start">
                            <div class="w-[300px] h-[300px] flex flex-col justify-end items-end z-10">
                                <img src="/kelana/Ruang Ilusi_album_cover.jpg" alt="Ruang Ilusi album cover">
                            </div>
                            <div class="w-[500px] h-[300px] text-[20px] absolute duration-400 opacity-0 
                                        group-hover:opacity-100 transition-all z-0 right-[100%] group-hover:right-[-167%] 
                                        font-anton flex flex-col justify-end">
                                <p class="text-8xl m-0">RUANG ILUSI</p>
                                <p class="text-6xl mt-[-8px]">Suara Kelana</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end" data-speed="2">
                    <div class="w-[600px] h-[300px] flex justify-end overflow-hidden relative">
                        <div class="w-[300px] h-[300px] group relative flex justify-start">
                            <div class="w-[300px] h-[300px] flex flex-col justify-end items-end z-10">
                                <img src="/kelana/Fana_album_cover.jpg" alt="Fana album cover">
                            </div>
                            <div class="w-[300px] h-[300px] text-[20px] absolute duration-400 opacity-0 
                                        group-hover:opacity-100 transition-all z-0 left-[100%] group-hover:left-[-100%] 
                                        font-anton flex flex-col justify-end text-end">
                                <p class="text-8xl m-0">FANA</p>
                                <p class="text-6xl mt-[-8px]">Ibam Adam</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div data-speed="2.5">
                    <div class="flex justify-start overflow-hidden relative">
                        <div class="w-[300px] h-[300px] group relative flex justify-start">
                            <div class="w-[300px] h-[300px] flex flex-col justify-end items-end z-10">
                                <img src="/kelana/Kembali_album_cover.jpg" alt="Kembali album cover">
                            </div>
                            <div class="w-[300px] h-[300px] text-[20px] absolute duration-400 opacity-0 
                                        group-hover:opacity-100 transition-all z-0 right-[100%] group-hover:right-[-100%] 
                                        font-anton flex flex-col justify-end">
                                <p class="text-8xl m-0">TAIYO</p>
                                <p class="text-6xl mt-[-8px]">LANKEI</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="h-screen w-full bg-[#3a3a3a] py-5 px-20">
        <div class="w-full font-anton text-[#f8f8f8] text-[128px] tracking-tight">
            <p>ARTIST</p>
        </div>

        <div class="w-full flex flex-col text-[40pt] font-anton mt-10 text-[#f8f8f8]">
            <div class="w-[300px] hover:text-[75pt] hover:w-[600px] duration-500 mb-5 flex group relative">
                <p class="hover:h-[150px]">SUARA KELANA</p>

                <!-- Foto muncul di tengah layar -->
                <img src="/Kelana/Spotify Avatar OPT 1.png" 
                    alt="To Fly album cover"
                    class="opacity-0 group-hover:opacity-100 absolute left-145 w-[300px] h-[300px] object-cover duration-500 group-hover:top-8 transition-all z-0 top-10 pointer-events-none group-hover:pointer-events-auto">
            </div>

            <div class="w-[300px] hover:text-[75pt] hover:w-[600px] hover:h-[150px] duration-500 mb-5 group relative">
                <p>IBAM ADAM</p>
                <img src="/Kelana/P1040444.jpg" 
                    alt="To Fly album cover"
                    class="opacity-0 group-hover:opacity-100 absolute left-120 w-[300px] h-[300px] object-cover duration-500 transition-all group-hover:top-8 z-0 top-10 pointer-events-none group-hover:pointer-events-auto">
            </div>
            <div class="w-[300px] hover:text-[75pt] hover:w-[600px] hover:h-[150px] duration-500 mb-5 group relative">
                <p>LANKEI</p>
                <img src="/Kelana/P1040503.jpg" 
                    alt="To Fly album cover"
                    class="opacity-0 group-hover:opacity-100 absolute left-75 w-[300px] h-[300px] object-cover duration-500 transition-all group-hover:top-8 z-0 top-10 pointer-events-none group-hover:pointer-events-auto">
            </div>
            <div class="w-[300px] hover:text-[75pt] hover:w-[600px] hover:h-[150px] duration-500 mb-5 group relative">
                <p>RZL</p>
                <img src="/Kelana/P1040532.jpg" 
                    alt="To Fly album cover"
                    class="opacity-0 group-hover:opacity-100 absolute left-40 w-[300px] h-[300px] object-cover duration-500 transition-all group-hover:top-8 z-0 top-10 pointer-events-none group-hover:pointer-events-auto">
            </div>
        </div>

    </div>

    <div class="min-h-screen w-full px-30 py-20 bg-center bg-cover" style="background-image: url('/Kelana/BG SUBMIT DEMO.png');">
        <div class="font-anton text-[156px] text-white mb-10">
            <p>SUBMIT DEMO</p>
        </div>

        <div class="font-anton text-8xl text-white mt-10 w-full h-[600px] flex justify-end">
            <div class=" w-[75%] h-[100%] p-5 font-anton text-white text-5xl text-justify">
                <p>Submit your demo submissions to kelanamusik@gmail.com and be sure to follow @kelanamusik to stay up to date on new music and artist signings.</p>
                <br>
                <p>We listen to all demos that are submitted to us, but please respect that we might take time to respond, due to many artists sending demos to us.</p>
                <br>
                <p>Your demo doesn't need to be perfect yet. We are listening to your potential, not the studio quality. If you have a work in progress and are really talented, then we will help you shape the edges.</p>
            </div>
        </div>
    </div>


    <x-footer/>
</body>
</html>