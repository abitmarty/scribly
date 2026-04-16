<section id="contact" class="py-24" style="background-color: #F8F9FA;">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="font-display text-4xl md:text-5xl font-bold mb-4 text-black">
                Start je gratis proefperiode
            </h2>
            <p class="text-lg text-slate-600">
                Upload je bestanden en ontvang binnen 24 uur je eerste gegenereerde productbeschrijvingen.
            </p>
        </div>

        <!-- Success Alert -->
        @if (session('success'))
            <div class="mb-8 p-4 bg-green-50 border border-green-200 rounded-lg flex items-start space-x-3">
                <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                <div>
                    <p class="font-medium text-green-900">{{ session('success') }}</p>
                    <p class="text-sm text-green-700 mt-1">Controleer je email voor verdere instructies.</p>
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('lead.store') }}" enctype="multipart/form-data"
              x-data="uploadForm()" @submit.prevent="submitForm"
              class="bg-white rounded-2xl border border-gray-200 p-8 shadow-lg">
            @csrf

            <!-- Name & Email Row -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-slate-700 mb-2">
                        Je naam *
                    </label>
                    <input type="text" id="name" name="name" required
                           value="{{ old('name') }}"
                           class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent outline-none transition @error('name') border-red-500 @enderror"
                           placeholder="Jan Jansen">
                    @error('name')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-2">
                        Je e-mailadres *
                    </label>
                    <input type="email" id="email" name="email" required
                           value="{{ old('email') }}"
                           class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent outline-none transition @error('email') border-red-500 @enderror"
                           placeholder="jan@voorbeeld.nl">
                    @error('email')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Company -->
            <div class="mb-6">
                <label for="company" class="block text-sm font-medium text-slate-700 mb-2">
                    Bedrijfsnaam (optioneel)
                </label>
                <input type="text" id="company" name="company"
                       value="{{ old('company') }}"
                       class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent outline-none transition @error('company') border-red-500 @enderror"
                       placeholder="Je webshop naam">
                @error('company')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- File Uploads -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Inkoopbestand -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Inkoopbestand (optioneel)
                    </label>
                    <div class="relative">
                        <input type="file" id="inkoopbestand" name="inkoopbestand"
                               @change="inkoopName = $event.target.files[0]?.name"
                               @dragover="inkoopDragging = true" @dragleave="inkoopDragging = false" @drop="inkoopDragging = false; handleFileDrop($event, 'inkoopbestand')"
                               accept=".csv,.xlsx,.xls,.txt"
                               class="hidden"
                               :class="{ 'opacity-0': true }">
                        <label for="inkoopbestand"
                               @dragover="inkoopDragging = true" @dragleave="inkoopDragging = false" @drop="inkoopDragging = false; handleFileDrop($event, 'inkoopbestand')"
                               :class="inkoopDragging ? 'border-orange-500 bg-orange-100' : 'border-slate-300 bg-slate-50'"
                               class="flex flex-col items-center justify-center p-6 border-2 border-dashed rounded-lg cursor-pointer transition">
                            <svg class="w-8 h-8 text-orange-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            <p class="text-sm font-medium text-slate-700" x-text="inkoopName ? inkoopName : 'CSV, Excel of TXT'"></p>
                            <p class="text-xs text-slate-500 mt-1">Sleep hier of klik</p>
                        </label>
                    </div>
                    @error('inkoopbestand')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Leverancierbestand -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Leverancierbestand (optioneel)
                    </label>
                    <div class="relative">
                        <input type="file" id="leverancierbestand" name="leverancierbestand"
                               @change="leverancierName = $event.target.files[0]?.name"
                               @dragover="leverancierDragging = true" @dragleave="leverancierDragging = false" @drop="leverancierDragging = false; handleFileDrop($event, 'leverancierbestand')"
                               accept=".csv,.xlsx,.xls,.txt"
                               class="hidden">
                        <label for="leverancierbestand"
                               @dragover="leverancierDragging = true" @dragleave="leverancierDragging = false" @drop="leverancierDragging = false; handleFileDrop($event, 'leverancierbestand')"
                               :class="leverancierDragging ? 'border-orange-500 bg-orange-100' : 'border-slate-300 bg-slate-50'"
                               class="flex flex-col items-center justify-center p-6 border-2 border-dashed rounded-lg cursor-pointer transition">
                            <svg class="w-8 h-8 text-orange-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            <p class="text-sm font-medium text-slate-700" x-text="leverancierName ? leverancierName : 'CSV, Excel of TXT'"></p>
                            <p class="text-xs text-slate-500 mt-1">Sleep hier of klik</p>
                        </label>
                    </div>
                    @error('leverancierbestand')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Message -->
            <div class="mb-6">
                <label for="message" class="block text-sm font-medium text-slate-700 mb-2">
                    Extra informatie (optioneel)
                </label>
                <textarea id="message" name="message" rows="4"
                          class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent outline-none transition @error('message') border-red-500 @enderror"
                          placeholder="Vertel ons iets over je winkel, tone of voice voorkeur, etc.">{{ old('message') }}</textarea>
                @error('message')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-xs text-slate-600">
                    ✓ Veilig & privé. Geen spam.
                </p>
                <button type="submit" :disabled="submitting"
                        :class="submitting ? 'opacity-50 cursor-not-allowed' : 'hover:shadow-lg'"
                        style="background-color: #E36414;"
                        class="px-8 py-3 text-white font-medium rounded-lg transition flex items-center space-x-2">
                    <span x-text="submitting ? 'Verzenden...' : 'Start proefperiode'"></span>
                    <svg x-show="submitting" class="w-4 h-4 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                </button>
            </div>
        </form>

        <!-- Info boxes -->
        <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="flex items-start space-x-4">
                <div class="flex-shrink-0 w-10 h-10 rounded-lg bg-orange-100 flex items-center justify-center text-orange-600">
                    ⚡
                </div>
                <div>
                    <h4 class="font-medium text-slate-900">Snel</h4>
                    <p class="text-sm text-slate-600 mt-1">Resultaten binnen 24 uur</p>
                </div>
            </div>
            <div class="flex items-start space-x-4">
                <div class="flex-shrink-0 w-10 h-10 rounded-lg bg-orange-100 flex items-center justify-center text-orange-600">
                    🔒
                </div>
                <div>
                    <h4 class="font-medium text-slate-900">Veilig</h4>
                    <p class="text-sm text-slate-600 mt-1">Encryptie & GDPR compliant</p>
                </div>
            </div>
            <div class="flex items-start space-x-4">
                <div class="flex-shrink-0 w-10 h-10 rounded-lg bg-orange-100 flex items-center justify-center text-orange-600">
                    ✓
                </div>
                <div>
                    <h4 class="font-medium text-slate-900">Kostenloos</h4>
                    <p class="text-sm text-slate-600 mt-1">Geen creditcard nodig</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function uploadForm() {
            return {
                inkoopName: '',
                leverancierName: '',
                inkoopDragging: false,
                leverancierDragging: false,
                submitting: false,

                handleFileDrop(event, fieldName) {
                    event.preventDefault();
                    const files = event.dataTransfer.files;
                    if (files.length > 0) {
                        const input = document.getElementById(fieldName);
                        input.files = files;
                        if (fieldName === 'inkoopbestand') {
                            this.inkoopName = files[0].name;
                        } else {
                            this.leverancierName = files[0].name;
                        }
                    }
                },

                submitForm() {
                    this.submitting = true;
                    const form = this.$el;
                    setTimeout(() => {
                        form.submit();
                    }, 100);
                }
            }
        }
    </script>
</section>
