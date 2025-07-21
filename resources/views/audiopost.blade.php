<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/audiopost.js'])
  <title>Audiopost</title>
  <style>
    .line {
      overflow: hidden;
      display: block;
    }
    /* #container {
      position: relative;
      height: 100vh; 
      overflow: hidden;
    }

    .panel {
      position: absolute;
      width: 100%;
      height: 100vh;
      top: 0;
      left: 0;
    } */


  </style>
</head>
<body class="overflow-x-hidden overflow-y-hidden invisible">
{{-- <body class="overflow-x-hidden"> --}}

  <x-navbar />

  <div id="first-section" class="h-screen w-full bg-black flex items-center justify-center">
    <div class="h-[440px] w-[970px] flex items-center">
      <img src="/Audiopost/Jelita.png" id="img-1" class="w-[345px] h-[345px] z-0 mr-[-80px]">
      <img src="/Audiopost/Jelita.png" id="img-2" class="w-[440px] h-[440px] z-10 ">
      <img src="/Audiopost/Jelita.png" id="img-3" class="w-[345px] h-[345px] z-0 ml-[-80px]">
    </div>
  </div>

  <div id="second-section" class="w-full hidden">
    <div id="container">
      <div id="halaman-pertama" class="panel halaman-pertama h-screen w-full bg-[#202020] items-center justify-between overflow-x-hidden flex">
        <div id="left-photo" class="w-[435px] h-[435px]  rotate-[25deg] ml-[-180px] mt-[-150px] opacity-0">
          <img src="/Audiopost/Jelita.png" alt="">
        </div>
        <div class="h-[515px] w-[375px] flex flex-col items-center justify-center text-center">
          <p id="sonar" class="split text-[100px] font-bold text-white mb-[-100px] tracking-tighter">SONAR</p>
          <p id="audio" class="split text-[190px] font-bold text-white tracking-tighter">AUDIO</p>
          <p id="post" class="split text-[100px] font-bold text-white mt-[-90px] tracking-tighter">POST</p>
        </div>
        <div id="right-photo" class="w-[435px] h-[435px]  rotate-[-20deg] mr-[-180px] mb-[-150px] opacity-0">
          <img src="/Audiopost/Jelita.png" alt="">
        </div>  
      </div>

      <div id="halaman-kedua" class="panel halaman-kedua h-screen w-full bg-black items-center overflow-x-hidden flex justify-center">
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
    </div>
  </div>

</body>
</html>
