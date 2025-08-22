<style>
  .nav {
    background: rgba(0, 0, 0, 0.37);
    /* border-radius: 16px; */
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
    border: 1px solid rgba(255, 255, 255, 0.3);
  }
</style>

<script>
  function toggleMenu() {
    const menu = document.getElementById('nav-menu');
    menu.classList.toggle('hidden');
  }
</script>


<header x-data="{ open: false }" class="fixed w-full z-50 px-6 py-0 lg:py-6 flex items-center justify-center ">
  <!-- Logo -->
  <div class="absolute left-10 top-2 lg:top-5 z-50 ">
  <a href="/" class="block">
    <img src="/sonar/Sonar Logo Sep.svg" alt="Sonar Logo" class="h-8 lg:h-10 w-auto">
  </a>
</div>


  <!-- Desktop Navbar -->
  <nav class="nav hidden md:flex space-x-6 lg:space-x-8 px-6 py-2 lg:px-10 lg:py-3 absolute right-6 top-2 lg:top-5 rounded-[16px]">
    <a href="/" class="text-white hover:text-blue-400 text-sm lg:text-base font-semibold transition">Home</a>
    <a href="/audiopost" class="text-white hover:text-blue-400 text-sm lg:text-base font-semibold transition">Audiopost</a>
    <a href="/label" class="text-white hover:text-blue-400 text-sm lg:text-base font-semibold transition">Label</a>
    <a href="#contact" class="text-white hover:text-blue-400 text-sm lg:text-base font-semibold transition">Contact</a>
    {{-- <a href="/login" class="text-white hover:text-blue-400 text-sm lg:text-base font-semibold transition">Sign Up</a> --}}

    @guest
        <a href="{{ route('login') }}" class="text-white hover:text-blue-400 text-sm lg:text-base font-semibold transition">Sign Up</a>
    @endguest

    @auth
        <a href="{{ route('profile.edit') }}" class="text-white hover:text-blue-400 text-sm lg:text-base font-semibold transition">Profile</a>
    @endauth

  </nav>

  <!-- Hamburger Button -->
  <button @click="open = !open" class="md:hidden absolute right-6 top-2 lg:top-5 text-white z-[9999]">
    <svg class="w-7 h-7 lg:w-8 lg:h-8" fill="none" stroke="currentColor" stroke-width="2"
      viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
      <path d="M4 6h16M4 12h16M4 18h16" />
    </svg>
  </button>

  {{-- <div
      x-show="open"
      @click.away="open = false"
      x-transition:enter="transition ease-out duration-200"
      x-transition:enter-start="opacity-0 scale-95"
      x-transition:enter-end="opacity-100 scale-100"
      x-transition:leave="transition ease-in duration-100"
      x-transition:leave-start="opacity-100 scale-100"
      x-transition:leave-end="opacity-0 scale-95"
      class="nav flex flex-col space-y-3 px-4 py-3 absolute top-0 right-0 w-64 h-screen md:hidden rounded-[0px] z-[9999]"
  >
      <a href="/" class="text-white hover:text-blue-400 text-base font-semibold transition">Home</a>
      <a href="/audiopost" class="text-white hover:text-blue-400 text-base font-semibold transition">Audiopost</a>
      <a href="/label" class="text-white hover:text-blue-400 text-base font-semibold transition">Label</a>
      <a href="#contact" class="text-white hover:text-blue-400 text-base font-semibold transition">Contact</a>

      @guest
          <a href="{{ route('login') }}" class="text-white hover:text-blue-400 text-base font-semibold transition">Sign Up</a>
      @endguest

      @auth
          <a href="{{ route('profile.edit') }}" class="text-white hover:text-blue-400 text-base font-semibold transition">Profile</a>
      @endauth
  </div> --}}

  <div
    x-show="open"
    @click.away="open = false"
    x-transition:enter="transition ease-inOut duration-500"
    x-transition:enter-start="opacity-0 scale-100 translate-x-100"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-inOut duration-500"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-100 translate-x-100"
    class="nav flex flex-col space-y-3 px-4 py-3 absolute top-0 right-0 w-64 h-screen md:hidden rounded-[0px] z-[9999]"
>
    <!-- Tombol tutup -->
    <button @click="open = false" class="self-end mb-4 text-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 lg:h-7 lg:w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    <a href="/" class="text-white hover:text-blue-400 text-base font-semibold transition">Home</a>
    <a href="/audiopost" class="text-white hover:text-blue-400 text-base font-semibold transition">Audiopost</a>
    <a href="/label" class="text-white hover:text-blue-400 text-base font-semibold transition">Label</a>
    <a href="#contact" class="text-white hover:text-blue-400 text-base font-semibold transition">Contact</a>

    @guest
        <a href="{{ route('login') }}" class="text-white hover:text-blue-400 text-base font-semibold transition">Sign Up</a>
    @endguest

    @auth
        <a href="{{ route('profile.edit') }}" class="text-white hover:text-blue-400 text-base font-semibold transition">Profile</a>
    @endauth
</div>


</header>
