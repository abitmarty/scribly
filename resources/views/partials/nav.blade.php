<nav x-data="{ open: false, scrolled: false }" @scroll.window="scrolled = window.scrollY > 50" class="fixed w-full top-0 z-50 transition-all duration-300" :class="scrolled ? 'bg-white/95 backdrop-blur-md shadow-lg' : 'bg-transparent'">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="/" :class="scrolled ? 'text-black' : 'text-black'" class="text-xl font-display font-bold transition">
                    Scribly
                </a>
            </div>

            <!-- Desktop Nav -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="#benefits" :class="scrolled ? 'text-gray-700 hover:text-orange-600' : 'text-gray-700 hover:text-orange-600'" class="transition">Voordelen</a>
                <a href="#how-it-works" :class="scrolled ? 'text-gray-700 hover:text-orange-600' : 'text-gray-700 hover:text-orange-600'" class="transition">Hoe werkt het</a>
                <a href="#pricing" :class="scrolled ? 'text-gray-700 hover:text-orange-600' : 'text-gray-700 hover:text-orange-600'" class="transition">Prijzen</a>
                <a href="#contact" class="px-4 py-2 text-white font-medium rounded-lg hover:opacity-90 hover:shadow-lg transition" style="background-color: #E36414;">
                    Probeer gratis
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button @click="open = !open" :class="scrolled ? 'text-black' : 'text-black'" class="p-2 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Nav -->
        <div x-show="open" class="md:hidden pb-4 space-y-2">
            <a href="#benefits" class="block text-gray-700 hover:text-black py-2">Voordelen</a>
            <a href="#how-it-works" class="block text-gray-700 hover:text-black py-2">Hoe werkt het</a>
            <a href="#pricing" class="block text-gray-700 hover:text-black py-2">Prijzen</a>
            <a href="#contact" class="block px-4 py-2 text-white font-medium rounded-lg text-center hover:opacity-90" style="background-color: #E36414;">
                Probeer gratis
            </a>
        </div>
    </div>
</nav>
