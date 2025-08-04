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
    <!-- Header -->
    <header class="mb-6">
      <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
    </header>

    <!-- Stats Cards -->
    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
      <div class="bg-white p-4 rounded shadow">
        <h2 class="text-gray-600">Users</h2>
        <p class="text-2xl font-bold">1,245</p>
      </div>
      <div class="bg-white p-4 rounded shadow">
        <h2 class="text-gray-600">Sales</h2>
        <p class="text-2xl font-bold">$12,340</p>
      </div>
      <div class="bg-white p-4 rounded shadow">
        <h2 class="text-gray-600">Visitors</h2>
        <p class="text-2xl font-bold">3,580</p>
      </div>
    </section>

    <!-- Table -->
    <section class="bg-white rounded shadow p-4">
      <h2 class="text-lg font-bold mb-4">Recent Users</h2>
      <table class="w-full table-auto text-left">
        <thead>
          <tr class="text-gray-600 border-b">
            <th class="pb-2">Name</th>
            <th class="pb-2">Email</th>
            <th class="pb-2">Role</th>
          </tr>
        </thead>
        <tbody class="text-gray-700">
          <tr class="border-b">
            <td class="py-2">John Doe</td>
            <td class="py-2">john@example.com</td>
            <td class="py-2">Admin</td>
          </tr>
          <tr class="border-b">
            <td class="py-2">Jane Smith</td>
            <td class="py-2">jane@example.com</td>
            <td class="py-2">Editor</td>
          </tr>
        </tbody>
      </table>
    </section>
  </main>

</body>
</html>
