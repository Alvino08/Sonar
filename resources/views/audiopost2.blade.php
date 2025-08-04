<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <title>Video Background Fullscreen</title>
  <style>
    /* Reset & base styles */
    * {
      box-sizing: border-box;
    }
    html, body {
      height: 100%;
      width: 100%;
      margin: 0;
      padding: 0;
      overflow: hidden;
    }

    /* Video & fallback image styles */
    .video-bg,
    .video-fallback {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      object-fit: fill;
      z-index: 0;
      pointer-events: none;
      background-size: fill;
      background-position: center;
    }

    /* Optional dark overlay for contrast */
    .video-overlay {
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, 0.35);
      z-index: 1;
      pointer-events: none;
    }

    /* Page content styling */
    .content {
      position: relative;
      z-index: 2;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: 1rem;
      text-align: center;
      color: white;
    }

    /* Hide video if user prefers reduced motion */
    @media (prefers-reduced-motion: reduce) {
      .video-bg {
        display: none;
      }
    }
  </style>
</head>
<body class="bg-black">

  <!-- Fallback image (shown if video cannot play) -->
  <div class="video-fallback" aria-hidden="true"
       style="background-image: url('{{ asset('video/SONAR-poster.jpg') }}');">
  </div>

  <!-- Video background -->
  <video
    id="bg-video"
    class="video-bg"
    autoplay
    muted
    loop
    playsinline
    preload="auto"
    poster="{{ asset('video/SONAR-poster.jpg') }}"
    aria-hidden="true"
  >
    <source src="{{ asset('video/SONAR.mp4') }}" type="video/mp4" />
    <p>Your browser does not support HTML5 video. Background image is shown instead.</p>
  </video>

  <!-- Optional overlay -->
  <div class="video-overlay" aria-hidden="true"></div>

  <!-- Foreground content -->
  <div class="content">
    <div class="max-w-2xl">
      <h1 class="text-4xl font-bold mb-4">Selamat Datang</h1>
      <p class="text-lg">Ini adalah contoh video background fullscreen yang responsif.</p>
    </div>
  </div>

  <script>
    // Pause video if user prefers reduced motion
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
      const video = document.getElementById('bg-video');
      if (video) {
        video.pause();
      }
    }

    // Try to play video (in case autoplay fails on mobile)
    function tryPlayVideo() {
      const video = document.getElementById('bg-video');
      if (!video) return;
      video.play().catch(() => {
        // Autoplay might be blocked, fallback to poster image
      });
    }

    // Attempt to play again after first user interaction
    ['click', 'touchstart'].forEach(evt =>
      document.addEventListener(evt, tryPlayVideo, { once: true })
    );
  </script>
</body>
</html>
