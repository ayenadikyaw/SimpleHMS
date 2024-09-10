<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sakura Hospital Management System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="bg-gradient-to-r from-white to-primary dark:from-dark dark:to-dark min-h-screen font-sans">
    <div x-data="{ darkMode: false }" :class="{ 'dark': darkMode }" class="font-sans w-full">      
    <nav class="bg-white dark:bg-dark shadow-lg">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between">
                <div class="flex space-x-7">
                    <div class="flex items-center">
                        <img src="{{ asset('images/logo.png') }}" alt="Sakura Hospital Logo" class="h-12 w-auto">
                        <a href="#" class="flex items-center py-4 px-2">
                            <span class="font-semibold text-gray-500 text-lg">Sakura HMS</span>
                        </a>
                    </div>
                </div>
                <div class="hidden md:flex items-center space-x-5">
                    <a href="#" class="py-2 px-2 font-medium text-gray-500 rounded hover:bg-pink-500 hover:text-white transition duration-300">Sign In</a>
                    <a href="#" class="py-2 px-2 font-medium text-white bg-pink-500 rounded hover:bg-pink-400 transition duration-300">Sign Up</a>
                    <button @click="darkMode = !darkMode" class="p-2 ml-5 text-primary justify-end focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                    </button>
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="flex items-center py-2 px-2 font-medium text-gray-500 rounded hover:bg-pink-500 hover:text-white transition duration-300">
                            <span>{{ strtoupper(app()->getLocale()) }}</span>
                            <svg class="ml-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 py-2 w-48 bg-white dark:bg-gray-800 rounded-md shadow-xl z-20">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">English</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Myanmar</a>
                        </div>
                    </div>
                </div>
                <div class="md:hidden flex items-center">
                    <button class="outline-none mobile-menu-button">
                        <svg class="w-6 h-6 text-gray-500 hover:text-pink-500"
                            x-show="!showMenu"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="hidden mobile-menu">
            <ul class="">
                <li><a href="#" class="block text-sm px-2 py-4 hover:bg-pink-500 transition duration-300">Sign In</a></li>
                <li><a href="#" class="block text-sm px-2 py-4 hover:bg-pink-500 transition duration-300">Sign Up</a></li>
                <li><button @click="darkMode = !darkMode" class="p-2 ml-5 text-primary justify-end focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                    </button></li>
            </ul>
        </div>
    </nav>

    <main class="container mx-auto mt-12 px-4">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-8">{{ __('message.welcome') }}</h1>
        <p class="text-xl text-center text-gray-600 mb-12">Streamline your hospital operations with our comprehensive management solution.</p>
        <!-- Slider -->
        <div class="w-full mx-auto mb-12">
            <div class="relative">
                <div class="overflow-hidden">
                    <div class="flex transition-transform duration-500 ease-in-out" id="slider">
                        <div class="w-full flex-shrink-0">
                            <img src="{{ asset('images/image1.jpg') }}" alt="Hospital Image 1" class="w-full h-96 object-cover">
                        </div>
                        <div class="w-full flex-shrink-0">
                            <img src="{{ asset('images/image2.jpg') }}" alt="Hospital Image 2" class="w-full h-96 object-cover">
                        </div>
                        <div class="w-full flex-shrink-0">
                            <img src="{{ asset('images/image3.jpg') }}" alt="Hospital Image 3" class="w-full h-96 object-cover">
                        </div>
                        <div class="w-full flex-shrink-0">
                            <img src="{{ asset('images/image4.jpg') }}" alt="Hospital Image 4" class="w-full h-96 object-cover">
                        </div>
                    </div>
                </div>
                <button class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-50 hover:bg-opacity-100 text-gray-800 p-2 rounded-r-md" onclick="moveSlide(-1)">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <button class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-50 hover:bg-opacity-100 text-gray-800 p-2 rounded-l-md" onclick="moveSlide(1)">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>
            </div>
        </div>

        <script>
            let currentSlide = 0;
            const slider = document.getElementById('slider');
            const slides = slider.children;
            const totalSlides = slides.length;

            function moveSlide(direction) {
                currentSlide = (currentSlide + direction + totalSlides) % totalSlides;
                slider.style.transform = `translateX(-${currentSlide * 100}%)`;
            }

            // Auto-slide every 5 seconds
            setInterval(() => moveSlide(1), 5000);
        </script>
        <div class="flex justify-center">
            <a href="/dashboard" class="bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 px-4 rounded-full transition duration-300">
                Go to Dashboard
            </a>
        </div>
    </main>
    <footer class="bg-primary dark:bg-dark text-white py-8 mt-12">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-between">
                <div class="w-full md:w-1/4 mb-6 md:mb-0">
                    <h3 class="text-lg font-semibold mb-4">Sakura Hospital</h3>
                    <p class="text-sm">Providing quality healthcare services since 1990.</p>
                </div>
                <div class="w-full md:w-1/4 mb-6 md:mb-0">
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="text-sm">
                        <li class="mb-2"><a href="#" class="hover:text-secondary">Home</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-secondary">Services</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-secondary">Doctors</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-secondary">Contact</a></li>
                    </ul>
                </div>
                <div class="w-full md:w-1/4 mb-6 md:mb-0">
                    <h3 class="text-lg font-semibold mb-4">Contact Us</h3>
                    <p class="text-sm mb-2">123 Hospital Street, Tokyo, Japan</p>
                    <p class="text-sm mb-2">Phone: (123) 456-7890</p>
                    <p class="text-sm">Email: info@sakurahospital.com</p>
                </div>
                <div class="w-full md:w-1/4">
                    <h3 class="text-lg font-semibold mb-4">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-white hover:text-secondary">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="text-white hover:text-secondary">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                        <a href="#" class="text-white hover:text-secondary">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div> <!-- End of Dark Mode -->

    <script>
        const btn = document.querySelector("button.mobile-menu-button");
        const menu = document.querySelector(".mobile-menu");

        btn.addEventListener("click", () => {
            menu.classList.toggle("hidden");
        });
    </script>
</body>
</html>
