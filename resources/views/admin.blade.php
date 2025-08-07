<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full flex">

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

    <div>
      <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Simpan Jadwal
      </button>
    </div>
  </form>
</section>
  </main>

</body>
</html>
