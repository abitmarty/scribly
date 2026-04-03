<section id="how-it-works" class="py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20" x-data="{
            activeStep: 1,
            updateStep() {
                const wrappers = document.querySelectorAll('[data-step]');
                wrappers.forEach(el => {
                    const rect = el.getBoundingClientRect();
                    if (rect.top <= 120 && rect.bottom > 120) {
                        this.activeStep = parseInt(el.dataset.step);
                    }
                });
            }
        }" @scroll.window="updateStep()">

            <!-- Left: Sticky Navigation -->
            <div class="lg:sticky lg:top-24 h-fit">
                <p class="text-sm font-medium text-orange-600 uppercase tracking-wider mb-4">Hoe het werkt</p>
                <h2 class="font-display text-4xl md:text-5xl font-bold mb-6 text-black">
                    Hoe werkt Scribly?
                </h2>
                <p class="text-lg text-slate-600 mb-8">
                    Een intelligente 5-staps agent pipeline die jouw producten omtovert tot perfecte beschrijvingen.
                </p>

                <!-- Step Navigation -->
                <div class="space-y-3 hidden lg:block">
                    <div class="flex items-center gap-3" :class="activeStep === 1 ? '' : 'opacity-50'">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center font-bold text-white transition-all" :style="activeStep === 1 ? 'background-color: #E36414;' : 'background-color: #D1D5DB;'">1</div>
                        <span class="transition-all" :class="activeStep === 1 ? 'font-bold text-black' : 'font-medium text-slate-600'">Extract Agent</span>
                    </div>
                    <div class="flex items-center gap-3" :class="activeStep === 2 ? '' : 'opacity-50'">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center font-bold text-white transition-all" :style="activeStep === 2 ? 'background-color: #E36414;' : 'background-color: #D1D5DB;'">2</div>
                        <span class="transition-all" :class="activeStep === 2 ? 'font-bold text-black' : 'font-medium text-slate-600'">Generate Agent</span>
                    </div>
                    <div class="flex items-center gap-3" :class="activeStep === 3 ? '' : 'opacity-50'">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center font-bold text-white transition-all" :style="activeStep === 3 ? 'background-color: #E36414;' : 'background-color: #D1D5DB;'">3</div>
                        <span class="transition-all" :class="activeStep === 3 ? 'font-bold text-black' : 'font-medium text-slate-600'">Quality Agent</span>
                    </div>
                    <div class="flex items-center gap-3" :class="activeStep === 4 ? '' : 'opacity-50'">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center font-bold text-white transition-all" :style="activeStep === 4 ? 'background-color: #E36414;' : 'background-color: #D1D5DB;'">4</div>
                        <span class="transition-all" :class="activeStep === 4 ? 'font-bold text-black' : 'font-medium text-slate-600'">Validate Agent</span>
                    </div>
                    <div class="flex items-center gap-3" :class="activeStep === 5 ? '' : 'opacity-50'">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center font-bold text-white transition-all" :style="activeStep === 5 ? 'background-color: #E36414;' : 'background-color: #D1D5DB;'">5</div>
                        <span class="transition-all" :class="activeStep === 5 ? 'font-bold text-black' : 'font-medium text-slate-600'">Translate Agent</span>
                    </div>
                </div>
            </div>

            <!-- Right: Stacking Cards -->
            <div>
                <div class="sticky top-24 z-10" data-step="1">
                    <div class="bg-white rounded-2xl border-2 border-gray-200 p-8 shadow-lg h-72">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-12 h-12 rounded-lg flex items-center justify-center font-bold text-white text-lg" style="background-color: #E36414;">1</div>
                            <p class="text-sm font-medium text-orange-600 uppercase tracking-wider">Stap 1</p>
                        </div>
                        <h3 class="font-display text-2xl font-bold text-black mb-4">Extract Agent</h3>
                        <p class="text-slate-600 leading-relaxed">Leest en parseert je inkoopbestand en leveranciersdata. Herkent automatisch producten, specificaties en prijzen uit verschillende formaten.</p>
                    </div>
                </div>
                <div style="height: 30px;"></div>

                <div class="sticky top-24 z-20" data-step="2">
                    <div class="bg-white rounded-2xl border-2 border-gray-200 p-8 shadow-lg h-72">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-12 h-12 rounded-lg flex items-center justify-center font-bold text-white text-lg" style="background-color: #E36414;">2</div>
                            <p class="text-sm font-medium text-orange-600 uppercase tracking-wider">Stap 2</p>
                        </div>
                        <h3 class="font-display text-2xl font-bold text-black mb-4">Generate Agent</h3>
                        <p class="text-slate-600 leading-relaxed">Schrijft unieke, overtuigende productomschrijvingen met jouw tone of voice en branding. Incorporeert automatisch SEO-keywords.</p>
                    </div>
                </div>
                <div style="height: 30px;"></div>

                <div class="sticky top-24 z-30" data-step="3">
                    <div class="bg-white rounded-2xl border-2 border-gray-200 p-8 shadow-lg h-72">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-12 h-12 rounded-lg flex items-center justify-center font-bold text-white text-lg" style="background-color: #E36414;">3</div>
                            <p class="text-sm font-medium text-orange-600 uppercase tracking-wider">Stap 3</p>
                        </div>
                        <h3 class="font-display text-2xl font-bold text-black mb-4">Quality Agent</h3>
                        <p class="text-slate-600 leading-relaxed">Controleert grammatica, leesbaarheid, consistentie en naleving van je richtlijnen. Zorgt voor professionele kwaliteit.</p>
                    </div>
                </div>
                <div style="height: 30px;"></div>

                <div class="sticky top-24 z-40" data-step="4">
                    <div class="bg-white rounded-2xl border-2 border-gray-200 p-8 shadow-lg h-72">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-12 h-12 rounded-lg flex items-center justify-center font-bold text-white text-lg" style="background-color: #E36414;">4</div>
                            <p class="text-sm font-medium text-orange-600 uppercase tracking-wider">Stap 4</p>
                        </div>
                        <h3 class="font-display text-2xl font-bold text-black mb-4">Validate Agent</h3>
                        <p class="text-slate-600 leading-relaxed">Toetst SEO-score, optimaliseert keywords voor zoekmachines en genereert HTML gereed voor rechtstreekse upload.</p>
                    </div>
                </div>
                <div style="height: 30px;"></div>

                <div class="sticky top-24 z-50" data-step="5">
                    <div class="bg-white rounded-2xl border-2 border-gray-200 p-8 shadow-lg h-72">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-12 h-12 rounded-lg flex items-center justify-center font-bold text-white text-lg" style="background-color: #E36414;">5</div>
                            <p class="text-sm font-medium text-orange-600 uppercase tracking-wider">Stap 5</p>
                        </div>
                        <h3 class="font-display text-2xl font-bold text-black mb-4">Translate Agent</h3>
                        <p class="text-slate-600 leading-relaxed">Vertaalt automatisch naar meerdere talen terwijl tone of voice en SEO-optimalisatie perfect behouden blijft.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom CTA -->
        <div class="mt-24 text-center">
            <p class="text-slate-600 mb-8 text-lg">
                Alle stappen gebeuren volledig automatisch. Je ontvangt de eindresultaten in HTML-formaat, klaar voor directe publicatie.
            </p>
            <a href="#contact" style="background-color: #E36414;" class="inline-block px-8 py-3 text-white font-medium rounded-lg hover:shadow-lg hover:opacity-90 transition">
                Bekijk het in actie
            </a>
        </div>
    </div>
</section>
