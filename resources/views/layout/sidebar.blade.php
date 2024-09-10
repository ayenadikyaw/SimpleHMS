<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>
<body class="bg-gray-100 min-h-screen flex">
    <div x-data="{ darkMode: false }" :class="{ 'dark': darkMode }" class="font-sans w-full">    
    <!-- Sidebar -->
    <div x-data="{ open: false }" class="flex h-full">
        <!-- Collapsible Sidebar -->
        <div :class="open ? 'w-72' : 'w-20'" class="bg-primary dark:bg-dark text-white duration-300 flex-col min-h-screen">
                <button @click="darkMode = !darkMode" class="p-2 ml-5 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </button>
            <div class="relative flex items-center p-4">
                <a href="/"><img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-12 w-auto"></a>
                <span class="text-lg font-semibold" x-show="open">Sakura Hospital</span>
                <button @click="open = !open" class="absolute -right-3 top-0 bg-primary dark:bg-dark rounded-full p-2 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" :class="open ? 'rotate-180' : 'rotate-0'" class="h-6 w-6 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
            </div>

            <!-- Sidebar Links -->
            <ul class="mt-4 ml-5 space-y-5">
                <!--Dashboard-->
                <li class="p-2 hover:bg-secondary dark:hover:bg-primary">
                    <a href="/dashboard" class="flex items-center space-x-4">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12C3 12.5523 3.44772 13 4 13H10C10.5523 13 11 12.5523 11 12V4C11 3.44772 10.5523 3 10 3H4C3.44772 3 3 3.44772 3 4V12ZM3 20C3 20.5523 3.44772 21 4 21H10C10.5523 21 11 20.5523 11 20V16C11 15.4477 10.5523 15 10 15H4C3.44772 15 3 15.4477 3 16V20ZM13 20C13 20.5523 13.4477 21 14 21H20C20.5523 21 21 20.5523 21 20V12C21 11.4477 20.5523 11 20 11H14C13.4477 11 13 11.4477 13 12V20ZM14 3C13.4477 3 13 3.44772 13 4V8C13 8.55228 13.4477 9 14 9H20C20.5523 9 21 8.55228 21 8V4C21 3.44772 20.5523 3 20 3H14Z"></path>
                            </svg>
                        </span>
                        <span x-show="open">Dashboard</span>
                    </a>
                </li>
                <!--Doctors-->
                <li class="p-2 hover:bg-secondary dark:hover:bg-primary">
                    <a href="/doctors" class="flex items-center space-x-4">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-4 0-6 2-6 2v2h12v-2s-2-2-6-2z"/>
                              </svg>
                        </span>
                        <span x-show="open">Doctors</span>
                    </a>
                </li>
                <!--Nurses-->
                <li class="p-2 hover:bg-secondary dark:hover:bg-primary">
                    <a href="/nurses" class="flex items-center space-x-4">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm-4 6h8v-2c0-2-4-3-4-3s-4 1-4 3v2zm-1-10h10v2H7z"/>
                              </svg>
                        </span>
                        <span x-show="open">Nurses</span>
                    </a>
                </li>
                <!--Rooms-->
                <li class="p-2 hover:bg-secondary dark:hover:bg-primary">
                    <a href="/rooms" class="flex items-center space-x-4">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h16v16H4V4zm2 2v12h12V6H6zm2 2h8v8H8V8z"/>
                              </svg>                              
                        </span>
                        <span x-show="open">Rooms</span>
                    </a>
                </li>
                <!--Drugs-->
                <li class="p-2 hover:bg-secondary dark:hover:bg-primary">
                    <a href="/drugs" class="flex items-center space-x-4">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm4 4H8v4h8v-4zm-6-2v-1h4v1H10z"/>
                              </svg>
                        </span>
                        <span x-show="open">Drugs</span>
                    </a>
                </li>
                <!--Appointments-->
                <li class="p-2 hover:bg-secondary dark:hover:bg-primary">
                    <a href="/appointments" class="flex items-center space-x-4">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 2v2H6a2 2 0 00-2 2v14a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2V2H8zm2 10h4v4h-4v-4zm0-6h4v4h-4V6z"/>
                              </svg>
                        </span>
                        <span x-show="open">Appointments</span>
                    </a>
                </li>
                <!--Messages-->
                <li class="p-2 hover:bg-secondary dark:hover:bg-primary">
                    <a href="/messages" class="flex items-center space-x-4">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 4H4v12h4l4 4 4-4h4V4zm-2 2v6H6V6h12z"/>
                              </svg>                                                     
                        </span>
                        <span x-show="open">Messages</span>
                    </a>
                </li>
                <!--Settings-->
                <li class="p-2 hover:bg-secondary dark:hover:bg-primary">
                    <a href="#" class="flex items-center space-x-4">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
        </span>
        <span x-show="open">Settings</span>
    </a>
</li>
<!--Logout-->
<li class="p-2 hover:bg-secondary dark:hover:bg-primary">
    <a href="/" class="flex items-center space-x-4">
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
            </svg>
        </span>
        <span x-show="open">Logout</span>
    </a>
</li>
               
            </ul>
        </div>
   
        <!-- Main Content -->
        <div class="flex-1 p-6">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
