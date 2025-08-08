<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full flex">

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
        <li><a href="#" class="block p-2 rounded hover:bg-gray-700">Dashboard</a></li>
        <li><a href="#" class="block p-2 rounded hover:bg-gray-700">Users</a></li>
        <li><a href="#" class="block p-2 rounded hover:bg-gray-700">Settings</a></li>
      </ul>
    </nav>
    <div class="p-4 border-t border-gray-700">
      <button class="w-full p-2 bg-red-500 hover:bg-red-600 rounded">Logout</button>
    </div>
  </aside>

  <!-- Main content -->
  <main class="flex-1 p-6 overflow-y-auto">
    <!-- Form Tambah Jadwal -->
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

  </main>

</body>
</html>

<script>
  
  import Alpine from 'alpinejs';
  window.Alpine = Alpine

</script>