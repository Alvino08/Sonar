{{-- <style>
  /* NAVBAR STYLE
  .nav-glass {
    background-color: rgba(0, 0, 0, 0.6) !important;
    backdrop-filter: blur(10px) !important;
    -webkit-backdrop-filter: blur(10px) !important;
    transition: all 1s ease;
  } */

  .nav-transparent {
    background-color: transparent !important;
    backdrop-filter: none !important;
    -webkit-backdrop-filter: none !important;
    transition: all 1s ease;
  }

  /* SIDEBAR STYLE */
  .glass-sidebar {
    background-color: rgba(0, 0, 0, 0.3);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border-right: 1px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.4);
  }
</style>


<!-- Sidebar Navbar -->
<nav 
  x-data="{ sidebarOpen: false }" 
  class="nav-transparent fixed top-0 left-0 w-full z-50 text-white px-6 py-4 flex items-start justify-center"
>
  <!-- Overlay Blur Layer -->
  <div 
    x-show="sidebarOpen"
    x-transition:enter="transition duration-300 ease-out"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition duration-200 ease-in"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-40 bg-black/30 backdrop-blur-sm "
    @click="sidebarOpen = false"
  ></div>

  <!-- Sidebar Panel -->
  <div 
    x-show="sidebarOpen" 
    x-transition:enter="transition-all transform duration-300 ease-out"
    x-transition:enter-start="-translate-x-full opacity-0"
    x-transition:enter-end="translate-x-0 opacity-100"
    x-transition:leave="transition-all transform duration-200 ease-in"
    x-transition:leave-start="translate-x-0 opacity-100"
    x-transition:leave-end="-translate-x-full opacity-0"

    class="fixed top-0 left-0 h-full w-64 text-white z-50 p-6 glass-sidebar"
    @click.outside="sidebarOpen = false"
  >

    <ul class="space-y-4 mt-10 text-lg">
      <li><a href="#" class="hover:underline">Home</a></li>
      <li><a href="#" class="hover:underline">About</a></li>
      <li><a href="#" class="hover:underline">Services</a></li>
      <li><a href="#" class="hover:underline">Contact</a></li>
    </ul>
  </div>

  <!-- Hamburger Button -->
  <div class="absolute left-6 z-50">
    <button @click="sidebarOpen = true">
      <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
      </svg>
    </button>
  </div>

  <!-- Logo Tengah -->
  <div class="flex justify-center items-start">
    <img src="/images/logo.png" class="w-[200px] object-contain" alt="Logo">
  </div>

  <!-- Contact Button -->
  <div class="absolute right-6 z-50 text-xl">
    <p class="hover:underline">CONTACT</p>
  </div> */ --}}
</nav>

<!-- Sidebar Navbar -->
{{-- <nav 
  x-data="{ sidebarOpen: false }" 
  :class="sidebarOpen ? 'nav-solid' : 'nav-glass'"
  class="fixed top-0 left-0 w-full z-[60] text-white px-6 py-4 flex items-start justify-center transition-all"
>
  <!-- Overlay Blur Layer (Tidak menutupi navbar karena pakai top-[70px]) -->
  <div 
    x-show="sidebarOpen"
    x-transition:enter="transition duration-300 ease-out"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition duration-200 ease-in"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed left-0 right-0 bottom-0 top-[70px] z-40 bg-black/30 backdrop-blur-sm"
    @click="sidebarOpen = false"
  ></div>

  <!-- Sidebar Panel -->
  <div 
    x-show="sidebarOpen" 
    x-transition:enter="transition-all transform duration-300 ease-out"
    x-transition:enter-start="-translate-x-full opacity-0"
    x-transition:enter-end="translate-x-0 opacity-100"
    x-transition:leave="transition-all transform duration-200 ease-in"
    x-transition:leave-start="translate-x-0 opacity-100"
    x-transition:leave-end="-translate-x-full opacity-0"
    class="fixed top-0 left-0 h-full w-64 text-white z-50 p-6 glass-sidebar"
    @click.outside="sidebarOpen = false"
  >
    <ul class="space-y-4 mt-10 text-lg">
      <li><a href="#" class="hover:underline">Home</a></li>
      <li><a href="#" class="hover:underline">About</a></li>
      <li><a href="#" class="hover:underline">Services</a></li>
      <li><a href="#" class="hover:underline">Contact</a></li>
    </ul>
  </div>

  <!-- Hamburger Button -->
  <div class="absolute left-6 z-50">
    <button @click="sidebarOpen = true">
      <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
      </svg>
    </button>
  </div>

  <!-- Logo Tengah -->
  <div class="flex justify-center items-start">
    <img src="/images/logo.png" class="w-[200px] object-contain" alt="Logo">
  </div>

  <!-- Contact Button -->
  <div class="absolute right-6 z-50 text-xl">
    <p class="hover:underline">CONTACT</p>
  </div>
</nav> --}}


<!-- Sidebar Navbar -->

      {{-- // function backToPage1() {
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
      // } --}}