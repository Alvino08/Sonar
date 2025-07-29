<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/logo-sonar.js'])
    <title>Document</title>
    <style>
            .stock-ticker {
        font-size: 64px;
        padding-block: 8px;
        overflow: hidden;
        user-select: none;

        --gap: 20px;
        display: flex;
        gap: var(--gap);
        }

    .stock-ticker ul {
    list-style: none;
    flex-shrink: 0;
    min-width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: var(--gap);


    animation: scroll 20s linear infinite;
    }

    .stock-ticker:hover ul {
    animation-play-state: paused;
    }

    @keyframes scroll {
    to {
        transform: translateX(calc(-100% - var(--gap)));
    }
    }
    
    .stock-ticker .company,
    .stock-ticker .price {
    font-weight: bold;
    }
    </style>
</head>
<body>
    <div class="stock-ticker">
                    <ul>
                        <li>
                        <span class="company">OUR</span>
                        <span class="company">©</span>
                        <span class="company">SERVICES</span>
                        <span class="company">©</span>
                        </li>
                        <li>
                        <span class="company">OUR</span>
                        <span class="company">©</span>
                        <span class="company">SERVICES</span>
                        <span class="company">©</span>
                        </li>
                        <li>
                        <span class="company">OUR</span>
                        <span class="company">©</span>
                        <span class="company">SERVICES</span>
                        <span class="company">©</span>
                        </li>
                        <li>
                        <span class="company">OUR</span>
                        <span class="company">©</span>
                        <span class="company">SERVICES</span>
                        <span class="company">©</span>
                        </li>
                        <li>
                        <span class="company">OUR</span>
                        <span class="company">©</span>
                        <span class="company">SERVICES</span>
                        <span class="company">©</span>
                        </li>
                        <li>
                        <span class="company">OUR</span>
                        <span class="company">©</span>
                        <span class="company">SERVICES</span>
                        <span class="company">©</span>
                        </li>
                        <li>
                        <span class="company">OUR</span>
                        <span class="company">©</span>
                        <span class="company">SERVICES</span>
                        <span class="company">©</span>
                        </li>
                        <li>
                        <span class="company">OUR</span>
                        <span class="company">©</span>
                        <span class="company">SERVICES</span>
                        <span class="company">©</span>
                        </li>
                    </ul>

                    <ul aria-hidden="true">
                        <li>
                        <span class="company">OUR</span>
                        <span class="company">©</span>
                        <span class="company">SERVICES</span>
                        <span class="company">©</span>
                        </li>
                        <li>
                        <span class="company">OUR</span>
                        <span class="company">©</span>
                        <span class="company">SERVICES</span>
                        <span class="company">©</span>
                        </li>
                        <li>
                        <span class="company">OUR</span>
                        <span class="company">©</span>
                        <span class="company">SERVICES</span>
                        <span class="company">©</span>
                        </li>
                        <li>
                        <span class="company">OUR</span>
                        <span class="company">©</span>
                        <span class="company">SERVICES</span>
                        <span class="company">©</span>
                        </li>
                        <li>
                        <span class="company">OUR</span>
                        <span class="company">©</span>
                        <span class="company">SERVICES</span>
                        <span class="company">©</span>
                        </li>
                        <li>
                        <span class="company">OUR</span>
                        <span class="company">©</span>
                        <span class="company">SERVICES</span>
                        <span class="company">©</span>
                        </li>
                        <li>
                        <span class="company">OUR</span>
                        <span class="company">©</span>
                        <span class="company">SERVICES</span>
                        <span class="company">©</span>
                        </li>
                        <li>
                        <span class="company">OUR</span>
                        <span class="company">©</span>
                        <span class="company">SERVICES</span>
                        <span class="company">©</span>
                        </li>
                    </ul>
                    </div>

                    <div id="logo-sonar" class="w-[500px] h-[500px] mx-auto flex flex-col items-center justify-center">
                      <!-- Baris pertama: S O N -->
                      <div class="flex mb-[-70px]">
                        <div class="w-[164px] h-[380px] mr-[-75px]">
                          <img src="/Audiopost/SONAR ILLUS - S.png" alt="" class="letter-s">
                        </div>
                        <div class="w-[120px] h-[180px] ml-[40px] mr-[-67px] mt-[170px]">
                          <img src="/Audiopost/SONAR ILLUS - O.png" alt="" class="letter-o">
                        </div>
                        <div class="w-[186px] h-[280px] mt-30">
                          <img src="/Audiopost/SONAR ILLUS - N.png" alt="" class="letter-n">
                        </div>
                      </div>
                      
                      <!-- Baris kedua: A R -->
                      <div class="flex mt-[-70px]">
                        <div  class="w-[158px] h-[242px]">
                          <img src="/Audiopost/SONAR ILLUS - A.png" alt="" class="letter-a">
                        </div>
                        <div class="w-[182px] h-[300px] ml-[-45px] mt-[20px]">
                          <img src="/Audiopost/SONAR ILLUS - R.png" alt="" class="letter-r">
                        </div>
                      </div>
                    </div>
</body>
</html>