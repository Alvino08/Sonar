<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 700 700"><defs><filter id="nnnoise-filter" x="-20%" y="-20%" width="140%" height="140%"><feTurbulence type="fractalNoise" baseFrequency="0.102" numOctaves="4" seed="15" stitchTiles="stitch" result="turbulence"/><feSpecularLighting surfaceScale="15" specularConstant="0.75" specularExponent="20" lighting-color="%23aeaeae" in="turbulence" result="specularLighting"><feDistantLight azimuth="3" elevation="100"/></feSpecularLighting></filter></defs><rect width="700" height="700" fill="%23595959"/><rect width="700" height="700" fill="%23aeaeae" filter="url(%23nnnoise-filter)"/></svg>');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        }

    .invert {
        filter: invert(1);
      }
    </style>
</head>
<body>
    
    <div class="flex h-screen">
        <x-navbar />
        <!-- Left -->
        <div class="hidden lg:flex items-center justify-center flex-1 bg-noise2 text-black">
            <div class="max-w-md text-center">
                <div id="logo-sonar" class="w-[500px] h-[500px] mx-auto flex flex-col items-center justify-center">
                            <!-- Baris pertama: S O N -->
                            <div class="flex mb-[-70px]">
                                <div class="w-[164px] h-[380px] mr-[-75px]">
                                <img src="/Audioposts/SONAR ILLUS - S.png" alt="" class="letter-s">
                                </div>
                                <div class="w-[120px] h-[180px] ml-[40px] mr-[-67px] mt-[170px]">
                                <img src="/Audioposts/SONAR ILLUS - O.png" alt="" class="letter-o">
                                </div>
                                <div class="w-[186px] h-[280px] mt-30">
                                <img src="/Audioposts/SONAR ILLUS - N.png" alt="" class="letter-n">
                                </div>
                            </div>
                            
                            <!-- Baris kedua: A R -->
                            <div class="flex mt-[-70px]">
                                <div  class="w-[158px] h-[242px]">
                                <img src="/Audioposts/SONAR ILLUS - A.png" alt="" class="letter-a">
                                </div>
                                <div class="w-[182px] h-[300px] ml-[-45px] mt-[20px]">
                                <img src="/Audioposts/SONAR ILLUS - R.png" alt="" class="letter-r">
                                </div>
                            </div>
                            </div>
            </div>
        </div>

        <!-- Right -->
        <div class="w-full bg-noise lg:w-1/2 flex items-center justify-center">
            <div class="max-w-md w-full p-6">
                <h1 class="text-3xl font-semibold mb-6 text-white text-center">Sign Up</h1>
                <p class="text-sm font-semibold mb-6 text-white text-center">Join our community with all-time access for free</p>

                <a class="mt-4 flex flex-col lg:flex-row items-center justify-between" href="">
                    <div class="w-full lg:w-full mb-2 lg:mb-0">
                        <button type="button" class="w-full flex justify-center items-center gap-2 bg-white text-sm text-gray-600 p-2 rounded-md hover:bg-gray-50 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200 transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4" id="google">
                            <path fill="#fbbb00" d="M113.47 309.408 95.648 375.94l-65.139 1.378C11.042 341.211 0 299.9 0 256c0-42.451 10.324-82.483 28.624-117.732h.014L86.63 148.9l25.404 57.644c-5.317 15.501-8.215 32.141-8.215 49.456.002 18.792 3.406 36.797 9.651 53.408z"></path>
                            <path fill="#518ef8" d="M507.527 208.176C510.467 223.662 512 239.655 512 256c0 18.328-1.927 36.206-5.598 53.451-12.462 58.683-45.025 109.925-90.134 146.187l-.014-.014-73.044-3.727-10.338-64.535c29.932-17.554 53.324-45.025 65.646-77.911h-136.89V208.176h245.899z"></path>
                            <path fill="#28b446" d="m416.253 455.624.014.014C372.396 490.901 316.666 512 256 512c-97.491 0-182.252-54.491-225.491-134.681l82.961-67.91c21.619 57.698 77.278 98.771 142.53 98.771 28.047 0 54.323-7.582 76.87-20.818l83.383 68.262z"></path>
                            <path fill="#f14336" d="m419.404 58.936-82.933 67.896C313.136 112.246 285.552 103.82 256 103.82c-66.729 0-123.429 42.957-143.965 102.724l-83.397-68.276h-.014C71.23 56.123 157.06 0 256 0c62.115 0 119.068 22.126 163.404 58.936z"></path>
                            </svg> Sign Up with Google </button>
                    </div>
                </a>

                <div class="mt-4 text-sm text-white text-center">
                    <p>or with email</p>
                </div>

                <form action="{{ route('register') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="username" class="block text-sm font-medium text-white">Username</label>
                        <input type="text" id="username" name="username" class="mt-1 p-2 w-full border border-gray-200 rounded-md focus:bg-gray-300 focus:text-black text-white" required>
                    </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-white">Email</label>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                value="{{ old('email') }}"
                                class="mt-1 p-2 w-full border border-gray-200 rounded-md focus:bg-gray-300 focus:text-black text-white
                                    @error('email') border-red-500 @enderror"
                                required
                            >
                            @error('email')
                                <p id="email-error" class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-white">Password</label>
                        <input type="password" id="password" name="password" class="mt-1 p-2 w-full border border-gray-200 rounded-md focus:bg-gray-300 focus:text-black text-white" required>
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-white">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="mt-1 p-2 w-full border border-gray-200 rounded-md focus:bg-gray-300 focus:text-black text-white" required>
                    </div>
                    <div>
                        <button type="submit" class="w-full bg-black text-white p-2 rounded-md hover:bg-white hover:text-black">Sign Up</button>
                    </div>
                </form>

                <div class="mt-4 text-sm text-white text-center">
                    <p>Already have an account? <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login here</a></p>
                </div>
            </div>
        </div>
    </div>

    
<script>
document.addEventListener('DOMContentLoaded', function () {
    const emailInput = document.getElementById('email');
    const emailError = document.getElementById('email-error');

    if (emailInput && emailError) {
        emailInput.addEventListener('focus', () => {
            emailInput.classList.remove('border-red-500');
            emailError.remove();
        });
    }
});
</script>

</body>
</html>

