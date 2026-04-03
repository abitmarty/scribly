<!DOCTYPE html>
<html lang="nl" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Scribly genereert automatisch SEO-geoptimaliseerde productomschrijvingen voor jouw webshop. Upload je inkoopbestand, wij doen de rest.">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://scribly.nl/">

    <!-- Open Graph -->
    <meta property="og:title" content="Scribly - AI Productomschrijvingen">
    <meta property="og:description" content="Van inkooplijst naar perfecte productomschrijvingen in minuten.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://scribly.nl/">

    <!-- Schema.org -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "SoftwareApplication",
      "name": "Scribly",
      "applicationCategory": "BusinessApplication",
      "offers": { "@type": "Offer", "priceCurrency": "EUR", "price": "49" }
    }
    </script>

    <title>Scribly - AI Productomschrijvingen voor Webshops | SEO-Geoptimaliseerd</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        display: ['"Barlow Condensed"', 'sans-serif'],
                        body: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        navy: {
                            900: '#0a0f1e',
                            800: '#0d1530',
                            700: '#111b3d',
                        },
                        accent: {
                            DEFAULT: '#7c3aed',
                            light: '#8b5cf6',
                            glow: '#a78bfa',
                        },
                    },
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>

    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .text-gradient {
            @apply bg-gradient-to-r from-violet-400 to-blue-400 bg-clip-text text-transparent;
        }

        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>

    @stack('head')
</head>
<body class="font-body text-slate-900">
    @yield('content')

    @stack('scripts')
</body>
</html>
