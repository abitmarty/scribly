<section id="how-it-works" class="py-24" style="background-color: #F8F9FA;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20" x-data="{
            activeStep: 1,
            updateStep() {
                const section = document.getElementById('how-it-works');
                const sectionTop = section.offsetTop;
                const scrollPos = window.scrollY;
                const relativeScroll = scrollPos - sectionTop;
                const cardHeight = window.innerHeight * 0.6; // 60vh

                if (relativeScroll < cardHeight) this.activeStep = 1;
                else if (relativeScroll < cardHeight * 2) this.activeStep = 2;
                else if (relativeScroll < cardHeight * 3) this.activeStep = 3;
                else if (relativeScroll < cardHeight * 4) this.activeStep = 4;
                else this.activeStep = 5;
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
                <div class="space-y-3">
                    <div class="flex items-center gap-3" :class="activeStep === 1 ? '' : 'opacity-50'">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center font-bold text-white" :style="activeStep === 1 ? 'background-color: #E36414;' : 'background-color: #D1D5DB;'" :class="activeStep === 1 ? 'font-bold' : ''">1</div>
                        <span class="text-slate-700" :class="activeStep === 1 ? 'font-bold text-black' : 'font-medium text-slate-600'">Extract Agent</span>
                    </div>
                    <div class="flex items-center gap-3" :class="activeStep === 2 ? '' : 'opacity-50'">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center font-bold text-white" :style="activeStep === 2 ? 'background-color: #E36414;' : 'background-color: #D1D5DB;'" :class="activeStep === 2 ? 'font-bold' : ''">2</div>
                        <span class="text-slate-700" :class="activeStep === 2 ? 'font-bold text-black' : 'font-medium text-slate-600'">Generate Agent</span>
                    </div>
                    <div class="flex items-center gap-3" :class="activeStep === 3 ? '' : 'opacity-50'">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center font-bold text-white" :style="activeStep === 3 ? 'background-color: #E36414;' : 'background-color: #D1D5DB;'" :class="activeStep === 3 ? 'font-bold' : ''">3</div>
                        <span class="text-slate-700" :class="activeStep === 3 ? 'font-bold text-black' : 'font-medium text-slate-600'">Quality Agent</span>
                    </div>
                    <div class="flex items-center gap-3" :class="activeStep === 4 ? '' : 'opacity-50'">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center font-bold text-white" :style="activeStep === 4 ? 'background-color: #E36414;' : 'background-color: #D1D5DB;'" :class="activeStep === 4 ? 'font-bold' : ''">4</div>
                        <span class="text-slate-700" :class="activeStep === 4 ? 'font-bold text-black' : 'font-medium text-slate-600'">Validate Agent</span>
                    </div>
                    <div class="flex items-center gap-3" :class="activeStep === 5 ? '' : 'opacity-50'">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center font-bold text-white" :style="activeStep === 5 ? 'background-color: #E36414;' : 'background-color: #D1D5DB;'" :class="activeStep === 5 ? 'font-bold' : ''">5</div>
                        <span class="text-slate-700" :class="activeStep === 5 ? 'font-bold text-black' : 'font-medium text-slate-600'">Translate Agent</span>
                    </div>
                </div>
            </div>

            <!-- Right: Stacking Cards -->
            <div>
                <div class="sticky top-24 z-10" style="height: 60vh;">
                    <div class="bg-white rounded-2xl border-2 border-gray-200 p-8 shadow-lg min-h-72">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-12 h-12 rounded-lg flex items-center justify-center font-bold text-white text-lg" style="background-color: #E36414;">1</div>
                            <p class="text-sm font-medium text-orange-600 uppercase tracking-wider">Stap 1</p>
                        </div>
                        <h3 class="font-display text-2xl font-bold text-black mb-4">Extract Agent</h3>
                        <p class="text-slate-600 leading-relaxed">Leest en parseert je inkoopbestand en leveranciersdata. Herkent automatisch producten, specificaties en prijzen uit verschillende formaten.</p>
                    </div>
                </div>

                <div class="sticky top-24 z-20" style="height: 60vh;">
                    <div class="bg-white rounded-2xl border-2 border-gray-200 p-8 shadow-lg min-h-72">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-12 h-12 rounded-lg flex items-center justify-center font-bold text-white text-lg" style="background-color: #E36414;">2</div>
                            <p class="text-sm font-medium text-orange-600 uppercase tracking-wider">Stap 2</p>
                        </div>
                        <h3 class="font-display text-2xl font-bold text-black mb-4">Generate Agent</h3>
                        <p class="text-slate-600 leading-relaxed">Schrijft unieke, overtuigende productomschrijvingen met jouw tone of voice en branding. Incorporeert automatisch SEO-keywords.</p>
                    </div>
                </div>

                <div class="sticky top-24 z-30" style="height: 60vh;">
                    <div class="bg-white rounded-2xl border-2 border-gray-200 p-8 shadow-lg min-h-72">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-12 h-12 rounded-lg flex items-center justify-center font-bold text-white text-lg" style="background-color: #E36414;">3</div>
                            <p class="text-sm font-medium text-orange-600 uppercase tracking-wider">Stap 3</p>
                        </div>
                        <h3 class="font-display text-2xl font-bold text-black mb-4">Quality Agent</h3>
                        <p class="text-slate-600 leading-relaxed">Controleert grammatica, leesbaarheid, consistentie en naleving van je richtlijnen. Zorgt voor professionele kwaliteit.</p>
                    </div>
                </div>

                <div class="sticky top-24 z-40" style="height: 60vh;">
                    <div class="bg-white rounded-2xl border-2 border-gray-200 p-8 shadow-lg min-h-72">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-12 h-12 rounded-lg flex items-center justify-center font-bold text-white text-lg" style="background-color: #E36414;">4</div>
                            <p class="text-sm font-medium text-orange-600 uppercase tracking-wider">Stap 4</p>
                        </div>
                        <h3 class="font-display text-2xl font-bold text-black mb-4">Validate Agent</h3>
                        <p class="text-slate-600 leading-relaxed">Toetst SEO-score, optimaliseert keywords voor zoekmachines en genereert HTML gereed voor rechtstreekse upload.</p>
                    </div>
                </div>

                <div class="sticky top-24 z-50" style="height: 60vh;">
                    <div class="bg-white rounded-2xl border-2 border-gray-200 p-8 shadow-lg min-h-72">
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
