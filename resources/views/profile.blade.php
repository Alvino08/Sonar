<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans">
    <x-navbar/>

    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-lg p-6">
            
            <!-- Header -->
            <div class="mb-6 border-b pb-4">
                <h1 class="text-2xl font-bold text-gray-800">Profil Saya</h1>
                <p class="text-gray-500 text-sm">Perbarui informasi profil Anda di sini</p>
            </div>

            <!-- Form Update -->
            <form action="{{ route('profile.update') }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <!-- Nama -->
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input 
                        type="text" 
                        id="nama" 
                        name="name" 
                        value="{{ $user->name }}" 
                        readonly
                        class="mt-1 block w-full rounded-md border-gray-300 font-workSans font-medium text-gray-500 shadow-sm bg-gray-100 cursor-not-allowed"
                    >
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        value="{{ $user->email }}" 
                        readonly
                        class="mt-1 block w-full rounded-md border-gray-300 font-workSans font-medium text-gray-500 shadow-sm bg-gray-100 cursor-not-allowed"
                    >
                </div>

                <!-- Nomor Telepon -->
                <div>
                    <label for="number" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                    <input 
                        type="tel" 
                        id="number" 
                        name="number" 
                        value="{{ $user->number ?? '' }}"
                        placeholder="Masukkan nomor telepon"
                        class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    >
                </div>

                <!-- Company -->
                <div>
                    <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
                    <input 
                        type="text" 
                        id="company" 
                        name="company" 
                        value="{{ $user->company ?? '' }}"
                        placeholder="Masukkan nama perusahaan"
                        class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    >
                </div>

                <!-- Region -->
                <div>
                    <label for="region" class="block text-sm font-medium text-gray-700">Region</label>
                    <input 
                        type="text" 
                        id="region" 
                        name="region" 
                        value="{{ $user->region ?? '' }}"
                        placeholder="Masukkan asal"
                        class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    >
                </div>

                <!-- Tombol Simpan -->
                <div class="pt-4">
                    <button 
                        type="submit" 
                        class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition"
                    >
                        Simpan Perubahan
                    </button>
                </div>
            </form>

            <!-- Logout -->
            <form action="{{ route('logout') }}" method="POST" class="mt-4">
                @csrf
                <button 
                    type="submit" 
                    class="w-full bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-700 transition"
                >
                    Logout
                </button>
            </form>
        </div>
    </div>

</body>
</html>
