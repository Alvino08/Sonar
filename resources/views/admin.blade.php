{{-- <!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full flex" x-data="{ section: 'jadwal' }">

  @if(session('error'))
    <div 
      x-data="{ show: true }" 
      x-init="setTimeout(() => show = false, 4000)" 
      x-show="show" 
      x-transition 
      class="fixed top-6 right-6 z-50 bg-red-500 text-white px-6 py-4 rounded shadow-lg"
    >
      {{ session('error') }}
    </div>
  @endif

  @if(session('success'))
    <div 
      x-data="{ show: true }" 
      x-init="setTimeout(() => show = false, 4000)" 
      x-show="show" 
      x-transition 
      class="fixed top-6 right-6 z-50 bg-green-500 text-white px-6 py-4 rounded shadow-lg"
    >
      {{ session('success') }}
    </div>
  @endif

  <!-- Sidebar -->
  <aside class="w-64 bg-gray-800 text-white flex flex-col">
    <div class="p-4 text-xl font-bold">Admin Panel</div>
    <nav class="flex-1 p-2">
      <ul class="space-y-2">
        <li>
          <a href="#" @click.prevent="section = 'jadwal'" class="block p-2 rounded hover:bg-gray-700">Calendar</a>
        </li>
        <li>
          <a href="#" @click.prevent="section = 'audiopost'" class="block p-2 rounded hover:bg-gray-700">Audiopost Project</a>
        </li>
        <li>
          <a href="#" class="block p-2 rounded hover:bg-gray-700">Project</a>
        </li>
      </ul>
    </nav>
    <div class="p-4 border-t border-gray-700">
      <button class="w-full p-2 bg-red-500 hover:bg-red-600 rounded">Logout</button>
    </div>
  </aside>

  <!-- Main content -->
  <main class="flex-1 p-6 overflow-y-auto">

    <!-- SECTION: JADWAL -->
    <section x-show="section === 'jadwal'" x-transition id="jadwal">
      <section class="bg-white rounded shadow p-6 mt-6">
        <h2 class="text-lg font-bold mb-4 text-gray-800">Tambah Jadwal</h2>
        <form method="POST" action="{{ route('jadwal.store') }}" class="space-y-4">
          @csrf

          <div>
            <label class="block text-gray-700">Nama</label>
            <input type="text" name="nama" class="w-full border rounded px-3 py-2" required>
          </div>

          <div>
            <label class="block text-gray-700">Tanggal</label>
            <input type="date" name="tanggal" class="w-full border rounded px-3 py-2" required>
          </div>

          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="block text-gray-700">Jam Mulai</label>
              <input type="time" name="jam_mulai" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
              <label class="block text-gray-700">Jam Selesai</label>
              <input type="time" name="jam_selesai" class="w-full border rounded px-3 py-2" required>
            </div>
          </div>

          <div>
            <label class="block text-gray-700">Catatan</label>
            <textarea name="note" rows="3" class="w-full border rounded px-3 py-2"></textarea>
          </div>

          <div class="flex items-center">
            <input type="checkbox" name="tambahkan_ke_google" id="tambahkan_ke_google" class="mr-2">
            <label for="tambahkan_ke_google" class="text-gray-700">Tambahkan ke Google Calendar</label>
          </div>

          <div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
              Simpan Jadwal
            </button>
          </div>
        </form>
      </section>

      <section class="bg-white rounded shadow p-6 mt-6">
        <h2 class="text-lg font-bold mb-4 text-gray-800">Daftar Jadwal</h2>
        <ul class="space-y-2">
          @foreach(\App\Models\Jadwal::orderBy('tanggal')->get() as $j)
          <li class="flex justify-between items-center p-3 bg-gray-100 rounded">
            <div>
              <strong>{{ $j->nama }}</strong><br>
              {{ $j->tanggal }} | {{ $j->jam_mulai }} - {{ $j->jam_selesai }}
            </div>
            <form method="POST" action="{{ route('jadwal.destroy', $j->id) }}">
              @csrf
              @method('DELETE')
              <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                      onclick="return confirm('Yakin ingin menghapus jadwal ini?')">
                Hapus
              </button>
            </form>
          </li>
          @endforeach
        </ul>
      </section>
    </section>

    <!-- SECTION: AUDIOPOST -->
    <section x-show="section === 'audiopost'" x-transition id="Audiopost-project">
  <div class="bg-white rounded shadow p-6 mt-6">
    <h2 class="text-lg font-bold mb-4 text-gray-800">Audiopost Project</h2>

    <form method="POST" action="{{ route('audiopost.store') }}" class="space-y-4 mb-6">
      @csrf
      <div>
        <label class="block text-gray-700">Nama Project</label>
        <input type="text" name="nama_projek" class="w-full border rounded px-3 py-2" required>
      </div>

      <div>
        <label class="block text-gray-700">Link</label>
        <input type="url" name="link" class="w-full border rounded px-3 py-2" required>
      </div>

      <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Simpan Project
      </button>
    </form>

    <ul class="space-y-2">
      @foreach(\App\Models\Audiopost::all() as $a)
        <li class="flex justify-between items-center p-3 bg-gray-100 rounded">
          <div>
            <strong>{{ $a->nama_projek }}</strong><br>
            <a href="{{ $a->link }}" class="text-blue-600 underline" target="_blank">{{ $a->link }}</a>
          </div>
          <form method="POST" action="{{ route('audiopost.destroy', $a->id) }}">
            @csrf
            @method('DELETE')
            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                    onclick="return confirm('Yakin ingin menghapus project ini?')">
              Hapus
            </button>
          </form>
        </li>
      @endforeach
    </ul>
  </div>
</section>


  </main>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en" x-data="{ openMenu : false, section: 'jadwal' }" :class="openMenu ? 'overflow-hidden' : 'overflow-visible'">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="//unpkg.com/alpinejs" defer></script>
  <style>
    [x-cloak] {
      display: none !important;
    }
  </style>
</head>

<body class="bg-gray-100">

  <!-- Mobile Navbar -->
  <div class="md:hidden flex items-center justify-between bg-white p-4 shadow">
    <span class="text-xl font-bold">Admin Panel</span>
    <button @click="openMenu = !openMenu" aria-label="Toggle Sidebar">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path x-show="!openMenu" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        <path x-show="openMenu" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
  </div>

  <!-- Sidebar -->
  <aside
    class="fixed inset-y-0 left-0 w-64 bg-gray-800 text-white z-40 transform md:translate-x-0 transition-transform duration-300"
    :class="openMenu ? 'translate-x-0' : '-translate-x-full'" x-cloak>
    <div class="p-4 text-xl font-bold border-b border-gray-700">Admin Panel</div>

    <nav class="p-4 flex-1 overflow-y-auto">
      <ul class="space-y-2">
        <li><a href="#" @click.prevent="section = 'jadwal'; openMenu = false" class="block p-2 rounded hover:bg-gray-700">Calendar</a></li>
        <li><a href="#" @click.prevent="section = 'audiopost'; openMenu = false" class="block p-2 rounded hover:bg-gray-700">Audiopost Project</a></li>
        <li><a href="#" class="block p-2 rounded hover:bg-gray-700">Project</a></li>
      </ul>
    </nav>

    <div class="p-4 border-t border-gray-700">
      <button class="w-full p-2 bg-red-500 hover:bg-red-600 rounded">Logout</button>
    </div>
  </aside>

  <!-- Overlay (Mobile Only) -->
  <div class="fixed inset-0 bg-black bg-opacity-30 z-30 md:hidden" x-show="openMenu" @click="openMenu = false" x-cloak x-transition></div>

  <!-- Main Content -->
  <main class="md:ml-64 p-6">

    <!-- Flash Messages -->
    @if(session('error'))
      <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
        class="fixed top-6 right-6 z-50 bg-red-500 text-white px-6 py-4 rounded shadow-lg">
        {{ session('error') }}
      </div>
    @endif

    @if(session('success'))
      <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
        class="fixed top-6 right-6 z-50 bg-green-500 text-white px-6 py-4 rounded shadow-lg">
        {{ session('success') }}
      </div>
    @endif

    <!-- Section: Jadwal -->
    <section x-show="section === 'jadwal'" x-transition>
      <section class="bg-white rounded shadow p-6 mb-6">
        <h2 class="text-lg font-bold mb-4 text-gray-800">Tambah Jadwal</h2>
        <form method="POST" action="{{ route('jadwal.store') }}" class="space-y-4">
          @csrf

          <div>
            <label class="block text-gray-700">Nama</label>
            <input type="text" name="nama" class="w-full border rounded px-3 py-2" required>
          </div>

          <div>
            <label class="block text-gray-700">Tanggal</label>
            <input type="date" name="tanggal" class="w-full border rounded px-3 py-2" required>
          </div>

          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="block text-gray-700">Jam Mulai</label>
              <input type="time" name="jam_mulai" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
              <label class="block text-gray-700">Jam Selesai</label>
              <input type="time" name="jam_selesai" class="w-full border rounded px-3 py-2" required>
            </div>
          </div>

          <div>
            <label class="block text-gray-700">Catatan</label>
            <textarea name="note" rows="3" class="w-full border rounded px-3 py-2"></textarea>
          </div>

          <div class="flex items-center">
            <input type="checkbox" name="tambahkan_ke_google" id="tambahkan_ke_google" class="mr-2">
            <label for="tambahkan_ke_google" class="text-gray-700">Tambahkan ke Google Calendar</label>
          </div>

          <div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan Jadwal</button>
          </div>
        </form>
      </section>

      <section class="bg-white rounded shadow p-6">
        <h2 class="text-lg font-bold mb-4 text-gray-800">Daftar Jadwal</h2>
        <ul class="space-y-2">
          @foreach(\App\Models\Jadwal::orderBy('tanggal')->get() as $j)
          <li class="flex justify-between items-center p-3 bg-gray-100 rounded">
            <div>
              <strong>{{ $j->nama }}</strong><br>
              {{ $j->tanggal }} | {{ $j->jam_mulai }} - {{ $j->jam_selesai }}
            </div>
            <form method="POST" action="{{ route('jadwal.destroy', $j->id) }}">
              @csrf
              @method('DELETE')
              <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                onclick="return confirm('Yakin ingin menghapus jadwal ini?')">Hapus</button>
            </form>
          </li>
          @endforeach
        </ul>
      </section>
    </section>

    <!-- Section: Audiopost -->
    <section x-show="section === 'audiopost'" x-transition>
      <section class="bg-white rounded shadow p-6 mb-6">
        <h2 class="text-lg font-bold mb-4 text-gray-800">Audiopost Project</h2>

        <form method="POST" action="{{ route('audiopost.store') }}" class="space-y-4">
          @csrf
          <div>
            <label class="block text-gray-700">Nama Project</label>
            <input type="text" name="nama_projek" class="w-full border rounded px-3 py-2" required>
          </div>

          <div>
            <label class="block text-gray-700">Link</label>
            <input type="url" name="link" class="w-full border rounded px-3 py-2" required>
          </div>

          <div>
            <label class="block text-gray-700">Link Thumbnail</label>
            <input type="url" name="thumbnail" class="w-full border rounded px-3 py-2">
          </div>

          <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan Project</button>
        </form>

      </section>

      <section class="bg-white rounded shadow p-6">
        <ul class="space-y-2">
          @foreach(\App\Models\Audiopost::all() as $a)
          <li class="flex justify-between items-center p-3 bg-gray-100 rounded">
            <div class="flex items-center space-x-4">
              @if($a->thumbnail)
                <img src="{{ $a->thumbnail }}" alt="Thumbnail" class="w-16 h-16 object-cover rounded">
              @endif
              <div>
                <strong>{{ $a->nama_projek }}</strong><br>
                <a href="{{ $a->link }}" class="text-blue-600 underline" target="_blank">{{ $a->link }}</a>
              </div>
            </div>
            <form method="POST" action="{{ route('audiopost.destroy', $a->id) }}">
              @csrf
              @method('DELETE')
              <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                onclick="return confirm('Yakin ingin menghapus project ini?')">Hapus</button>
            </form>
          </li>
          @endforeach
        </ul>

      </section>
    </section>

  </main>
</body>
</html>
{{-- 

<!DOCTYPE html>
<html lang="en" x-data="{ openMenu : false }" :class="openMenu ? 'overflow-hidden' : 'overflow-visible'">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sidebar Menu</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="//unpkg.com/alpinejs" defer></script>
  <style>
    [x-cloak] {
      display: none !important;
    }
  </style>
</head>

<body class="bg-gray-100">

  <!-- Toggle Button (Mobile Only) -->
  <div class="md:hidden flex items-center justify-between bg-white p-4 shadow">
    <span class="text-xl font-bold">Logo</span>
    <button @click="openMenu = !openMenu" aria-label="Toggle Sidebar">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
        viewBox="0 0 24 24" stroke="currentColor">
        <path x-show="!openMenu" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M4 6h16M4 12h16M4 18h16" />
        <path x-show="openMenu" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
  </div>

  <!-- Sidebar -->
  <aside
    class="fixed inset-y-0 left-0 w-64 bg-white shadow-lg z-40 transform md:translate-x-0 transition-transform duration-300"
    :class="openMenu ? 'translate-x-0' : '-translate-x-full'" x-cloak>

    <div class="p-4 text-2xl font-bold border-b">Logo</div>

    <nav class="p-4">
      <ul class="space-y-2">
        <li>
          <a href="#" class="block py-2 px-3 rounded hover:bg-gray-200 font-medium">Home</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 rounded hover:bg-gray-200 font-medium">About</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 rounded hover:bg-gray-200 font-medium">Articles</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 rounded hover:bg-gray-200 font-medium">Contact</a>
        </li>
      </ul>
    </nav>
  </aside>

  <!-- Overlay untuk menutup sidebar di mobile -->
  <div
    class="fixed inset-0 bg-black bg-opacity-30 z-30 md:hidden"
    x-show="openMenu"
    @click="openMenu = false"
    x-cloak
    x-transition
  ></div>

  <!-- Main Content -->
  <main class="md:ml-64 p-6">
    <h1 class="text-2xl font-bold mb-4">Selamat Datang</h1>
    <p class="text-gray-700">Ini adalah halaman dengan sidebar yang responsif.</p>
  </main>

</body>
</html>
 --}}
