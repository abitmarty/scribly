<section class="py-24 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="font-display text-4xl md:text-5xl font-bold mb-4 text-black">
                Voor & Na
            </h2>
            <p class="text-lg text-slate-600">
                Zie het verschil tussen leveranciersinformatie en professionele productteksten
            </p>
        </div>

        <div x-data="{ active: 0 }" class="space-y-8">
            <!-- Tab Buttons -->
            <div class="flex flex-wrap gap-3 justify-center">
                <button @click="active = 0" :class="active === 0 ? 'bg-orange-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'" class="px-4 py-2 rounded-lg font-medium transition">
                    ⛰️ Bergschoenen
                </button>
                <button @click="active = 1" :class="active === 1 ? 'bg-orange-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'" class="px-4 py-2 rounded-lg font-medium transition">
                    👕 Sportshirts
                </button>
                <button @click="active = 2" :class="active === 2 ? 'bg-orange-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'" class="px-4 py-2 rounded-lg font-medium transition">
                    🎒 Rugzakken
                </button>
            </div>

            <!-- Example 1: Bergschoenen -->
            <div x-show="active === 0" class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Before -->
                <div class="bg-white border-2 border-gray-300 rounded-xl p-6">
                    <h3 class="font-display text-lg font-bold text-gray-700 mb-4">Inkoopbestand (Leverancier)</h3>
                    <div class="space-y-3 text-sm text-gray-700 font-mono bg-gray-50 p-4 rounded border border-gray-300 max-h-64 overflow-y-auto">
                        <p>SKU: ALP-001</p>
                        <p>Naam: Bergschoen Unisex</p>
                        <p>Materiaal: Leather, Mesh</p>
                        <p>Maat: 36-48</p>
                        <p>Kleur: Zwart, Grijs</p>
                        <p>Gewicht: 350g per schoen</p>
                        <p>Waterproof: Ja</p>
                        <p>Gore-Tex: Ja</p>
                        <p>Zool: Vibram</p>
                        <p>Doos: 12 stuks</p>
                    </div>
                </div>

                <!-- After -->
                <div class="rounded-xl p-6" style="background-color: rgba(227, 100, 20, 0.1); border: 2px solid #E36414;">
                    <h3 class="font-display text-lg font-bold text-black mb-4">✅ Scribly Output (Optimized)</h3>
                    <div class="space-y-3 text-sm text-slate-700 bg-white p-4 rounded max-h-64 overflow-y-auto" style="border: 1px solid #E36414;">
                        <h4 class="font-bold text-lg">Premium Bergschoenen met Gore-Tex</h4>
                        <p>Ontdek onze hoogwaardige bergschoenen — dé perfecte partner voor je bergavonturen. Waterproof, comfortabel en uiterst duurzaam.</p>
                        <ul class="list-disc list-inside space-y-1 ml-2">
                            <li>Premium leer- en mesh-combinatie</li>
                            <li>Gore-Tex voering voor totale waterbescherming</li>
                            <li>Vibram-zool voor optimale grip</li>
                            <li>Zeer licht (350g per schoen)</li>
                            <li>Maten 36-48 in zwart & grijs</li>
                        </ul>
                        <p class="text-xs text-slate-500 italic">Ideaal voor wandelen, klimmen en trektochten.</p>
                    </div>
                </div>
            </div>

            <!-- Example 2: Sportshirts -->
            <div x-show="active === 1" class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Before -->
                <div class="bg-white border-2 border-gray-300 rounded-xl p-6">
                    <h3 class="font-display text-lg font-bold text-gray-700 mb-4">Inkoopbestand (Leverancier)</h3>
                    <div class="space-y-3 text-sm text-gray-700 font-mono bg-gray-50 p-4 rounded border border-gray-300 max-h-64 overflow-y-auto">
                        <p>SKU: SHIRT-055</p>
                        <p>Naam: Tech Shirt Men</p>
                        <p>Material: Polyester 90%, Elastane 10%</p>
                        <p>Sizes: XS-XXL</p>
                        <p>Colors: Black, Blue, White</p>
                        <p>Moisture-wicking: Yes</p>
                        <p>Antimicrobial: Yes</p>
                        <p>UPF-protect: 50+</p>
                        <p>Weight: 160g</p>
                    </div>
                </div>

                <!-- After -->
                <div class="rounded-xl p-6" style="background-color: rgba(227, 100, 20, 0.1); border: 2px solid #E36414;">
                    <h3 class="font-display text-lg font-bold text-black mb-4">✅ Scribly Output (Optimized)</h3>
                    <div class="space-y-3 text-sm text-slate-700 bg-white p-4 rounded max-h-64 overflow-y-auto" style="border: 1px solid #E36414;">
                        <h4 class="font-bold text-lg">Tech Sportshirt – Antimicrobe & UV-Bescherming</h4>
                        <p>Comfort en prestatie hand in hand. Dit tech-shirt is speciaal ontworpen voor actieve atleten die graag droog en fris willen blijven.</p>
                        <ul class="list-disc list-inside space-y-1 ml-2">
                            <li>Vochtafvoering: Houd zweet tegen</li>
                            <li>Antimicrobe behandeling: Minder geurneutraliteit</li>
                            <li>UPF 50+ UV-bescherming</li>
                            <li>Licht en ademend materiaal</li>
                            <li>Beschikbaar in 3 kleuren & alle maten</li>
                        </ul>
                        <p class="text-xs text-slate-500 italic">Perfect voor sport, fitness en outdoor activiteiten.</p>
                    </div>
                </div>
            </div>

            <!-- Example 3: Rugzakken -->
            <div x-show="active === 2" class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Before -->
                <div class="bg-white border-2 border-gray-300 rounded-xl p-6">
                    <h3 class="font-display text-lg font-bold text-gray-700 mb-4">Inkoopbestand (Leverancier)</h3>
                    <div class="space-y-3 text-sm text-gray-700 font-mono bg-gray-50 p-4 rounded border border-gray-300 max-h-64 overflow-y-auto">
                        <p>SKU: BAG-20L</p>
                        <p>Naam: Daypack 20L</p>
                        <p>Capacity: 20L</p>
                        <p>Material: Nylon 1000D</p>
                        <p>Compartments: 3</p>
                        <p>Laptop slot: 15.6"</p>
                        <p>Water-resistant: Yes</p>
                        <p>Weight: 600g</p>
                        <p>Colors: Black, Navy</p>
                    </div>
                </div>

                <!-- After -->
                <div class="rounded-xl p-6" style="background-color: rgba(227, 100, 20, 0.1); border: 2px solid #E36414;">
                    <h3 class="font-display text-lg font-bold text-black mb-4">✅ Scribly Output (Optimized)</h3>
                    <div class="space-y-3 text-sm text-slate-700 bg-white p-4 rounded max-h-64 overflow-y-auto" style="border: 1px solid #E36414;">
                        <h4 class="font-bold text-lg">20L Daypack – Duurzaam & Waterdicht</h4>
                        <p>Jouw ideale dagelijkse reisgenoot. Deze 20-liter rugzak combineert functionaliteit, stijl en duurzaamheid in één compact formaat.</p>
                        <ul class="list-disc list-inside space-y-1 ml-2">
                            <li>20L capaciteit – perfect voor daguitjes</li>
                            <li>3 compacte vakken voor organisatie</li>
                            <li>Gesloten laptopvak (tot 15.6")</li>
                            <li>Water-repellent nylon 1000D</li>
                            <li>Lichtgewicht (600g) zonder inleverkingen</li>
                        </ul>
                        <p class="text-xs text-slate-500 italic">Beschikbaar in zwart en marineblauw. Je perfecte pendant voor school, werk en avontuur.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
