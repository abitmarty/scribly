<section id="how-it-works" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="font-display text-4xl md:text-5xl font-bold mb-4 text-black">
                Hoe werkt Scribly?
            </h2>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto">
                Een intelligente 5-staps agent pipeline die jouw producten omtovert tot perfecte beschrijvingen.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 lg:gap-4">
            <!-- Step 1 -->
            <div class="flex flex-col" x-intersect="$el.classList.add('animate-fadeInUp')">
                <div class="flex items-start space-x-4 mb-6">
                    <div class="flex-shrink-0 w-12 h-12 rounded-full flex items-center justify-center text-white font-bold text-lg" style="background-color: #E36414;">
                        1
                    </div>
                    <div class="flex-1">
                        <h3 class="font-display text-xl font-bold text-black">Extract Agent</h3>
                        <p class="text-slate-600 text-sm mt-1">
                            Leest en parseert je inkoopbestand en leveranciersdata. Herkent producten, specs en prijzen.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="flex flex-col" x-intersect="$el.classList.add('animate-fadeInUp')" style="animation-delay: 0.1s;">
                <div class="flex items-start space-x-4 mb-6">
                    <div class="flex-shrink-0 w-12 h-12 rounded-full flex items-center justify-center text-white font-bold text-lg" style="background-color: #E36414;">
                        2
                    </div>
                    <div class="flex-1">
                        <h3 class="font-display text-xl font-bold text-black">Generate Agent</h3>
                        <p class="text-slate-600 text-sm mt-1">
                            Schrijft unieke, overtuigende productomschrijvingen met je tone of voice en branding.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="flex flex-col" x-intersect="$el.classList.add('animate-fadeInUp')" style="animation-delay: 0.2s;">
                <div class="flex items-start space-x-4 mb-6">
                    <div class="flex-shrink-0 w-12 h-12 rounded-full flex items-center justify-center text-white font-bold text-lg" style="background-color: #E36414;">
                        3
                    </div>
                    <div class="flex-1">
                        <h3 class="font-display text-xl font-bold text-black">Quality Agent</h3>
                        <p class="text-slate-600 text-sm mt-1">
                            Controleert grammatica, leesbaarheid, consistentie en naleving van je richtlijnen.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Step 4 -->
            <div class="flex flex-col" x-intersect="$el.classList.add('animate-fadeInUp')" style="animation-delay: 0.3s;">
                <div class="flex items-start space-x-4 mb-6">
                    <div class="flex-shrink-0 w-12 h-12 rounded-full flex items-center justify-center text-white font-bold text-lg" style="background-color: #E36414;">
                        4
                    </div>
                    <div class="flex-1">
                        <h3 class="font-display text-xl font-bold text-black">Validate Agent</h3>
                        <p class="text-slate-600 text-sm mt-1">
                            Toetst SEO-score, optimaliseert keywords en genereert HTML gereed voor upload.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Step 5 -->
            <div class="flex flex-col" x-intersect="$el.classList.add('animate-fadeInUp')" style="animation-delay: 0.4s;">
                <div class="flex items-start space-x-4 mb-6">
                    <div class="flex-shrink-0 w-12 h-12 rounded-full flex items-center justify-center text-white font-bold text-lg" style="background-color: #E36414;">
                        5
                    </div>
                    <div class="flex-1">
                        <h3 class="font-display text-xl font-bold text-black">Translate Agent</h3>
                        <p class="text-slate-600 text-sm mt-1">
                            Vertaalt automatisch naar meerdere talen terwijl tone of voice behouden blijft.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom CTA -->
        <div class="mt-16 text-center">
            <p class="text-slate-600 mb-6">
                Alle stappen gebeuren automatisch. Je ontvangt de eindresultaten in HTML, klaar voor directe publicatie.
            </p>
            <a href="#contact" style="background-color: #E36414;" class="inline-block px-6 py-3 text-white font-medium rounded-lg hover:shadow-lg hover:opacity-90 transition">
                Bekijk het in actie
            </a>
        </div>
    </div>

    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.6s ease-out forwards;
        }
    </style>
</section>
